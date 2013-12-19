<?php

return array(

    /**
     * Name of the top level directory where all modules will be stored
     */

    'toplevel_directory' => 'Modules',

    /**
     * Module directory structure to be generated
     */

    'directory_structure' => array(
        'Models'       => '{{Module}}Model.php',
        'Views'        => 'index.blade.php',
        'Controllers'  => '{{Module}}Controller.php',
        'Interfaces'   => '{{Module}}Interface.php',
        'Repositories' => '{{Module}}Repository.php',
        'Helpers'      => '{{Module}}Helper.php',
        'Services'     => '{{Module}}Service.php'
    ),

);