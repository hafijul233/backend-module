<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Modules\Backend\Models\Authorization\Permission;
use Modules\Rbac\Models\Role;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Backend
Breadcrumbs::for('backend', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});
// Home > Backend >  Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});


// Home > Backend >  Dashboard > Notifications
Breadcrumbs::for('notifications.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Notifications', route('notifications.index'));
});

// Home > Backend >  Dashboard > Preference
Breadcrumbs::for('administration', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Preference', route('administration'));
});

// Home > Backend >  Dashboard > Preference > Settings
Breadcrumbs::for('settings.index', function ($trail) {
    $trail->parent('preference');
    $trail->push('Settings', route('settings.index'));
});



// Home > Backend >  Dashboard > Operations
Breadcrumbs::for('operations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Operations', route('operations'));
});

Breadcrumbs::for('system-logs', function ($trail) {
    $trail->parent('operations');
    $trail->push('System Logs', route('system-logs'));
});


// Home > Backend >  Dashboard > Media
Breadcrumbs::for('media', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Media', route('operations'));
});
// Home > Backend >  Dashboard > Media > File Manager
Breadcrumbs::for('file-manager', function (BreadcrumbTrail $trail) {
    $trail->parent('media');
    $trail->push('File Manager', route('file-manager'));
});

// Home > Backend >  Dashboard > Preference > Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('preference');
    $trail->push('Roles', route('roles.index'));
});

// Home > Backend >  Dashboard > Preference > Roles > Create
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Add Role', route('roles.create'));
});

// Home > Backend >  Dashboard > Preference > Roles > [Role Name]/Details
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles.index');
    $trail->push(($role->name ?? 'Details'), route('roles.show', $role->id ?? 0));
});

// Home > Backend >  Dashboard > Preference > Roles > [Role Name] > Edit
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('roles.show', [$role]);
    $trail->push('Edit', route('roles.edit', $role->id ?? 0));
});

// Home > Backend >  Dashboard > Preference > Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('administration');
    $trail->push('Permissions', route('permissions.index'));
});

// Home > Backend >  Dashboard > Preference > Permissions > Create
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Add Permission', route('permissions.create'));
});

// Home > Backend >  Dashboard > Preference > Permissions > [Permission Name]/Details
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('permissions.index');
    $trail->push($permission->name, route('permissions.show', $permission->id));
});
// Home > Backend >  Dashboard > Preference > Permissions > [Permission Name] > Edit
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('permissions.index');
    $trail->push('Edit Permission', route('permissions.edit', $permission->id));
});

// Home > Backend >  Dashboard > Preference > Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('preference');
    $trail->push('users', route('users.index'));
});

// Home > Backend >  Dashboard > Preference > Users > Create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Add Permission', route('users.create'));
});

// Home > Backend >  Dashboard > Preference > Users > [User Name]
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push(($user->name ?? 'Details'), route('users.show', $user->id ?? 0));
});

// Home > Backend >  Dashboard > Preference > Users > [User Name] > Edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.show', [$user]);
    $trail->push('Edit', route('users.edit', $user->id ?? 0));
});
