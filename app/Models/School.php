<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $primaryKey = 'school_id';

	public $timestamps = true;

    protected $fillable = [
        'school_name',
        'address_lines',
        'post_town',
        'post_code',
        'uprn',
        'x_coord',
        'y_coord',
        'lat_val',
        'long_val',
        'telephone',
        'email_address',
        'website',
        'religion',
        'opening_hours',
        'head_teacher',
        'local_authority_id'
    ];

    protected $guarded = [];
}
