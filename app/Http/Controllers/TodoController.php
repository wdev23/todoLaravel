<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Completeds = Todo::where('is_completed', true)->latest()->get();
        $Pendings = Todo::where('is_completed', false)->latest()->get();

        return view('index', compact('Completeds', 'Pendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Todo = new Todo();
        $Todo->task = $request->task;
        $Todo->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Completeds = Todo::where('is_completed', true)->latest()->get();
        $Pendings = Todo::where('is_completed', false)->latest()->get();
        $EditTodo = Todo::find($id);
        return view('index', compact('EditTodo', 'Completeds', 'Pendings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Todo = Todo::find($id);

        $Todo->task = $request->task;
        $Todo->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::destroy($id);
        return redirect('/');
    }

    public function done(string $id)
    {
        $Todo = Todo::find($id);
        $Todo->is_completed = true;
        $Todo->save();

        return redirect('/');
    }

    public function undo(string $id)
    {
        $Todo = Todo::find($id);
        $Todo->is_completed = false;
        $Todo->save();

        return redirect('/');
    }
}
