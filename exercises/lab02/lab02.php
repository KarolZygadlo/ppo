<?php

namespace Ppo\Lab02;

class Player
{
    public string $name;
    public ?string $title;
    public int $healthPoints = 100;
    public bool $status;

    public function identify(): string
    {
        return sprintf(
            "[%d] | %s%s",
            $this->healthPoints,
            $this->title ? "{$this->title} " : "",
            $this->name
        );
    }
}

function getRandomName(): string
{
    $names = ["John", "Jim", "Jack", "George", "Kevin"];

    return $names[array_rand($names)];
}

function getRandomStatus(): bool
{
    return mt_rand(0, 1) === 1;
}

function getRandomTitle(): ?string
{

    $titles = [
        "Pvt",
        "PFC",
        "SPC",
        "Cpl",
        "Sgt",
        "SSG",
        "SFC",
        "MSG",
        "1SG",
        "SGM",
        "CSM",
        "SMA",
        "2LT",
        "1LT",
        "CPT",
        "MAJ",
        "LTC",
        "COL",
        "BG",
        "MG",
        "LTG",
        "GEN",
        "GA"
    ];

    return mt_rand(0, 1) === 1 ? $titles[array_rand($titles)] : null;
}

$players = [];
$numberOfPlayers = 30;

for ($i = 0; $i < $numberOfPlayers; $i++) {
    $player = new Player();
    $player->name = getRandomName();
    $player->title = getRandomTitle();
    $player->status = getRandomStatus();
    $players[] = $player;
}

foreach ($players as $player) {
    echo $player->identify() . PHP_EOL;
}
