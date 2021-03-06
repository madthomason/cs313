INSERT INTO pantry.person (name, email, password)
	VALUES 	('Madeline', 'tho16031@byui.edu'),
			('Sue', 'sue@byui.edu'),
			('Bob', 'bob@byui.edu');
 
INSERT INTO pantry.cupboard (person_id, name, description)
	VALUES 	(1, 'Snacks', 'Non meal items'),
			(1, 'Dried', 'Rice, Peas, Beans, and Barley Grow'),
			(1, 'Canned', 'Food Storage'),
			(2, 'Snacks', 'Mine!'),
			(2, 'Dried', 'Dried foods'),
			(3, 'Sweets', 'Yummy');

 

/* pantry.quantity_type 
(0, 'lbs'),
(1, 'kg'),
(2, 'individual');*/

 INSERT INTO pantry.item (cupboard_id, name, quantity, quantity_type_id, restock_quantity)
	VALUES 	(13, 'Pretzels', 2, 2, 1),
			(14, 'Rice', 25, 0, 3),
			(15, 'Pasta Sauce', 5, 2, 1),
			(13, 'Popcorn', 1, 0, .5),
			(14, 'Pinto Beans', 23, 0, 3),
			(15, 'Cream of Chicken Soup', 3, 2, 1),
			(16, 'Pretzels', 2, 2, 1),
			(17, 'Rice', 25, 0, 3),
			(16, 'Popcorn', 1, 0, .5),
			(17, 'Pinto Beans', 23, 0, 3);


ALTER TABLE pantry.person ADD COLUMN password varchar(255);

UPDATE pantry.person
SET password = 'hellopostgresql'
WHERE
 id = 1;
 
UPDATE pantry.person
SET password = 'chipsandsalsa'
WHERE
 id = 2;
 
UPDATE pantry.person
SET password = 'abc123'
WHERE
 id = 3;

ALTER TABLE pantry.person
ALTER COLUMN password SET NOT NULL;

