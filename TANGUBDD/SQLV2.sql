/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  02/11/2018 22:49:26                      */
/*==============================================================*/


alter table ARC 
   drop foreign key FK_ARC_POSSEDE_B_USERS;

alter table BLASON 
   drop foreign key FK_BLASON_POSSEDE_B_USERS;

alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_POSSEDE_E_USERS;

alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_UTILISE_ARC;

alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_UTILISE2_BLASON;

alter table FLECHE 
   drop foreign key FK_FLECHE_COMPOSEE4_VOLEE;

alter table SERIE 
   drop foreign key FK_SERIE_COMPOSEE_ENTRAINE;

alter table VOLEE 
   drop foreign key FK_VOLEE_COMPOSEE3_SERIE;


alter table ARC 
   drop foreign key FK_ARC_POSSEDE_B_USERS;

drop table if exists ARC;


alter table BLASON 
   drop foreign key FK_BLASON_POSSEDE_B_USERS;

drop table if exists BLASON;


alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_POSSEDE_E_USERS;

alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_UTILISE_ARC;

alter table ENTRAINEMENT 
   drop foreign key FK_ENTRAINE_UTILISE2_BLASON;

drop table if exists ENTRAINEMENT;


alter table FLECHE 
   drop foreign key FK_FLECHE_COMPOSEE4_VOLEE;

drop table if exists FLECHE;


alter table SERIE 
   drop foreign key FK_SERIE_COMPOSEE_ENTRAINE;

drop table if exists SERIE;

drop table if exists USERS;


alter table VOLEE 
   drop foreign key FK_VOLEE_COMPOSEE3_SERIE;

drop table if exists VOLEE;

/*==============================================================*/
/* Table : ARC                                                  */
/*==============================================================*/
create table ARC
(
   ID_ARC               int not null auto_increment  comment '',
   ID_USER              int not null  comment '',
   NOMARC               varchar(20) not null  comment '',
   POIDSARC             tinyint not null  comment '',
   TAILLEARC            tinyint not null  comment '',
   PWRARC               tinyint not null  comment '',
   TYPEARC              varchar(50) not null  comment '',
   PHOTOARC             varchar(1024)  comment '',
   primary key (ID_ARC)
);

/*==============================================================*/
/* Table : BLASON                                               */
/*==============================================================*/
create table BLASON
(
   ID_BLAS              int not null auto_increment  comment '',
   ID_USER              int not null  comment '',
   NOMBLAS              varchar(20) not null  comment '',
   TAILLEBLAS           tinyint not null  comment '',
   PHOTOBLAS            varchar(1024)  comment '',
   primary key (ID_BLAS)
);

/*==============================================================*/
/* Table : ENTRAINEMENT                                         */
/*==============================================================*/
create table ENTRAINEMENT
(
   ID_ENT               int not null auto_increment  comment '',
   ID_USER              int not null  comment '',
   ID_ARC               int not null  comment '',
   ID_BLAS              int not null  comment '',
   NOM_ENT              varchar(30)  comment '',
   LIEU_ENT             varchar(200) not null  comment '',
   DATE_ENT             datetime  comment '',
   DIST_ENT             tinyint not null  comment '',
   NBR_SERIE            int  comment '',
   NBR_VOLEE            int  comment '',
   NBR_FLECHES          tinyint  comment '',
   PTS_TOTAL            smallint  comment '',
   PCT_DIX              float  comment '',
   PCT_NEUF             float  comment '',
   MOY_ENT              real  comment '',
   STATUT_ENT           bool not null  comment '',
   primary key (ID_ENT)
);

/*==============================================================*/
/* Table : FLECHE                                               */
/*==============================================================*/
create table FLECHE
(
   ID_FLECHE            int not null auto_increment  comment '',
   ID_VOL               int not null  comment '',
   PTSFLECHE            smallint not null  comment '',
   primary key (ID_FLECHE)
);

/*==============================================================*/
/* Table : SERIE                                                */
/*==============================================================*/
create table SERIE
(
   ID_SERIE             int not null auto_increment  comment '',
   ID_ENT               int not null  comment '',
   PTSSERIE             smallint not null  comment '',
   NBRVOLSERIE          tinyint not null  comment '',
   MOYSERIE             real not null  comment '',
   PCTDIXSERIE          real not null  comment '',
   PCTHUITSERIE         real not null  comment '',
   primary key (ID_SERIE)
);

/*==============================================================*/
/* Table : USERS                                                */
/*==============================================================*/
create table USERS
(
   ID_USER              int not null auto_increment  comment '',
   PSEUDO               varchar(20) not null  comment '',
   PASSWORD             varchar(50) not null  comment '',
   NOM                  varchar(20)  comment '',
   PRENOM               varchar(20)  comment '',
   CLUB                 varchar(20)  comment '',
   primary key (ID_USER)
);

/*==============================================================*/
/* Table : VOLEE                                                */
/*==============================================================*/
create table VOLEE
(
   ID_VOL               int not null auto_increment  comment '',
   ID_SERIE             int not null  comment '',
   PTSVOL               smallint not null  comment '',
   NBRFLECHEVOL         tinyint not null  comment '',
   MOYVOL               real not null  comment '',
   PCTDIXVOL            real not null  comment '',
   PCTHUITVOL           real not null  comment '',
   primary key (ID_VOL)
);

alter table ARC add constraint FK_ARC_POSSEDE_B_USERS foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table BLASON add constraint FK_BLASON_POSSEDE_B_USERS foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_ENTRAINE_POSSEDE_E_USERS foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_ENTRAINE_UTILISE_ARC foreign key (ID_ARC)
      references ARC (ID_ARC) on delete restrict on update restrict;

alter table ENTRAINEMENT add constraint FK_ENTRAINE_UTILISE2_BLASON foreign key (ID_BLAS)
      references BLASON (ID_BLAS) on delete restrict on update restrict;

alter table FLECHE add constraint FK_FLECHE_COMPOSEE4_VOLEE foreign key (ID_VOL)
      references VOLEE (ID_VOL) on delete restrict on update restrict;

alter table SERIE add constraint FK_SERIE_COMPOSEE_ENTRAINE foreign key (ID_ENT)
      references ENTRAINEMENT (ID_ENT) on delete restrict on update restrict;

alter table VOLEE add constraint FK_VOLEE_COMPOSEE3_SERIE foreign key (ID_SERIE)
      references SERIE (ID_SERIE) on delete restrict on update restrict;

