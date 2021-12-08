<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    public function createKaryawan($data)
    {
        DB::table('karyawans')->insert($data);
    }

    public function editKaryawan($data)
    {
        DB::table('karyawans')->whereId($data['id'])->update([
            'image' => $data['image'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'no_telp' => $data['no_telp'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'status' => $data['status'],
        ]);
    }

    public function hapusKaryawan($data)
    {
        DB::table('karyawans')->whereId($data)->delete();
    }

}

