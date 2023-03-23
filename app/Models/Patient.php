<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  use HasFactory;

  protected $fillable = [
    "nom",
    "prenom",
    "datenais",
    "adresse",
    "email",
    "tel"
  ];

  public function rdvs()
  {
    return $this->hasMany(Rdv::class, 'patient_id', 'id');
  }


  public function consultations()
  {
    return $this->hasMany(Consultation::class);
  }
}