<div class="card-body">
	<div class="row">
  		<div class="form-group col-md-12">
      <label  for="textarea">Permanent Address <span style="color: red;" class="required">*</span>
      </label>
      <input type="text" id="a1" name="pa" placeholder="Address" class="form-control" required>

		</div>
		<div class="form-group col-md-4">
      <label  for="textarea">Grama Niladhari <span style="color: red;" class="required">*</span>
      </label>
     
      <input type="text" id="a4" name="gn" placeholder="GN Division" data-validate-length-range="8,20" axlength="10" 
      class="form-control" required>                       
      </div>     
                         
		<div class="form-group col-md-4">
      <label  for="textarea">Divisional Secretary's Division <span style="color: red;" class="required">*</span>
      </label>
      
      <input type="text" id="a5" name="ds" placeholder="DS Division" data-validate-length-range="8,20" axlength="10" 
      class="form-control" required>
                         
      </div>     
      
		<div class="form-group col-md-4">
      <label  for="textarea">Polling Division <span style="color: red;" class="required">*</span>
      </label>
      
      <input type="text" id="ele" name="pd" placeholder="Electrate Division" data-validate-length-range="8,20" axlength="10" 
      class="form-control" required>
                         
      </div>   
                                                 
		<div class="form-group col-md-6"> 
    	<select id="a6" class="form-control"  name="a6" placeholder="District" required>
			<option value="">Select a District</option>  
			
			<option value=""  disabled>---Central Province---</option> 
				<option value="Kandy">Kandy</option>
				<option value="Matale">Matale</option>
				<option value="NuwaraEliya">NuwaraEliya</option>
				
			<option value=""  disabled>---Eastern Province---</option> 
				<option value="Ampara">Ampara</option>
				<option value="Batticaloa">Batticaloa</option>
				<option value="Trincomalee">Trincomalee</option>
				                 	
			<option value=""  disabled>---North Central Province---</option> 
				<option value="Anuradhapura">Anuradhapura</option>
				<option value="Polonnaruwa">Polonnaruwa</option>
 	
			<option value=""  disabled>---Northern Province---</option> 
				<option value="Jaffna">Jaffna</option>
				<option value="Kilinochchi">Kilinochchi</option>
				<option value="Mannar">Mannar</option>
				<option value="Mullaitivu">Mullaitivu</option> 
				<option value="Vavuniya">Vavuniya</option>
				              	
  				<option value=""  disabled>---North Western Province---</option>
  					<option value="Kurunegala">Kurunegala</option>
  					<option value="Puttalam">Puttalam</option>

				                 	
			<option value=""  disabled>---Sabaragamuwa Province---</option>  
				<option value="Kegalle">Kegalle</option>  
				<option value="Ratnapura">Ratnapura</option>
				             	
			<option value=""  disabled>---Southern Province---</option>  
				<option value="Galle">Galle</option>
				<option value="Hambantota">Hambantota</option>
				<option value="Matara">Matara</option>
			                 					                 	
			<option value=""  disabled>---Uva Province---</option>
				<option value="Badulla">Badulla</option>
				<option value="Monaragala">Monaragala</option>
				                  	
			<option value=""  disabled>---Western Province---</option>
				<option value="Colombo">Colombo</option> 
				<option value="Gampaha">Gampaha</option> 
				<option value="Kalutara">Kalutara</option>
			                 		
    	</select>
	</div>
	<div class="form-group col-md-6"> 
     
		<select name="a7" id="a7" class="form-control">
			<option value="">Select a Province</option>
			<option value="Western">1: Western</option>
			<option value="Central">2: Central</option>
			<option value="Southern">3: Southern</option>
			<option value="Northern">4: Northern</option>
			<option value="Eastern">5: Eastern</option>
			<option value="North-Western">6: North-Western</option>
			<option value="North-Central">7: North-Central</option>
			<option value="Uva">8: Uva</option>
			<option value="Sabaragamuwa">9: Sabaragamuwa</option>
		</select>                      
    </div>                      
  
    <div class="form-group col-md-12">
      <label  for="telephone">Current Residence Address  
      </label>

        <input type="text" id="temadd" name="temadd"  data-validate-length-range="8,20" axlength="10" class="form-control">
      </div>

    <div class="form-group col-md-4">
      <label  for="telephone">Mobile Number  <span style="color: red;" class="required">*</span>
      </label>

        <input type="tel" id="mobile1" name="phone" required="required" maxlength="10" min="0110000000" data-validate-length-range="8,20" axlength="10" class="form-control">
      </div>

    
    <div class="form-group col-md-4">
      <label  for="telephone">Mobile Number 
      </label>

        <input type="tel" id="mobile2" name="phone2" maxlength="10"  data-validate-length-range="8,20" axlength="10" class="form-control">
      </div>

    <div class="form-group col-md-4">
      <label  for="telephone">Telephone No: 
      </label>

        <input type="tel" id="telephone" name="tel"  data-validate-length-range="8,20" axlength="10" class="form-control">
      </div>


    <div class="form-group col-md-12">
      <label  for="email">Email 
      </label>

        <input type="email" id="email" name="email"  class="form-control">
      </div>


<!--.........................................Emergency Contact Details.........................................................................................-->


</div>
	<div class="row">
		<div class="form-group col-md-12">
	    <span class="line"> <h3><b>Emergency Contacts<span style="color: red;" class="required">*</span> </b> </h3> </span>
	 </div>
	</div> 
	 <div class="row">   
       <div class="form-group col-md-4">

        <input id="en1" class="form-control"  name="ename" placeholder="Name" required='' type="text">
      </div>
      <div class="form-group col-md-3">

        <input id="em1" class="form-control"  name="etel" placeholder="Mobile" required='' type="text">
      </div>

       <div class="form-group col-md-5">

        <input id="ea1" class="form-control"  name="eadd" placeholder="Address" required='' type="text">
      </div>
    </div>
    <div class="row">  
          <div class="form-group col-md-4">
        
        <input id="en2" class="form-control"  name="ename2" placeholder=" Name" required='' type="text">
      </div>
      <div class="form-group col-md-3">
     
        <input id="em2" class="form-control"  name="etel2" placeholder="Mobile" required='' type="text">
      </div>

       <div class="form-group col-md-5">
    
        <input id="ea2" class="form-control"  name="eadd2" placeholder="Address" required='' type="text">
      </div>
	</div>	
</div>

