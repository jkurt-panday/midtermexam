<?php

namespace App\Models;

use App\Http\Controllers\InventoryController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    /* $table->string('product');
            $table->text('description');
            $table->unsignedInteger('unit');
            $table->decimal('price', 8, 2); */

    protected $fillable = [
        'product',
        'description',
        'unit',
        'price',
    ];

    public function inventory(): HasOne
    {
        return $this->hasOne(InventoryController::class);
    }

}
