#include "read_conductivity.h"

#include <stdlib.h>
#include <fcntl.h>
#include <stdio.h>
#include <unistd.h>
#include <cmath>

/// Input voltage
// const float CONDUCTIVITY::MaxVdd = 1.8;  // Maximum input voltage into the ADC pin
// const float CONDUCTIVITY::MinVDD = 0.36; // Minimun input voltage into the ADC pin --> Using 90 Ohm resistor,
										 // Hence, 90*0.004 A = 0.36 V.///
const int CONDUCTIVITY::maxSensorUs = 4995;
const int CONDUCTIVITY::fourmaOffset = 360;	// 4ma, or sensor at 0 ppm is equal to 360 ADC pin read.

/// Maximum and minimum values that can be measured
const int CONDUCTIVITY::ConducSensorMin = 360;
const int CONDUCTIVITY::ConducSensorMax = 4096;  // This *should* be maximum value associated to a ADC pin...

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
	//float conductivity = (((float) (value - fourmaOffset)/(ConducSensorMax-ConducSensorMin))*maxSensorUs)*(100/39.2);
	float conductivity = floor(((((float) (value - fourmaOffset)/(ConducSensorMax-ConducSensorMin))*maxSensorUs)*(100/39.2)*10)+0.5)/10;
	//conductivity = floor(conductivity*10+0.5)/10;
	//conductivity =  roundf(conductivity * 100) / 100; 
	//printf("Conductivity: %f ", conductivity);

	return (int)conductivity;
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




