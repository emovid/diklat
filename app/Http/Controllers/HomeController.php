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

    public function tambahDiklat()
    {
        return view('tambahDiklat');

    }

    public function ubahIdentitas($id)
    {
        $book = User::findOrFail($id);
        return view('member.edit',  compact('book'));

    }

    public function ubahDiklatPerID($id)
    {
        $book = Diklat::findOrFail($id);
        return view('ubahDiklatPerID',  compact('book'));

    }

    public function update($id, Request $request) {
        $this->validate($request,
                [
                'name' => 'required', 
                ]);
        $book = User::findOrFail($id);
        $book->update($request->all());
        
        \Session::flash('flash_message', 'Data member telah diperbarui');
        return redirect('/home');
    }

    public function updateDiklat($id, Request $request) {
        $this->validate($request,
                [
                'namaDiklat' => 'required', 
                ]);
        $book = Diklat::findOrFail($id);
        $book->update($request->all());
        
        \Session::flash('flash_message', 'Data diklat telah diperbarui');
        return redirect('/ubahDiklat');
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
        $diklatList = Diklat::where('timDiklat', '=', $tim)->paginate(20);
        return view('ubahDiklat')->with('diklatList', $diklatList);
    }

    public function jadwalAudit()
    {
        $tim = Auth::user()->timUser;
        $auditList = Audit::where('timAudit', '=', $tim)->paginate(9);
        return view('jadwalAudit')->with('auditList', $auditList);
    }

    public function delete($id) {
        Diklat::find($id)->delete();
        \Session::flash('flash_message', 'Data diklat telah dihapus');
        return Redirect('/ubahDiklat');
    }

    public function createDiklat(Request $request) {
        // validation rules
       $diklatList = Diklat::all();
       $yeah =0;
       foreach ($diklatList as $diklats) {
           $diklat = $diklats->namaDiklat;

           if($_POST["namaDiklat"]==$diklat){
            $yeah=$yeah+1;
           }
       }

       if($yeah==0){
       $this->validate($request,
                [
                'namaDiklat' => 'required|min:4'
                ]); 
        

        Diklat::create(
             
            $request->all()
            );
         
        \Session::flash('flash_message', 'Diklat baru telah ditambahkan');
        return redirect('/ubahDiklat');
        }

        else{
           
            \Session::flash('error', 'Maaf, data sudah ada, gunakan edit untuk memperbarui. Mohon cek keberadaan data terlebih dahulu!');
            return redirect('/tambahDiklat');
        }
    }
}
