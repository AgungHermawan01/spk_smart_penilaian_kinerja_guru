@extends('layouts.master')
@section('menuTitle')
    <h2>Data Bobot Subkriteria {{ $subkriteria->subkriteria }}</h2>
    <hr/>
@endsection
@section('content')
<div class="row">
    <!-- table section -->
    <div class="col-md-12">
        <hr/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBobotSubkriteria">
            Tambah
        </button>
        <a href="{{ route('kelola_subkriteria.index') }}" class="btn btn-info float-end">Kembali</a>
        <hr/>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Batas Atas</th>
                            <th>Batas Bawah</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bobotSubkriterias as $no => $bobotSubkriteria)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $bobotSubkriteria->batas_atas }}</td>
                                <td>{{ $bobotSubkriteria->batas_bawah }}</td>
                                <td>{{ $bobotSubkriteria->bobot }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editBobotSubkriteria" onclick="getDataBobotSubkriteria('{{ $bobotSubkriteria->id }}')">
                                            Edit
                                        </button>
                                        <form action="{{ route('kelola_bobot_subkriteria.destroy', $bobotSubkriteria->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="formConfirmation('Hapus bobot?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h1>Data kosong</h1>
                            <hr/>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('admin.kelola_bobot_subkriteria.tambah')
@include('admin.kelola_bobot_subkriteria.edit')
@stop