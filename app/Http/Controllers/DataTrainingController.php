<?php

namespace App\Http\Controllers;

use App\Models\DataTesting;
use App\Models\DataTraining;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DataTrainingController extends Controller
{
    //
    public function tambahDataTraining(Request $request)
    {

        try {
            $dataTraining = DataTraining::create([
                'nama' => $request->input('nama'),
                'asalSekolah' => $request->input('asalSekolah'),
                'rataRapor' => $request->input('rataRapor'),
                'penghasilanOrtu' => $request->input('penghasilanOrtu'),
                'tanggunganOrtu' => $request->input('tanggunganOrtu'),
                'riwayatOrganisasi' => $request->input('riwayatOrganisasi'),
                'riwayatPrestasi' => $request->input('riwayatPrestasi'),
                'KIP' => $request->input('KIP'),
                'Klasifikasi' => $request->input('Klasifikasi'),
            ]);

            $dataTraining->save();

            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function getDataTraining()
    {
        $training = DataTraining::all();
        return view('admin.dataTraining')->with('training', $training);
    }

    public function deleteDataTraining($id)
    {
        $training = DataTraining::find($id);

        if (!$training) {
            return redirect('Data-Training')->with('error', 'Data tidak ditemukan');
        }

        $deleteData = $training->delete();

        if ($deleteData) {
            return redirect('Data-Training')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('Data-Training')->with('error', 'Data gagal dihapus');
        }
    }

    public function updateDataTraining(Request $request, $id)
    {
        try {
            $dataTraining = DataTraining::findOrFail($id);

            $dataTraining->update([
                'nama' => $request->input('nama'),
                'asalSekolah' => $request->input('asalSekolah'),
                'rataRapor' => $request->input('rataRapor'),
                'penghasilanOrtu' => $request->input('penghasilanOrtu'),
                'tanggunganOrtu' => $request->input('tanggunganOrtu'),
                'riwayatOrganisasi' => $request->input('riwayatOrganisasi'),
                'riwayatPrestasi' => $request->input('riwayatPrestasi'),
                'KIP' => $request->input('KIP'),
                'Klasifikasi' => $request->input('Klasifikasi'),
            ]);

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function normalisasiData()
    {
        // Ambil data dari database
        $training = DataTraining::all();
        $testing = DataTesting::all();

        // Lakukan normalisasi dan perhitungan jarak pada data
        $normalizedData1 = [];
        $normalizedData2 = [];

        $normalizedData = [
            'normalizedData1' => [],
            'normalizedData2' => [],
        ];
        foreach ($training as $data) {
            // Lakukan normalisasi sesuai dengan formula normalisasi yang sesuai dengan kebutuhan Anda
            // Contoh normalisasi sederhana (misalnya untuk atribut rataRapor dan penghasilanOrtu):
            $normalizedRataRapor = ($data->rataRapor - 1) / (100 - 1); // Contoh normalisasi ke rentang [0, 1]
            $normalizedPenghasilanOrtu = ($data->penghasilanOrtu - 2000000) / (10000000 - 2000000); // Contoh normalisasi ke rentang [0, 1]

            $nilai = $data->rataRapor;
            if ($data['rataRapor'] >= 75) {
                $nilai = "Diterima";
            } else {
                $nilai = "Ditolak";
            }

            $penghasilan = $data->penghasilanOrtu;
            if ($data['penghasilanOrtu'] > 4000000) {
                # code...
                $penghasilan = 1;
            } else if ($data['penghasilanOrtu'] >= 3000000) {
                $penghasilan = 2;
            } else if ($data['penghasilanOrtu'] >= 2000000) {
                $penghasilan = 3;
            } else if ($data['penghasilanOrtu'] >= 1000000) {
                $penghasilan = 4;
            } else {
                $penghasilan = 5;
            }
            // Lakukan perhitungan jarak (misalnya menggunakan Euclidean distance)
            // Ganti dengan formula jarak yang sesuai dengan kebutuhan Anda
            $jarak = sqrt(pow($normalizedRataRapor - 0.5, 2) + pow($normalizedPenghasilanOrtu - 0.7, 2));

            // Tambahkan data hasil normalisasi dan jarak ke dalam array
            // $normalizedData1[] = [
            $normalizedData['normalizedData1'][] = [
                'nama' => $data->nama,
                'asalSekolah' => $data->asalSekolah,
                'rataRapor' => $data->rataRapor,
                // 'penghasilanOrtu' => $data->penghasilanOrtu,
                'penghasilanOrtu' => $penghasilan,
                'tanggunganOrtu' => $data->tanggunganOrtu,
                'riwayatOrganisasi' => $data->riwayatOrganisasi,
                'riwayatPrestasi' => $data->riwayatPrestasi,
                'KIP' => $data->KIP,
                'Klasifikasi' => $nilai,
                'jarak' => $jarak,
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        }
        foreach ($testing as $data) {
            // Lakukan normalisasi sesuai dengan formula normalisasi yang sesuai dengan kebutuhan Anda
            // Contoh normalisasi sederhana (misalnya untuk atribut rataRapor dan penghasilanOrtu):
            $normalizedRataRapor = ($data->rataRapor - 1) / (100 - 1); // Contoh normalisasi ke rentang [0, 1]
            $normalizedPenghasilanOrtu = ($data->penghasilanOrtu - 2000000) / (10000000 - 2000000); // Contoh normalisasi ke rentang [0, 1]

            // Lakukan perhitungan jarak (misalnya menggunakan Euclidean distance)
            // Ganti dengan formula jarak yang sesuai dengan kebutuhan Anda
            $jarak = sqrt(pow($normalizedRataRapor - 0.5, 2) + pow($normalizedPenghasilanOrtu - 0.7, 2));

            // Tambahkan data hasil normalisasi dan jarak ke dalam array
            // $normalizedData2[] = [
            $normalizedData['normalizedData2'][] = [
                'nama2' => $data->nama,
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        }
        // $normalizedData = array_merge($normalizedData1, $normalizedData2);

        // Kirim data hasil normalisasi sebagai response JSON


        // Kirim data hasil normalisasi sebagai response JSON
        return response()->json($normalizedData);
        // return response()->json($normalizedData2);

        // Kirim data hasil normalisasi sebagai response JSON
        // $response1 = response()->json($normalizedData1);
        // $response2 = response()->json($normalizedData2);

        // return [$response1, $response2];
    }
}
