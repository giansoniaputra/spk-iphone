<!-- Modal -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn-close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" id="form-register">
                    @csrf
                    <input type="hidden" name="uuid" id="current_uuid">
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Masukan Password">
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="btn-action">
            </div>
        </div>
    </div>
</div>
