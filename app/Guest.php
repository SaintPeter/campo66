<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'married_name',
        'spouse_name', 'address1', 'address2', 'city',
        'state', 'zip', 'notes', 'found96', 'found16',
        'status', 'phone1', 'phone1type', 'phone2',
        'phone2type', 'phone3type', 'phone3', 'email',
        'email2', 'married', 'married_times', 'children',
        'children_names', 'education', 'employment',
        'hobbies', 'unexpected_event', 'greatest_accomplishment',
        'travel', 'notdone', 'miles', 'dlnum', 'quest',
        'email_date'
   ];

    // Date fields automatically converted to Carbon
    protected $dates = ['created_at', 'updated_at', 'email_date'];

    public function statusColor() {
        $colors = [
            "Unknown"       => "btn-default",
            "Attending"     => "btn-success",
            "Not Attending" => "btn-warning",
            "Deceased"      => "btn-info"
        ];

        if(array_key_exists($this->attributes['status'], $colors)) {
            return $colors[$this->attributes['status']];
        } else {
            return "btn-default";
        }
    }

    public function answerLength() {
        $answers = trim($this->children_names .
            $this->education .
            $this->employment.
            $this->hobbies .
            $this->unexpected_event .
            $this->greatest_accomplishment .
            $this->travel .
            $this->notdone);
        return strlen($answers);
    }

    public function getFullNameAttribute() {
        $full_name = $this->first_name . ' ';
        if(!empty($this->married_name)) {
            $full_name .= '(' . $this->married_name . ') ';
        }
        $full_name .= $this->last_name;

        return $full_name;
    }

    public function getEditedStatusAttribute() {
        if($this->attributes['status'] != "Unknown") {
            return $this->attributes['status'];
        }
        return '';
    }

    public function getIsDeceasedAttribute() {
        if($this->attributes['status'] == "Deceased") {
            return 'Deceased';
        }
        return '';
    }


}
