<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoTask extends Model
{
    protected $table = 'to_do_tasks';

    protected $fillable = [
        'task',
        'status_id',
        'user_id',
    ];
}
