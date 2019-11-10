<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
<<<<<<< HEAD
    protected $table = 'students';

    public function customuser()
    {
    	return $this->belongsTo('App\CustomUser');
    }
=======
>>>>>>> e449ebf53097cf9ae969ccee9a4aebd9bd6cb5b4
}
