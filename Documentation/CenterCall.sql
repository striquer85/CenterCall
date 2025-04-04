DROP DATABASE IF EXISTS Centercall;

CREATE DATABASE IF NOT EXISTS Centercall;
USE Centercall;
# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   ID_UTILISATEUR SMALLINT NOT NULL AUTO_INCREMENT ,
   IDENTIFIANT CHAR(20) NULL  ,
   MOT_DE_PASSE CHAR(20) NULL  ,
   ROLE SMALLINT NULL  
   , PRIMARY KEY (ID_UTILISATEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   ID_CLIENT SMALLINT NOT NULL AUTO_INCREMENT ,
   ID_UTILISATEUR SMALLINT NOT NULL  ,
   RAISON_SOCIALE VARCHAR(25) NULL  ,
   NOM CHAR(20) NULL  ,
   PRENOM CHAR(20) NULL  ,
   EMAIL CHAR(32) NULL  ,
   TELEPHONE INTEGER NULL  ,
   ADRESSE CHAR(32) NULL  ,
   CODE_POSTAL INTEGER NULL  ,
   VILLE CHAR(32) NULL  
   , PRIMARY KEY (ID_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CLIENT
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_CLIENT_UTILISATEUR
     ON CLIENT (ID_UTILISATEUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : QUESTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS QUESTION
 (
   ID_QUESTION SMALLINT NOT NULL AUTO_INCREMENT ,
   ID_CAMPAGNE SMALLINT NOT NULL  ,
   QUESTION VARCHAR(500) NULL  ,
   TOTAL_R PONSES_1 INTEGER NULL  ,
   TOTAL_R PONSES_2 INTEGER NULL  ,
   TOTAL_R PONSES_3 INTEGER NULL  ,
   TOTAL_R PONSES_4 INTEGER NULL  ,
   TOTAL_R PONSES_5 INTEGER NULL  
   , PRIMARY KEY (ID_QUESTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE QUESTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_QUESTION_CAMPAGNE
     ON QUESTION (ID_CAMPAGNE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CAMPAGNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CAMPAGNE
 (
   ID_CAMPAGNE SMALLINT NOT NULL AUTO_INCREMENT ,
   ID_CLIENT SMALLINT NOT NULL  ,
   DATE DATE NULL  ,
   TITRE CHAR(32) NULL  ,
   LIBELLE CHAR(60) NULL  ,
   CONTACTS VARCHAR(34463) NULL  
   , PRIMARY KEY (ID_CAMPAGNE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CAMPAGNE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CAMPAGNE_CLIENT
     ON CAMPAGNE (ID_CLIENT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE CLIENT 
  ADD FOREIGN KEY FK_CLIENT_UTILISATEUR (ID_UTILISATEUR)
      REFERENCES UTILISATEUR (ID_UTILISATEUR) ;


ALTER TABLE QUESTION 
  ADD FOREIGN KEY FK_QUESTION_CAMPAGNE (ID_CAMPAGNE)
      REFERENCES CAMPAGNE (ID_CAMPAGNE) ;


ALTER TABLE CAMPAGNE 
  ADD FOREIGN KEY FK_CAMPAGNE_CLIENT (ID_CLIENT)
      REFERENCES CLIENT (ID_CLIENT) ;

