<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['user_id', 'leave_type', 'reason', 'days_requested', 'date', 'status'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
