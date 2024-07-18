@extends('layouts.master')
@section('menuTitle')
    <h2>Data User</h2>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $no => $user)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $user->guru->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->nama_role }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editUser" onclick="getDataUser('{{ $user->id }}')">
                                            Edit
                                        </button>
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
@include('admin.kelola_user.edit')
@stop