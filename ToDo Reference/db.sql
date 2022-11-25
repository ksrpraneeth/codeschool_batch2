CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL CHECK(password <> '')
);

CREATE TABLE todolist (

    id SERIAL PRIMARY KEY,
    task VARCHAR(100) NOT NULL CHECK(task <> ''),
    user_id INT REFERENCES users(id),
    created_at TIMESTAMP DEFAULT NOW()
);