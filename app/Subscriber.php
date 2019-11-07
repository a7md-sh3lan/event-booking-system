<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    protected $fillable = ['name', 'email', 'phone_number', 'ticket_type'];
    // Relations
    public function tickets()
    {
        return $this->hasOne('App\Category');
    }
}
