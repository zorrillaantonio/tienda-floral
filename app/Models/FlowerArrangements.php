<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class FlowerArrangements
 * @package App\Models
 * @version April 6, 2021, 12:26 am UTC
 *
 * @property string $title
 * @property string $description
 * @property strign $slug
 * @property number $price
 */
class FlowerArrangements extends Model implements HasMedia
{
    use SoftDeletes;

    use HasFactory;

    use InteractsWithMedia;

    public $table = 'flower_arrangements';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'slug',
        'price',
        'category_id',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'price' => 'decimal:2',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'slug' => 'required',
        'price' => 'required',
        'category_id' => 'required'
    ];


}
