<table class="data table table-striped no-margin">
                       	  		<tr>
											<td><i class="fa fa-id-card" aria-hidden="true">&nbsp;</i> Epf No &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->epf_no}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>                       	  	
                       	  		<tr>
											<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Full Name &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->fullname}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>
                       	  		<tr>
											<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Name With Initials &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->nameini}}
												@endforeach   
											</td>  
										</tr>
                       	  		<tr>
											<td><i class="fa fa-id-card" aria-hidden="true">&nbsp;</i> National Id Card&nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->nic}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-passport" aria-hidden="true">&nbsp;</i> Passport Number &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->passport}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-bus" aria-hidden="true">&nbsp;</i> Driving License No&nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->dlicence}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-calendar-alt" aria-hidden="true">&nbsp;</i> Date Of Birth&nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->dob}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-venus-mars" aria-hidden="true">&nbsp;</i> Gender &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
													@if($value->gender=='M')
														Male
													@else
														Female
													@endif		
												
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-user" aria-hidden="true">&nbsp;</i> Civil Status&nbsp;</td>
											<td>									
												@foreach($data1 as $value)
													@if($value->cstatus=='M')
														Married
													@else
														Single
													@endif
												
												@endforeach   
											</td>                       	  		
                       	  		</tr>											                     	  		
                       	  		<tr>
											<td><i class="fa fa-calendar-alt" aria-hidden="true">&nbsp;</i> Appoint Date&nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->appoint_date}}
												@endforeach   
											</td>                       	  		
                       	  		</tr>		
                       	  		<tr>
											<td><i class="fa fa-ring" aria-hidden="true">&nbsp;</i> Current Status &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												
												@if($value->emp_status==1)
													<span class="border border-success rounded-pill" > &nbsp; Available &nbsp; </span>
												@elseif($value->emp_status==2)
													<span class="border border-warning rounded-pill" > &nbsp; Permanent Disabled &nbsp; </span>
												@elseif($value->emp_status==3)
													<span class="border border-primary rounded-pill" > &nbsp; Vacation of Post &nbsp; </span>													
												@elseif($value->emp_status==4)
													<span class="border border-info rounded-pill" > &nbsp; Retired &nbsp; </span>													
												@elseif($value->emp_status==5)
													<span class="border border-secondary rounded-pill" > &nbsp; Interdict &nbsp; </span>																																			
												@elseif($value->emp_status==0)
													<span class="border border-danger rounded-pill" style="color: red;"> &nbsp;Resigned&nbsp; </span>													
												@endif	
												@endforeach   
											</td>                       	  		
                       	  		</tr>                       	  											                     	  		
                       	  		<tr>
												@foreach($data1 as $value)
												@if($value->resignDate)
											<td><i class="fa fa-calendar-alt" aria-hidden="true">&nbsp;</i> Resigned Date&nbsp;</td>
											<td>{{$value->resignDate}}
											</td>                       	  		
                       	  		</tr>												
												@endif	
												@endforeach   
										                     	  		
                             <tr>
											<td><i class="fa fa-sticky-note" aria-hidden="true">&nbsp;</i> Remarks &nbsp;</td>
											<td>									
												@foreach($data1 as $value)
												{{$value->remarks}}
												@if(!$value->remarks)
													-
												@endif	
												@endforeach   
											</td>                       	  		
                       	  		</tr>
                       	  		
                       	  	</table>