<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todofetch = Todo::all()->sortBy("completed");

        return view('home',compact('todofetch'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todo       = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success','Your todo was created .');

        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        Session::flash('success','Your todo was edit .');

        return view('edit',compact('todo'));
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
        //

        $todo = Todo::find($id);

        $todo->todo =$request->todo;

        $todo->save();

        Session::flash('success','Your todo was updated .');
        
        return redirect('/');

    }
    public function complete($id){

        $todo = Todo::find($id);
        $todo->completed = 1;

        $todo->save();

        
        return redirect('/');
    }
    public function uncomplete($id){

        $todo = Todo::find($id);
        $todo->completed = 0;

        $todo->save();
        return redirect('/');

        
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $todo = Todo::find($id);
        $todo ->delete();

        Session::flash('success','Your todo was deleted .');

        return redirect()->back();
    }
}
