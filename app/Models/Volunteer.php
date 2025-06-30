<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use HasFactory;
     use SoftDeletes;
protected $fillable=['name','email','phone','skils','availabilty','task_id'];

    public function task(){
        return $this->belongsTo(Task::class);
    }

}






