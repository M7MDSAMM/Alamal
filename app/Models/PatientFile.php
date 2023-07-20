<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'type',
        'patient_id',
    ];

    public function patient(){
        return $this->belongsTo(User::class,'patient_id','id');
    }
}
