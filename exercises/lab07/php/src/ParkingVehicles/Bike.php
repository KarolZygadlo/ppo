<?php

namespace Ppo\Lab07\ParkingVehicles;

class Bike implements ParkingVehicle
{
    public function identify(): string
    {
        return "bike";
    }
}
