# Expense Tracker

This is a simple Expense Tracker web application built using PHP. The project is designed to help users manage and monitor their daily expenses efficiently. It allows users to record transactions, categorize expenses, and view summary reports.

## Features

- **Add Expenses:** Quickly log new expense entries with details such as amount, category, and date.
- **View Transactions:** List all recorded expenses with sorting and filtering options.
- **Expense Categories:** Organize expenses into customizable categories for better tracking.
- **Summary Reports:** Visualize total spending over time and by category.
- **Edit & Delete:** Update or remove existing expense entries.

## Technologies Used

- **PHP:** Core backend logic and form handling.
- **HTML/CSS:** User interface.
- **MySQL (optional):** For persistent data storage (if implemented).
- **Bootstrap (optional):** For responsive design.

## Getting Started

### Prerequisites

- PHP (>=7.0)
- A web server (e.g., Apache, Nginx)
- MySQL database (if using persistent storage)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Xaralampos-Makridhs/PHP-Course.git
   ```
2. **Navigate to the expense tracker directory:**
   ```bash
   cd PHP-Course/expense_tracker
   ```
3. **Set up your web server’s document root to point to this folder.**

4. **(Optional) Configure database:**
   - Update database credentials in the configuration file (e.g., `config.php`).
   - Run the SQL schema file if provided to create necessary tables.

### Usage

- Open your browser and go to `http://localhost/expense_tracker` (or your configured host).
- Start adding your expenses and view summaries.

## Folder Structure

```
expense_tracker/
├── index.php
├── add_expense.php
├── edit_expense.php
├── delete_expense.php
├── config.php
├── assets/
│   └── style.css
└── README.md
```

## Screenshots

*(Add screenshots of the UI here if available)*

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your improvements.

## License

This project is licensed under the MIT License.

## Author

[Xaralampos Makridhs](https://github.com/Xaralampos-Makridhs)
