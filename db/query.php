<?php

use db\model\Admin;
use db\model\Attraction;
use db\model\Campsite;
use db\model\Customer;
use db\model\Feature;
use db\model\Pitch;
use db\model\Review;
use db\model\Booking;

include('connect.php');
include('model/Admin.php');
include('model/Customer.php');
include('model/Campsite.php');
include('model/Pitch.php');
include('model/Review.php');
include('model/Attraction.php');
include('model/Feature.php');
include('model/Booking.php');

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
    $insertAdmin = "insert into admins (name, email, password, phone, address, createdAt, updatedAt) values ('$admin->name', '$admin->email', '$admin->password', '$admin->phone', '$admin->address', now(), now())";
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
    $insertCustomer = "insert into customers (first_name, surname, email, password, phone, address, createdAt, updatedAt)
                        values ('$customer->firstname', '$customer->lastname', '$customer->email', '$customer->password', '$customer->phone', '$customer->address', now(), now());";
    return mysqli_query($connect, $insertCustomer);
}

function getAllCustomers(): array
{
    global $connect;
    $getQuery = "select * from customers";
    $result = mysqli_query($connect, $getQuery);
    return mapCustomers($result);
}

function getCustomer($email, $password): ?Customer
{
    global $connect;
    $getQuery = "select * from customers where email = '$email' and password = '$password'";
    $getResult = mysqli_query($connect, $getQuery);
    $cols = mysqli_fetch_array($getResult);
    if (mysqli_num_rows($getResult) > 0) {
        return mapCustomer($cols);
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
        return mapCustomer($cols);
    } else {
        return null;
    }
}

function deleteCustomer($userId): bool
{
    global $connect;
    $query = "delete from customers where customer_id = '$userId'";
    return mysqli_query($connect, $query);
}

function mapCustomers($result): array
{
    $count = mysqli_num_rows($result);
    $customers = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $customer = mapCustomer($row);
        $customers[] = $customer;
    }
    return $customers;
}

function mapCustomer($row): ?Customer
{
    $customer = new Customer();
    $customer->id = $row['customer_id'];
    $customer->firstname = $row['first_name'];
    $customer->lastname = $row['surname'];
    $customer->email = $row['email'];
    $customer->password = $row['password'];
    $customer->phone = $row['phone'];
    $customer->address = $row['address'];
    $customer->createdAt = $row['createdAt'];
    $customer->updatedAt = $row['updatedAt'];
    return $customer;
}

function insertCampsite(Campsite $campsite): bool
{
    global $connect;
    $insertCustomer = "insert into campsites (name, location, description, image, price, createdAt, updatedAt) 
                        values ('$campsite->name', '$campsite->location', '$campsite->description', '$campsite->image', '$campsite->price', now(), now());";
    return mysqli_query($connect, $insertCustomer);
}

function deleteCampsite($campsiteId): bool
{
    global $connect;
    $query = "delete from campsites where id = '$campsiteId'";
    return mysqli_query($connect, $query);
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
        $pitches = getPitches($campsite->id);
        $tentCount = 0;
        $caravanCount = 0;
        $motorHomeCount = 0;
        foreach ($pitches as $pitch) {
            switch ($pitch->type) {
                case "Tent":
                    $tentCount++;
                    break;
                case "Motorhome":
                    $motorHomeCount++;
                    break;
                case "Caravan":
                    $caravanCount++;
                    break;
            }
        }
        $campsite->attractions = getAttractions($campsite->id);
        $campsite->tentCapacity = $tentCount;
        $campsite->caravanCapacity = $caravanCount;
        $campsite->motorHomeCapacity = $motorHomeCount;
        $campsites[] = $campsite;
    }
    return $campsites;
}

function mapCampsite($row): Campsite
{
    $campsite = new Campsite();
    $campsite->id = $row['id'];
    $campsite->name = $row['name'];
    $campsite->location = $row['location'];
    $campsite->description = $row['description'];
    $campsite->price = $row['price'];
    $campsite->image = $row['image'];
    $campsite->createdAt = $row['createdAt'];
    $campsite->updatedAt = $row['updatedAt'];
    return $campsite;
}

function insertPitch(Pitch $pitch): bool
{
    global $connect;
    $query = "insert into pitches (name, description, duration, type, groundType, image, price, campsite_id, created_at, updated_at) 
                        values ('$pitch->name', '$pitch->description', '$pitch->duration', '$pitch->type', '$pitch->groundType', '$pitch->image', '$pitch->price', '$pitch->campsiteId', now(), now());";
    return mysqli_query($connect, $query);
}

function getPitches($campsiteId): array
{
    global $connect;
    $getQuery = "select * from pitches where campsite_id = '$campsiteId'";
    $result = mysqli_query($connect, $getQuery);
    return mapPitches($result);
}

function getPitch($pitchId): ?Pitch
{
    global $connect;
    $getQuery = "select * from pitches where id = '$pitchId'";
    $getResult = mysqli_query($connect, $getQuery);
    $cols = mysqli_fetch_array($getResult);
    if (mysqli_num_rows($getResult) > 0) {
        return mapPitch($cols);
    } else {
        return null;
    }
}

function mapPitches($result): array
{
    $count = mysqli_num_rows($result);
    $pitches = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $pitch = mapPitch($row);
        $pitches[] = $pitch;
    }
    return $pitches;
}

function mapPitch($row): Pitch
{
    $pitch = new Pitch();
    $pitch->id = $row['id'];
    $pitch->name = $row['name'];
    $pitch->description = $row['description'];
    switch ($row['duration']) {
        case "one-d":
            $pitch->duration = "1 day";
            break;
        case "three-d":
            $pitch->duration = "3 days";
            break;
        case "one-w":
            $pitch->duration = "1 week";
            break;
        case "two-w":
            $pitch->duration = "2 weeks";
            break;
    }
    $pitch->type = $row['type'];
    $pitch->groundType = $row['groundType'];
    $pitch->image = $row['image'];
    $pitch->price = $row['price'];
    $pitch->campsiteId = $row['campsite_id'];
    return $pitch;
}

function insertAttraction(Attraction $attraction): bool
{
    global $connect;
    $query = "insert into attractions (name, description, distance, image, campsite_id, created_at, updated_at) 
                        values ('$attraction->name', '$attraction->description', '$attraction->distance', '$attraction->image', '$attraction->campsiteId', now(), now());";
    return mysqli_query($connect, $query);
}

function getAllAttractions(): array
{
    global $connect;
    $getQuery = "select * from attractions";
    $result = mysqli_query($connect, $getQuery);
    return mapAttractions($result);
}

function getAttractions($campsiteId): array
{
    global $connect;
    $getQuery = "select * from attractions where campsite_id = '$campsiteId'";
    $result = mysqli_query($connect, $getQuery);
    return mapAttractions($result);
}

function mapAttractions($result): array
{
    $count = mysqli_num_rows($result);
    $attractions = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $attraction = mapAttraction($row);
        $attractions[] = $attraction;
    }
    return $attractions;
}

function mapAttraction($row): Attraction
{
    $attraction = new Attraction();
    $attraction->id = $row['id'];
    $attraction->name = $row['name'];
    $attraction->description = $row['description'];
    $attraction->distance = $row['distance'];
    $attraction->image = $row['image'];
    $attraction->campsiteId = $row['campsite_id'];
    return $attraction;
}

function getReviews($campsiteId): array
{
    $reviews = array();
    for ($i = 0; $i < 10; $i++) {
        $review = new Review();
        $review->id = $i;
        $review->title = "Review " . $i;
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

function insertFeature(Feature $feature): bool
{
    global $connect;
    $query = "insert into features (name) values ('$feature->name');";
    return mysqli_query($connect, $query);
}

function getFeatures($campsiteId): array
{
    $features = array();
    global $connect;
    $getQuery = "select * from features as f join camp_features as cf on f.id = cf.feature_id where cf.campsite_id = " . $campsiteId;
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

function getAllFeatures(): array
{
    $features = array();
    global $connect;
    $getQuery = "select * from features";
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

function deleteFeature($featureId): bool
{
    global $connect;
    $query = "delete from features where id = '$featureId'";
    return mysqli_query($connect, $query);
}

function insertBooking(Booking $booking): bool
{
    global $connect;
    $query = "insert into bookings (
                         guest_count,
                         pitch_price,
                         tax_price,
                         service_fee,
                         total_price,
                         status,
                         date,
                         campsite_id,
                         pitch_id,
                         user_id,
                         created_at,
                         updated_at
                         ) values (
                                   '$booking->guestCount',
                                   '$booking->pitchPrice',
                                   '$booking->taxPrice',
                                   '$booking->serviceFee',
                                   '$booking->totalPrice',
                                   '$booking->status',
                                   now(),
                                   '$booking->campsiteId',
                                   '$booking->pitchId',
                                   '$booking->userId',
                                   now(),
                                   now());";
    return mysqli_query($connect, $query);
}

function getAllBookings(): array
{
    global $connect;
    $getQuery = "select * from bookings;";
    $result = mysqli_query($connect, $getQuery);
    return mapBookings($result);
}

function findBooking($pitchId, $userId): ?Booking
{
    global $connect;
    $getQuery = "select * from bookings where pitch_id = ".$pitchId." and user_id = ".$userId.";";
    $result = mysqli_query($connect, $getQuery);
    $cols = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        return mapBooking($cols);
    } else {
        return null;
    }
}

function updateBookingStatus($bookingId, $status): bool
{
    global $connect;
    $getQuery = "update bookings set status = '$status' where id = '$bookingId';";
    return mysqli_query($connect, $getQuery);
}

function mapBookings($result): array
{
    $count = mysqli_num_rows($result);
    $bookings = array();
    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result);
        $booking = mapBooking($row);
        $bookings[] = $booking;
    }
    return $bookings;
}

function mapBooking($row): Booking
{
    $booking = new Booking();
    $booking->id = $row['id'];
    $booking->guestCount = $row['guest_count'];
    $booking->pitchPrice = $row['pitch_price'];
    $booking->taxPrice = $row['tax_price'];
    $booking->serviceFee = $row['service_fee'];
    $booking->totalPrice = $row['total_price'];
    $booking->status = $row['status'];
    $booking->date = $row['date'];
    $booking->campsiteId = $row['campsite_id'];
    $campsite = getCampsite($booking->campsiteId);
    $booking->campsiteName = $campsite->name;
    $booking->pitchId = $row['pitch_id'];
    $pitch = getPitch($booking->pitchId);
    $booking->pitchName = $pitch->name;
    $booking->userId = $row['user_id'];
    $user = getCustomerProfile($booking->userId);
    $booking->username = $user->firstname;
    $booking->createdAt = $row['created_at'];
    $booking->updatedAt = $row['updated_at'];
    return $booking;
}

function insertContactUs($userId, $subject, $message): bool
{
    global $connect;
    $query = "insert into contact_messages (user_id, subject, message) values ('$userId', '$subject', '$message');";
    return mysqli_query($connect, $query);
}
