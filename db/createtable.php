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
function createCampsitesTable()
{
    global $connect;
    $query = "CREATE TABLE campsites
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50),
        location TEXT NOT NULL,
        description TEXT NOT NULL,
        tent_capacity INT NOT NULL,
        caravan_capacity INT NOT NULL,
        motor_home_capacity INT NOT NULL,
        price INT NOT NULL,
        createdAt DATETIME NOT NULL,
        updatedAt DATETIME NOT NULL
    )";

    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<p>Campsite table created!</p>";
    } else {
        echo "<p>Campsite table failed to create.</p>";
    }
}

function createFeaturesTable() {
    global $connect;
    $query = "CREATE TABLE features
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50)
    )";

    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<p>Features table created!</p>";
    } else {
        echo "<p>Features table failed to create.</p>";
    }
}

function createCampFeaturesTable() {
    global $connect;
    $query = "CREATE TABLE camp_features
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        campsite_id INT NOT NULL,
        feature_id INT NOT NULL,
        FOREIGN KEY (campsite_id) REFERENCES campsites(id),
        FOREIGN KEY (feature_id) REFERENCES features(id)
    )";

    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<p>Camp Features table created!</p>";
    } else {
        echo "<p>Camp Features table failed to create.</p>";
    }
}