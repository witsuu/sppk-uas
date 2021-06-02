@extends('layouts.master')

@section('title','Data Kriteria')

@section('content')
<section class="section-header">
    <h4>Data Kriteria</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store_edit_bobot') }}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="id" value="{{__($kriteria->id)}}" hidden>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kodeKriteria">Kode</label>
                            <input type="text" class="form-control" value="{{__($kriteria->kode_kriteria)}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="namaKriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" value="{{$kriteria->nama_kriteria}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="text" class="form-control" value="{{__($kriteria->bobot)}}" name="bobot">
                </div>
                @error('bobot')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                <button class="btn btn-success">SIMPAN PERUBAHAN</button>
            </form>
        </div>
    </div>
</section>
@endsection
