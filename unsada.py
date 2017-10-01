# import matplotlib.pyplot as plt
# %matplotlib inlinenumbers
import numpy as np
import pandas as pd
import pickle
import pymysql
from sklearn import preprocessing, metrics
from sklearn.model_selection import train_test_split
from sklearn.neighbors import KNeighborsClassifier

#database mysql connection
mysql_cn= pymysql.connect(host='localhost', 
                port=3306,user='root', passwd='', 
                db='unsada')
unsada_df = pd.read_sql("SELECT * FROM datasets;", con=mysql_cn)
mysql_cn.close()

# Preprocessing data 
def preprocess_unsada_df(df):
    processed_df = df.copy()
    le = preprocessing.LabelEncoder()
    processed_df.jenis_kelamin = le.fit_transform(processed_df.jenis_kelamin)
    processed_df = processed_df.drop(["nama", "nim", "beasiswa"],axis=1)
    
    return processed_df

processed_df = preprocess_unsada_df(unsada_df)

X = processed_df.drop(["d_o"], axis=1).values
y = processed_df["d_o"].values

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)

# train knn algorithm
neigh = KNeighborsClassifier(n_neighbors=7)
neigh.fit(X_train, y_train)

predicted = neigh.predict(X_test)
print(predicted)
print("=============")
print(y_test)

#print accuracy
print("accuracy : ", metrics.accuracy_score(y_test, predicted))

pickle.dump( neigh, open( "unsada.p", "wb" ) )



