<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Title</th>
       <th>Location</th>
       <th>Conductor</th>
       <th>From</th>
       <th>To</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data15 as $value)
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->ttitle}}</td>
		<td>{{$value->tlocat}}</td>
		<td>{{$value->tcond}}</td>
		<td>{{$value->sdate}}</td>
		<td>{{$value->edate}}</td>
		</tr>
		@endforeach 											                               
   </tbody>

 </table>