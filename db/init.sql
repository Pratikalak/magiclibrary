-- Create the books table
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

-- Insert sample data
INSERT INTO books (title) VALUES
    ('The Art of Computer Programming'),
    ('Design Patterns'),
    ('Clean Code');

-- Create Linux user and set up flag (Note: This will be handled in Dockerfile since MySQL container can't create system users)
