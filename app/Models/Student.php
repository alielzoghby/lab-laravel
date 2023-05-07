<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $fillable = ['name','IDno','DOB','user_id'];
    // protected $table = 'students';

    use HasFactory,SoftDeletes;

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
