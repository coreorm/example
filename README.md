CoreORM Example
===============

Examples of CoreORM usage, from simple to more advanced.

It requires slim framework and backbone.js.

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