<?php
	$config = include('config.php');
	print_r($config['httppath']);
	file_get_contents("http://" . $config['httppath'] . "action.php?a=update&id=" . $_GET['id'] . "&field=" . $_POST['field'] . "&value=" . urlencode($_POST['value']));
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
