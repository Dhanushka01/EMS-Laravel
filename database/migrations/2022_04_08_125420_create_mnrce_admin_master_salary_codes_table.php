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
        Schema::create('mnrce_admin_master_salary_codes', function (Blueprint $table) {
            $table->id();
            $table->date('effdate');
            $table->date('revdate')->nullable();
            $table->string('salcode');
            $table->string('opt');
            
            $table->decimal('bsal', $precision = 22, $scale = 2)->nullable();
            $table->decimal('costl', $precision = 22, $scale = 2)->nullable();
            
            $table->decimal('ir1', $precision = 10, $scale = 2)->nullable();
            $table->decimal('ir2', $precision = 10, $scale = 2)->nullable();
            $table->decimal('ir3', $precision = 10, $scale = 2)->nullable();
            $table->decimal('ir4', $precision = 10, $scale = 2)->nullable();
            $table->decimal('ir5', $precision = 10, $scale = 2)->nullable();
            $table->decimal('ir6', $precision = 10, $scale = 2)->nullable();
            
            $table->integer('yr1')->nullable();
            $table->integer('yr2')->nullable();
            $table->integer('yr3')->nullable();
            $table->integer('yr4')->nullable();
            $table->integer('yr5')->nullable();
            $table->integer('yr6')->nullable();

            $table->unsignedBigInteger('crby')->nullable();
            $table->unsignedBigInteger('luby')->nullable();
            
            $table->foreign('crby')->references('id')->on('mnrce_admin_users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('luby')->references('id')->on('mnrce_admin_users')->onUpdate('cascade')->onDelete('restrict');	
                        
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
        Schema::dropIfExists('mnrce_admin_master_salary_codes');
    }
};
