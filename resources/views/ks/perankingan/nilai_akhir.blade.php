@extends('layouts.master')
@section('menuTitle')
    <h2>Nilai akhir kinerja guru Guru SDN Sukamulya 1</h2>
    <hr />
@endsection
@section('content')
    <div class="row">
        <!-- table section -->
        <div class="col-md-12">
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-stripped" id="dataTableWithExport">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Guru</th>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->kriteria }}</th>
                                @endforeach
                                <th>Total</th>
                                <th>Peringkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $peringkat = 1;
                            @endphp
                            @forelse ($urutkanHasilAkhir as $no => $value)
                                @php
                                    $namaGuru = $guru->where('id', $no)->first();
                                @endphp
                                <tr>
                                    <td>{{ $peringkat }}</td>
                                    <td>{{ $namaGuru->nama }}</td>
                                    @foreach ($nilaiAkhir[$no] as $item)
                                        <td>{{ $item }}</td>
                                    @endforeach
                                    <td>{{ $value }}</td>
                                    <td>{{ $peringkat }}</td>
                                </tr>
                                @php
                                    $peringkat = $peringkat + 1;
                                @endphp
                            @empty
                                <h1>Data guru kosong</h1>
                                <hr />
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@stop
