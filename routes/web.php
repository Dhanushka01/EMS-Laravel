<?php

use Illuminate\Support\Facades\Route;

	//Ajax Part
#==========================================================================================================================#
	//User Model
	Route::get('get-user-data','App\Http\Controllers\Ajax\MnrceAdminUserAjaxController@get_mnrce_user_data');
	
	//Employee Update
		#1. Personal Data
	Route::get('get-employee-personal-data','App\Http\Controllers\Ajax\MnrceEmployeeUpdateAjaxController@getAjaxEmployeePersonalDataByEpfId');
	
		#2. Contact Data		
	Route::get('get-employee-contact-data','App\Http\Controllers\Ajax\MnrceEmployeeUpdateAjaxController@getAjaxEmployeeContactDataByEpfId');
	
		#3. Emergency Contact Data	
	Route::get('get-employee-emergence-contact-data','App\Http\Controllers\Ajax\MnrceEmployeeUpdateAjaxController@getAjaxEmployeeEmergencyContactDataByEpfId');
	
		#4. Check Epf
	Route::get('check-employee-epf-id','App\Http\Controllers\Ajax\MnrceEmployeeUpdateAjaxController@checkAjaxEmployeeEpfId');
	
	Route::get('check-employee-epf-no','App\Http\Controllers\Ajax\MnrceEmployeeUpdateAjaxController@checkAjaxEmployeeEpf');

	//Designation
	Route::get('get-ajax-designation-by-epf-id','App\Http\Controllers\Ajax\MnrceAdminDesignationAjaxController@getDesignationByEpf');

	//Salary Code	
	Route::get('get-ajax-salary-code-by-epf-id','App\Http\Controllers\Ajax\MnrceSalaryCodeAjaxController@getSalcodeByEpfId');
	
	//Salary Increment
	Route::get('get-ajax-salary-increment-count-by-epf-id','App\Http\Controllers\Ajax\MnrceAdminSalaryIncrementAjaxController@getSalIncrementCount');
	Route::get('get-ajax-salary-increment-by-epf-id','App\Http\Controllers\Ajax\MnrceAdminSalaryIncrementAjaxController@getSalIncrementByEpfId');

	//Division	
	Route::get('get-ajax-division-by-epf-id','App\Http\Controllers\Ajax\MnrceAdminDivisionAjaxController@getDivisionByEpfId');

	//Location	
	Route::get('get-ajax-location-by-epf-id','App\Http\Controllers\Ajax\MnrceAdminLocationAjaxController@getLocationByEpfId');	

	//Leave	
	Route::get('get-ajax-leave-count-by-epf-id','App\Http\Controllers\Ajax\MnrceLeaveAjaxController@getLeaveBalanceByEpfId');	

	//Evaluation Data by id	
	Route::get('get-ajax-employee-evaluation-data-by-id','App\Http\Controllers\Ajax\MnrceAdminEmployeeEvaluationAjaxController@get_employee_evaluation_data_by_id');	

//Evaluation Data by id	
	Route::get('get-ajax-employee-evaluation-list','App\Http\Controllers\Ajax\MnrceAdminEmployeeEvaluationAjaxController@getEvaluationList');	

#==========================================================================================================================#
	//Login Module
	
	Route::get('/','App\Http\Controllers\Login\MnrceAdminLoginController@index');	
	Route::get('/userlogin','App\Http\Controllers\Login\MnrceAdminLoginController@index');
	
	
	Route::post('/','App\Http\Controllers\Login\MnrceAdminLoginController@userLogin');
	Route::post('/userlogin','App\Http\Controllers\Login\MnrceAdminLoginController@userLogin');


	// Logout
	Route::get('logout','App\Http\Controllers\Login\MnrceAdminLoginController@userLogout');
#==========================================================================================================================#	
	//Dash Board
	Route::get('dash-board','App\Http\Controllers\Dash\MnrceAdminDashBordController@index');
#==========================================================================================================================#	
	//User module
		#Registration
	Route::get('user-reg','App\Http\Controllers\User\MnrceAdminUserController@index');
	Route::post('user-reg','App\Http\Controllers\User\MnrceAdminUserController@create_new_user');
	
		#Password Reset By admin
	Route::get('user-pass-reset','App\Http\Controllers\User\MnrceAdminUserController@index2');	
	Route::post('user-pass-reset','App\Http\Controllers\User\MnrceAdminUserController@password_reset_by_admin');	
	
		#Password Reset By user
	Route::get('user-pass-reset-2','App\Http\Controllers\User\MnrceAdminUserController@index3');	
	Route::post('user-pass-reset-2','App\Http\Controllers\User\MnrceAdminUserController@password_reset_by_user');	
#==========================================================================================================================#
	// Master Module
		#1 Designation
	Route::get('master-designation-new','App\Http\Controllers\Master\Designation\MnrceAdminMasterDesignationController@index');
	Route::post('master-designation-new','App\Http\Controllers\Master\Designation\MnrceAdminMasterDesignationController@new_designation');
	
		#2 Salary Codes
	Route::get('master-salarycode-new','App\Http\Controllers\Master\SalaryCode\MnrceAdminMasterSalaryCodeController@index');
	Route::post('master-salarycode-new','App\Http\Controllers\Master\SalaryCode\MnrceAdminMasterSalaryCodeController@new_salary_code');
	
		#3 Projects (Locations & Divisions)
	Route::get('master-project-new','App\Http\Controllers\Master\Project\MnrceAdminMasterProjectsController@index');
	
		#4 Leave
	Route::get('master-leave-new','App\Http\Controllers\Master\Leave\MnrceAdminMasterLeaveTypeController@index');
	Route::post('master-leave-new','App\Http\Controllers\Master\Leave\MnrceAdminMasterLeaveTypeController@new_leave_type');
	
		#5 Insuarance Company
	Route::get('master-ins-company-new','App\Http\Controllers\Master\Insuarance\MnrceAdminInsCompanyController@index');	
	Route::post('master-ins-company-new','App\Http\Controllers\Master\Insuarance\MnrceAdminInsCompanyController@new_insuarance_company');	
		
#==========================================================================================================================#
	// Employee Module
	
		#1.1 Registration
	Route::get('employee-register','App\Http\Controllers\Employee\Register\MnrceAdminEmpPersonalController@index');
	Route::post('employee-register','App\Http\Controllers\Employee\Register\MnrceAdminEmpPersonalController@register_new_employee');	

		#1.2 Update
	Route::get('employee-update','App\Http\Controllers\Employee\Update\MnrceAdminEmployeeUpdateController@index');
	Route::post('employee-update','App\Http\Controllers\Employee\Update\MnrceAdminEmployeeUpdateController@update_employee_basic_data');
		
		#2 New OL
	Route::get('employee-acd-ol-new','App\Http\Controllers\Employee\Edu_local\MnrceAdminEmpAcdOl@index');		
	Route::post('employee-acd-ol-new','App\Http\Controllers\Employee\Edu_local\MnrceAdminEmpAcdOl@new_emp_edu_ol');		

		#3 New AL
	Route::get('employee-acd-al-new','App\Http\Controllers\Employee\Edu_local\MnrceAdminEmpAcdAl@index');		
	Route::post('employee-acd-al-new','App\Http\Controllers\Employee\Edu_local\MnrceAdminEmpAcdAl@new_emp_edu_al');
	
		#4 New Higher Education
	Route::get('employee-acd-higher-new','App\Http\Controllers\Employee\Higher\MnrceAdminEmpAcdHigher@index');		
	Route::post('employee-acd-higher-new','App\Http\Controllers\Employee\Higher\MnrceAdminEmpAcdHigher@new_emp_edu_higher');	
	
		#5 New Higher Education
	Route::get('employee-acd-profi-new','App\Http\Controllers\Employee\Profi\MnrceAdminEmpAcdProffitional@index');		
	Route::post('employee-acd-profi-new','App\Http\Controllers\Employee\Profi\MnrceAdminEmpAcdProffitional@new_emp_edu_profi');	

		#6 New Work Experience
	Route::get('employee-work-new','App\Http\Controllers\Employee\Work\MnrceAdminEmpWorkExper@index');		
	Route::post('employee-work-new','App\Http\Controllers\Employee\Work\MnrceAdminEmpWorkExper@new_emp_edu_profi');	
	
		#6 New Training
	Route::get('employee-train-new','App\Http\Controllers\Employee\Training\MnrceAdminEmpTrainingController@index');		
	Route::post('employee-train-new','App\Http\Controllers\Employee\Training\MnrceAdminEmpTrainingController@new_emp_training');	
	
		#6 Status
	Route::get('employee-status','App\Http\Controllers\Employee\Status\MnrceAdminEmpStatusController@index');		
	Route::post('employee-status','App\Http\Controllers\Employee\Status\MnrceAdminEmpStatusController@emp_state_change');	

		#7 Designation
				#7.1 Set Designation
	Route::get('employee-designation','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@index');		
	Route::post('employee-designation','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@emp_set_designation');
	
				#7.2 Extend Agreements
	Route::get('employee-extend-agreements','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@index');		
	Route::post('employee-extend-agreements','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@emp_extend_agreement');

				#7.3 Set Promotion
	Route::get('employee-set-promotion','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@index');		
	Route::post('employee-set-promotion','App\Http\Controllers\Employee\Designation\MnrceAdminEmpDesignationController@emp_extend_agreement');


		#8 Division & Location
	Route::get('employee-division','App\Http\Controllers\Employee\Division\MnrceAdminEmpDivisionController@index');		
	Route::post('employee-division','App\Http\Controllers\Employee\Division\MnrceAdminEmpDivisionController@new_emp_division');


		#9 Salary Increment
	Route::get('employee-salary-increment','App\Http\Controllers\Employee\Salary\MnrceAdminSalaryIncrimentController@index');		
	Route::post('employee-salary-increment','App\Http\Controllers\Employee\Salary\MnrceAdminSalaryIncrimentController@new_salary_increment');

		#9 Evaluation
	Route::get('employee-evaluation','App\Http\Controllers\Employee\Evaluation\MnrceAdminEmpEvaluationController@index');		
	Route::post('employee-evaluation','App\Http\Controllers\Employee\Evaluation\MnrceAdminEmpEvaluationController@store');
			
	Route::post('employee-evaluation-receive','App\Http\Controllers\Employee\Evaluation\MnrceAdminEmpEvaluationController@index');		
	Route::post('employee-evaluation-receive','App\Http\Controllers\Employee\Evaluation\MnrceAdminEmpEvaluationController@received');		
	




#==========================================================================================================================#	
	// Leave Module
		#1 Generate
	Route::get('employee-leave-genarate','App\Http\Controllers\Leave\Genarate\MnrceAdminLeaveGenarateController@index');		
	Route::get('employee-leave-genarate-function','App\Http\Controllers\Leave\Genarate\MnrceAdminLeaveGenarateController@genarate_leave');					
	
		#2 Request - user
	Route::get('employee-leave-request','App\Http\Controllers\Leave\Request\MnrceAdminLeaveRequestController@index');		
	Route::post('employee-leave-request','App\Http\Controllers\Leave\Request\MnrceAdminLeaveRequestController@store_leave_request');					
	
		#3 Request - Admin
	Route::get('employee-leave-request-admin','App\Http\Controllers\Leave\Request\MnrceLeaveRequsetAdminController@index');		
	Route::post('employee-leave-request-admin','App\Http\Controllers\Leave\Request\MnrceLeaveRequsetAdminController@store_leave_request_admin');					

		#4 Adjust
	Route::get('employee-leave-adjust','App\Http\Controllers\Leave\Adjust\MnrceAdminLeaveAdjustController@index');		
	Route::post('employee-leave-adjust','App\Http\Controllers\Leave\Adjust\MnrceAdminLeaveAdjustController@store_leave_adjustments');					

		#5 Approve
	Route::get('employee-leave-approve','App\Http\Controllers\Leave\Approve\MnrceAdminLeaveApproveController@index');		
	Route::post('employee-leave-approve','App\Http\Controllers\Leave\Approve\MnrceAdminLeaveApproveController@store_leave_adjustments');					
				
		#6 Book
	Route::get('employee-leave-book','App\Http\Controllers\Leave\Book\MnrceLeaveBookController@index');		
	//Route::post('employee-leave-approve','App\Http\Controllers\Leave\Approve\MnrceAdminLeaveApproveController@store_leave_adjustments');					
		
	
						
#==========================================================================================================================#
	//Report Module
		#1 employee Profile
	Route::match(array('get', 'post'),'employee-profile','App\Http\Controllers\MnrceAdminReportController@employee_profile');		
	
	Route::get('employee-search-profile','App\Http\Controllers\MnrceAdminReportController@employee_search_profile');		
	
		#2 Basic Data
	Route::get('employee-basic-data','App\Http\Controllers\MnrceAdminReportController@employee_basic_data');
	
		#3 Contact Data		
	Route::get('employee-contact-data','App\Http\Controllers\MnrceAdminReportController@employee_contact_data');		
	
		#4 Employee Carder	
	Route::get('employee-carder','App\Http\Controllers\MnrceAdminReportController@employee_carder_data');		
	
		#5 Employee Agreements	
	Route::match(array('get', 'post'),'employee-agreement','App\Http\Controllers\MnrceAdminReportController@employee_agreement_data');		
	
		#6 Leave Balance Data
	Route::match(array('get', 'post'),'employee-leave-balance','App\Http\Controllers\MnrceAdminReportController@employee_leave_balance_data');		
			




#==========================================================================================================================#













