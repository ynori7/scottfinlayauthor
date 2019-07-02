#!/bin/bash
cat components/bootstrap/dist/css/bootstrap.min.css css/main.css > combined.css
java -jar yuicompressor-2.4.8.jar combined.css -o css/combined.css
rm combined.css

cat components/jquery/dist/jquery.min.js components/bootstrap/dist/js/bootstrap.min.js > js/combined.js
