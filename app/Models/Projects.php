<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'image'];
    

    public function comments() {
        return $this->hasMany(Comment::class, 'project_id');
    }
}
