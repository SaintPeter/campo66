<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =  [
       'guest_id',
       'married_name', 'spouse_name', 'address1', 'address2', 'city', 'state', 'zip',
       'phone1', 'phone1type', 'phone2', 'phone2type', 'phone3', 'phone3type',
       'email', 'email2',
       'moved', 'furthest', 'schooling', 'book',
       'coolestjob', 'occupation', 'retired', 'retired_date',
       'children', 'grandchildren', 'greatgrandchildren', 'countries',
       'furthest_country', 'highlights', 'achievement', 'differently', 'last_words',
       'public_address', 'public_phone', 'public_email'
       ];

    public function guest() {
        return $this->belongsTo('App\Guest');
    }

}
