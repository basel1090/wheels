<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function branches()
    {
        return $this->hasMany(RestaurantBranch::class);
    }
    public function items()
    {
        return $this->hasMany(RestaurantItem::class);
    }

    public function employees()
    {
        return $this->hasMany(RestaurantEmployee::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function type()
    {
        return $this->belongsTo(Constant::class, 'type_id');
    }
    public function posType()
    {
        return $this->belongsTo(Constant::class, 'pos_type');
    }
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
