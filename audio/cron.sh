#!/bin/sh
cd /opt/lampp/htdocs/amr_simulation/audio
find . -type d -regex "\./user_.*" -exec rm -rf {} \;
