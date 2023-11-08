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
        Schema::create('mnrce_admin_master_projects', function (Blueprint $table) {
            $table->id();
            $table->string('Pcode',50)->unique()->index();
            
            $table->string('Pname',100);
            $table->string('Wono',50);
            $table->string('Locat',100);
            $table->string('Provi',13);
            
            $table->string('Remark')->nullable();
            
            $table->date('ComDate')->nullable();
            
            $table->string('Head',100)->default('D.G.M (Project), MNRCE, Peiliyagoda.')->nullable();
            
				$table->string('admin')->default('O');
				
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
        Schema::dropIfExists('mnrce_admin_master_projects');
    }
};
