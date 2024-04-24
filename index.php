<?php
// Using strict types
declare(strict_types=1);
require_once './consts.php';
require_once './functions.php';


$data = get_data(API_UR);
$untilMessage = get_until_message($data['days_until']);
?>
<html lang="es">
<?php render_template('head', array('title' => $data['title'])); ?>
<body>
<?php render_template('main', array(
        'title' => $data['title'],
        'poster_url' => $data['poster_url'],
        'release_date' => $data['release_date'],
        'nextMovieTitle' => $data['following_production']['title'],
        'untilMessage' => $untilMessage
)); ?>
</body>
</html>