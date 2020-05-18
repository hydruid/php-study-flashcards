#!/bin/bash

echo "" && echo ""
echo "Enter your MySQL credentials"
echo "Username:"
read USER

echo ""

echo "Password:"
read PASS

echo "" && echo ""

mysqldump -u$USER -p$PASS phpstudyflashcards > phpstudyflashcards.sql

echo "" && echo ""

echo "The above error is safe to ignore, windows is WAYYYYY more insecure then reading in MySQL password in a read variable."

echo "" && echo ""

exit 0

