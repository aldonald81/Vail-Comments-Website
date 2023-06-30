-- Inserting meals for a specific date 

-- DATE
SET @date := '2022-02-21';  -- CHANGE
SET @score := 0;

-- Use for case of re-running this
-- DELETE FROM Meals WHERE mealDate = @date;

-- BREAKFAST ----------------------------------
SET @mealPeriod := 'breakfast';

-- Grill item
SET @station := 'Grill';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Custom Waffles', 'main', @mealPeriod, @station, @score, @date);


-- Express items
SET @station := 'Express';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Cage-Free Hard Boiled Egg', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Scrambled Eggs', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Crispy Bacon', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oatmeal', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Grits', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sweet Potato Nuggets', 'side', @mealPeriod, @station, @score, @date);



-- LUNCH ----------------------------------
SET @mealPeriod := 'lunch';

-- Du Jour
SET @station := 'Du Jour';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tomato Soup Bar', 'main', @mealPeriod, @station, @score, @date);



-- Grill
SET @station := 'Grill';

SET @station := 'Grill';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('French Fries', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Black Bean Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Turkey Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Beef Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Chicken Nuggets', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Grilled Chicken', 'main', @mealPeriod, @station, @score, @date);






-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sliced Pork Loin', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Spicy Vegetable Tagin', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Brown Rice', 'side', @mealPeriod, @station, @score, @date);




-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Jasmine Rice', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Spicy Bean Curd With Vegetables', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sesame Rice Noodles with Chili Oil and Scallion', 'side', @mealPeriod, @station, @score, @date);





-- DINNER ----------------------------------
SET @mealPeriod := 'dinner';

-- Du Jour
SET @station := 'Du Jour';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tostada Bar', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Pasta Bar', 'main', @mealPeriod, @station, @score, @date);



-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Salmon with Mango Tomato Salsa', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Mushroom Lentil Barley Ragout', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('White and Wild Rice Blend', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Carrot Coins', 'side', @mealPeriod, @station, @score, @date);



-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Multi-Vegetable Paella', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Garlic Pinto Beans', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oven Roasted Root Vegetables', 'side', @mealPeriod, @station, @score, @date);








