<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillble = [
        "title",
        "description",
        "audience_max_size",
        "duration",
        "cinema_location",
        "theatre_number",
        "ticket_price",
        "show_image",
        "date"
    ];
}
