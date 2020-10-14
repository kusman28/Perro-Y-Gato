<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    // protected $guarded = [ ];
    protected $fillable = [
        'patient_id',
        'patient',
        'product',
        'amount',
        'amount_paid',
        'status',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }

    
}
