<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roluser extends Model
{
    protected $table = 'rolusers';

    protected $primaryKey = 'id_rolusers';

    protected $fillable = ['description'];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
