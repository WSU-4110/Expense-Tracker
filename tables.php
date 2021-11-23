<?php
        /* User table */
        $userQuery =
        'CREATE TABLE users(
            userID INT AUTO_INCREMENT NOT NULL,
            userName VARCHAR(20) NOT NULL,
            fName CHAR(25) NOT NULL,
            lName CHAR(25) NOT NULL,
            DOB DATE NOT NULL,
            PRIMARY KEY(userID),
            FOREIGN KEY(userName) REFERENCES authentication(userName)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $authQuery =
        'CREATE TABLE auth(
            userName CHAR(20) NOT NULL,
            pwd VARCHAR(20) NOT NULL,
            SQ1 VARCHAR(250) NOT NULL,
            SA1 VARCHAR(100) NOT NULL,
            SQ2 VARCHAR(250) NOT NULL,
            SA2 VARCHAR(100) NOT NULL,
            userID INT AUTO_INCREMENT NOT NULL,
            PRIMARY KEY(userName),
            FOREIGN KEY(userID) REFERENCES user(userID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';


        $businessQuery =
        'CREATE TABLE businesses(
            businessID AUTO_INCREMENT NOT NULL,
            businessName VARCHAR(100),
            userID INT AUTO_INCREMENT NOT NULL,
            PRIMARY KEY(businessID),
            FOREIGN KEY(userID) REFERENCES user(userID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
            
        $customerQuery =
        'CREATE TABLE customers(
            custID INT AUTO_INCREMENT NOT NULL,
            fName CHAR(25),
            lName CHAR(25),
            address VARCHAR(100),
            email VARCHAR(50) NOT NULL,
            phone VARCHAR(15),
            PRIMARY KEY(customerID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';    
            
        $catQuery = 
        'CREATE TABLE categories(
            catID INT AUTO_INCREMENT NOT NULL,
            catName VARCHAR(50) NOT NULL,
            catTypeID INT NOT NULL,
            PRIMARY KEY(catID),
            FOREIGN KEY(catTypeID) REFERENCES categoryType(catTypeID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $catTypeQuery =
        'CREATE TABLE categoryType(
            catTypeID INT AUTO_INCREMENT NOT NULL,
            catTypeName CHAR(10) NOT NULL,
            PRIMARY KEY(catTypeID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $sourceQuery =
        'CREATE TABLE sources(
            sourceID INT AUTO_INCREMENT NOT NULL,
            sourceName VARCHAR(100) NOT NULL,
            amount DECIMAL(65,2) NOT NULL,
            amountSign BOOLEAN NOT NULL,
            description VARCHAR(255),
            transID AUTO_INCREMENT NOT NULL,
            sourceTypeID INT AUTO_INCREMENT NOT NULL,
            PRIMARY KEY(sourceID),
            FOREIGN KEY(transID) REFERENCES transInfo(transID),
            FOREIGN KEY(sourceTypeID) REFERENCES sourceType(sourceTypeID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $sourceTypeQuery = 
        'CREATE TABLE sourceType(
            sourceTypeID INT AUTO_INCREMENT NOT NULL,
            sourceType CHAR(15),
            PRIMARY KEY(sourceTypeID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $transInfoQuery = 
        'CREATE TABLE transInfo(
            transID INT AUTO_INCREMENT NOT NULL,
            totalAmount DECIMAL(65,2) NOT NULL,
            totalAmountSign BOOLEAN NOT NULL,
            dateOfTransaction DATE,
            PRIMARY KEY(transID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
        
        $transQuery =
        'CREATE TABLE trans(
            transID INT AUTO_INCREMENT NOT NULL,
            catID INT AUTO_INCREMENT NOT NULL,
            userID INT AUTO_INCREMENT NOT NULL,
            businessID AUTO_INCREMENT NOT NULL,
            custID INT AUTO_INCREMENT NOT NULL,
            sourceID INT AUTO_INCREMENT NOT NULL,
            PRIMARY KEY(transID),
            FOREIGN KEY(transID) REFERENCES transInfo(transID),
            FOREIGN KEY(catID) REFERENCES categories(catID),
            FOREIGN KEY(userID) REFERENCES users(userID),
            FOREIGN KEY(businessID) REFERENCES businesses(businessID),
            FOREIGN KEY(custID) REFERENCES customers(custID),
            FOREIGN KEY(sourceID) REFERENCES sources(sourceID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

        ?>
