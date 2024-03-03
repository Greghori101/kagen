#include <ESP8266WiFi.h>
#include <ArduinoJson.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "hoceyne";
const char* password = "12345678";
const char* apiEndpoint = "http://192.168.203.109/api/data"; // Change to your API endpoint

void setup() {
  Serial.begin(115200);
  delay(10);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("WiFi connected");
}

void loop() {
  StaticJsonDocument<200> doc;
  doc["key"] = 1;
  doc["temperature"] = 45;
  doc["humidity"] = 120;
  doc["flameSensor"] = 400;
  doc["smokeSensor"] = 200;
  doc["longitude"] = 80;
  doc["latitude"] = 30;

  char jsonBuffer[256];
  serializeJson(doc, jsonBuffer);

  HTTPClient http;
  http.begin(apiEndpoint);
  http.addHeader("Content-Type", "application/json");

  int httpResponseCode = http.POST(jsonBuffer);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }

  http.end();

  delay(5000); // adjust delay according to your needs
}
