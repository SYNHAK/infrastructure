from Defaults import *
import pwd, grp

MAILMAN_UID = pwd.getpwnam('mailman')[2]
MAILMAN_GID = grp.getgrnam('mailman')[2]
DEFAULT_URL_PATTERN = 'http://%s/mailman/'
DEFAULT_URL_HOST = 'synhak.org'
DEFAULT_EMAIL_HOST = 'synhak.org'
add_virtualhost(DEFAULT_URL_HOST, DEFAULT_EMAIL_HOST)
PUBLIC_ARCHIVE_URL = 'http://synhak.org/pipermail/%(listname)s'
VIRTUAL_HOST_OVERVIEW = False
MTA = 'Postfix'
POSTFIX_STYLE_VIRTUAL_DOMAINS = [ 'synhak.org' ]
IMAGE_LOGOS = '/mm-icons/'

