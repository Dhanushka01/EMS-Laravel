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
        Schema::create('mnrce_admin_ins_types', function (Blueprint $table) {
            $table->id();
            
            $table->date('insfrom');
            $table->date('insto');
            
            $table->unsignedBigInteger('insid');
            $table->foreign('insid')->references('id')->on('mnrce_admin_ins_companies')->onUpdate('cascade')->onDelete('restrict');
            
            $table->string('type');
            $table->decimal('val',22,2)->nullable();
                        
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
        Schema::dropIfExists('mnrce_admin_ins_types');
    }
};
