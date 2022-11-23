CREATE DATABASE MY_LIFE



// Address Table :

CREATE TABLE Address(
    AddressID SERIAL PRIMARY KEY,
    DistrictName VARCHAR(30) NOT NULL,
    VillageName VARCHAR(30) NOT NULL,
    PinCode NUMERIC(6) NOT NULL
);

INSERT INTO Address(DistrictName,VillageName,PinCode)
VALUES ('JAJPUR','AREI',755027),('BHADRAK','MANJURI ROAD',756120),('ANUGUL','BANTULU',759034),('KENDRAPADA','HARIPUR',760947),('SALEPUR','DASA SAHI',780563),('MAYURBHANJ','KOLEIPADA',758057),('BALASORE','REMUNA',750987),('PURI','CHANDANPUR',760123),('KHURDA','RASULPUR',759438),('NABARANGPUR','SALIPURA',765430),('CUTTACK','CHANDICHHAK',756002),('SALEPUR','DASA SAHI',780563),('JAJPUR','AREI',755027),('KEONJHAR','ANANDAPUR',750839),('BALASORE','REMUNA',750987),('NABARANGPUR','BALIPURA',765400),('DHENKANAL','BADAMPUR',705430),('DEBAGARH','HATAPUR',750909),('SONPUR','KALIDAPUR',780348),('CUTTACK','MADHUPUR','750941');


// Patient Table :

CREATE TABLE Patients(
    PatientID SERIAL PRIMARY KEY,
    FirstName VARCHAR (30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    PatientPhoneNumber NUMERIC (10) NOT NULL,
     AddressID INTEGER,
      FOREIGN KEY(AddressID) 
      REFERENCES Address(AddressID)
);

INSERT INTO Patients(FirstName,LastName,PatientPhoneNumber,AddressID)
VALUES ('RAGHAB','JUAL',9876655037,1),('HRITIK','ROSAN',9850978429,2),('kabir','SAHA',9174829462,3),('RISHAB','MITHA',8290017392,4),('CHINMAY','SETHY',9345876997,5),('SANGRAM','YUPTA',7284973081,6),('SUSMA','YALKA',8129746300,7),('HANSIKA','MISHRA',9218746284,8),('DONAL','YUPTA',9098736296,9),('GURA','SING',8340983702,10);



//DOCTOR TABLE



 CREATE TABLE Doctors(
    DoctorID SERIAL PRIMARY KEY,
    DoctorName VARCHAR (50) NOT NULL,
    AddressID INTEGER UNIQUE,
    FOREIGN KEY(AddressID) 
      REFERENCES Address(AddressID)

 );
 INSERT INTO Doctors(DoctorName,AddressID)
 VALUES ('Dr. C. BISWAL',20),('Dr. JP. ROUT',13),('Dr. MANASWINI',14),('Dr. SIHANA',12),('Dr. NATASA',11),('Dr. SUNAYA',15),('Dr. AMULYA',18),('Dr. ZOYA',19),('Dr. HARESH',17),('Dr. XEPRON',16);


 //Medicine Table


 CREATE TABLE Medicines(
    MedicineID SERIAL PRIMARY KEY,
    MedicineName VARCHAR(50) NOT NULL,
    MedicineCode VARCHAR (10) NOT NULL
 );

 INSERT INTO Medicines (MedicineID,MedicineName,MedicineCode)
 VALUES (100,'PARACETAMOL 650mg','PTM38'),(101,'CALVAM 625mg','CV65'),(102,'Azithromycin','AZM8'),(103,'Cyclobenzaprine','CY09'),(104,'Pantoprazole','PT54'),(105,'Ozempic','OZ19'),(106,'Ibuprofen','IB76'),(107,'Bunavail','BVL98'),(108,'Hydroxychloroquine','HYDC45'),(109,'Naproxen','NPX87'),(110,'Gilenya','GLY98'),(111,'Adderall XR','AX56'),(112,'Azulfidine EN-Tabs','AET38'),(113,'HepaGam B','HP54'),(114,'Hepatitis B Vaccine','HPBV09'),(115,'Hydralazine','HYDZ'),(116,'Hylan G-F 20','HYL20'),(117,'Paromomycin Sulfate','PS79'),(118,'Penicillin VK','PVK88'),(119,'Yohimbine Hydrochloride','YHYD50');






 //Prescriptions Table



 CREATE TABLE Prescriptions(
    PrescriptionID SERIAL PRIMARY KEY ,
    PatientID INTEGER NOT NULL ,
    DoctorID INTEGER NOT NULL,
    MedicineID INTEGER  NOT NULL,
    PatientName VARCHAR(50) NOT NULL,
    Cost INTEGER NOT NULL,
    FOREIGN KEY(PatientID)
    REFERENCES Patients(PatientID),
    FOREIGN KEY(DoctorID)
    REFERENCES Doctors(DoctorID),
    FOREIGN KEY (MedicineID)
    REFERENCES Medicines(MedicineID)
    
 );


 INSERT INTO Prescriptions(PatientID,DoctorID,MedicineID,PatientName,Cost)
 VALUES (2,24,117,'HRITIK ROSAN',6000),(6,28,119,'SANGRAM YUPTA',2000),(8,23,119,'HANSIKA MISHRA',4000),(3,24,118,'kabir SAHA',8000),(7,24,119,'SUSMA YALKA',2500),(2,28,114,'HRITIK ROSAN',2340),(4,25,113,'RISHAB MITHA',4500),(7,32,112,'SUSMA YALKA',8012),(9,32,117,'DONAL YUPTA',1200),(2,30,115,'HRITIK ROSAN',1808);


 CREATE TABLE Payments(
    PaymentID SERIAL PRIMARY KEY,
    PrescriptionId INTEGER  UNIQUE NOT NULL,
    PaymentMethod VARCHAR(40) NOT NULL,
    FOREIGN KEY(PrescriptionID)
    REFERENCES Prescriptions(PrescriptionID)
 );
 INSERT INTO Payments(PrescriptionID,PaymentMethod)
 VALUES (1,'CASH'),(4,'UPI'),(3,'CARD'),(2,'UPI'),(6,'UPI'),(8,'UPI'),(5,'CASH'),(9,'CARD'),(7,'UPI'),(10,'CARD');