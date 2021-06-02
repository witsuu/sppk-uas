@extends('layouts.master')

@section('title','Tambah Pegawai')

@section('content')
<section class="section-header">
    <h4>Tambah Pegawai</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store_pegawai') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pangkat">NIP (Nomor Induk Pegawai)</label>
                            <input type="text" name="nip" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pangkat">Pangkat</label>
                            <input type="text" name="pangkat" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" name="golongan" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</section>
@endsection
