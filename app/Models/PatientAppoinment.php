<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAppoinment extends Model
{
    use HasFactory;
    public function patient(){
        return $this->belongsTo(User::class,'patient_id','id');
    }
    public function doctor() {
        return $this->belongsTo(Admin::class,'doctor_id','id');
    }
}
