import requests
import pandas as pd

# Configuración
API_KEY = '96D9QB3ZMLCL4PL9'  # Tu nueva clave de API de Alpha Vantage
SYMBOL = 'AAPL'  # Símbolo de la acción, por ejemplo, AAPL para Apple
URL = f'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol={SYMBOL}&outputsize=compact&apikey={API_KEY}'

# Solicitar datos de la API
response = requests.get(URL)
data = response.json()

# Imprimir la respuesta completa para depuración
print("Respuesta de la API:", data)

# Verificar si la respuesta contiene datos
if 'Time Series (Daily)' in data:
    time_series = data['Time Series (Daily)']

    # Convertir los datos a un DataFrame de Pandas
    df = pd.DataFrame.from_dict(time_series, orient='index')
    df.index = pd.to_datetime(df.index)
    df = df.astype(float)

    # Renombrar las columnas para mayor claridad
    df.columns = [
        'open', 'high', 'low', 'close', 'volume'
    ]

    # Guardar los datos en un archivo CSV
    csv_file = f'{SYMBOL}_historical_data.csv'
    df.to_csv(csv_file)

    print(f'Los datos históricos de {SYMBOL} se han guardado en {csv_file}')
else:
    print("No se encontraron datos para el símbolo proporcionado.")
