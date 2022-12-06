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
        designation VARCHAR(50)
);

INSERT INTO employees (employee_id,organization_id,employee_name,mobile,email_id,income,designation)
VALUES ('150PX03','1','Shiva','7901549116','shivamogas@gmail.com','10000','Intern'),
('310Inf07','2','Abhilash','9876543210','abhi@gmail.com','12000','Intern'),
('150PX05','1','vamshi','6300012151','vamshi@gmail.com','10000','Intern'),
('150PX15','1','Uday','9852624123','uday@gmail.com','110000','Senior software developer'),
('250Cog01','3','Santhoshi','8546971232','vanthoshi@gmail.com','15000','Intern'),
('150PX42','1','Praneeth','9852624023','praneeth@gmail.com','150000','Technical Lead'),
('150PX35','1','Suhas','9882624023','suhas@gmail.com','110000','AWS'),
('310Inf98','2','Abhilash','9848834233','abhilash@gmail.com','98000','AWS'),
('250Cog52','3','Sthitha','8465056529','sthitha@gmail.com','75000','Software developer'),
('250Cog65','3','vikas','9885832226','vikas@gmail.com','210000','Senior ROR Developer');

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

