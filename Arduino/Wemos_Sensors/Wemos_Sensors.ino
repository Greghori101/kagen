#include <DHT.h>
#include <ESP8266WiFi.h>

#define DHTPIN 4     // Digital pin connected to the DHT sensor
#define DHTTYPE DHT11 // Type of DHT sensor (DHT11 or DHT22)
#define MQ2PIN A0
#define IRPIN A0

const char* ssid = "hoceyne";
const char* password = "12345678";

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(115200);
  dht.begin();

  // Connect to WiFi
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());


}

void loop() {
  delay(2000); // Wait for 2 seconds between readings

  float temperature = dht.readTemperature(); // Read temperature in Celsius
  float humidity = dht.readHumidity();       // Read humidity

  // Check if any reads failed and exit early (to try again)
  if (isnan(temperature) || isnan(humidity)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  Serial.print("Temperature: ");
  Serial.print(temperature);
  Serial.print(" °C\t");
  Serial.print("Humidity: ");
  Serial.print(humidity);
  Serial.println(" %");

  int IRsensor = analogRead(IRPIN);
  Serial.println(IRsensor);
  // Map the sensor range:
  if (IRsensor < 400) {
    Serial.println("Close Fire");
  } else if ( IRsensor < 700) {
    Serial.println("Distant Fire");
  } else {
    Serial.println("No Fire");
  }
  int MQ2sensor = analogRead(MQ2PIN);
  Serial.println(MQ2sensor);
  // Map the sensor range:
  if (MQ2sensor > 250) {
    Serial.println("Smoke");
  } else {
    Serial.println("No Smoke");
  }
  
}
