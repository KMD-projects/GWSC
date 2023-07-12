<?php

namespace db\model;

class Pitch
{
    public $id;

    public $name;

    public $capacity;

    public $description;

    // tent, caravan, motor_home
    public $type;

    public $groundType;

    public $image;

    public $campsiteId;

    public $price;
}