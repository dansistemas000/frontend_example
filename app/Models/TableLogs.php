<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class TableLogs extends Model
{

    protected $table = 'logs';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = ["request_date"];

}