<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class ListTask extends Model
{
    use HasFactory;
    protected $table = 'list_task';
    protected $primaryKey = 'list_id';
    
    protected $fillable = [
        'list_id',
        'list_user_id',
        'list_task_id'
    ];

    public function task()
    {
        return $this->hasOne(Task::class, 'task_id', 'list_task_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'list_user_id');
    }
}
