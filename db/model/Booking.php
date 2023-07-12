<?php

namespace db\model;

class Booking
{
    public $id;
    public $date;
    public $userId;
    public $campsiteId;
    public $pitchId;
    public $guestCount;
    public $totalCost;

    public $createdAt;

    public $updatedAt;
}