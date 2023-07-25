PhotonPHP - A Lightweight PHP Framework

PhotonPHP - A Lightweight PHP Framework
=======================================

PhotonPHP is a lightweight PHP framework designed to provide essential features like routing, SEO support, and a pre-built admin panel. It enables developers to build web applications quickly and efficiently while maintaining flexibility and performance. This README.md file serves as a guide to understanding the framework and how to use its various features.

PhotonPHP is created and managed by Harwinder Singh from [CodePanther](https://codepanther.in)

Table of Contents
-----------------

*   [Features](#features)
*   [Getting Started](#getting-started)
*   [Routing](#routing)
*   [Authentication](#authentication)
*   [Middleware](#middleware)
*   [Database](#database)
    *   [Database Connection](#database-connection)
    *   [Fetching Data](#fetching-data)
    *   [Inserting Data](#inserting-data)
    *   [Updating Data](#updating-data)
    *   [Deleting Data](#deleting-data)
    *   [Using Conditions](#using-conditions)
    *   [Escaping Values](#escaping-values)
*   [Security Considerations](#security-considerations)
*   [Contributing](#contributing)
*   [License](#license)

Features
--------

*   Simple and lightweight PHP framework
*   Routing support for handling different URLs and HTTP methods
*   SEO-friendly URLs with customizable routes
*   Basic user authentication (login and logout)
*   Middleware support for adding custom request handlers
*   Pre-built admin panel for managing application data
*   MySQL database integration

Getting Started
---------------

1.  Clone the PhotonPHP repository:
    
        git clone https://github.com/hrwndr/PhotonPHP.git
    
2.  Set up your web server (e.g., Apache, Nginx) or run development server using `php -S 127.0.0.1:7746` and the application will be running on `localhost:7746`.
3.  Update the `config.php` file with your MySQL database credentials  Uncomment Database code from `index.php` if using database.
5.  Start using PhotonPHP to build your web applications!

Routing
-------

PhotonPHP uses a simple routing system to handle incoming requests. Routes are defined in the `routes.php` file. You can create custom routes and associate them with specific controller methods.

    // routes.php
    
    $router->addRoute('/', 'HomeController@index');
    $router->addRoute('/about', 'AboutController@index');
    $router->addRoute('/contact', 'ContactController@index');
    // Add more routes as needed

Authentication
--------------

PhotonPHP provides a basic user authentication system. To use authentication, implement the necessary login and logout functionality in the `AuthController`.

    // app/controllers/AuthController.php
    
    class AuthController
    {
        public function login()
        {
            // Implement login logic here
        }
    
        public function logout()
        {
            // Implement logout logic here
        }
    }

You can then use the `login()` and `logout()` methods in your login and logout routes, respectively.

Middleware
----------

Middleware in PhotonPHP is a way to intercept and modify requests before they reach the controller. You can use middleware to add custom request handling, authentication checks, logging, and more.

    // app/middleware/AuthMiddleware.php
    
    class AuthMiddleware
    {
        public function handle()
        {
            // Implement authentication checks here
        }
    }

To use middleware, register it in the `Router` class and associate it with specific routes.

    // app/routes.php
    
    $router->addRoute('/admin', 'AdminController@index', ['AuthMiddleware']);

Database
-----------

Database Connection
-------------------

Before using the Database for database operations, you need to establish a database connection. For that you'll need to add your database details .i.e. `'db_host', 'db_user', 'db_pass', 'db_name'` and set `db_in_use` to `true` in your `config.php` file.

After adding the database details, you can use database method in a controller as shown - 
    
    class HomeController
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $this->db;
        }

        public function index()
        {
            // Your homepage logic here
            // For example, fetching data from the database or processing some data

            // Sample data for demonstration purposes
            $title = 'Welcome to PhotonPHP!';
            $dbData = $this->db->fetchAll('cash_flows');

            // Load the corresponding view
            require_once 'app/views/home.php';
        }
    }


> **_NOTE:_**  Only mysqli is supported yet.

Fetching Data
-------------

### Fetch All Records

To retrieve all records from a database table, use the `fetchAll` method. It returns an array of associative arrays, where each array represents a database row.

    
    $records = $this->db->fetchAll('your_table_name');
    foreach ($records as $record) {
        // Process each $record
        echo $record['column_name'];
    }
        

### Fetch Single Row

To retrieve a single row from a database table based on specific conditions, use the `fetchRow` method. Pass an associative array of conditions to filter the data.

    
    $conditions = ['id' => 1];
    $record = $this->db->fetchRow('your_table_name', $conditions);
    if ($record) {
        // Process $record
        echo $record['column_name'];
    } else {
        // No record found
    }
        

Inserting Data
--------------

To insert data into a database table, use the `insert` method. Pass an associative array where keys represent the column names, and values represent the data to be inserted.

    
    $data = [
        'column1' => 'value1',
        'column2' => 'value2',
        // Add more columns and values as needed
    ];
    
    $result = $this->db->insert('your_table_name', $data);
    if ($result) {
        // Data inserted successfully
    } else {
        // Error occurred while inserting data
    }
        

Updating Data
-------------

To update existing data in a database table, use the `update` method. Pass an associative array with the updated values and an optional associative array of conditions to filter the rows to be updated.

    
    $data = [
        'column1' => 'new_value1',
        'column2' => 'new_value2',
        // Add more columns and values to update
    ];
    
    $conditions = ['id' => 1]; // Optional: Use conditions to update specific rows
    
    $result = $this->db->update('your_table_name', $data, $conditions);
    if ($result) {
        // Data updated successfully
    } else {
        // Error occurred while updating data
    }
        

Deleting Data
-------------

To delete data from a database table, use the `delete` method. Pass an associative array of conditions to filter the rows to be deleted.

    
    $conditions = ['id' => 1]; // Use conditions to delete specific rows
    
    $result = $this->db->delete('your_table_name', $conditions);
    if ($result) {
        // Data deleted successfully
    } else {
        // Error occurred while deleting data
    }
        

Using Conditions
----------------

The `fetchRow`, `update`, and `delete` methods support using conditions to filter the rows to be fetched or updated. Pass an associative array where keys represent the column names, and values represent the conditions.

    
    $conditions = ['id' => 1];
    $record = $this->db->fetchRow('your_table_name', $conditions);
        

Escaping Values
---------------

To prevent SQL injection, always escape user inputs before using them in database operations. The `escape` method in the Database class is provided for this purpose.

    
    $value = $this->db->escape($_POST['user_input']);
        

Remember to use proper validation and sanitization techniques to ensure the security of your application.

Security Considerations
-----------------------

While PhotonPHP provides some basic security features, it's essential to further enhance security to protect your application from potential vulnerabilities. Implement input validation, avoid SQL injection, prevent XSS attacks, and follow best security practices.

Contributing
------------

I, Harwinder Singh welcome contributions from the community. If you find any issues or have ideas for improvements, feel free to open an issue or submit a pull request.

License
-------

PhotonPHP is open-source software released under the MIT License.