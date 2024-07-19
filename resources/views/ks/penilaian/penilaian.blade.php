@extends('layouts.master')
@section('menuTitle')
    <h2>Penilaian Kinerja {{ $guru->nama }}</h2>
    <hr />
@endsection
@section('content')
    <div class="row">
        <!-- table section -->
        <div class="col-md-12">
            <a href="{{ route('penilaian.index') }}" class="btn btn-info">Kembali</a>
            <hr />
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subkriteria</th>
                                <th>Kriteria</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('penilaian.store', $guru->id) }}" method="post">
                                @csrf
                                @forelse ($subkriterias as $no => $subkriteria)
                                    @php
                                        $penilaian = 0;
                                        $ada = $nilai
                                            ->where('guru_id', $guru->id)
                                            ->where('subkriteria_id', $subkriteria->id)
                                            ->first();
                                        if ($ada !== null) {
                                            $penilaian = $ada->nilai;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $subkriteria->subkriteria }}</td>
                                        <td>{{ $subkriteria->kriteria->kriteria }}</td>
                                        <td>
                                            <input type="number" class="form-control" name="nilai[]"
                                                value="{{ $penilaian }}" id="">
                                            <input type="hidden" readonly name="subkriteria_id[]" value="{{ $subkriteria->id }}" id="">
                                            <input type="hidden" readonly name="kriteria_id[]" value="{{ $subkriteria->kriteria->id }}" id="">
                                        </td>
                                    </tr>
                                @empty
                                    <h1>Data subkriteria kosong</h1>
                                    <hr />
                                @endforelse
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-end"
                        onclick="formConfirmation('Simpan nilai kinerja {{ $guru->nama_guru }}')">Simpan Nilai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
