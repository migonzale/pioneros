<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /*$projects = Project::with('voters')->get()->sortBy(function($project) {
            return $project->voters->count();
        });*/

        $projects = Project::withCount('voters')->orderBy('voters_count', 'desc')->get();

        return view('admin.index', compact('projects'));
    }
}
