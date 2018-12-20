/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  20/12/2018 01:36:27                      */
/*==============================================================*/


drop table if exists ARC;

drop table if exists BLASON;

drop table if exists ENTRAINEMENT;

drop table if exists FLECHE;

drop table if exists SERIE;

drop table if exists USERS;

drop table if exists VOLEE;

/*==============================================================*/
/* Table : ARC                                                  */
/*==============================================================*/
create table ARC
(
   ID_ARC               int not null auto_increment,
   ID_USER              int not null,
   NOMARC               varchar(20) not null,
   POIDSARC             tinyint not null,
   TAILLEARC            tinyint not null,
   PWRARC               tinyint not null,
   TYPEARC              varchar(50) not null,
   PHOTOARC             varchar(1024),
   COMMARC              varchar(100),
   primary key (ID_ARC)
);

/*==============================================================*/
/* Table : BLASON                                               */
/*==============================================================*/
create table BLASON
(
   ID_BLAS              int not null auto_increment,
   ID_USER              int not null,
   NOMBLAS              varchar(20) not null,
   TAILLEBLAS           tinyint not null,
   PHOTOBLAS            varchar(1024),
   primary key (ID_BLAS)
);

/*==============================================================*/
/* Table : ENTRAINEMENT                                         */
/*==============================================================*/
create table ENTRAINEMENT
(
   ID_ENT_USER          int not null auto_increment,
   ID_USER              int not null,
   ID_ARC               int not null,
   ID_BLAS              int not null,
   ID_ENT               int not null,
   NOM_ENT              varchar(30) not null,
   LIEU_ENT             varchar(200) not null,
   DATE_ENT             datetime not null,
   DIST_ENT             tinyint not null,
   NBR_SERIE            int not null,
   NBR_VOLEE            int not null,
   NBR_FLECHES          tinyint not null,
   PTS_TOTAL            smallint,
   PCT_DIX              float,
   PCT_NEUF             float,
   MOY_ENT              real,
   STATUT_ENT           bool not null,
   primary key (ID_ENT_USER)
);

/*==============================================================*/
/* Table : FLECHE                                               */
/*==============================================================*/
create table FLECHE
(
   ID_FLECHE            int not null auto_increment,
   ID_VOL               int not null,
   NUMFLECHE            int not null,
   PTSFLECHE            smallint,
   primary key (ID_FLECHE)
);

/*==============================================================*/
/* Table : SERIE                                                */
/*==============================================================*/
create table SERIE
(
   ID_SERIE             int not null auto_increment,
   ID_ENT_USER          int not null,
   NUMSERIE             int not null,
   PTSSERIE             smallint,
   NBRVOLSERIE          tinyint not null,
   MOYSERIE             real,
   PCTDIXSERIE          real,
   PCTHUITSERIE         real,
   primary key (ID_SERIE)
);

/*==============================================================*/
/* Table : USERS                                                */
/*==============================================================*/
create table USERS
(
   ID_USER              int not null auto_increment,
   PSEUDO               varchar(20) not null,
   PASSWORD             varchar(50) not null,
   NOM                  varchar(20),
   PRENOM               varchar(20),
   CLUB                 varchar(20),
   primary key (ID_USER)
);

/*==============================================================*/
/* Table : VOLEE                                                */
/*==============================================================*/
create table VOLEE
(
   ID_VOL               int not null auto_increment,
   ID_SERIE             int not null,
   NUMVOLEE             int not null,
   PTSVOL               smallint,
   NBRFLECHEVOL         tinyint not null,
   MOYVOL               real,
   PCTDIXVOL            real,
   PCTHUITVOL           real,
   primary key (ID_VOL)
);

alter table ARC add constraint FK_POSSEDE_BLASON2 foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table BLASON add constraint FK_POSSEDE_BLASON foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_POSSEDE_ENTRAINEMENT foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_UTILISE foreign key (ID_ARC)
      references ARC (ID_ARC) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_UTILISE2 foreign key (ID_BLAS)
      references BLASON (ID_BLAS) on delete restrict on update restrict;

alter table FLECHE add constraint FK_COMPOSEE4 foreign key (ID_VOL)
      references VOLEE (ID_VOL) on delete restrict on update restrict;

alter table SERIE add constraint FK_COMPOSEE foreign key (ID_ENT_USER)
      references ENTRAINEMENT (ID_ENT_USER) on delete restrict on update restrict;

alter table VOLEE add constraint FK_COMPOSEE3 foreign key (ID_SERIE)
      references SERIE (ID_SERIE) on delete restrict on update restrict;

