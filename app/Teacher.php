<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
<<<<<<< HEAD
    protected $fillable  = [
        'fullname', 'birthday', 'address', 'email'
    ];
    public function customuser() {
        return $this->belongsTo('App\Customuser');
    }
=======
    protected $table = 'teachers';
>>>>>>> a3fc292e1cd2c02590461bc49c360535ef374de1
}
