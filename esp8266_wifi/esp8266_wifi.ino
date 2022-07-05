#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Wire.h>

 
char* ssid = "****************";
char* password =  "**************";


String serverName = "http://*****************";
String data,remarks;

const int trig = 5;
const int echo = 4;

double measureDistance()
{
  digitalWrite(trig, LOW);
  delayMicroseconds(2);
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);
  double duration = pulseIn(echo, HIGH);
  double distance = duration * 0.034 / 2;
  Serial.print("Distance: ");
  Serial.println(distance);
  return distance;
}

void send_to_server(String postData) {
  
  if (WiFi.status() == WL_CONNECTED) 
  {
      WiFiClient clientt;
      HTTPClient http;
      
      // Your Domain name with URL path or IP address with path
      http.begin(clientt, serverName);        //Specify request destination
      
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

      Serial.print("post data: ");
      Serial.println(postData);
      
      int httpCode = http.POST(postData);   //Send the request
  
      if (httpCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpCode);

        String payload = http.getString();
        Serial.print("Payload: ");
        Serial.println(payload);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpCode);
      }
      // Free resources
      http.end();
    }
    
    else 
    {
      Serial.println("Error in WiFi connection");
  }

}

void setup()
{
 
  Serial.begin(9600);
  pinMode(trig, OUTPUT);
  pinMode(echo, INPUT);
 
  WiFi.begin(ssid, password);

  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Connected");
  Serial.print("IP: ");
  Serial.println(WiFi.localIP());
 
}

void loop()
{
  double distance = measureDistance();

  if(distance >= 400 || distance <= 2)
  {
    remarks = "not_working";
  }
  else if(distance >= 2)
  {
    remarks = "okay";
  }

  data = "distance=" + String(distance) + "&remarks=" + remarks + "";

  send_to_server(data);
  
  delay(4000);
}
