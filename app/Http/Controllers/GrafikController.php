<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GrafikController extends Controller
{
    public function index()
    {
        $fakultass = [
            'Hukum', 'Ekonomi dan Bisnis', 'Pertanian', 'Teknik', 'Isipol', 'KIP', 'Kehutanan', 'MIPA', 'Kedokteran', 'Program Pascasarjana Ilmu Lingkungan'
        ];
        // $datas = DB::table('mhs2')->get();

        $mahasiswaSakits = DB::table('mhs2')->where('Kondisi_Kesehatan', 'Tidak Sehat')->get();

        foreach ($fakultass as $key => $fakultas) {
            $data[$key]['fakultas'] = $fakultas;
            $data[$key]['rule1'] = DB::table('mhs2')->where('FAKULTAS', $fakultas)
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', '!=', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
            $data[$key]['rule2'] = DB::table('mhs2')->where('FAKULTAS', $fakultas)
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
            $data[$key]['rule3'] = DB::table('mhs2')->where('FAKULTAS', $fakultas)
                                                        ->where('Tinggal_di_kost', 'Sulit didapat')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
        }

        $lokasi['pontianak']['rule1'] = DB::table('mhs2')->where('Lokasi_Sekarang', 'Kota Pontianak')
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', '!=', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
        $lokasi['pontianak']['rule2'] = DB::table('mhs2')->where('Lokasi_Sekarang', 'Kota Pontianak')
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
        $lokasi['pontianak']['rule3'] = DB::table('mhs2')->where('Lokasi_Sekarang', 'Kota Pontianak')
                                                        ->where('Tinggal_di_kost', 'Sulit didapat')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();

        $lokasi['luar pontianak']['rule1'] = DB::table('mhs2')->where('Lokasi_Sekarang', '!=', 'Kota Pontianak')
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', '!=', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
        $lokasi['luar pontianak']['rule2'] = DB::table('mhs2')->where('Lokasi_Sekarang', '!=', 'Kota Pontianak')
                                                        ->where('Kondisi_Kesehatan', 'Tidak Sehat')
                                                        ->where('Gejala_Covid19', 'Tidak')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();
        $lokasi['luar pontianak']['rule3'] = DB::table('mhs2')->where('Lokasi_Sekarang', '!=', 'Kota Pontianak')
                                                        ->where('Tinggal_di_kost', 'Sulit didapat')
                                                        ->whereIn('Tinggal_di', ['di Kost', 'di Asrama'])->count();


        // return $data;
        // return $lokasi;

        $compact = [
            'fakultass',
            'data',
            'mahasiswaSakits',
        ];

        return view('grafik', compact($compact));
    }
}
