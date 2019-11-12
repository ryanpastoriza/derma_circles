
<?php

	// echo '<pre>';
	// var_export($transactions);
	// echo '</pre>';

?>

<table class="table table-condensed table-bordered" id="tbl-service-transactions">
	<thead>
		<tr>
			<th>Patient</th>
			<th>Facialist</th>
			<th>Service</th>
			<th>Timestamp</th>
			<!-- <th>Status</th> -->
			<!-- <th></th> -->
		</tr>
	</thead>
	<tbody>
		<?php foreach ($transactions as $key => $value) :?>
		
		<tr>
			<td><?= ucwords($value->firstname.' '.$value->middlename[0].'. '.$value->lastname.' '.$value->suffix); ?></td>
			<td><?= ucwords($value->name); ?></td>
			<td><?= $value->service_name; ?></td>
			<td><?= date('M d, Y', strtotime($value->date_created)); ?></td>
			<!-- <td>ongoing</td> -->
			<!-- <td></td> -->
		</tr>

		<?php endforeach; ?> 
		
	</tbody>
</table>