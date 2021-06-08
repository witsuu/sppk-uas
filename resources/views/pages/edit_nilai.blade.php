@extends('layouts.master')

@section('title','Input nilai pegawai');

@section('content')
<section class="section-header">
    <h4 class="mb-0">Edit Nilai Pegawai</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('edit_nilai') }}" method="post">
                @method('PUT')
                @csrf
                <input type="text" value="{{__($nilai->id)}}" name="id" hidden>
                <div class="form-group">
                    <label for="Pegawai">Daftar Pegawai</label>
                    @foreach ($pegawais as $pegawai)
                    @if ($nilai->pegawai_id == $pegawai->id)
                    <input type="text" value="{{$pegawai->nama}}" class="form-control" readonly>
                    @endif
                    @endforeach
                    @error('pegawai_id')
                    <small><strong class="text-danger m-0">{{"*".$message}}</strong></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="C1">Tanggung Jawab (C1)</label>
                    <input type="number" name="c1" class="form-control" placeholder="Masukkan nilai"
                        value="{{$nilai->C1}}" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="C2">Sikap Kerja (C2)</label>
                    <input type="number" name="c2" class="form-control" placeholder="Masukkan nilai"
                        value="{{$nilai->C2}}" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="C3">kedisiplinan (C3)</label>
                    <input type="number" name="c3" class="form-control" placeholder="Masukkan nilai"
                        value="{{$nilai->C3}}" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="C4">keaktifan kegiatan (C4)</label>
                    <input type="number" name="c4" class="form-control" placeholder="Masukkan nilai"
                        value="{{$nilai->C4}}" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label class="text-capitalize" for="C5">kerja sama (C5)</label>
                    <input type="number" name="c5" class="form-control" placeholder="Masukkan nilai"
                        value="{{$nilai->C5}}" min="0" max="100" required>
                </div>

                <input type="submit" class="btn btn-primary" value="SIMPAN PERUBAHAN">
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
