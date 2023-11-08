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
        Schema::create('mnrce_admin_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('v_id');            
            $table->unsignedBigInteger('epf_id');

            $table->date('reqDate'); 
            $table->date('leaveFrom');
            $table->date('leaveTo'); 
                                 
            $table->string('leaveType');      
            $table->foreign('leaveType')->references('ltype')->on('mnrce_admin_master_leave_types')->onUpdate('cascade')->onDelete('restrict');                
           // $table->decimal('leaveQty', $precision = 5, $scale = 2);  
             
            $table->decimal('leaveQty',5,2)->nullable();  
            // Arrangement for work 
            $table->unsignedBigInteger('w_arrange')->nullable(); 
            $table->foreign('w_arrange')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict');                 
           
            $table->text('description');
            // 0 = requested, 1=approved, 2= rejected, 3= canceled by user, canceled by leave clerk 
            
            $table->integer('leaveStatus')->default(0);          
            $table->unsignedBigInteger('approvedBy')->nullable();            
            $table->foreign('approvedBy')->references('id')->on('mnrce_admin_users')->onUpdate('cascade')->onDelete('restrict'); 
            // 0 = requested, 1=approved, 2= canceled,
            
            $table->integer('leaveBookStatus')->default(0); 
            $table->unsignedBigInteger('checkedBy')->nullable();            
            $table->foreign('checkedBy')->references('id')->on('mnrce_admin_users')->onUpdate('cascade')->onDelete('restrict'); 
           
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
        Schema::dropIfExists('mnrce_admin_leave_requests');
    }
};
