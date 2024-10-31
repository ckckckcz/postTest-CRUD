CREATE TABLE tasks (
    id INT IDENTITY(1,1) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(MAX),
    start_date DATE,
    end_date DATE,
    category VARCHAR(100),
    border_color VARCHAR(20)
);
