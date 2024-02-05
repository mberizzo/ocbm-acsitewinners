<?php namespace Mberizzo\Acsitewinners\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Winners extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mberizzo.Acsitewinners', 'main-menu-item');
    }
}
