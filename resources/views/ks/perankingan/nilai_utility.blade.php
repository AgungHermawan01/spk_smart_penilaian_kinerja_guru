@extends('layouts.master')
@section('menuTitle')
    <h2>Nilai Utility kinerja guru Guru SDN Sukamulya 1</h2>
    <hr/>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Guru</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gurus as $no => $guru)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $guru->nama }}</td>
                                @foreach ($nilaiUtility[$guru->id] as $item)
                                    <td>{{ $item }}</td>
                                @endforeach
                            </tr>
                        @empty
                            <h1>Data guru kosong</h1>
                            <hr/>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@stop