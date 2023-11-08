$(document).on("keydown", "input", function(e) {
  if (e.which==13) e.preventDefault();
});

 $(document).ready(function(){
 			
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
				
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('focus', '.quantity', function() {
		count++;	
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox" tabindex="-1"></td>';          
		htmlRows += '<td><select name="relation_[]" id="relation_1" class="form-control quantity"><option value="">Select</option><option value="Mother">Mother</option><option value="Father">Father</option><option value="Wife">Wife</option><option value="Husband">Husband</option><option value="Child">Child</option></select></td>';          
		htmlRows += '<td><input type="text" tabindex="-1" name="name_[]" id="name_'+count+'"  class="form-control formit" autocomplete="off"></td>';	
		htmlRows += '<td><input type="text" tabindex="-1" name="nic_[]" id="nic_'+count+'" class="form-control formit" autocomplete="off"></td>';	
		htmlRows += '<td><input type="date"  name="dob_[]" id="dob_'+count+'" class="form-control  formit" autocomplete="off"></td>';   		
		//htmlRows += '<td><button class="btn btn-success" id="addRows" type="button"> Add</button></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		

	
	$(document).on('keypress', ".pcode", function(){
		    var keycode = (event.keyCode ? event.keyCode : event.which);
		    if(keycode == '18'){
		    	
		       $(".formit").attr("tabindex","-1");
		    }
	});	

		

});	



