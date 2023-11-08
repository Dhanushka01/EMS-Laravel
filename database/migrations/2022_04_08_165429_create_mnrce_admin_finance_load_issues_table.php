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
        Schema::create('mnrce_admin_finance_load_issues', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('l_epfno');
            $table->unsignedBigInteger('gur_epfno1')->nullable();
            $table->unsignedBigInteger('gur_epfno2')->nullable();
            $table->unsignedBigInteger('gur_epfno3')->nullable();
            
            $table->foreign('l_epfno')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict'); 
            $table->foreign('gur_epfno1')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict')->nullable(); 
            $table->foreign('gur_epfno2')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict')->nullable(); 
            $table->foreign('gur_epfno3')->references('id')->on('mnrce_admin_emp_epfs')->onUpdate('cascade')->onDelete('restrict')->nullable(); 
           
            $table->string('loanType')->nullable();
            $table->integer('installmentPlan')->default(0);
            $table->decimal('loanAmount',21,2)->default(0.00);
            $table->decimal('interestRate',5,2)->default(0.00);
            $table->decimal('installmentAmount',21,2)->default(0.00);
            
            $table->decimal('totalInterestAmount',21,2)->default(0.00);
            $table->decimal('totalRecoveryAmount',21,2)->default(0.00);
            $table->decimal('principalAmount',21,2)->default(0.00);
            $table->decimal('interestPerInstallmernt',21,2)->default(0.00);
            
				$table->date('deductionDate')->nullable();   
				 
				$table->string('chequeNo')->nullable();        
				$table->date('cheqePaymentDate')->nullable();            
				$table->date('lCompleteDate')->nullable();   
				// 0 = Requested ,1 = Open, 2 = closed        
				$table->integer('lStatus')->default(0);  
				     
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
        Schema::dropIfExists('mnrce_admin_finance_load_issues');
    }
};
