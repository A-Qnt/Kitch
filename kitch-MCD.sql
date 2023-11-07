#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: kitch_album
#------------------------------------------------------------

CREATE TABLE kitch_album(
        album_id          Int  Auto_increment  NOT NULL ,
        album_title       Varchar (50) NOT NULL ,
        album_release     Date NOT NULL ,
        album_description Varchar (250) NOT NULL ,
        album_cover       Varchar (50) NOT NULL
	,CONSTRAINT kitch_album_PK PRIMARY KEY (album_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: kitch_news
#------------------------------------------------------------

CREATE TABLE kitch_news(
        news_id      Int  Auto_increment  NOT NULL ,
        news_title   Varchar (50) NOT NULL ,
        news_date    Date NOT NULL ,
        news_content Varchar (500) NOT NULL ,
        news_picture Varchar (50) NOT NULL
	,CONSTRAINT kitch_news_PK PRIMARY KEY (news_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: kitch_tour
#------------------------------------------------------------

CREATE TABLE kitch_tour(
        tour_id      Int  Auto_increment  NOT NULL ,
        tour_date    Date NOT NULL ,
        tour_city    Varchar (50) NOT NULL ,
        tour_country Varchar (50) NOT NULL ,
        tour_room    Varchar (50) NOT NULL
	,CONSTRAINT kitch_tour_PK PRIMARY KEY (tour_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: kitch_tracks
#------------------------------------------------------------

CREATE TABLE kitch_tracks(
        track_id     Int  Auto_increment  NOT NULL ,
        track_number Int NOT NULL ,
        track_title  Varchar (50) NOT NULL ,
        album_id     Int NOT NULL
	,CONSTRAINT kitch_tracks_PK PRIMARY KEY (track_id)

	,CONSTRAINT kitch_tracks_kitch_album_FK FOREIGN KEY (album_id) REFERENCES kitch_album(album_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: kitch_member
#------------------------------------------------------------

CREATE TABLE kitch_member(
        member_id        Int  Auto_increment  NOT NULL ,
        member_firstname Varchar (50) NOT NULL ,
        member_lastname  Varchar (50) NOT NULL ,
        member_role      Varchar (50) NOT NULL ,
        member_age       Int NOT NULL
	,CONSTRAINT kitch_member_PK PRIMARY KEY (member_id)
)ENGINE=InnoDB;

