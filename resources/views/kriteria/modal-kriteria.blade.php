<!-- Modal -->
<div class="modal fade" id="modal-kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn-close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="uuid">
                <form action="javascript:;" id="form-kriteria">
                    @csrf
                    <label for="kode">Kode</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">C</span>
                        </div>
                        <input type="number" id="kode" name="kode" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kriteria">Kriteria</label>
                        <input type="text" id="kriteria" name="kriteria" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="atribut">Atribut</label>
                        <select name="atribut" id="atribut" class="form-control">
                            <option value="" selected disabled>Pilik Kriteria</option>
                            <option value="COST">COST</option>
                            <option value="BENEFIT">BENEFIT</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bobot">Bobot</label>
                        <input type="text" id="bobot" name="bobot" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="btn-action">
            </div>
        </div>
    </div>
</div>
