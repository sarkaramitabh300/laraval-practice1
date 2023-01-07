<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name','email','phpne','address'];
    public function company()
    {
       return $this->belongsTo(Company::class,"company_id");
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
