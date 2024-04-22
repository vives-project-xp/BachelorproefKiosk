Create Database IF NOT EXISTS `db_kiosk`;
Use db_kiosk;
Create Table `fiche` (id int NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), studentNaam varchar(60) NOT NULL, bedrijf varchar(60) NOT NULL, titel varchar(60) NOT NULL, link varchar(60) NOT NULL, tekst varchar(4092) NOT NULL,  afbeelding1 varchar(60) NOT NULL, afbeelding2 varchar(60) NOT NULL, hashtags varchar(120) NOT NULL, richtingId int NOT NULL);
Create Table richting (id int Not NULL Auto_increment, Primary key (id), titel varchar(60) NOT NULL);
CREATE USER 'webuser'@'%' IDENTIFIED BY '******';
GRANT ALL PRIVILEGES ON db_kiosk.* TO 'webuser'@'%' WITH GRANT OPTION;
flush PRIVILEGES;