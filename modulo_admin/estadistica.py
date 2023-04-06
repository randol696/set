import mysql.connector
from statistics import *

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="db_set"
)

mycursor = mydb.cursor()
mycursor.execute("SELECT nombre_curso FROM tb_misCursos")
myresult = mycursor.fetchall()
my_array=[]

for x in myresult:
 #   print(x)
 my_array.append(x)
    
#print(my_array)   
print(mode(my_array))
print(median_low(my_array))

#print(mode(x))