<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'event';
  	protected $primaryKey = 'id_event';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $dates = ['deleted_at'];
    protected $fillable = ['event_name','event_owner','event_desc','event_date','event_type',
    'event_loca','event_priv','created_at','updated_at','lat','lng'];
//created_at, updated_at
}
