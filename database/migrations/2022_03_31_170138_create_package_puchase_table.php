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
        Schema::create('package_puchase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gym_id')->constrained('gyms');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('package_id')->constrained('training_packages');
            $table->double('amount_paid');
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_puchase');
    }
};