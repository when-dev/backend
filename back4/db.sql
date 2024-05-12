CREATE TABLE Applicationss (     
    id INT AUTO_INCREMENT PRIMARY KEY,     
    fio VARCHAR(255),     
    year INT,     
    email VARCHAR(255),   
    gender ENUM('male', 'female'),  
    biography TEXT,     
    checkcontract TINYINT(1) );

-- Create the Languages table
CREATE TABLE programming_language (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE);
-- Create the FormLanguages table to establish a many-to-many relationship between Forms and Languages
CREATE TABLE application_language (     
    application_id INT,     
    language_id INT,     
    FOREIGN KEY (application_id) REFERENCES Applicationss(id),   
    FOREIGN KEY (language_id) REFERENCES programming_language(id),     
    PRIMARY KEY (application_id, language_id) );

 CREATE TABLE Users (     id INT AUTO_INCREMENT PRIMARY KEY,     FormId INT,     Login VARCHAR(255) NOT NULL,     Password VARCHAR(255) NOT NULL,     FOREIGN KEY (FormId) REFERENCES application(id) );
