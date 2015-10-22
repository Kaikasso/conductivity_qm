from flask import Flask
app = Flask(__name__)

@app.route("/")
def hello():
	return "Hola Quimicas!"

if __name__ == "__main__":
	app.run(host='0.0.0.0', port=81, debug=True)

	
