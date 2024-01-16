<?php
// app/controllers/AdminController.php

class AdminController
{
    public function index()
    {
        // Check if the user is logged in as an admin (You may implement your own authentication logic)
        // For simplicity, we'll assume the user is logged in

        // Sample data for demonstration purposes
        $title = 'Admin Dashboard';
        $welcomeMessage = 'Welcome to the Admin Panel!';

        // Load the corresponding view for the admin dashboard
        return require_once 'app/views/admin/dashboard.php';
    }

    public function login()
    {
        // Your login logic here
        // For simplicity, we'll assume the user has successfully logged in
        // You should implement proper authentication and validation logic

        // Sample data for demonstration purposes
        $title = 'Admin Login';
        $loginMessage = 'You are now logged in as an admin!';

        // Load the corresponding view for the admin login
        return require_once 'app/views/admin/login.php';
    }
}
