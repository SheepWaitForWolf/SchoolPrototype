<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    protected $table = 'enrolment';

    protected $primaryKey = 'enrol_id';

    public $timestamps = true;

    protected $fillable = [
    	'f_name',
    	'l_name',
    	'la',
    	'school',
    	'year_of_study',
    	'academic_year'
    ];

    protected $guarded = [];
}
