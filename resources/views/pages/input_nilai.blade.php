@extends('layouts.master')

@section('title','Input nilai pegawai');

@section('content')
<section class="section-header">
    <h4 class="mb-0">Input Nilai Pegawai</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('input_nilai') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="Pegawai">Daftar Pegawai</label>
                    <select name="pegawai_id" id="select2" class="form-control" required>
                        <option disabled selected>- Pilih Pegawai -</option>
                        @foreach ($pegawais as $pegawai)
                        <option value="{{__($pegawai->id)}}">{{__($pegawai->nama)}}</option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                    <small><strong class="text-danger m-0">{{"*".$message}}</strong></small>
                    @enderror
                </div>
                @foreach ($kriterias as $kriteria)
                <div class="form-group">
                    <label class="text-capitalize"
                        for="{{__($kriteria->nama_kriteria)}}">{{__($kriteria->nama_kriteria." (".$kriteria->kode_kriteria.")")}}</label>
                    <input type="number" name="{{__($kriteria->kode_kriteria)}}" class="form-control"
                        placeholder="Masukkan nilai" min="0" max="100" required>
                </div>
                @endforeach

                <input type="submit" class="btn btn-primary" value="TAMBAH">
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(() => {
        $('#select2').select2();
    })

</script>
@endsection
