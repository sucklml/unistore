<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','address','phone'];
    protected $dates = ['delete_at'];

    // TODO: Faltan las relaciones
}
