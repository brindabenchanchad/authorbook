<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    use SoftDeletes;
    public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            if(!empty($user)) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            if(!empty($user)) {
                $model->updated_by = $user->id;
            }
        });       
    }
}
