<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Payment extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logName = 'Payment';
    protected $table = 'payments';
    // protected $guarded = [ ];
    protected $fillable = [
        'patient_id',
        'product',
        'amount',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }

    
}
