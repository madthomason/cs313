CREATE SCHEMA pantry;
 
SET search_path TO pantry, public;
 
 CREATE TABLE pantry.person (
 id    serial PRIMARY KEY,
 name  varchar(45),
 email varchar(80) NOT NULL);
 
 CREATE TABLE pantry.cupboard (
 id    			serial PRIMARY KEY,
 person_id     	int REFERENCES person (id),
 name  			varchar(80) NOT NULL,
 description   	varchar(500));
 
 CREATE TABLE pantry.quantity_type (
 id    			int PRIMARY KEY,
 measurement  	varchar(45) NOT NULL); 
 
 INSERT INTO pantry.quantity_type 
 VALUES (0, 'lbs'),
		(1, 'kg'),
		(2, 'individual');

 CREATE TABLE pantry.item (
 id    			serial PRIMARY KEY,
 cupboard_id 			int REFERENCES cupboard (id),
 name  			varchar(80) NOT NULL,
 quantity  	    real NOT NULL,
 quantity_type_id      int REFERENCES quantity_type (id),
 restock_quantity      real,
 notification  date);

