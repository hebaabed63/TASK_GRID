<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    protected $fillable=['volunteer_id','task_id','notes'];
    use HasFactory;
    use SoftDeletes;
}
