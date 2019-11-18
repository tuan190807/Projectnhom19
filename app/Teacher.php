<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable  = [
        'fullname', 'birthday', 'address', 'email'
    ];
    public function customuser() {
        return $this->belongsTo('App\Customuser');
    }
}
