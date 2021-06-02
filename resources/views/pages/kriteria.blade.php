@extends('layouts.master')

@section('title','Data kriteria')

@section('content')
<section class="section-header">
    <h4 class="mb-0">Data Kriteria</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <table id="tabelKriteria" class="table align-items-center  table-bordered w-100">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $item)
                    <tr>
                        <td>{{__($item->kode_kriteria)}}</td>
                        <td>{{__($item->nama_kriteria)}}</td>
                        <td>{{__($item->bobot)}}</td>
                        <td>
                            <form action="{{ route('edit_kriteria') }}" method="post">
                                @csrf
                                <input type="text" name="id" value="{{$item->id}}" hidden>
                                <button type="submit" class="btn btn-warning" data-toggle="tooltip"
                                    data-placement="right" title="Edit"><i id="gear" class="fas fa-cog"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(() => {
        $("#tabelKriteria").DataTable({
            ordering: false,
            searching: false,
            paging: false,
            info: false,
        })
    })

</script>
@endsection
