
CREATE DATABASE softwareHub;

-- Table 1

CREATE TABLE organization(
       id  SERIAL PRIMARY KEY,
       organization_id VARCHAR(10) unique NOT NULL CHECK (organization_id <>''),
       name VARCHAR(50) NOT NULL CHECK (name <>'')

);

-- Table 2

CREATE TABLE employees(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) unique NOT NULL,
        employee_name VARCHAR(50) NOT NULL CHECK (employee_name <>''),
        mobile BIGINT unique NOT NULL,
        email_id VARCHAR(50) unique NOT NULL CHECK (email_id <>''),
        income INT,
        designation VARCHAR(50)
);

-- Table 3          


CREATE TABLE attendance(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) REFERENCES employees(employee_id),
        loginTime TIMESTAMP ,
        logoutTime TIMESTAMP
);


-- Table 4

CREATE TABLE tasks(
        id  SERIAL PRIMARY KEY,
        startTime TIMESTAMP,
        endTime TIMESTAMP,
        priority VARCHAR(50),
        taskDetails VARCHAR(500)
);

-- Table 5

CREATE TABLE info(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) REFERENCES employees(employee_id)
);

-- T1 VALUES

INSERT INTO organization (organization_id,name)
VALUES ('150PX','Pixelvide');

INSERT INTO organization (organization_id,name)
VALUES ('310Inf','Infosys'),('250Cog','Cognizant');



-- T2 VALUES

INSERT INTO employees (employee_id,employee_name,mobile,email_id,income,designation)
VALUES ('150PX03','Shiva','7901549116','shivamogas@gmail.com','10000','Intern'),
('310Inf07','Abhilash','9876543210','abhi@gmail.com','12000','Intern'),
('150PX05','vamshi','6300012151','vamshi@gmail.com','10000','Intern'),
('150PX15','Uday','9852624123','uday@gmail.com','110000','Senior software developer'),
('250Cog01','Santhoshi','8546971232','vanthoshi@gmail.com','15000','Intern'),
('150PX42','Praneeth','9852624023','praneeth@gmail.com','150000','Technical Lead'),
('150PX35','Suhas','9882624023','suhas@gmail.com','110000','AWS'),
('310Inf98','Abhilash','9848834233','abhilash@gmail.com','98000','AWS'),
('250Cog52','Sthitha','8465056529','sthitha@gmail.com','75000','Software developer'),
('250Cog65','vikas','9885832226','vikas@gmail.com','210000','Senior ROR Developer');

-- T3 VALUES

INSERT INTO attendance (employee_id,loginTime,logoutTime)
VALUES ('150PX03','2022-11-22 10:15:05','2022-11-22 19:08:36'),
('150PX15','2022-11-22 10:07:05','2022-11-22 18:45:13'),
('310Inf07','2022-11-22 10:06:13','2022-11-22 18:56:25'),
('150PX42','2022-11-21 10:30:14','2022-11-21 17:25:18'),
('150PX05','2022-11-22 10:18:05','2022-11-22 18:59:13'),
('150PX03','2022-11-21 10:10:26','2022-11-21 19:15:47'),
('250Cog01','2022-11-22 10:07:56','2022-11-22 18:23:58'),
('150PX15','2022-11-18 10:21:05','2022-11-18 18:28:13'),
('150PX42','2022-11-22 10:12:58','2022-11-22 18:45:45'),
('150PX03','2022-11-17 10:03:26','2022-11-17 19:09:41'),
('150PX15','2022-11-21 10:10:05','2022-11-21 18:58:26'),
('150PX35','2022-11-22 10:07:05','2022-11-22 18:42:13'),
('310Inf98','2022-11-22 10:13:09','2022-11-22 18:56:25'),
('150PX03','2022-11-18 10:05:26','2022-11-18 19:18:45'),
('250Cog52','2022-11-22 10:25:05','2022-11-22 18:45:13');


-- T4 VALUES

INSERT INTO tasks (startTime,endTime,priority,taskDetails)
VALUES ('2022-11-22 11:00:00','2022-12-22 18:00:00','Most Imp','JS,JQuery,AJAX,API'),
('2022-11-22 11:00:00','2022-11-30 18:00:00','Moderate','HTML,CSS'),
('2022-11-22 11:00:00','2022-12-10 18:00:00','Imp','PHP,SQL');

-- T5 VALUES

INSERT INTO info(employee_id)
VALUES ('150PX03'),
('150PX15'),
('310Inf07'),
('250Cog01'),
('150PX05'),
('150PX42'),
('150PX35'),
('310Inf98'),
('250Cog52');

-- Query 1 :  (Employees from employees table with designation AWS)

SELECT employee_id,employee_name,designation FROM employees
WHERE designation='AWS'; 

-- Query 2  (Highest income in employees)

SELECT employee_name,income FROM employees
ORDER BY income DESC limit 1 OFFSET 0; 

-- Query 3  (Find the count of entries in attendance of each employee)

SELECT a.employee_id, e.employee_name, COUNT(a.employee_id) AS entries
FROM attendance AS a, employees AS e
WHERE  a.employee_id=e.employee_id
GROUP BY a.employee_id,e.employee_name ORDER BY entries DESC;

-- Query 4  (First login and First logout in attendance)

SELECT e.employee_name,(a.loginTime) AS firstlogin,(a.logoutTime) AS lastlogin
FROM attendance AS a, employees AS e
WHERE  a.employee_id=e.employee_id
GROUP BY a.employee_id,e.employee_name,a.loginTime,a.logoutTime ORDER BY firstlogin ASC LIMIT 1 OFFSET 0;


select * from attendance order by logoutTime asc limit 1;

SELECT e.employee_name,(a.loginTime) AS firstlogin,(a.logoutTime) AS lastlogin
FROM attendance AS a, employees AS e
WHERE  a.employee_id=e.employee_id
GROUP BY a.employee_id,e.employee_name,a.loginTime,a.logoutTime ORDER BY firstlogin ASC AND lastlogin ASC ;

-- Query 5  (Insert new employee in the employees table)

INSERT INTO employees (employee_id,employee_name,mobile,email_id,income,designation)
VALUES ('250Cog65','vikas','9885832226','vikas@gmail.com','210000','Senior ROR Developer');

-- Query 6  (Update Organization name with id)

update organization
set name='cognos'
where id=3;

--Query 7  (Delete one task from task table)

DELETE FROM tasks
WHERE id=2; 

--Query 8  (Add column in employees table, add organization_id)

ALTER TABLE employees 
ADD column organization_id VARCHAR(10) unique REFERENCES organization(organization_id);

--Query 9  (Join employees table with organization table and show employee_id, employee_name, email, mobile no & Organization name )

SELECT e.employee_id, e.employee_name, e.email_id, e.mobile, (o.name) AS Organization_Name
FROM   employees AS e, organization AS o
WHERE  e.id=o.id
GROUP BY e.employee_id, e.employee_name, e.email_id, e.mobile, o.name;

--Query 10  (Get the task which are b/w nov-22 as start date and dec-22 as end date)

SELECT * FROM tasks
WHERE startTime='2022-11-22 11:00:00' AND endTime='2022-12-22 18:00:00';

-- /


ALTER TABLE employees 
ADD column organization_id int REFERENCES organization(id);


ALTER TABLE employees
DROP COLUMN organization_id;


update employees
set organization_id=1
where id=1;

update employees
set organization_id=1
where id=3;

update employees
set organization_id=1
where id=4;

update employees
set organization_id=1
where id=6;

update employees
set organization_id=1
where id=7;

update employees
set organization_id=2
where id=2;

update employees
set organization_id=2
where id=8;

update employees
set organization_id=3
where id=5;

update employees
set organization_id=3
where id=9;

update employees
set organization_id=3
where id=10;

--Query 9  (Join employees table with organization table and show employee_id, employee_name, email, mobile no & Organization name )

SELECT e.employee_id, e.employee_name, e.email_id, e.mobile, (o.name) AS Organization_Name
FROM   employees AS e, organization AS o
WHERE  e.organization_id=o.id;



-- SELECT e.employee_name, (o.name) AS Organization_Name, loginTime
-- FROM   employees AS e, organization AS o, attendance
-- WHERE  e.organization_id=o.id AND e.employee_id=attendance.employee_id 
-- GROUP BY e.employee_name, o.name, loginTime
-- HAVING designation=Intern;

-- SELECT e.employee_name, (o.name) AS Organization_Name, a.logintime
-- FROM ((employees
-- INNER JOIN organization ON employees.organization_id = organization.id)
-- INNER JOIN attendance ON employees.employee_id = attendance.employee_id);


-- Query (Join employees table with organization table and attendance, show employee_name, Organization name, login time, where organization is Pixelvide, designation is Intern, & login time is 10-10:30 am )

SELECT e.employee_name, (o.name) AS Organization_Name, a.logintime
FROM employees e 
JOIN organization o ON e.organization_id = o.id 
JOIN attendance a ON e.employee_id = a.employee_id
WHERE e.designation='Intern' AND o.name='Pixelvide'
AND a.logintime between '2022-11-17 10:00:00' AND '2022-11-17 10:30:00' ;



SELECT e.employee_name, (o.name) AS Organization_Name
FROM employees e 
JOIN organization o ON e.organization_id = o.id 
JOIN attendance a ON e.employee_id = a.employee_id
WHERE e.designation='Intern' AND o.organization_id='150PX'
GROUP BY e.employee_name,o.name
AND a.logintime != '2022-11-19 10:00:00';


SELECT e.employee_name, (o.name) AS Organization_Name
FROM organization o 
JOIN employees e ON o.id = e.organization_id  
JOIN attendance a ON e.employee_id = a.employee_id
WHERE o.organization_id='150PX' AND e.designation='Intern';

SELECT e.employee_name, (o.name) AS Organization_Name
FROM organization o 
JOIN employees e ON o.id = e.organization_id 
WHERE o.organization_id='150PX' AND e.designation='Intern';

