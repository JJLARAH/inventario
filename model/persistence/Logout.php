<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<style type="text/css">
    html,
    body {
        background-color: black;
    }
</style>

<body>
</body>

</html>

<script type="text/javascript">
	window.location.href = '/inventario/index.php';
	alert("HASTA PRONTO!");
</script>

<?php

session_destroy();
exit();

?>