<?php namespace Mberizzo\Acsitewinners;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mberizzo\Acsitewinners\Components\WinnerList' => 'winnerList',
            'Mberizzo\Acsitewinners\Components\YearList' => 'yearList',
            'Mberizzo\Acsitewinners\Components\MonthList' => 'monthList',
            'Mberizzo\Acsitewinners\Components\ExtraData' => 'extraData',
            'Mberizzo\Acsitewinners\Components\MonthYearDropdown' => 'monthYearDropdown',
        ];
    }
}
