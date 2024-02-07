<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Facades\Mberizzo\Acsitewinners\Models\Winner;
use October\Rain\Support\Facades\Config;

class MonthYearDropdown extends ComponentBase
{

    public $years;
    public $months;

    public function componentDetails()
    {
        return [
            'name' => 'Month Year Dropdown',
        ];
    }

    public function defineProperties()
    {
        return [
            'page' => [
                'title' => 'Page',
                'type'  => 'dropdown'
            ],
        ];
    }

    public function getPageOptions()
    {
        return Page::getNameList();
    }

    public function onRun()
    {
        $this->years = Winner::getYearList();
        $this->months = Config::get('mberizzo.acsitewinners::months');
    }
}
