<?php

namespace db\model;

class Booking
{
    public $id;
    public $guestCount;

    public $pitchPrice;
    public $taxPrice;
    public $serviceFee;
    public $totalPrice;
    public $status;
    public $date;

    public $userId;
    public $username;
    public $campsiteId;
    public $campsiteName;
    public $pitchId;
    public $pitchName;

    public $createdAt;

    public $updatedAt;
}