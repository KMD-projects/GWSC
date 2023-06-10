<?php

include('connect.php');

function createCustomerTable()
{
    global $connect;
    $create_customers = "CREATE TABLE customers
    (
        customer_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(20),
        surname VARCHAR(20),
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        phone VARCHAR(30),
        address VARCHAR(100),
        createdAt DATETIME NOT NULL,
        updatedAt DATETIME NOT NULL
    )";

    $create_customers_query = mysqli_query($connect, $create_customers);
    if ($create_customers_query) {
        echo "<p>Customer table created!</p>";
    } else {
        echo "<p>Customer table failed to create.</p>";
    }
}

function createAdminTable()
{
    global $connect;
    $query = "CREATE TABLE admins
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(20),
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        phone VARCHAR(30),
        address VARCHAR(100),
        createdAt DATETIME NOT NULL,
        updatedAt DATETIME NOT NULL
    )";

    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<p>Admin table created!</p>";
    } else {
        echo "<p>Admin table failed to create.</p>";
    }
}