CREATE TABLE Comments 
(
	email 		VARCHAR(50),
	comment		VARCHAR(2000),
	commentDate DATE,
	FOREIGN KEY(email) REFERENCES Users(email)
);