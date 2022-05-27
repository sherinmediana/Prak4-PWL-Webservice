<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['name', 'comment', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }
}
