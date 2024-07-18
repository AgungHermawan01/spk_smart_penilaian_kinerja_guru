@extends('layouts.master')
@section('menuTitle')
    <h2>Data Subkriteria</h2>
    <hr/>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <hr/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSubkriteria">
            Tambah
        </button>
        <hr/>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subkriteria</th>
                            <th>Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subkriterias as $no => $subkriteria)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $subkriteria->subkriteria }}</td>
                                <td>{{ $subkriteria->kriteria->kriteria }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('kelola_bobot_subkriteria.index', $subkriteria->id) }}" class="btn btn-sm btn-info">Bobot</a>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editSubkriteria" onclick="getDataSubkriteria('{{ $subkriteria->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelola_subkriteria.destroy', $subkriteria->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="formConfirmation('Hapus subkriteria {{ $subkriteria->subkriteria }}?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h1>Data subkriteria kosong</h1>
                            <hr/>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('admin.kelola_subkriteria.tambah')
@include('admin.kelola_subkriteria.edit')
@stop