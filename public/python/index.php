<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Velas - AAPL con Highcharts</title>
	 <script src="https://cdn.tailwindcss.com"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
</head>
<body>

    <div class="container mx-auto px-4" id="container" style="height: 600px; min-width: 310px"></div>

    <script>
        // Cargar los datos desde los archivos JSON
        fetch('ohlc.json')
            .then(response => response.json())
            .then(ohlc => {
                fetch('volume.json')
                    .then(response => response.json())
                    .then(volume => {
                        // Configurar Highcharts
                        Highcharts.stockChart('container', {
                            rangeSelector: {
                                selected: 1
                            },
                            title: {
                                text: 'AAPL Gráfico de Velas'
                            },
                            yAxis: [{
                                labels: {
                                    align: 'right',
                                    x: -3
                                },
                                title: {
                                    text: 'Precio'
                                },
                                height: '60%',
                                lineWidth: 2,
                                resize: {
                                    enabled: true
                                }
                            }, {
                                labels: {
                                    align: 'right',
                                    x: -3
                                },
                                title: {
                                    text: 'Volumen'
                                },
                                top: '65%',
                                height: '35%',
                                offset: 0,
                                lineWidth: 2
                            }],
                            tooltip: {
                                split: true
                            },
                            series: [{
                                type: 'candlestick',
                                name: 'AAPL',
                                data: ohlc,
                                tooltip: {
                                    valueDecimals: 2
                                }
                            }, {
                                type: 'column',
                                name: 'Volumen',
                                data: volume,
                                yAxis: 1
                            }]
                        });
                    });
            });
    </script>

</body>
</html>
