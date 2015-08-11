<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $table = 'mapa';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','lat','lng'];
}
