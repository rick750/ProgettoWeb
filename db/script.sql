USE Unigames_db;
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
 "Roguelike d\'azione veloce e fluido","deadcells.jpg","marco.battistini10@studio.unibo.it"),
(00012,"Subnautica","2018-01-23","Unknown Worlds",4.6,
 "Survival esplorativo sottomarino","subnautica.jpg","riccardo.carta2@studio.unibo.it"),
(00013,"DOOM Eternal","2020-03-20","id Software",4.8,
 "FPS frenetico e adrenalinico","doometernal.jpg","riccardo.carta2@studio.unibo.it"),
(00014,"Ori and the Will of the Wisps","2020-03-11","Moon Studios",4.9,
 "Platform emozionante e artistico","oriwotw.jpg","riccardo.carta2@studio.unibo.it"),
(00015,"Baldur\'s Gate 3","2023-08-03","Larian Studios",5.0,
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
 NULL,"G"),

("marco.battistini10@studio.unibo.it",1,
 "Consigli per giochi cooperativi?",
 "2025-01-11","Co-op games",
 NULL,"G");

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
 "R",NULL);

INSERT INTO RECENSIONE VALUES
("giorgio.bianchi@studio.unibo.it",1,"5.0",00001);

-- =====================
-- COMMENTI
-- =====================
INSERT INTO COMMENTO VALUES
("riccardo.carta2@studio.unibo.it",1,
 "anna.rossi3@studio.unibo.it",1,
 "Sono d\'accordo, DLC stupendo!"),

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
 "marco.battistini10@studio.unibo.it"),
 ("6", "4", "Hollow Knight", "Sfida di tipo speedrun, il vincitore riceverà una scatola di biscotti!!", "2026-02-11", "riccardo.carta2@studio.unibo.it"),
 ("9", "5", "God of War", "Torneo in modalità arena, resisti più degli altri!", "2026-03-29", "marco.battistini10@studio.unibo.it");
-- =====================
-- ISCRIZIONI TORNEI
-- =====================
INSERT INTO iscrizione VALUES
(00002,1,"riccardo.carta2@studio.unibo.it"),
(00002,1,"anna.rossi3@studio.unibo.it"),
(00018,3,"marco.battistini10@studio.unibo.it");

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



USE Unigames_db;

-- =====================
-- ULTERIORI POST (per arrivare ad almeno ~20+ post totali)
-- Notare: non vengono creati nuovi UTENTE / ADMIN / CORSO / ISCRITTO / GIOCO / TAG
-- =====================

-- 1
INSERT INTO POST VALUES
("giorgio.bianchi@studio.unibo.it",2,
 "Qual è secondo voi la miglior espansione per The Witcher 3? Hearts of Stone o Blood and Wine?",
 "2025-01-21","Espansioni Witcher",
 NULL,"G");
INSERT INTO GENERICO VALUES ("giorgio.bianchi@studio.unibo.it",2);

-- 2
INSERT INTO POST VALUES
("alessandro.ferri@studio.unibo.it",2,
 "Hades è un ottimo bilanciamento tra tecnica e narrazione: consigli build per chi inizia?",
 "2025-01-21","Guide Hades",
 NULL,"G");
INSERT INTO GENERICO VALUES ("alessandro.ferri@studio.unibo.it",2);

-- 3 (recensione)
INSERT INTO POST VALUES
("sara.conti@studio.unibo.it",1,
 "La scrittura in Disco Elysium è semplicemente magistrale: ogni dialogo conta.",
 "2025-01-22","Recensione Disco Elysium",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("sara.conti@studio.unibo.it",1,4.9,00010);

-- 4
INSERT INTO POST VALUES
("marco.rinaldi@studio.unibo.it",3,
 "Cerco team per sessioni competitive di FPS nel fine settimana, elo medio-alto.",
 "2025-01-22","Team FPS",
 NULL,"G");
INSERT INTO GENERICO VALUES ("marco.rinaldi@studio.unibo.it",3);

-- 5 (recensione)
INSERT INTO POST VALUES
("giulia.romano@studio.unibo.it",3,
 "Dead Cells è un perfetto compromesso tra precisione e caos: ottimo per i speedrun brevi.",
 "2025-01-23","Recensione Dead Cells",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("giulia.romano@studio.unibo.it",3,4.7,00011);

-- 6 (recensione)
INSERT INTO POST VALUES
("matteo.greco@studio.unibo.it",3,
 "Gran Turismo 7 offre una profondità di settaggio che pochi simulatori hanno oggi.",
 "2025-01-23","Recensione GT7",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("matteo.greco@studio.unibo.it",3,4.6,00018);

-- 7
INSERT INTO POST VALUES
("anna.rossi3@studio.unibo.it",4,
 "Consiglio una lista di mod semplici per Stardew Valley per migliorare la qualità della vita in gioco.",
 "2025-01-24","Mod Stardew",
 NULL,"G");
INSERT INTO GENERICO VALUES ("anna.rossi3@studio.unibo.it",4);

-- 8 (recensione)
INSERT INTO POST VALUES
("chiara.moretti@studio.unibo.it",2,
 "Indie con buona atmosfera: consiglio Celeste per la struttura narrativa e Hollow Knight per l\'esplorazione.",
 "2025-01-24","Recensione Indie Mix",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("chiara.moretti@studio.unibo.it",2,4.8,00008);

-- 9
INSERT INTO POST VALUES
("elena.bianchi@studio.unibo.it",2,
 "Quali strategie adottate per costruire basi a prova di player nei survival multiplayer?",
 "2025-01-25","Basi in Survival",
 NULL,"G");
INSERT INTO GENERICO VALUES ("elena.bianchi@studio.unibo.it",2);

-- 10 (recensione)
INSERT INTO POST VALUES
("davide.lombardi@studio.unibo.it",3,
 "Hollow Knight: approccio stealth e pattern recognition sono chiave per i boss più difficili.",
 "2025-01-25","Recensione Hollow Knight",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("davide.lombardi@studio.unibo.it",3,4.9,00006);

-- 11
INSERT INTO POST VALUES
("francesco.gallo@studio.unibo.it",3,
 "Sto lavorando a una mod che aggiunge oggetti estetici e qualche quest secondaria: feedback benvenuti.",
 "2025-01-26","Nuova mod in sviluppo",
 NULL,"G");
INSERT INTO GENERICO VALUES ("francesco.gallo@studio.unibo.it",3);

-- 12
INSERT INTO POST VALUES
("stefano.desantis@studio.unibo.it",2,
 "Qualcuno vuole fare un raid di prova questo venerdì? Ho il ruolo tank pronto.",
 "2025-01-26","Raid test",
 NULL,"G");
INSERT INTO GENERICO VALUES ("stefano.desantis@studio.unibo.it",2);

-- 13 (recensione)
INSERT INTO POST VALUES
("riccardo.carta2@studio.unibo.it",2,
 "Elden Ring amplia il concetto di open world e sfida il giocatore in maniera coerente.",
 "2025-01-27","Recensione Elden Ring",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("riccardo.carta2@studio.unibo.it",2,4.9,00017);

-- 14
INSERT INTO POST VALUES
("marco.battistini10@studio.unibo.it",2,
 "Stiamo pensando di organizzare un torneo interno di speedrun: idee per regole e categorie?",
 "2025-01-27","Proposta Torneo Speedrun",
 NULL,"G");
INSERT INTO GENERICO VALUES ("marco.battistini10@studio.unibo.it",2);

-- 15 (recensione)
INSERT INTO POST VALUES
("riccardo.carta2@studio.unibo.it",3,
 "Zelda: Breath of the Wild rimane un punto di riferimento per l\'esplorazione libera.",
 "2025-01-28","Recensione Zelda 2",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("riccardo.carta2@studio.unibo.it",3,4.7,00001);

-- 16
INSERT INTO POST VALUES
("alessandro.ferri@studio.unibo.it",3,
 "RTS: quali mappe preferite per partite 1v1 equilibrate? Propongo diredimensionare alcune risorse.",
 "2025-01-28","Mappe RTS",
 NULL,"G");
INSERT INTO GENERICO VALUES ("alessandro.ferri@studio.unibo.it",3);

-- 17
INSERT INTO POST VALUES
("sara.conti@studio.unibo.it",2,
 "Ho appena finito Baldur\'s Gate 3: le scelte morali hanno impatto reale sulla campagna.",
 "2025-01-29","BG3 scelte vive",
 NULL,"G");
INSERT INTO GENERICO VALUES ("sara.conti@studio.unibo.it",2);

-- 18 (recensione)
INSERT INTO POST VALUES
("marco.rinaldi@studio.unibo.it",4,
 "DOOM Eternal mantiene uno dei migliori ritmi per un FPS moderno.",
 "2025-01-29","Recensione DOOM Eternal",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("marco.rinaldi@studio.unibo.it",4,4.8,00013);

-- 19
INSERT INTO POST VALUES
("giulia.romano@studio.unibo.it",4,
 "Sto raccogliendo record per Celeste: suggerimenti su categorie di speedrun (any%, 100%)?",
 "2025-01-30","Speedrun Celeste",
 NULL,"G");
INSERT INTO GENERICO VALUES ("giulia.romano@studio.unibo.it",4);

-- 20
INSERT INTO POST VALUES
("davide.lombardi@studio.unibo.it",4,
 "Discussione: approcci stealth vs aggressivi nei livelli più aperti.",
 "2025-01-30","Stealth vs Aggro",
 NULL,"G");
INSERT INTO GENERICO VALUES ("davide.lombardi@studio.unibo.it",4);

-- 21 (recensione)
INSERT INTO POST VALUES
("francesco.gallo@studio.unibo.it",4,
 "Baldur\'s Gate 3 ha un sistema di crafting sottovalutato che arricchisce l\'esperienza.",
 "2025-01-31","Recensione BG3 - crafting",
 "R",NULL);
INSERT INTO RECENSIONE VALUES
("francesco.gallo@studio.unibo.it",4,4.8,00015);

-- 22
INSERT INTO POST VALUES
("elena.bianchi@studio.unibo.it",3,
 "Consiglio mod di qualità dell\'aria e luci per Subnautica per migliorare immersione.",
 "2025-01-31","Mod Subnautica",
 NULL,"G");
INSERT INTO GENERICO VALUES ("elena.bianchi@studio.unibo.it",3);

-- =====================
-- COMMENTI (aggiuntivi, coerenti)
-- =====================
-- comments on post (giorgio,2)
INSERT INTO COMMENTO VALUES
("giorgio.bianchi@studio.unibo.it",2,
 "alessandro.ferri@studio.unibo.it",1,
 "Blood and Wine offre contenuti più maturi, ma Hearts of Stone ha ottime quest secondarie.");

-- comments on post (sara,1)
INSERT INTO COMMENTO VALUES
("sara.conti@studio.unibo.it",1,
 "giorgio.bianchi@studio.unibo.it",1,
 "Concordo sulla scrittura, la profondità dei dialoghi è pazzesca.");

-- comments on post (marco.rinaldi,3)
INSERT INTO COMMENTO VALUES
("marco.rinaldi@studio.unibo.it",3,
 "riccardo.carta2@studio.unibo.it",1,
 "Se vuoi partecipo, gioco spesso la sera dalle 21 in poi.");

-- comments on post (giulia,3)
INSERT INTO COMMENTO VALUES
("giulia.romano@studio.unibo.it",3,
 "francesco.gallo@studio.unibo.it",1,
 "Dead Cells ha run brevi perfette per eventi veloci, ottima idea per il torneo.");

-- comments on post (matteo,3)
INSERT INTO COMMENTO VALUES
("matteo.greco@studio.unibo.it",3,
 "marco.battistini10@studio.unibo.it",1,
 "Per GT7 potremmo avere categorie stock vs modded.");

-- comments on post (riccardo,2)
INSERT INTO COMMENTO VALUES
("riccardo.carta2@studio.unibo.it",2,
 "stefano.desantis@studio.unibo.it",1,
 "Elden Ring merita il massimo per l\'esplorazione e la profondità del combattimento.");

-- comments on post (francesco,4)
INSERT INTO COMMENTO VALUES
("francesco.gallo@studio.unibo.it",4,
 "chiara.moretti@studio.unibo.it",1,
 "Posso testare la tua mod e darti feedback sulla compatibilità.");

-- =====================
-- MESSAGGI PRIVATI (aggiuntivi) + riceve
-- =====================
INSERT INTO MESSAGGIO VALUES
(4,"Vorresti fare una live con me questo sabato?","chiara.moretti@studio.unibo.it","2025-01-28"),
(5,"Hai voglia di provare la build tank per il raid di venerdì?","stefano.desantis@studio.unibo.it","2025-01-28"),
(6,"Posso dare un\'occhiata alla tua mod per bug?","francesco.gallo@studio.unibo.it","2025-01-29"),
(7,"Organizziamo la bracket del torneo speedrun: chi è disponibile?","marco.battistini10@studio.unibo.it","2025-01-30"),
(8,"Ti mando le impostazioni della mia wheel per GT7.","matteo.greco@studio.unibo.it","2025-01-30");

INSERT INTO riceve VALUES
(4,"giulia.romano@studio.unibo.it","2025-01-28"),
(5,"stefano.desantis@studio.unibo.it","2025-01-28"),
(6,"marco.battistini10@studio.unibo.it","2025-01-29"),
(7,"giorgio.bianchi@studio.unibo.it","2025-01-30"),
(8,"marco.rinaldi@studio.unibo.it","2025-01-30");



-- =====================
-- ISCRIZIONI TORNEI (aggiuntive, coerenti con TORNEI esistenti)
-- =====================
INSERT INTO iscrizione VALUES
(00002,1,"giorgio.bianchi@studio.unibo.it"), -- Hades
(00002,1,"alessandro.ferri@studio.unibo.it"),
(00018,3,"giulia.romano@studio.unibo.it"),   -- Gran Turismo 7
(00018,3,"matteo.greco@studio.unibo.it"),
(000010,2,"riccardo.carta2@studio.unibo.it"); -- Disco Elysium tournament

