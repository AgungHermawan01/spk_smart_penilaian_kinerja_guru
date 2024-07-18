<div class="modal fade" id="tambahBobotSubkriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Subkriteria {{ $subkriteria->subkriteria }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelola_bobot_subkriteria.store', $subkriteria->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Batas Atas</label>
                        <input type="number" class="form-control" name="batas_atas" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Batas Bawah</label>
                        <input type="number" class="form-control" name="batas_bawah" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Bobot</label>
                        <input type="number" class="form-control" name="bobot" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Tambah bobot subkriteria baru?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
