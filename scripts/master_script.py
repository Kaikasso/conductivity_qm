from flask import Flask, render_template
import Adafruit_BBIO.ADC as ADC
import datetime
import time
import smtplib
from email.mime.text import MIMEText


ADC.setup()

app = Flask(__name__)

@app.route("/")

def hello():
     value = ADC.read("P9_33")*1.8   
     now = datetime.datetime.now()
     timeString = now.strftime("%Y-%m-%d %H:%M")
     templateData = {
             'title': 'Aguas de Proceso.com: Datalink',
             'time': timeString,
             'phValue': value
             }
     return render_template('main.html', **templateData)

if __name__ == "__main__":
	app.run(host='0.0.0.0', port=81, debug=True)

def alertMe(subject, body):
    my_address = "alerta@aguasdeproceso.com"
    customer_address = "ignacio.garita@gmail.com"
    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = my_address
    msg['Reply-to'] = my_address
    msg['To'] = my_address

    server = smtplib.SMTP('smtpout.securserver.net', 465)
    server.starttls()
    server.login(my_address,'ap_alert123')
    server.sendmail(my_address,customer_address,msg.as_string())
    server.quit()

alertMe("Alerta!", "Cliente: X_cliente. Nivel de cloro bajo")


