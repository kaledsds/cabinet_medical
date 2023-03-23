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
    Schema::create('prescriptions', function (Blueprint $table) {
      $table->increments("id");
      $table->integer("consultation_id");
      $table->integer("medicament_id");
      $table->string("duree");
      $table->string("dosage");
      $table->timestamps();
      $table->foreign("consultation_id")->references("id")->on("consultations")->onDelete("cascade");
      $table->foreign("medicament_id")->references("id")->on("medicaments")->onDelete("cascade");
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('prescriptions');
  }
};