#!/bin/sh
#echo "#!bin/sh" > /usr/bin/bootup_script.sh

#This script must be run at bootup

# Enable ADC ports
#echo cape-bone-iio > /sys/devices/bone_capemgr.*/slots
echo cape-bone-iio | tee -a /sys/devices/bone_capemgr.*/slots

# Run C++ program 
#echo ~/conductivity_BBB/scripts/condToDatabase 
#echo "/home/conductivity_BBB/scripts/condToDatabase" >> /usr/bin/bootup_script.sh

chmod u+x /usr/bin/bootup_script.sh
~/conductivity_BBB/src/condToDatabase

