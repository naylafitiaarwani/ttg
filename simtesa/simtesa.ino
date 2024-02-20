#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <PubSubClient.h>
#include <LiquidCrystal_I2C.h>
#include <Wire.h>
#include "HX711.h"
// if you don't know your display address, run an I2C scanner sketch
LiquidCrystal_I2C lcd(0x27, 16, 2);  


WiFiClient espClient;
PubSubClient client(espClient);
#define WIFI_SSID "Lab-Karyawan"
#define WIFI_PASS "@Jayapol2023"
#define MQTT_SERVER "broker.hivemq.com"
#define MQTT_PORT 1883
ESP8266WebServer Server;
const char* topic = "simtesa/jarak";
const char* topic1 = "simtesa/berat";

unsigned long _waiting = millis();
unsigned long _now;
int value = 0;
char data[50];
char data1[50];
const int trigPin = 10;
const int echoPin = 14;
#define SOUND_VELOCITY 0.034
#define CM_TO_INCH 0.393701

HX711 scale(12, 15);
  // this button will be used to reset the scale to 0.
float weight;
float calibration_factor = -101525; // for me this vlaue works just perfect 419640

long duration;
float distanceCm;
float distanceInch;

void setup_wifi() {
 Serial.println();
 Serial.print("Connecting to ");
 Serial.println(WIFI_SSID);
WiFi.begin(WIFI_SSID, WIFI_PASS);
 while (WiFi.status() != WL_CONNECTED) {
 delay(500);
 Serial.print(".");
 }
 Serial.println("");
 Serial.println("WiFi connected");
 Serial.println("IP address: ");
 Serial.println(WiFi.localIP());
}

void rootPage() {
  char content[] = "<a href=data.php</a>";
  Server.send(200, "data/php", content);
}

void callback(char* topic, byte* payload, unsigned int length){

}

void reconnect() {
 while (!client.connected()) {
 Serial.print("Attempting MQTT connection...");
 String clientId = "SIMTESA";
 clientId += String(random(0xffff), HEX);
 if (client.connect(clientId.c_str())) {
 Serial.println("connected");
 client.publish("sukses_konek", "Yess... saya terkoneksi");
 } else {
 Serial.print("failed, rc=");
 Serial.print(client.state());
 Serial.println(" try again in 5 seconds");
 delay(5000);
 }
 }
}
void setup() {
 Serial.begin(115200);
 setup_wifi();
   lcd.init();       
  lcd.backlight();
 client.setServer(MQTT_SERVER, MQTT_PORT);
 client.setCallback(callback);
  Server.on("/", rootPage);
  Serial.println("Web Server started:" + WiFi.localIP().toString()); 
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  scale.set_scale();
  scale.tare(); //Reset the scale to 0
  long zero_factor = scale.read_average(); //Get a baseline reading
}
void loop() {
 if (!client.connected()) {
 reconnect();
 }
client.loop();
  
 kirimPer2Detik();
 
 
}

void kirimPer2Detik(){

  // Clears the trigPin

   _now = millis();
  // Prints the distance on the Serial Monitor
  
  Serial.println(distanceCm);

 if(millis() - _waiting > 2000){ // Reads the echoPin, returns the sound wave travel time in microseconds
 _waiting = _now;

  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
 duration = pulseIn(echoPin, HIGH);
  
  // Calculate the distance
  distanceCm = duration * SOUND_VELOCITY/2;
  scale.set_scale(calibration_factor); //Adjust to this calibration factor
 
  weight = scale.get_units(5); 
    scale.set_scale();
    scale.tare(); 
 sprintf(data, "%.2f", distanceCm);
 sprintf(data1, "%.2f", weight);
 Serial.print("Publish message: ");
 Serial.println(data);
 Serial.println(data1);
 client.publish(topic, data);
 client.publish(topic1, data1);

    scale.set_scale();
    scale.tare(); 
 }

  lcd.setCursor(0, 0);
  lcd.print("Jarak :");
  lcd.setCursor(8, 0);
  lcd.print(distanceCm);

  lcd.setCursor(0, 1);
  lcd.print("berat :");
  lcd.setCursor(8, 1);
  lcd.print(weight);
  delay(100);
  // clears the display to print new message
  lcd.clear();

}