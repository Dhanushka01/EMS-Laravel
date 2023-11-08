<table class="data table table-striped no-margin">
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Address &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->add1}}
			@endforeach										
		</td>                          	
  	</tr>
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Grama Niladhari &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->grama}},
			@endforeach										
		</td>                          	
  	</tr> 
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Polling DS &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->divisiona}},
			@endforeach										
		</td>                          	
  	</tr>  
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> DS &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->add3}},
			@endforeach										
		</td>                          	
  	</tr>                          	
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> District &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->districk}},
			@endforeach										
		</td>                          	
  	</tr>    
  	<tr>
		<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Province &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->province}},
			@endforeach										
		</td>                          	
  	</tr>                          	
  	<tr>
		<td><i class="fa fa-phone" aria-hidden="true">&nbsp;</i> Mobile &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->mobile1}},
			@endforeach										
		</td>                          	
  	</tr>
  	<tr>
		<td><i class="fa fa-tty" aria-hidden="true">&nbsp;</i> Home &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->homephone}},
			@endforeach										
		</td>                          	
  	</tr>  
  	<tr>
		<td><i class="fa fa-at" aria-hidden="true">&nbsp;</i> Email &nbsp;</td>                          	
		<td>
			@foreach($data2 as $value)
			{{$value->email}},
			@endforeach										
		</td>                          	
  	</tr>                        	                          	                      	                        	                         	
  	</table>
  	
  	
   	<h3>Emergency Contact Details</h3>
  	<table class="data table table-striped no-margin">
  		@foreach($data7 as $value)
  			<tr>
  			<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> 
  			Contact Name</td><td>{{$value->conname}}</td>
  			</tr>
  			<tr>
  			<td> <i class="fa fa-phone" aria-hidden="true">&nbsp;</i>
  			Contact Phone</td><td>{{$value->conmobile}}</td>
  			</tr>
  			<tr>
  			<td><i class="fa fa-at" aria-hidden="true">&nbsp;</i> 
  			Contact Address</td><td>{{$value->conaddress}}</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		@endforeach                          	
  	</table>   