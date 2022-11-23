-- Q1 HOW MANY PRESCRIPTIONS ARE RECORDED IN DATABASE
 SELECT COUNT(PrescriptionID) FROM Prescriptions;



 --Q2 Which doctor(name) does have the most number of patients



SELECT  DoctorName,D.DoctorID,COUNT(P.PatientID) AS count_Patient FROM Doctors AS D 
 INNER JOIN Prescriptions AS P ON
D.DoctorID=P.DoctorID
GROUP BY D.DoctorID
ORDER BY (count_Patient) DESC LIMIT 1;


-- Q3 What is the most common method of payment 





SELECT MAX(PaymentMethod) FROM (SELECT count(P.PrescriptionID) AS E ,P.PaymentMethod FROM Payments AS P
GROUP BY (P.PaymentMethod)) AS W;





--Q4   List the Medicines Prescribed more than two times




SELECT  M.MedicineName,count(P.PrescriptionID) FROM Medicines AS M 
INNER JOIN Prescriptions AS P ON 
M.MedicineID=P.MedicineID
GROUP BY M.MedicineID
HAVING (count(P.PrescriptionID)>2);

--Q5 List the name of Doctors with the number of written prescriptions



SELECT   D.DoctorName, count(P.PrescriptionID) FROM Prescriptions AS P
RIGHT JOIN Doctors AS D ON 
D.DoctorID=P.DoctorID
GROUP BY D.DoctorName;




--Q6 List the customers and the number of Prescriptions each has


SELECT P.PatientID,P.FirstName,count(PR.PrescriptionID) FROM Patients AS P 
LEFT JOIN Prescriptions AS PR ON
P.PatientID=PR.PatientID
GROUP BY P.PatientID;





--Q7  List the most Prescribed Medicines in ascending order

SELECT MED.MedicineName,(count(PR.PrescriptionID) ) FROM Medicines AS MED 
INNER JOIN Prescriptions AS PR ON
MED.MedicineID=PR.MedicineID
GROUP BY MED.MedicineName
ORDER BY ((count(PR.PrescriptionID) )) asc;


--Q9  What is the average cost of each prescription
SELECT avg(cost) FROM Prescriptions;






--Q10 What is the id of the most expensive Prescription




(SELECT  MAX(cost) AS EXPENSIVE FROM Prescriptions
 );


--Q11  Which city has the most number of doctors



SELECT  max(DOC.DoctorName) AS doctor_name,COUNT(DOC.DoctorID) AS address_count FROM Address AS A 
INNER JOIN Doctors AS DOC ON
DOC.AddressID=A.AddressID
GROUP BY A.AddressID;





--Q12 List and rank Prefered method of Payment



SELECT PaymentMethod, count(PaymentID) AS prefered_count FROM Payments
GROUP BY PaymentMethod
ORDER BY (prefered_count) DESC;





--Q 13 What is the name of the most prescribed medicine




SELECT MAX(MedicineName)FROM (SELECT MED.MedicineName, count(PR.PrescriptionID)  FROM Prescriptions AS PR
INNER JOIN Medicines AS MED ON
MED.MedicineID=PR.MedicineID
GROUP BY (MED.MedicineName)) AS Y;