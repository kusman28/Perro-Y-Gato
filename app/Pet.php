<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'patient_id',
        'pet_name',
        'pet_type',
        'pet_note',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
