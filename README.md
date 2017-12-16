This project is based on Yii 2 Basic Project Template.

Yii 2 REST API Template provides a skeleton and examples for creating sophisticated RESTful API.
The examples include routing, controllers, and relational models

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      component/          contains application component (e.g Authentication)
      config/             contains application configurations
      controllers/        contains Web controller classes
      core/               contains core classes that can be extended
      helpers/            contains static classes for simple helper functions
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      sql/                contains SQL file that contains CREATE script for example tables
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can install this project template using the following command:

```
composer install
```


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yourdbname',
    'username' => 'root',
    'password' => 'passwd',
    'charset' => 'utf8',
];
```

IMPORT SAMPLE DATA
-------------

Before you start generating something, make sure you have already import all the sample data located in sql/tables.sql file.


**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


Assuming your configurations are correct, you can start the web server (by default, it uses port 8080 for web access):

```
php yii serve
```

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

```
http://localhost:8080/
```

To use Yii Code Generator, visit this URL:

```
http://localhost:8080/gii
```

First, create your models, and then the controllers.
After you made some controllers, register them in the 'urlManager' section of the config/web.php file:

```
'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['orders', 'auth', 'customer'], //add controllers here
                    'pluralize' => false
                ],
                'login' => 'auth/create',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
            ],
        ]
```

For final check, visit your controller's index URL, for example http://localhost:8080/orders
If it shows you some results, congratulations! You've successfully made a RESTful API!

For more detailed information, please visit Yii 2 Official Documentation.
http://www.yiiframework.com/doc-2.0/guide-rest-quick-start.html

That's it. Enjoy!


© 2017 - Achmad Giovani