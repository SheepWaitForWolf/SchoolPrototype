<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalAuthority extends Model
{
    protected $table = 'local_authorities';

    protected $primaryKey = 'local_authority_id';

	public $timestamps = true;

    protected $fillable = [
        'la_name',
        'cag_code',
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
        'website'
    ];

    protected $guarded = [];
}
