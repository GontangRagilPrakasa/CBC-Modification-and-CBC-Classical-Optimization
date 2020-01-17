<?php 
include 'library/import.php';

?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-5">
		 	<div class="panel panel-default">
  				<div class="panel-heading">Hasil</div>
 			 	<div class="panel-body">
   				 	<div class="well well-sm">
   				 	<?php
   				 	$penerima=$_GET['penerima'];
					$subject=$_GET['subject'];
					$kata=$_GET['kata'];
   				 	echo $_GET['penerima'].'<br>';
					echo $_GET['subject'].'<br>';
					echo $_GET['kata'].'<br>';

   				 	?>
					</div>
  				</div>
			</div>
		</div>
	</div>
</div>

