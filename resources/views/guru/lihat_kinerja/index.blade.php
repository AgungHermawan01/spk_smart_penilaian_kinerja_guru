@extends('layouts.master')
@section('menuTitle')
    <h2>Nilai kinerja anda</h2>
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
                                <th>Nama</th>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->kriteria }}</th>
                                @endforeach
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ Auth::user()->guru->nama }}</td>
                                    @foreach ($nilaiAkhir as $item)
                                        <td>{{ $item }}</td>
                                    @endforeach
                                    <td>{{ array_sum($nilaiAkhir) }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@stop
