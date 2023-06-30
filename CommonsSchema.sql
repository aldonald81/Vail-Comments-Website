DROP SCHEMA IF EXISTS CommonsSchema;
CREATE SCHEMA CommonsSchema;
USE CommonsSchema;


CREATE TABLE Users 
(
	fName		VARCHAR(50),
	lName		VARCHAR(50),
	classYear	INT,
	email		VARCHAR(50),
	code 		INT,
	PRIMARY KEY (email)
);

-- INSERT INTO Users (fName, lName, classYear, email) VALUES('Alexander', 'Donald', 2023, 'aldonald@davidson.edu');
-- INSERT INTO Users (fName, lName, classYear, email) VALUES('Evan', 'Pritchard', 2022, 'evpritch@davidson.edu');
-- INSERT INTO Users (fName, lName, classYear, email) VALUES('Caden', 'Bonofski', 2023, 'cabono@davidson.edu');
-- INSERT INTO Users (fName, lName, classYear, email) VALUES('Cole', 'Foley', 2022, 'cofoley@davidson.edu');


CREATE TABLE Meals
(
	mealId		INT AUTO_INCREMENT,
	mealName	VARCHAR(50),
	mealType	VARCHAR(50),
	mealPeriod	VARCHAR(50),
	station		VARCHAR(50),
	score		INT,
	mealDate		DATE,
	#mealId		INT AUTO_INCREMENT,
	PRIMARY KEY (mealId)
	#KEEP this to identify meals that are liked by users
	#PRIMARY KEY (mealName, mealDate)
);

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Chicken Parm', 'main', 'lunch', 'express', 104, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Basil Chicken', 'main', 'dinner', 'express', 44, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Pasta Bar', 'main', 'dinner', 'dujour', -22, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Taco Bowl', 'main', 'dinner', 'grill', 14, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Green Beans', 'side', 'lunch', 'express', 12, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Seasonal Vegetables', 'side', 'dinner', 'express', -66, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Scoopie', 'dessert', 'dinner', 'dessert', 122, '2021-11-19');
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Ice Cream', 'dessert', 'lunch', 'dessert', 21, '2021-11-19');

CREATE TABLE FavoriteMeals
(
	email 		VARCHAR(50),
	mealName	VARCHAR(50),
	alert		BOOLEAN,
	# OR mealName???? Only want to include each meal once meaning unique
	FOREIGN KEY (email) REFERENCES Users(email)
);

CREATE TABLE Comments 
(
	email 		VARCHAR(50),
	comment		VARCHAR(2000),
	commentDate DATE,
	FOREIGN KEY(email) REFERENCES Users(email)
);

-- INSERT INTO FavoriteMeals VALUES('aldonald@davidson.edu', 1);
-- INSERT INTO FavoriteMeals VALUES('aldonald@davidson.edu', 3);
-- INSERT INTO FavoriteMeals VALUES('evpritch@davidson.edu', 1);
-- INSERT INTO FavoriteMeals VALUES('cofoley@davidson.edu', 2);

