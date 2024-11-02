<?php

namespace App\Http\Controllers;

use App\Models\ToDoTask;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = ToDoTask::where('status_id', 1)->get(); // Yapılacaklar (status_id = 1)
        $completed = ToDoTask::where('status_id', 2)->get(); // Yapıldı (status_id = 2)
        return view('products.todo', compact('todos', 'completed'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        ToDoTask::create([
            'task' => $request->task,
            'status_id' => 1,
        ]);

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Oluşturuldu.');
    }

    public function edit(string $id)
    {
        //
    }

    public function complated(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|',
        ]);

        $todoTask = ToDoTask::findOrFail($request->input('id'));
        $todoTask->status_id = 2; // Tamamlandı durumu için status_id'yi 2 yapıyoruz
        $todoTask->save();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Tamamlandı.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $todoTask = ToDoTask::findOrFail($id);
        $todoTask->task = $request->task;
        $todoTask->save();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Güncellendi.');
    }

    public function destroy(string $id)
    {
        // Görevi bul ve sil
        $todoTask = ToDoTask::findOrFail($id);
        $todoTask->delete();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Silindi.');
    }

}
