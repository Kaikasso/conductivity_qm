#include "read_conductivity.h"

#include <stdlib.h>
#include <fcntl.h>
#include <stdio.h>
#include <unistd.h>

/// Input voltage
const float CONDUCTIVITY::Vdd = 1.8;

///
const int CONDUCTIVITY::maxSensorUs = 20000;

/// Maximum and minimum values that can be measured
const int CONDUCTIVITY::ConducSensorMin = 0;
const int CONDUCTIVITY::ConducSensorMax = 4096;

/// Handles a Conductivity sensor
/// @param Hardware device to read conductivity from
CONDUCTIVITY::CONDUCTIVITY(const char *pin)
{
	_input = open(pin, O_RDONLY);
}

/// Grabs a temperature measurement
float CONDUCTIVITY::GetConductivity()
{
	// Read the sensor
	int status = read(_input, _buffer, sizeof(_buffer));
	if(status == -1)
	{
		fprintf(stderr, "ERROR: Could not get conductivity measurement.");
		return -999.0f;
	}

	// Reset the sensor
	lseek(_input,0,0); 

	// Convert the string into an integer
	_buffer[status] = '\0';
	int value = atoi(_buffer);

	// Convert the measurement into a conductivity value
	float voltage = ((float) value / (ConducSensorMax - ConducSensorMin + 1) * Vdd);
	float conductivity =  ((float) value / ConducSensorMax * maxSensorUs);

	return conductivity;
}

/// Close conductivity sensor
void CONDUCTIVITY::Close()
{

	if(_input != -1)
	{
		close(_input);
		_input = -1;
	}
}




