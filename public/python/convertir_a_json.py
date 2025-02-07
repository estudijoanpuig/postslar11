import pandas as pd

# Leer el archivo CSV
df = pd.read_csv('AAPL_historical_data.csv', parse_dates=True, index_col=0)

# Convertir las columnas a un formato adecuado para Highcharts
df['date'] = df.index.astype(int) // 10**6  # Convertir a milisegundos desde epoch
ohlc = df[['date', 'open', 'high', 'low', 'close']].values.tolist()
volume = df[['date', 'volume']].values.tolist()

# Guardar los datos en un archivo JSON
import json
with open('ohlc.json', 'w') as f:
    json.dump(ohlc, f)
with open('volume.json', 'w') as f:
    json.dump(volume, f)

print("Datos guardados en ohlc.json y volume.json")
