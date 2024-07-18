<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEditUser">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Role User</label>
                        <select class="form-select" name="role_id" id="role_id">
                            <option>--> Pilih Role User <-- </option>
                                    @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" aria-describedby="passwordHelp">
                        <small id="passwordHelp" class="form-text text-muted text-black">Tidak perlu mengisi kolom ini jika tidak ingin mengubah password.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Perbarui data user?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        async function getDataUser(id) {
            document.getElementById('formEditUser').reset();
            const url = `{{ url('dashboard/kelola_user/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('email').value = json.email;
                document.getElementById('role_id').value = json.role_id;
                document.getElementById('formEditUser').action = `{{ url('dashboard/kelola_user/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush