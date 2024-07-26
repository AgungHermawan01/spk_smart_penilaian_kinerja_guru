@extends('layouts.master')
@section('menuTitle')
    <h2>
        Penilaian Guru SDN Sukamulya 1</h2>
    <hr />
@endsection
@section('content')
    <div class="row">
        <!-- table section -->
        <div class="col-md-12">
            <hr />
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Persyaratan</th>
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
                                        @if ($guru->url_persyaratan !== null)
                                            @php
                                                if (!preg_match('/^http(s)?:\/\//i', $guru->url_persyaratan)) {
                                                    $guru->url_persyaratan = 'https://' . $guru->url_persyaratan;
                                                }
                                            @endphp
                                            <a href="{!! $guru->url_persyaratan !!}" target="_blank"
                                                class="btn btn-sm btn-danger">Lihat</a>
                                        @else
                                            <span class="btn btn-sm btn-secondary">Belum Menginput Persyaratan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('penilaian.store', $guru->id) }}"
                                            class="btn btn-sm btn-info">Nilai</a>
                                    </td>
                                </tr>
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
