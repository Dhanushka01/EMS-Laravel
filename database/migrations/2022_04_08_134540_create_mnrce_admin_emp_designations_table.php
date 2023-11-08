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
        Schema::create('mnrce_admin_emp_designations', function (Blueprint $table) {
            $table->id();
            $table->date('effDate');
            $table->unsignedBigInteger('epf_id');

            $table->string('empType');
            $table->date('aExpDate')->nullable();
            $table->string('aRef')->nullable();
            $table->string('EmpCat');
            $table->integer('empDesig');
            $table->integer('empSalCode');
            $table->date('revDate')->nullable();
            $table->date('nextPromotion')->nullable();
            $table->integer('evalRef')->nullable();
            
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
        Schema::dropIfExists('mnrce_admin_emp_designations');
    }
};
