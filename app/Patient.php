<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Patient extends Model
{
    use LogsActivity;
    protected static $logFillable = true;
    protected static $logName = 'Patient';
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
    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
