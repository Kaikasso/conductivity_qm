#include <mysql.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

#include "read_conductivity.h"
#include <unistd.h>

/// Prints out a MySQL error message and exits
//
// Function should be called after MySQL error has been encountered. This function will then
// notify the user of the error that has ocurred, clean up the existing MySQL connection, and then
// exit the program.
//
// @param The MySQL connection to clean up before exiting
void error_exit(MYSQL *con)
{
	fprintf(stderr, "%s\n", mysql_error(con));

	if (con != NULL)
	{
		mysql_close(con);
	}

	exit(1);

}

int main(int argc, const char *argv[])
{
	// Initialize a connection to MySQL
	MYSQL *con = mysql_init(NULL);
	if(con == NULL)
	{
		error_exit(con);
	}

	// Connect to MySQL
	// Here we pass in:
	// host name => localhost
	// user name => bone
	// password => bone
	// database name > TempDB
	if(mysql_real_connect(con,"localhost","bone","bone","TempDB",0,NULL,0) == NULL)
	{
		error_exit(con);
	}

	// Create the Conductivity Measurement database (if it doesn't exist already)
	if(mysql_query(con, "CREATE TABLE IF NOT EXISTS ConducMeasure(MeasureTime DATETIME, Conductivity DOUBLE)"))
	{
		error_exit(con);
	}

	// Initialize a MySQL statement
	MYSQL_STMT *stmt = mysql_stmt_init(con);
	if(stmt == NULL)
	{
		error_exit(con);
	}

	// Set out insert query as the MySQL statement
	const char *query = "INSERT INTO ConducMeasure(MeasureTime, Conductivity) VALUES(NOW(), ?)";
	if(mysql_stmt_prepare(stmt, query, strlen(query)))
	{
		error_exit(con);
	}

	// Create the MySQL bind structure to store the data that we are going to insert
	double conductivity = 0.0;
	MYSQL_BIND bind;
	memset(&bind, 0, sizeof(bind));
	bind.buffer_type = MYSQL_TYPE_DOUBLE;
	bind.buffer = (char *)&conductivity;
	bind.buffer_length = sizeof(double);

	// Bind the data structure to the MySQL statement
	if (mysql_stmt_bind_param(stmt, &bind))
	{
		error_exit(con);
	}

	// Initialiaze Conductivity Sensor
	CONDUCTIVITY sensor("/sys/devices/ocp.2/helper.14/AIN4");

	// read Conductivity and insert into database
	conductivity = sensor.GetConductivity();
	printf("%f\n", conductivity);
	mysql_stmt_execute(stmt);

	// Insert multiple records into the database with different data each time
	/*for(int i = 0; i < 1; i++)
	{
		conductivity = sensor.GetConductivity();
		printf("%f\n", conductivity);
		mysql_stmt_execute(stmt);
		sleep(5);
	}*/

	// Close the conductivity sensor
	sensor.Close();

	// Close the MySQL connection
	mysql_close(con);

	return conductivity;

}


