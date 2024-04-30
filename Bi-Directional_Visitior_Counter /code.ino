#define BLYNK_TEMPLATE_ID "TMPL0VASRm2_"
#define BLYNK_TEMPLATE_NAME "DEMO2"
#define BLYNK_AUTH_TOKEN "_a0a_3FnmQrlqhANF7scz3ST5ZbNGbDf"
#include <BlynkSimpleEsp32.h>
#include<WiFi.h>
#include<WiFiClient.h>
#include<Wire.h>
char auth[] =  "_a0a_3FnmQrlqhANF7scz3ST5ZbNGbDf";
char ssid[] = "OnePlus Nord 2T 5G";
char pass[] = "t6phmbyi";
BlynkTimer timer;
const int irPin1 = 25;  // first IR sensor input pin
const int irPin2 = 26;  // second IR sensor input pin
int countin = 0;  // counter for sensor 1
int countout = 0;  // counter for sensor 2
int now ;
int in ;
int out ;

   
void setup() {
  Blynk.begin(auth, ssid, pass);
  pinMode(irPin1, INPUT_PULLUP);
  pinMode(irPin2, INPUT_PULLUP);
  pinMode(13,OUTPUT);
  pinMode(2,OUTPUT);
  Serial.begin(115200);
    

}

void loop() {
  Blynk.run();
  int val1 = digitalRead(irPin1);
  int val2 = digitalRead(irPin2);

  if (val1 == LOW) {
    delay(100);  // debounce delay
    if (digitalRead(irPin1) == LOW) {
      countin++;
      digitalWrite(2,HIGH);
      delay(200);
      digitalWrite(2,LOW);
      Serial.print("IN sensor Count: ");
      Serial.println(countin);
      delay(1000);  // delay to prevent double counting
    }
  }

  if (val2 == LOW) {
    delay(100);  // debounce delay
    if (digitalRead(irPin2) == LOW) {
      countout++;
      digitalWrite(2,HIGH);
      delay(200);
      digitalWrite(2,LOW);
      Serial.print("OUT sensor Count: ");
      Serial.println(countout);
        delay(1000);// delay to prevent double counting
    }
  }

in=countin;
out=countout;
now=in-out;
if(now<=0)
{
  digitalWrite(13,LOW);
  Serial.println("Room EMpty");
  Serial.println("light off");
  Blynk.virtualWrite(V1,now);
  delay(1000);
}
else
{
  digitalWrite(13,HIGH);
  Serial.print("IN: ");
  Serial.print(in);
  Serial.print("Out: ");
  Serial.print(out);
  Blynk.virtualWrite(V1, now);
  delay(1000);
  
}
  
  
}
