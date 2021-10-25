<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BoholInfo
 * @package App\Models
 * @version October 25, 2021, 7:04 am UTC
 *
 * @property string $barangay
 * @property string $town
 * @property string $province
 * @property string $code
 * @property integer $population
 */
class BoholInfo extends Model
{

    use HasFactory;

    public $table = 'bohol_info';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'barangay',
        'town',
        'province',
        'code',
        'population'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'barangay' => 'string',
        'town' => 'string',
        'province' => 'string',
        'code' => 'string',
        'population' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barangay' => 'required|string|max:255',
        'town' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'population' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
