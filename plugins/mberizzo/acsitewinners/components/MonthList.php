<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use October\Rain\Support\Facades\Config;

class MonthList extends ComponentBase
{
    public $months;

    public function componentDetails()
    {
        return [
            'name'        => 'Month List',
            'description' => 'List of Months with link.'
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
        $this->months = Config::get('mberizzo.acsitewinners::months');
    }
}
