<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use HasFactory;
     use SoftDeletes;
protected $fillable=['name','email','phone','skils','availabilty'];

    public function tasks(){
        return $this->belongsToMany(Task::class,'assignments','volunteer_id', 'task_id');
    }

}






