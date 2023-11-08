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
        Schema::create('mnrce_admin_master_designations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('status')->default(1);
            $table->string('timing')->nullable();
				$table->integer('cadre')->default(1);    
				   
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
        Schema::dropIfExists('mnrce_admin_master_designations');
    }
};
