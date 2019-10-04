<?php namespace Mberizzo\Acsitewinners\Components;

use Cms\Classes\ComponentBase;
use Mberizzo\Acsitewinners\Models\Winner;
use October\Rain\Support\Facades\Config;

class ExtraData extends ComponentBase
{

    public $dataMoney;
    public $nDraw;
    public $monthText;

    public function componentDetails()
    {
        return [
            'name' => 'Get extra data',
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
        $query = Winner::whereYear('fecha', $this->getYear())
            ->whereMonth('fecha', $this->getMonth());

        $dataMoney = $query->sum('valor');

        $this->dataMoney = number_format($dataMoney, 2, ',', '.');
        $this->monthText = $this->getMonthText();
        $this->nDraw = optional($query->first())->nrosorteo ?? 0;
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

        return date('m');
    }

    private function getMonthText()
    {
        $month = $this->getMonth();
        $months = Config::get('mberizzo.acsitewinners::months');
        return $months[$month];
    }

}
