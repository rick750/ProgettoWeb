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
  matricola varchar(10) NOT NULL,
  descrizione VARCHAR(500) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB;

CREATE TABLE ADMIN (
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (email),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE TAG (
  codiceTag INT UNSIGNED NOT NULL,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceTag),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE MESSAGGIO (
  codiceMessaggio INT UNSIGNED NOT NULL,
  testo VARCHAR(2000) NOT NULL,
  email VARCHAR(254) NOT NULL,
  data DATE NOT NULL,
  PRIMARY KEY (codiceMessaggio),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE POST (
  crea_email VARCHAR(254) NOT NULL,
  codicePost INT UNSIGNED NOT NULL,
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
  codiceGioco INT UNSIGNED NOT NULL,
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
  codicePost INT UNSIGNED NOT NULL,
  valutazione DECIMAL(2,1) NOT NULL,
  codiceGioco INT UNSIGNED NOT NULL,
  PRIMARY KEY (crea_email, codicePost),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost),
  FOREIGN KEY (codiceGioco) REFERENCES GIOCO(codiceGioco)
) ENGINE=InnoDB;

CREATE TABLE TORNEO (
  codiceGioco INT UNSIGNED NOT NULL,
  codiceTorneo INT UNSIGNED NOT NULL,
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
  codicePost INT UNSIGNED NOT NULL,
  PRIMARY KEY (crea_email, codicePost),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost)
) ENGINE=InnoDB;

CREATE TABLE COMMENTO (
  crea_email VARCHAR(254) NOT NULL,
  codicePost INT UNSIGNED NOT NULL,
  email VARCHAR(254) NOT NULL,
  codiceCommento INT UNSIGNED NOT NULL,
  testo VARCHAR(1000) NOT NULL,
  PRIMARY KEY (crea_email, codicePost, codiceCommento),
  FOREIGN KEY (email) REFERENCES UTENTE(email),
  FOREIGN KEY (crea_email, codicePost) REFERENCES POST(crea_email, codicePost)
) ENGINE=InnoDB;

CREATE TABLE CORSO (
  codiceCorso INT UNSIGNED NOT NULL,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceCorso),
  FOREIGN KEY (email) REFERENCES ADMIN(email)
) ENGINE=InnoDB;

CREATE TABLE iscritto (
  codiceCorso INT UNSIGNED NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceCorso, email),
  FOREIGN KEY (codiceCorso) REFERENCES CORSO(codiceCorso),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE iscrizione (
  codiceGioco INT UNSIGNED NOT NULL,
  codiceTorneo INT UNSIGNED NOT NULL,
  email VARCHAR(254) NOT NULL,
  PRIMARY KEY (codiceGioco, codiceTorneo, email),
  FOREIGN KEY (codiceGioco, codiceTorneo) REFERENCES TORNEO(codiceGioco, codiceTorneo),
  FOREIGN KEY (email) REFERENCES UTENTE(email)
) ENGINE=InnoDB;

CREATE TABLE riceve (
  codiceMessaggio INT UNSIGNED NOT NULL,
  email VARCHAR(254) NOT NULL,
  data DATE NOT NULL,
  PRIMARY KEY (email, codiceMessaggio),
  FOREIGN KEY (email) REFERENCES UTENTE(email),
  FOREIGN KEY (codiceMessaggio) REFERENCES MESSAGGIO(codiceMessaggio)
) ENGINE=InnoDB;

CREATE TABLE riguarda (
  codiceGioco INT UNSIGNED NOT NULL,
  codiceTag INT UNSIGNED NOT NULL,
  PRIMARY KEY (codiceGioco, codiceTag),
  FOREIGN KEY (codiceGioco) REFERENCES GIOCO(codiceGioco),
  FOREIGN KEY (codiceTag) REFERENCES TAG(codiceTag)
) ENGINE=InnoDB;


INSERT INTO UTENTE
VALUES ("riccardo.carta2@studio.unibo.it","$2y$10$PLBHSofL/AcsBsZ2tzuHLOmpZKwq/tI4gzzRmQQkWkjxlj5fzClaS","Riccardo","Carta","2004-07-28","0001115294","Hello World!"),
("marco.battistini10@studio.unibo.it","$2y$10$QJsd6Czd/mwGIscOjPpUIen06mbMXPoq1jhrDbXNdNEOQ3bwpJJmq","Marco","Battistini","2004-11-28","0001114229","Ciao!"),
("giorgio.bianchi@studio.unibo.it","$2y$10$grr4hpMZjf4n251jrIeI6uxeZqRMvpgdU.wOhsYhlUvBFH.hej6Me","Giorgio","Bianchi","2003-03-15","0001113333","Appassionato di FPS"),
("anna.rossi3@studio.unibo.it","$2y$10$r5FjvbumDJz8VDCxQedwz.DIObRqzs9iBx808aOolCkh6.oVrlpZe","Anna","Rossi","2004-01-10","0001114444","Amante dei giochi indie"),
("alessandro.ferri@studio.unibo.it", "$2y$10$4v3oxmCcspRqVtbmiwuHFOcMujQEYpW5Anh08sR6l8zk9Tu8Hm.Ou", "Alessandro", "Ferri", "2004-02-27", "0001112345", "Stratega nei giochi RTS, eccelle nella gestione delle risorse e nelle build a lungo termine."),
("chiara.moretti@studio.unibo.it", "$2y$10$EHB02K0dvqKgZOwDwR2jVO9oKygNfqo7rGlYALGysgDKrxLECXnC2", "Chiara", "Moretti", "2003-08-16", "0001117264", "Streamer occasionale di giochi indie, apprezzata per l’analisi del game design e dell’atmosfera"),
("davide.lombardi@studio.unibo.it", "$2y$10$b84d1O6hYXl7jzkeM.8EL.VbuuiKFhCRRO4BmRpA8jtcoPjljSmay", "Davide", "Lombardi", "2004-11-13", "0001114563", "Appassionato di giochi stealth, preferisce approcci silenziosi e pianificazione meticolosa."),
("elena.bianchi@studio.unibo.it", "$2y$10$3YD1okn/9ZLAp7X7L.B1.ORL5yvwrYXTYIl2qXtMksqmFz8gFAYXO", "Elena", "Bianchi", "2005-10-12", "0001113367", "Giocatrice di survival sandbox, predilige l’esplorazione e la costruzione di basi efficienti."),
("francesco.gallo@studio.unibo.it", "$2y$10$ToEeBLe9lqc2XmMo3Y5MruARVtVJpPn522ZQLVH9Ndg5xDX8fB8W2", "Francesco", "Gallo", "2003-09-01", "0001111221", "Designer amatoriale di mod, crea contenuti personalizzati per prolungare la vita dei suoi giochi preferiti."),
("giulia.romano@studio.unibo.it", "$2y$10$Vjl00PTLcJA3zPfah5P5IeAQ3.oOzY5L65uGZ27dx.IcUn5eUqnBC", "Giulia", "Romano", "2004-06-18", "0001119234", "Speedrunner, sempre alla ricerca di glitch e scorciatoie per migliorare i propri record."),
("marco.rinaldi@studio.unibo.it", "$2y$10$nOF1Qq2gWdTVADr2qesgc.K.EZW6TqRoNBN2klgLd6sIJHD890.Q2", "Marco", "Rinaldi", "2003-12-04", "0001113256", "Giocatore competitivo di FPS, noto per i suoi riflessi rapidi e l’ottima gestione delle mappe nelle partite ranked."),
("matteo.greco@studio.unibo.it", "$2y$10$ncrdnQg5mHJqxshpcHqZV.n/6/EeoGFZkUFA6XbEsw5SALLFagiBa", "Matteo", "Greco", "2005-03-21", "0001114276", "Esperto di giochi di guida, cura in modo maniacale assetti e traiettorie perfette."),
("sara.conti@studio.unibo.it", "$2y$10$6/RWX52O5Rj3NFvbs8ugDe5dcas74PW1mDv68QMxGCUC7RHTHSqke", "Sara", "Conti", "2005-07-21", "0001111985", "Appassionata di RPG narrativi, dedica ore all’ottimizzazione dei personaggi e alle scelte di trama."),
("stefano.desantis@studio.unibo.it", "$2y$10$8W3yW6nEgJXLCeBQ09d7yOdMqyDaVU1wtHIx6vIFnhWAG4vCIVLeO", "Stefano", "De Santis", "2005-12-31", "0001112318", "Main tank nei MMORPG, specializzato nel coordinare il team durante i raid più complessi.");
INSERT INTO ADMIN VALUES
("riccardo.carta2@studio.unibo.it"),
("marco.battistini10@studio.unibo.it");


INSERT INTO CORSO VALUES
(001,"Ingegneria e Scienze Informatiche","riccardo.carta2@studio.unibo.it"),
(002,"Architettura","marco.battistini10@studio.unibo.it"),
(003,"Ingegneria Elettronica","riccardo.carta2@studio.unibo.it"),
(004,"Ingegneria Biomedica","marco.battistini10@studio.unibo.it"),
(005,"Psicologia","riccardo.carta2@studio.unibo.it");

INSERT INTO ISCRITTO VALUES 
("1", "francesco.gallo@studio.unibo.it"),
("1", "giulia.romano@studio.unibo.it"),
("1", "marco.battistini10@studio.unibo.it"),
("1", "marco.rinaldi@studio.unibo.it"),
("1", "riccardo.carta2@studio.unibo.it"),
("2", "giorgio.bianchi@studio.unibo.it"),
("2", "matteo.greco@studio.unibo.it"),
("2", "sara.conti@studio.unibo.it"),
("3", "alessandro.ferri@studio.unibo.it"),
("4", "anna.rossi3@studio.unibo.it"),
("4", "chiara.moretti@studio.unibo.it"),
("4", "elena.bianchi@studio.unibo.it"),
("5", "davide.lombardi@studio.unibo.it"),
("5", "stefano.desantis@studio.unibo.it");
