<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Voter;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class VotersController extends Controller
{
    public function index()
    {
        $voters = Voter::all();

        return view('admin.voters.index', compact('voters'));
    }

    public function create()
    {
        return view('admin.voters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:voters',
            'identity_id' => 'required|unique:voters',
        ]);

        $voter = new Voter;
        $voter->uuid = Uuid::uuid4();
        $voter->name = $request->get('name');
        $voter->email = $request->get('email');
        $voter->identity_id = $request->get('identity_id');
        $voter->save();

        return redirect(route('admin.projects.index'))->with('voter_created', $voter);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'identity_id' => 'required',
        ]);

        $voter = Voter::where('uuid', $request->get('uuid'))->first();

        if($voter) {
            $voter->name = $request->get('name');
            $voter->email = $request->get('email');
            $voter->identity_id = $request->get('identity_id');
            $voter->save();

            return redirect(route('admin.voters.index'))->with('voter_updated', $voter);
        }

        return redirect(route('admin.voters.index'));
    }

    public function show($uuid)
    {
        $voter = Voter::where('uuid', $uuid)->first();

        return view('admin.voters.edit', compact('voter'));
    }
}
