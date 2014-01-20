#!/usr/bin/env python
from bs4 import BeautifulSoup
import requests
import calendar

for year in range(2011, 2015):
  for monthnum in range(1, 13):
    month = calendar.month_name[monthnum]
    tree = BeautifulSoup(requests.get("https://synhak.org/pipermail/discuss/%d-%s/thread.html" % (year, month)).text)
    bTags = tree.find_all('b')
    for b in bTags:
      if b.get_text() == "Messages:":
        messageCount = b.next_sibling
        print "%d %s:\t %s" % (year, month, '#' * (int(messageCount)/5))
