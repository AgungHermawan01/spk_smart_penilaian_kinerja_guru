@extends('layouts.master')
@section('menuTitle')
    <h2>Upload Url Persyaratan</h2>
    <hr />
@endsection
@section('content')
    <div class="row">
        <!-- table section -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Berkas yang perlu dipersiapkan
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Fotocopy SK kenaikan pangkat terakhir</li>
                    <li class="list-group-item">Fotocopy PAK lama (PAK terakhir)</li>
                    <li class="list-group-item">Fotocopy SKP 2 tahun terakhir</li>
                    <li class="list-group-item">Fotocopy Karpeg</li>
                    <li class="list-group-item">Fotocopy SK Penetapan NIP baru (Konversi NIP)</li>
                    <li class="list-group-item">Fotocopy STPPL (bukti pengembangan diri)</li>
                    <li class="list-group-item">Fotocopy SK mutasi/pindah tugas (jika ada)</li>
                    <li class="list-group-item">Fotocopy SK pengangkatan jabatan KS (bagi kepala sekolah)</li>
                    <li class="list-group-item">Fotocopy Sertifikat Pendidik</li>
                    <li class="list-group-item">Fotocopy SK Pembagian Tugas Mengajar (terakhir)</li>
                </ul>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    @if ($guru->url_persyaratan !== null)
                        <h4 class="text-success">Anda sudah menyimpan url berkas persyaratan</h4>
                        @php
                            if (!preg_match('/^http(s)?:\/\//i', $guru->url_persyaratan)) {
                                $guru->url_persyaratan = 'https://' . $guru->url_persyaratan;
                            }
                        @endphp
                        <a href="{!! $guru->url_persyaratan !!}" target="_blank" class="btn btn-danger">Lihat</a>
                        <hr />
                    @endif
                    <h5 class="card-title">Silahkan klik tombol dibawah untuk menyimpan url berkas persyaratan</h5>
                    <br />
                    <button type="button" class="btn btn-block btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Klik Disin
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Url Berkas Persyaratan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inputPersyaratanStore') }}" method="post">
                        @csrf
                        <input type="text" name="url_persyaratan" class="form-control"
                            placeholder="Url persyaratan disini!">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="formConfirmation('Lakukan aksi?')">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
