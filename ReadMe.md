 PhotonPHP - A Lightweight PHP Framework

PhotonPHP - A Lightweight PHP Framework
=======================================

PhotonPHP is a lightweight PHP framework designed to provide essential features like routing, SEO support, and a pre-built admin panel. It enables developers to build web applications quickly and efficiently while maintaining flexibility and performance. This README.md file serves as a guide to understanding the framework and how to use its various features.

Table of Contents
-----------------

*   [Features](#features)
*   [Getting Started](#getting-started)
*   [Routing](#routing)
*   [Authentication](#authentication)
*   [Middleware](#middleware)
*   [Admin Panel](#admin-panel)
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
    
2.  Set up your web server (e.g., Apache, Nginx) or run development ser using `php -S 127.0.0.1:7746` and the application will be running on `localhost:7746`.
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
    
    $router->addRoute('/admin', 'AdminController@index')->middleware('AuthMiddleware');

Admin Panel
-----------

PhotonPHP comes with a pre-built admin panel that you can use to manage your application's data. You can customize and expand the admin panel according to your application's needs.

Security Considerations
-----------------------

While PhotonPHP provides some basic security features, it's essential to further enhance security to protect your application from potential vulnerabilities. Implement input validation, avoid SQL injection, prevent XSS attacks, and follow best security practices.

Contributing
------------

I, Harwinder Singh, welcome contributions from the community. If you find any issues or have ideas for improvements, feel free to open an issue or submit a pull request.

License
-------

PhotonPHP is open-source software released under the MIT License.