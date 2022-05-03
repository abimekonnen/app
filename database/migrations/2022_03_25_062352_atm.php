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
        
        if (!Schema::hasTable('atm')){
            Schema::create('atm', function (Blueprint $table) {
                $table->id();
               // $table->increments('id')->primary()->integer();
                $table->string('name')->unique();
                $table->string('terminal')->unique();
            });
        }

        if (!Schema::hasTable('incident')) {
            Schema::create('incident', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('problem');
                $table->enum('status',['not solved','solved'])->default('not solved');
                $table->integer('ticket')->unique();
                //$table->foreignId('atm_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                //$table->foreign('atm_id')->references('id')->on('atm');
            
                $table->timestamps();
            });
        }
        // Schema::table('priorities', function($table) {
        //     $table->foreign('atm_id')
        //     ->reference('id')
        //     ->on('atm');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atm');
        Schema::dropIfExists('incident');
    }
};

/**
     * Run the migrations.
     *
     * @return void
     */
