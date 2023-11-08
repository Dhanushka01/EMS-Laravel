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
		{
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
		if (a7=='') {
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
//======================================================================
var olindex=$('#ino').val();
	if (olindex!='') {
			s1=$('#s1').val();  g1=$('#g1').val();
			s2=$('#s2').val();  g2=$('#g2').val();
			s3=$('#s3').val();  g3=$('#g3').val();
			s4=$('#s4').val();  g4=$('#g4').val();
			s5=$('#s5').val();  g5=$('#g5').val();
			s6=$('#s6').val();  g6=$('#g6').val();
			s7=$('#s7').val();  g7=$('#g7').val();
			s8=$('#s8').val();  g8=$('#g8').val();
			s9=$('#s9').val();  g9=$('#g9').val();
			s10=$('#s10').val();  g10=$('#g10').val();
			y1=$('#year').val(); 
			


			if (s1!='' && g1=='') {
				swal('','Enter Valid Grade For O/L Sinhala Subject','error');
				$("#g1").focus();
				return false;
			}
			 if (s2!='' && g2=='') {
				swal('','Enter Valid Grade For O/L Mathematics Subject','error');
				$("#g2").focus();
				return false;			
			}
			 if (s3!='' && g3=='') {
				swal('','Enter Valid Grade For O/L History Subject','error');
				$("#g3").focus();
				return false;			
			}
			 if (s4!='' && g4=='') {
				swal('','Enter Valid Grade For O/L Religion Subject','error');
				$("#g4").focus();
				return false;			
			}
			 if (s5!='' && g5=='') {
				swal('','Enter Valid Grade For O/L English Subject','error');
				$("#g5").focus();
				return false;			
			}
			 if (s6!='' && g6=='') {
				swal('','Enter Valid Grade For O/L Science Subject','error');
				$("#g6").focus();
				return false;			
			}
			 if (s7!='' && g7=='') {
				swal('','Enter Valid Grade For O/L Optional Subject 1','error');
				$("#g7").focus();
				return false;			
			}						
			 if (s8!='' && g8=='') {
				swal('','Enter Valid Grade For O/L Optional Subject 2','error');
				$("#g8").focus();
				return false;			
			}
			 if (s9!='' && g9=='') {
				swal('','Enter Valid Grade For O/L Optional Subject 3','error');
				$("#g10").focus();
				return false;			
			}
			 if (s10!='' && g10=='') {
				swal('','Enter Valid Grade For O/L Optional Subject 4','error');
				$("#g10").focus();
				return false;			
			}
			 if (y1=='') {
				swal('','Enter Valid Year For O/L Results','error');
				$("#y1").focus();
				return false;			
			}																					
		}
//======================================================================
	var alindex=$('#aindex').val();
	if (alindex!='') {
			s11=$('#s11').val();  g11=$('#g11').val();	
			s12=$('#s12').val();  g12=$('#g12').val();	
			s13=$('#s13').val();  g13=$('#g13').val();	
			s14=$('#s14').val();  g14=$('#g14').val();	
			s15=$('#s15').val();  g15=$('#g15').val();	
			y2=$('#ayear').val(); 
			 if (s15!='' && g15=='') {
				swal('','Enter Valid Grade For A/L Subject 5','error');
				$("#g15").focus();
				return false;			
			}
			 if (s11!='' && g11=='') {
				swal('','Enter Valid Grade For A/L Subject 1','error');
				$("#g11").focus();
				return false;			
			}
			 if (s12!='' && g12=='') {
				swal('','Enter Valid Grade For A/L Subject 2','error');
				$("#g12").focus();
				return false;			
			}
			 if (s13!='' && g13=='') {
				swal('','Enter Valid Grade For A/L Subject 3','error');
				$("#g13").focus();
				return false;			
			}
			 if (s14!='' && g14=='') {
				swal('','Enter Valid Grade For A/L Subject 4','error');
				$("#g14").focus();
				return false;			
			}															
			 if (y2=='') {
				swal('','Enter Valid Year For A/L Results','error');
				$("#y12").focus();
				return false;			
			}
						
		}			
												
	}
	
//======================================================================	
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
		 {
			//alert('ERRR');
			$.ajax({
				type:'GET',
				data:{epf:epf},
				//dataType: 'json',
				url:'check-employee-epf-no',
				success:function (result) {
						if (result=='ERROR') {
							swal('EPF Number Duplicated','','error');
							}
				}	
			});
			
		}
		
	});
});
		