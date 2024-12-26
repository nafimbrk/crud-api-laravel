<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OopSekulMod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Api1_tokobuku extends Controller
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
        $validasi = Validator::make($request->all(), [
            'nim' => 'required|numeric',
            'nama' => 'required',
            'semester' => 'numeric|required',
            'ipk' =>  'numeric|required'
        ]);
        $isitable = OopSekulMod::create($request);
        if ($validasi->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Validasi gagal. Mohon masukksan lagi',
                    'errors' => $validasi->errors()
                ],
                422
            );
        } else {
            return response()->json(
                [
                    'status' => true,
                    'message' => ' data sudah sesuai',
                    'data' => $isitable
                ],
                201
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
