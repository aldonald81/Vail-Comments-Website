-- Inserting meals for a specific date 

-- DATE
SET @date := '2022-01-24';  -- CHANGE
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
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sausage Links', 'side', @mealPeriod, @station, @score, @date);
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

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Beef Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Black Bean Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Chicken Nuggets', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Turkey Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('French Fries', 'side', @mealPeriod, @station, @score, @date);


-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sliced Pork Loin', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Spicy Vegetable Tagine', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Brown Rice', 'side', @mealPeriod, @station, @score, @date);



-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sesame Noodles W/ Chile Oil and Scallion', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Jasmine Rice', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Spicy Bean Curd With Vegetables', 'side', @mealPeriod, @station, @score, @date);


-- DINNER ----------------------------------
SET @mealPeriod := 'dinner';

-- Du Jour
SET @station := 'Du Jour';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Taco Bowl', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';

-- INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Ravioli Bar', 'main', @mealPeriod, @station, 83, @date);



-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Salmon w/ Mango Tomato Salsa', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Mushroom Lentil Barley Ragout', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('White and Wild Rice Blend', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Carrot Coints', 'side', @mealPeriod, @station, @score, @date);


-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Multi-Vegetable Paella', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Garlic Pinto Beans', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oven Roasted Vegetables', 'side', @mealPeriod, @station, @score, @date);


-- next day --------------------------------------------------------------------

-- DATE
SET @date := '2022-01-25';  -- CHANGE
SET @score := 0;

-- Use for case of re-running this
-- DELETE FROM Meals WHERE mealDate = @date;

-- BREAKFAST ----------------------------------
SET @mealPeriod := 'breakfast';

-- Grill item
SET @station := 'Grill';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Custom Pancakes', 'main', @mealPeriod, @station, @score, @date);


-- Express items
SET @station := 'Express';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Cage-Free Hard Boiled Egg', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Scrambled Eggs', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Crispy Bacon', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oatmeal', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Grits', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tater Puffs', 'side', @mealPeriod, @station, @score, @date);

-- LUNCH ----------------------------------
SET @mealPeriod := 'lunch';

-- Du Jour
SET @station := 'Du Jour';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tomato Soup Bar', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Beef Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Black Bean Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Chicken Nuggets', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Turkey Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('French Fries', 'side', @mealPeriod, @station, @score, @date);


-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Fried Chicken', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Macaroni and Cheese', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oven Roasted Red Potatoes', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Saute Cabbage', 'side', @mealPeriod, @station, @score, @date);


-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Panang Tofu Curry', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Jasmine Rice', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Blistered Green Beans with Garlic', 'side', @mealPeriod, @station, @score, @date);


-- DINNER ----------------------------------
SET @mealPeriod := 'dinner';

-- Du Jour
SET @station := 'Du Jour';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Taco Bowl', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';

-- INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Ravioli Bar', 'main', @mealPeriod, @station, 83, @date);



-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Harissa Marinated Beef', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tomato Corn Tart', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Couscous', 'side', @mealPeriod, @station, @score, @date);


-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Vegetable Pad Thai', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('White and Wild Rice Blend', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sweet Coconut-Ginger Corn', 'side', @mealPeriod, @station, @score, @date);


-- next day --------------------------------------------------------------------

-- DATE
SET @date := '2022-01-26';  -- CHANGE
SET @score := 0;

-- Use for case of re-running this
-- DELETE FROM Meals WHERE mealDate = @date;

-- BREAKFAST ----------------------------------
SET @mealPeriod := 'breakfast';

-- Grill item
SET @station := 'Grill';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Custom Biscuit Bar', 'main', @mealPeriod, @station, @score, @date);


-- Express items
SET @station := 'Express';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Cage-Free Hard Boiled Egg', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Scrambled Eggs', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Sausage Pork Patty', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Oatmeal', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Grits', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tater Coins', 'side', @mealPeriod, @station, @score, @date);

-- LUNCH ----------------------------------
SET @mealPeriod := 'lunch';

-- Du Jour
SET @station := 'Du Jour';
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Tomato Soup Bar', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Beef Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Black Bean Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Chicken Nuggets', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Turkey Burger Patty', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('French Fries', 'side', @mealPeriod, @station, @score, @date);


-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Mongolian Scallion Beef', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Vegetable Spring Roll', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Jasmine Rice', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Edamame', 'side', @mealPeriod, @station, @score, @date);


-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Baked Mediterranean Vegetables', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Lentil and Rice', 'side', @mealPeriod, @station, @score, @date);


-- DINNER ----------------------------------
SET @mealPeriod := 'dinner';

-- Du Jour
SET @station := 'Du Jour';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Taco Bowl', 'main', @mealPeriod, @station, @score, @date);


-- Grill
SET @station := 'Grill';

-- INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Ravioli Bar', 'main', @mealPeriod, @station, 83, @date);



-- Express
SET @station := 'Express';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Jerk Chicken with Mojo Sauce', 'main', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Black Bean and Pepper Ragout', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Cilantro Rice', 'side', @mealPeriod, @station, @score, @date);


-- Power Plant
SET @station := 'Power Plant';

INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Dal Saag', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Basmati Rice', 'side', @mealPeriod, @station, @score, @date);
INSERT INTO Meals (mealName, mealType, mealPeriod, station, score, mealDate) VALUES('Stir-Fried Mushrooms with Garlic and Tomatoes', 'side', @mealPeriod, @station, @score, @date);

