$(document).ready(function(){	
		$('#desig').val('');	
		$('#divi').val('');	
		$('#locat').val('');
		$('#save').hide();
			
	$('#epf').change(function(){
		$('#desig').val('');	
		$('#divi').val('');	
		$('#locat').val('');	
		var epf=$('#epf').val();

		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-designation-by-epf-id',
				success:function (result) {
					$('#desig').val(result[0]['name']);
				}
			});
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-division-by-epf-id',
				success:function (result1) {
					$('#divi').val(result1[0]['Pname']);
				}
			});
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-location-by-epf-id',
				success:function (result1) {
					$('#locat').val(result1[0]['Pname']);
				}
			});						
		}

	});
	
	$('#ltype').change(function(){
		$('#bal').val('');	
		$('#qty').removeAttr('disabled','disabled');
		var epf=$('#epf').val();
		var ltype=$('#ltype').val();

		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{epf:epf,ltype:ltype},
				dataType: 'json',
				url:'get-ajax-leave-count-by-epf-id',
				success:function (result) {
					$('#bal').val(result);
					if (result<=0) {
						if(ltype=='AL' ||ltype=='CL' ||ltype=='AL-Old' ||ltype=='CL-N'){
							$('#qty').attr('disabled','disabled');	
							swal('Try Again','All Leaves are used','error');							
						}
						else {
							$('#qty').removeAttr('disabled','disabled');
						}
					}
				}
			});						
		}
		
	});	

	$('#qty').change(function(){
		$('#save').show();
		var ltype=$('#ltype').val();
		var bal=$('#bal').val();
		var qty=$('#qty').val();
		var b1=bal-qty;
		if (b1<0) {
			if(ltype=='AL' ||ltype=='CL' ||ltype=='AL-Old' ||ltype=='CL-N'){
				swal('Try Again','Leaves balance is going to negative','error');
				$('#save').hide();
			}
			else {
				$('#save').show();
			}
		}		
	});	
	
});

//======================================================================