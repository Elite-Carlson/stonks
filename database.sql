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
      uid VARCHAR(250) NOT NULL REFERENCES users(id),
      token VARCHAR(64) NOT NULL
);
