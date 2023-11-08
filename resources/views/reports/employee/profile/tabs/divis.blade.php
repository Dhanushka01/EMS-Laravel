<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Division</th>
       <th>Location</th>
       <th>From</th>
       <th>To</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data12i as $value)
		<?php	
			$loca= $value->locat;		
			
			$data= DB::table('mnrce_admin_master_projects')->where('Pcode', $loca)
						->get();				
		?>
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->Pname}}</td>
		<td>
                				@foreach($data as $value1)
									{{$value1->Pname}}
									@endforeach		
		</td>
		<td>{{$value->effdate}}</td>
		<td>
			@if($value->resdate=='')
				Present
			@else
				{{$value->resdate}}
			@endif	
		</td>
		</tr>
		@endforeach 											                               
   </tbody>

 </table>