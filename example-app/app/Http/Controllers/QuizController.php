<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batch;
use App\Models\quiz;
use Illuminate\Support\Facades\Auth;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizzes=quiz::with(['batch','user'])->paginate(2);
        return view('quizzes.index',['quizzes'=>$quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $batches=batch::all();
        return view('quizzes.create',['batches'=>$batches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $title = $request->input('title');
        $starting = $request->input('starting');
        $ending = $request->input('ending');
        $duration = $request->input('duration');
        $batch_id = $request->input('batch_id');
        $quiz=new quiz();
        $quiz->title=$title;
        $quiz->starting=$starting;
        $quiz->ending=$ending;
        $quiz->duration=$duration;
        $quiz->batch_id=$batch_id;
        $quiz->user_id=Auth::id();
        $quiz->save();
        return $quiz->id;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=quiz::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
