<?php return array (
  'app' => 
  array (
    'name' => 'Insulink Kenya Ltd',
    'env' => 'production',
    'debug' => false,
    'url' => 'https://insulink.co.ke',
    'asset_url' => NULL,
    'timezone' => 'Africa/Nairobi',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:jPDTWLGPka60Lg927hn8Qcxt9ZiuAiXT3XZAf8mwWu4=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'EloquentFilter\\ServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\ComposerServiceProvider',
      26 => 'App\\Providers\\EventServiceProvider',
      27 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'auth.password.tokens' => 'Illuminate\\Auth\\Passwords\\TokenRepositoryInterface',
      'Countries' => 'Monarobase\\CountryList\\CountryListFacade',
    ),
    'debug_blacklist' => 
    array (
      '_ENV' => 
      array (
        0 => 'APP_KEY',
        1 => 'ADMIN_DIR',
        2 => 'DB_DATABASE',
        3 => 'DB_USERNAME',
        4 => 'DB_PASSWORD',
        5 => 'REDIS_PASSWORD',
        6 => 'MAIL_PASSWORD',
        7 => 'PUSHER_APP_KEY',
        8 => 'PUSHER_APP_SECRET',
      ),
      '_SERVER' => 
      array (
        0 => 'APP_KEY',
        1 => 'ADMIN_DIR',
        2 => 'DB_DATABASE',
        3 => 'DB_USERNAME',
        4 => 'DB_PASSWORD',
        5 => 'REDIS_PASSWORD',
        6 => 'MAIL_PASSWORD',
        7 => 'PUSHER_APP_KEY',
        8 => 'PUSHER_APP_SECRET',
      ),
      '_POST' => 
      array (
        0 => 'password',
      ),
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
      'customer' => 
      array (
        'driver' => 'session',
        'provider' => 'customers',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'Botble\\ACL\\Models\\User',
      ),
      'customers' => 
      array (
        'driver' => 'eloquent',
        'model' => 'Botble\\Quotation\\Providers\\Customer',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'beautymail' => 
  array (
    'colors' => 
    array (
      'highlight' => '#004ca3',
      'button' => '#004cad',
    ),
    'view' => 
    array (
      'senderName' => NULL,
      'reminder' => NULL,
      'unsubscribe' => NULL,
      'address' => NULL,
      'logo' => 
      array (
        'path' => '%PUBLIC%/images/logo.png',
        'width' => '',
        'height' => '',
      ),
      'twitter' => NULL,
      'facebook' => NULL,
      'flickr' => NULL,
    ),
  ),
  'blade-ui-kit' => 
  array (
    'components' => 
    array (
      'alert' => 'BladeUIKit\\Components\\Alerts\\Alert',
      'avatar' => 'BladeUIKit\\Components\\Support\\Avatar',
      'carbon' => 'BladeUIKit\\Components\\DateTime\\Carbon',
      'checkbox' => 'BladeUIKit\\Components\\Forms\\Inputs\\Checkbox',
      'color-picker' => 'BladeUIKit\\Components\\Forms\\Inputs\\ColorPicker',
      'countdown' => 'BladeUIKit\\Components\\DateTime\\Countdown',
      'cron' => 'BladeUIKit\\Components\\Support\\Cron',
      'dropdown' => 'BladeUIKit\\Components\\Navigation\\Dropdown',
      'easy-mde' => 'BladeUIKit\\Components\\Editors\\EasyMDE',
      'email' => 'BladeUIKit\\Components\\Forms\\Inputs\\Email',
      'error' => 'BladeUIKit\\Components\\Forms\\Error',
      'form' => 'BladeUIKit\\Components\\Forms\\Form',
      'form-button' => 'BladeUIKit\\Components\\Buttons\\FormButton',
      'html' => 'BladeUIKit\\Components\\Layouts\\Html',
      'input' => 'BladeUIKit\\Components\\Forms\\Inputs\\Input',
      'label' => 'BladeUIKit\\Components\\Forms\\Label',
      'logout' => 'BladeUIKit\\Components\\Buttons\\Logout',
      'mapbox' => 'BladeUIKit\\Components\\Maps\\Mapbox',
      'markdown' => 'BladeUIKit\\Components\\Markdown\\Markdown',
      'password' => 'BladeUIKit\\Components\\Forms\\Inputs\\Password',
      'pikaday' => 'BladeUIKit\\Components\\Forms\\Inputs\\Pikaday',
      'social-meta' => 'BladeUIKit\\Components\\Layouts\\SocialMeta',
      'textarea' => 'BladeUIKit\\Components\\Forms\\Inputs\\Textarea',
      'toc' => 'BladeUIKit\\Components\\Markdown\\ToC',
      'trix' => 'BladeUIKit\\Components\\Editors\\Trix',
      'unsplash' => 'BladeUIKit\\Components\\Support\\Unsplash',
    ),
    'livewire' => 
    array (
    ),
    'prefix' => '',
    'assets' => 
    array (
      'alpine' => 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js',
      'easy-mde' => 
      array (
        0 => 'https://unpkg.com/easymde/dist/easymde.min.css',
        1 => 'https://unpkg.com/easymde/dist/easymde.min.js',
      ),
      'mapbox' => 
      array (
        0 => 'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css',
        1 => 'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js',
      ),
      'moment' => 
      array (
        0 => 'https://cdn.jsdelivr.net/npm/moment@2.26.0/moment.min.js',
        1 => 'https://cdn.jsdelivr.net/npm/moment-timezone@0.5.31/builds/moment-timezone-with-data.min.js',
      ),
      'pickr' => 
      array (
        0 => 'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css',
        1 => 'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',
      ),
      'pikaday' => 
      array (
        0 => 'https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css',
        1 => 'https://cdn.jsdelivr.net/npm/pikaday/pikaday.js',
      ),
      'trix' => 
      array (
        0 => 'https://unpkg.com/trix@1.2.3/dist/trix.css',
        1 => 'https://unpkg.com/trix@1.2.3/dist/trix.js',
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'useTLS' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/boaz/Sites/digitalcms/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => NULL,
        'secret' => NULL,
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'insulink_kenya_ltd_cache',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'nikodigi',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '8889',
        'database' => 'nikodigi',
        'username' => 'root',
        'password' => 'root',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '8889',
        'database' => 'nikodigi',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '8889',
        'database' => 'nikodigi',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'insulink_kenya_ltd_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'eloquentfilter' => 
  array (
    'namespace' => 'App\\ModelFilters\\',
    'paginate_limit' => 15,
  ),
  'filesystems' => 
  array (
    'default' => 'public',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/boaz/Sites/digitalcms/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/Users/boaz/Sites/digitalcms/storage/app/public',
        'url' => 'https://insulink.co.ke/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
        'endpoint' => NULL,
      ),
      'do_spaces' => 
      array (
        'driver' => 's3',
        'visibility' => 'public',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'endpoint' => NULL,
      ),
    ),
    'links' => 
    array (
      '/Users/boaz/Sites/digitalcms/public/storage' => '/Users/boaz/Sites/digitalcms/storage/app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'daily',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/boaz/Sites/digitalcms/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/boaz/Sites/digitalcms/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/Users/boaz/Sites/digitalcms/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'in-v3.mailjet.com',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'd508ed6d3130f94a25bf02fb47a79617',
        'password' => 'f5491be730c438e2c66bf344d94f05fc',
        'timeout' => NULL,
        'auth_mode' => NULL,
      ),
      'mailjet' => 
      array (
        'key' => NULL,
        'secret' => NULL,
        'transactional' => 
        array (
          'call' => true,
          'options' => 
          array (
            'url' => 'api.mailjet.com',
            'version' => 'v3.1',
            'call' => true,
            'secured' => true,
          ),
        ),
        'common' => 
        array (
          'call' => true,
          'options' => 
          array (
            'url' => 'api.mailjet.com',
            'version' => 'v3',
            'call' => true,
            'secured' => true,
          ),
        ),
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
    ),
    'from' => 
    array (
      'address' => 'info@insulink.co.ke',
      'name' => 'Insulink Kenya Ltd',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/boaz/Sites/digitalcms/resources/views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => NULL,
        'secret' => NULL,
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'suffix' => NULL,
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'facebook' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => 'https://insulink.co.ke/auth/callback/facebook',
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => 'https://insulink.co.ke/auth/callback/google',
    ),
    'github' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => 'https://insulink.co.ke/auth/callback/github',
    ),
    'linkedin' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => 'https://insulink.co.ke/auth/callback/linkedin',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/Users/boaz/Sites/digitalcms/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'botble_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/boaz/Sites/digitalcms/resources/views',
    ),
    'compiled' => '/Users/boaz/Sites/digitalcms/storage/framework/views',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => '/Users/boaz/Sites/digitalcms/storage/fonts/',
      'font_cache' => '/Users/boaz/Sites/digitalcms/storage/fonts/',
      'temp_dir' => '/var/folders/1x/8fv0w2jd0031jm4_d2zntnmw0000gq/T',
      'chroot' => '/Users/boaz/Sites/digitalcms',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'core' => 
  array (
    'base' => 
    array (
      'general' => 
      array (
        'admin_dir' => 'admin',
        'default-theme' => 'default',
        'base_name' => 'Insulink Kenya Ltd',
        'logo' => '/vendor/core/core/base/images/logo_white.png',
        'favicon' => '/vendor/core/core/base/images/favicon.png',
        'editor' => 
        array (
          'ckeditor' => 
          array (
            'js' => 
            array (
              0 => '/vendor/core/core/base/libraries/ckeditor/ckeditor.js',
            ),
          ),
          'tinymce' => 
          array (
            'js' => 
            array (
              0 => '/vendor/core/core/base/libraries/tinymce/tinymce.min.js',
            ),
          ),
          'primary' => 'ckeditor',
        ),
        'error_reporting' => 
        array (
          'to' => NULL,
          'via_slack' => false,
          'ignored_bots' => 
          array (
            0 => 'googlebot',
            1 => 'bingbot',
            2 => 'slurp',
            3 => 'ia_archiver',
          ),
        ),
        'enable_https_support' => false,
        'date_format' => 
        array (
          'date' => 'Y-m-d',
          'date_time' => 'Y-m-d H:i:s',
          'js' => 
          array (
            'date' => 'yyyy-mm-dd',
            'date_time' => 'yyyy-mm-dd H:i:s',
          ),
        ),
        'cache_site_map' => false,
        'public_single_ending_url' => NULL,
        'send_mail_using_job_queue' => false,
        'locale' => 'en',
        'can_execute_command' => true,
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'System',
          'flag' => 'core.system',
        ),
      ),
      'assets' => 
      array (
        'offline' => true,
        'enable_version' => false,
        'version' => 1616366107,
        'scripts' => 
        array (
          0 => 'respond',
          1 => 'excanvas',
          2 => 'ie8-fix',
          3 => 'modernizr',
          4 => 'select2',
          5 => 'datepicker',
          6 => 'cookie',
          7 => 'core',
          8 => 'app',
          9 => 'toastr',
          10 => 'pace',
          11 => 'custom-scrollbar',
          12 => 'stickytableheaders',
          13 => 'jquery-waypoints',
          14 => 'spectrum',
          15 => 'fancybox',
        ),
        'styles' => 
        array (
          0 => 'fontawesome',
          1 => 'simple-line-icons',
          2 => 'select2',
          3 => 'pace',
          4 => 'toastr',
          5 => 'custom-scrollbar',
          6 => 'datepicker',
          7 => 'spectrum',
          8 => 'fancybox',
        ),
        'resources' => 
        array (
          'scripts' => 
          array (
            'core' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/js/core.js',
              ),
            ),
            'app' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/js/app.js',
              ),
            ),
            'modernizr' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/modernizr/modernizr.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js',
              ),
            ),
            'respond' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/respond.min.js',
              ),
            ),
            'excanvas' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/excanvas.min.js',
              ),
            ),
            'ie8-fix' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/ie8.fix.min.js',
              ),
            ),
            'counterup' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/counterup/jquery.counterup.min.js',
                ),
              ),
            ),
            'jquery-validation' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/jquery-validation/jquery.validate.min.js',
                  1 => '/vendor/core/core/base/libraries/jquery-validation/additional-methods.min.js',
                ),
              ),
            ),
            'blockui' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery.blockui.min.js',
              ),
            ),
            'jquery-ui' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-ui/jquery-ui.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
              ),
            ),
            'cookie' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-cookie/jquery.cookie.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js',
              ),
            ),
            'jqueryTree' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'include_style' => true,
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-tree/jquery.tree.min.js',
              ),
            ),
            'bootstrap-editable' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap3-editable/js/bootstrap-editable.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js',
              ),
            ),
            'toastr' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/toastr/toastr.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.js',
              ),
            ),
            'pace' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/pace/pace.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
              ),
            ),
            'fancybox' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/fancybox/jquery.fancybox.min.js',
                'cdn' => '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',
              ),
            ),
            'datatables' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/datatables/media/js/jquery.dataTables.min.js',
                  1 => '/vendor/core/core/base/libraries/datatables/media/js/dataTables.bootstrap.min.js',
                  2 => '/vendor/core/core/base/libraries/datatables/extensions/Buttons/js/dataTables.buttons.min.js',
                  3 => '/vendor/core/core/base/libraries/datatables/extensions/Buttons/js/buttons.bootstrap.min.js',
                ),
              ),
            ),
            'raphael' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/raphael-min.js',
                ),
              ),
            ),
            'morris' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/morris/morris.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
              ),
            ),
            'select2' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/select2/js/select2.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
              ),
            ),
            'cropper' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/cropper.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/cropper/0.7.9/cropper.min.js',
              ),
            ),
            'datepicker' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
              ),
            ),
            'sortable' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/sortable/sortable.min.js',
              ),
            ),
            'custom-scrollbar' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/mcustom-scrollbar/jquery.mCustomScrollbar.js',
              ),
            ),
            'stickytableheaders' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/stickytableheaders/jquery.stickytableheaders.js',
              ),
            ),
            'equal-height' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jQuery.equalHeights/jquery.equalheights.min.js',
              ),
            ),
            'are-you-sure' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery.are-you-sure/jquery.are-you-sure.js',
              ),
            ),
            'moment' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/moment-with-locales.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js',
              ),
            ),
            'datetimepicker' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js',
              ),
            ),
            'jquery-waypoints' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-waypoints/jquery.waypoints.min.js',
              ),
            ),
            'colorpicker' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
              ),
            ),
            'timepicker' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
              ),
            ),
            'spectrum' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/spectrum/spectrum.js',
              ),
            ),
            'input-mask' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-inputmask/jquery.inputmask.bundle.min.js',
              ),
            ),
            'form-validation' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/js-validation/js/js-validation.js',
              ),
            ),
          ),
          'styles' => 
          array (
            'fontawesome' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/font-awesome/css/fontawesome.min.css',
                'cdn' => '//use.fontawesome.com/releases/v5.0.13/css/all.css',
              ),
            ),
            'simple-line-icons' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/simple-line-icons/css/simple-line-icons.css',
              ),
            ),
            'core' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/css/core.css',
              ),
            ),
            'jqueryTree' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-tree/jquery.tree.min.css',
              ),
            ),
            'jquery-ui' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/jquery-ui/jquery-ui.min.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.theme.css',
              ),
            ),
            'toastr' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/toastr/toastr.min.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.css',
              ),
            ),
            'pace' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/pace/pace-theme-minimal.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.css',
              ),
            ),
            'kendo' => 
            array (
              'use_cdn' => false,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/kendo/kendo.min.css',
              ),
            ),
            'datatables' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/datatables/media/css/dataTables.bootstrap.min.css',
                ),
              ),
            ),
            'bootstrap-editable' => 
            array (
              'use_cdn' => true,
              'location' => 'footer',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap3-editable/css/bootstrap-editable.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css',
              ),
            ),
            'morris' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/morris/morris.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css',
              ),
            ),
            'datepicker' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
              ),
            ),
            'select2' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => 
                array (
                  0 => '/vendor/core/core/base/libraries/select2/css/select2.min.css',
                  1 => '/vendor/core/core/base/libraries/select2/css/select2-bootstrap.min.css',
                ),
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css',
              ),
            ),
            'fancybox' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/fancybox/jquery.fancybox.min.css',
                'cdn' => '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css',
              ),
            ),
            'custom-scrollbar' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/mcustom-scrollbar/jquery.mCustomScrollbar.css',
              ),
            ),
            'datetimepicker' => 
            array (
              'use_cdn' => true,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css',
                'cdn' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css',
              ),
            ),
            'colorpicker' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
              ),
            ),
            'timepicker' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
              ),
            ),
            'spectrum' => 
            array (
              'use_cdn' => false,
              'location' => 'header',
              'src' => 
              array (
                'local' => '/vendor/core/core/base/libraries/spectrum/spectrum.css',
              ),
            ),
          ),
        ),
      ),
    ),
    'setting' => 
    array (
      'general' => 
      array (
        'driver' => 'database',
        'cache' => 
        array (
          'enabled' => false,
        ),
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Settings',
          'flag' => 'settings.options',
          'parent_flag' => 'core.system',
        ),
        1 => 
        array (
          'name' => 'Email',
          'flag' => 'settings.email',
          'parent_flag' => 'settings.options',
        ),
        2 => 
        array (
          'name' => 'Media',
          'flag' => 'settings.media',
          'parent_flag' => 'settings.options',
        ),
      ),
      'email' => 
      array (
        'name' => 'core/setting::setting.email.template_title',
        'description' => 'core/setting::setting.email.template_description',
        'templates' => 
        array (
          'header' => 
          array (
            'title' => 'core/setting::setting.email.template_header',
            'description' => 'core/setting::setting.email.template_header_description',
          ),
          'footer' => 
          array (
            'title' => 'core/setting::setting.email.template_footer',
            'description' => 'core/setting::setting.email.template_footer_description',
          ),
        ),
      ),
    ),
    'acl' => 
    array (
      'general' => 
      array (
        'activations' => 
        array (
          'expires' => 259200,
          'lottery' => 
          array (
            0 => 2,
            1 => 100,
          ),
        ),
        'backgrounds' => 
        array (
          0 => 'vendor/core/core/acl/images/backgrounds/1.jpg',
          1 => 'vendor/core/core/acl/images/backgrounds/2.jpg',
          2 => 'vendor/core/core/acl/images/backgrounds/3.jpg',
          3 => 'vendor/core/core/acl/images/backgrounds/4.jpg',
          4 => 'vendor/core/core/acl/images/backgrounds/5.jpg',
          5 => 'vendor/core/core/acl/images/backgrounds/6.jpg',
          6 => 'vendor/core/core/acl/images/backgrounds/7.jpg',
        ),
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Users',
          'flag' => 'users.index',
          'parent_flag' => 'core.system',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'users.create',
          'parent_flag' => 'users.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'users.edit',
          'parent_flag' => 'users.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'users.destroy',
          'parent_flag' => 'users.index',
        ),
        4 => 
        array (
          'name' => 'Roles',
          'flag' => 'roles.index',
          'parent_flag' => 'core.system',
        ),
        5 => 
        array (
          'name' => 'Create',
          'flag' => 'roles.create',
          'parent_flag' => 'roles.index',
        ),
        6 => 
        array (
          'name' => 'Edit',
          'flag' => 'roles.edit',
          'parent_flag' => 'roles.index',
        ),
        7 => 
        array (
          'name' => 'Delete',
          'flag' => 'roles.destroy',
          'parent_flag' => 'roles.index',
        ),
      ),
    ),
    'media' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Media',
          'flag' => 'media.index',
        ),
        1 => 
        array (
          'name' => 'File',
          'flag' => 'files.index',
          'parent_flag' => 'media.index',
        ),
        2 => 
        array (
          'name' => 'Create',
          'flag' => 'files.create',
          'parent_flag' => 'files.index',
        ),
        3 => 
        array (
          'name' => 'Edit',
          'flag' => 'files.edit',
          'parent_flag' => 'files.index',
        ),
        4 => 
        array (
          'name' => 'Trash',
          'flag' => 'files.trash',
          'parent_flag' => 'files.index',
        ),
        5 => 
        array (
          'name' => 'Delete',
          'flag' => 'files.destroy',
          'parent_flag' => 'files.index',
        ),
        6 => 
        array (
          'name' => 'Folder',
          'flag' => 'folders.index',
          'parent_flag' => 'media.index',
        ),
        7 => 
        array (
          'name' => 'Create',
          'flag' => 'folders.create',
          'parent_flag' => 'folders.index',
        ),
        8 => 
        array (
          'name' => 'Edit',
          'flag' => 'folders.edit',
          'parent_flag' => 'folders.index',
        ),
        9 => 
        array (
          'name' => 'Trash',
          'flag' => 'folders.trash',
          'parent_flag' => 'folders.index',
        ),
        10 => 
        array (
          'name' => 'Delete',
          'flag' => 'folders.destroy',
          'parent_flag' => 'folders.index',
        ),
      ),
      'media' => 
      array (
        'sizes' => 
        array (
          'thumb' => '150x150',
        ),
        'permissions' => 
        array (
          0 => 'folders.create',
          1 => 'folders.edit',
          2 => 'folders.trash',
          3 => 'folders.destroy',
          4 => 'files.create',
          5 => 'files.edit',
          6 => 'files.trash',
          7 => 'files.destroy',
          8 => 'files.favorite',
          9 => 'folders.favorite',
        ),
        'libraries' => 
        array (
          'stylesheets' => 
          array (
            0 => 'vendor/core/core/media/libraries/jquery-context-menu/jquery.contextMenu.min.css',
            1 => 'vendor/core/core/media/css/media.css?v=1616366107',
          ),
          'javascript' => 
          array (
            0 => 'vendor/core/core/media/libraries/lodash/lodash.min.js',
            1 => 'vendor/core/core/media/libraries/clipboard/clipboard.min.js',
            2 => 'vendor/core/core/media/libraries/dropzone/dropzone.js',
            3 => 'vendor/core/core/media/libraries/jquery-context-menu/jquery.ui.position.min.js',
            4 => 'vendor/core/core/media/libraries/jquery-context-menu/jquery.contextMenu.min.js',
            5 => 'vendor/core/core/media/js/media.js?v=1616366107',
          ),
        ),
        'allowed_mime_types' => 'jpg,jpeg,png,gif,txt,docx,zip,mp3,bmp,csv,xls,xlsx,ppt,pptx,pdf,mp4,doc,mpga,wav',
        'mime_types' => 
        array (
          'image' => 
          array (
            0 => 'image/png',
            1 => 'image/jpeg',
            2 => 'image/gif',
            3 => 'image/bmp',
          ),
          'video' => 
          array (
            0 => 'video/mp4',
          ),
          'document' => 
          array (
            0 => 'application/pdf',
            1 => 'application/vnd.ms-excel',
            2 => 'application/excel',
            3 => 'application/x-excel',
            4 => 'application/x-msexcel',
            5 => 'text/plain',
            6 => 'application/msword',
            7 => 'text/csv',
            8 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            9 => 'application/vnd.ms-powerpoint',
            10 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
          ),
        ),
        'default_image' => '/vendor/core/core/base/images/placeholder.png',
        'sidebar_display' => 'horizontal',
        'watermark' => 
        array (
          'enabled' => 0,
          'source' => NULL,
          'size' => 10,
          'opacity' => 70,
          'position' => 'bottom-right',
          'x' => 10,
          'y' => 10,
        ),
        'chunk' => 
        array (
          'enabled' => false,
          'chunk_size' => 1048576,
          'max_file_size' => 1048576,
          'storage' => 
          array (
            'chunks' => 'chunks',
            'disk' => 'local',
          ),
          'clear' => 
          array (
            'timestamp' => '-3 HOURS',
            'schedule' => 
            array (
              'enabled' => true,
              'cron' => '25 * * * *',
            ),
          ),
          'chunk' => 
          array (
            'name' => 
            array (
              'use' => 
              array (
                'session' => true,
                'browser' => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'js-validation' => 
    array (
      'js-validation' => 
      array (
        'view' => 'core/js-validation::bootstrap',
        'form_selector' => 'form',
        'focus_on_error' => false,
        'duration_animate' => 1000,
        'disable_remote_validation' => false,
        'remote_validation_field' => '_js_validation',
        'escape' => false,
      ),
    ),
  ),
  'ziggy' => 
  array (
    'blacklist' => 
    array (
      0 => 'debugbar.*',
    ),
  ),
  'datatables-buttons' => 
  array (
    'namespace' => 
    array (
      'base' => 'DataTables',
      'model' => '',
    ),
    'pdf_generator' => 'excel',
    'snappy' => 
    array (
      'options' => 
      array (
        'no-outline' => true,
        'margin-left' => '0',
        'margin-right' => '0',
        'margin-top' => '10mm',
        'margin-bottom' => '10mm',
      ),
      'orientation' => 'landscape',
    ),
    'parameters' => 
    array (
      'dom' => 'Bfrtip',
      'order' => 
      array (
        0 => 
        array (
          0 => 0,
          1 => 'desc',
        ),
      ),
      'buttons' => 
      array (
        0 => 'create',
        1 => 'export',
        2 => 'print',
        3 => 'reset',
        4 => 'reload',
      ),
    ),
    'generator' => 
    array (
      'columns' => 'id,add your columns,created_at,updated_at',
      'buttons' => 'create,export,print,reset,reload',
      'dom' => 'Bfrtip',
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'csv' => 
      array (
        'use_bom' => true,
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => '/Users/boaz/Sites/digitalcms/storage/framework/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'laravel-form-builder' => 
  array (
    'defaults' => 
    array (
      'wrapper_class' => 'form-group',
      'wrapper_error_class' => 'has-error',
      'label_class' => 'control-label',
      'field_class' => 'form-control',
      'field_error_class' => '',
      'help_block_class' => 'help-block',
      'error_class' => 'text-danger',
      'required_class' => 'required',
    ),
    'form' => 'laravel-form-builder::form',
    'text' => 'laravel-form-builder::text',
    'textarea' => 'laravel-form-builder::textarea',
    'button' => 'laravel-form-builder::button',
    'buttongroup' => 'laravel-form-builder::buttongroup',
    'radio' => 'laravel-form-builder::radio',
    'checkbox' => 'laravel-form-builder::checkbox',
    'select' => 'laravel-form-builder::select',
    'choice' => 'laravel-form-builder::choice',
    'repeated' => 'laravel-form-builder::repeated',
    'child_form' => 'laravel-form-builder::child_form',
    'collection' => 'laravel-form-builder::collection',
    'static' => 'laravel-form-builder::static',
    'template_prefix' => '',
    'default_namespace' => '',
    'custom_fields' => 
    array (
    ),
  ),
  'laravel-impersonate' => 
  array (
    'session_key' => 'impersonated_by',
    'session_guard' => 'impersonator_guard',
    'session_guard_using' => 'impersonator_guard_using',
    'default_impersonator_guard' => 'web',
    'take_redirect_to' => '/',
    'leave_redirect_to' => '/',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
    'client_uuids' => false,
    'personal_access_client' => 
    array (
      'id' => NULL,
      'secret' => NULL,
    ),
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
      ),
    ),
  ),
  'purifier' => 
  array (
    'encoding' => 'UTF-8',
    'finalize' => true,
    'cachePath' => '/Users/boaz/Sites/digitalcms/storage/app/purifier',
    'cacheFileMode' => 493,
    'settings' => 
    array (
      'default' => 
      array (
        'HTML.Doctype' => 'HTML 4.01 Transitional',
        'HTML.Allowed' => 'div,b,strong,i,em,u,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
        'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
        'AutoFormat.AutoParagraph' => true,
        'AutoFormat.RemoveEmpty' => true,
        'AutoFormat' => 
        array (
          'AutoParagraph' => false,
          'RemoveEmpty' => false,
        ),
      ),
      'test' => 
      array (
        'Attr.EnableID' => 'true',
      ),
      'youtube' => 
      array (
        'HTML.SafeIframe' => 'true',
        'URI.SafeIframeRegexp' => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%',
      ),
      'custom_definition' => 
      array (
        'id' => 'html5-definitions',
        'rev' => 1,
        'debug' => false,
        'elements' => 
        array (
          0 => 
          array (
            0 => 'section',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          1 => 
          array (
            0 => 'nav',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          2 => 
          array (
            0 => 'article',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          3 => 
          array (
            0 => 'aside',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          4 => 
          array (
            0 => 'header',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          5 => 
          array (
            0 => 'footer',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          6 => 
          array (
            0 => 'address',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
          ),
          7 => 
          array (
            0 => 'hgroup',
            1 => 'Block',
            2 => 'Required: h1 | h2 | h3 | h4 | h5 | h6',
            3 => 'Common',
          ),
          8 => 
          array (
            0 => 'figure',
            1 => 'Block',
            2 => 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow',
            3 => 'Common',
          ),
          9 => 
          array (
            0 => 'figcaption',
            1 => 'Inline',
            2 => 'Flow',
            3 => 'Common',
          ),
          10 => 
          array (
            0 => 'video',
            1 => 'Block',
            2 => 'Optional: (source, Flow) | (Flow, source) | Flow',
            3 => 'Common',
            4 => 
            array (
              'src' => 'URI',
              'type' => 'Text',
              'width' => 'Length',
              'height' => 'Length',
              'poster' => 'URI',
              'preload' => 'Enum#auto,metadata,none',
              'controls' => 'Bool',
            ),
          ),
          11 => 
          array (
            0 => 'source',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'src' => 'URI',
              'type' => 'Text',
            ),
          ),
          12 => 
          array (
            0 => 's',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          13 => 
          array (
            0 => 'var',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          14 => 
          array (
            0 => 'sub',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          15 => 
          array (
            0 => 'sup',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          16 => 
          array (
            0 => 'mark',
            1 => 'Inline',
            2 => 'Inline',
            3 => 'Common',
          ),
          17 => 
          array (
            0 => 'wbr',
            1 => 'Inline',
            2 => 'Empty',
            3 => 'Core',
          ),
          18 => 
          array (
            0 => 'ins',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'cite' => 'URI',
              'datetime' => 'CDATA',
            ),
          ),
          19 => 
          array (
            0 => 'del',
            1 => 'Block',
            2 => 'Flow',
            3 => 'Common',
            4 => 
            array (
              'cite' => 'URI',
              'datetime' => 'CDATA',
            ),
          ),
        ),
        'attributes' => 
        array (
          0 => 
          array (
            0 => 'iframe',
            1 => 'allowfullscreen',
            2 => 'Bool',
          ),
          1 => 
          array (
            0 => 'table',
            1 => 'height',
            2 => 'Text',
          ),
          2 => 
          array (
            0 => 'td',
            1 => 'border',
            2 => 'Text',
          ),
          3 => 
          array (
            0 => 'th',
            1 => 'border',
            2 => 'Text',
          ),
          4 => 
          array (
            0 => 'tr',
            1 => 'width',
            2 => 'Text',
          ),
          5 => 
          array (
            0 => 'tr',
            1 => 'height',
            2 => 'Text',
          ),
          6 => 
          array (
            0 => 'tr',
            1 => 'border',
            2 => 'Text',
          ),
        ),
      ),
      'custom_attributes' => 
      array (
        0 => 
        array (
          0 => 'a',
          1 => 'target',
          2 => 'Enum#_blank,_self,_target,_top',
        ),
      ),
      'custom_elements' => 
      array (
        0 => 
        array (
          0 => 'u',
          1 => 'Inline',
          2 => 'Inline',
          3 => 'Common',
        ),
      ),
    ),
  ),
  'laravel-page-speed' => 
  array (
    'php' => 
    array (
      'enable' => true,
      'skip' => 
      array (
        0 => '*.xml',
        1 => '*.less',
        2 => '*.pdf',
        3 => '*.doc',
        4 => '*.txt',
        5 => '*.ico',
        6 => '*.rss',
        7 => '*.zip',
        8 => '*.mp3',
        9 => '*.rar',
        10 => '*.exe',
        11 => '*.wmv',
        12 => '*.doc',
        13 => '*.avi',
        14 => '*.ppt',
        15 => '*.mpg',
        16 => '*.mpeg',
        17 => '*.tif',
        18 => '*.wav',
        19 => '*.mov',
        20 => '*.psd',
        21 => '*.ai',
        22 => '*.xls',
        23 => '*.mp4',
        24 => '*.m4a',
        25 => '*.swf',
        26 => '*.dat',
        27 => '*.dmg',
        28 => '*.iso',
        29 => '*.flv',
        30 => '*.m4v',
        31 => '*.torrent',
      ),
    ),
  ),
  'datatables-html' => 
  array (
    'namespace' => 'LaravelDataTables',
    'table' => 
    array (
      'class' => 'table',
      'id' => 'dataTableBuilder',
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
    'script' => 'datatables::script',
    'editor' => 'datatables::editor',
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'assets' => 
  array (
    'offline' => true,
    'enable_version' => false,
    'version' => 1616366107,
    'scripts' => 
    array (
      0 => 'modernizr',
      1 => 'app',
    ),
    'styles' => 
    array (
      0 => 'bootstrap',
    ),
    'resources' => 
    array (
      'scripts' => 
      array (
        'app' => 
        array (
          'use_cdn' => false,
          'location' => 'footer',
          'src' => 
          array (
            'local' => '/js/app.js',
          ),
        ),
        'modernizr' => 
        array (
          'use_cdn' => true,
          'location' => 'header',
          'src' => 
          array (
            'local' => '/vendor/core/packages/modernizr/modernizr.min.js',
            'cdn' => '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js',
          ),
        ),
      ),
      'styles' => 
      array (
        'bootstrap' => 
        array (
          'use_cdn' => true,
          'location' => 'header',
          'src' => 
          array (
            'local' => '/packages/bootstrap/css/bootstrap.min.css',
            'cdn' => '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
          ),
          'attributes' => 
          array (
            'integrity' => 'sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB',
            'crossorigin' => 'anonymous',
          ),
        ),
      ),
    ),
  ),
  'packages' => 
  array (
    'menu' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Menu',
          'flag' => 'menus.index',
          'parent_flag' => 'core.appearance',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'menus.create',
          'parent_flag' => 'menus.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'menus.edit',
          'parent_flag' => 'menus.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'menus.destroy',
          'parent_flag' => 'menus.index',
        ),
      ),
      'general' => 
      array (
        'locations' => 
        array (
          'header-menu' => 'Header Navigation',
          'main-menu' => 'Main Navigation',
          'footer-menu' => 'Footer Navigation',
        ),
        'cache' => 
        array (
          'enabled' => false,
        ),
      ),
    ),
    'optimize' => 
    array (
      'general' => 
      array (
        'skip' => 
        array (
          0 => '*.xml',
          1 => '*.less',
          2 => '*.pdf',
          3 => '*.doc',
          4 => '*.txt',
          5 => '*.ico',
          6 => '*.rss',
          7 => '*.zip',
          8 => '*.mp3',
          9 => '*.rar',
          10 => '*.exe',
          11 => '*.wmv',
          12 => '*.doc',
          13 => '*.avi',
          14 => '*.ppt',
          15 => '*.mpg',
          16 => '*.mpeg',
          17 => '*.tif',
          18 => '*.wav',
          19 => '*.mov',
          20 => '*.psd',
          21 => '*.ai',
          22 => '*.xls',
          23 => '*.mp4',
          24 => '*.m4a',
          25 => '*.swf',
          26 => '*.dat',
          27 => '*.dmg',
          28 => '*.iso',
          29 => '*.flv',
          30 => '*.m4v',
          31 => '*.torrent',
        ),
      ),
    ),
    'page' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Page',
          'flag' => 'pages.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'pages.create',
          'parent_flag' => 'pages.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'pages.edit',
          'parent_flag' => 'pages.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'pages.destroy',
          'parent_flag' => 'pages.index',
        ),
      ),
      'general' => 
      array (
        'templates' => 
        array (
          'default' => 'Default',
        ),
      ),
    ),
    'plugin-management' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Plugins',
          'flag' => 'plugins.index',
          'parent_flag' => 'core.system',
        ),
        1 => 
        array (
          'name' => 'Activate/Deactivate',
          'flag' => 'plugins.edit',
          'parent_flag' => 'plugins.index',
        ),
        2 => 
        array (
          'name' => 'Remove',
          'flag' => 'plugins.remove',
          'parent_flag' => 'plugins.index',
        ),
      ),
    ),
    'revision' => 
    array (
      'general' => 
      array (
        'supported' => 
        array (
          0 => 'Botble\\Blog\\Models\\Post',
          1 => 'Botble\\Page\\Models\\Page',
        ),
      ),
    ),
    'seo-helper' => 
    array (
      'general' => 
      array (
        'title' => 
        array (
          'separator' => '-',
          'first' => true,
          'max' => 120,
        ),
        'description' => 
        array (
          'max' => 386,
        ),
        'misc' => 
        array (
          'canonical' => true,
          'robots' => false,
          'default' => 
          array (
            'viewport' => 'width=device-width, initial-scale=1',
            'author' => '',
            'publisher' => '',
          ),
        ),
        'webmasters' => 
        array (
          'google' => '',
          'bing' => '',
          'alexa' => '',
          'pinterest' => '',
          'yandex' => '',
        ),
        'open-graph' => 
        array (
          'prefix' => 'og:',
          'type' => 'website',
          'properties' => 
          array (
          ),
        ),
        'twitter' => 
        array (
          'prefix' => 'twitter:',
          'card' => 'summary',
          'metas' => 
          array (
          ),
        ),
        'analytics' => 
        array (
          'google' => '',
        ),
        'supported' => 
        array (
          0 => 'Botble\\Page\\Models\\Page',
          1 => 'Botble\\Blog\\Models\\Post',
          2 => 'Botble\\Blog\\Models\\Category',
          3 => 'Botble\\Blog\\Models\\Tag',
          4 => 'Botble\\Gallery\\Models\\Gallery',
        ),
      ),
    ),
    'sitemap' => 
    array (
      'config' => 
      array (
        'use_cache' => false,
        'cache_key' => 'cms-sitemap.https://insulink.co.ke',
        'cache_duration' => 3600,
        'escaping' => true,
        'use_limit_size' => false,
        'max_size' => NULL,
        'use_styles' => true,
        'styles_location' => '/vendor/core/packages/sitemap/styles/',
        'use_gzip' => false,
      ),
    ),
    'slug' => 
    array (
      'general' => 
      array (
        'pattern' => '--slug--',
        'supported' => 
        array (
          'Botble\\Page\\Models\\Page' => 'Pages',
          'Botble\\Blog\\Models\\Post' => 'Blog Posts',
          'Botble\\Blog\\Models\\Category' => 'Blog Categories',
          'Botble\\Blog\\Models\\Tag' => 'Blog Tags',
          'Botble\\Gallery\\Models\\Gallery' => 'Galleries',
        ),
        'prefixes' => 
        array (
          'Botble\\Blog\\Models\\Tag' => 'tag',
          'Botble\\Gallery\\Models\\Gallery' => 'galleries',
        ),
        'disable_preview' => 
        array (
        ),
      ),
    ),
    'theme' => 
    array (
      'general' => 
      array (
        'assetUrl' => '/',
        'themeDefault' => 'default',
        'layoutDefault' => 'default',
        'themeDir' => 'themes',
        'containerDir' => 
        array (
          'layout' => 'layouts',
          'asset' => '',
          'partial' => 'partials',
          'view' => 'views',
        ),
        'events' => 
        array (
        ),
        'theme-options' => 
        array (
          'opt_name' => 'theme-options',
          'use_cdn' => true,
          'display_name' => 'Theme Options',
          'display_version' => '1.0.0',
          'page_title' => 'Theme Options',
          'update_notice' => true,
          'admin_bar' => true,
          'menu_type' => 'menu',
          'menu_title' => 'Sample Options',
          'allow_sub_menu' => true,
          'page_parent_post_type' => 'your_post_type',
          'customizer' => true,
          'default_mark' => '*',
          'hints' => 
          array (
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => 
            array (
              'color' => 'light',
            ),
            'tip_position' => 
            array (
              'my' => 'top left',
              'at' => 'bottom right',
            ),
            'tip_effect' => 
            array (
              'show' => 
              array (
                'duration' => '500',
                'event' => 'mouseover',
              ),
              'hide' => 
              array (
                'duration' => '500',
                'event' => 'mouseleave unfocus',
              ),
            ),
          ),
          'output' => true,
          'output_tag' => true,
          'settings_api' => true,
          'cdn_check_time' => '1440',
          'compiler' => true,
          'page_permissions' => 'manage_options',
          'save_defaults' => true,
          'show_import_export' => true,
          'show_options_object' => false,
          'database' => 'options',
          'transient_time' => '3600',
          'network_sites' => true,
        ),
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Appearance',
          'flag' => 'core.appearance',
        ),
        1 => 
        array (
          'name' => 'Theme',
          'flag' => 'theme.index',
          'parent_flag' => 'core.appearance',
        ),
        2 => 
        array (
          'name' => 'Activate',
          'flag' => 'theme.activate',
          'parent_flag' => 'theme.index',
        ),
        3 => 
        array (
          'name' => 'Remove',
          'flag' => 'theme.remove',
          'parent_flag' => 'theme.index',
        ),
        4 => 
        array (
          'name' => 'Theme options',
          'flag' => 'theme.options',
          'parent_flag' => 'core.appearance',
        ),
        5 => 
        array (
          'name' => 'Custom CSS',
          'flag' => 'theme.custom-css',
          'parent_flag' => 'core.appearance',
        ),
      ),
    ),
    'widget' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Widgets',
          'flag' => 'widgets.index',
          'parent_flag' => 'core.appearance',
        ),
      ),
    ),
  ),
  'plugins' => 
  array (
    'captcha' => 
    array (
      'general' => 
      array (
        'type' => 'v3',
        'secret' => '6Le-5qUZAAAAANNh0q1CVlO2ANYcTfaAhIDYen1R',
        'site_key' => '6Le-5qUZAAAAAKY6A0qSuIb7j-2lkslKwCbm47O5',
        'hide_badge' => false,
        'request_method' => NULL,
        'options' => 
        array (
          'multiple' => false,
          'lang' => 'en',
        ),
        'attributes' => 
        array (
          'theme' => 'light',
        ),
      ),
    ),
    'audit-log' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Activity Logs',
          'flag' => 'audit-log.index',
          'parent_flag' => 'core.system',
        ),
        1 => 
        array (
          'name' => 'Delete',
          'flag' => 'audit-log.destroy',
          'parent_flag' => 'audit-log.index',
        ),
      ),
    ),
    'backup' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Backup',
          'flag' => 'backups.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'backups.create',
          'parent_flag' => 'backups.index',
        ),
        2 => 
        array (
          'name' => 'Restore',
          'flag' => 'backups.restore',
          'parent_flag' => 'backups.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'backups.destroy',
          'parent_flag' => 'backups.index',
        ),
      ),
      'general' => 
      array (
        'backup_mysql_execute_path' => '',
      ),
    ),
    'request-log' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Request Logs',
          'flag' => 'request-log.index',
          'parent_flag' => 'core.system',
        ),
        1 => 
        array (
          'name' => 'Delete',
          'flag' => 'request-log.destroy',
          'parent_flag' => 'request-log.index',
        ),
      ),
    ),
    'social-login' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Social Login',
          'flag' => 'social-login.settings',
        ),
      ),
      'general' => 
      array (
        'supported' => 
        array (
          0 => 'Botble\\Member\\Models\\Member',
        ),
      ),
    ),
    'block' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Block',
          'flag' => 'block.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'block.create',
          'parent_flag' => 'block.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'block.edit',
          'parent_flag' => 'block.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'block.destroy',
          'parent_flag' => 'block.index',
        ),
      ),
    ),
    'custom-field' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Custom Fields',
          'flag' => 'custom-fields.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'custom-fields.create',
          'parent_flag' => 'custom-fields.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'custom-fields.edit',
          'parent_flag' => 'custom-fields.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'custom-fields.destroy',
          'parent_flag' => 'custom-fields.index',
        ),
      ),
      'general' => 
      array (
        'supported' => 
        array (
          0 => 'Botble\\Page\\Models\\Page',
          1 => 'Botble\\Blog\\Models\\Post',
          2 => 'Botble\\Blog\\Models\\Category',
          3 => 'Botble\\Block\\Models\\Block',
        ),
      ),
    ),
    'contact' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Contacts',
          'flag' => 'contacts.index',
        ),
        1 => 
        array (
          'name' => 'Edit',
          'flag' => 'contacts.edit',
          'parent_flag' => 'contacts.index',
        ),
        2 => 
        array (
          'name' => 'Delete',
          'flag' => 'contacts.destroy',
          'parent_flag' => 'contacts.index',
        ),
      ),
      'email' => 
      array (
        'name' => 'plugins/contact::contact.settings.email.title',
        'description' => 'plugins/contact::contact.settings.email.description',
        'templates' => 
        array (
          'notice' => 
          array (
            'title' => 'plugins/contact::contact.settings.email.templates.notice_title',
            'description' => 'plugins/contact::contact.settings.email.templates.notice_description',
            'subject' => 'New contact from {{ site_title }}',
            'can_off' => true,
          ),
        ),
        'variables' => 
        array (
          'contact_name' => 'Contact name',
          'contact_subject' => 'Contact subject',
          'contact_email' => 'Contact email',
          'contact_phone' => 'Contact phone',
          'contact_address' => 'Contact address',
          'contact_content' => 'Contact content',
        ),
      ),
    ),
    'blog' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Blog',
          'flag' => 'plugins.blog',
        ),
        1 => 
        array (
          'name' => 'Posts',
          'flag' => 'posts.index',
          'parent_flag' => 'plugins.blog',
        ),
        2 => 
        array (
          'name' => 'Create',
          'flag' => 'posts.create',
          'parent_flag' => 'posts.index',
        ),
        3 => 
        array (
          'name' => 'Edit',
          'flag' => 'posts.edit',
          'parent_flag' => 'posts.index',
        ),
        4 => 
        array (
          'name' => 'Delete',
          'flag' => 'posts.destroy',
          'parent_flag' => 'posts.index',
        ),
        5 => 
        array (
          'name' => 'Categories',
          'flag' => 'categories.index',
          'parent_flag' => 'plugins.blog',
        ),
        6 => 
        array (
          'name' => 'Create',
          'flag' => 'categories.create',
          'parent_flag' => 'categories.index',
        ),
        7 => 
        array (
          'name' => 'Edit',
          'flag' => 'categories.edit',
          'parent_flag' => 'categories.index',
        ),
        8 => 
        array (
          'name' => 'Delete',
          'flag' => 'categories.destroy',
          'parent_flag' => 'categories.index',
        ),
        9 => 
        array (
          'name' => 'Tags',
          'flag' => 'tags.index',
          'parent_flag' => 'plugins.blog',
        ),
        10 => 
        array (
          'name' => 'Create',
          'flag' => 'tags.create',
          'parent_flag' => 'tags.index',
        ),
        11 => 
        array (
          'name' => 'Edit',
          'flag' => 'tags.edit',
          'parent_flag' => 'tags.index',
        ),
        12 => 
        array (
          'name' => 'Delete',
          'flag' => 'tags.destroy',
          'parent_flag' => 'tags.index',
        ),
      ),
    ),
    'gallery' => 
    array (
      'general' => 
      array (
        'supported' => 
        array (
          0 => 'Botble\\Gallery\\Models\\Gallery',
          1 => 'Botble\\Page\\Models\\Page',
          2 => 'Botble\\Blog\\Models\\Post',
        ),
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Galleries',
          'flag' => 'galleries.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'galleries.create',
          'parent_flag' => 'galleries.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'galleries.edit',
          'parent_flag' => 'galleries.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'galleries.destroy',
          'parent_flag' => 'galleries.index',
        ),
      ),
    ),
    'translation' => 
    array (
      'general' => 
      array (
        'route' => 
        array (
          'prefix' => 'translations',
          'middleware' => 'auth',
        ),
        'delete_enabled' => true,
        'exclude_groups' => 
        array (
        ),
        'assets_dir' => '/vendor/core/plugins/translation',
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Translation',
          'flag' => 'translations.index',
        ),
        1 => 
        array (
          'name' => 'Edit',
          'flag' => 'translations.edit',
          'parent_flag' => 'translations.index',
        ),
      ),
    ),
    'page-builder' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Page Builder',
          'flag' => 'page_builder.design',
        ),
      ),
    ),
    'quotation' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Quotations',
          'flag' => 'quotation.index',
        ),
        1 => 
        array (
          'name' => 'Create',
          'flag' => 'quotation.create',
          'parent_flag' => 'quotation.index',
        ),
        2 => 
        array (
          'name' => 'Edit',
          'flag' => 'quotation.edit',
          'parent_flag' => 'quotation.index',
        ),
        3 => 
        array (
          'name' => 'Delete',
          'flag' => 'quotation.destroy',
          'parent_flag' => 'quotation.index',
        ),
        4 => 
        array (
          'name' => 'Customers',
          'flag' => 'customer.index',
        ),
        5 => 
        array (
          'name' => 'Create',
          'flag' => 'customer.create',
          'parent_flag' => 'customer.index',
        ),
        6 => 
        array (
          'name' => 'Edit',
          'flag' => 'customer.edit',
          'parent_flag' => 'customer.index',
        ),
        7 => 
        array (
          'name' => 'Delete',
          'flag' => 'customer.destroy',
          'parent_flag' => 'customer.index',
        ),
        8 => 
        array (
          'name' => 'Models',
          'flag' => 'models.index',
        ),
        9 => 
        array (
          'name' => 'Create',
          'flag' => 'models.create',
          'parent_flag' => 'models.index',
        ),
        10 => 
        array (
          'name' => 'Edit',
          'flag' => 'models.edit',
          'parent_flag' => 'models.index',
        ),
        11 => 
        array (
          'name' => 'Delete',
          'flag' => 'models.destroy',
          'parent_flag' => 'models.index',
        ),
        12 => 
        array (
          'name' => 'Makes',
          'flag' => 'makes.index',
        ),
        13 => 
        array (
          'name' => 'Create',
          'flag' => 'makes.create',
          'parent_flag' => 'makes.index',
        ),
        14 => 
        array (
          'name' => 'Edit',
          'flag' => 'makes.edit',
          'parent_flag' => 'makes.index',
        ),
        15 => 
        array (
          'name' => 'Delete',
          'flag' => 'makes.destroy',
          'parent_flag' => 'makes.index',
        ),
        16 => 
        array (
          'name' => 'Customers',
          'flag' => 'customer.index',
        ),
        17 => 
        array (
          'name' => 'Create',
          'flag' => 'customer.create',
          'parent_flag' => 'customer.index',
        ),
        18 => 
        array (
          'name' => 'Edit',
          'flag' => 'customer.edit',
          'parent_flag' => 'customer.index',
        ),
        19 => 
        array (
          'name' => 'Delete',
          'flag' => 'customer.destroy',
          'parent_flag' => 'customer.index',
        ),
        20 => 
        array (
          'name' => 'Underwriters',
          'flag' => 'underwriter.index',
        ),
        21 => 
        array (
          'name' => 'Create',
          'flag' => 'underwriter.create',
          'parent_flag' => 'underwriter.index',
        ),
        22 => 
        array (
          'name' => 'Edit',
          'flag' => 'underwriter.edit',
          'parent_flag' => 'underwriter.index',
        ),
        23 => 
        array (
          'name' => 'Delete',
          'flag' => 'underwriter.destroy',
          'parent_flag' => 'underwriter.index',
        ),
        24 => 
        array (
          'name' => 'Products',
          'flag' => 'product.index',
        ),
        25 => 
        array (
          'name' => 'Create',
          'flag' => 'product.create',
          'parent_flag' => 'product.index',
        ),
        26 => 
        array (
          'name' => 'Edit',
          'flag' => 'product.edit',
          'parent_flag' => 'product.index',
        ),
        27 => 
        array (
          'name' => 'Delete',
          'flag' => 'product.destroy',
          'parent_flag' => 'product.index',
        ),
      ),
    ),
    'analytics' => 
    array (
      'general' => 
      array (
        'view_id' => NULL,
        'cache_lifetime_in_minutes' => 1440,
        'cache' => 
        array (
          'store' => 'file',
        ),
        'enabled_dashboard_widgets' => true,
      ),
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Analytics',
          'flag' => 'analytics.general',
        ),
        1 => 
        array (
          'name' => 'Top Page',
          'flag' => 'analytics.page',
          'parent_flag' => 'analytics.general',
        ),
        2 => 
        array (
          'name' => 'Top Browser',
          'flag' => 'analytics.browser',
          'parent_flag' => 'analytics.general',
        ),
        3 => 
        array (
          'name' => 'Top Referrer',
          'flag' => 'analytics.referrer',
          'parent_flag' => 'analytics.general',
        ),
      ),
    ),
    'impersonate' => 
    array (
      'permissions' => 
      array (
        0 => 
        array (
          'name' => 'Impersonate',
          'flag' => 'users.impersonate',
          'parent_flag' => 'users.index',
        ),
      ),
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 94,
  ),
  'scribe' => 
  array (
    'type' => 'static',
    'static' => 
    array (
      'output_path' => 'public/docs',
    ),
    'laravel' => 
    array (
      'add_routes' => true,
      'docs_url' => '/docs',
      'middleware' => 
      array (
      ),
    ),
    'auth' => 
    array (
      'enabled' => false,
      'in' => 'bearer',
      'name' => 'token',
      'use_value' => NULL,
      'placeholder' => '{YOUR_AUTH_KEY}',
      'extra_info' => 'You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.',
    ),
    'intro_text' => 'Welcome to our API documentation!

<aside>As you scroll, you\'ll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile), and you can switch the programming language of the examples with the tabs in the top right (or from the nav menu at the top left on mobile).</aside>',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
    ),
    'base_url' => NULL,
    'title' => NULL,
    'description' => '',
    'postman' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'openapi' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'default_group' => 'Endpoints',
    'logo' => false,
    'router' => 'laravel',
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'domains' => 
          array (
            0 => '*',
          ),
          'prefixes' => 
          array (
            0 => 'api/*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
        ),
        'apply' => 
        array (
          'headers' => 
          array (
            'Authorization' => 'Bearer {token}',
            'Api-Version' => 'v1',
          ),
          'response_calls' => 
          array (
            'methods' => 
            array (
              0 => 'GET',
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
            ),
            'cookies' => 
            array (
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
            'fileParams' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'faker_seed' => NULL,
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
      ),
      'urlParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromRouteRules',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderTag',
      ),
      'bodyParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseTag',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        4 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls',
      ),
      'responseFields' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldTag',
      ),
    ),
    'routeMatcher' => 'Knuckles\\Scribe\\Matching\\RouteMatcher',
    'continue_without_database_transactions' => 
    array (
    ),
  ),
);
