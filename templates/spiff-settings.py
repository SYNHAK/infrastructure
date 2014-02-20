DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql', # Add 'postgresql_psycopg2', 'mysql', 'sqlite3' or 'oracle'.
        'NAME': 'spiff',                      # Or path to database file if using sqlite3.
        'USER': '{{spiff_db_user}}',                      # Not used with sqlite3.
        'PASSWORD': '{{spiff_db_password}}',                  # Not used with sqlite3.
        'HOST': '{{spiff_db_host}}',                      # Set to empty string for localhost. Not used with sqlite3.
        'PORT': '',                      # Set to empty string for default. Not used with sqlite3.
    }
}

STATIC_URL = '/auth/static/'

STRIPE_KEY = '{{spiff_stripe_key}}'

LOGIN_REDIRECT_URL = '/auth/'

XS_SHARING_ALLOWED_ORIGINS = ','.join(['http://static.synhak.org', 'http://live.synhak.org', 'https://synhak.org'])
XS_SHARING_ALLOWED_METHODS = ['POST', 'GET', 'OPTIONS', 'PUT', 'DELETE']
