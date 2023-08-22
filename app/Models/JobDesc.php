<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDesc extends Model
{
    protected $table = "job_desc";

    protected $fillable = [
        'description',
        'job_id',
    ];
}
