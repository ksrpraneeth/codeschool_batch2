CREATE DATABASE TEST;


-- table 1
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50)  UNIQUE NOT NULL CHECK(name <> ''),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL CHECK(password <> ''),
  date_of_birth Date,
    token VARCHAR(50)
    
);
 username VARCHAR(50) UNIQUE,

CREATE TABLE address (
    id SERIAL PRIMARY KEY,
employee_id int references employees(employee_id),
    address VARCHAR(1000)
)


CREATE TABLE employees (
    id SERIAL PRIMARY KEY,
    employee_id int UNIQUE,
    employee_name VARCHAR(50)
);