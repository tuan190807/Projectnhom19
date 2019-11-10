<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable  = [
        'subjectname', 'classroom', 'oder_of_lesson', 'teacher_id'
    ];
    //
    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }
    public function classes() {
        return $this->belongsToMany(Classes::class);
    }
    // public function getTeachersAttribute() {
    //     $arr = [];
    //     foreach($this->teacher as $t) {
    //         $arr[] = $t->fullname;
    //     }
    //     return join(", ", $arr);
    // }
    public function getClassStrAttribute() {
        $arr = [];
        $classes = $this->classes;
        foreach($classes as $key => $class) {
            $arr[] = $class->name;
        }
        return join(", ", $arr);    
    }
}
