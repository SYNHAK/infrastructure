#!/usr/bin/env python
import requests

for i in range(1, 7000):
  ret = requests.get("https://synhak.org/w/index.php?oldid=%s" % i)
  print "Got code %s for edit id %s" % (ret.status_code, i)
