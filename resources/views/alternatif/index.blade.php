@extends('layouts.main')
@section('container')
<div class="row mb-2">
    <div class="col">
        <button type="button" class="btn btn-primary" id="btn-add-data">Tambah Alternatif</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="table-alternatif" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <th>Kode</th>
                        <th>Alternatif</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/ex-script/alternatif.js"></script>
@include('/alternatif.modal-alternatif')
@endsection
