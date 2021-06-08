<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Pegawai;
use App\Nilai;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = "dashboard";
        return view('dashboard', compact('page'));
    }

    public function kriteria(){
        $page="kriteria";

        $kriterias = Kriteria::all();

        return view('pages.kriteria',compact('page','kriterias'));
    }

    public function editKriteria(Request $req){
        $page='kriteria';

        $id = $req->id;

        $kriteria = Kriteria::where('id',$id)->first();

        return view('pages.edit_kriteria', compact('page','kriteria'));
    }

    public function storeEditBobot(Request $req){
        $req->validate([
            'bobot'=>'required|string'
        ]);

        $kriteria = Kriteria::find($req->id);

        $kriteria->bobot = $req->bobot;
        $kriteria->save();

        return redirect()->route('kriteria')->with('success','Edit berhasil');
    }

    public function pegawai(){
        $page='pegawai';

        $pegawais = Pegawai::latest()->get();

        $nilais = DB::table('nilai')
        ->select('nilai.*','pegawai.nama')
        ->join('pegawai','nilai.pegawai_id','pegawai.id')
        ->get();

        return view('pages.pegawai',compact('page','pegawais','nilais'));
    }

    public function tambahPegawai(){
        $page = 'pegawai';

        return view('pages.tambah_pegawai', compact('page'));
    }

    public function storePegawai(Request $req){
        $req->validate([
            'nama'=>'required|string',
            'nip'=>'required',
            'pangkat'=>'required',
            'golongan'=>'required',
            'jabatan'=>'required',
        ]);

        $pegawai = Pegawai::create([
            'nama'=>$req->nama,
            'nip'=>$req->nip,
            'pangkat'=>$req->pangkat,
            'golongan'=>$req->golongan,
            'jabatan'=>$req->jabatan,
        ]);

        return redirect()->route('pegawai')->with('success','Pegawai Berhasil di Tambahkan');
    }

    public function editPegawai(Request $req){
        $page = 'pegawai';

        $id = $req->id;
        $pegawai = Pegawai::find($id);

        return view('pages.edit_pegawai',compact('page','pegawai'));
    }

    public function storeEditPegawai(Request $req){
        $req->validate([
            'nama'=>'required|string',
            'nip'=>'required',
            'pangkat'=>'required',
            'golongan'=>'required',
            'jabatan'=>'required',
        ]);

        $id=$req->id;
        $pegawai= Pegawai::find($id);

        $pegawai->nama = $req->nama;
        $pegawai->nip = $req->nip;
        $pegawai->golongan = $req->golongan;
        $pegawai->pangkat = $req->pangkat;
        $pegawai->jabatan = $req->jabatan;

        $pegawai->save();

        return redirect()->route('pegawai')->with('success','Pegawai berhasil diubah');
    }

    public function deletePegawai(Request $req){
        $id = $req->id;

        $pegawai = Pegawai::find($id);

        $pegawai->delete();

        return redirect()->route('pegawai')->with('success','Pegawai berhasil dihapus');
    }

    public function showInputNilai(){
        $page = "pegawai";

        $kriterias = Kriteria::all();
        $pegawais = Pegawai::all();

        return view('pages.input_nilai', compact('page','kriterias','pegawais'));
    }

    public function storeInputNilai(Request $req){
        $req->validate([
            'pegawai_id'=>'required|unique:nilai',
        ]);

        Nilai::create([
            'pegawai_id' => $req->pegawai_id,
            'C1' => $req->C1,
            'C2' => $req->C2,
            'C3' => $req->C3,
            'C4' => $req->C4,
            'C5' => $req->C5,
        ]);

        return redirect()->route('pegawai')->with('success','Nilai Berhasil ditambah');
    }

    public function editNilai(Request $req){
        $page = "pegawai";
        $id = $req->id;

        $nilai = Nilai::find($id);
        $pegawais = Pegawai::all();

        return view('pages.edit_nilai',compact('page','nilai','pegawais'));
    }

    public function storeEditNilai(Request $req){
        $id = $req->id;

        $nilai = Nilai::find($id);

        $nilai->C1 = $req->c1;
        $nilai->C2 = $req->c2;
        $nilai->C3 = $req->c3;
        $nilai->C4 = $req->c4;
        $nilai->C5 = $req->c5;

        $nilai->save();

        return redirect()->route('pegawai')->with('success','Nilai pegawai berhasil diubah');
    }

    public function deleteNilai(Request $req){
        $id = $req->id;

        $nilai = Nilai::find($id);

        $nilai->delete();

        return redirect()->route('pegawai')->with('success','Nilai pegawai berhasil dihapus');
    }

    public function penilaian(){
        $page="nilai";

        $nilais = DB::table('nilai')
        ->select('nilai.*','pegawai.nama')
        ->join('pegawai','nilai.pegawai_id','pegawai.id')
        ->get();

        $kriterias = Kriteria::all();

        $maxC1 = Nilai::maxValue('C1');
        $maxC2 = Nilai::maxValue('C2');
        $maxC3 = Nilai::maxValue('C3');
        $maxC4 = Nilai::maxValue('C4');
        $maxC5 = Nilai::maxValue('C5');

        return view('pages.penilaian',compact('page','nilais','maxC1','maxC2','maxC3','maxC4','maxC5','kriterias'));
    }
}
