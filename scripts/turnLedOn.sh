#!/bin/bash


echo 44 > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio44/direction
echo 1 > /sys/class/gpio/gpio44/value

sleep 4

echo 0 > /sys/class/gpio/gpio44/value
echo 44 > /sys/class/gpio/unexport

