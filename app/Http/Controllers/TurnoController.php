<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TurnoRequest;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('atencion','=','GENERAL')
                        ->orderBy('id', 'desc')->get();;
        return view('general.index',compact('users'));
    }

    public function preferencial(){
        $users = User::where('atencion','=','PREFERENCIAL')
                        ->orderBy('id', 'desc')->get();
        return view('preferencial.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnoRequest $request)
    {

        $user = User::create($request->validated());
        if($user->atencion === 'GENERAL'){
            return redirect()->route('turno.index');
        }else{
            return redirect()->route('preferencial.index');
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('turno.index');
    }

}
