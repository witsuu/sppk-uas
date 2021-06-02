<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Pegawai;
use App\Nilai;

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

        $nilais = Nilai::latest()->get();

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

    public function penilaian(){
        $page="nilai";

        return view('pages.penilaian',compact('page'));
    }
}
