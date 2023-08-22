<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobReq extends Model
{
    protected $table = "job_req";

    protected $fillable = [
        'req',
        'job_id',
    ];
}
