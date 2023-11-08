<table class="data table table-striped no-margin">
   <thead>
     <tr>
       
       <th>#</th>
       <th>Request Date</th>
       <th>Leave Type</th>
       <th>From</th>
       <th>To</th>
       <th>Qty</th>
       <th>Status</th>
       
     </tr>
   </thead>
   <tbody>
		@foreach($data19 as $value)
		<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$value->reqDate}}</td>
		<td>{{$value->leaveType}}</td>
		<td>{{$value->leaveFrom}}</td>
		<td>{{$value->leaveTo}}</td>
		<td>{{$value->leaveQty}}</td>
		<td>
			@if($value->leaveBookStatus=='0')
				<p class='bg-secondary rounded-pill' style="text-align: center;">Requested</p>
			@elseif($value->leaveBookStatus=='1')
				<p class='bg-success rounded-pill' style="text-align: center;" >Approved</p>
			@elseif($value->leaveBookStatus=='2')
				<p class='bg-danger rounded-pill' style="text-align: center;">Canceled</p>				
			@endif	
		</td>		
		</tr>
		@endforeach 											                               
   </tbody>

 </table>