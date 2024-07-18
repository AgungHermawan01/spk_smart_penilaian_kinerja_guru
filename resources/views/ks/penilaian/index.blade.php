@extends('layouts.master')
@section('menuTitle')
    <h2>Penilaian Guru SDN Sukamulya 1</h2>
    <hr/>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <hr/>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gurus as $no => $guru)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('penilaian.store', $guru->id) }}" class="btn btn-sm btn-info">Nilai</a>
                                    </div>
                                </td>
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