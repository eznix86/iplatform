<?php

use App\Models\Policy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('date_of_birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('license_number');
            $table->string('license_state');
            $table->string('license_status');
            $table->date('license_effective_date');
            $table->date('license_expiration_date');
            $table->string('license_class');
            $table->foreignIdFor(Policy::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
