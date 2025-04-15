<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(Request $request){
        $query = Task::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->where('user_id', auth()->user()->user_id)->latest()->get();

        return view('dashboard', compact('tasks'));
    }

    // public function index() {
    //     $tasks = Task::where('user_id', auth()->id())->get(); // Ambil hanya task milik user yang login
    //     return view('dashboard', compact('tasks')); 
    // }


    public function store (Request $request){

        $validated = $request -> validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean'
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null, 
            'completed' => $validated['completed'] ?? false, 
            'user_id' => auth()->id(),  // Ambil ID user yang sedang login
        ]);

        return redirect()->route('dashboard');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Memperbarui task
    public function update(Request $request, $id)
{
    // Ambil task berdasarkan ID
    $task = Task::findOrFail($id);

    // Validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'user_id' => 'required'    
    ]);

    // Pastikan user yang mengedit adalah pemilik task
    if ($task->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
    

    // Update task
    $task->update($validated);

    return redirect('/dashboard')->with('success', 'Task berhasil diperbarui!');
}


    // Menghapus task
    public function destroy($id)
    {

        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('dashboard')
        ->with('success', 'Task berhasil dihapus!')
        ->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
