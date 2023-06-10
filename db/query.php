<?php

use db\model\Admin;
use db\model\Customer;

include('connect.php');
include('model/Admin.php');
include('model/Customer.php');

function isAdminExists($email): bool
{
    global $connect;
    $checkEmailQuery = "select * from admins where email = '$email'";
    $checkEmailResult = mysqli_query($connect, $checkEmailQuery);
    $count = mysqli_num_rows($checkEmailResult);
    return $count > 0;
}

function insertAdmin(Admin $admin): bool
{
    global $connect;
    $insertAdmin = "insert into admins (admin_name, email, password, phone_no, address) values ('$admin->name', '$admin->email', '$admin->password', '$admin->phone', '$admin->address')";
    return mysqli_query($connect, $insertAdmin);
}

function getAdmin($email, $password): ?Admin
{
    global $connect;
    $getAdminQuery = "select * from admins where email = '$email' and password = '$password'";
    $getAdminResult = mysqli_query($connect, $getAdminQuery);
    $cols = mysqli_fetch_array($getAdminResult);
    if (mysqli_num_rows($getAdminResult) > 0) {
        $admin = new Admin();
        $admin->id = $cols['admin_id'];
        $admin->name = $cols['admin_name'];
        $admin->email = $cols['email'];
        $admin->password = $cols['password'];
        $admin->phone = $cols['phone_no'];
        $admin->address = $cols['address'];
        return $admin;
    } else {
        return null;
    }
}

function isCustomerExists($email): bool
{
    global $connect;
    $checkEmailQuery = "select * from customers where email = '$email'";
    $checkEmailResult = mysqli_query($connect, $checkEmailQuery);
    $count = mysqli_num_rows($checkEmailResult);
    return $count > 0;
}

function insertCustomer(Customer $customer): bool
{
    global $connect;
    $timestamp = date('Y-m-d H:i:s');
    $insertCustomer = "insert into customers (first_name, surname, email, password, phone, address, createdAt, updatedAt)
                        values ('$customer->firstname', '$customer->lastname', '$customer->email', '$customer->password', '$customer->phone', '$customer->address', '$timestamp', '$timestamp');";
    return mysqli_query($connect, $insertCustomer);
}

function getCustomer($email, $password): ?Customer
{
    global $connect;
    $getQuery = "select * from customers where email = '$email' and password = '$password'";
    $getResult = mysqli_query($connect, $getQuery);
    $cols = mysqli_fetch_array($getResult);
    if (mysqli_num_rows($getResult) > 0) {
        $customer = new Customer();
        $customer->id = $cols['customer_id'];
        $customer->firstname = $cols['first_name'];
        $customer->lastname = $cols['surname'];
        $customer->email = $cols['email'];
        $customer->password = $cols['password'];
        $customer->phone = $cols['phone'];
        $customer->address = $cols['address'];
        $customer->createdAt = $cols['createdAt'];
        $customer->updatedAt = $cols['updatedAt'];
        return $customer;
    } else {
        return null;
    }
}
