DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql', # Add 'postgresql_psycopg2', 'mysql', 'sqlite3' or 'oracle'.
        'NAME': 'spiff',                      # Or path to database file if using sqlite3.
        'USER': '{{spiff_db_user}}',                      # Not used with sqlite3.
        'PASSWORD': '{{spiff_db_password}}',                  # Not used with sqlite3.
        'HOST': '{{spiff_db_host}}',                      # Set to empty string for localhost. Not used with sqlite3.
        'PORT': '',                      # Set to empty string for default. Not used with sqlite3.
        'OPTIONS': {'init_command': 'SET foreign_key_checks = 0;'}
    }
}

STATIC_URL = 'http://static.synhak.org/auth-ui/'

STRIPE_KEY = '{{spiff_stripe_key}}'

LOGIN_REDIRECT_URL = '/auth/'

CORS_ORIGIN_ALLOW_ALL = True
CORS_ALLOW_CREDENTIALS = True
ALLOWED_HOSTS = ['synhak.org']
SECRET_KEY = '{{spiff_secret}}'

MIDDLEWARE_CLASSES = (
    'django.middleware.common.CommonMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'spiff.membership.middleware.JWTAuthMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'corsheaders.middleware.CorsMiddleware',
    'spiff.membership.middleware.AnonymousUserMiddleware',
    # Uncomment the next line for simple clickjacking protection:
    # 'django.middleware.clickjacking.XFrameOptionsMiddleware',
)

LOGGING = {
  'version': 1,
  'disable_existing_loggers': True,
  'filters': {
    'require_debug_false': {
      '()': 'django.utils.log.RequireDebugFalse'
    }
  },
  'formatters': {
    'simple': {
      'format': '%(levelname)s\t%(name)s\t%(message)s'
    }
  },
  'handlers': {
    'mail_admins': {
      'level': 'ERROR',
      'class': 'django.utils.log.AdminEmailHandler'
    },
    'syslog': {
      'level': 'DEBUG',
      'class': 'logging.handlers.SysLogHandler',
      'facility': 'daemon',
      'formatter': 'simple'
    },
    'file': {
      'level': 'DEBUG',
      'class': 'logging.FileHandler',
      'filename': '/tmp/spiff.log',
      'formatter': 'simple'
    }
  },
  'loggers': {
    'django.request': {
      'handlers': ['mail_admins', 'syslog'],
      'level': 'ERROR',
      'propagate': True,
    },
    'spiff': {
      'handlers': ['syslog'],
      'propagate': True,
      'level': 'DEBUG',
    }
  },
}

DEBUG = True
