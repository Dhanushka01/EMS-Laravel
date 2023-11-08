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
        Schema::create('mnrce_admin_ins_claim_receives', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('rid');
            $table->foreign('rid')->references('id')->on('mnrce_admin_ins_claim_requests')->onUpdate('cascade')->onDelete('restrict');
            
            $table->date('cdate');
            $table->string('cstatus',1);
            $table->string('cheque')->nullable();
            $table->decimal('amount', $precision = 22, $scale = 2)->default(0.00);
            $table->text('remark')->nullable();
                        
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
        Schema::dropIfExists('mnrce_admin_ins_claim_receives');
    }
};
