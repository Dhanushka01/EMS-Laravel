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
        Schema::create('mnrce_admin_ins_claim_requests', function (Blueprint $table) {
            $table->id();
            $table->date('rdate');
            $table->unsignedBigInteger('epf_id');
  
            $table->string('ins');
            $table->string('policy')->nullable();
            $table->timestamp('accTime')->nullable();
            $table->text('remark')->nullable();
            $table->string('dio',1)->nullable();
            $table->string('bank',1)->nullable();
            $table->string('pay',1)->nullable();
            $table->string('leav',1)->nullable();
            //R - Requested, A- Accepted, B - Rejected
            $table->string('status',1)->default('R');
            
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
        Schema::dropIfExists('mnrce_admin_ins_claim_requests');
    }
};
