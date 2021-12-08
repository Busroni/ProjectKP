<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**n
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $karyawan = new Karyawan;
            
            $file = Request()->image;
            $fileName = "fileName".time().'.'.request()->image->getClientOriginalExtension();
            $file->move(public_path('image'), $fileName);
            $data = [
                'image' => $fileName,
                'nama' => Request()->nama,
                'no_telp' => Request()->no_telp,
                'tgl_lahir' => Request()->tgl_lahir,
                'alamat' => Request()->alamat,
                'email' => Request()->email,
                'status' => Request()->status,
            ];
            
            $karyawan->createKaryawan($data);
            return redirect()->route('karyawan')->with('status', 'Data siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan', [
            "karyawans" => Karyawan::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $karyawan = DB::table('karyawans')->where('id', $slug)->first();
        return view('edit', compact('karyawan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update()
    {       
        $karyawan = new Karyawan;

        $file = Request()->image;
        $fileName = "fileName".time().'.'.request()->image->getClientOriginalExtension();
        $file->move(public_path('image'), $fileName);
        $data = [
            'id'=>Request()->id,
            'image' => $fileName,
            'nama' => Request()->nama,
            'no_telp' => Request()->no_telp,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'email' => Request()->email,
            'status' => Request()->status,
        ];

        $karyawan->editKaryawan($data);
        return redirect()->route('karyawan')->with('pesan', 'Karyawan berhasil diedit !!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $karyawan = new Karyawan;

        $karyawan->hapusKaryawan($slug);
        return redirect()->route('karyawan')->with('pesan', 'data berhasil dihapus !!');
    }
}
