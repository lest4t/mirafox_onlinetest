<?php
/**
 * Date: 11/12/18
 * Time: 11:59 PM
 * Author: lest4t
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/styles.css">
	<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
	<title><?= Config::get('site_name'); ?></title>
</head>
<body>

<?= $data['content']; ?>

</body>
</html>
