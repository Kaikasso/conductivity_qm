#ifndef READ_CONDUCTIVITY.h 
#define READ_CONDUCTIVITY.h 

class CONDUCTIVITY
{
	private: 
		int _input;
		char _buffer[1024];

		// static const float MaxVdd;
		// static const float MinVdd;

		static const int ConducSensorMin;
		static const int ConducSensorMax;
		static const int maxSensorUs;
		static const int fourmaOffset; // at 4ma and 0ppm, ADC pin reads this value

	public:
		CONDUCTIVITY(const char *pin);
		float GetConductivity();
		void Close();

};

#endif

