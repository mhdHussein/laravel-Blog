<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $path = '/images/';

    protected $fillable = ['file'];


    //file is the name of the column in the photos table

    public function  getFileAttribute($photo){

        return $this->path . $photo;
    }
}
