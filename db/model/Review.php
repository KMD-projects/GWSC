<?php

namespace db\model;

class Review
{
    public $id;
    public $title;
    public $description;

    public $rating;

    public $userId;
    public $campsiteId;
    public $pitchId;

    public $date;
}