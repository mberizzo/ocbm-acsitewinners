<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Mberizzo\Acsitewinners\Models\Winner;

class WinnerList extends ComponentBase
{

    public $winners;
    public $activeYear;
    public $activeMonth;

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
        $year = $this->page['activeYear'] = $this->getYear();
        $month = $this->page['activeMonth'] = $this->getMonth();

        $this->winners = Winner::whereYear('fecha', $year)
            ->whereMonth('fecha', $month)
            ->get()
            ->groupBy('categoria');

        // dd($this->winners);
    }

    public function getLastWinner()
    {
        return Winner::orderBy('id', 'desc')->first();
    }

    private function getYear()
    {
        if (! empty($this->property('year'))) {
            return $this->property('year');
        }

        return date('Y');
    }

    private function getMonth()
    {
        if (! empty($this->property('month'))) {
            return $this->property('month');
        }

        return '01';
    }
}
