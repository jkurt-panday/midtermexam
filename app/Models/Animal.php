<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /* $table->string('name');
            $table->string('species');
            $table->integer('age');
            $table->string('habitat'); */

    protected $fillable = [
        'name',
        'species',
        'age',
        'habitat'
    ];

    protected $casts = [
        'age' => 'integer'
    ];

}
