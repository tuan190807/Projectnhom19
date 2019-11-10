<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}
