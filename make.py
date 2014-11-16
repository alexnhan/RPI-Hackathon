#!/usr/bin/python
import sys

commands = ', '.join(sys.argv[1:])
print(commands.replace(', ',"\n"))
