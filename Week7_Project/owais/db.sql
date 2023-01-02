CREATE DATABASE bankdatabase;

CREATE TABLE customer_details(
    id SERIAL PRIMARY KEY,
    accountType VARCHAR(50) NOT NULL,
    title VARCHAR(10) NOT NULL,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    dateOfBirth VARCHAR(50) NOT NULL,
    gender VARCHAR(100) NOT NULL,
    mobileNumber VARCHAR(50) NOT NULL,
    eMailId VARCHAR(100) NOT NULL,
    streetAddress VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    pincode VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    aadharNumber VARCHAR(50) NOT NULL,
    panNumber VARCHAR(50) NOT NULL
);

ALTER TABLE customer_details ADD accoutnumber VARCHAR(10);

CREATE TABLE user_credentials(
    id SERIAL PRIMARY KEY,
    userName VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    userId INT references customer_details(id) NOT NULL
);


ALTER TABLE customer_details DROP COLUMN userId, DROP COLUMN password, DROP COLUMN confirmPassword;

INSERT INTO customer_details
VALUES(1,'SavingsAccount','Mr','Owais','Ahmed','04-12-2001','Male','9391402607','owaizahmed7799@gmail.com','9-234MasabTank','Hyderabad','Telangana','500045','India','93340260731','ABCDE1234R','owais687','Owais@9123','Owais@9123');

CREATE TABLE account_details(
    id SERIAL PRIMARY KEY,
    accoutnumber VARCHAR(100) NOT NULL,
    ifsccode VARCHAR(100) NOT NULL,
    accounts_id INT references customer_details(id)
);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(1,'41211106420','PXBK0008617',1);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(2,'41211106542','PXBK0008617',2);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(3,'41211106678','PXBK0008617',3);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(4,'41211106902','PXBK0008617',4);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(5,'41211107240','PXBK0008617',5);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(6,'525211930120','PXBK0061790',6);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(7,'525211933454','PXBK0061790',7);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(8,'525211936891','PXBK0061790',8);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(9,'525211937400','PXBK0061790',9);

INSERT INTO account_details(id,accoutnumber,ifsccode,accounts_id)
VALUES(10,'525211935210','PXBK0061790',10);



CREATE TABLE dashboard(
    id SERIAL PRIMARY KEY,
    balance money NOT NULL,
    saving money NOT NULL,
    credited money NOT NULL,
    debited money NOT NULL,
    user_id INT references customer_details(id)
);
 
 INSERT INTO dashboard(id,balance,saving,credited,debited,user_id)
VALUES(1,'1000','1000','1000','0',1);


CREATE TABLE beneficiary_details(
    id SERIAL PRIMARY KEY,
    beneficiaryname VARCHAR(30),
    ifsccode VARCHAR(10),
    beneficiaryAccountNumber VARCHAR(10),
    beneficiaryid INT references customer_details(id)
);

CREATE TABLE transaction_history(
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    accountnumber VARCHAR(10),
    date ,
    amount VARCHAR(20)
)