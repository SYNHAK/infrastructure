#!/bin/sh
# Used on synhak.org to publish files to http://synhak.org/~secretary/

tmpdir=$(mktemp -d)

cd $tmpdir
git clone git://github.com/SYNHAK/synhak-documents.git
git clone git://github.com/SYNHAK/synhak-bylaws.git
cd $tmpdir/synhak-documents/latex/
make
rsync -avz *.pdf --delete /home/secretary/public_html/docs/
cd $tmpdir/synhak-documents/
#mail $(git log --format=%ae -1) <<EOT
#SYNHAK documents have been rebuilt. You may view them at
#http://synhak.org/~secretary/docs/
#EOT

cd $tmpdir/synhak-documents/svg

make
rsync -avz *.pdf *.png *.svg --delete /home/secretary/public_html/docs/images/

cd $tmpdir/synhak-bylaws/
make
cp *.pdf /home/secretary/public_html/docs/

rm -rf $tmpdir
