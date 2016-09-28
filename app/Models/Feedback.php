<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $primaryKey = 'feedback_id';

	public $timestamps = true;

    protected $fillable = [
        'feedback_id',
        'f_name',
        'l_name',
        'service',
        'message'
        
    ];

    protected $guarded = [];
}
