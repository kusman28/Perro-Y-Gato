<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Inventory extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logName = 'Product';
    protected $table = 'inventory';
    protected $fillable = [
        'product',
        'description',
        'price',
        'image',
    ];
}
