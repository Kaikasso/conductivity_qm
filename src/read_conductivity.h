#ifndef READ_CONDUCTIVITY.h 
#define READ_CONDUCTIVITY.h 

class CONDUCTIVITY
{
	private: 
		int _input;
		char _buffer[1024];

		static const float Vdd;

		static const int ConducSensorMin;
		static const int ConducSensorMax;
		static const int maxSensorUs;

	public:
		CONDUCTIVITY(const char *pin);
		float GetConductivity();
		void Close();

};

#endif

