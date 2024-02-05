<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Mberizzo\Acsitewinners\Models\Winner;
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

    /**
     * Detect if has result in this specific year-month
     *
     * @param  Integer  $year
     * @param  Integer  $month
     * @return boolean
     */
    public function hasResult($year, $month)
    {
        return Winner::whereYear('fecha', $year)
            ->whereMonth('fecha', $month)
            ->exists();
    }
}
