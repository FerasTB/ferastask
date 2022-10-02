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
            $table->mediumText('patient_complaint');
            $table->longText('doctor_diagnosis')->nullable();
            $table->boolean('pregnant')->default(false);
            $table->integer('pregnant_month')->default(0);
            $table->integer('breast_feeding_month')->default(0);
            $table->boolean('breast_feeding')->default(false);
            // date of start mean after pay and not the date of create consultation 
            $table->timestamp('start_at')->nullable();
            // date of end mean when the doctor submit the diagnosis
            $table->timestamp('end_at')->nullable();
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
