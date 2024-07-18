<div class="modal fade" id="editGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEditGuru">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">NIP Guru</label>
                        <input type="number" class="form-control" name="nip" id="nip"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nama Guru</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                       <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value=""> --> Pilih Jenis Kelamin <-- </option>
                        <option value="L"> Laki - Laki </option>
                        <option value="P"> Perempuan </option>
                       </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Perbarui data guru?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        async function getDataGuru(id) {
            document.getElementById('formEditGuru').reset();
            const url = `{{ url('dashboard/kelola_guru/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('nip').value = json.nip;
                document.getElementById('nama').value = json.nama;
                document.getElementById('jenis_kelamin').value = json.jenis_kelamin;
                document.getElementById('alamat').value = json.alamat;
                document.getElementById('formEditGuru').action = `{{ url('dashboard/kelola_guru/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush
