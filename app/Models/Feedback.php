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

    public function postFeedback(Request $request) {
        $feedback = new Feedback;
        $feedback->f_name = $request->f_name;
        $feedback->l_name = $request->l_name;
        $feedback->service = $request->service;
        $feedback->rating = $request->rating;
        $feedback->message = $request->message;

    }
}
