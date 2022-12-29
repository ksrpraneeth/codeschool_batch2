create database employeedetails;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL CHECK(password <> ''),
    date_of_birth DATE ,
    token VARCHAR(50) 
);

CREATE TABLE address (
    id SERIAL PRIMARY KEY,
employee_id int references employees(id),
    address VARCHAR(500)

)


CREATE TABLE employees (
    id SERIAL PRIMARY KEY,
    employee_name VARCHAR(50) ,
    date_of_birth DATE ,
    father_name VARCHAR(50) ,
    mother_name VARCHAR(50) 

);
