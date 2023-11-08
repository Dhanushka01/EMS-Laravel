<table class="data table table-striped no-margin">
<?php
	$data181 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Birth')->count();	
	$data182 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','NIC_Copy')->count();	
	$data183 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Driving_License')->count();	
	$data184 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Passport')->count();	
	$data185 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','GCE_O/L')->count();	
	$data186 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','GCE_A/L')->count();	
	$data187 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Diploma')->count();	
	$data188 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Higher_Diploma')->count();	
	$data189 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Degree')->count();	
	$data1810 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','MSC')->count();	
	$data1811 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','PHD')->count();	
	$data1812 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Police')->count();	
	$data1813 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','GS')->count();	
	$data1814 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','Service_Letters')->count();	
	$data1815 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->where('certaficate','EPF_B_Card')->count();	
?>
   <tbody>
		<tr>
		<td>1</td>
		<td>Birth Certificate</td>
		@if($data181==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<tr>
		<td>2</td>
		<td>NIC Copy</td>
		@if($data182==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<tr>
		<td>3</td>
		<td>Driving License</td>
		@if($data183==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<tr>
		<td>4</td>
		<td>Passport</td>
		@if($data184==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<tr>
		<td>5</td>
		<td>GCE O/L</td>
		@if($data185==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<tr>
		<td>6</td>
		<td>GCE A/L</td>
		@if($data186==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>7</td>
		<td>Diploma</td>
		@if($data187==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>8</td>
		<td>Higher Diploma</td>
		@if($data188==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>9</td>
		<td>Degree</td>
		@if($data189==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>10</td>
		<td>M.Sc</td>
		@if($data1810==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>11</td>
		<td>PhD</td>
		@if($data1811==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>12</td>
		<td>Police Report</td>
		@if($data1812==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>13</td>
		<td>GN Certificate</td>
		@if($data1813==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>14</td>
		<td>Service Letter</td>
		@if($data1814==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>	
		<td>15</td>
		<td>B Card</td>
		@if($data1815==1)
			<td style="text-align: left;"><i class="fa fa-check" style="color: green;"  aria-hidden="true"></i></td>
		@else
			<td style="text-align: left;"><i class="fa fa-times" style="color: red;"  aria-hidden="true"></i></td>
		@endif	
		</tr>			
																							                               
   </tbody>

 </table>