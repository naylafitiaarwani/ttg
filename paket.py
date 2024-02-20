import paho.mqtt.client as mqtt
import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="ttg"
)

def on_connect(client, userdata, flags, rc):
    print("Connected with result code " + str(rc))
    client.subscribe("simtesa/jarak")
    client.subscribe("simtesa/berat")

def on_message(client, userdata, msg):
    print(msg.topic + " " + str(msg.payload))
    data = msg.payload.decode('utf-8')

    cursor = db.cursor()
    sql = "UPDATE tb_volume SET tinggi = %s WHERE id = 1"
    cursor.execute(sql, (data,))
    db.commit()

    # Logika penanganan data untuk langganan tekanan
    if msg.topic == "simtesa/berat":
        handle_tekanan_data(data)

def handle_tekanan_data(data):
    # Implementasi logika penanganan data tekanan di sini
    cursor = db.cursor()
    sql = "UPDATE tb_volume SET berat = %s WHERE id = 1"
    cursor.execute(sql, (data,))
    db.commit()

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("broker.hivemq.com", 1883, 60)

client.loop_forever()
