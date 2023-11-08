<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Relation</th>
       <th>Name</th>
       <th>NIC</th>
       <th>DOB</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data17 as $value)
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->rel}}</td>
		<td>{{$value->relname}}</td>
		<td>
			@if($value->relnic=='')
				N/A
			@else
				{{$value->relnic}}
			@endif
		</td>
		<td>{{$value->reldob}}</td>
		</tr>
		@endforeach 											                               
   </tbody>

 </table>