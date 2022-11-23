--changes done
create database government_employees;
--table employees
create table employees(
    id SERIAL PRIMARY KEY NOT NULL,
    firstname VARCHAR(30) NOT NULL CHECK(firstname <> ''),
    lastname VARCHAR(30) NOT NULL CHECK(lastname <> ''),
    surname VARCHAR(30) NOT NULL CHECK(surname <> ''),
    date_of_joining DATE NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR(20) NOT NULL CHECK(gender <> ''),
    phone VARCHAR(10) NOT NULL CHECK(phone <> ''),
    working_status_id INTEGER references  working_status(id),
    designation_id INTEGER references  designations(id),
    location_id INTEGER references location(id) 
);
--table working_status
CREATE TABLE working_status(
    id SERIAL PRIMARY KEY NOT NULL,
    description VARCHAR(30) NOT NULL CHECK(description <> '')
);
--table designations
CREATE TABLE designations (
    id SERIAL PRIMARY KEY NOT NULL,
    description VARCHAR(40) NOT NULL CHECK(description <> '')
);
--table location
create table location(
    id SERIAL PRIMARY KEY NOT NULL,
    district varchar(30) NOT NULL CHECK(district <> '')
);
--table salary components
CREATE TABLE salary_components(
    id SERIAL PRIMARY KEY NOT NULL,
    description VARCHAR(30),
    type INTEGER
);
--emp salary details
CREATE TABLE employee_salary_details(
    id SERIAL PRIMARY KEY NOT NULL,
    employee_id INTEGER references employees(id),
    salary_components_id INTEGER references salary_components(id),
    amount INTEGER
);
--transactionstable
CREATE TABLE transactions(
    id SERIAL PRIMARY KEY NOT NULL,
    employee_id INTEGER references employees(id),
    _month INTEGER CHECK(_month > 0 AND _month < 13),
    _year INTEGER,
    paid_on DATE,
    gross INTEGER,
    deduction INTEGER,
    net INTEGER
);
--transactiondetails
create table transaction_details(
    id SERIAL PRIMARY KEY NOT NULL,
    transaction_id INTEGER references transactions(id),
    salary_components_id INTEGER,
    amount INTEGER
);

--inserting values into tables
--working_status
INSERT INTO working_status(description)
VALUES ('working'),('expired'),('retired');
--designations
INSERT into designations(description)
VALUES ('Assistantengineer'),('Juniorengineer'),('Personalofficer'),('Subengineer'),('Managingdirector');
--location
INSERT INTO location(district)
VALUES('Adilabad'),('Bhongir'),('Khammam'),('Warangal'),('Sircilla');

--employees
INSERT INTO employees(firstname,lastname,surname,date_of_joining,date_of_birth,gender,phone, working_status_id,designation_id,location_id)
VALUES ('vyshnavi','sri','konda','2020-01-09','2002-03-03','Female','8333948115',3,2,4),
('Bhavesh','Reddy','Mishra','2018-08-10','2000-05-18','Male','7093215149',2,5,2),
('Sandeep','Kumar','Jha','2021-11-28','1998-10-13','Male','9849836536',1,3,1),
('Sikta','Patel','Patnaik','2019-09-18','1975-04-29','Female','9849165845',1,4,3),
('Anudeep','Rao','Durisheety','2021-07-07','1973-03-31','Male','9989839539',3,1,4),
('Vasudha','Mishra','Kodithala','2019-06-16','1989-11-28','Female','9573060984',2,1,3),
('Nirmala','Seetharaman','Iyengar','2022-04-14','1959-08-18','Female','7093215149',1,2,2),
('Amrapali','Kata','Yadav','2019-04-10','1982-10-04','Female','9700090741',3,4,5),
('Kalyan','Shekar','Reddy','2018-08-08','1975-12-31','Male','9030511159',2,3,1),
('Ramana','Reddy','Ranga','2010-04-14','1963-11-28','Male','9676865223',1,5,3),
('Abhignya','Sai','Sriramula','2020-01-06','1986-01-27','Female','9963004848',3,2,4),
('Aadhya','Priya','Katherine','2022-07-17','1972-03-29','Female','9949812582',1,5,5),
('Sri','Santhoshi','Thatikonda','2022-10-20','1998-09-09','Female','9515229669',1,3,1),
('Priya','Sarayu','Vallala','2017-03-16','2001-02-22','Female','7675836536',2,4,1),
('Chandhana','Sri','Kotagiri','2022-01-31','1979-12-21','Female','9182117236',3,3,3),
('Sharada','Devi','Nalla','2014-11-24','1974-09-17','Female','9246752101',3,4,4),
('Mrs','Bhargavi','Mallu','2019-08-28','1999-12-19','Female','9849836595',1,1,2),
('Mr','Bharath','Dooda','2022-02-21','1989-12-15','Male','9849836555',3,4,2),
('Shaik','Dade','Moin','2013-12-13','1899-11-12','Male','9849068256',2,5,5),
('Sharath','Shannaz','Abdul','2019-07-17','1956-06-23','Male','9676484644',1,4,1),
('Mr','Srikanth','Velpula','2017-01-17','1974-08-16','Male','9866544308',3,2,5);

--salarycomponents
INSERT INTO salary_components(description,type)
VALUES ('basicpay','1'),('houserent_allowance','2'),('city_compensatory_allowance','3'),('dearness_allowance','4'),('professional_tax','5'),('income_tax','6');

--employee_salary_details
INSERT INTO employee_salary_details(employee_id,salary_components_id,amount)
VALUES (1,1,5000),(1,2,4000),(1,3,3000),(1,4,200),(1,5,1500),(1,6,2000),
(2,1,6000),(2,2,3000),(2,3,2500),(2,4,1500),(2,5,1700),(2,6,1600),
(3,1,2500),(3,2,2500),(3,3,3000),(3,4,2000),(3,5,1000),(3,6,800),
(4,1,5000),(4,2,3000),(4,3,2000),(4,4,1000),(4,5,900),(4,6,600),
(5,1,4000),(5,2,1000),(5,3,8000),(5,4,6000),(5,5,2000),(5,6,1000),
(6,1,10000),(6,2,100),(6,3,300),(6,4,1000),(6,5,800),(6,6,1000),
(7,1,4000),(7,2,1000),(7,3,2000),(7,4,3000),(7,5,1300),(7,6,1600),
(8,1,8000),(8,2,1800),(8,3,3000),(8,4,2700),(8,5,1000),(8,6,1400),
(9,1,1900),(9,2,1550),(9,3,3000),(9,4,4000),(9,5,1300),(9,6,1100),
(10,1,6000),(10,2,5000),(10,3,1400),(10,4,2000),(10,5,500),(10,6,2000);

--transactions table
INSERT INTO transactions(employee_id,_month,_year,paid_on,gross,deduction,net)
VALUES (1,01,2020,'2020-01-03',15700,3500,12200),
(2,02,2019,'2019-02-05',16300,3300,13000),
(3,04,2022,'2022-04-07',11800,1800,10000),
(4,06,2021,'2021-06-09',12500,1500,11000),
(5,08,2017,'2017-08-11',22000,3000,19000),
(6,01,2016,'2016-01-13',13200,1800,11400),
(7,03,2015,'2015-03-17',12900,2900,10000),
(8,03,2014,'2014-03-19',17900,2400,15500),
(9,05,2018,'2018-05-21',12850,2400,10450),
(10,07,2021,'2021-07-23',16900,2500,14400);

--transactiondetails
INSERT INTO transaction_details(transaction_id,salary_components_id,amount)
VALUES (1,1,5000),(1,2,4000),(1,3,3000),(1,4,200),(1,5,1500),(1,6,2000),
(2,1,6000),(2,2,3000),(2,3,2500),(2,4,1500),(2,5,1700),(2,6,1600),
(3,1,2500),(3,2,2500),(3,3,3000),(3,4,2000),(3,5,1000),(3,6,800),
(4,1,5000),(4,2,3000),(4,3,2000),(4,4,1000),(4,5,900),(4,6,600),
(5,1,4000),(5,2,1000),(5,3,8000),(5,4,6000),(5,5,2000),(5,6,1000),
(6,1,10000),(6,2,100),(6,3,300),(6,4,1000),(6,5,800),(6,6,1000),
(7,1,4000),(7,2,1000),(7,3,2000),(7,4,3000),(7,5,1300),(7,6,1600),
(8,1,8000),(8,2,1800),(8,3,3000),(8,4,2700),(8,5,1000),(8,6,1400),
(9,1,1900),(9,2,1550),(9,3,3000),(9,4,4000),(9,5,1300),(9,6,1100),
(10,1,6000),(10,2,5000),(10,3,1400),(10,4,2000),(10,5,500),(10,6,2000);

--1)list of employees (name, doj, dob, gender, phone, working_status, designation, location)
SELECT concat(e.firstname,' ',e.lastname,' ',e.surname) AS name,e.date_of_joining,e.date_of_birth,e.gender,w.description,d.description,l.district
FROM employees AS e,working_status AS w,designations AS d,location AS l
where e.Working_status_id=w.id AND e.designation_id =d.id AND e.location_id=l.id;

--2)count of employees location wise(location,employee count), 
SELECT l.district AS location, COUNT(e.location_id) AS employee_count
  FROM location AS l, employees AS e
  WHERE e.location_id = l.id
  GROUP BY l.district,e.location_id;

  --3)count of employees designation wise (designation,employee count)

  SELECT d.description AS designation , COUNT(e.designation_id) AS employee_count
  FROM designations AS d, employees AS e
  WHERE e.designation_id = d.id
  GROUP BY  d.description,e.designation_id;

  --4)count of employees working status (working status,employee count)
  SELECT w.description AS workingstatus , COUNT(e.designation_id) AS employee_count
  FROM working_status AS w, employees AS e
  WHERE e.working_status_id = w.id
  GROUP BY w.description,e.working_status_id;

  --5)show all employees retirement date (employee_id, employee_name, dob, doj, retirement_date) (if retirement ll be at age of 60)
  SELECT id,concat(employees.firstname,' ',employees.lastname,' ',employees.surname) AS name,date_of_birth,date_of_joining,
  date_of_birth + INTERVAL'60 years' AS retirement_date
  FROM employees;

 --6)show salary break up(each salary compoment) of each employee wise. (employee_id,employee_name,salary_components....)
  SELECT emp_id,name, 
  SUM(CASE WHEN id=1 THEN amount END) AS basicpay,
  SUM(CASE WHEN id=2 THEN amount END) AS houserent_allowance,
  SUM(CASE WHEN id=3 THEN amount END) AS city_compensatory_allowance,
  SUM(CASE WHEN id=4 THEN amount END) AS dearness_allowance,
  SUM(CASE WHEN id=5 THEN amount END) AS professional_tax,
  SUM(CASE WHEN id=6 THEN amount END )AS income_tax
  FROM (select e.id as emp_id, concat(e.surname,' ',e.firstname,' ',e.lastname) as name,s.description,s.id,d.amount FROM employee_salary_details as d,salary_components as s,employees as e WHERE d.salary_components_id=s.id and e.id=d.employee_id) 
  AS subquery
  GROUP BY emp_id,name;
 

--7)maximum, minimun salary of employee, average salary of employees of each designation.(designation_id,designation,maximum_pay,minimum_pay,average_pay)
SELECT d.id AS designation_id,d.description AS designation, MAX(e.amount) AS maximum_pay, MIN(e.amount) AS minimum_pay, AVG(e.amount) AS average_pay
FROM designations AS d, employee_salary_details AS e
WHERE d.id = e.employee_id
GROUP BY d.id,d.description
ORDER BY d.id;

--8)salary received by each employee for last month (employee_id, name, salary_year, salary_month, gross, deduction, net).

select t.id as salary_id, t.employee_id as employee_id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) as employee_name, t._year as salary_year, t._month as salary_month, t.paid_on, t.gross, t.deduction, t.net
from transactions as t, employees as e
where t.employee_id = e.id and t._month = 4 and t._year = 2022;
