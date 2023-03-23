<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
  use HasFactory;

  protected $fillable = [
    "date",
    "heure",
    "discription",
    'patient_id',
    'medecin_id'
  ];

  public function patients()
  {
    return $this->belongTo(Patient::class);
  }

  public function medecins()
  {
    return $this->belongTo(Medecin::class);
  }

  public function prescriptions()
  {
    return $this->hasMany(Prescription::class);
  }
}