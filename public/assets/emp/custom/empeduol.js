//======================================================================

$(document).ready(function(){	
		$('#save').hide();
		$('#ino').change(function(){
		var epf=$('#epf').val();
		var ino=$('#ino').val();
		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {
			//alert('ERRR');
			$.ajax({
				type:'GET',
				data:{epf:epf,ino:ino},
				//dataType: 'json',
				url:'/ajaxeduol',
				success:function (result) {
					if (result=='Error') {
						swal('Try Again','Index Number Already Exist !!!','error');
						$('#save').hide();
					}
					else {
						$('#save').show();
					}
				}	
			});
			
		}
		
	});
});