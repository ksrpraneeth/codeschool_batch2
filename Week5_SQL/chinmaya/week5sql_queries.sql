--question 1
select concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district from employees as e,working_status as w,location as l,designation as d
 where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id;

 --question 2
 select l.district, count(e.id) as no_of_employees from employees as e join location as l ON e.location_id = l.id  group by l.district order by l.district asc;
 
 --question 3
 select count(e.id) as no_of_employees,e.designation_id,d.description from designation as d,employees as e
 where e.designation_id =d.id 
 group by (e.designation_id,d.description)


 --question 4

 select e.working_status_id,w.status_description,count(e.id) from employees as e,working_status as w
 where w.id=e.working_status_id
 group by (e.working_status_id,w.status_description)
 order by e.working_status_id; 
 

--question 5
select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname) as name,e.dob,e.date_of_joining,e.dob +interval '60 years' as retirement_date from employees as e

--question-6
select concat(e.surename,' ',e.firstname,' ',e.lastname) as name,s.month,s.year,s.paid_on,s.gross,s.deduction,s.net from salaries as s inner join employees as e
on s.employee_id=e.id
where s.month=10 and s.year=2022 


--question 7
--minimum salary
select s.gross,s.employee_id,concat(e.surename,' ',e.firstname,' ',e.lastname) as name from salaries as s
,employees as e
where s.employee_id=e.id
group by (s.employee_id,s.gross,name)
order by s.gross
limit 1
--maximum
select s.gross,s.employee_id,concat(e.surename,' ',e.firstname,' ',e.lastname) as name from salaries as s
,employees as e
where s.employee_id=e.id
group by (s.employee_id,s.gross,name)
order by s.gross desc
limit 1
--average salary


 --question 8
select concat(e.surename,' ',e.firstname,' ',e.lastname) as name,sc.description,sd.amount from salary_details as sd
,salary_component as sc,salaries as s,employees as e
where sd.salary_component_id=sc.id and sd.salary_id=s.id and s.employee_id=e.id

--question 9
select s.employee_id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.id as name from salaries as s
,employees as e
where s.employee_id=e.id  and e.id not in(select concat(e.surename,' ',e.firstname,' ',e.lastname) as name,s.month,s.year,s.paid_on,s.gross,s.deduction,s.net from salaries as s inner join employees as e
on s.employee_id=e.id
where s.month=10 and s.year=2022 )
group by (s.employee_id,s.gross,name)
order by s.gross desc
