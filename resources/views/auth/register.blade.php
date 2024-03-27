@extends('layouts.main')
@section('container')
<div class="row mb-2">
    <div class="col">
        <button type="button" class="btn btn-primary" id="btn-add-user">Tambah User</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="table-register" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/ex-script/register.js"></script>
@include('/auth.modal-register')
@endsection
