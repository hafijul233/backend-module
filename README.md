# Admin LTE 3 based Backend Module

Configuration
* Remove default user table migration file
* Change ``auth.php`` config provider > user > model value to `Modules\Backend\Authentication\User::class`
* Publish both ``bckend-asset`` & ``backend-plugin`` assets to public folder

## Package Installation
``composer require hafijul233/backend-module``
