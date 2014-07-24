# PHP-MVC-CMS

BEFORE USING CONFIG URL OF WEBSITE AND SQL DB in config.php file.

Taken basic example from

https://github.com/panique/php-mvc

and added admin part and modules

modules could be called in view :
### $this->modules->modulename->module_func();
when called ->modulename module auto created and store into array which returns next time when same module called.

modules are in 
### application/modules/
have backend and frontend view and inside MVC system of the each module.

admin path able by

### /admin

contains simple $SESSION login

