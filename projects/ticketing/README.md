# Ticketing System

A simple ticket management system built with PHP and MySQL. Supports users and admins with permissions to create, edit, and delete tickets.

---

## Description

This application allows users to create and manage support tickets, while admins have additional privileges to view and manage all tickets. Implemented with PHP (mysqli), session-based authentication, and MySQL database.

---

## Features

- User registration and login
- User roles: user and admin
- Create, view, edit, and delete tickets
- Manage ticket replies (comments on tickets)
- Secure password storage (password hashing)
- Role-based access control

---

## Files

- `config.php` — Database configuration and connection
- `register.php` — User registration
- `login.php` — User login
- `index.php` — View tickets according to user role
- `add_ticket.php` — Form to add a new ticket
- `edit_ticket.php` — Edit ticket (only admin and owner)
- `delete_ticket.php` — Delete ticket (only admin and owner)
- `logout.php` — User logout
- `create_admin.php` — (optional) Create admin user (run once)
- SQL table creation scripts inside `config.php`

---

## Notes

- Delete `create_admin.php` after creating the admin user for security reasons.

- Keep `config.php` secure, ideally outside the public folder if possible.

- Passwords are hashed with `password_hash` for security.

- The application uses server-side validation only (no JavaScript).

##  Note
Feel Free to create a CSS file for this project.

