$( document ).ready(function() {

	$('#amount').change(function(){
		var rate= $('#rate').val();	
		var plan = $('#plan').val();	
		var amount= $('#amount').val();	
		


		if(rate==''||rate==-1){
			swal("Please Enter  valid interest rate !!!");	
		}
		if(plan==''||plan==-1){
			swal("Please Enter  valid loan payment plan !!!");	
		}
		if(amount==''||amount==-1){
			swal("Please Enter  valid loan amount !!!");	
		}				
		else {
			$.ajax({
				type:'GET',
				data:{rate:rate,plan:plan,amount:amount},
				dataType: 'json',
				url:'/ajaxGetPMTfunction',
				success:function (result) {
					$('#inst').val(result);
					//alert(result);
				}
			});						
		}

	});
});

$( document ).ready(function() {

	$('#rate').change(function(){
		var rate= $('#rate').val();	
		var plan = $('#plan').val();	
		var amount= $('#amount').val();	
		


		if(rate==''||rate==-1){
			swal("Please Enter  valid interest rate !!!");	
		}
		if(plan==''||plan==-1){
			swal("Please Enter  valid loan payment plan !!!");	
		}
		if(amount==''||amount==-1){
			swal("Please Enter  valid loan amount !!!");	
		}				
		else {
			$.ajax({
				type:'GET',
				data:{rate:rate,plan:plan,amount:amount},
				dataType: 'json',
				url:'/ajaxGetPMTfunction',
				success:function (result) {
					$('#inst').val(result);
					//alert(result);
				}
			});						
		}

	});
});

$( document ).ready(function() {

	$('#plan').change(function(){
		var rate= $('#rate').val();	
		var plan = $('#plan').val();	
		var amount= $('#amount').val();	
		


		if(rate==''||rate==-1){
			swal("Please Enter  valid interest rate !!!");	
		}
		if(plan==''||plan==-1){
			swal("Please Enter  valid loan payment plan !!!");	
		}
		if(amount==''||amount==-1){
			swal("Please Enter  valid loan amount !!!");	
		}				
		else {
			$.ajax({
				type:'GET',
				data:{rate:rate,plan:plan,amount:amount},
				dataType: 'json',
				url:'/ajaxGetPMTfunction',
				success:function (result) {
					$('#inst').val(result);
					//alert(result);
				}
			});						
		}

	});
});



