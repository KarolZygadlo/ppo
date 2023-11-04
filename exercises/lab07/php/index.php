<?php

use Ppo\Lab07\ParkingLot;
use Ppo\Lab07\ParkingVehicles\Bike;
use Ppo\Lab07\ParkingVehicles\Car;
use Ppo\Lab07\ParkingVehicles\ParkingVehicle;
use Ppo\Lab07\ParkingVehicles\Truck;

require __DIR__ . "/vendor/autoload.php";

/** @var array<ParkingVehicle> $vehicles */
$vehicles = [
    new Bike(),
    new Car(),
    new Truck(),
    new Car(),
];

$parkingLot = new ParkingLot();

foreach ($vehicles as $vehicle) {
    $parkingLot->letIn($vehicle);
}
