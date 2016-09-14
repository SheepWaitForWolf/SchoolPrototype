<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ChildRecord extends Model
{
    protected $table = 'child_record';

    protected $primaryKey = 'child_id';

    public $timestamps = true;

    protected $fillable = [
    	'seemis_id',
    	'f_name',
    	'l_name',
    	'dob',
    	'gender',
    	'school_id',
    	'class_level'
    ];

    protected $guarded = [];
}
