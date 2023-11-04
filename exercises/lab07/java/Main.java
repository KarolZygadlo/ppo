import lab07.ParkingLot;
import lab07.ParkingVehicles.Bike;
import lab07.ParkingVehicles.Car;
import lab07.ParkingVehicles.ParkingVehicle;
import lab07.ParkingVehicles.Truck;

public class Main {
  public static void main(String[] args) {
	ParkingVehicle[] vehicles = {
		new Bike(),
		new Car(),
		new Truck(),
		new Car(),
	};

	ParkingLot parkingLot = new ParkingLot();

	for(ParkingVehicle vehicle : vehicles) {
		parkingLot.letIn(vehicle);
	}
  }
}
