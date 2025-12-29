-- *********************************************
-- * Standard SQL generation
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2
-- * Generator date: Sep 14 2021
-- * Generation date: Mon Dec 29 17:32:04 2025
-- * LUN file:
-- * Schema: SCHEMA_LOGICO2/SQL
-- *********************************************

-- Database Section
-- ________________
DROP DATABASE IF EXISTS Unigames_db;
CREATE DATABASE IF NOT EXISTS Unigames_db;
USE Unigames_db;

-- DBSpace Section
-- _______________

-- Tables Section
-- _____________

create table UTENTE (
email varchar(254) not null,
nome varchar(30) not null,
cognome varchar(30) not null,
dataDiNascita date not null,
matricola numeric(10) not null,
descrizione varchar(500) not null,
constraint ID_UTENTE_ID primary key (email));

create table ADMIN (
email varchar(254) not null,
constraint ID_ADMIN_UTENT_ID primary key (email));

create table TAG (
codiceTag numeric(10) not null,
nome varchar(50) not null,
email varchar(254) not null,
constraint ID_TAG_ID primary key (codiceTag));

create table MESSAGGIO (
codiceMessaggio numeric(10) not null,
testo varchar(2000) not null,
email varchar(254) not null,
constraint ID_MESSAGGIO_ID primary key (codiceMessaggio));

create table POST (
crea_email varchar(254) not null,
codicePost numeric(10) not null,
testo varchar(2000) not null,
data date not null,
titolo varchar(150) not null,
email varchar(254) not null,
RECENSIONE varchar(1),
GENERICO varchar(1),
constraint ID_POST_ID primary key (crea_email, codicePost));

create table GIOCO (
codiceGioco numeric(10) not null,
nome varchar(100) not null,
annoDiPubblicazione date not null,
softwareHouse varchar(100) not null,
valutazioneGiornalistica numeric(3) not null,
descrizione varchar(1000) not null,
immagine varchar(255) not null,
email varchar(254) not null,
constraint ID_GIOCO_ID primary key (codiceGioco));

create table RECENSIONE (
crea_email varchar(254) not null,
codicePost numeric(10) not null,
valutazione varchar(10) not null,
codiceGioco numeric(10) not null,
constraint ID_RECEN_POST_ID primary key (crea_email, codicePost));

create table TORNEO (
codiceGioco numeric(10) not null,
codiceTorneo numeric(10) not null,
nome varchar(100) not null,
descrizione varchar(500) not null,
data date not null,
email varchar(254) not null,
constraint ID_TORNEO_ID primary key (codiceGioco, codiceTorneo));

create table GENERICO (
crea_email varchar(254) not null,
codicePost numeric(10) not null,
constraint ID_GENER_POST_ID primary key (crea_email, codicePost));

create table COMMENTO (
crea_email varchar(254) not null,
codicePost numeric(10) not null,
email varchar(254) not null,
codiceCommento numeric(10) not null,
testo varchar(1000) not null,
constraint ID_COMMENTO_ID primary key (email, crea_email, codicePost, codiceCommento));

create table CORSO (
codiceCorso numeric(10) not null,
nome varchar(100) not null,
email varchar(254) not null,
constraint ID_CORSO_ID primary key (codiceCorso));

create table iscritto (
codiceCorso numeric(10) not null,
email varchar(254) not null,
constraint ID_iscritto_ID primary key (codiceCorso, email));

create table iscrizione (
codiceGioco numeric(10) not null,
codiceTorneo numeric(10) not null,
email varchar(254) not null,
constraint ID_iscrizione_ID primary key (codiceGioco, codiceTorneo, email));

create table riceve (
codiceMessaggio numeric(10) not null,
email varchar(254) not null,
constraint ID_riceve_ID primary key (email, codiceMessaggio));

create table riguarda (
codiceGioco numeric(10) not null,
codiceTag numeric(10) not null,
constraint ID_riguarda_ID primary key (codiceGioco, codiceTag));

-- Constraints Section
-- ___________________

alter table UTENTE add constraint ID_UTENTE_CHK
check(exists(select * from iscritto
where iscritto.email = email));

alter table ADMIN add constraint ID_ADMIN_UTENT_FK
foreign key (email)
references UTENTE;

alter table TAG add constraint REF_TAG_ADMIN_FK
foreign key (email)
references ADMIN;

alter table MESSAGGIO add constraint ID_MESSAGGIO_CHK
check(exists(select * from riceve
where riceve.codiceMessaggio = codiceMessaggio));

alter table MESSAGGIO add constraint REF_MESSA_UTENT_FK
foreign key (email)
references UTENTE;

alter table POST add constraint EXTONE_POST
check((GENERICO is not null and RECENSIONE is null)
or (GENERICO is null and RECENSIONE is not null));

alter table POST add constraint REF_POST_ADMIN_FK
foreign key (email)
references ADMIN;

alter table POST add constraint REF_POST_UTENT
foreign key (crea_email)
references UTENTE;

alter table GIOCO add constraint ID_GIOCO_CHK
check(exists(select * from riguarda
where riguarda.codiceGioco = codiceGioco));

alter table GIOCO add constraint REF_GIOCO_ADMIN_FK
foreign key (email)
references ADMIN;

alter table RECENSIONE add constraint REF_RECEN_GIOCO_FK
foreign key (codiceGioco)
references GIOCO;

alter table RECENSIONE add constraint ID_RECEN_POST_FK
foreign key (crea_email, codicePost)
references POST;

alter table TORNEO add constraint ID_TORNEO_CHK
check(exists(select * from iscrizione
where iscrizione.codiceGioco = codiceGioco and iscrizione.codiceTorneo = codiceTorneo));

alter table TORNEO add constraint REF_TORNE_GIOCO
foreign key (codiceGioco)
references GIOCO;

alter table TORNEO add constraint REF_TORNE_ADMIN_FK
foreign key (email)
references ADMIN;

alter table GENERICO add constraint ID_GENER_POST_FK
foreign key (crea_email, codicePost)
references POST;

alter table COMMENTO add constraint REF_COMME_UTENT
foreign key (email)
references UTENTE;

alter table COMMENTO add constraint REF_COMME_POST_FK
foreign key (crea_email, codicePost)
references POST;

alter table CORSO add constraint REF_CORSO_ADMIN_FK
foreign key (email)
references ADMIN;

alter table iscritto add constraint EQU_iscri_UTENT_FK
foreign key (email)
references UTENTE;

alter table iscritto add constraint REF_iscri_CORSO
foreign key (codiceCorso)
references CORSO;

alter table iscrizione add constraint REF_iscri_UTENT_FK
foreign key (email)
references UTENTE;

alter table iscrizione add constraint EQU_iscri_TORNE
foreign key (codiceGioco, codiceTorneo)
references TORNEO;

alter table riceve add constraint REF_ricev_UTENT
foreign key (email)
references UTENTE;

alter table riceve add constraint EQU_ricev_MESSA_FK
foreign key (codiceMessaggio)
references MESSAGGIO;

alter table riguarda add constraint REF_rigua_TAG_FK
foreign key (codiceTag)
references TAG;

alter table riguarda add constraint EQU_rigua_GIOCO
foreign key (codiceGioco)
references GIOCO;

-- Index Section
-- _____________

create unique index ID_UTENTE_IND
on UTENTE (email);

create unique index ID_ADMIN_UTENT_IND
on ADMIN (email);

create unique index ID_TAG_IND
on TAG (codiceTag);

create index REF_TAG_ADMIN_IND
on TAG (email);

create unique index ID_MESSAGGIO_IND
on MESSAGGIO (codiceMessaggio);

create index REF_MESSA_UTENT_IND
on MESSAGGIO (email);

create unique index ID_POST_IND
on POST (crea_email, codicePost);

create index REF_POST_ADMIN_IND
on POST (email);

create unique index ID_GIOCO_IND
on GIOCO (codiceGioco);

create index REF_GIOCO_ADMIN_IND
on GIOCO (email);

create index REF_RECEN_GIOCO_IND
on RECENSIONE (codiceGioco);

create unique index ID_RECEN_POST_IND
on RECENSIONE (crea_email, codicePost);

create unique index ID_TORNEO_IND
on TORNEO (codiceGioco, codiceTorneo);

create index REF_TORNE_ADMIN_IND
on TORNEO (email);

create unique index ID_GENER_POST_IND
on GENERICO (crea_email, codicePost);

create unique index ID_COMMENTO_IND
on COMMENTO (email, crea_email, codicePost, codiceCommento);

create index REF_COMME_POST_IND
on COMMENTO (crea_email, codicePost);

create unique index ID_CORSO_IND
on CORSO (codiceCorso);

create index REF_CORSO_ADMIN_IND
on CORSO (email);

create unique index ID_iscritto_IND
on iscritto (codiceCorso, email);

create index EQU_iscri_UTENT_IND
on iscritto (email);

create unique index ID_iscrizione_IND
on iscrizione (codiceGioco, codiceTorneo, email);

create index REF_iscri_UTENT_IND
on iscrizione (email);

create unique index ID_riceve_IND
on riceve (email, codiceMessaggio);

create index EQU_ricev_MESSA_IND
on riceve (codiceMessaggio);

create unique index ID_riguarda_IND
on riguarda (codiceGioco, codiceTag);

create index REF_rigua_TAG_IND
on riguarda (codiceTag);
