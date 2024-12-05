<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini alın
        $todos = Todo::where('status', 0)->where('user_id', $userId)->get(); // Yapılacaklar (status_id = 1) ve user_id ile filtreleyin
        $completed = Todo::where('status', 1)->where('user_id', $userId)->get(); // Yapıldı (status_id = 2) ve user_id ile filtreleyin
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

        Todo::create([
            'task' => $request->task,
            'user_id' => Auth::id(), // Oturum açmış kullanıcının ID'sini ekleyin
        ]);

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Oluşturuldu.');
    }

    /**
     * Compalted method
     */
    public function complated(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|',
        ]);

        $todoTask = Todo::findOrFail($request->input('id'));
        $todoTask->status = 1; // Tamamlandı durumu için status'u 1 yapıyoruz
        $todoTask->save();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Tamamlandı.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $todoTask = Todo::findOrFail($id);
        $todoTask->task = $request->task;
        $todoTask->save();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Güncellendi.');
    }

    public function destroy(string $id)
    {
        // Görevi bul ve sil
        $todoTask = Todo::findOrFail($id);
        $todoTask->delete();

        return redirect()->route('todo.index')->with('success', 'Görev Başarıyla Silindi.');
    }
}
