<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Audit;
use App\Diklat;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

    }

    public function ubahIdentitas($id)
    {
        $book = User::findOrFail($id);
        return view('member.edit',  compact('book'));

    }

    public function update($id, Request $request) {
        $this->validate($request,
                [
                'name' => 'required', 
                ]);
        $book = User::findOrFail($id);
        $book->update($request->all());
        
        \Session::flash('flash_message', 'Data pegawai tealh diperbarui');
        return redirect('/home');
    }
    

    public function jadwalDiklat()
    {
        $tim = Auth::user()->timUser;
        $diklatList = Diklat::where('timDiklat', '=', $tim)->paginate(9);
        return view('jadwalDiklat')->with('diklatList', $diklatList);
    }

     public function ubahDiklat()
    {
        $tim = Auth::user()->timUser;
        $diklatList = Diklat::where('timDiklat', '=', $tim)->paginate(9);
        return view('ubahDiklat')->with('diklatList', $diklatList);
    }

    public function jadwalAudit()
    {
        $tim = Auth::user()->timUser;
        $auditList = Audit::where('timAudit', '=', $tim)->paginate(9);
        return view('jadwalAudit')->with('auditList', $auditList);
    }
}
