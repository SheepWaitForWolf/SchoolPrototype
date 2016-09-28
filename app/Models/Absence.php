<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $table = 'absence';

    protected $primaryKey = 'absence_id';

    public $timestamps = true;

    protected $fillable = [
    	'f_name',
    	'l_name',
    	'la',
    	'school',
    	'doa',
    	'reason_for_absence'
    ];

    protected $guarded = [];
}
