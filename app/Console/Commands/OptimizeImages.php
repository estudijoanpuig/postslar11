<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class OptimizeImages extends Command
{
    protected $signature = 'images:optimize';
    protected $description = 'Optimiza todas las imágenes en public/img y storage/app/public, incluyendo subdirectorios';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $optimizerChain = OptimizerChainFactory::create();

        // Optimizar imágenes en public/img y sus subdirectorios
        $publicImages = Storage::allFiles('public/img');
        foreach ($publicImages as $image) {
            $this->optimizeImage($image, $optimizerChain);
        }

        // Optimizar imágenes en storage/app/public y sus subdirectorios
        $storageImages = Storage::allFiles('public');
        foreach ($storageImages as $image) {
            $this->optimizeImage($image, $optimizerChain);
        }

        $this->info('Todas las imágenes han sido optimizadas.');
    }

    protected function optimizeImage($image, $optimizerChain)
    {
        if (preg_match('/\.(jpg|jpeg|png|gif|svg)$/i', $image)) {
            $optimizerChain->optimize(Storage::path($image));
            $this->info("Optimized: $image");
        }
    }
}
