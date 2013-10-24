#!/bin/sh
cd /srv/phong/phong/
./setup.py build
cp build/scripts-*/phong-su /usr/bin/phong-su
chmod u+s /usr/bin/phong-su
if [ ! -f /usr/bin/phong.py ]; then
  ln -s /srv/phong/run-phong.sh /usr/bin/phong.py
fi
