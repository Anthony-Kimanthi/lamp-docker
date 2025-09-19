CREATE DATABASE IF NOT EXISTS blogdb;

USE blogdb;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample posts
INSERT INTO posts (title, content) VALUES
('Hello World!', 'This is your first blog post.'),
('Docker + PHP + MySQL', 'Your LAMP stack blog is running inside Docker!');

