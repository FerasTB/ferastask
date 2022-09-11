<?php

use App\Enums\Pain;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->constrained('consultation_statuses')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->date('dateTime');
            $table->mediumText('patient_complaint');
            $table->longText('doctor_diagnosis');
            $table->date('startDate');
            $table->smallInteger('pain')->default(Pain::head);
            $table->boolean('pregnant')->default(false);
            $table->integer('pregnant_month')->default(0);
            $table->boolean('breast_feeding')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
