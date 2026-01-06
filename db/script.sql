USE Unigames_db;

-- =====================
-- UTENTI EXTRA
-- =====================
INSERT INTO UTENTE VALUES
("giorgio.bianchi@studio.unibo.it","$2y$10$grr4hpMZjf4n251jrIeI6uxeZqRMvpgdU.wOhsYhlUvBFH.hej6Me","Giorgio","Bianchi","2003-03-15","0001113333","Appassionato di FPS"),
("anna.rossi3@studio.unibo.it","$2y$10$r5FjvbumDJz8VDCxQedwz.DIObRqzs9iBx808aOolCkh6.oVrlpZe","Anna","Rossi","2004-01-10","0001114444","Amante dei giochi indie");

-- =====================
-- TAG
-- =====================
INSERT INTO TAG VALUES
(1,"Avventura","riccardo.carta2@studio.unibo.it"),
(2,"Azione","riccardo.carta2@studio.unibo.it"),
(3,"Famiglia","marco.battistini10@studio.unibo.it"),
(4,"Gioco di Ruolo","riccardo.carta2@studio.unibo.it"),
(5,"Horror","marco.battistini10@studio.unibo.it"),
(6,"Indie","marco.battistini10@studio.unibo.it"),
(7,"Multiplayer","riccardo.carta2@studio.unibo.it"),
(8,"Platform","riccardo.carta2@studio.unibo.it"),
(9,"Sparatutto","marco.battistini10@studio.unibo.it"),
(10,"Sport","marco.battistini10@studio.unibo.it"),
(11,"Visual Novel","riccardo.carta2@studio.unibo.it"),
(12, "Simulazione", "riccardo.carta2@studio.unibo.it"),
(13, "RogueLike", "marco.battistini10@studio.unibo.it"),
(14, "Sopravvivenza", "marco.battistini10@studio.unibo.it");

-- =====================
-- GIOCHI
-- =====================
INSERT INTO GIOCO VALUES
(00001,"Zelda: Breath of the Wild","2017-03-03","Nintendo",5.0,
 "Open world rivoluzionario","zelda.jpg","riccardo.carta2@studio.unibo.it"),
(00002,"Hades","2020-09-17","Supergiant Games",4.5,
 "Roguelike frenetico","hades.jpg","marco.battistini10@studio.unibo.it"),
(00003,"The Witcher 3: Wild Hunt","2015-05-19","CD Projekt Red",5.0,
 "GDR epico open world","witcher3.jpg","marco.battistini10@studio.unibo.it"),
(00004,"Stardew Valley","2016-02-26","ConcernedApe",4.8,
 "Simulatore di vita agricola rilassante","stardew.jpg","riccardo.carta2@studio.unibo.it"),
(00005,"Dark Souls III","2016-04-12","FromSoftware",4.7,
 "Action RPG impegnativo e atmosferico","darksouls3.jpg","riccardo.carta2@studio.unibo.it"),
(00006,"Hollow Knight","2017-02-24","Team Cherry",4.9,
 "Metroidvania profondo e impegnativo","hollowknight.jpg","marco.battistini10@studio.unibo.it"),
(00007,"Resident Evil 7: Biohazard","2017-01-24","Capcom",4.6,
 "Horror in prima persona claustrofobico","re7.jpg","marco.battistini10@studio.unibo.it"),
(00008,"Celeste","2018-01-25","Matt Makes Games",4.8,
 "Platform impegnativo con forte narrativa","celeste.jpg","riccardo.carta2@studio.unibo.it"),
(00009,"God of War","2018-04-20","Santa Monica Studio",5.0,
 "Avventura epica padre-figlio","gow2018.jpg","marco.battistini10@studio.unibo.it"),
(00010,"Disco Elysium","2019-10-15","ZA/UM",4.9,
 "RPG narrativo profondo e unico","discoelysium.jpg","marco.battistini10@studio.unibo.it"),
(00011,"Dead Cells","2018-08-07","Motion Twin",4.7,
 "Roguelike d'azione veloce e fluido","deadcells.jpg","marco.battistini10@studio.unibo.it"),
(00012,"Subnautica","2018-01-23","Unknown Worlds",4.6,
 "Survival esplorativo sottomarino","subnautica.jpg","riccardo.carta2@studio.unibo.it"),
(00013,"DOOM Eternal","2020-03-20","id Software",4.8,
 "FPS frenetico e adrenalinico","doometernal.jpg","riccardo.carta2@studio.unibo.it"),
(00014,"Ori and the Will of the Wisps","2020-03-11","Moon Studios",4.9,
 "Platform emozionante e artistico","oriwotw.jpg","riccardo.carta2@studio.unibo.it"),
(00015,"Baldur's Gate 3","2023-08-03","Larian Studios",5.0,
 "RPG tattico profondo e reattivo","bg3.jpg","marco.battistini10@studio.unibo.it"),
(00016,"Little Nightmares","2017-04-28","Tarsier Studios",4.5,
 "Horror atmosferico e simbolico","littlenightmares.jpg","riccardo.carta2@studio.unibo.it"),
(00017,"Elden Ring", "2022-02-25", "FromSoftware", 4.9,
 "RPG vastissimo pieno di segreti da scoprire", "eldenring.jpg", "marco.battistini10@studio.unibo.it"),
(00018, "Gran Turismo 7", "2022-03-04", "Polyphony Digital", 4.6,
 "Simulatore di guida realistico", "granturismo7.jpg", "riccardo.carta2@studio.unibo.it");

-- =====================
-- POST GENERICI
-- =====================
INSERT INTO POST VALUES
("riccardo.carta2@studio.unibo.it",1,
 "Qualcuno ha provato l\'ultimo DLC?",
 "2025-01-10","Domanda DLC",
 NULL,'G'),

("marco.battistini10@studio.unibo.it",1,
 "Consigli per giochi cooperativi?",
 "2025-01-11","Co-op games",
 NULL,'G');

INSERT INTO GENERICO VALUES
("riccardo.carta2@studio.unibo.it",1),
("marco.battistini10@studio.unibo.it",1);

-- =====================
-- POST RECENSIONI
-- =====================
INSERT INTO POST VALUES
("giorgio.bianchi@studio.unibo.it",1,
 "Un capolavoro senza tempo",
 "2025-01-12","Recensione Zelda",
 'R',NULL);

INSERT INTO RECENSIONE VALUES
("giorgio.bianchi@studio.unibo.it",1,"5.0",00001);

-- =====================
-- COMMENTI
-- =====================
INSERT INTO COMMENTO VALUES
("riccardo.carta2@studio.unibo.it",1,
 "anna.rossi3@studio.unibo.it",1,
 "Sono d'accordo, DLC stupendo!"),

("marco.battistini10@studio.unibo.it",1,
 "giorgio.bianchi@studio.unibo.it",1,
 "Ti consiglio It Takes Two");

-- =====================
-- TORNEI
-- =====================
INSERT INTO TORNEO VALUES
(00002,1,"Hades Speedrun",
 "Torneo universitario","2025-02-20",
 "marco.battistini10@studio.unibo.it"),
 (000010,2,"Disco Elysium",
 "Torneo bruttissimo","2025-02-10",
 "riccardo.carta2@studio.unibo.it"),
 (00018,3,"Gran Turismo 7",
 "Torneo bellissimo","2025-02-15",
 "marco.battistini10@studio.unibo.it");
-- =====================
-- ISCRIZIONI TORNEI
-- =====================
INSERT INTO iscrizione VALUES
(00002,1,"riccardo.carta2@studio.unibo.it"),
(00002,1,"anna.rossi3@studio.unibo.it"),
(00018,3,"marco.battistini10@studio.unibo.it");

-- =====================
-- CORSI
-- =====================

-- =====================
-- ISCRITTI AI CORSI
-- =====================
INSERT INTO iscritto VALUES
(001,"riccardo.carta2@studio.unibo.it"),
(001,"marco.battistini10@studio.unibo.it"),
(002,"giorgio.bianchi@studio.unibo.it"),
(004,"anna.rossi3@studio.unibo.it");

-- =====================
-- TAG ↔ GIOCHI
-- =====================
INSERT INTO riguarda VALUES
(00001,1),
(00001,3),
(00002,2),
(00002,13),
(00003,1),
(00003,2),
(00003,4),
(00004,3),
(00004,12),
(00005,1),
(00005,2),
(00005,4),
(00006,1),
(00006,2),
(00006,6),
(00006,8),
(00007,2),
(00007,5),
(00008,1),
(00008,6),
(00008,8),
(00009,1),
(00009,2),
(00010,1),
(00010,4),
(00010,6),
(00011,2),
(00011,13),
(00012,5),
(00012,12),
(00012,14),
(00013,2),
(00013,9),
(00014,1),
(00014,6),
(00014,8),
(00015,1),
(00015,4),
(00016,1),
(00016,5),
(00016,6),
(00017,1),
(00017,2),
(00017,4),
(00018,7),
(00018,10),
(00018, 12);



