<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function getImage()
    {
        return $this->hasMany('App\Models\Image','content_id');
    }

    public function getCategory()
    {
        return $this->hasOne('App\Models\Category','alias','category');
    }


}
