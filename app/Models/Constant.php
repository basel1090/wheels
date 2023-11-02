<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Constant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['value', 'name', 'module', 'field','hayat_id','name_ar'];

    // public static function getAllConstants($module, $field)
    // {
    //     return self::where('module', $module)
    //         ->where('field', $field)
    //         ->orderBy('name')
    //         ->select('name', 'value');
    // }
}
