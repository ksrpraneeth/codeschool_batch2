--designation table
create table designation(id serial primary key,description varchar(40) not null check(description<>''));

insert into designation(id,description) values(1,'software developer');
insert into designation(id,description)values (2,'software tester'),(3,'frontend designer'),(4,'photoshop designer'),(5,'databse designer');

--location table
create table location(id serial  primary ,district varchar(40) not null check(district<>''));

insert into location(id,district) values(1,'bhdrak'),(2,'jajpur'),(3,'cuttack'),(4,'khordha'),(5,'balasore')(6,'keonjhar');
--working status table
create table working_status(id int primary key not null check(id<>0),status_description varchar(40) not null check(status_description<>''));

insert into working_status(id,status_description) values(1,'working'),(2,'expired'),(3,'retired'),(4,'suspended');


--employee table 
create table employees(id serial   primary key  ,firstname varchar(30) not null check(firstname<>''),lastname varchar(30) not null check(lastname<>''),
 surename varchar(5) not null check(surename<>''),date_of_joining date  not null,DOB date not null ,gender varchar(6) not null check(gender<>''),
 working_status_id int references working_status(id),designation_id int references designation(id),location_id int references location(id),
 gross int not null check(gross<>0),created_at timestamptz not null default now());



 insert into employees(firstname,lastname,surename,date_of_joining,dob,gender,working_status_id,designation_id,location_id,gross) values
 ('chinmaya','biswal','mr','12-10-20','02-04-1999','male',1,1,2,80000),
('jyoti praksh','rout','mr','11-11-19','12-10-1998','male',1,5,2,50000),('dipti','pradhan','mrs','01-07-19','11-11-1998','female',3,4,2,45000),('pratik','pradhan','mr','20-09-20','11-12-1999','male',3,2,3,40000),('susil','biswal','mr','10-09-22','11-08-1996','male',4,4,5,30000),('manas','dhal','mr','08-10-22','05-02-1997','male',3,2,4,25000),('rajshree','parida','mrs','10-05-18','23-05-1998','female',1,1,5,30000),('ritik','shrama','mr','12-12-22','02-04-1996','male',2,3,4,42000),('satya','sarab','mr','03-08-20','20-01-1998','male',4,1,1,41000),('ankita','upadhaya','mrs','10-08-19','20-11-2001','female',2,2,4,45000),
('partha','biswal','mr','02-08-21','01-05-1997','male',4,3,1,20000),('rajesh','bali','mr','12-03-22','11-11-1998','male',1,3,2,25000),('shiva','thakur','mr','13-04-18','08-02-2021','male',1,5,6,32000),('priti','jaiswal','mrs','10-12-20','02-02-1996','female',3,3,3,52000),('rajeswari','pandit','mrs','01-01-95','25-05-2020','female',4,2,1,25000),('tina','rao','mrs','08-09-17','04-04-2000','female',2,3,4,23000),('rama','ranjan','mr','04-08-12','01-06-2022','male',4,3,2,22000),('harish','sharma','mr','01-05-19','02-04-1999','male',4,2,6,21000),('debesh','nayak','mr','05-08-22','07-07-1995','male',1,3,4,41000),('amresh','biswal','mr','11-05-20','10-10-1994','male',1,1,1,52000);

update  employees
 set date_of_joining='25-05-2020',dob='01-01-1995'
 where id=15;

--salary component table
create table salary_component(id serial primary key ,description varchar(30) not null check(description<>''),type varchar(20) not null check(type<>''));

insert into salary_component(description,type)values('basic','earning'),('DA','earning'),('HRA','earnings'),('CA','earnings'),('medical allownces','earnings'),('bonus','earnings'),('TDS','deduction'),('pf','deduction');


--salaries
create table salaries(id serial primary key not null check(id<>0),employee_id int references employees(id),month int not null check(month<>0 and month<13),year int not null check(year<>0),paid_on date,gross int not null check(gross<>0),deduction int not null check(deduction<>0),net int not null check(net<>0),created_at timestamptz not null default now());


insert into salaries(employee_id,month,year,paid_on,gross,deduction,net)values
(1,01,2021,'31-01-2021',80000,10000,70000),
(2,12,2019,'31-12-2019',50000,15000,35000),
(7,06,2018,'30-06-2018',30000,10000,20000),
(12,04,2022,'21-04-2022',25000,8000,17000),
(13,05,2018,'18-05-2018',32000,12000,20000),
(19,09,2022,'30-09-2022',41000,10000,31000),
(20,06,2020,'30-06-2020',52000,10000,42000),

(1,02,2021,'25-02-2021',80000,10000,70000),
(2,01,2020,'30-01-2020',50000,15000,35000),
(7,07,2018,'28-07-2018',30000,10000,20000),
(12,05,2022,'21-05-2022',25000,8000,17000),
(13,06,2018,'18-06-2018',32000,12000,20000),
(19,10,2022,'30-10-2022',41000,10000,31000),
(20,07,2020,'30-07-2020',52000,10000,42000),

(1,03,2021,'31-03-2021',80000,10000,70000),
(2,02,2020,'22-02-2020',50000,15000,35000),
(7,08,2018,'28-08-2018',30000,10000,20000),
(12,06,2022,'22-06-2022',25000,8000,17000),



(12,07,2022,'22-07-2022',25000,8000,17000),
(13,08,2018,'19-08-2018',32000,12000,20000),
(20,09,2020,'30-09-2020',52000,10000,42000)
;

--salaries details
create table salary_details(id serial primary key ,salary_id int references salaries(id),salary_component_id int references salary_component(id),amount int not null check(amount<>0),created_at timestamptz not null default now());

insert into salary_details(salary_id,salary_component_id,amount) values
(1,1,40000),(1,2,10000),(1,3,5000),(1,4,5000),(1,5,5000),(1,6,15000),(1,7,4000),(1,8,6000),

(2,1,20000),(2,2,4000),(2,3,6000),(2,4,5000),(2,5,5000),(2,6,10000),(2,7,6000),(2,8,9000),

(3,1,20000),(3,2,2000),(3,3,2500),(3,4,1000),(3,5,1000),(3,6,3500),(3,7,2000),(3,8,8000),

(4,1,20000),(4,2,2000),(4,3,500),(4,4,1000),(4,5,500),(4,6,1000),(4,7,2000),(4,8,6000),

(5,1,20000),(5,2,2000),(5,3,3000),(5,4,1000),(5,5,1000),(5,6,5000),(5,7,3000),(5,8,9000),

(6,1,25000),(6,2,2500),(6,3,2500),(6,4,3000),(6,5,3000),(6,6,5000),(6,7,4000),(6,8,6000),

(7,1,45000),(7,2,1500),(7,3,1000),(7,4,1000),(7,5,1000),(7,6,2500),(7,7,4000),(7,8,6000)

;