import pandas as pd
import mplfinance as mpf

# Leer el archivo CSV
df = pd.read_csv('AAPL_historical_data.csv', parse_dates=True, index_col=0)

# Renombrar columnas para que mplfinance las reconozca
df.rename(columns={
    'open': 'Open',
    'high': 'High',
    'low': 'Low',
    'close': 'Close',
    'volume': 'Volume'
}, inplace=True)

# Guardar el gráfico como imagen
mpf.plot(df, type='candle', style='charles', volume=True, title='AAPL Candlestick Chart',
         mav=(20, 50), show_nontrading=True, savefig='grafico_candlestick.png')
