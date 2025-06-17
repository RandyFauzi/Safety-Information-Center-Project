<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportSOPFolders extends Command
{
    protected $signature = 'sop:import-folders';
    protected $description = 'Import semua file SOP dari folder departemen ke database';

    public function handle()
    {
        $basePath = storage_path('app/public/SOP');
        $departemenFolders = File::directories($basePath);

        foreach ($departemenFolders as $folderPath) {
            $departemen = strtoupper(basename($folderPath));
            $this->info("📁 Memproses folder departemen: $departemen");

            $files = File::files($folderPath);

            foreach ($files as $file) {
                $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);

                // Ambil tanggal dari nama file: contoh "_2025-06-15"
                preg_match('/_(\d{4}-\d{2}-\d{2})$/', $filename, $matches);
                $tanggalTerbit = $matches[1] ?? now()->toDateString();

                // Path relatif dari /storage/app/public/
                $relativePath = str_replace(storage_path('app/public/'), '', $file->getPathname());

                DB::table('sops')->insert([
                    'no_register'     => strtoupper(Str::random(10)),
                    'nama_sop'        => $filename,
                    'departemen'      => $departemen,
                    'tanggal_terbit'  => $tanggalTerbit,
                    'tanggal_update'  => now(),
                    'file_sop'        => $relativePath,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);

                $this->line("  ✅ $filename berhasil diimport.");
            }
        }

        $this->info('🎉 Semua file SOP berhasil diimport ke database.');
        return Command::SUCCESS;
    }
}
