<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CleanUnusedImages extends Command
{
    protected $signature = 'images:clean-unused';
    protected $description = 'Eliminar imágenes no utilizadas en public/img y storage/app/public';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $usedImages = DB::table('posts')->pluck('img');

        $publicImages = Storage::allFiles('public/img');
        $storageImages = Storage::allFiles('public');

        // Función para limpiar las rutas
        function cleanPath($path) {
            return str_replace(['public/img/', 'public/'], '', $path);
        }

        // Eliminar imágenes no utilizadas en public/img
        foreach ($publicImages as $image) {
            if (!$usedImages->contains(cleanPath($image))) {
                Storage::delete($image);
                $this->info("Deleted: $image");
            }
        }

        // Eliminar imágenes no utilizadas en storage/app/public
        foreach ($storageImages as $image) {
            if (!$usedImages->contains(cleanPath($image))) {
                Storage::delete($image);
                $this->info("Deleted: $image");
            }
        }

        $this->info('Proceso de limpieza completado.');
    }
}
