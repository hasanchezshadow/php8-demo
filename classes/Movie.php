<?php
declare(strict_types=1);

namespace classes;
class Movie
{
    public function __construct(
        private readonly string $title,
        private readonly int $days_until,
        private readonly string $following_production,
        private readonly string $release_date,
        private readonly string $poster_url,
        private readonly string $overview,
    )
    {
    }

    public function get_until_message(): string
    {
        return match (true) {
            $this->days_until == 0 => '¡Se estrena hoy!',
            $this->days_until == 1 => 'Mañana es el estreno',
            $this->days_until < 7 => 'Se estrena esta semana',
            $this->days_until < 30 => 'Se estrena este mes',
            default => "Quedan $this->days_until días hasta el estreno"
        };
    }

    public static function fetch_and_create_movie(string $api_url): Movie
    {
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);


        return new self(
            $data['title'],
            $data['days_until'],
            $data['following_production']['title'] ?? 'Desconocido',
            $data['release_date'],
            $data['poster_url'],
            $data['overview'],
        );
    }

    public function get_data(): array
    {
        return get_object_vars($this);
    }
}