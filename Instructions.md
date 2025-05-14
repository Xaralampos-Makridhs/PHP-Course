# User Registration System with PHP & MySQL
Αυτό το project αποτελεί ένα απλό σύστημα εγγραφής χρηστών με χρήση **PHP**, **MySQL** και **HTML/CSS**. Ο στόχος είναι να κατανοήσετε τα βασικά βήματα δημιουργίας βάσης δεδομένων, χειρισμού φόρμας και αποθήκευσης στοιχείων με ασφάλεια.

---

## Τι περιλαμβάνει:

- Δημιουργία βάσης δεδομένων `user_system`
- Δημιουργία πίνακα `users` για αποθήκευση χρηστών
- HTML φόρμα εγγραφής χρήστη
- Επεξεργασία της φόρμας με PHP
- Ασφαλής αποθήκευση κωδικού με `password_hash()`
- Έλεγχος αν το email υπάρχει ήδη
- Βασικό responsive CSS για ευχάριστη εμφάνιση

---

## Μαθαίνετε:

- Πώς να κάνετε σύνδεση με MySQL μέσω PHP
- Πώς να δημιουργείτε βάση και πίνακα από κώδικα
- Πώς να χρησιμοποιείτε `POST` για ασφαλή μεταφορά δεδομένων
- Πώς να χειρίζεστε εισαγωγή και έλεγχο δεδομένων στη MySQL
- Πώς να κρυπτογραφείτε κωδικούς με hashing.

## Ζητούμενα Άσκησης

Η άσκηση απαιτεί την υλοποίηση ενός συστήματος εγγραφής χρηστών που θα πληροί τα παρακάτω:

1. **Σύνδεση με MySQL μέσω PHP**
2. **Δημιουργία βάσης δεδομένων `user_system`**
   - Να δημιουργείται αυτόματα αν δεν υπάρχει ήδη.
3. **Δημιουργία πίνακα `users` με τα εξής πεδία:**
   - `id`: Ακέραιος, αυτοαυξανόμενο, πρωτεύον κλειδί
   - `username`: Υποχρεωτικό, μέχρι 50 χαρακτήρες
   - `email`: Προαιρετικό, μέχρι 100 χαρακτήρες
   - `password`: Υποχρεωτικό, αποθηκεύεται με `password_hash()`
   - `created_at`: Χρονική σήμανση εγγραφής (default: `CURRENT_TIMESTAMP`)
4. **HTML φόρμα εγγραφής χρήστη**
   - Πεδία: Όνομα χρήστη, Email, Κωδικός
   - Υποβάλλεται με μέθοδο `POST`
5. **Επεξεργασία της φόρμας στην PHP**
   - Ανάγνωση δεδομένων από `POST`
   - Κρυπτογράφηση του κωδικού πριν την αποθήκευση
   - Έλεγχος για ύπαρξη email πριν την εισαγωγή
   - Εισαγωγή των στοιχείων στον πίνακα `users`
6. **Στυλ εμφάνισης με CSS**
   - Βασική αισθητική βελτίωση της φόρμας με CSS
   - Responsive σχεδίαση για φιλική εμπειρία χρήστη
7. **Μηνύματα επιτυχίας ή αποτυχίας**
   - Να εμφανίζονται ανάλογα με το αποτέλεσμα της εγγραφής

---
(Eng)
This project is a simple user registration system using **PHP**, **MySQL**, and **HTML/CSS**. The goal is to understand the basic steps of creating a database, handling a form, and storing user information securely.

---

## What's Included:

- Creation of a `user_system` database
- Creation of a `users` table to store user data
- HTML registration form
- PHP script to process form submissions
- Secure password storage using `password_hash()`
- Check if email already exists before inserting
- Basic responsive CSS for clean appearance

---

##  What You Will Learn:

- How to connect to MySQL using PHP
- How to create a database and table via PHP
- How to use the `POST` method to securely transfer form data
- How to handle user input and store it in a MySQL database
- How to hash passwords securely using PHP functions

---

## Assignment Requirements

The task is to implement a user registration system that meets the following criteria:

1. **Connect to MySQL using PHP**

2. **Create a `user_system` database**
   - Automatically create it if it doesn't already exist.

3. **Create a `users` table with the following fields:**
   - `id`: Integer, auto-increment, primary key
   - `username`: Required, up to 50 characters
   - `email`: Optional, up to 100 characters
   - `password`: Required, securely stored using `password_hash()`
   - `created_at`: Timestamp of registration (default: `CURRENT_TIMESTAMP`)

4. **HTML user registration form**
   - Fields: Username, Email, Password
   - Submitted using the `POST` method

5. **Process the form in PHP**
   - Read data from `POST`
   - Hash the password before storing it
   - Check if the email already exists
   - Insert the user data into the `users` table

6. **Add CSS styling**
   - Basic visual improvements to the form using CSS
   - Responsive design for a better user experience

7. **Display success or error messages**
   - Inform the user of successful registration or any issues

---

