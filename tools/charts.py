#!/usr/bin/env python
from bs4 import BeautifulSoup
import requests
import calendar

listIndex = BeautifulSoup(requests.get("https://synhak.org/mailman/listinfo").text)
aTags = listIndex.find_all('a')
for listTag in aTags:
  if listTag['href'].startswith("https://synhak.org/mailman/listinfo"):
    listName = listTag['href'].split('/')[-1]
  else:
    continue
  for year in range(2011, 2015):
    for monthnum in range(1, 13):
      month = calendar.month_name[monthnum]
      tree = BeautifulSoup(requests.get("https://synhak.org/pipermail/%s/%d-%s/thread.html" % (listName, year, month)).text)
      bTags = tree.find_all('b')
      for b in bTags:
        if b.get_text() == "Messages:":
          messageCount = b.next_sibling
          print "%s/%d %s:\t %s" % (listName, year, month, '#' * (int(messageCount)/5))
