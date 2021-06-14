@extends('layouts.master')

@section('title','Dashboard')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Data Pegawai</h4>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered w-100">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">Nama</th>
                        <th class="text-white">NIP</th>
                        <th class="text-white">Pangkat</th>
                        <th class="text-white">Golongan</th>
                        <th class="text-white">Jabatan</th>
                        <th class="text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{__($pegawai->nama)}}</td>
                        <td>{{__($pegawai->nip)}}</td>
                        <td>{{__($pegawai->pangkat)}}</td>
                        <td>{{__($pegawai->golongan)}}</td>
                        <td>{{__($pegawai->jabatan)}}</td>
                        <td class="d-flex">
                            <form action="{{ route('edit_pegawai') }}" method="post" class="mr-2">
                                @csrf
                                <input type="text" name='id' hidden value="{{__($pegawai->id)}}">
                                <button class="btn btn-warning" type="submit" data-target="tooltip" title="Edit">
                                    <i class="fas fa-cog" id="gear"></i>
                                </button>
                            </form>
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="{{__('#delete_'.$pegawai->id)}}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
