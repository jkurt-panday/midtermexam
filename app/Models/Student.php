<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /* $table->unsignedInteger('student_num');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('sname')->nullable();
            $table->date('birthdate');
            $table->string('gender'); */

    protected $fillable = [
        'student_num',
        'fname',
        'mname',
        'lname',
        'sname',
        'birthdate',
        'gender'
    ];

    protected $casts = [
        'birthdate' => 'date'
    ];
}
