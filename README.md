# Admin LTE 3 based Backend Module

Configuration
* Remove default user table migration file
* Change ``auth.php`` config provider > user > model value to `Modules\Backend\Authentication\User::class`
* Publish both ``bckend-asset`` & ``backend-plugin`` assets to public folder
