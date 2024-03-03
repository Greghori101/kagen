// Sender Code
#include <SPI.h>
#include <LoRa.h>

#define SCK_PIN 13
#define MISO_PIN 12
#define MOSI_PIN 11
#define CS_PIN 4 // Replace with your chosen CS pin if different

#define LoRa_frequency 868E6 // Adjust based on your region

const char* message = "Hello from the sender!"; // Replace with your desired text

void setup() {
  Serial.begin(115200);
  while (!Serial);

  // SPI initialization
  SPI.begin();
  SPI.beginTransaction(SPISettings(10E6, MSBFIRST, SPI_MODE0));

  // LoRa module initialization
  if (!LoRa.begin(LoRa_frequency)) {
    Serial.println("LoRa initialization failed!");
    while (1); // Loop forever if initialization fails
  } else {
    Serial.println("LoRa initialization successful!");
  }

  // Set LoRa spreading factor, bandwidth, etc. (adjust these as needed)
  LoRa.setSpreadingFactor(7);
  LoRa.setSignalBandwidth(125E3);
  LoRa.setCodingRate4(4);
}

void loop() {
  // Send the message
  if (LoRa.beginPacket()) {
    LoRa.print(message);
    if (!LoRa.endPacket()) {
      Serial.println("Failed to send data packet!");
      return;
    }
    Serial.println("Sent message: " + String(message));
  } else {
    Serial.println("Failed to create packet!");
  }

  delay(5000); // Adjust delay based on desired transmission frequency
}
