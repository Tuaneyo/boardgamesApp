<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        project::create($validate);

        //project::create($inputs);
        return redirect('projects');
    }


}
