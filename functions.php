<?php
// Using strict types
declare(strict_types=1);

function render_template(string $template, array $data) {
    extract($data);
    require "./templates/$template.php";
}

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