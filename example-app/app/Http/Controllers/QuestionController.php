<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\questions;
use App\Models\quiz;
class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $type=$request->input('type');
        // $questions=questions::where('type', $type)->paginate(2);
        $type = $request->input('type');

        // Query to retrieve questions based on the selected type
        $query = questions::query();
    
        // Check if a type is selected
        if ($type) {
            $query->where('type', $type);
        }
    
        // Paginate the filtered questions
        $questions = $query->paginate(10);
        return view('questions.index',['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizzes = quiz::all();
        return view('questions.create',['quizzes'=>$quizzes]);
        

      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $questions=new questions();
        $questions->statement=$request->statement;
        $questions->option_a=$request->option_a;
        $questions->option_b=$request->option_b;
        $questions->option_c=$request->option_c;
        $questions->option_d=$request->option_d;
        $questions->answer=$request->answer;
        $questions->type=$request->type;
   
        $questions->save();
        $questions->quizzes()->attach($request->input('quizzes'));
        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $questions=questions::find($id);
        return view('questions.show',['questions'=>$questions]);
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
