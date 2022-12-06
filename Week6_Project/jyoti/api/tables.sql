CREATE DATABASE e_commerce;


--Create table role


CREATE TABLE role(
    id  INT PRIMARY KEY,
    role_name VARCHAR(20)
);
insert into role(id,role_name) values(1,'Customer'),(2,'Admin')


--Create user table


Create table users(
    id SERIAL PRIMARY KEY ,
    userName VARCHAR (64) ,
    phoneNumber NUMERIC UNIQUE ,
    password VARCHAR ,
    role_id INT references role(id)
)
INSERT INTO users(userName,phoneNumber,password,role_id) VALUES('Jyotiprakash',9777815283,'jy@123',2),('Chinmay',9876583982,'ch@123',1),('Apex',8739273028,'ap@123',1),('Seyal',9017289827,'se@123',1),('Rolex',8028917309,'ro@123',1),('Unix',9810928309,'un@123',2),('Omanu',8028917389,'om@123',1),('Ayut',7028917309,'au@123',1),('Goyal',8028988309,'go@123',1),('Human',9928917309,'hu@123',1),('Zelow',8028918765,'ze@123',1),('Zemon',8028919874,'ze@123',1),('Zeman',9034568765,'ze@123',1),('Peow',8028966765,'pe@123',1),('Unic',8228918765,'un@123',2),('Neoty',8028918755,'ne@123',1),('Isum',8028918887,'is@123',2),('Ceara',7896540970,'ce@123',1),('Devine',8008918765,'de@123',1),('Tiouy',7860964509,'ti@123',1),('Rocket',8028918665,'ro@123',1);





-- Address Table


CREATE TABLE address(                                       
    id SERIAL PRIMARY KEY,
    stateOrUT VARCHAR (32),
    village VARCHAR (64),
    PIN NUMERIC (6) ,
    user_id INT references users(id)
    );

    INSERT INTO address(stateOrUT,village,PIN,user_id) VALUES('ODISHA','Arei',755027,1),('BHADRAK','Manjuri Road',760986,2),('MAHARASTRA','Retal',980618,3),('KARNATAKA','Kukatpalli',460980,4),('GUJURAT','Siharpur',400021,5),('HARYANA','Nemapur',709153,6),('ANDRA PRADESH','Guntur',800926,7),('WEST BENGAL','Simulia',807234,8),('JHARKHAND','Sitapur',600921,9),('Pondichery','Deoli',700821,10),('UTTAR PRADESH','Sarojini Nagar',650982,11),('ARUNACHAL PRADESH','Rampur',509618,12),('BIHAR','Haridaspur',509183,13),('MANIPUR','Chiaoi',209385,14),('TELENGANA STATE','Sitamipalli',500028,15),('HARYANA','Gudampur',700087,16),('NAGALAND','Geura',400026,17),('ODISHA','Gopalpur',755021,18),('GOA','Seurai',600066,19),('TELENGANA STATE','Kukatpalli',500019,20),('KERALA','Sumanpeddi',760982,21);


    --Create Table Products


CREATE TABLE products(
        id SERIAL PRIMARY KEY,
        productName VARCHAR   ,
        category VARCHAR   ,
        brand VARCHAR  ,
        rating NUMERIC ,
        productPrice NUMERIC,
        offerPrice NUMERIC,
        productDescription VARCHAR 
    );

    INSERT INTO products(productName,category,brand,rating,productPrice,offerPrice,productDescription) VALUES ('iPhone 14','Mobile','Apple',4.8,94000,88000,'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A14 Bionic chip'),('Samsung S22 Ultra','Mobile','Samsung',4.7,132000,115000,'SIM-Free, Model S19211 6.8-inch Super Retina HD display Samsung new variant which goes beyond Galaxy to the Universe'),('OPPO F23','Mobile','Oppo',4.2,34000,32000,'OPPO F23 is officially announced on April 2021.'),('MacBook Pro
','Laptop','Apple',4.6,152000,138000,'MacBook Pro 2022 with mini-LED display may launch between September, December'),('Microsoft Surface Laptop 4','Laptop','Microsoft',4.0,78000,72000,'Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.'),('HP Pavilion 15','Laptop','HP',4.5,72000,68000,'HP Pavilion 15Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10'),('Perfume Oil','Fragrances','Impression',4.2,899,799,'Mega Discount, Impression of Acqua Di Gio by GiorgioArmani concentrated attar perfume Oil'),('Non-Alcoholic Perfume Oil','Fragrances','Fog',4.1,299,249,' 16ml Non-Alcoholic Concentrated Perfume Oil'),('Hyaluronic Acid Serum','Skincare','LOreal Paris',4.5,699,599,'LOreal Paris introduces Hyaluron Expert Replumping Serum formulated with 1.5% Hyaluronic Acid'),('Oil Free Moisturizer 100ml','skincare','Dermive',4.2,399,349,'Dermive Oil Free Moisturizer with SPF 20 is specifically formulated with ceramides, hyaluronic acid & sunscreen'),('Skin Beauty Serum','skincare','ROREC White Rice',3.8,249,219,'Product name: rorec collagen hyaluronic acid white face serum riceNet weight: 15 m'),('Daal Masoor 500 grams','Grocery','Saaf & Khaas',4.3,68,62,'Fine quality Branded Product Keep in a cool and dry place'),('Elbow Macaroni - 400 gm','Grocery','Bake Parlor Big',4.5,89,82,'	Product details of Bake Parlor Big Elbow Macaroni - 400 gm'),('	Orange Essence Food Flavou','Grocery','Baking Food Items',4.6,99,93,'Specifications of Orange Essence Food Flavour For Cakes and Baking Food Item'),('Plant Hanger For Home','Home Decoration','Boho Decor',3.8,549,389,'Boho Decor Plant Hanger For Home Wall Decoration Macrame Wall Hanging Shelf'),('Flying Wooden Bird','Home Decoration','Flying Wooden',4.1,1099,999,'	Package Include 6 Birds with Adhesive Tape Shape: 3D Shaped Wooden Birds Material: Wooden MDF, Laminated 3.5mm'),('3D Embellishment Art Lamp','Home Decoration','LED Lights',3.9,499,419,'3D led lamp sticker Wall sticker 3d wall art light on/off button  cell operated (included)'),('Key Holder','Home Decoration','Golden',3.8,129,119,'Attractive DesignMetallic materialFour key hooksReliable & DurablePremium Quality'),('Tree Oil 30ml','skincare','Hemani Tea',4.1,289,229,'Tea tree oil contains a number of compounds, including terpinen-4-ol, that have been shown to kill certain bacteria');




--Create Order Table


CREATE TABLE orders(
    orderId  SERIAL PRIMARY KEY,
    userId Int references  users(id) ,
    productId INT REFERENCES  products(id)

);
   --Create table cart
CREATE TABLE cartDetails(
    cartId SERIAL PRIMARY KEY,
    order_id INT REFERENCES  orders(orderId),
    product_id REFERENCES products(id),
    product_name  REFERENCES  products(productName),
    Product_price  REFERENCES  products(productPrice)
);

--Create Table Order Details


CREATE TABLE orderdetails(
    orderDetailsId SERIAL PRIMARY KEY,
    productId INT REFERENCES products(id),
    order_id  INT REFERENCES orders(orderId)
);






select o.productid,o.userId,p.imagelink,p.offerprice,p.productName,sum(p.offerPrice)  from orders as o ,products as p where o.productid=p.id
GROUP BY o.productId



CREATE TABLE placeorder(
    Id serial primary key,
    user_id INT references  users(id),
    product_id INT references  products(id),
    created_time  timestamptz default now()

)



 id | user_id | product_id |           created_time


SELECT created_time,user_id FROM placeorder group by (created_time);












