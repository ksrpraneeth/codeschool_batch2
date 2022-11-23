CREATE TABLE Users(
    userID SERIAL PRIMARY KEY NOT NULL,
    userName VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL

);
INSERT INTO Users(userName,password,Email)VALUES('susil123','susil@123','susilbiswal7@gmail.com');
INSERT INTO Users(userName,password,Email)VALUES('jyoti123','jyoti@123','jyotiranjan8@gmail.com');
INSERT INTO Users(userName,password,Email)VALUES('chinmay123','chinu@123','chinmaybiswal8@gmail.com');
INSERT INTO Users(userName,password,Email)VALUES('pranab123','pranu@123','pranabnayak8@gmail.com');
INSERT INTO Users(userName,password,Email)VALUES('akash123','akash@123','akashnayak8@gmail.com');
INSERT INTO Users(userName,password,Email)VALUES('bikash','bikash@123','bikashnayak8@gmail.com');

-- table 2
CREATE TABLE Categories(
    CategoryID SERIAL PRIMARY KEY NOT NULL,
    CategoryName VARCHAR(50) NOT NULL,
    Description VARCHAR(50) NOT NULL

);
INSERT INTO Categories(CategoryName, Description)VALUES('clothing','jeans,t-shirt,shorts');
INSERT INTO Categories(CategoryName, Description)VALUES('footwear','sports shoe,casual shoe,formal shoe');
INSERT INTO Categories(CategoryName, Description)VALUES('Dairy Products','Cheeses');
INSERT INTO Categories(CategoryName, Description)VALUES('Grains/Cereals','Breads, crackers, pasta, and cereal');
INSERT INTO Categories(CategoryName, Description)VALUES('Beverages','drinks, coffees, teas, beers');


-- table3 
CREATE TABLE Products(
    ProductID SERIAL PRIMARY KEY NOT NULL,
    ProductName VARCHAR(50) NOT NULL,
    CategoryID INT  references Categories(CategoryID),
    Price INT NOT NULL
);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('jeans',1,500);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('t-shirt',1,299);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('sports shoe',2,499);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('casual shoe',2,400);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('amul cheese',3,50);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('brie',3,80);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('feta',3,70);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('Breads',4,40);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('pasta',4,60);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('coffees',5,20);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('Chais',5,10);
INSERT INTO Products(ProductName,CategoryID,Price )VALUES('cocacola',5,10);


-- table 4
CREATE TABLE Cart(
    CartID SERIAL PRIMARY KEY NOT NULL,
    Quantity INT NOT NULL,
    ProductID INT  references Products(ProductID),
    userID INT  references Users(userID)
);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,2,1);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(2,3,1);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,1,2);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(3,4,3);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,5,4);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,6,5);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(2,7,6);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,8,6);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,9,2);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,10,6);
INSERT INTO Cart(Quantity,ProductID,userID )VALUES(1,11,6);

-- table-5
CREATE TABLE Orders(
    OrderID INT PRIMARY KEY NOT NULL,
    userID INT  references Users(userID),
    OrderDate VARCHAR(50) NOT NULL,
    AddressID INT references userAddress(AddressID)
);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2000,1,'2022-07-04',1);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2001,1,'2022-07-04',1);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2002,2,'2022-08-04',2);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2003,2,'2022-08-04',2);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2004,3,'2022-07-08',3);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2005,3,'2022-07-08',3);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2006,4,'2022-07-09',4);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2007,4,'2022-07-09',4);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2008,5,'2022-07-10',5);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2009,5,'2022-07-11',5);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2010,6,'2022-07-11',6);
INSERT INTO Orders( OrderID,userID,OrderDate,AddressID )VALUES(2011,6,'2022-07-12',6);

-- table-6
CREATE TABLE UserAddress(
    AddressID SERIAL PRIMARY KEY NOT NULL,
    userID INT  references Users(userID),
    City VARCHAR(30) NOT NULL,
    PostalCode VARCHAR(30) NOT NULL,
    State VARCHAR(30) NOT NULL
);
INSERT INTO UserAddress(userID,city,PostalCode,State )VALUES(1,'bbsr',751024,'odisha');
INSERT INTO UserAddress(userID,City,PostalCode,State )VALUES(1,'athagrah',751020,'odisha');
INSERT INTO UserAddress(userID,City,PostalCode,State )VALUES(2,'cuttack',751021,'odisha');
INSERT INTO UserAddress(userID,City,PostalCode,State )VALUES(2,'bhadrak',751024,'odisha');
INSERT INTO UserAddress(userID,City, PostalCode,State)VALUES(3,'banki',754008,'odisha');
INSERT INTO UserAddress(userID,City, PostalCode,State)VALUES(3,'dompara',751024,'odisha');
INSERT INTO UserAddress(userID,City, PostalCode,State)VALUES(4,'khurda',751022,'odisha');
INSERT INTO UserAddress(userID,City, PostalCode,State)VALUES(5,'balasore','751060','odisha');
INSERT INTO UserAddress(userID,City, PostalCode,State)VALUES(6,'jajpur',751001,'odisha');

CREATE TABLE OrderDetails(
    OrderDetailsID SERIAL PRIMARY KEY NOT NULL,
    OrderID  INT  references Orders(OrderID),
    ProductID INT  references Products(ProductID),
    Quantity INT NOT NULL   
);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2000,2,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2001,3,2);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2000,1,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2002,4,2);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2000,3,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2003,1,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2004,5,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2005,6,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2006,7,1);
INSERT INTO OrderDetails(OrderID,ProductID,Quantity)VALUES(2007,8,1);




-- Q1
select p.categoryid,count(*),sum(p.price),c.categoryname from Products as p join Categories as c on p.CategoryID=c.CategoryID group by p.categoryid,c.categoryname;
-- q2
 select u.userID,p.userName,u.city from UserAddress as u join Users as p on u.userID=p.userID order by p.userName;
--  Q3
 select p.userName,array_agg(u.city) from UserAddress as u join Users as p on u.userID=p.userID group by p.username order by p.userName;


-- q4
 select c.userid, count(p.productname),sum(price) from Products as p join Cart as c on p.productid=c.productid group by c.userID;
--  q5
select c.userid,u.userName,count(p.productname),sum(price) from Products as p join Cart as c on p.productid=c.productid join Users as u on c.userID=u.userID group by c.userID,u.userName;

-- q6
select orderid, count(productid) from OrderDetails group by orderid having  count(productid)>2 order by orderid;
-- q7
 select od.orderid, count(od.productid),u.username from orderdetails as od join orders as o on od.orderid=o.orderid join users as u on o.userid=u.userid group by od.orderid,u.username having count(od.productid)>2;
--  Q8
 select userid,count(addressid) from orders as o group by userid,addressid having count(distinct addressid)>1;
-- q9
 select distinct o.userid,u.userName from orders as o join users as u on u.userid=o.userid;
-- Q10
  select userid from orders group by userid having count(*)=(select max(ordercount) from (select userid, count(orderid) as ordercount from orders as o group by userid) s);