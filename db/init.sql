CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Some sample posts
INSERT INTO posts (title, content) VALUES
('Hello World', 'This is the first post on the blog!'),
('Docker Rocks', 'Running PHP and MySQL in Docker is awesome!');
