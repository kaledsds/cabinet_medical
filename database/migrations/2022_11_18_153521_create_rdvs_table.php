<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('rdvs', function (Blueprint $table) {
      $table->increments("id");
      $table->integer("patient_id");
      $table->integer("medecin_id");
      $table->date("date");
      $table->string("heure");
      $table->timestamps();
      $table->foreign("patient_id")->references("id")->on("patients")->onDelete("cascade");
      $table->foreign("medecin_id")->references("id")->on("medecins")->onDelete("cascade");
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('rdvs');
  }
};