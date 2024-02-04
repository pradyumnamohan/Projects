#include <Wire.h>
#include "MAX30105.h"
#include "heartRate.h"
#include "spo2_algorithm.h"

#define BLYNK_TEMPLATE_ID "TMPL39g6pm4si"
#define BLYNK_TEMPLATE_NAME "Pradyumna"
#define BLYNK_AUTH_TOKEN "YTUjb40c5TqvdiUZdVezvdTjFhPpjvXU"

#include <BlynkSimpleEsp8266.h>
#include <ESP8266WiFi.h>

char auth[] = BLYNK_AUTH_TOKEN ;
char ssid[] = "";
char pass[] = "";

MAX30105 particleSensor;
const int MQ_PIN = A0;
const byte RATE_SIZE = 4;
byte rates[RATE_SIZE];
byte rateSpot = 0;
long lastBeat = 0;
float beatsPerMinute;
int beatAvg;
int32_t spo2;
int8_t validSPO2;

#define V3 3
#define V7 7
#define V8 8

uint32_t irBuffer[100];  
uint32_t redBuffer[100]; 
int32_t bufferLength;    
int32_t heartRate;       
int8_t validHeartRate;   
void setup() 
{
  Serial.begin(115200);
  Blynk.begin(auth, ssid, pass);

  Serial.println("Initializing Heart Sensor...");
  if (!particleSensor.begin(Wire, I2C_SPEED_FAST)) 
  {
    Serial.println("MAX30105 was not found. Please check wiring/power. ");
    while (1);
  }
  Serial.println("Place your index finger on the sensor with steady pressure.");
  particleSensor.setup();
  particleSensor.setPulseAmplitudeRed(0x0A);
  particleSensor.setPulseAmplitudeGreen(0);
}

void loop()
{
  long irValue = particleSensor.getIR();
  int sensorValue = analogRead(MQ_PIN);
  float alcoholConcentration = map(sensorValue, 0, 1023, 0, 100);

  if (checkForBeat(irValue) == true) 
  {
    long delta = millis() - lastBeat;
    lastBeat = millis();
    beatsPerMinute = 60 / (delta / 1000.0);

    if (beatsPerMinute < 255 && beatsPerMinute > 20) 
    {
      rates[rateSpot++] = (byte)beatsPerMinute;
      rateSpot %= RATE_SIZE;
      beatAvg = 0;

      for (byte x = 0; x < RATE_SIZE; x++)
      {
        beatAvg += rates[x];
      }  
      beatAvg /= RATE_SIZE;
    }
  }

  bufferLength = 100;
  for (byte i = 0; i < bufferLength; i++) 
  {
    irBuffer[i] = particleSensor.getIR();
    redBuffer[i] = particleSensor.getRed();
    particleSensor.nextSample();
    delay(10);
  }

  maxim_heart_rate_and_oxygen_saturation(irBuffer, bufferLength, redBuffer, &spo2, &validSPO2, &heartRate, &validHeartRate);

  Serial.print("IR=");
  Serial.print(irValue);
  Serial.print(", BPM=");
  Serial.print(beatsPerMinute);
  Serial.print(", Avg BPM=");
  Serial.print(beatAvg);
  Serial.print(", SpO2=");
  Serial.print(spo2);
  Serial.print(", Alcohol Concentration: ");
  Serial.print(alcoholConcentration);
  Serial.println(" %");

  Blynk.virtualWrite(V8, beatsPerMinute);
  Blynk.virtualWrite(V7, spo2);
  Blynk.virtualWrite(V3, alcoholConcentration);

  delay(2000);

  if (irValue < 50000)
  {
    Serial.print(" No finger?");
  }  

  Serial.println();

  Blynk.run();
}

