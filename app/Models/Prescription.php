<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
  use HasFactory;

  protected $fillable = [
    "duree",
    "dosage",
    "consultation_id",
    "medicament_id"
  ];

  public function consultations()
  {
    return $this->belongTo(Consultation::class);
  }

  public function medicaments()
  {
    return $this->belongTo(Medicament::class);
  }
}