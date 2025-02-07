<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ActualizarDatosAAPL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actualizar:datos-aapl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Descarga y actualiza los datos de AAPL en formato JSON';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiKey = 'I3S7XIYLCLGSAATZ'; // Reemplaza con tu API key de Alpha Vantage
        $symbol = 'AAPL';
        $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol={$symbol}&outputsize=compact&apikey={$apiKey}";

        $response = Http::get($url);
        $data = $response->json();

        if (isset($data['Time Series (Daily)'])) {
            $timeSeries = $data['Time Series (Daily)'];
            
            $ohlc = [];
            $volume = [];

            foreach ($timeSeries as $date => $values) {
                $timestamp = strtotime($date) * 1000; // Convertir a milisegundos
                $ohlc[] = [
                    $timestamp,
                    floatval($values['1. open']),
                    floatval($values['2. high']),
                    floatval($values['3. low']),
                    floatval($values['4. close']),
                ];
                $volume[] = [
                    $timestamp,
                    floatval($values['5. volume']),
                ];
            }

            // Guardar los archivos JSON en el directorio public
            Storage::disk('public')->put('ohlc.json', json_encode($ohlc));
            Storage::disk('public')->put('volume.json', json_encode($volume));

            $this->info('Datos de AAPL actualizados y guardados correctamente.');
        } else {
            $this->error('No se encontraron datos para el símbolo proporcionado.');
        }

        return 0;
    }
}
