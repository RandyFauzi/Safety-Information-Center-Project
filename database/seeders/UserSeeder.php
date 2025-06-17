<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/data_karyawan.xlsx');

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip baris pertama (header)
        foreach (array_slice($rows, 1) as $row) {
            User::create([
                'nik' => $row[0],
                'name' => $row[1],
                'jabatan' => $row[2],
                'departemen' => $row[3],
                'status' => 'Aktif',
                'tanggal_masuk' => now()->subDays(rand(30, 700)), // Acak 2023-2025
                'email' => $row[4] ?? strtolower(Str::slug($row[1])) . '@ppabib.com',
                'password' => Hash::make($row[0]),
                'role' => 'user',
            ]);
        }
    }
}
