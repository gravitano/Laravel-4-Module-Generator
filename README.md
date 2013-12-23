This Laravel 4 package provides a way to quickly generate a module space to store related code.

- `generate:module ModuleName`

## Usage

Often in larger projects, or projects which contain code or resources which are loosely related, you
may want to separate it out to make it more manageable.

This is basically nothing more than an organization tool, and provides little else in the way of development, or
development standards. It is simply a way to generate code containers, for the code that doesn't belong in a package,
yet is too specific to leave in the standard folder structure.

Using the above command, you can generate a little pocket to store related code. By default it is configured
to create a basic folder structure as follows:

        .
        ├── Modules
        |   └── (ModuleName)
        |       ├── Models
        |           └── (ModuleName)Model.php
        |       ├── Views
        |           └── index.blade.php
        |       ├── Controllers
        |           └── (ModuleName)Controller.php
        |       ├── Interfaces
        |           └── (ModuleName)Interface.php
        |       ├── Respositories
        |           └── (ModuleName)Repository.php
        |       ├── Services
        |           └── (ModuleName)Service.php
        |       └── Helpers
        |           └── (ModuleName)Helper.php


This can be configured to use a different folder structure, as well as using different templates to generate the
files from.

All files are namespaced according to psr-0, allowing all files for each module to be autoloaded
with just a single inclusion of the following snippet to the laravel applications composer.json file:

         "psr-0" : {
            "Modules" : "app/"
         }




 This is a work in progress and more features are going to be added to help bolster the generation of files in modules.