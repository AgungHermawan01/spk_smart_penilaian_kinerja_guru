@extends('layouts.master')
@section('menuTitle')
    <h2>Data Kriteria</h2>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <hr/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKriteria">
            Tambah
        </button>
        <hr/>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Kriteria</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kriterias as $no => $kriteria)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $kriteria->kode_kriteria }}</td>
                                <td>{{ $kriteria->kriteria }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editKriteria" onclick="getDataKriteria('{{ $kriteria->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelola_kriteria.destroy', $kriteria->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="formConfirmation('Hapus data {{ $kriteria->nama }}?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h1>Data kriteria kosong</h1>
                            <hr/>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('admin.kelola_kriteria.tambah')
@include('admin.kelola_kriteria.edit')
@stop