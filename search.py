#!/usr/bin/python
import sys

commands = ', '.join(sys.argv[1:])
search = commands.replace(', ',"\n")

contents = []
with open('text', 'r') as fin:
	contents.append(fin.read())

matching = []
if any(search in s for s in contents):
	matching.append("1")
print(matching)
