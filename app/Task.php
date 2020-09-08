<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'id_tasks';

    protected $fillable = [
      'id_users','id_courses','name','description','file'
    ];
}
