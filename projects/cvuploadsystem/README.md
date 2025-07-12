# 📄 CV Upload System

This is a simple PHP-based application that allows users to upload their CVs along with their name and email. Uploaded CVs are stored in a folder on the server and registered in a MySQL database. An admin panel (view.php) lists all submitted CVs.

## Technologies Used

- PHP
- MySQL
- HTML5 / CSS3
- HeidiSQL (for database management)

---

##  Features

- Upload CVs in `.pdf`, `.doc`, or `.docx` formats.
- Store user information (name and email) along with file path and timestamp.
- View uploaded CVs ordered by submission date.

---

##  Project Structure
![structure](https://github.com/user-attachments/assets/2ae46f93-8b3f-4b2f-b036-9cc34c98b9d0)

## User Interface
#### Upload
![ui1](https://github.com/user-attachments/assets/e41697ee-ce7b-4fe0-848b-6ab6a5117d68)

#### View
![ui2](https://github.com/user-attachments/assets/c45c027b-b72f-41f9-994d-55943845be2a)

## Encoding Filename
Each uploaded CV is saved with a unique, auto-generated name to avoid filename collisions.

![fileupload](https://github.com/user-attachments/assets/a0bebba0-f7ef-44f9-94ff-5a72bc4dbe10)

