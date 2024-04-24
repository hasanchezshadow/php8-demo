<?php
// Using strict types
declare(strict_types=1);
require_once './consts.php';
require_once './functions.php';



$data = get_data(API_UR);
$untilMessage = get_until_message($data['days_until']);
?>
<html lang="es">
<?php require_once './sections/head.php' ?>
<body>
<?php require_once './sections/main.php' ?>
</body>
</html>