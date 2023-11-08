    <script src="../public/assets/emp/custom/updempbasic.js"></script>

<div class="card-body">
<div class="row">

	<div class="form-group col-md-6">

                      <input type="hidden" id="id1" name="id1" />
                      <input type="hidden" id="id5" name="id5" />
                      <input type="hidden" id="id2" name="id2" />
                      <input type="hidden" id="id3" name="id3" />
                      <input type="hidden" id="id4" name="id4" />
                        <label  for="epf">Select EPF Number<span class="required">*</span>
                        </label>
                         <select id="epf" class="form-control epfselect select2" required name="epf">
                             <option value="">Select EPF No..</option>
									<?php
										$data = DB::table('mnrce_admin_emp_epfs')
																->where('resignDate',null)
																->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
																->orderBy('mnrce_admin_emp_epfs.epf_no', 'ASC')
																->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.nameini')
																->get();
										foreach($data as $key => $value){
											echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->nameini."</option>";											
										}
									?>	                           
                         </select>


	</div>
    <div class="form-group col-md-6">
      <label class="" for="textarea">Appointment Date <span style="color: red;" class="required">*</span>
      </label>

        <input id="adate" type="date" required="required" name="adate" class="form-control">

    </div>
    <div class="form-group col-md-12">
      <label class="" for="name">Full Name <span style="color: red;" class="required">*</span>
      </label>

        <input id="fname" class="form-control" data-validate-length-range="6" data-validate-words="2" name="fname" placeholder="Full Name e.g Rathne Gedara Janaka" required="required" type="text">

    </div>
    <div class="form-group col-md-6">
      <label class="" for="name">Name  With Initial<span style="color: red;" class="required">*</span>
      </label>

        <input id="lname" class="form-control" data-validate-length-range="6" data-validate-words="2" name="Iname" placeholder="Name With Initial e.g R.G. Janaka" required="required" type="text">

    </div>                      
  
    <div class="form-group col-md-6">
      <label class="" for="number">ID Number <span style="color: red;" class="required">*</span>
      </label>

        <input type="text" id="nid" name="nid" required="required" data-validate-minmax="0,10" maxlength="12" class="form-control" placeholder="NID e.g 199127000836/912700836V">

    </div>

    <div class="form-group col-md-6">
      <label class="" for="number">Passport Number <span style="color: red;" class="required"></span>
      </label>

        <input type="text" id="pass" name="pass" data-validate-minmax="0,10" maxlength="11" class="form-control">

    </div>
    <div class="form-group col-md-6">
      <label class="" for="number">Driving License Number <span style="color: red;" class="required"></span>
      </label>

        <input type="text" id="dl" name="dl" data-validate-minmax="0,10" maxlength="11" class="form-control">

    </div>                      
    

       <div class="form-group col-md-6">
      <label class="">Date Of Birth <span style="color: red;" class="required">*</span>
      </label>

        <input id="dob" name="dob" class="form-control" required="required" type="date"
			max="
			<?php 
				echo date('Y-m-d', strtotime('-18 year'));
			?>" 
			value="
			<?php 
				echo date('Y-m-d', strtotime('-18 year'));
			?>"	                          
        >
		</div>
 	
    <div class="form-group col-md-6">
      <label>Pension Date <span style="color: red;" class="required">*</span>
      </label>

        <input type="text" class="form-control" readonly id="pens" /> 

    </div>


   <div class="form-group col-md-6">
      <label class="">Gender <span style="color: red;" class="required">*</span> </label>
                              
                              <select id="male" class="form-control" name="gender" >
											<option value=""></option>                              
											<option value="M">Male</option>                              
											<option value="F">Female</option>                              
                              </select>
    </div>      
   <div class="form-group col-md-6">
      <label class="">Civil Status <span style="color: red;" class="required">*</span> </label>
                              <select class="form-control" id="mary" name="maried" >
											<option value=""></option>                              
											<option value="M">Married</option>                              
											<option value="S">Single</option>                              
                              </select>
    </div>                       

     <div class="form-group col-md-12">
      <label class="" for="textarea">Remark <span class="required"></span>
      </label>

        <textarea id="textarea"  name="remarks" class="form-control"></textarea>
      </div>

	</div>
</div>
