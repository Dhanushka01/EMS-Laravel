 <script src="../public/assets/emp/custom/empformvalidate.js"></script>    
    
<div class="card-body">
<div class="row">

	<div class="form-group col-md-6">
    <label class="" for="name">EPF Number<span style="color: red;" class="">*</span></label>

        <input id="epf" class="form-control" name="epf" required type="number" placeholder="EPF Number e.g. 2181" min="1" >

	</div>
    <div class="form-group col-md-6">
      <label class="" for="textarea">Appointment Date <span style="color: red;" class="required">*</span>
      </label>

        <input id="adate" type="date" required="required" name="textarea" class="form-control">

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

        <input type="text" id="mid" name="nid" required="required" data-validate-minmax="0,10" maxlength="12" class="form-control" placeholder="NID e.g 199127000836/912700836V">

    </div>

    <div class="form-group col-md-6">
      <label class="" for="number">Passport Number 
      </label>

        <input type="text" id="" name="pass"  data-validate-minmax="0,10" maxlength="11" class="form-control">

    </div>
    <div class="form-group col-md-6">
      <label class="" for="number">Driving License Number 
      </label>

        <input type="text" id="" name="dl" data-validate-minmax="0,10" maxlength="11" class="form-control">

    </div>                      

       <div class="form-group col-md-6">
      <label class="">Date Of Birth <span style="color: red;" class="required">*</span>
      </label>

        <input id="dob" name="dob" class="form-control" required="required" type="date"
			max="
			<?php 
				date('Y-m-d', strtotime('-18 years'));
			?>" 
			value="
			<?php 
				date('Y-m-d', strtotime('-18 years'));
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
       <div class="btn-group btn-group-toggle" data-toggle="buttons">
         <label class="btn btn-secondary active">
           <input type="radio" name="gender" id="option_a3" autocomplete="off" value="M" checked> Male
         </label>
         <label class="btn btn-secondary">
           <input type="radio" name="gender" id="option_a4" autocomplete="off"  value="F"> Female
         </label>
       </div>
    </div>      
   <div class="form-group col-md-6">
      <label class="">Civil Status <span style="color: red;" class="required">*</span> </label>
       <div class="btn-group btn-group-toggle" data-toggle="buttons">
         <label class="btn btn-secondary">
           <input type="radio" name="maried" id="option_a1" autocomplete="off" value="M"> Married
         </label>
         <label class="btn btn-secondary active">
           <input type="radio" name="maried" id="option_a2" autocomplete="off" checked value="S"> Single
         </label>
       </div>
    </div>                       

     <div class="form-group col-md-12">
      <label class="" for="textarea">Remark
      </label>

        <textarea id="textarea"  name="remarks" class="form-control"></textarea>
      </div>

	</div>
</div>
