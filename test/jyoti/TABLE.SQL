CREATE DATABASE organization;

-- User Table

CREATE TABLE users(
    id  SERIAL PRIMARY KEY,
    userName VARCHAR (50) UNIQUE,
    email VARCHAR UNIQUE,
    password  VARCHAR,
    dob VARCHAR,
    token VARCHAR

)




--Create Employee Table;

CREATE TABLE employee(
id SERIAL PRIMARY KEY,
name VARCHAR (50),
employeeId VARCHAR UNIQUE,
user_id INT REFERENCES users(id)
)

--Address Table

CREATE TABLE address(
    id SERIAL PRIMARY KEY,
    employee_id INT REFERENCES employee(id),
    address VARCHAR NOT NULL
)