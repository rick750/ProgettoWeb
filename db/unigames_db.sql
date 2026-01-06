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
CREATE DATABASE Unigames_db;
USE Unigames_db;

-- DBSpace Section
-- _______________

-- Tables Section
-- _____________

CREATE TABLE UTENTE (
  email VARCHAR(254) NOT NULL,
  password varchar(254) not null,
  nome VARCHAR(30) NOT NULL,
  cognome VARCHAR(30) NOT NULL,
  dataDiNascita DATE NOT NULL,
  matricola NUMERIC(10) NOT NULL,
  descrizione VARCHAR(500) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB;

CREATE TABLE ADMIN (
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (email),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE TAG (
  codiceTag NUMERIC(10) NOT NULL,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceTag),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE MESSAGGIO (
  codiceMessaggio NUMERIC(10) NOT NULL,
  testo VARCHAR(2000) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceMessaggio),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE POST (
  crea_email VARCHAR(254) NOT NULL,
  codicePost NUMERIC(10) NOT NULL,
  testo VARCHAR(2000) NOT NULL,
  data DATE NOT NULL,
  titolo VARCHAR(150) NOT NULL,
  RECENSIONE VARCHAR(1),
  GENERICO VARCHAR(1),
  PRIMARY KEY (crea_email, codicePost),
  FOREIGN KEY (crea_email) REFERENCES UTENTE(email),
  CHECK (
    (GENERICO IS NOT NULL AND RECENSIONE IS NULL)
    OR
    (GENERICO IS NULL AND RECENSIONE IS NOT NULL)
  )
) ENGINE=InnoDB;

CREATE TABLE GIOCO (
  codiceGioco NUMERIC(10) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  annoDiPubblicazione DATE NOT NULL,
  softwareHouse VARCHAR(100) NOT NULL,
  valutazioneGiornalistica DECIMAL(2,1) NOT NULL,
  descrizione VARCHAR(1000) NOT NULL,
  immagine VARCHAR(255) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceGioco),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE RECENSIONE (
  crea_email VARCHAR(254) NOT NULL,
  codicePost NUMERIC(10) NOT NULL,
  valutazione DECIMAL(2,1) NOT NULL,
  codiceGioco NUMERIC(10) NOT NULL,
  PRIMARY KEY (crea_email, codicePost),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost),
  FOREIGN KEY (codiceGioco) REFERENCES GIOCO(codiceGioco)
) ENGINE=InnoDB;

CREATE TABLE TORNEO (
  codiceGioco NUMERIC(10) NOT NULL,
  codiceTorneo NUMERIC(10) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  descrizione VARCHAR(500) NOT NULL,
  data DATE NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceGioco, codiceTorneo),
  FOREIGN KEY (codiceGioco) REFERENCES GIOCO(codiceGioco),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE GENERICO (
  crea_email VARCHAR(254) NOT NULL,
  codicePost NUMERIC(10) NOT NULL,
  PRIMARY KEY (crea_email, codicePost),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost)
) ENGINE=InnoDB;

CREATE TABLE COMMENTO (
  crea_email VARCHAR(254) NOT NULL,
  codicePost NUMERIC(10) NOT NULL,
  email VARCHAR(254) NOT NULL,
  codiceCommento NUMERIC(10) NOT NULL,
  testo VARCHAR(1000) NOT NULL,
  PRIMARY KEY (email, crea_email, codicePost, codiceCommento),
  FOREIGN KEY (email) REFERENCES UTENTE(email),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost)
) ENGINE=InnoDB;

CREATE TABLE CORSO (
  codiceCorso NUMERIC(10) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceCorso),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE iscritto (
  codiceCorso NUMERIC(10) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceCorso, email),
  FOREIGN KEY (codiceCorso) REFERENCES CORSO(codiceCorso),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE iscrizione (
  codiceGioco NUMERIC(10) NOT NULL,
  codiceTorneo NUMERIC(10) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceGioco, codiceTorneo, email),
  FOREIGN KEY (codiceGioco, codiceTorneo) REFERENCES TORNEO(codiceGioco, codiceTorneo),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE riceve (
  codiceMessaggio NUMERIC(10) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (email, codiceMessaggio),
  FOREIGN KEY (email) REFERENCES UTENTE(email),
  FOREIGN KEY (codiceMessaggio) REFERENCES MESSAGGIO(codiceMessaggio)
) ENGINE=InnoDB;

CREATE TABLE riguarda (
  codiceGioco NUMERIC(10) NOT NULL,
  codiceTag NUMERIC(10) NOT NULL,
  PRIMARY KEY (codiceGioco, codiceTag),
  FOREIGN KEY (codiceGioco) REFERENCES GIOCO(codiceGioco),
  FOREIGN KEY (codiceTag) REFERENCES TAG(codiceTag)
) ENGINE=InnoDB;


INSERT INTO UTENTE
VALUES ("riccardo.carta2@studio.unibo.it","$2y$10$PLBHSofL/AcsBsZ2tzuHLOmpZKwq/tI4gzzRmQQkWkjxlj5fzClaS","Riccardo","Carta","2004-07-28","0001115294","Hello World!"),
("marco.battistini10@studio.unibo.it","$2y$10$QJsd6Czd/mwGIscOjPpUIen06mbMXPoq1jhrDbXNdNEOQ3bwpJJmq","Marco","Battistini","2004-11-28","0001114229","Ciao!");
INSERT INTO ADMIN VALUES
("riccardo.carta2@studio.unibo.it"),
("marco.battistini10@studio.unibo.it");


INSERT INTO CORSO VALUES
(001,"Ingegneria e Scienze Informatiche","riccardo.carta2@studio.unibo.it"),
(002,"Architettura","marco.battistini10@studio.unibo.it"),
(003,"Ingegneria Elettronica","riccardo.carta2@studio.unibo.it"),
(004,"Ingegneria Biomedica","marco.battistini10@studio.unibo.it"),
(005,"Psicologia","riccardo.carta2@studio.unibo.it");
