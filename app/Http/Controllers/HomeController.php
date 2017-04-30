<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Audit;
use App\Diklat;
use App\User;
use App\JadwalAuditor;
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

    public function tambahAudit()
    {
        return view('tambahAudit');

    }

    public function tambahJadwalAuditor()
    {
        $regional = Auth::user()->regionalUser;
        //$waktuSelesaiAudit = Audit::select('waktuSelesaiAudit')->where('keteranganAudit', '=', 'Off Audit');
        //$audit = Audit::all();
      

        $diklatList = Diklat::where([
                    ['regionalDiklat', '=', $regional],
                    ['statusDiklat', '=', 'Disetujui']
                    //['waktuDiklat', '<',  $waktuSelesaiAudit],
                    //['waktuDiklat', '>',  $waktuMulaiAudit]
                ])->paginate(9);
        return view('tambahJadwalAuditor')->with('diklatList', $diklatList);
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

    public function ubahAuditPerID($id)
    {
        $book = Audit::findOrFail($id);
        return view('ubahAuditPerID',  compact('book'));

    }

    public function tambahJadwalAuditorPerID($id)
    {
        $book = Diklat::findOrFail($id);
        return view('tambahJadwalAuditorPerID',  compact('book'));

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
        $response = (Auth::user()->role == "adminRegional");
        if($response == 1){
            return redirect('/ubahDiklat');
        }
        else{
            return redirect('/approveDiklat');
        }

    }

    public function updateAudit($id, Request $request) {
        $this->validate($request,
                [
                'waktuMulaiAudit' => 'required', 
                ]);
        $book = Audit::findOrFail($id);
        $book->update($request->all());
        
        \Session::flash('flash_message', 'Data audit telah diperbarui');
        return redirect('/jadwalAudit');
    }
    
    

    public function jadwalDiklat()
    {
        $regional = Auth::user()->regionalUser;
        $diklatList = Diklat::where('regionalDiklat', '=', $regional)->paginate(9);
        return view('jadwalDiklat')->with('diklatList', $diklatList);
    }

    public function ubahDiklat()
    {
        $regional = Auth::user()->regionalUser;
        $diklatList = Diklat::where('regionalDiklat', '=', $regional)->paginate(9);
        return view('ubahDiklat')->with('diklatList', $diklatList);
    }

    public function approveDiklat()
    {
        $diklatList = Diklat::all();
        return view('approveDiklat')->with('diklatList', $diklatList);
    }

    public function jadwalAudit()
    {
        $response = (Auth::user()->role == "adminRegional");
        if($response == 1){
            $regional = Auth::user()->regionalUser;
            $auditList = Audit::where('regionalAudit', '=', $regional)->paginate(9);
        }
        else{
           $auditList = Audit::paginate(9);
        }
        
        return view('jadwalAudit')->with('auditList', $auditList);
    }

    public function lihatAudit()
    {
        $regional = Auth::user()->regionalUser;
        $tim = Auth::user()->timUser;
        $auditList = Audit::where([
                                    ['regionalAudit', '=', $regional],
                                    ['timAudit', '=', $tim]
                                ])->paginate(9);
        return view('lihatAudit')->with('auditList', $auditList);
    }

    public function jadwalAuditor()
    {
        $regional = Auth::user()->regionalUser;
        $tim = Auth::user()->timUser;

        // $waktuMulaiAudit = Audit::lists('waktuMulaiAudit');
        // $waktuSelesaiAudit = Audit::lists('waktuSelesaiAudit');
        $audit = Audit::where('keteranganAudit', '=', 'Off Audit')->get();
        
        $jadwalList = JadwalAuditor::where([
                    ['regionalAuditor', '=', $regional],
                    ['timAuditor', '=', $tim]
                ])->paginate(9);
        return view('jadwalAuditor')->with('jadwalList', $jadwalList)
                                    // ->with('waktuMulaiAudit', $waktuMulaiAudit)
                                    // ->with('waktuSelesaiAudit', $waktuSelesaiAudit) 
                                    ->with('audit', $audit);
    }

    public function delete($id) {
        Diklat::find($id)->delete();
        \Session::flash('flash_message', 'Data diklat telah dihapus');
        return Redirect('/ubahDiklat');
    }

    public function deleteAudit($id) {
        Audit::find($id)->delete();
        \Session::flash('flash_message', 'Data audit telah dihapus');
        return Redirect('/jadwalAudit');
    }

    public function deleteJadwalAuditor($id) {
        JadwalAuditor::find($id)->delete();
        \Session::flash('flash_message', 'Data audit telah dihapus');
        return Redirect('/jadwalAuditor');
    }

    public function createDiklat(Request $request) {
        // validation rules
       // $diklatList = Diklat::all();
       // $yeah =0;
       // foreach ($diklatList as $diklats) {
       //     $diklat = $diklats->namaDiklat;

       //     if($_POST["namaDiklat"]==$diklat){
       //      $yeah=$yeah+1;
       //     }
       // }

       // if($yeah==0){
       // $this->validate($request,
       //          [
       //          'namaDiklat' => 'required|min:4'
       //          ]); 
        

        Diklat::create(
             
            $request->all()
            );
         
        \Session::flash('flash_message', 'Diklat baru telah ditambahkan');
        return redirect('/ubahDiklat');
        // }

        // else{
           
        //     \Session::flash('error', 'Maaf, data sudah ada, gunakan edit untuk memperbarui. Mohon cek keberadaan data terlebih dahulu!');
        //     return redirect('/tambahDiklat');
        // }
    }

    public function createAudit(Request $request) {
        // validation rules
       // $auditList = Audit::all();
       // $yeah =0;
       // foreach ($auditList as $audits) {
       //     $audit = $audits->waktuMulaiAudit;

       //     if($_POST["waktuMulaiAudit"]==$audit){
       //      $yeah=$yeah+1;
       //     }
       // }

       // if($yeah==0){
       // $this->validate($request,
       //          [
       //          'waktuMulaiAudit' => 'required'
       //          ]); 
        

        Audit::create(
             
            $request->all()
            );
         
        \Session::flash('flash_message', 'Audit baru telah ditambahkan');
        return redirect('/jadwalAudit');
        // }

        // else{
           
        //     \Session::flash('error', 'Maaf, data sudah ada, gunakan edit untuk memperbarui. Mohon cek keberadaan data terlebih dahulu!');
        //     return redirect('/jadwalAudit');
        // }
    }

    public function createJadwalAuditor(Request $request) {
        
        
        
        jadwalAuditor::create(
             
            $request->all()
            );
         
        \Session::flash('flash_message', 'Audit baru telah ditambahkan');
        return redirect('/jadwalAuditor');
    }
}
