<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batch;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter=$request->input('filter');
        $query=batch::query();
        if($filter=='empty'){
         $query->whereDoesntHave('quizzes');
        }else if($filter=='non-empty'){
            $query->whereHas('quizzes');
        }
        $batches=$query->paginate(10);
        return view('batches.index',['batches'=>$batches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');
        $starting = $request->input('starting');
       $batch=new batch();
       $batch->name=$name;
       $batch->starting=$starting;
       $batch->save();
       return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch=batch::find($id);
        return view('batches.show',['batch'=>$batch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $batch=batch::find($id);
        return view('batches.edit',['batch'=>$batch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $batch=batch::find($id);
        $name = $request->input('name');
        $starting = $request->input('starting');
       $batch->name=$name;
       $batch->starting=$starting;
       $batch->save();
       return redirect()->route('batches.show',['batch'=>$batch]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $batch=batch::find($id);
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
