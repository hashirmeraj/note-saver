
# Note Saver

**Note Saver** is a to-do list application built using HTML, CSS, Bootstrap, JavaScript, PHP, and MySQL. It allows users to add, edit, and delete notes. The app features a data table with pagination, ensuring easy navigation through tasks.

## Features

- Add, edit, and delete notes
- Data table with pagination for efficient task management

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/hashirmeraj/note-saver.git
cd notesaver
```

### 2. Set Up the Database

1. Open **phpMyAdmin** on your local server (e.g., XAMPP).
2. Create a new database named `note`.
3. Import the SQL file provided in the repository (`note.sql`) into the `note` database.

### 3. Configure the Project

```php
$servername = "localhost";
$username = "root";
$password = ""; // your MySQL password
$dbname = "note";
```

### 4. Run the Project

1. Start your local server (e.g., XAMPP, MAMP).
2. Access the project in your web browser:

```
http://localhost/notesaver
```

## Usage

Once installed, you can start adding, editing, and deleting notes. Use the pagination feature to navigate through your notes easily.

