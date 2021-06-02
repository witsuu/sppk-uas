@extends('layouts.master')

@section('title','Tambah Pegawai')

@section('content')
<section class="section-header">
    <h4>Tambah Pegawai</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store_edit_pegawai') }}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="id" hidden value="{{__($pegawai->id)}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{__($pegawai->nama)}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pangkat">NIP (Nomor Induk Pegawai)</label>
                            <input type="text" name="nip" class="form-control" value="{{__($pegawai->nip)}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pangkat">Pangkat</label>
                            <input type="text" name="pangkat" class="form-control" value="{{__($pegawai->pangkat)}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" name="golongan" class="form-control" value="{{__($pegawai->golongan)}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{__($pegawai->jabatan)}}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</section>
@endsection
