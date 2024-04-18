<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TeacherController extends Controller
{
    public function dashboard()
    {
        return view('teacher-dashboard');
    }

    
    public function store(Request $request)
    {
        // Validacija zahtjeva
        $request->validate([
            'title' => 'required|string|max:255',
            'naziv_rada' => 'required|string',
            'naslov_rada_eng' => 'required|string',
            'task' => 'required|string',
            'study_type' => 'required|string|in:stručni,preddiplomski,diplomski',
        ]);
    
        // Stvaranje novog zadatka
        $task = new Task();
        $task->title = $request->title;
        $task->naziv_rada = $request->naziv_rada;
        $task->naslov_rada_eng = $request->naslov_rada_eng;
        $task->zadatak = $request->task;
        $task->tip_studija = $request->study_type;
        $task->save();
    
        // Preusmjeravanje nakon spremanja zadatka
        return redirect()->back()->with('success', __('message.task_created_successfully'));
    }
    

}
