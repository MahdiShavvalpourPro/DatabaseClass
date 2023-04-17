---  Create Tables  ---
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_ContactUs`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Mobile VARCHAR(11),
    Email VARCHAR(70),
    Title VARCHAR(100),
    Messages VARCHAR(500)
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Users`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Username VARCHAR (11),
    Password VARCHAR (100),
    Status Enum('Active', 'DisActive', 'Remove'),
    Email VARCHAR(70),
    Image VARCHAR(500)
);

Create Table IF NOT EXISTS `CarpetStore_db`.`Tbl_Customers`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Username VARCHAR (11),
    Password VARCHAR (100),
    Status Enum('Active', 'DisActive', 'Remove'),
    Email VARCHAR(70),
    Address_Id INT,
    ContactInfo_Id INT
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Addresses` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    City VARCHAR (50),
    Province VARCHAR(50),
    Alley VARCHAR(50),
    Plaque VARCHAR(5),
    Floor VARCHAR(1)
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`ContactInfos`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Invoices` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    InvoiceDate VARCHAR(20),
    Customer_Id INT,
    Product_Id INT,
    Quantity INT
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Products` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Code VARCHAR(10),
    Price INT,
    Color_Id INT,
    Dimension_Id INT,
    Design_Id INT
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_UserRoles`(
	Role_Id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	User_Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Roles`(
	Id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Name VARCHAR(50)
);