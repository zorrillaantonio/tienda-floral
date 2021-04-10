<?php

namespace App\Repositories;

use App\Models\FlowerArrangements;
use App\Repositories\BaseRepository;

/**
 * Class FlowerArrangementsRepository
 * @package App\Repositories
 * @version April 6, 2021, 12:26 am UTC
*/

class FlowerArrangementsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'slug',
        'price',
        'is_active'
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
        return FlowerArrangements::class;
    }
}
