<?php

namespace App\Repositories;

use App\Models\BoholInfo;
use App\Repositories\BaseRepository;

/**
 * Class BoholInfoRepository
 * @package App\Repositories
 * @version October 25, 2021, 7:04 am UTC
*/

class BoholInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barangay',
        'town',
        'province',
        'code',
        'population'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BoholInfo::class;
    }
}
