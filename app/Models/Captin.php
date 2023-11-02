<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function city()
    {
        return $this->belongsTo(City::class,'assign_city_id');
    }
    public function shifts()
    {
        return $this->belongsTo(Constant::class,'shift')->withDefault(['name' => 'NA']);
    }
    public function vehicle()
    {
        return $this->belongsTo(Constant::class, 'vehicle_type')->withDefault(['name' => 'NA']);
    }

    public function payment_types()
    {
        return $this->belongsTo(Constant::class, 'payment_type')->withDefault(['name' => 'NA']);
    }
    public function payment_methods()
    {
        return $this->belongsTo(Constant::class, 'payment_method')->withDefault(['name' => 'NA']);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
    public function calls()
    {
        return $this->hasMany(Call::class,'captin_id','id');
    }
    public function smss()
    {
        return $this->hasMany(ShortMessage::class,'captin_id','id');
    }



}
