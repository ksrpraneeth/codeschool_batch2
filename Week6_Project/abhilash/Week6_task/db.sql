CREATE DATABASE hotels;
-- table 1
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL CHECK(password <> ''),
    name VARCHAR(50) NOT NULL CHECK(name <> ''),
    mobile INT NOT NULL,
    token VARCHAR(50)
);
-- table 2
-- CREATE TABLE login(
--     id SERIAL PRIMARY KEY,
--     user_id INT REFERENCES users(id),
--     created_at TIMESTAMP DEFAULT NOW()
-- );
ALTER TABLE users
ADD user_id INT NOT NULL;
ALTER TABLE users
ALTER COLUMN user_id TYPE VARCHAR;
ALTER TABLE users
ALTER COLUMN mobile TYPE bigint -- table2
    CREATE TABLE hotel_type(
        id SERIAL PRIMARY KEY,
        hotel_class INT UNIQUE NOT NULL,
        description VARCHAR(50) NOT NULL CHECK(description <> '')
    );
INSERT INTO hotel_type(hotel_class, description)
VALUES(1, '1STAR'),
    (2, '2STAR'),
    (3, '3STAR'),
    (4, '4STAR'),
    (5, '5STAR');
-- table3
CREATE TABLE hotels(
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL CHECK(name <> ''),
    hotel_type_id INT NOT NULL REFERENCES hotel_type(id),
    hotels_images VARCHAR(550),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);
INSERT INTO hotels(name, hotel_type_id, hotels_images)
VALUES(
        ' HOTEL IMPIREAL ',
        1,
        'https://media-cdn.tripadvisor.com/media/photo-s/11/de/fb/7b/imperial-hotel.jpg'
    ),
    (
        ' HOTEL PRIME ',
        2,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPrrD-N8KknZkD0P9S77gA5whtWT2H9k64EQ&usqp=CAU'
    ),
    (
        ' WESTINE HOTEL ',
        4,
        'https://www.google.com/imgres?imgurl=https%3A%2F%2Fcf.bstatic.com%2Fxdata%2Fimages%2Fhotel%2Fmax1024x768%2F399779145.jpg%3Fk%3Daa19818e7291ae14184cfb59df67d01ba113bf48b0ee39de638171249f069aa8%26o%3D%26hp%3D1&imgrefurl=https%3A%2F%2Fwww.booking.com%2Fhotel%2Fin%2Fthe-westin-hyderabad-mindspace.html&tbnid=4k2kIKgAli55QM&vet=12ahUKEwiQhq-s0dX7AhXpk9gFHRIRC3YQMygCegUIARDjAQ..i&docid=0q61UvQV91NluM&w=1024&h=725&q=westin%20hotel%20hyderabad&ved=2ahUKEwiQhq-s0dX7AhXpk9gFHRIRC3YQMygCegUIARDjAQ'
    ),
    (
        ' LEMON TREE HOTEL ',
        3,
        'https://www.lemontreehotels.com/CMSWebParts/LTWebParts/citysearchgallery.ashx?Gid=3875'
    ),
    (
        ' HOTEL TAJ ',
        5,
        'https://wallpapercave.com/wp/wp8122853.jpg'
    );
-- table 4
CREATE TABLE room_categery(
    id SERIAL PRIMARY KEY,
    description VARCHAR(50) NOT NULL CHECK(description <> ''),
    room_images VARCHAR(500)
);
INSERT INTO room_categery(description,room_images)
VALUES(' STANDARD ROOM''https://watermark.lovepik.com/photo/20211130/large/lovepik-hotel-standard-room-picture_501283030.jpg'),
    (' FAMILY ROOM''https://st.depositphotos.com/2851435/4946/i/950/depositphotos_49469911-stock-photo-luxury-bedroom-interior.jpg'),
    (' DELUXE ROOM''https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa50PTQ--HVzLeY848JMvJIcbkcpnSxnN_sQ&usqp=CAU'),
    (' LUXURY ROOM''https://st2.depositphotos.com/3724343/10506/i/950/depositphotos_105063472-stock-photo-3d-render-of-bedroom-interior.jpg');
-- table 5
CREATE TABLE rooms(
    id SERIAL PRIMARY KEY,
    room_no INT UNIQUE NOT NULL,
    room_categery_id INT NOT NULL REFERENCES room_categery(id),
    hotel_id INT NOT NULL REFERENCES hotels(id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);
INSERT INTO rooms(room_no, room_categery_id, hotel_id)
VALUES(101, 2, 1),
    (102, 1, 1),
    (103, 3, 1),
    (104, 4, 1),
    (201, 1, 2),
    (202, 2, 2),
    (203, 3, 2),
    (204, 4, 2),
    (301, 1, 3),
    (302, 2, 3),
    (303, 3, 3),
    (304, 4, 3),
    (401, 1, 4),
    (402, 2, 4),
    (403, 3, 4),
    (404, 4, 4),
    (501, 1, 5),
    (502, 2, 5),
    (503, 3, 5),
    (505, 4, 5);
-- table 6
CREATE TABLE price(
    id SERIAL PRIMARY KEY,
    room_id INT NOT NULL REFERENCES rooms(id),
    price INT NOT NULL
);
INSERT INTO price(room_id, price)
VALUES(1, 2000),
    (2, 1500),
    (3, 2500),
    (4, 6000),
    (5, 1500),
    (6, 3500),
    (7, 4500),
    (8, 6500),
    (9, 1500),
    (10, 2500),
    (11, 4500),
    (12, 5500),
    (13, 1500),
    (14, 2500),
    (15, 3500),
    (16, 4500),
    (17, 2500),
    (18, 3500),
    (19, 5500),
    (20, 6500);
-- table 7
CREATE TABLE booking_transactions(
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    room_id INT NOT NULL REFERENCES rooms(id),
    total_amount INT NOT NULL,
    check_in TIMESTAMP DEFAULT NOW(),
    check_out TIMESTAMP DEFAULT NOW()
);
CREATE TABLE booking_transactions_details(
    id SERIAL PRIMARY KEY,
    booking_transactions_id INT NOT NULL REFERENCES booking_transactions(id),
    amount INT NOT NULL
);
UPDATE hotels
SET hotels_images = 'https://www.lemontreehotels.com/CMSWebParts/LTWebParts/citysearchgallery.ashx?Gid=3875'
WHERE ID = 4;
SET @dateStart = #Start#
SET @dateEnd = #End#
SELECT R.ID
FROM rooms R
WHERE R.id NOT IN (
        SELECT BR.room_id
        FROM booking_transactions BR
        where BR.id = B.ID
        WHERE B.start_date BETWEEN @dateStart AND @dateEnd
            AND B.end_date BETWEEN @dateStart AND @dateEnd
    )
SELECT r.id,
    (bt.room_id) as available_rooms
FROM hotels h,
    rooms r,
    booking_transactions bt
where h.id = r.hotel_id
    and r.id = bt.room_id Not In (bt.room_id)
GROUP BY r.room_id
HAVING bt.check_in BETWEEN @dateStart AND @dateEnd
    AND B.check_out BETWEEN @dateStart AND @dateEnd;
INSERT INTO booking_transactions(user_id, room_id, total_amount)
VALUES(1, 3, 2500);
SELECT r.id,
    bt.room_id available_rooms,
    FROM booking_transactions as bt
    INNER JOIN rooms as r ON bt.room_id = r.id
SELECT r.id,
    r.hotel_id
FROM rooms r
    LEFT JOIN booking_transactions bt ON r.id = bt.room_id
where bt.room_id is NULL;
select id
from rooms
WHERE id NOT IN(
        SELECT room_id
        FROM booking_transactions
    )
select id available_rooms,
    hotel_id,
    room_categery_id
from rooms
WHERE id NOT IN(
        SELECT room_id
        FROM booking_transactions
    );
SELECT r.id,
    r.hotel_id
FROM rooms r
    LEFT JOIN booking_transactions bt ON r.id = bt.room_id
where bt.room_id is NULL;
-- query form hotel 
select h.hotels_images,
    h.name as hotel_name,
    ht.description as hotel_type,
    r.id as available_rooms,
    rc.description as room_type,rc.room_images,
    p.price
from price p,
    rooms r,
    hotels h,
    hotel_type ht,
    room_categery rc
where r.id = p.room_id
    And r.hotel_id = h.id
    And h.id = 1
    AND ht.id = h.hotel_type_id
    and rc.id = r.room_categery_id
    and r.id not in(
        select room_id
        from booking_transactions
    );


    UPDATE room_categery
SET room_images = 'https://st2.depositphotos.com/3724343/10506/i/950/depositphotos_105063472-stock-photo-3d-render-of-bedroom-interior.jpg'
WHERE ID = 4;

ALTER TABLE room_categery
ADD room_images VARCHAR(500);