USE Unigames_db;

-- =====================
-- UTENTI EXTRA
-- =====================
INSERT INTO UTENTE VALUES
("luca.rossi@studio.unibo.it","Luca2025","Luca","Rossi","2003-03-15","0001113333","Appassionato di FPS"),
("anna.verdi@studio.unibo.it","Anna2025","Anna","Verdi","2004-01-10","0001114444","Amante dei giochi indie");

-- =====================
-- TAG
-- =====================
INSERT INTO TAG VALUES
(1,"Action","riccardo.carta2@studio.unibo.it"),
(2,"Indie","marco.battistini10@studio.unibo.it"),
(3,"Multiplayer","riccardo.carta2@studio.unibo.it");

-- =====================
-- GIOCHI
-- =====================
INSERT INTO GIOCO VALUES
(100,"Zelda: Breath of the Wild","2017-03-03","Nintendo",97,
 "Open world rivoluzionario","zelda.jpg","riccardo.carta2@studio.unibo.it"),
(101,"Hades","2020-09-17","Supergiant Games",93,
 "Roguelike frenetico","hades.jpg","marco.battistini10@studio.unibo.it");

-- =====================
-- POST GENERICI
-- =====================
INSERT INTO POST VALUES
("riccardo.carta2@studio.unibo.it",1,
 "Qualcuno ha provato l'ultimo DLC?",
 "2025-01-10","Domanda DLC",
 "riccardo.carta2@studio.unibo.it",
 NULL,'G'),

("marco.battistini10@studio.unibo.it",1,
 "Consigli per giochi cooperativi?",
 "2025-01-11","Co-op games",
 "marco.battistini10@studio.unibo.it",
 NULL,'G');

INSERT INTO GENERICO VALUES
("riccardo.carta2@studio.unibo.it",1),
("marco.battistini10@studio.unibo.it",1);

-- =====================
-- POST RECENSIONI
-- =====================
INSERT INTO POST VALUES
("luca.rossi@studio.unibo.it",1,
 "Un capolavoro senza tempo",
 "2025-01-12","Recensione Zelda",
 "luca.rossi@studio.unibo.it",
 'R',NULL);

INSERT INTO RECENSIONE VALUES
("luca.rossi@studio.unibo.it",1,"10/10",100);

-- =====================
-- COMMENTI
-- =====================
INSERT INTO COMMENTO VALUES
("riccardo.carta2@studio.unibo.it",1,
 "anna.verdi@studio.unibo.it",1,
 "Sono d'accordo, DLC stupendo!"),

("marco.battistini10@studio.unibo.it",1,
 "luca.rossi@studio.unibo.it",1,
 "Ti consiglio It Takes Two");

-- =====================
-- TORNEI
-- =====================
INSERT INTO TORNEO VALUES
(101,1,"Hades Speedrun",
 "Torneo universitario","2025-02-20",
 "marco.battistini10@studio.unibo.it");

-- =====================
-- ISCRIZIONI TORNEI
-- =====================
INSERT INTO iscrizione VALUES
(101,1,"riccardo.carta2@studio.unibo.it"),
(101,1,"anna.verdi@studio.unibo.it");

-- =====================
-- CORSI
-- =====================
INSERT INTO CORSO VALUES
(500,"Game Design","riccardo.carta2@studio.unibo.it"),
(501,"E-sports Management","marco.battistini10@studio.unibo.it");

-- =====================
-- ISCRITTI AI CORSI
-- =====================
INSERT INTO iscritto VALUES
(500,"luca.rossi@studio.unibo.it"),
(501,"anna.verdi@studio.unibo.it");

-- =====================
-- TAG ↔ GIOCHI
-- =====================
INSERT INTO riguarda VALUES
(100,1),
(100,3),
(101,2);
