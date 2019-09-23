<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Mberizzo\Acsitewinners\Models\Winner;

class WinnerList extends ComponentBase
{

    public $winners;

    public function componentDetails()
    {
        return [
            'name'        => 'Winner List',
            'description' => 'Show the winner list of specific year and month.'
        ];
    }

    public function defineProperties()
    {
        return [
            'year' => [
                'title' => 'Filter by Year',
                'default' => '{{ :year }}',
            ],
            'month' => [
                'title' => 'Filter by Month',
                'default' => '{{ :month }}',
            ],
        ];
    }

    public function onRun()
    {
        $year = $this->property('year') ?? date('Y');
        $month = $this->property('month') ?? '01';

        $this->winners = Winner::whereYear('fecha', $year)
            ->whereMonth('fecha', $month)
            ->get();
    }
}
