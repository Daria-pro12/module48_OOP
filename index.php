<?php

interface VehicleInterface
{
    public function interior();

    public function powerOn();

    public function powerOff();

    public function moveForward();

    public function moveBackward();

    public function signal();

    public function wipers();

    public function specialAbility();

}

abstract class Vehicle implements VehicleInterface
{
    protected $interior;
    protected $signalSong;
    protected $name;

    public function __construct($name, $interior)
    {
        $this->name = $name;
        $this->interior = $interior;
    }

    public function interior()
    {
        echo ("<pre>" . "$this->name имеет $this->interior салон\n");
    }

    public function powerOn()
    {
        echo ("Двигатель запушен\n");
    }

    public function powerOff()
    {
        echo ("Двигатель остановлен\n");
    }

    public function moveForward()
    {
        echo ("Движение вперед\n");
    }

    public function moveBackward()
    {
        echo ("Движение назад\n");
    }

    public function signal()
    {
        echo "Сигнал $this->signalSong\n";
    }

    public function wipers()
    {
        echo ("Дворники включены\n");
    }

    abstract public function specialAbility();
}

class Car extends Vehicle
{
    protected $signalSong = "beep beep";
    public function specialAbility()
    {
        echo ("Закись азота\n");
    }
}

class Bulldozer extends Vehicle
{
    protected $signalSong = "Boom";
    public function specialAbility()
    {
        echo ("Управление ковшом\n");
    }
}


function driveVehicle(VehicleInterface $vehicle)
{
    $vehicle->interior();
    $vehicle->powerOn();
    $vehicle->moveForward();
    $vehicle->specialAbility();
    $vehicle->signal();
    $vehicle->wipers();
    $vehicle->powerOff();
}

// Example usage:
$car = new Car("Tayota", "кожаный");
$bulldozer = new Bulldozer("Bulldozer", "тканевый");

driveVehicle($car);
driveVehicle($bulldozer);