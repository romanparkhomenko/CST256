<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
    protected $table = 'jobpostings';

    protected $primaryKey = 'id';
}