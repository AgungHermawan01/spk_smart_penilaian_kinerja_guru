<div class="modal fade" id="editKriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formEditKriteria">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode_kriteria" id="kode_kriteria"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Kriteria</label>
                        <input type="text" class="form-control" name="kriteria" id="kriteria"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Bobot</label>
                        <input type="number" class="form-control" name="bobot" id="bobot"
                            aria-describedby="emailHelp">
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Tambah kriteria baru?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        async function getDataKriteria(id) {
            document.getElementById('formEditKriteria').reset();
            var myModal = new bootstrap.Modal(document.getElementById('editKriteria')).show();
            const url = `{{ url('dashboard/kelola_kriteria/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('kode_kriteria').value = json.kode_kriteria;
                document.getElementById('kriteria').value = json.kriteria;
                document.getElementById('bobot').value = json.bobot;
                document.getElementById('formEditKriteria').action = `{{ url('dashboard/kelola_kriteria/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush