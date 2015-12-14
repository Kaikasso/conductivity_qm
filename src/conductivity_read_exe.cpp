#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include "read_conductivity.h"
#include <unistd.h>

int main(int argc, const char *argv[])
{
	double conductivity = 0.0;

	// Initialiaze Conductivity Sensor
	//CONDUCTIVITY sensor("/sys/devices/ocp.2/helper.14/AIN4");
	CONDUCTIVITY sensor("/sys/devices/ocp.3/helper.15/AIN4");

	// read Conductivity and insert into database
	conductivity = sensor.GetConductivity();
	printf("%f\n", conductivity);
	
	// Close the conductivity sensor
	sensor.Close();

	return conductivity;

}


