@extends('layouts.master')

@section('title','Data Pegawai')

@section('content')
<section class="section-header">
    <h4 class="mb-0">Data Pegawai</h4>
</section>
<section class="section-body">
    @if (session()->has('success'))
    <div class="position-absolute" id="layer-toast" aria-live="polite" aria-atomic="true"
        style="z-index:1000; min-height: 200px;width: 300px;right:0">
        <div class="toast" id="toast-success" data-delay="5000">
            <div class="toast-header bg-success text-light">
                <strong class="mr-auto">Success</strong>
                <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-light">
                {{__(session()->get('success'))}}
            </div>
        </div>
    </div>
    @endif
    <script>
        $(function () {
            $("#toast-success").toast('show');

            $("#toast-success").on('hidden.bs.toast', function () {
                $('#layer-toast').hide();
            })
        })

    </script>
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Data Pegawai</h4>
            <a href="{{ route('tambah_pegawai') }}">
                <button class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
            </a>
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
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Data Pegawai dan Penilaian</h4>
            <a href="{{ route('input_nilai') }}">
                <button class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
            </a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered" style="width: 100%">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">No</th>
                        <th class="text-white">Nama</th>
                        <th class="text-white">C1</th>
                        <th class="text-white">C2</th>
                        <th class="text-white">C3</th>
                        <th class="text-white">C4</th>
                        <th class="text-white">C5</th>
                        <th class="text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1
                    @endphp
                    @foreach ($nilais as $nilai)
                    <tr>
                        <td>{{__($no)}}</td>
                        <td>{{__($nilai->nama)}}</td>
                        <td>{{__($nilai->C1)}}</td>
                        <td>{{__($nilai->C2)}}</td>
                        <td>{{__($nilai->C3)}}</td>
                        <td>{{__($nilai->C4)}}</td>
                        <td>{{__($nilai->C5)}}</td>
                        <td class="d-flex">
                            <form action="{{ route('edit_nilai') }}" method="post" class="mr-2">
                                @csrf
                                <input type="text" name='id' hidden value="{{__($nilai->id)}}">
                                <button class="btn btn-warning" type="submit" data-target="tooltip" title="Edit">
                                    <i class="fas fa-cog" id="gear"></i>
                                </button>
                            </form>
                            <button class="btn btn-danger" data-toggle="modal"
                                data-target="{{__('#delete_nilai_'.$nilai->id)}}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @php
                    $no+=1
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('modal')
@foreach ($pegawais as $pegawai)
<div class="modal fade" id={{__('delete_'.$pegawai->id)}} tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Pegawai
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-circle text-warning mb-2" style="font-size: 100px"></i>
                <p class="text-uppercase mb-0">Apa Kamu Yakin?</p>
                <p class="mb-0 text-danger">Note: Data yang dihapus akan hilang permanen</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
                <form action="{{route('delete_pegawai')}}" method="POST" class="w-100">
                    @method('delete')
                    @csrf
                    <input type="text" name="id" value="{{__($pegawai->id)}}" hidden>
                    <button type="submit" class="btn btn-danger w-100">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($nilais as $nilai)
<div class="modal fade" id={{__('delete_nilai_'.$nilai->id)}} tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Nilai
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-circle text-warning mb-2" style="font-size: 100px"></i>
                <p class="text-uppercase mb-0">Apa Kamu Yakin?</p>
                <p class="mb-0 text-danger">Note: Data yang dihapus akan hilang permanen</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
                <form action="{{route('delete_nilai')}}" method="POST" class="w-100">
                    @method('delete')
                    @csrf
                    <input type="text" name="id" value="{{__($nilai->id)}}" hidden>
                    <button type="submit" class="btn btn-danger w-100">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
