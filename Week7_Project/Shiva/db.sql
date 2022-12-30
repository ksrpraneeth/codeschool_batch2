CREATE DATABASE softwarehub;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL CHECK(password <> ''),
    token VARCHAR(50) 
);

insert into users (email,password,token)
VALUES ('praneethkalluri@gmail.com','1ab32b7b6021075fb586ed020ac30039',''),('uday@gmail.com','79ab5af2f180d47599bf0dd0e46a2184','');

CREATE TABLE menus(
    id SERIAL PRIMARY KEY NOT NULL,
    menu VARCHAR (30),
    slug VARCHAR(30)
);

INSERT INTO menus(menu,slug)
VALUES ('Employees','employee_details'),('Attendance','employee_attendance'),('Tasks','employee_tasks');

INSERT INTO menus(menu,slug)
VALUES ('Create Employee','Create_employee');

INSERT INTO menus(menu,slug)
VALUES ('Employee List','employee_list'),('Task Status','task_status'),('Task Report','task_report');

-- Table 1

CREATE TABLE organizations(
       id  SERIAL PRIMARY KEY,
       organization_id VARCHAR(10) UNIQUE NOT NULL CHECK (organization_id <>''),
       name VARCHAR(50) NOT NULL CHECK (name <>'')

);

INSERT INTO organizations(organization_id,name)
VALUES ('150PX','Pixelvide'),('310Inf','Infosys'),('250Cog','Cognizant');

-- Table 2

CREATE TABLE employees(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) unique NOT NULL,
        organization_id int REFERENCES organizations(id),
        employee_name VARCHAR(50) NOT NULL CHECK (employee_name <>''),
        mobile BIGINT unique NOT NULL,
        email_id VARCHAR(50) unique NOT NULL CHECK (email_id <>''),
        income INT,
        designation int REFERENCES designations(id)
);

INSERT INTO employees (employee_id,organization_id,employee_name,mobile,email_id,income,designation)
VALUES ('150PX03','1','Shiva','7901549116','shivamogas@gmail.com','10000','1'),
('310Inf07','2','Abhilash','9876543210','abhi@gmail.com','12000','1'),
('150PX05','1','vamshi','6300012151','vamshi@gmail.com','10000','1'),
('150PX15','1','Uday','9852624123','uday@gmail.com','110000','4'),
('250Cog01','3','Santhoshi','8546971232','vanthoshi@gmail.com','15000','1'),
('150PX42','1','Praneeth','9852624023','praneeth@gmail.com','150000','3'),
('150PX35','1','Suhas','9882624023','suhas@gmail.com','110000','2'),
('310Inf98','2','Abhilash','9848834233','abhilash@gmail.com','98000','2'),
('250Cog52','3','Sthitha','8465056529','sthitha@gmail.com','75000','5'),
('250Cog65','3','vikas','9885832226','vikas@gmail.com','210000','6');

-- Table 3          

CREATE TABLE attendance(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) REFERENCES employees(employee_id),
        loginTime TIMESTAMP ,
        logoutTime TIMESTAMP
);

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

-- Table 4

CREATE TABLE tasks(
        id  SERIAL PRIMARY KEY,
        employee_id VARCHAR(10) REFERENCES employees(employee_id),
        startDate DATE,
        endDate DATE,
        priority VARCHAR(50),
        taskDetails VARCHAR(500)
);

CREATE TABLE designations(
        id SERIAL PRIMARY KEY,
        description VARCHAR(50) NOT NULL CHECK (description <>'') 
);

INSERT INTO designations (description)
VALUES ('Intern'),('AWS'),('Technical Lead'),
('Senior software developer'),('Software developer'),
('Senior ROR Developer');

SELECT o.name,o.organization_id FROM employees AS e, organizations AS o 
WHERE  e.id=o.id;

SELECT o.name,COUNT(employee_id) 
FROM employees AS e, organizations AS o 
WHERE  e.id=o.id
group by o.name,employee_id;

SELECT COUNT(employee_id)
FROM employees WHERE organization_id=1;


SELECT MAX(employee_id),COUNT(employee_id) AS NO_of_Employees FROM employees
WHERE organization_id=1;

select o.name,COUNT(e.employee_id) FROM
organizations as o, employees as e 
WHERE o.id=e.organization_id 
group by o.id;

update employees
set organization_id=?,employee_name=?,mobile=?,email_id=?,income=?,designation=?
where id=?;

update employees
set employee_name = '', mobile = '', email_id ='', income = '', designation = '' 
where employee_id = '';

ALTER TABLE tasks
ADD extended_date DATE;

ALTER TABLE tasks
ADD remarks varchar(500);

ALTER TABLE tasks
ADD status int default 0;

ALTER TABLE tasks
DROP COLUMN status;

