<?php

namespace db\model;
class Campsite
{
    public $id;
    public $name;
    public $location;
    public $description;
    public $price;
    public $image;
    public $tentCapacity;
    public $caravanCapacity;
    public $motorHomeCapacity;

    public $attractions;
    public $createdAt;

    public $updatedAt;
}