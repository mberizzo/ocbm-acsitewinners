<?php namespace Mberizzo\Acsitewinners\Models;

use Illuminate\Support\Carbon;
use Mberizzo\Acsitewinners\Models\Winner;

class WinnerImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            try {
                Winner::create($data);
                $this->logCreated();
            }
            catch (\Exception $ex) {
                logger($ex);
                $this->logError($row, $ex->getMessage());
            }
        }
    }
}
