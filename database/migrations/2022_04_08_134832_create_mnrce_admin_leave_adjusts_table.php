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
        Schema::create('mnrce_admin_leave_adjusts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('epf_id');

            $table->string('ltype');
            $table->foreign('ltype')->references('ltype')->on('mnrce_admin_master_leave_types')->onUpdate('cascade')->onDelete('restrict');
            
            $table->string('adjtype');
            $table->decimal('amount',5,2);
            $table->text('reason');   
            
            $table->unsignedBigInteger('crby')->nullable();
            $table->unsignedBigInteger('luby')->nullable();
                        
            $table->foreign('epf_id')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('mnrce_admin_leave_adjusts');
    }
};
