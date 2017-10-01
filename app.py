from flask import Flask, jsonify, abort, request, make_response, url_for, render_template
from flask_cors import CORS, cross_origin
import numpy as np
import pickle


app = Flask(__name__, static_url_path = "/static")
cors = CORS(app)

@app.errorhandler(400)
def not_found(error):
    return make_response(jsonify( { 'error': 'Bad request' } ), 400)

@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify( { 'error': 'Not found' } ), 404)


# main route
# render index.html
@app.route('/', methods = ['GET'])
def index():
    return render_template('index.html')

# endpoint to predict the probability
# we restore our tensorflow model in model folder
# and use that to make a prediction
@app.route('/api/v1.0/predict', methods = ['POST'])
def predict():
   
   
    X_predict = np.float32([[request.form['ipk'], request.form['semester'], request.form['id_penghasilan'], request.form['jarak'], request.form['jenis_kelamin'], request.form['fakta'], request.form['lulus']]])

    
    ################################
    # Load pickle
    ################################

    neigh = pickle.load( open( "unsada.p", "rb" ))

    predict = neigh.predict(X_predict)
    proba = neigh.predict_proba(X_predict)


    response = {
        'endpoint': 'api/v1.0/predict',
        'method': 'POST',
        'nim': request.form['nim'],
        'beasiswa': request.form['beasiswa'],
        'ipk': request.form['ipk'],
        'semester': request.form['semester'],
        'penghasilan': request.form['id_penghasilan'],
        'jarak': request.form['jarak'],
        'percentage_do': round(proba[0][1],4),
        'percentage_not_do': round(proba[0][0],4),
        'status': int(predict)
    }

    return jsonify( { 'response': response } )

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug = True)
