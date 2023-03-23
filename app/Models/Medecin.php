<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
  use HasFactory;

  protected $fillable = [
    "nom",
    "prenom",
    "specialite",
    "adresse",
    "tel"
  ];

  public function rdvs()
  {
    return $this->hasMany(Rdv::class, 'medecin_id', 'id');
  }

  public function consultations()
  {
    return $this->hasMany(Consultation::class);
  }
}