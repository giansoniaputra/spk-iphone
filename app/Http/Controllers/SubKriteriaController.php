<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'sub_kriteria' => 'required',
            'bobot' => 'required',
        ];
        $pesan = [
            'sub_kriteria.required' => 'Sub Kriseria Tidak Boleh Kosong',
            'bobot.required' => 'Bobot Tidak Boleh Kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $data = [
                'uuid' => Str::orderedUuid(),
                'kriteria_uuid' => $request->kriteria_uuid,
                'sub_kriteria' => $request->sub_kriteria,
                'bobot' => $request->bobot,
            ];
            SubKriteria::create($data);
            return response()->json(['success' => "Sub Kategori berhasil di tanbahkan"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKriteria $subKriteria, Request $request)
    {
        $query = SubKriteria::where('uuid', $request->uuid)->first();
        return response()->json(['data' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKriteria $subKriteria)
    {
        $rules = [
            'sub_kriteria' => 'required',
            'bobot' => 'required',
        ];
        $pesan = [
            'sub_kriteria.required' => 'Sub Kriseria Tidak Boleh Kosong',
            'bobot.required' => 'Bobot Tidak Boleh Kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $data = [
                'sub_kriteria' => $request->sub_kriteria,
                'bobot' => $request->bobot,
            ];
            SubKriteria::where('uuid', $request->current_uuid)->update($data);
            return response()->json(['success' => "Sub Kategori berhasil di tanbahkan"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SubKriteria $subKriteria)
    {
        SubKriteria::where('uuid', $request->uuid)->delete();
        return response()->json(['success' => "Data Berhaswi Di hapus"]);
    }

    public function dataTablesSubKriteria(Request $request)
    {
        $query = SubKriteria::where('kriteria_uuid', $request->kriteria_uuid)->get();
        return DataTables::of($query)->addColumn('action', function ($row) {
            $actionBtn =
                '
                <button class="btn btn-rounded btn-sm btn-warning text-dark edit-button" title="Edit Data" data-uuid="' . $row->uuid . '"><i class="fas fa-edit"></i></button>
                <button class="btn btn-rounded btn-sm btn-danger text-white delete-button" title="Hapus Data" data-uuid="' . $row->uuid . '" data-token="' . csrf_token() . '"><i class="fas fa-trash-alt"></i></button>';
            return $actionBtn;
        })->make(true);
    }
}
