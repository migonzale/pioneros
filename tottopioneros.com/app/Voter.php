<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Voter extends Authenticatable
{
    use Notifiable;

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function seens()
    {
        return $this->belongsToMany('App\Project');
    }
}
