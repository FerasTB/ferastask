<?php

use App\Enums\TicketCategory;
use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Enums\UserRole;
use App\Models\TicketSupport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_supports', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("problem");
            $table->string("email")->nullable();
            $table->smallInteger('category')->default(TicketCategory::Other);
            $table->smallInteger('status')->default(TicketStatus::Open);
            $table->smallInteger('priority')->default(TicketPriority::Low);
            $table->smallInteger('agent')->default(UserRole::Admin);
            $table->foreignId('consultation_id')->nullable()->constrained('consultations')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('ticket_supports');
    }
}
