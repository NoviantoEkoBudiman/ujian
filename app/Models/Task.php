<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListTask;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $primaryKey = 'task_id';
    
    protected $fillable = [
        'task_id',
        'task_nama',
        'task_deskripsi'
    ];

    public function list()
    {
        return $this->hasMany(Task::class, 'list_task_id','task_id');
    }
}
