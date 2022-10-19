## PMS

### Prerequisites

- PHP 8.0.*
- MySQL 8.2.*
---
## Tools
<a name="tools"></a>

### Coding standards
<a name="Coding standards"></a>

In order to follow code standards, you should use PSR-2, PSR-12 and run [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) before each commit to make sure your code is properly formatted. Base CS fixer configuration file has created as `.php-cs-fixer.dist.php` to make sure every developer uses the same rules for code formatting.  Exact version that should be used is installed as dependency so you can use 
```bash
cd entry
composer fixer
```
#### Configuration
This is file located in `entry` folder, `.php-cs-fixer.dist.php`

### PHPStan
<a name="phpstan"></a>

#### Usage
```bash
cd entry
composer phpstan
```

### L5-Swagger
<a name="l5-swagger"></a>

#### Usage
```bash
cd entry
composer swagger
```
This will generate two files in folder `storage/api-doc` called `api-docs.json` and `resources/views/vendor/l5-swagger/index.blade.php`.

#### Configuration
OpenApi documentation is configured in laravel config file located in `entry/config/l5-swagger.php`.

Also, basic OpenAPI properties are definied in `entry/app/Http/OpenApi/Controllers/ControllerOA.php`.

#### Usage
```bash
cd entry
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models --nowrite
```
Currently we use only feature to generate PhpStorm meta file.

---
### Domains
<a name="domains"></a>

#### Adding new
<a name="adding-new"></a>

When adding new domain there is required to:
1. Add new folder `NewDomain`.
2. Modify `entry/composer.json` to add namespace into autoload.
   ```
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            [...]
            "NewDomain\\": "../NewDomain/"
        }
    },
   ```
   **Remember to sort by name.**

3. Modify PHP-CS-Fixer config `entry/.php-cs-fixer.dist.php`:
   ```
    ->in([
        [...]
        $domains_path . '/NewDomain',
    ])
   ```
   **Remember to sort by name.**

---
### Process Installation 

1. Copy project from GitHub https://github.com/serhiidevpark/pms.git
2. Make you own environment cp .env.example  -> rename .env 
3. Build docker environment cd entry/docker and run ```docker-compose build```
4. Running docker environment  ```docker-compose up -d```

### Laravel
1. Go to container
```docker exec -ti pms-app bash```
2. Go to 'entry'
```cd entry```
3. Install dependencies
```composer install```
4. Generate api key
```php artisan key:generate```
5. Visit welcome page 
```http://localhost:8000/```
6. Run migrations
```php artisan migrate```
---
### PHPSTORM configuration
Got to File->Settings 
1. PHP 
- Configuration file set path to the docker/docker-compose.yml Service : container php (app)
- Important!
- General should be updated to php installed version, and Xdebug installed version
![php](readmeSource/php.png)

2. Servers
- Name: server
- Host: localhost
- Absolute path on the server: root-> ```/var/www``` entry-> ```/var/www/entry``` public-> ```/var/www/entry/public```
![server](readmeSource/server.png)

3. Test Frameworks
- ```+``` , ```PHPUnit by Remote Interpreter```
- Select your php (like app)
- Path to script: ```/var/www/entry/vendor/autoload.php```
- Default configuration file: ```/var/www/entry/phpunit.xml```
![framework](readmeSource/framework.png)
  
# basic
