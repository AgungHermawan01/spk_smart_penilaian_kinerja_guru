<div class="modal fade" id="editSubkriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subkriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEditSubkriteria">
                    @method('put')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Subkriteria</label>
                        <input type="text" class="form-control" name="subkriteria" id="subkriteria"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Kriteria</label>
                        <select name="kriteria_id" class="form-select" id="kriteria_id">
                            <option value=""> --> Pilih Kriteria <-- </option>
                            @foreach ($kriterias as $kriteria)
                                <option value="{{ $kriteria->id }}">{{ $kriteria->kriteria }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Perbarui subkriteria?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        async function getDataSubkriteria(id) {
            document.getElementById('formEditSubkriteria').reset();
            const url = `{{ url('dashboard/kelola_subkriteria/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('subkriteria').value = json.subkriteria;
                document.getElementById('kriteria_id').value = json.kriteria_id;
                document.getElementById('formEditSubkriteria').action = `{{ url('dashboard/kelola_subkriteria/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush
