<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // protected $table="app_companies";


    public function contacts()
    {
        return $this->hasMany(Contact::class,"company_id");
    }
}
