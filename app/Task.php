<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    //
    protected $fillable = ['task_name','created_by', 'assignt_to', 'status', 'description'];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignetTo()
    {
        return $this->belongsTo(User::class, 'assignt_to');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($query)
        {
            $user = Auth::user()->id;
            $query->created_by = $user;
        });
    }

}
