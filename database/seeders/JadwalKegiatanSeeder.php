<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalKegiatanModel;

class JadwalKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Identifikasi Masalah', 
            'bulan' => '1',
            'minggu' => '1',
            'status' => 'selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Studi Literatur', 
            'bulan' => '1',
            'minggu' => '2',
            'status' => 'selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Requirement Analysis', 
            'bulan' => '1',
            'minggu' => '3',
            'status' => 'belum_selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Seminar 1', 
            'bulan' => '2',
            'minggu' => '1',
            'status' => 'belum_selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'User Requirement', 
            'bulan' => '1',
            'minggu' => '4',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'Business Modelling', 
            'bulan' => '2',
            'minggu' => '1',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'System Design', 
            'bulan' => '2',
            'minggu' => '2',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'Design Arsitectur', 
            'bulan' => '2',
            'minggu' => '3',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'Design Process Model', 
            'bulan' => '2',
            'minggu' => '4',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Seminar 2', 
            'bulan' => '3',
            'minggu' => '1',
            'status' => 'belum_selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'Design Database', 
            'bulan' => '3',
            'minggu' => '1',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Tahapan',
            'nama_kegiatan' => 'Design User Interface', 
            'bulan' => '3',
            'minggu' => '2',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Implemention', 
            'bulan' => '3',
            'minggu' => '3',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Seminar 3', 
            'bulan' => '3',
            'minggu' => '1',
            'status' => 'belum_selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Testing', 
            'bulan' => '3',
            'minggu' => '4',
            'status' => 'belum_selesai',
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Sidang', 
            'bulan' => '4',
            'minggu' => '1',
            'status' => 'belum_selesai' ,
        ]);

        JadwalKegiatanModel::create([
            'jenis_label' => 'Proses',
            'nama_kegiatan' => 'Deployment', 
            'bulan' => '3',
            'minggu' => '4',
            'status' => 'belum_selesai',
        ]);
    }
}