<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Date</th>
       <th>Postponed</th>
       <th>Increment</th>
       <th>Next Inc.</th>
       <th>Ref</th>
       <th>Remarks</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data16 as $value)
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->edate}}</td>
		<td>{{$value->post}}</td>
		<td>{{$value->inc}}</td>
		<td>{{$value->nxtdate}}</td>
		<td>{{$value->ref}}</td>
		<td>{{$value->remark}}</td>
		</tr>
		@endforeach 											                               
   </tbody>

 </table>