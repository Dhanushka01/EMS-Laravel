                         
                               @if($count3==0)
                               		@if($count5>0)
                             	 			<h4>Grade 5 - Pass</h4>
                              		@else
                              		 <h4>Grade 5 - NA</h4>	 
                              		@endif
                              @endif		
                              
                               @if($count3==0)
                               		@if($count6>0)
                             	 			<h4>Grade 8 - Pass</h4>
                              		@else
                              		 <h4>Grade 8 - NA</h4>	 
                              		@endif
                              @endif                                                         
                                                                                 
                              @if($count3>0)
                              <h4>G.C.E O/L Results</h4>
                               <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Subject</th>
                                  <th>Results</th>
                                  <th>Year</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
											@foreach($data3 as $value)
											<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$value->subject}}</td>
											<td>{{$value->sgrade}}</td>
											<td>{{$value->eyear}}</td>
											</tr>

											
											@endforeach 
                              
                              </tbody>
                            </table>
                            @else
                             <h4>G.C.E O/L Results - NA</h4>
                             @endif
                             
<!----------------------------------------------------------------......................................................... -->       
										@if($count4>0)                     
                             <h4>G.C.E A/L Results</h4>
                               <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Subject</th>
                                  <th>Results</th>
                                  <th>Year</th>

											@foreach($data4 as $value)
											<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$value->subject}}</td>
											<td>{{$value->sgrade}}</td>
											<td>{{$value->eyear}}</td>
											</tr>
											
											
											@endforeach                                  
                                </tr>
                              </thead>
                              <tbody>
                                
                              </tbody>
                            </table>
                            @else
                            	<h4>G.C.E A/L Results - NA</h4>
                            @endif
<!----------------------------------------------------------------......................................................... -->     
										@if($count8>0)                     
                             <h4>Higher Educations</h4>
                               <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                	 <th>#</th>	
                                  <th>Type</th>
                                  <th>Title</th>
                                  <th>Institute</th>
                                  <th>Year</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
											@foreach($data8 as $value)
											<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$value->type}}</td>
											<td>{{$value->title}}</td>
											<td>{{$value->institute}}</td>
											<td>{{$value->year}}</td>
											</tr>
											@endforeach 											                               
                              </tbody>
                            </table>
                            @else
                            	 <h4>Higher Educations - NA</h4>
                            @endif     
                            
<!----------------------------------------------------------------......................................................... -->     
										@if($count9>0)                     
                             <h4>Professional Qualification</h4>
                               <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th>Institute</th>
                                  <th>Registration Date</th>
                                  <th>Expiry Date</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
											@foreach($data9 as $value)
											<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$value->title}}</td>
											<td>{{$value->institute}}</td>
											<td>{{$value->pfrom}}</td>
											<td>{{$value->pto}}</td>
											</tr>
											@endforeach 											                               
                              </tbody>
                            </table>
                            @else
                            	<h4>Professional Qualification - NA</h4>
                            @endif      
                            
<style type="text/css">
h4{
	background-color: #e6e6e6;
	#color: white;
	font-weight: bolder;
}
</style>                                                                                
