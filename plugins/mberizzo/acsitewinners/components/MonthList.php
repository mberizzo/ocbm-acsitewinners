<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;

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
        $this->months = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];
    }
}
