-- query 1
select e.id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) as employee_name, e.date_of_joining, e.date_of_birth, e.gender, e.phone, w._description, d._description, l.district
from employees as e, working_status as w, designations as d, locations as l
where e.working_status_id = w.id and e.designation_id = d.id and e.location_id = l.id;

-- query 2
select l.district as location, count(e.location_id) as employee_count
from employees as e, locations as l
where e.location_id = l.id 
group by l.district
order by l.district;

-- query 3
select d._description as designation, count(e.designation_id) as employee_count 
from employees as e, designations as d 
where e.designation_id = d.id 
group by d._description
order by d._description;

-- query 4
select w._description as working_status, count(e.working_status_id) as employee_count 
from employees as e, working_status as w 
where e.working_status_id = w.id 
group by w._description
order by w._description;

-- query 5
select id as employee_id, CONCAT(surname, ' ', firstname, ' ', lastname) as employee_name, date_of_birth, date_of_joining, date_of_birth + interval '60 years' as retirement_date
from employees;

-- query 6
select s.id as salary_id, s.employee_id as employee_id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) as employee_name, s._year as salary_year, s._month as salary_month, s.paid_on, s.gross_salary, s.deductions, s.net_salary
from salaries as s, employees as e
where s.employee_id = e.id and s._month = 10 and s._year = 2022;

-- query 7
-- for maximum salary
select id as employee_id, gross_salary from employees where working_status_id = 1
order by gross_salary desc
limit 1;

-- for minimum salary
select id as employee_id, gross_salary from employees where working_status_id = 1
order by gross_salary asc
limit 1;

-- for avg salary of employees
select avg(gross_salary) as average salary from employees where working_status_id = 1;

--query 8
select s.id as salary_id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) as employee_name, sc._description, sc._type, sd.amount
from salaries as s, salary_details as sd, salary_components as sc, employees as e
where s.employee_id = e.id and sd.salary_id = s.id and sd.salary_component_id = sc.id and s._month = 10 and s._year = 2022
order by s.id;


-- query 9
-- by using left join with is null, for emp who didn't receive salary not only once 
select *
from employees e
left join salaries s
on e.id = s.employee_id
where s.employee_id is null;

-- by using sub query
select id
from employees
where id not in
    (select employee_id from salaries where salaries._month = 10);   