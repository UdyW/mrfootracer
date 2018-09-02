<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FootRaceRunner extends Model
{
    public $table = 'footrace_runner';
    protected $fillable = ['footraceid','runnerid'];
}
