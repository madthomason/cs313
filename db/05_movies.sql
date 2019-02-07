CREATE TABLE actor (
id SERIAL PRIMARY KEY,
name VARCHAR(45) NOT NULL
);

CREATE TABLE movie (
id SERIAL PRIMARY KEY,
title VARCHAR(100) NOT NULL,
year SMALLINT
 
);

CREATE actor_movie (
id SERIAL PRIMARY KEY,
actor_id INT REFERENCES actor (id),
movie_id INT REFERENCES movie (id)
);



