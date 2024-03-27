@extends('layouts.main')
@section('container')
<div class="row mb-2">
    <div class="col">
        <button type="button" class="btn btn-primary" id="btn-add-data">Tambah Kriteria</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="table-kriteria" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('kriteria.modal-kriteria')
@include('kriteria.modal-sub-kriteria')
<script src="/ex-script/kriteria.js"></script>
@endsection
