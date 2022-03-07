/*Database*/
CREATE DATABASE stonks;

/*Users table*/
CREATE TABLE users(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
      username VARCHAR(250) NOT NULL,
      passphrase VARCHAR(250) NOT NULL
);

/*Tokens Table*/
CREATE TABLE tokens (
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      userid int(100) NOT NULL REFERENCES users(id),
      token VARCHAR(64) NOT NULL
);

/*Notes Table*/
CREATE TABLE notes(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid int(100) NOT NULL REFERENCES users(id),
    title VARCHAR(64) NOT NULL,
    notes VARCHAR(690) NOT NULL
);