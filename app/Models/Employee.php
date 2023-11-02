<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function whours()
    {
        return $this->hasMany(EmployeeWhour::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Constant::class,'status');
    }
    public function department()
    {
        return $this->belongsTo(Constant::class,'department_id');
    }
    public function jobTitle()
    {
        return $this->belongsTo(Constant::class,'job_title');
    }
    public function gender()
    {
        return $this->belongsTo(Constant::class,'gender');
    }
}
