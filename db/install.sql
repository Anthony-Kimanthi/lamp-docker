CREATE DATABASE IF NOT EXISTS blog;

USE blog;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO posts (title, content) VALUES
("Hello World", "This is my first blog post in Docker!"),
("Docker + PHP + MySQL", "Running a blog using containers is fun!");
