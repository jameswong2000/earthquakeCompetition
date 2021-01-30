#include <SPI.h>
#include <SD.h>
const int chipSelect = 10;   //pin of CS of SD card module
int datanum = 0;
int numfile = 0;
char fname[12];
int i=0;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  Serial.print("Initializing SD card...");
    // see if the card is present and can be initialized:
  if (!SD.begin(chipSelect)) {
    Serial.println("Card failed, or not present");
    // don't do anything more:
    return;
  }
  Serial.println("Card initialized.");
}

void loop() {
  // put your main code here, to run repeatedly:
  // open the file. note that only one file can be open at a time,
  // so you have to close this one before opening another.
  File dataFile = SD.open(fname, FILE_WRITE);
  // if the file is available, write to it:
  if (dataFile) {
    for(i=0;i<50;i++) {
    dataFile.println(i);  
    Serial.println("One data was written.");
    Serial.print("Number of data: ");
    Serial.println(datanum++);   
    sprintf(fname, "data%d.csv",numfile);
    Serial.println(fname);
    Serial.println("");
    SD.open(fname, FILE_WRITE);
    if (datanum == 10) {numfile++; datanum = 0;}
    dataFile.flush();
    dataFile.close();
  }
  }  
   // if the file isn't open, pop up an error:
  else {
   Serial.println();
    Serial.println("error opening datalog.csv");
    Serial.println("");
  }
 
}
