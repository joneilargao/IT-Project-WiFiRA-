 // Author UB OJTs
 // Author Joneil Argao
  #include <LiquidCrystal.h>
  LiquidCrystal lcd(0, 1, 8, 9, 10, 11); // LCD PINS
  
  volatile int pulses = 0;
  volatile int value = 0;
  const int billAcceptor = 2; // Bill Acceptor PIN
  const int coinAcceptor = 3; // Coin Acceptor PIN
  int ten = 22; //10 LED
  int twenty = 23; // 20 LED
  int tenButton = 25; //10 BUTTON
  int twentyButton = 26; //20 BUTTON
  boolean displayMe = true;
  void setup() {  
    lcd.begin(16, 2); // Size of LCD Display
    lcd.print("Credits:");  
    
    pinMode(billAcceptor, INPUT_PULLUP);
    pinMode(coinAcceptor, INPUT_PULLUP);
    
    pinMode(ten,OUTPUT);
    pinMode(twenty,OUTPUT);

    pinMode(tenButton,INPUT);
    pinMode(twentyButton, INPUT);
    
    attachInterrupt(digitalPinToInterrupt(billAcceptor), countPulses, CHANGE);
    attachInterrupt(digitalPinToInterrupt(coinAcceptor), countPulses, CHANGE);


  }
void loop() {
int buttonStateTen = digitalRead(tenButton);
int buttonStateTwenty = digitalRead(twentyButton);
 if (displayMe==true){
    lcd.setCursor(0, 1); //Row Column
    lcd.print(pulses); // value of Coin/Bill inserted
    displayMe = false; 
}  
 if(pulses == 10){ // Checks if pulses = 10
 if(buttonStateTen == HIGH){ // If ten button is pressed
 digitalWrite(ten,LOW); //LED will turn off
 pulses = pulses-10; //Dercrements pulses by 10
 displayMe = true;
 Serial.begin(9600);
 Serial.println("#S|NAME1|[]#");
 Serial.end();
 lcd.clear(); //Clears LCD
 lcd.print("Credits:");
 }
}
 if(pulses == 20){ // Checks if pulses = 20
 if(buttonStateTwenty == HIGH){ // If twenty button is pressed
 digitalWrite(twenty,LOW); //LED will turn off
 pulses = pulses-20; //Decrements pulses by 20
 displayMe = true;
 Serial.begin(9600);
 Serial.println("#S|NAME2|[]#");
 Serial.end();
 lcd.clear(); //Clears LCD
 lcd.print("Credits:");
  }
 }     
}
  void countPulses() { //Loop for counting pulses
    int billValue = digitalRead(billAcceptor);
    int coinValue = digitalRead(coinAcceptor);
    if (billValue == LOW || coinValue == LOW) { //Accepts coin/bill
      pulses++; //Counts pulses. 5 peso = 5 pulse, 10 peso = 10 pulse
      displayMe = true;    
    /*  if(billValue == LOW){
        pulses--;
        } */
     if(pulses == 10){ // Checks if coin value = 10
        digitalWrite(ten,HIGH); // LED will turn on
      }
      else{
        digitalWrite(ten,LOW); // LED is off
      }
      if(pulses == 20){ // Checks if coin/bill value = 20
        digitalWrite(twenty,HIGH); // LED will turon on
      }
      else{
        digitalWrite(twenty,LOW); // LED is off
      }

    }
  }
