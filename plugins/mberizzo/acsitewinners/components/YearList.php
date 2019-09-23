<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Facades\Mberizzo\Acsitewinners\Models\Winner;

class YearList extends ComponentBase
{

    public $years;

    public function componentDetails()
    {
        return [
            'name'        => 'Year List',
            'description' => 'List of years with link.'
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
    }
}
