<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Type</th>
       <th>Category</th>
       <th>Designation</th>
       <th>From</th>
       <th>To</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data14 as $value)
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->empType}}</td>
		<td>{{$value->EmpCat}}</td>
		<td>{{$value->name}}</td>
		<td>{{$value->effDate}}</td>
		<td>
			@if($value->revDate=='')
				Present
			@else
				{{$value->revDate}}
			@endif	
		</td>
		</tr>
		@endforeach 											                               
   </tbody>

 </table>