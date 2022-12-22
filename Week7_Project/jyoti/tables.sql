CREATE DATABASE ifmis;

--Agency Table
CREATE TABLE agency(
    agencyId SERIAL PRIMARY KEY,
    agencyName VARCHAR (64),
    mobileNumber BIGINT,
    panNumber VARCHAR
);

--GSTIN Table
CREATE TABLE gstin(
    gstinId SERIAL PRIMARY KEY,
    agency_id INT REFERENCES agency(agencyId),
    gstNumber VARCHAR (32)
);

--IFSC Code Table 
CREATE TABLE ifsc(
    ifscId SERIAL PRIMARY KEY,
    ifscCode VARCHAR UNIQUE,
    bankName VARCHAR,
    branchName VARCHAR,
    stateName VARCHAR
);

INSERT INTO
    ifsc(ifscCode, bankName, branchName, stateName)
VALUES
    (
        'SBIN0020132',
        'STATE BANK OF INDIA',
        'SIRPUR',
        'ANDHRA PRADESH'
    ),
(
        'SBIN0020044',
        'STATE BANK OF INDIA',
        'NALDURG',
        'MAHARASHTRA'
    ),
(
        'SBIN0020222',
        'STATE BANK OF INDIA',
        'KUKANOOR',
        'KARNATAKA'
    ),
(
        'SBIN0020046',
        'STATE BANK OF INDIA',
        'UMARGA',
        'MAHARASHTRA'
    ),
(
        'SBIN0020047',
        'STATE BANK OF INDIA',
        'PARANDA',
        'MAHARASHTRA'
    ),
(
        'SBIN0020185',
        'STATE BANK OF INDIA',
        'GADWAL',
        'ANDHRA PRADESH'
    ),
    (
        'SBIN0020239',
        'STATE BANK OF INDIA',
        'HUMNABAD',
        'KARNATAKA'
    ),
    (
        'SBIN0020240',
        'STATE BANK OF INDIA',
        'AURAD',
        'KARNATAKA'
    ) --Agency Bank Details Table
    CREATE TABLE agencyBankDetails(
        id SERIAL PRIMARY key,
        agency_id int REFERENCES agency(agencyid),
        ifsc_id int REFERENCES ifsc(ifscid),
        -- gstin_id int  REFERENCES gstin(gstinid),
        accountnumber BIGINT not null
    )
     --Admin Sanction Number
    CREATE TABLE adminsanctionnumber(
        id SERIAL PRIMARY KEY,
        adminsanctionnumber VARCHAR
    ) --Admin Sanction Number
    CREATE TABLE adminsanctionamount(
        id SERIAL PRIMARY KEY,
        adminsanctionamount BIGINT
    ) --Department 
    CREATE TABLE department(
        id SERIAL PRIMARY KEY,
        departmentname VARCHAR
    )
INSERT INTO
    department(departmentname)
VALUES
('IRRIGATION'),
('FOOD'),
('AGRICULTURE'),
('EDUCATION');

--Sanction Authority
CREATE TABLE sanctionauthority(
    id SERIAL PRIMARY KEY,
    sanctionauthority VARCHAR
)
INSERT INTO
    sanctionauthority(sanctionauthority)
VALUES
('C'),
('V');

--HOA 
CREATE TABLE hoa(
    id SERIAL PRIMARY KEY,
    hoa BIGINT UNIQUE
)
INSERT INTO
    hoa(hoa)
VALUES
    (2054000010002010011),
(2054000010002010012),
(2054000010002010013),
(2054000010002010016),
(2054000010002010017),
(2054000010002010018),
(2054000010002010019),
(2054000010002040041),
(2054000010002040042),
(2054000010002110111);

--Year
CREATE TABLE year(
    id SERIAL PRIMARY KEY,
    year VARCHAR
)
INSERT INTO
    year(year)
VALUES
    ('2000-2001'),
('2001-2002'),
('2002-2003'),
('2003-2004'),
('2004-2005'),
('2005-2006'),
('2005-2006'),
('2006-2007'),
('2007-2008'),
('2008-2009'),
('2009-2010'),
('2010-2011'),
('2011-2012'),
('2012-2013'),
('2013-2014'),
('2014-2015'),
('2015-2016'),
('2016-2017'),
('2017-2018'),
('2018-2019'),
('2019-2020'),
('2020-2021'),
('2021-2022'),
('2022-2023');

--Admin Sanction Table
CREATE TABLE adminsanction(
    id SERIAL PRIMARY KEY,
    asnumber VARCHAR UNIQUE,
    hoanumber BIGINT REFERENCES hoa(id),
    sanctionauthority VARCHAR,
    asdate DATE,
    year VARCHAR,
    department_id INT REFERENCES department(id),
    typeofsanction VARCHAR,
    asamount BIGINT
);

--Technical Sanction Table
CREATE TABLE technicalsanction(
    id SERIAL PRIMARY KEY,
    tsnumber VARCHAR UNIQUE,
    as_id BIGINT REFERENCES adminsanction(id),
    tssanctionauthority VARCHAR,
    tsdate DATE,
    tsamount BIGINT
)

--Create workId Table

CREATE TABLE workid(
    id SERIAL PRIMARY KEY,
    hoa_id BIGINT REFERENCES hoa(id),
    as_id BIGINT REFERENCES adminsanction(id),
    ts_id BIGINT REFERENCES technicalsanction(id),
    agreementNo VARCHAR UNIQUE,
    workName VARCHAR ,
    sanctionAuthority VARCHAR,
    estimateValue BIGINT,
    agreementValue BIGINT,
    expenditureTillDate BIGINT,
    pendingBillAmount BIGINT,
    tenderPercentage VARCHAR,
    ssrYear VARCHAR,
    startDate DATE,
    workPeriodMonth INT,
    workPeriodDay BIGINT,
    expectedDateCompletion BIGINT
  
)




--Agrrement and Agency/PAN Table

CREATE TABLE workidpan(
    id SERIAL PRIMARY KEY,
    work_id BIGINT REFERENCES workid(id) ,
    pan_id BIGINT REFERENCES agency(agencyid)
);