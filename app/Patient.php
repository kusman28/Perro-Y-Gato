<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'age',
        'contact_no',
        'address',
        'pet_name',
        'pet_type',
        'pet_note',
    ];

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function one()
    {
        return $this->hasOne(Payment::class);
    }
}
