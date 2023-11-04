<?php

namespace Ppo\Lab07\ParkingVehicles;

class Car implements ParkingVehicle
{
    public function identify(): string
    {
        return "car";
    }
}
