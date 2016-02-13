<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function statusColor() {
        $colors = [
            "Unknown"       => "btn-default",
            "Attending"     => "btn-success",
            "Not Attending" => "btn-warning",
            "Deceased"      => "btn-info"
        ];

        return $colors[$this->attributes['status']];
    }
}
