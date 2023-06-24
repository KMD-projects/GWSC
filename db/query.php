<?php

use db\model\Admin;
use db\model\Customer;
use db\model\Campsite;
use db\model\Pitch;
use db\model\Review;
use db\model\Attraction;
use db\model\Feature;

include('connect.php');
include('model/Admin.php');
include('model/Customer.php');
include('model/Campsite.php');
include('model/Pitch.php');
include('model/Review.php');
include('model/Attraction.php');
include('model/Feature.php');

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
    $timestamp = date('Y-m-d H:i:s');
    $insertAdmin = "insert into admins (name, email, password, phone, address, createdAt, updatedAt) values ('$admin->name', '$admin->email', '$admin->password', '$admin->phone', '$admin->address', '$timestamp', '$timestamp')";
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
        $admin->id = $cols['id'];
        $admin->name = $cols['name'];
        $admin->email = $cols['email'];
        $admin->password = $cols['password'];
        $admin->phone = $cols['phone'];
        $admin->address = $cols['address'];
        $admin->createdAt = $cols['createdAt'];
        $admin->updatedAt = $cols['updatedAt'];
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

function getCustomerProfile($userId): ?Customer
{
    global $connect;
    $getQuery = "select * from customers where customer_id = '$userId'";
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

function insertCampsite(Campsite $campsite): bool
{
    global $connect;
    $timestamp = date('Y-m-d H:i:s');
    $insertCustomer = "insert into campsites (name, location, description, tent_capacity, caravan_capacity, motor_home_capacity, price, createdAt, updatedAt) 
                        values ('$campsite->name', '$campsite->location', '$campsite->description', '$campsite->tentCapacity', '$campsite->caravanCapacity', '$campsite->motorHomeCapacity', '$campsite->price', '$timestamp', '$timestamp');";
    return mysqli_query($connect, $insertCustomer);
}

function getCampsite($campsiteId): ?Campsite
{
    global $connect;
    $getQuery = "select * from campsites where id = '$campsiteId'";
    $getResult = mysqli_query($connect, $getQuery);
    $cols = mysqli_fetch_array($getResult);
    if (mysqli_num_rows($getResult) > 0) {
        return mapCampsite($cols);
    } else {
        return null;
    }
}

function getCampsites(): array
{
    global $connect;
    $getQuery = "select * from campsites";
    $result = mysqli_query($connect, $getQuery);
    return mapCampsites($result);
}

function searchCampsite($keyword): array
{
    global $connect;
    $getQuery = "select * from campsites where location LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%'";
    $result = mysqli_query($connect, $getQuery);
    return mapCampsites($result);
}

function mapCampsites($result): array
{
    $count = mysqli_num_rows($result);
    $campsites = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $campsite = mapCampsite($row);
        $campsites[] = $campsite;
    }
    return $campsites;
}

function mapCampsite($row): Campsite {
    $campsite = new Campsite();
    $campsite->id = $row['id'];
    $campsite->name = $row['name'];
    $campsite->location = $row['location'];
    $campsite->description = $row['description'];
    $campsite->tentCapacity = $row['tent_capacity'];
    $campsite->caravanCapacity = $row['caravan_capacity'];
    $campsite->motorHomeCapacity = $row['motor_home_capacity'];
    $campsite->price = $row['price'];
    $campsite->createdAt = $row['createdAt'];
    $campsite->updatedAt = $row['updatedAt'];

    $images = array();
    $images[] = "test.jpg";
    $campsite->images = $images;
    return $campsite;
}

function getPitches($campsiteId): array
{
    $pitches = array();
    for ($i = 0; $i < 5; $i++) {
        $pitch = new Pitch();
        $pitch->id = $i;
        $pitch->name = "Pitch ".$i;
        $pitch->capacity = 10;
        $pitch->description = "Escape from messy desks, busy inboxes and fume-filled commutes with a peaceful fresh-air stay among grownups only at Barley Meadow Touring Park, a dog-friendly site under five minutes’ drive from the Devon village of Crockernwell.";
        $pitch->type = "tent";
        $pitch->groundType = "Grass";
        $pitch->image = "test.jpg";
        $pitch->campsiteId = $campsiteId;
        $pitches[] = $pitch;
    }
    return $pitches;
}

function getAttractions($campsiteId): array
{
    $attractions = array();
    for ($i = 0; $i < 3; $i++) {
        $attraction = new Attraction();
        $attraction->id = $i;
        $attraction->name = "Attraction ".$i;
        $attraction->description = "Standing 6,200 feet high in the fog belt in the Kula Forest Reserve, Polipoli Spring State Recreation Area may remind you of the conifer forests on the shorelines of the Pacific Northwest. The extensive trail systems here reward trekkers with sweeping views of Central and West Maui, Kahoʻolawe, Molokaʻi, and Lanaʻi (in clear conditions). You’ll definitely want to pack comfortable shoes and some musubi for some serious island snacking. Mountain bikers may particularly enjoy the Redwood Trail which offers a look at an old ranger’s station. We recommend four-wheel drive vehicles, extra warm clothing, and donning your brightest threads. Seasonal bird, wild boar, and feral goat hunting is permitted. Drinking water is not supplied in the park so be prepared to provide your own.";
        $attraction->image = "test.jpg";
        $attraction->distance = 3;
        $attraction->campsiteId = $campsiteId;
        $attractions[] = $attraction;
    }
    return $attractions;
}

function getReviews($campsiteId): array
{
    $reviews = array();
    for ($i = 0; $i < 10; $i++) {
        $review = new Review();
        $review->id = $i;
        $review->title = "Review ".$i;
        $review->description = "aadkfjalfjajdskfjasdl;fasdfasdlfajsdfjsa;dfja;sdfj";
        $review->rating = 3;
        $timestamp = date('Y-m-d H:i:s');
        $review->date = $timestamp;
        $review->userId = 1;
        $review->campsiteId = $campsiteId;
        $reviews[] = $review;
    }
    return $reviews;
}

function getFeatures($campsiteId): array
{
    $features = array();
    global $connect;
    $getQuery = "select * from features as f join camp_features as cf on f.id = cf.feature_id where cf.campsite_id = ".$campsiteId;
    $result = mysqli_query($connect, $getQuery);
    $count = mysqli_num_rows($result);
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $feature = new Feature();
        $feature->id = $row['id'];
        $feature->name = $row['name'];
        $feature->icon = "";
        $features[] = $feature;
    }
    return $features;
}
