<?php
// Using strict types
declare(strict_types=1);
const API_UR = 'https://whenisthenextmcufilm.com/api';

function get_data(string $url): array {
# Starting new cURL session; ch = cURL handler
    $ch = curl_init($url);
// Indicar que queremos recibir el resultado de l apeticion y no mostrarlo en pantalla.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*
     * Ejecutar la peticion y
     * guardar el resultado
    */
    $result = curl_exec($ch);

// una alternativa seria usar file_get_contents
//$result = file_get_contents(API_UR); // solo si quieres hacer get de la api

    $data = json_decode($result, true);

    curl_close($ch);

    return $data;
}

function get_until_message(int $days_until): string {
    return match (true) {
        $days_until == 0 => '¡Se estrena hoy!',
        $days_until == 1 => 'Mañana es el estreno',
        $days_until < 7  => 'Se estrena esta semana',
        $days_until < 30 => 'Se estrena este mes',
        default          => "Quedan $days_until días hasta el estreno"
    };
}

$data = get_data(API_UR);
$untilMessage = get_until_message($data['days_until']);
?>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css.pico.classless.min.css">
    <style>
        :root {
            color-scheme: dark light;
        }
        body {
            display: grid;
            place-content: center;
        }
        section {
            display: flex;
            justify-content: center;
            text-align: center;
        }
        hgroup {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <section>
            <img
                    src="<?=$data['poster_url'];?>"
                    alt="Poster de <?=$data['title'];?>"
                    width="200"
                    style="border-radius: 16px"
            />
        </section>
        <hgroup>
            <h3>
                <?=$data['title'];?> - <?=$untilMessage;?>
                <p>Fecha de estreno: <?=$data['release_date']?></p>
                <p>La siguiente es: <?=$data['following_production']['title'];?></p>
            </h3>
        </hgroup>
    </main>
</body>
</html>