-- database
CREATE DATABASE organization;

-- working status
CREATE TABLE working_status(
    id SERIAL PRIMARY KEY,
    description VARCHAR(25) NOT NULL CHECK(description <> '')
);

INSERT INTO working_status(description)
VALUES('Working'), ('Expired'), ('Retired'), ('Suspended');


-- designations
CREATE TABLE designations(
    id SERIAL PRIMARY KEY,
    description VARCHAR(50) NOT NULL CHECK(description <> '')
);

INSERT INTO designations(description)
VALUES('Chief Executive Officer(CEO)'), ('Human Resources'), ('Software Developer'), ('Test Engineer'), ('Intern');


-- location
CREATE TABLE locations(
    id SERIAL PRIMARY KEY,
    district VARCHAR(50) NOT NULL CHECK(district <> '')
);
INSERT INTO locations(district)
VALUES('Hyderabad'), ('Warangal'), ('Sangareddy'), ('Medak'), ('Karimnagar'), ('Rangareddy');


-- employees table
CREATE TABLE employees(
    id SERIAL PRIMARY KEY,
    surname VARCHAR(20) NOT NULL CHECK(surname <> ''),
    firstname VARCHAR(20) NOT NULL CHECK(firstname <> ''),
    lastname VARCHAR(20) NOT NULL CHECK(lastname <> ''),
    date_of_joining DATE NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR(20) NOT NULL CHECK(gender <> ''),
    phone VARCHAR(10) UNIQUE NOT NULL CHECK(phone <> ''),
    working_status_id INTEGER REFERENCES working_status(id),
    designation_id INTEGER REFERENCES designations(id),
    location_id INTEGER REFERENCES locations(id),
    gross_salary INTEGER NOT NULL CHECK(gross_salary > 0),
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

INSERT INTO employees(surname, firstname, lastname, date_of_joining, date_of_birth, gender, phone, working_status_id, designation_id, location_id, gross_salary)
VALUES('Mr.', 'Elon', 'Must', '2022-11-11', '1970-12-15', 'Male', '9316235665', 1, 1, 1, 200000);

INSERT INTO employees(surname, firstname, lastname, date_of_joining, date_of_birth, gender, phone, working_status_id, designation_id, location_id, gross_salary)
VALUES('Mr.', 'Lalit', 'Modi', '2003-05-31', '1965-08-25', 'Male', '9645235688', 2, 1, 2, 250000),
('Mr.', 'Devinder', 'Sharma', '2005-01-21', '1981-12-15', 'Male', '9153235655', 1, 2, 4, 100000),
('Mrs.', 'Meghna', 'Sharma', '2008-06-05', '1986-05-29', 'Female', '8965662323', 1, 3, 1, 105000),
('Mr.', 'Nawaz', 'Uddin', '2015-06-19', '1988-02-26', 'Male', '9356598165', 1, 2, 5, 70000),
('Mrs.', 'Deepika', 'Singh', '2022-07-30', '1988-01-19', 'Female', '7568962569', 1, 2, 6, 40000),
('Mr.', 'Vikram', 'Singh', '2002-09-16', '1962-08-28', 'Male', '9312389632', 3, 2, 3, 100000),
('Ms.', 'Rakhi', 'Saawant', '2019-04-22', '1980-10-28', 'Female', '8965212156', 4, 4, 2, 60000),
('Mr.', 'Satish', 'Naik', '2022-05-11', '1999-05-01', 'Male', '9155132658', 1, 5, 1, 10000),
('Mrs.', 'Sakshi', 'Malik', '2017-12-31', '1977-03-12', 'Female', '9854215436', 1, 4, 6, 130000),
('Mr.', 'Riyaz', 'Khan', '2012-09-22', '1983-03-19', 'Male', '8657788323', 1, 3, 1, 110000),
('Mr.', 'Karthik', 'Aryan', '2018-11-22', '1976-02-26', 'Male', '8526366365', 2, 3, 5, 90000),
('Ms.', 'Samantha', 'Prabhu', '2021-08-10', '1978-04-29', 'Female', '6335662569', 1, 2, 1, 85000),
('Mrs.', 'Shruti', 'Kohli', '2011-03-17', '1984-02-24', 'Female', '7895629632', 4, 3, 5, 105000),
('Mr.', 'Sai', 'Kiran', '2022-11-01', '1998-10-28', 'Male', '8565655156', 1, 5, 2, 10000),
('Mr.', 'Pankaj', 'Tripathi', '2018-11-21', '1967-03-25', 'Male', '9155689656', 1, 3, 6, 80000),
('Mr.', 'Phoolchand', 'Tripathi', '2020-03-12', '1991-05-14', 'Male', '9664426263', 1, 4, 3, 45000),
('Mrs.', 'Sweety', 'Pandit', '2017-09-18', '1989-04-07', 'Female', '9416496663', 2, 2, 5, 50000),
('Mr.', 'Shaik', 'Ashraf', '2021-08-01', '1996-05-16', 'Male', '9235896697', 4, 3, 4, 50000),
('Ms.', 'Sai', 'Pallavi', '2022-11-01', '1999-09-04', 'Female', '7569715539', 1, 5, 2, 10000);



-- salary components
CREATE TABLE salary_components(
    id SERIAL PRIMARY KEY,
    description VARCHAR(25) NOT NULL CHECK(description <> ''),
    type VARCHAR(25) NOT NULL CHECK(type <> '')
);

INSERT INTO salary_components(description, type)
VALUES('Basic Pay', 'Earning'), ('DA', 'Earning'), ('HRA', 'Earning'), ('CA', 'Earning'), ('Medical Allowance', 'Earning'), ('Bonus', 'Earning'), ('TDS', 'Deduction'), ('PF', 'Deduction');


-- salaries
CREATE TABLE salaries(
    id SERIAL PRIMARY KEY,
    employee_id INTEGER REFERENCES employees(id),
    month SMALLINT NOT NULL CHECK(_month > 0 AND month < 13),
    year SMALLINT NOT NULL CHECK(_year > 2000 AND year < 2099),
    paid_on DATE NOT NULL,
    gross_salary INTEGER,
    deductions INTEGER,
    net_salary INTEGER NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);


INSERT INTO salaries(employee_id, month, year, paid_on, gross_salary, deductions, net_salary)
VALUES(2, 8, 2022, '2022-09-04', 250000, 45000, 205000),
(3, 8, 2022, '2022-09-04', 100000, 18000, 82000),
(4, 8, 2022, '2022-09-04', 105000, 18900, 86100),
(5, 8, 2022, '2022-09-04', 70000, 12600, 57400),
(6, 8, 2022, '2022-09-04', 40000, 3000, 37000),
(7, 8, 2022, '2022-09-04', 100000, 18000, 82000),
(9, 8, 2022, '2022-09-04', 10000, 0, 10000),
(10, 8, 2022, '2022-09-04', 130000, 23400, 106600),
(11, 8, 2022, '2022-09-04', 110000, 19800, 90200),
(13, 8, 2022, '2022-09-04', 85000, 15300, 69700),
(16, 8, 2022, '2022-09-04', 80000, 14400, 65600),
(17, 8, 2022, '2022-09-04', 45000, 8100, 36900);


INSERT INTO salaries(employee_id, month, year, paid_on, gross_salary, deductions, net_salary)
VALUES(2, 9, 2022, '2022-10-01', 250000, 45000, 205000),
(3, 9, 2022, '2022-10-01', 100000, 18000, 82000),
(4, 9, 2022, '2022-10-01', 105000, 18900, 86100),
(5, 9, 2022, '2022-10-01', 70000, 12600, 57400),
(6, 9, 2022, '2022-10-01', 40000, 3000, 37000),
(9, 9, 2022, '2022-10-01', 10000, 0, 10000),
(10, 9, 2022, '2022-10-01', 130000, 23400, 106600),
(11, 9, 2022, '2022-10-01', 110000, 19800, 90200),
(13, 9, 2022, '2022-10-01', 85000, 15300, 69700),
(16, 9, 2022, '2022-10-01', 80000, 14400, 65600),
(17, 9, 2022, '2022-10-01', 45000, 8100, 36900);


INSERT INTO salaries(employee_id, month, year, paid_on, gross_salary, deductions, net_salary)
VALUES(3, 10, 2022, '2022-11-02', 100000, 18000, 82000),
(4, 10, 2022, '2022-11-02', 105000, 18900, 86100),
(5, 10, 2022, '2022-11-02', 70000, 12600, 57400),
(6, 10, 2022, '2022-11-02', 40000, 3000, 37000),
(9, 10, 2022, '2022-11-02', 10000, 0, 10000),
(10, 10, 2022, '2022-11-02', 130000, 23400, 106600),
(11, 10, 2022, '2022-11-02', 110000, 19800, 90200),
(13, 10, 2022, '2022-11-02', 85000, 15300, 69700),
(16, 10, 2022, '2022-11-02', 80000, 14400, 65600),
(17, 10, 2022, '2022-11-02', 45000, 8100, 36900);




-- salary details
CREATE TABLE salary_details(
    id SERIAL PRIMARY KEY,
    salary_id INTEGER REFERENCES salaries(id),
    salary_component_id INTEGER REFERENCES salary_components(id),
    amount INTEGER NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

-- for the month august
INSERT INTO salary_details(salary_id, salary_component_id, amount)
VALUES(1, 1, 180000),
(1, 2, 10000),
(1, 3, 25000),
(1, 4, 10000),
(1, 5, 15000),
(1, 6, 10000),
(1, 7, 22500),
(1, 8, 22500),

(2, 1, 71000),
(2, 2, 5000),
(2, 3, 15000),
(2, 4, 4000),
(2, 5, 5000),
(2, 7, 9000),
(2, 8, 9000),

(3, 1, 72000),
(3, 2, 5000),
(3, 3, 15000),
(3, 4, 5000),
(3, 5, 6000),
(3, 6, 2000),
(3, 7, 9450),
(3, 8, 9450),

(4, 1, 50000),
(4, 3, 10000),
(4, 4, 2000),
(4, 5, 5000),
(4, 6, 3000),
(4, 7, 6300),
(4, 8, 6300),

(5, 1, 35000),
(5, 5, 2000),
(5, 8, 3000),

(6, 1, 70000),
(6, 2, 4000),
(6, 3, 12000),
(6, 4, 5000),
(6, 5, 5000),
(6, 6, 4000),
(6, 7, 9000),
(6, 8, 9000),

(7, 1, 10000),

(8, 1, 92000),
(8, 2, 5000),
(8, 3, 15000),
(8, 4, 6000),
(8, 5, 8000),
(8, 6, 4000),
(8, 7, 11700),
(8, 8, 11700),

(9, 1, 75000),
(9, 2, 5000),
(9, 3, 15000),
(9, 4, 5000),
(9, 5, 7000),
(9, 6, 3000),
(9, 7, 9900),
(9, 8, 9900),

(10, 1, 65000),
(10, 2, 3000),
(10, 3, 10000),
(10, 4, 2000),
(10, 5, 5000),
(10, 7, 7650),
(10, 8, 7650),

(11, 1, 60000),
(11, 2, 3000),
(11, 3, 13000),
(11, 5, 4000),
(11, 7, 7200),
(11, 8, 7200),

(12, 1, 40000),
(12, 5, 5000),
(12, 7, 4050),
(12, 8, 4050);



-- for the month september
INSERT INTO salary_details(salary_id, salary_component_id, amount)
VALUES(13, 1, 180000),
(13, 2, 10000),
(13, 3, 25000),
(13, 4, 10000),
(13, 5, 15000),
(13, 6, 10000),
(13, 7, 22500),
(13, 8, 22500),

(14, 1, 71000),
(14, 2, 5000),
(14, 3, 15000),
(14, 4, 4000),
(14, 5, 5000),
(14, 7, 9000),
(14, 8, 9000),

(15, 1, 72000),
(15, 2, 5000),
(15, 3, 15000),
(15, 4, 5000),
(15, 5, 6000),
(15, 6, 2000),
(15, 7, 9450),
(15, 8, 9450),

(16, 1, 50000),
(16, 3, 10000),
(16, 4, 2000),
(16, 5, 5000),
(16, 6, 3000),
(16, 7, 6300),
(16, 8, 6300),

(17, 1, 35000),
(17, 5, 2000),
(17, 8, 3000),

(18, 1, 10000),

(19, 1, 92000),
(19, 2, 5000),
(19, 3, 15000),
(19, 4, 6000),
(19, 5, 8000),
(19, 6, 4000),
(19, 7, 11700),
(19, 8, 11700),

(20, 1, 75000),
(20, 2, 5000),
(20, 3, 15000),
(20, 4, 5000),
(20, 5, 7000),
(20, 6, 3000),
(20, 7, 9900),
(20, 8, 9900),

(21, 1, 65000),
(21, 2, 3000),
(21, 3, 10000),
(21, 4, 2000),
(21, 5, 5000),
(21, 7, 7650),
(21, 8, 7650),

(22, 1, 60000),
(22, 2, 3000),
(22, 3, 13000),
(22, 5, 4000),
(22, 7, 7200),
(22, 8, 7200),

(23, 1, 40000),
(23, 5, 5000),
(23, 7, 4050),
(23, 8, 4050);



-- for the month october
INSERT INTO salary_details(salary_id, salary_component_id, amount)
VALUES(24, 1, 71000),
(24, 2, 5000),
(24, 3, 15000),
(24, 4, 4000),
(24, 5, 5000),
(24, 7, 9000),
(24, 8, 9000),

(25, 1, 72000),
(25, 2, 5000),
(25, 3, 15000),
(25, 4, 5000),
(25, 5, 6000),
(25, 6, 2000),
(25, 7, 9450),
(25, 8, 9450),

(26, 1, 50000),
(26, 3, 10000),
(26, 4, 2000),
(26, 5, 5000),
(26, 6, 3000),
(26, 7, 6300),
(26, 8, 6300),

(27, 1, 35000),
(27, 5, 2000),
(27, 8, 3000),

(28, 1, 10000),

(29, 1, 92000),
(29, 2, 5000),
(29, 3, 15000),
(29, 4, 6000),
(29, 5, 8000),
(29, 6, 4000),
(29, 7, 11700),
(29, 8, 11700),

(30, 1, 75000),
(30, 2, 5000),
(30, 3, 15000),
(30, 4, 5000),
(30, 5, 7000),
(30, 6, 3000),
(30, 7, 9900),
(30, 8, 9900),

(31, 1, 65000),
(31, 2, 3000),
(31, 3, 10000),
(31, 4, 2000),
(31, 5, 5000),
(31, 7, 7650),
(31, 8, 7650),

(32, 1, 60000),
(32, 2, 3000),
(32, 3, 13000),
(32, 5, 4000),
(32, 7, 7200),
(32, 8, 7200),

(33, 1, 40000),
(33, 5, 5000),
(33, 7, 4050),
(33, 8, 4050);


CREATE TABLE users(
	id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL CHECK(name <> ''),
    phone VARCHAR(50) NOT NULL CHECK(phone <> '' AND phone < 11),
    email VARCHAR(50) NOT NULL CHECK(email <> ''),
    passwd VARCHAR(32) NOT NULL CHECK(passwd <> ''),
    created_at TIMESTAMP DEFAULT NOW,
    current_status VARCHAR(30),
    token VARCHAR(30),
    last_login TIMESTAMP
);

INSERT INTO users(name, phone, email, passwd) VALUES('asif', '9346136029', 'asif@gmail.com', '25f9e794323b453885f5181f1b624d0b');
