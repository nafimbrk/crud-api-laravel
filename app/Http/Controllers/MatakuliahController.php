<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mk = MataKuliah::all();
        return response()->json([
            'status' => true,
            'message' => 'data berhasil didapatkan',
            'data' => $mk
        ], 200)
        ->header('Chache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
        $mk = MataKuliah::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'data berhasil dimasukkan',
            'data' => $mk
        ], 201)
        ->header('Chache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mk = MataKuliah::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'data berhasil didapatkan',
            'data' => $mk
        ], 200)
        ->header('Chache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mk = MataKuliah::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
        $mk->nama = $request->input('nama');
        $mk->sks = $request->input('sks');
        $mk->save();
        return response()->json([
            'status' => true,
            'message' => 'data berhasil diubah',
            'data' => $mk
        ], 201)
        ->header('Chache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mk = MataKuliah::findOrFail($id);
        $mk->delete();
        return response()->json([
            'status' => true,
            'message' => 'data berhasil dihapus',
            'data' => $mk
        ], 200);
    }
}
