<?php

namespace db\model;

class Pitch
{
    public $id;

    public $name;

    public $duration;

    public $description;

    // tent, caravan, motor_home
    public $type;

    public $groundType;

    public $image;

    public $campsiteId;

    public $price;
}