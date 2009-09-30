#ifndef EXTRUDER_H
#define EXTRUDER_H

#include "WProgram.h"

void init_extruder();

void read_quadrature();

void enable_motor_1();
void disable_motor_1();
void reverse_motor_1();

void cancellable_delay(unsigned int duration, byte state);

void enable_motor_2();
void disable_motor_2();

void enable_fan();
void disable_fan();

void open_valve();
void close_valve();

byte is_tool_ready();

void set_temperature(int temp);
int sample_temperature(byte pin);

void manage_temperature();

void manage_motor1_speed();

#endif // EXTRUDER_H
