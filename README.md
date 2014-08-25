CoreORM Example
===============

Examples of CoreORM usage, from simple to more advanced.

### Dependencies
The very first time, run
```
composer install --prefer-dist
```
Then for updates, run
```
composer update --prefer-dist
```

### Apache conf
```
<VirtualHost *:80>
        DocumentRoot [your local path]/CoreORM/example/Examples/public
        ServerName example.core.orm
        SetEnv APPLICATION_ENV development
        DirectoryIndex index.php index.html index.htm index.shtml
        ErrorLog "/var/log/apache2/example_coreorm_error.log"
        CustomLog "/var/log/apache2/example_coreorm_access.log" common
</VirtualHost>
<Directory [your local path]/CoreORM/example/Examples/public>
        Options MultiViews FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
</Directory>
```

Remeber to add
```
127.0.0.1 example.core.orm
```
to your local /etc/hosts

Also restart apache.

### Visit page
Go to your browser and enter http://example.core.orm

### Generating models

Models are pre-generated under Examples/Model folder already, but considering future updates from CoreORM\Framework, you can always generate new models by running
```
./modeller Examples/config.models.php
```