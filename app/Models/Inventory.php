<?php

namespace App\Models;

use App\Http\Controllers\ProductsController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    /* $table->unsignedInteger('stocks'); */

    protected $fillable = [
        'stocks'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductsController::class);
    }
}
