
CREATE DATABASE AdithyaMusic;

--albums Table1
CREATE TABLE albums(
    id SERIAL PRIMARY KEY,
    description VARCHAR(50) NOT NULL CHECK(description <> '')
);
INSERT INTO albums(description)
VALUES('JALSA'),
    ('KHUSHI'),
    ('THOLIPREMA'),
    ('THAMMUDU'),
    ('BADRI');
    -- vocals Table2
CREATE TABLE vocals(
        id SERIAL PRIMARY KEY,
        description VARCHAR(20) NOT NULL CHECK(description <> '')
    );
INSERT INTO vocals(description)
VALUES('S.P.B'),
    ('D.S.P'),
    ('K.K'),
    ('L.V.Revanth'),
    ('Baba sehgal');
-- songs table 3
CREATE TABLE songs(
    id SERIAL PRIMARY KEY,
    description VARCHAR(50) NOT NULL CHECK(description <> ''),
    album_id INT NOT NULL references albums(id),
    vocal_id INT NOT NULL references vocals(id)
);
INSERT INTO songs(description, album_id, vocal_id)
VALUES('jalsa jalsa', 1, 5),
    ('My Heart Is Beating', 1, 2),
    ('Jennifer Lopez', 1, 2),
    ('Chalore Chalore Chal', 1, 4),
    ('You And I', 1, 3),
    ('Ye Mera Jaha', 2, 4),
    ('Ammaye', 2, 3),
    ('Cheliya', 2, 4),
    ('Premante', 2, 1),
    ('Holi Holi', 2, 1),
    ('Ee Manase Se Se', 3, 1),
    ('Yemaindo Yemo Ee Vela', 3, 3),
    ('Emi Sodhara', 3, 4),
    ('Gagananiki Udayam Okate', 3, 1),
    ('Romance Rythms', 3, 2),
    ('College Blue', 4, 2),
    ('Edola Vundi', 4, 3),
    ('Kala Kala Lu', 4, 1),
    ('Made In Andhra Student', 4, 4),
    ('Pedavi Datani', 4, 1),
    ('Ye Chikita ', 5, 5),
    ('Vevvela', 5, 3),
    ('Bangala Kathamlo', 5, 2),
    ('I am an Indian', 5, 5),
    ('Varamanti Manase', 5, 1);
ALTER TABLE userdetails
    RENAME COLUMN userdetails TO user_details;

-- User Table4
CREATE TABLE userdetails(
    id SERIAL PRIMARY KEY,
    description VARCHAR(20) NOT NULL CHECK(description <> '')
);
INSERT INTO user_details(description)
VALUES('Nagesh'),
    ('Abhi'),
    ('Pranay');

-- ALTER TABLE userdetails
    -- RENAME COLUMN userdetails TO user_details;

-- playlist Table5

CREATE TABLE playlist(
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL references user_details(id),
    song_id INT NOT NULL references songs(id)
);
INSERT INTO playlist(user_id, song_id)
VALUES('1', '1'),
    ('1', '2'),
    ('1', '5'),
    ('1', '2'),
    ('1', '3'),
    ('1', '8'),
    ('1', '20'),
    ('1', '15'),
    ('2', '4'),
    ('2', '16'),
    ('2', '10'),
    ('2', '9'),
    ('2', '4'),
    ('2', '12'),
    ('2', '20'),
    ('2', '13'),
    ('3', '7'),
    ('3', '3'),
    ('3', '6'),
    ('3', '21'),
    ('3', '22'),
    ('3', '25'),
    ('3', '13'),
    ('3', '19'),
    ('3', '14');


-- ALTER TABLE userdetails
--     RENAME TO user_details;

-- query 1
SELECT u.description,
    s.description as user_plylist
FROM playlist p
    join songs s ON p.song_id = s.id
    join user_details u ON p.user_id = u.id
Where p.user_id = 2
ORDER BY user_plylist DESC;
-- query 2
SELECT v.description AS vocal_name,
    count(s.vocal_id) AS no_songs
FROM songs AS s,
    vocals AS v
Where s.vocal_id = v.id
GROUP BY v.id,
    s.vocal_id
HAVING v.id = 2;
-- query 3
SELECT v.description As vocal_name,
    count(s.vocal_id) AS no_songs
FROM songs AS s,
    vocals AS v
Where s.vocal_id = v.id
GROUP BY v.id,
    s.vocal_id
ORDER BY no_songs DESC;
--  query 4
SELECT a.description AS album_name,
    s.description AS song_name
FROM songs AS s,
    albums AS a
where s.album_id = a.id
GROUP BY a.description,
    s.description
ORDER BY song_name DESC;
-- query 5
SELECT u.description AS user_name,
    s.description AS song_name,
    v.description AS vocal_name
FROM playlist as p,
    user_details as u,
    vocals AS v,
    songs as s
Where p.user_id = u.id
    AND p.song_id = s.id
    AND s.vocal_id = v.id
group by u.description,
    s.description,
    p.user_id,
    v.description,
    s.vocal_id
HAVING user_id = 2
    AND vocal_id = 1;

--  QUERIES END --

