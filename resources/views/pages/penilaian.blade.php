@extends('layouts.master')

@section('title','Penilaian')

@section('content')
<section class="section-header">
    <h4 class="mb-0">Penilaian</h4>
</section>
<section class="section-body">
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Data Pegawai</h4>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered" style="width: 100%">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">Nama</th>
                        <th class="text-white">C1</th>
                        <th class="text-white">C2</th>
                        <th class="text-white">C3</th>
                        <th class="text-white">C4</th>
                        <th class="text-white">C5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilais as $nilai)
                    <tr>
                        <td>{{__($nilai->nama)}}</td>
                        <td>{{__($nilai->C1)}}</td>
                        <td>{{__($nilai->C2)}}</td>
                        <td>{{__($nilai->C3)}}</td>
                        <td>{{__($nilai->C4)}}</td>
                        <td>{{__($nilai->C5)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Hasil Perhitungan Normalisasi</h4>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered" style="width: 100%">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">Alternatif</th>
                        <th class="text-white">C1</th>
                        <th class="text-white">C2</th>
                        <th class="text-white">C3</th>
                        <th class="text-white">C4</th>
                        <th class="text-white">C5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilais as $nilai)
                    <tr>
                        <td>{{__($nilai->nama)}}</td>
                        @php
                        $C1 = $nilai->C1/$maxC1->C1;
                        $C2 = $nilai->C2/$maxC2->C2;
                        $C3 = $nilai->C3/$maxC3->C3;
                        $C4 = $nilai->C4/$maxC4->C4;
                        $C5 = $nilai->C5/$maxC5->C5;
                        @endphp
                        <td>{!!$C1!!}</td>
                        <td>{{$C2}}</td>
                        <td>{{$C3}}</td>
                        <td>{{$C4}}</td>
                        <td>{{$C5}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Ranking</h4>
                </div>
                <div class="card-body">
                    <table id="dataTablePenilaian" class="table table-bordered" style="width: 100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">Kode</th>
                                <th class="text-white">Alternatif</th>
                                <th class="text-white">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            $ranking =array('nama'=>null,'nilai'=>0);
                            @endphp
                            @foreach ($nilais as $nilai)
                            <tr>
                                <td>{{"V".$no}}</td>
                                <td>{{$nilai->nama}}</td>
                                @php
                                $no+=1;
                                $C1 = $nilai->C1/$maxC1->C1;
                                $C2 = $nilai->C2/$maxC2->C2;
                                $C3 = $nilai->C3/$maxC3->C3;
                                $C4 = $nilai->C4/$maxC4->C4;
                                $C5 = $nilai->C5/$maxC5->C5;
                                $nilaiTotal = 0;
                                @endphp
                                @foreach ($kriterias as $kriteria)
                                @php
                                if($kriteria->kode_kriteria == "C1"){
                                $nilaiTotal += $kriteria->bobot*$C1;
                                }elseif($kriteria->kode_kriteria == "C2"){
                                $nilaiTotal += $kriteria->bobot*$C2;
                                }elseif($kriteria->kode_kriteria == "C3"){
                                $nilaiTotal += $kriteria->bobot*$C3;
                                }elseif($kriteria->kode_kriteria == "C4"){
                                $nilaiTotal += $kriteria->bobot*$C4;
                                }elseif($kriteria->kode_kriteria == "C5"){
                                $nilaiTotal += $kriteria->bobot*$C5;
                                }
                                @endphp
                                @endforeach
                                <td>{{$nilaiTotal}}</td>
                            </tr>
                            @php
                            if($ranking['nilai'] < $nilaiTotal){ $ranking['nama']=$nilai->nama;
                                $ranking['nilai'] = $nilaiTotal;
                                }
                                @endphp
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Kesimpulan</h4>
                </div>
                <div class="card-body">
                    <p>
                        {!!" Dari hasil perhitungan ranking. Maka, pegawai terbaik adalah
                        <strong>".$ranking['nama']."</strong> dengan nilai <strong>". $ranking["nilai"]."</strong>" !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
