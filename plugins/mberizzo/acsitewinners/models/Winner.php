<?php namespace Mberizzo\Acsitewinners\Models;

use Model;

/**
 * Model
 */
class Winner extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_acsitewinners_winners';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
