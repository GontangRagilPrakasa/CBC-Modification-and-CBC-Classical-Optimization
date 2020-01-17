<?php
if(!isset($_GET['rute'])){
	include 'enkripsi.php';
}else{
	switch ($_GET['rute']) {
		case 'pesan':
			include 'enkripsi.php';
			break;
		case 'proses-e':
			include 'proses-e.php';
			break;
		case 'proses-d':
			include 'proses-d.php';
			break;
		case 'dekripsi':
			include 'dekripsi.php';
			break;
		case 'info':
			include 'info.php';
			break;
		case 'open':
			include 'open.php';
			break;
		case 'open-dep':
			include 'open-dep.php';
			break;
		default:
			include 'default.php';
			break;
	}
}
?>
