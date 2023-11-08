$(document).ready(function(){	
		$('#desig').change(function(){
		var epf=$('#desig').val();
		if(epf==''||epf==-1){
			swal("Please Enter  Valid Designation");	
		}
		 {
			//alert('ERRR');
			$.ajax({
				type:'GET',
				data:{epf:epf},
				//dataType: 'json',
				url:'/ajaxmdesig',
				success:function (result) {
						if (result=='ERROR') {
							//swal('Designation Already Exits','','error');
							alert('Designation Already Exits');
							}
				}	
			});
			
		}
		
	});
});