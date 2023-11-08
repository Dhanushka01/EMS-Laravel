$(document).ready(function(){	
			$('#name').val('');
			$('#nid').val('');
			$('#adress').val('');
		$('#epf').change(function(){
			$('#name').val('');
			$('#nid').val('');
			$('#adress').val('');			
		var epf=$('#epf').val();

		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {
			//alert('ERRR');
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'/ajaxdesig',
				success:function (result) {
					$('#name').val(result[0]['fullname']);
					$('#nid').val(result[0]['nic']);
					//$('#adress').val(result[0]['dob']);
				}	
			});
			
		}
		
	});
});

//======================================================================