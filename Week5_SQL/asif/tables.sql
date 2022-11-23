-- database
CREATE DATABASE organization;

-- note: first creating these three tables, because our employee table is dependent on these tables

-- working status
CREATE TABLE working_status(
    id SERIAL PRIMARY KEY,
    _description VARCHAR(25) NOT NULL CHECK(_description <> '')
);

INSERT INTO working_status(_description)
VALUES('working'), ('expired'), ('retired'), ('suspended');


-- designations
CREATE TABLE designations(
    id SERIAL PRIMARY KEY,
    _description VARCHAR(50) NOT NULL CHECK(_description <> '')
);

INSERT INTO designations(_description)
VALUES('Chief Executive Officer(CEO)'), ('Human Resources'), ('Tech Lead'), ('Test Engineer'), ('Intern');


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
    created_at TIMESTAMP NOT NULL
);

INSERT INTO employees(surname, firstname, lastname, date_of_joining, date_of_birth, gender, phone, working_status_id, designation_id, location_id, gross_salary, created_at)
VALUES('Mr.', 'Elon', 'Must', '2022-11-11', '1970-12-15', 'Male', '9316235665', 1, 1, 1, 2900000, LOCALTIMESTAMP);

INSERT INTO employees(surname, firstname, lastname, date_of_joining, date_of_birth, gender, phone, working_status_id, designation_id, location_id, gross_salary, created_at)
VALUES('Mr.', 'Lalit', 'Modi', '2003-05-31', '1950-08-25', 'Male', '9645235688', 2, 1, 2, 3200000, LOCALTIMESTAMP),
('Mr.', 'Devinder', 'Sharma', '2005-01-21', '1981-12-15', 'Male', '9153235655', 1, 2, 4, 1200000, LOCALTIMESTAMP),
('Mrs.', 'Meghna', 'Sharma', '2008-06-05', '1986-05-29', 'Female', '8965662323', 1, 3, 1, 1500000, LOCALTIMESTAMP),
('Mr.', 'Nawaz', 'Uddin', '2015-06-19', '1988-02-26', 'Male', '9356598165', 1, 2, 5, 1000000, LOCALTIMESTAMP),
('Mrs.', 'Deepika', 'Singh', '2022-07-30', '1988-01-19', 'Female', '7568962569', 1, 2, 6, 500000, LOCALTIMESTAMP),
('Mr.', 'Vikram', 'Singh', '2002-09-16', '1965-07-14', 'Male', '9312389632', 3, 2, 3, 1500000, LOCALTIMESTAMP),
('Ms.', 'Rakhi', 'Saawant', '2019-04-22', '1980-10-28', 'Female', '8965212156', 4, 4, 2, 600000, LOCALTIMESTAMP),
('Mr.', 'Satish', 'Naik', '2022-05-11', '1999-05-01', 'Male', '9155132658', 1, 5, 1, 200000, LOCALTIMESTAMP),
('Mrs.', 'Sakshi', 'Malik', '2017-12-31', '1977-03-12', 'Female', '9854215436', 1, 4, 6, 1600000, LOCALTIMESTAMP),
('Mr.', 'Riyaz', 'Khan', '2012-09-22', '1983-03-19', 'Male', '8657788323', 1, 3, 1, 1500000, LOCALTIMESTAMP),
('Mr.', 'Karthik', 'Aryan', '2018-11-22', '1976-02-26', 'Male', '8526366365', 2, 3, 5, 1400000, LOCALTIMESTAMP),
('Ms.', 'Samantha', 'Prabhu', '2021-08-10', '1978-04-29', 'Female', '6335662569', 1, 2, 1, 1100000, LOCALTIMESTAMP),
('Mrs.', 'Shruti', 'Kohli', '2011-03-17', '1984-02-24', 'Female', '7895629632', 4, 3, 5, 1500000, LOCALTIMESTAMP),
('Mr.', 'Sai', 'Kiran', '2022-11-01', '1998-10-28', 'Male', '8565655156', 1, 5, 2, 200000, LOCALTIMESTAMP),
('Mr.', 'Pankaj', 'Tripathi', '2018-11-21', '1967-03-25', 'Male', '9155689656', 1, 3, 6, 1000000, LOCALTIMESTAMP),
('Mr.', 'Phoolchand', 'Tripathi', '2020-03-12', '1991-05-14', 'Male', '9664426263', 1, 4, 3, 800000, LOCALTIMESTAMP),
('Mrs.', 'Sweety', 'Pandit', '2017-09-18', '1989-04-07', 'Female', '9416496663', 2, 2, 5, 1200000, LOCALTIMESTAMP),
('Mr.', 'Shaik', 'Ashraf', '2021-08-01', '1996-05-16', 'Male', '9235896697', 4, 3, 4, 600000, LOCALTIMESTAMP),
('Ms.', 'Sai', 'Pallavi', '2022-11-01', '1999-09-04', 'Female', '7569715539', 1, 5, 2, 200000, LOCALTIMESTAMP);



-- salary components
CREATE TABLE salary_components(
    id SERIAL PRIMARY KEY,
    _description VARCHAR(25) NOT NULL CHECK(_description <> ''),
    _type VARCHAR(25) NOT NULL CHECK(_type <> '')
);

INSERT INTO salary_components(_description, _type)
VALUES('Basic Pay', 'Earning'), ('DA', 'Earning'), ('HRA', 'Earning'), ('CA', 'Earning'), ('Medical Allowance', 'Earning'), ('Bonus', 'Earning'), ('TDS', 'Deduction'), ('PF', 'Deduction');



-- salaries
CREATE TABLE salaries(
    id SERIAL PRIMARY KEY,
    employee_id INTEGER REFERENCES employees(id),
    month VARCHAR(15) NOT NULL CHECK(month <> ''),
    year VARCHAR(4) NOT NULL CHECK(year <> ''),
    paid_on DATE NOT NULL,
    gross_salary INTEGER REFERENCES employees(gross_salary),
    deductions INTEGER,
    net_salary INTEGER NOT NULL,
    created_at TIMESTAMP NOT NULL
);


