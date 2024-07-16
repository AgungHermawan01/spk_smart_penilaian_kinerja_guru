@extends('layouts.master')
@section('menuTitle')
    <h2>Data Guru SDN Sukamulya 1</h2>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <hr/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuru">
            Tambah
        </button>
        <hr/>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($gurus as $no => $guru)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->jenis_kelamin }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editguru" onclick="getDataGuru('{{ $guru->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelola_guru.destroy', $guru->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="formConfirmation('Hapus data {{ $guru->nama }}?')">Hapus</button>
                                        </form>
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
@include('admin.kelola_guru.tambah')
@include('admin.kelola_guru.edit')
@stop