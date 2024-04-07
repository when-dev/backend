-- mysql -u uXXXXX -p
-- password

CREATE TABLE Languages
(
    id   int(128) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(128)     not null default ''
);

CREATE TABLE Applications
(
    id        int(128) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fio       varchar(128)     not null default '',
    telephone varchar(128)     not null default '',
    email     varchar(128)     not null default '',
    birthday  DATE,
    sex       varchar(128)     not null default '',
    biography varchar(128)     not null default ''
);

CREATE TABLE LanguageApplications
(
    id          int(128) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    application_id     int(128) unsigned NOT NULL,
    language_id int(128) unsigned NOT NULL
);

INSERT INTO Languages(id, title)
VALUES (1, 'JAVA');
INSERT INTO Languages(id, title)
VALUES (2, 'C++');
INSERT INTO Languages(id, title)
VALUES (3, 'Pascal');
INSERT INTO Languages(id, title)
VALUES (4, 'C#');
INSERT INTO Languages(id, title)
VALUES (5, 'JavaScript');
INSERT INTO Languages(id, title)
VALUES (6, 'PHP');
INSERT INTO Languages(id, title)
VALUES (7, 'Python');
INSERT INTO Languages(id, title)
VALUES (8, 'Haskel');
INSERT INTO Languages(id, title)
VALUES (9, 'Clojure');
INSERT INTO Languages(id, title)
VALUES (10, 'Prolog');
INSERT INTO Languages(id, title)
VALUES (11, 'Scala');