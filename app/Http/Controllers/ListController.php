<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;

class ListController extends Controller
{
    public function index()
    {
        $lists = Lists::all();
        $waiting = Lists::where('status', 'waiting')->count();
        $onprocess = Lists::where('status', 'on-process')->count();
        $done = Lists::where('status', 'done')->count();
        return view('home', ['lists' => $lists, 'waiting' => $waiting, 'onprocess' => $onprocess, 'done' => $done]);
    }
    public function create()
    {
        return view('add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
        ]);
        Lists::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'status' => 'waiting',
        ]);

        return redirect()->to('/');
    }
    public function edit($id)
    {
        $list = Lists::find($id);
        return view('edit', ['list' => $list]);
    }
    public function update(Request $request, $id)
    {
        $list = Lists::find($id);
        $request->validate([
            'title' => 'required|min:3',
        ]);
        
        $list->update([
            'title' => $request->title,
            'detail' => $request->detail,
        ]);

        return redirect()->to('/');
    }
    public function delete($id)
    {
        $list = Lists::find($id);
        $list->delete();
        return redirect()->back();
    }

    public function onprocess($id)
    {
        $list = Lists::find($id);
        $list->status = 'on-process';
        $list->update();
        return redirect()->back();
    }


    public function done($id)
    {
        $list = Lists::find($id);
        $list->status = 'done';
        $list->update();
        return redirect()->back();
    }
}
