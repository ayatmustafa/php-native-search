<?php

use App\Repositories\DummyRepository;
use App\Repositories\GitRepository;
use App\Services\DataAdapterService;

require __DIR__.'/vendor/autoload.php';

//for use data from api
$data_service = new DataAdapterService(new GitRepository);
$response = $data_service->gitRepositories($_POST);
//for use dummy data 
$data_service = new DataAdapterService(new DummyRepository);
//$response = $data_service->gitRepositories($_POST);
?>
<table   class="table thead-dark table-striped table-bordered mt-5">
	<tr  class="table-primary">
		<th>id</th>
		<th>name</th>
		<th>full_name</th>
		<th>language</th>
	</tr>
	<?php 
		foreach($response['items'] as $row)
		{
			$id = $row['id'];
			$name = $row['name'];
			$full_name = $row['full_name'];
			$language = $row['language'];
			?>
			<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $full_name ?></td>
				<td><?php echo $language ?></td>
			</tr>
			<?php
		}
	?>
	
</table>