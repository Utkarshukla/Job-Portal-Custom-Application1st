<?php

use App\Models\User;
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
        Schema::create('post', function (Blueprint $table) {
            $table->id('jobid')->autoIncrement();
            $table->string('position');
            $table->string('slug');
            $table->string('company');
            $table->string('experience');
            $table->string('skills');
            $table->text('description');
            $table->string('location');
            $table->string('salary');
            $table->dateTime('created_at');
            $table->bigInteger('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
