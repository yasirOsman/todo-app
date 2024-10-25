# Laravel Todo List Application

A simple Todo List application built with Laravel and PHP 8.1, with Tailwind CSS for styling and jQuery with AJAX for dom manipulation and handling requests. This application allows users to create, read, delete and mark tasks as done.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)

## Features

- Add new tasks
- Mark tasks as completed
- Delete tasks

## Installation

To set up this project on your local machine, follow these steps:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/todo-app.git
   cd todo-app
   ```

2. **Install Dependencies**

   Ensure you have Composer installed on your machine. Then run:

   ```bash
   composer install
   ```

3. **Set Up Environment File**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

   Open the `.env` file in a text editor and make the following changes:

   - Set your database connection details:

     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

   - Make sure to set the application URL:

     ```plaintext
     APP_URL=your_url
     ```

   Replace `your_database_name`, `your_database_user`, `your_database_password` and `your_url` with your actual MySQL database credentials. Ensure that the database you specify already exists or create it using a MySQL client.


4. **Migrate the Database**

   Run the database migrations to set up the necessary tables:

   ```bash
   php artisan migrate
   ```

5. **Run the Application**

   Start the Laravel development server:

   ```bash
   php artisan serve
   ```

   Your application should now be running.

## Usage

- Open your web browser and navigate to the app url.
- You can add new tasks using the input field and clicking the "Add Task" button.
- Mark tasks as completed by checking the checkbox.
- Delete tasks by clicking the "Delete" button next to the task.

## Project Structure

```plaintext
todo-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── TaskController.php                # Controller for handling task operations
│   │   └── ...
│   ├── Models/
│   │   └── Task.php                               # Model for the Task
├── database/
│   ├── migrations/
│   │   └── 2024_10_25_000000_create_tasks_table.php  # Migration for tasks table
│   ├── factories/
│   │   └── TaskFactory.php                        # Factory for creating Task instances
│   └── ...
├── public/
│   ├── js/
│   │   └── script.js                                 # JavaScript(jQuery) file
│   └── ...
├── resources/
│   ├── views/
│   │   └── tasks.blade.php                        # Main Blade template
│   └── ...
├── routes/
│   └── web.php                                    # Web routes for the application
├── tests/
│   └── Feature/
│       ├── Controllers/
│       │   └── TaskControllerTest.php             # Tests for the TaskController
└── ...
```


## Technologies Used

- **Laravel**: PHP framework used for backend development, using Laravel 10+ and PHP 8.1+.
- **Tailwind CSS**: The CSS framework for styling.
- **jQuery**: Used for handling AJAX requests and DOM manipulation.
- **MySQL**: The relational database management system for storing the data 

