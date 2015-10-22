import smtplib
from email.mime.text import MIMEText

def alertMe(subject, body):
	myAddress = "ignacio.garita@gmail.com"
	msg = MIMEText(body)
	msg['Subject'] = subject
	msg['From'] = myAddress
	msg['Reply-to'] = myAddress
	msg['To'] = myAddress

	server = smtplib.SMTP('smtp.gmail.com', 587)
	server.starttls()
	server.login(myAddress,'culote123')
	server.sendmail(myAddress,myAddress,msg.as_string())
	server.quit()

alertMe("Alert!", "Mandando correo por BBB!")



