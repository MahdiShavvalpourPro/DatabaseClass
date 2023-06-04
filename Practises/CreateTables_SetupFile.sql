CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_ContactUs`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Mobile VARCHAR(11) NOT NULL,
    Email VARCHAR(70),
    Title VARCHAR(100) NOT NULL,
    Messages VARCHAR(500) NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Users`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Username VARCHAR (11) NOT NULL,
    Password VARCHAR (100) NOT NULL,
    Status Enum('Active', 'DisActive', 'Remove') NOT NULL,
    Email VARCHAR(70),
    Image VARCHAR(500),
    UserTypeId INT NOT NULL,
    FOREIGN KEY (UserTypeId) REFERENCES Tbl_UserType(Id)
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_UserType`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserType VARCHAR(50) NOT NULL,
    Descriptions VARCHAR(150) NOT NULL
);
Create Table IF NOT EXISTS `CarpetStore_db`.`Tbl_Customers`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Username VARCHAR (11) NOT NULL,
    Password VARCHAR (100) NOT NULL,
    Status Enum('Active', 'DisActive', 'Remove') NOT NULL,
    Email VARCHAR(70),
    Address_Id INT,
    ContactInfo_Id INT
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Addresses` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    City VARCHAR (50) NOT NULL,
    Province VARCHAR(50) NOT NULL,
    Alley VARCHAR(50) NOT NULL,
    Plaque VARCHAR(5) NOT NULL,
    Floor VARCHAR(1) NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_ContactInfos`(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50) NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Invoices` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    InvoiceDate VARCHAR(20) NOT NULL,
    Customer_Id INT NOT NULL,
    Product_Id INT NOT NULL,
    Quantity INT NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Products` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Code VARCHAR(10) NOT NULL,
    Price Decimal NOT NULL,
    Count INT NOT NULL,
    Color_Id INT NOT NULL,
    Dimension_Id INT NOT NULL,
    Density_Id INT NOT NULL,
    Design_Id INT NOT NULL,
    User_Id INT NOT NULL,
    Categoru_Id INT NOT NULL,
    Status bit NOT NULL,
    FOREIGN KEY (`Design_Id`) REFERENCES `tbl_designs`(`Id`)
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Colors` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ColorName VARCHAR(30) NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Dimentions` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Dimension INT NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Densities` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Density INT NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Designs` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DesignName VARCHAR(30)
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_Categories` (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Category VARCHAR(80),
    Descriptions VARCHAR(150) NOT NULL
);
CREATE TABLE IF NOT EXISTS `CarpetStore_db`.`Tbl_InvoiceItems` (
    InvoiceId INT NOT NULL,
    ProductId INT NOT NULL,
    Quantity INT NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY (InvoiceId, ProductId)
);