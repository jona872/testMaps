<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //esto no sria un model con tabla, seria un model para administrar todo
    protected $table = 'vendedor';
     protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $dates = ['deleted_at'];
    protected $fillable = ['titulo','lat','lng'];
}
