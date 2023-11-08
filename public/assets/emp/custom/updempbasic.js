$(document).ready(function(){	

		$('#epf').change(function(){
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
				url:'get-employee-personal-data',
				success:function (result) {
					$('#id1').val(result[0]['emp_id']);
					$('#id5').val(result[0]['id']);
					
					$('#fname').val(result[0]['fullname']);
					$('#lname').val(result[0]['nameini']);
					$('#nid').val(result[0]['nic']);
					$('#pass').val(result[0]['passport']);
					$('#dl').val(result[0]['dlicence']);
					$('#dob').val(result[0]['dob']);
					$('#pens').val(result[0]['pen_date']);
					$('#adate').val(result[0]['appoint_date']);
					$('#textarea').val(result[0]['remarks']);
					$('#male').val(result[0]['gender']);  
					$('#male').val(result[0]['gender']);  
					$('#mary').val(result[0]['cstatus']);  

				}	
			});
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-employee-contact-data',
				success:function (result1) {
					$('#id2').val(result1[0]['id']);	
					$('#a1').val(result1[0]['add1']);	
					$('#a4').val(result1[0]['grama']);	
					$('#a5').val(result1[0]['divisiona']);	
					$('#ele').val(result1[0]['add3']);	
					$('#a6').val(result1[0]['districk']);	
					$('#a7').val(result1[0]['province']);	
					$('#temadd').val(result1[0]['tempadd']);	
					$('#mobile1').val(result1[0]['mobile1']);	
					$('#mobile2').val(result1[0]['mobile2']);	
					$('#telephone').val(result1[0]['homephone']);	
					$('#email').val(result1[0]['email']);	
				}	
			});			

			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-employee-emergence-contact-data',
				success:function (result2) {
					$('#id3').val(result2[0]['id']);	
					$('#en1').val(result2[0]['conname']);	
					$('#em1').val(result2[0]['conmobile']);	
					$('#ea1').val(result2[0]['conaddress']);
						
					$('#id4').val(result2[1]['id']);	
					$('#en2').val(result2[1]['conname']);	
					$('#em2').val(result2[1]['conmobile']);	
					$('#ea2').val(result2[1]['conaddress']);	
				}
			});			
		}
		
	});
});

//======================================================================.
	function validateForm() {
		var epf = $('#epf').val();
		if (epf=='') {
			swal('','Enter Valid EPF','error');
			$("#epf").focus();
			return false;
		}

//======================================================================
		var fname = $('#fname').val();
		if (fname=='') {
			swal('','Enter Valid Employee Full Name','error');
			$("#fname").focus();
			return false;
		}
		

//======================================================================
		var lname = $('#lname').val();
		if (lname=='') {
			swal('','Enter valid Employee name with initials ','error');
			$("#lname").focus();
			return false;
		}		


//======================================================================
		var  nid= $('#nid').val();
		if (nid=='') {
			swal('','Enter Valid Nationa ID card Number','error');
			$("#nid").focus();
			return false;
		}	


//======================================================================
		var  dob= $('#dob').val();
		if (dob=='') {
			swal('','Enter Valid Birth Date','error');
			$("#dob").focus();
			return false;
		}
		else{
			var submitDate=new Date(dob);
			var today = new Date();
			var curYear =today.getFullYear();
			var submitYear = submitDate.getFullYear();
			var maxYear = curYear-18;		
			if (maxYear>curYear) {
				swal('','Enter Valid Birth Date','error');
				$("#dob").focus();
				return false;					
			}
		}

//======================================================================
		var  adate= $('#adate').val();
		if (adate=='') {
			swal('','Enter Valid Appointment Date','error');
			$("#adate").focus();
			return false;
		}			

//**************************************************************************
		var  a1= $('#a1').val();
		if (a1=='') {
			swal('','Enter Valid Home Number','error');
			$("#a").focus();
			return false;
		}			
		

//======================================================================
		var  a2= $('#a2').val();
		if (a2=='') {
			swal('','Enter Valid Street Name','error');
			$("#a2").focus();
			return false;
		}
		

//======================================================================
		var  a3= $('#a3').val();
		if (a3=='') {
			swal('','Enter Valid City','error');
			$("#a3").focus();
			return false;
		}			

//======================================================================
		var  a4= $('#a4').val();
		if (a4=='') {
			swal('','Enter Valid GS Division','error');
			$("#a4").focus();
			return false;
		}	
//======================================================================
		var  a4= $('#a5').val();
		if (a5=='') {
			swal('','Enter Valid Division','error');
			$("#a5").focus();
			return false;
		}	
//======================================================================
		var  a6= $('#a6').val();
		if (a6=='') {
			swal('','Enter Valid District','error');
			$("#a6").focus();
			return false;
		}					
//======================================================================
		var  a7= $('#a7').val();
		if (a4=='') {
			swal('','Enter Valid Province','error');
			$("#a7").focus();
			return false;
		}	

//======================================================================
		var  mobile1 = $('#mobile1').val();
		if (mobile1=='') {
			swal('','Enter Valid Contatct Number','error');
			$("#mobile1").focus();
			return false;
		}			

//----------------------------------------------------------------------------
		var  en1= $('#en1').val();
		if (en1=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#en1").focus();
			return false;
		}	
//======================================================================
		var  em1= $('#em1').val();
		if (em1=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#em1").focus();
			return false;
		}	
//======================================================================
		var  ea1= $('#ea1').val();
		if (ea1=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#ea1").focus();
			return false;
		}					
//======================================================================	
		var  en2= $('#en2').val();
		if (en2=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#en2").focus();
			return false;
		}	
//======================================================================
		var  em2= $('#em2').val();
		if (em2=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#em2").focus();
			return false;
		}	
//======================================================================
		var  ea2= $('#ea2').val();
		if (ea2=='') {
			swal('','Enter Valid Emergency Contact','error');
			$("#ea2").focus();
			return false;
		}	
												
	}
	
$( document ).ready(function() {
	$('#pens').val('');
    $('#dob').change(function(){
    	var dob = $('#dob').val();
    	
		var d = new Date(dob);
		var amountOfYearsRequired = 60;
		var a = d.setFullYear(d.getFullYear() + amountOfYearsRequired);
		//alert(new Date(a));
		var b= new Date(a);
  		$('#pens').val(b);
    })
});

//======================================================================


$(document).ready(function(){	
		$('#epf').change(function(){
		var epf=$('#epf').val();
		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {
			//alert('ERRR');
			$.ajax({
				type:'GET',
				data:{epf:epf},
				//dataType: 'json',
				url:'check-employee-epf-id',
				success:function (result) {
						if (result!='ERROR') {
							swal('EPF Number Not Found','','error');
							}
				}	
			});
			
		}
		
	});
});
	