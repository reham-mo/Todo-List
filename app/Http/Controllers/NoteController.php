<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;
use App\Rules\Uppercase;


class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();

        return view('notes.index')->with('notes', $notes);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //// controller validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);


        $newImgName = time() . '-' . $request->title . '.' . $request->image->extension();
        
        $request->image->move(public_path('img'), $newImgName);

        $notes = Note::create([
            'title' => $request->input('title'),
            'description' =>$request->input('description'),
            'time' => implode(' ', $request->input('time')),
            'image_path' => $newImgName,
            'user_id' => auth()->user()->id
        ]);

       
   
        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = Note::findOrFail($id);

        return view('notes.show', ['notes'=> $notes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notes = Note::find($id);
   
        return view('notes.edit')->with('notes', $notes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          //// controller validation
          $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImgName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $newImgName);

        $notes = Note::where('id', $id)
               ->update([
                'title' => $request->input('title'),
                'description' =>$request->input('description'),
                'time' =>$request->input('time'),
                'image_path' => $newImgName
               ]);

        return redirect('/notes');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notes = Note::findOrFail($id);
        $notes->delete();
        return redirect('/notes');
    }
}
