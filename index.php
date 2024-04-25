<?php
// Using strict types
declare(strict_types=1);

use classes\Movie;

require_once './consts.php';
require_once './functions.php';
require_once './classes/Movie.php';

$next_movie = Movie::fetch_and_create_movie(API_UR);
$next_movie_data = $next_movie->get_data();
$untilMessage = $next_movie->get_until_message();
?>
<html lang="es">
<?php render_template('head', array('title' => $next_movie_data['title'])); ?>
<body>
<?php render_template('main', array(
    'title'          => $next_movie_data['title'],
    'poster_url'     => $next_movie_data['poster_url'],
    'release_date'   => $next_movie_data['release_date'],
    'nextMovieTitle' => $next_movie_data['following_production'],
    'untilMessage'   => $untilMessage
)); ?>
</body>
</html>