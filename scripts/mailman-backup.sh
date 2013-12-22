#!/bin/sh
DATE=`date +%F`
TEMP=`mktemp -d`

cd /var/lib/mailman/
tar cf $TEMP/mailman-$DATE.tar -W lists/ archives/private/*.mbox
xz -z < $TEMP/mailman-$DATE.tar > $TEMP/mailman-$DATE.tar.bz2

s3cmd put $TEMP/mailman-$DATE.tar.bz2 s3://backup-storage.synhak.org/mailman/
