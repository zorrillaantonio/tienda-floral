<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 * @package App\Models
 * @version April 5, 2021, 9:07 pm UTC
 *
 * @property integer $id
 */
class Category extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'title',
        'description',
        'slug',
        'is_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title',
        'description' => 'required',
        'slug' => 'required',
        'is_active' => 'required',
    ];


}
