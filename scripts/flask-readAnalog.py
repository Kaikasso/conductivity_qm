from flask import Flask, render_template
import Adafruit_BBIO.ADC as ADC
import datetime
import time

ADC.setup()

app = Flask(__name__)

@app.route("/")

def hello():
     value = ADC.read("P9_35")*1.8   
     now = datetime.datetime.now()
     timeString = now.strftime("%Y-%m-%d %H:%M")
     templateData = {
             'title': 'Quimusa.com: Datalink',
             'time': timeString,
             'phValue': value
             }
     return render_template('main.html', **templateData)

if __name__ == "__main__":
	app.run(host='0.0.0.0', port=81, debug=True)

