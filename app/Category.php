<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['avilable_tickets'];

    // RELATIONS
    public function tickets()
    {
        return $this->belongsToMany('App\Subscriber', 'id');
    }

    public function isAvilable() {
        $avilable_tickets = $this->avilable_tickets;
        if($avilable_tickets > 0) {
            return true;
        }
        return false;
    }

    public function bookTicket() {
        $avilable_tickets = $this->avilable_tickets;
        return($this->update(['avilable_tickets' => $avilable_tickets-1]));
    }
}
