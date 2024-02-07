<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function voters()
    {
        return $this->belongsToMany('App\Voter','project_voter', 'project_id', 'voter_id')->withTimestamps();
    }

    public function views()
    {
        return $this->belongsToMany('App\Voter','projects_views', 'project_id', 'voter_id')->withTimestamps();
    }
}
