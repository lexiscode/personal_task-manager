<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Personal Task Manager

Welcome to the **Personal Task Manager** project! This application is designed to help users manage and keep track of their daily tasks. It employs the Laravel framework for backend development, BootStrap (CSS and JavaScript) for frontend interactions, and GraphQL for efficient data fetching and mutations. The application provides user authentication, task management functionalities, and various other features to enhance the task management experience.

## Features

### User Authentication
- Register: Users can create a new account to get started.
- Login: Secure login system using Laravel's built-in authentication.
- Logout: Users can log out when they are done managing their tasks.

### Task Management
- Create: Users can create new tasks with a title, description, due date, and status.
- Read: View a list of all tasks, organized by status.
- Update: Modify task details or change its status.
- Delete: Remove tasks that are no longer needed.

### Bootstrap Components
- Task List: All tasks are displayed with filtering options based on status.
- Task Details: Get an in-depth view of a task's information, edit, or delete it.
- Add Task: A user-friendly form to add new tasks.

### GraphQL Integration
- Utilizes the power of GraphQL for efficient data fetching and manipulation.
- Implements the [lighthouse-php](https://lighthouse-php.com/) package for GraphQL setup.
- Defines a clear GraphQL schema for users and tasks.
- Fetches and updates tasks via GraphQL instead of traditional REST APIs.

### Simple Notifications
- Visual cues for task due dates: Tasks nearing their due date change color.
- Alerts for overdue tasks: Tasks that exceed their due date are highlighted.

### Middleware
- Security features to control access:
  - Certain pages are restricted to non-logged-in users.
  - Specific pages are restricted to logged-in users.

### Task Categories
- Manage tasks in different categories (e.g., Work, Personal, Urgent).
- Categories are fetched dynamically from the database.
- Separate CRUD functionality for managing categories.

### Search
- Use the search bar to find tasks by title or description quickly.

## Getting Started

### Prerequisites
- Make sure you have PHP and Composer installed.
- You need Node.js and npm to handle frontend dependencies. BUT, alternatively, I will highly recommend you download [laragon](https://laragon.org/download/index.html) web server - which has the following pre-installed (Apache 2.4, Nginx, MySQL 8, PHP 8, Redis, Memcached, Node.js 18, npm, git).

### Installation
1. Immediately after installing [laragon](https://laragon.org/download/index.html) web server for the first time, you will need to reboot your computer afterwards.
2. Now into your computer's root directory (e.g. C:), enter these path `C:/laragon/`. Then double-click on the laragon application icon to open it.
3. Now ensure that you have no other web server running (e.g. XAMMP or any other), then inside the Laragon application click on  `StartAll`. Do not stop the server.
4. Then enter into this path directory `C:/laragon/www`, now run this command in order to install Laravel globally `composer global require laravel/installer` 
5. Now git clone this repository still inside this path directory (`C:/laragon/www`): `git clone https://github.com/lexiscode/personal_task-manager.git`
6. Next, still in that Laragon application, click on `Database` button (another GUI displays), ensure the Network Type is: `MariaDB or MySQL (TCP/IP)`, if so then click on the `Open` button below the GUI to access the database interface.
7. Now at the top-left corner of the application, you should see `Laragon.MySQL` database section; right-click on it, then select `Create new`, then click on `Database`. Please ensure you name the database `task_manager`, then click OK.
8. Next, open the project directory (`C:/laragon/www/personal_task-manager`) with any IDE (e.g. VS Code) and locate a file named `.env.example`, rename the file to `.env` only. 
9. Then inside that same .env file, find and renamed the value of the DB_DATABASE from `DB_DATABASE=personal_task_manager` to `DB_DATABASE=task_manager`
10. Then still inside the project directory (that is, `C:/laragon/www/personal_task-manager`) run this command: `composer install`
11. Lastly, run this migration command, still from within the project directory: `php artisan migrate`
12. Next, generate your own APP_KEY by running this command still from within the project directory: `php artisan key:generate`
13. Congratulations!!! Now read its Usage documentation below.


## Usage

To use the Personal Task Manager Application, follow these steps:

1. Open your browser, enter this URL: `http://personal_task-manager.test/` OR alternatively, return back to the actual Laragon application GUI, and "right-click" anywhere around its blank body (not a button), select `www` and lastly click on the project name `personal_task-manager`.
2. To test GraphiQL for API inside your browser, enter this URL: `http://personal_task-manager.test/graphiql`
3. That's all.

## Technologies

The Personal Task Manager Application is built using the following technologies:

- **PHP**: A server-side scripting language used for handling data and rendering views.
- **Laravel**: A free and open-source PHP web framework, intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.
- **MySQL**: A database-based storage system used to store product records.
- **HTML**: A standard markup language for documents designed to be displayed in a web browser. 
- **CSS**: A frontend styling language used to create appealing visuals for the HTML documents.
- **Bootstrap**: A front-end framework that facilitates responsive and modern user interface design.
- **JavaScript**: A powerful programming language used to add interactivity and dynamic behavior to the website.
-- **jQuery**: A JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.
- **GraphQL**: An open-source data query and manipulation language for APIs and a query runtime engine.

## Contributing

Contributions to the project are welcome! If you encounter any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
