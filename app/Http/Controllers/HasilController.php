<?php

namespace App\Http\Controllers;

use App\Models\DataTesting;
use App\Models\DataTraining;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    //
    public function getHasil()
    {
        $testing = DataTraining::all();
        foreach ($testing as $data) {
            if ($data->rataRapor >= 75) {
                $data->nilai = "Diterima";
            } else {
                $data->nilai = "Ditolak";
            }
        }
        return view('admin.hasilKlasifikasi')
            ->with('testing', $testing);
    }
}
