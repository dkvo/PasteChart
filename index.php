<?php
namespace Hw3;
session_start();
session_destroy();
unset($_SESSION);
header('Location: '.'/Hw3/views/landing.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>index.php</title>
</head>
<body>

</body>
</html>