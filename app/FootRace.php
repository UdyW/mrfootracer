<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;


class FootRace extends Model
{
    public $table = 'footrace';
    protected $fillable = ['location','startdate','starttime','distance','description'];
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
