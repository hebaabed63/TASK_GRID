<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','description','place_id','category','date','time','status'];

    public function place(){
        return $this->belongsTo(Place::class);
    }
    public function volunteers()
{
    return $this->hasMany(Volunteer::class);
}


}
