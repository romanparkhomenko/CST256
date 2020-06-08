<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AffinityGroupMembers extends Pivot
{
    protected $table = 'affinitygroupmembers';
    public $timestamps = false;

    protected $primaryKey = 'id';
}
