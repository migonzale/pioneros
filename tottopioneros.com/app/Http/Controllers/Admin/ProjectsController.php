<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects',
            'group' => 'required',
            'description' => 'required',
            'reference' => 'required|unique:projects',
            'photos.*' => 'image',
            'cover' => 'image',
        ]);

        $project = new Project;
        $project->uuid = Uuid::uuid4();
        $project->slug = Str::slug($request->get('name'));
        $project->name = $request->get('name');
        $project->group = $request->get('group');
        $project->reference = $request->get('reference');
        $project->description = $request->get('description');

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover_name = sha1(date('YmdHis') . Str::random(30)) . '.' . $cover->extension();
            $cover->move(public_path() . '/photos/', $cover_name);

            $project->cover = $cover_name;
        }

        $project->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $name = sha1(date('YmdHis') . Str::random(30)) . '.' . $photo->extension();
                $photo->move(public_path() . '/photos/', $name);

                $project->photos()->saveMany([
                    new Photo(['name' => $name])
                ]);
            }
        }

        return redirect(route('admin.projects.index'))->with('project_created', $project);
    }

    public function show($uuid)
    {
        $project = Project::where('uuid', $uuid)->first();

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request)
    {
        $project = Project::where('uuid', $request->get('uuid'))->first();

        if($project)
        {
            $project->slug = Str::slug($request->get('name'));
            $project->name = $request->get('name');
            $project->group = $request->get('group');
            $project->reference = $request->get('reference');
            $project->description = $request->get('description');

            if ($request->hasFile('cover')) {
                \File::delete(public_path('/photos/' . $project->cover));

                $cover = $request->file('cover');
                $cover_name = sha1(date('YmdHis') . Str::random(30)) . '.' . $cover->extension();
                $cover->move(public_path() . '/photos/', $cover_name);

                $project->cover = $cover_name;
            }

            $project->save();

            if ($request->hasFile('photos'))
            {
                $photos = $project->photos;

                if ($photos)
                {
                    $project->photos()->delete();

                    foreach ($photos as $photo) {
                        \File::delete(public_path('/photos/' . $photo->name));
                    }
                }

                foreach ($request->file('photos') as $photo)
                {
                    $name = sha1(date('YmdHis') . Str::random(30)) . '.' . $photo->extension();
                    $photo->move(public_path() . '/photos/', $name);

                    $project->photos()->saveMany([
                        new Photo(['name' => $name])
                    ]);
                }
            }

            return redirect(route('admin.projects.index'))->with('project_updated', $project);
        }

        return redirect(route('admin.projects.index'));
    }

    public function delete(Project $project)
    {
        $project->photos()->delete();
        \File::delete(public_path('/photos/' . $project->cover));
        $project->delete();

        return redirect('/admin/projects')->with('project_deleted', "El proyecto {$project->name} ha sido eliminado");
    }
}
