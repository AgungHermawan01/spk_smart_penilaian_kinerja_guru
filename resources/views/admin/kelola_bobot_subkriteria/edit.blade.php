<div class="modal fade" id="editBobotSubkriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perbarui Bobot Subkriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEditBobotSubkriteria">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Batas Atas</label>
                        <input type="number" class="form-control" name="batas_atas" id="batas_atas"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Batas Bawah</label>
                        <input type="number" class="form-control" name="batas_bawah" id="batas_bawah"
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
                <button type="button" onclick="formConfirmation('Perbarui bobot?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        async function getDataBobotSubkriteria(id) {
            document.getElementById('formEditBobotSubkriteria').reset();
            const url = `{{ url('dashboard/kelola_bobot_subkriteria/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('batas_atas').value = json.batas_atas;
                document.getElementById('batas_bawah').value = json.batas_bawah;
                document.getElementById('bobot').value = json.bobot;
                document.getElementById('formEditBobotSubkriteria').action = `{{ url('dashboard/kelola_bobot_subkriteria/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush
