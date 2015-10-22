#!/bin/bash

echo 0 > /sys/class/gpio/gpio44/value
echo 44 > /sys/class/gpio/unexport

