// I2Cdev and MPU6050 must be installed as libraries, or else the .cpp/.h files
// for both classes must be in the include path of your project
#include "I2Cdev.h"
#include "MPU6050.h"
#include <SPI.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include "Wire.h"
#include <SoftwareSerial.h>
#include "pitches.h"

int m_state=0;      //  0 for no earthquake; 1 for light earthquake; 2 for moderate earthquake; 3 for large earthquakes;
float xy_raw=0;                        // raw value of P wave
float xy=0;                            //acceleration value of P wave

/*            BT                 */
SoftwareSerial BTserial(10, 11);  // RX, TX
/*            BT                 */

/*            Accelerometer                 */

// class default I2C address is 0x68
// specific I2C addresses may be passed as a parameter here
// AD0 low = 0x68 (default for InvenSense evaluation board)
// AD0 high = 0x69
MPU6050 accelgyro;
//MPU6050 accelgyro(0x69); // <-- use for AD0 high

int16_t ax, ay, az;
int16_t gx, gy, gz;
// int16_t Tmp;



// uncomment "OUTPUT_READABLE_ACCELGYRO" if you want to see a tab-separated
// list of the accel X/Y/Z and then gyro X/Y/Z values in decimal. Easy to read,
// not so easy to parse, and slow(er) over UART.
#define OUTPUT_READABLE_ACCELGYRO

// uncomment "OUTPUT_BINARY_ACCELGYRO" to send all 6 axes of data as 16-bit
// binary, one right after the other. This is very fast (as fast as possible
// without compression or data loss), and easy to parse, but impossible to read
// for a human.
//#define OUTPUT_BINARY_ACCELGYRO


bool blinkState = false;

float total_x = 0; /* calibrating */
float calx = 0; /* calibrating */
float acc_x = 0; /* calibrating */

float total_y = 0; /* calibrating */
float caly = 0; /* calibrating */
float acc_y = 0; /* calibrating */

float total_z = 0; /* calibrating */
float calz = 0; /* calibrating */
float acc_z = 0; /* calibrating */

float i = 0; /* calibrating */



/* running average */
const int numReadings=10;
int readindex = 0;
float readings_x[numReadings];
float totalx = 0;
float average_x = 0;
float readings_y[numReadings];
float totaly = 0;
float average_y = 0;
float readings_z[numReadings];
float totalz = 0;
float average_z = 0;
float ini_x;
float ini_y;
float ini_z;
int n = 0;
/* running average */

/*            OLED                */
#define OLED_RESET 4
Adafruit_SSD1306 display(OLED_RESET);

#define NUMFLAKES 10
#define XPOS 0
#define YPOS 1
#define DELTAY 2


#define LOGO16_GLCD_HEIGHT 16 
#define LOGO16_GLCD_WIDTH  16 


#if (SSD1306_LCDHEIGHT != 32)
#error("Height incorrect, please fix Adafruit_SSD1306.h!");
#endif
/*            OLED                */


void setup() {
  // put your setup code here, to run once:
      Serial.begin(9600);
      BTserial.begin(9600);
        pinMode(9, OUTPUT);     //buzzer
        

  /*            OLED                */
  // by default, we'll generate the high voltage from the 3.3v line internally! (neat!)
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C);  // initialize with the I2C addr 0x3C (for the 128x32)
  // init done
  // Clear the buffer.
  display.clearDisplay();
    
    // show logo
  display.setTextSize(3);
  display.setTextColor(WHITE);
  display.setCursor(0,0);
  display.println("420");
  display.setTextSize(1);
  display.setTextColor(WHITE);
  display.println("Enahnce Your Calm");
  display.display();
  delay(2000);
  display.clearDisplay();
  
    /*            OLED                */
    
    Wire.begin();
    // initialize device
    Serial.println("Initializing I2C devices...");  
    display.setTextSize(1);
    display.setTextColor(WHITE);
    display.setCursor(0,0);
    display.println("Initializing");
    display.display();

    /*            Accelerometer                 */
    accelgyro.initialize();
    // Set up offsets, first calibration   (by MPU6050_calibration)
    // 49  502 2077  76  -53 29
    accelgyro.setXAccelOffset(49);
    accelgyro.setYAccelOffset(502);
    accelgyro.setZAccelOffset(2077);
    accelgyro.setXGyroOffset(76);
    accelgyro.setYGyroOffset(-53);
    accelgyro.setZGyroOffset(29);


    // verify connection
     Serial.println("Testing device connections...");
     Serial.println(accelgyro.testConnection() ? "MPU6050 connection successful" : "MPU6050 connection failed");
     Serial.println("Calibrating..");
    display.println("Calibrating");
    display.display();
    
    for(i=0 ; i<200 ; i++) {                          // second calibration
        accelgyro.getAcceleration(&ax, &ay, &az);     //read data                       
        total_x = total_x + ax ;
        total_y = total_y + ay ;
        total_z = total_z + az ;
        delay(50);    
       // // Serial.print("the value is "); // Serial.println(az);
    }
    calx = 16384-total_x/i;      //take average and let it be the value of 1G
    caly = 16384-total_y/i;      //take average and let it be the value of 1G 
    calz = 16384-total_z/i;      //take average and let it be the value of 1G
     //Serial.println(calx); 
     //Serial.println(calz);
    delay(1000);
    Serial.println("Done!");
    display.println("Done!");
    display.display();
    delay(1000);
    display.clearDisplay();
     /*            Accelerometer                 */    

    /* running average */
    for (int readindex = 0; readindex<numReadings; readindex++){   //reset value
    readings_x[readindex] = 0;
    readings_y[readindex] = 0;  
    readings_z[readindex] = 0;    
}
    /* running average */   
    ini_x = ax;
    ini_y = ay;
    ini_z = az;
    Serial.println(ini_x);
    Serial.println(ini_y); 
    Serial.println(ini_z);   
}

void loop() {
  // put your main code here, to run repeatedly:

  /*              Accelerometer             */
 // read raw accel/gyro measurements from device
    accelgyro.getMotion6(&ax, &ay, &az, &gx, &gy, &gz);
   // Tmp=Wire.read()<<8|Wire.read();  // 0x41 (TEMP_OUT_H) & 0x42 (TEMP_OUT_L)

    // these methods (and a few others) are also available
    //accelgyro.getAcceleration(&ax, &ay, &az);
    //accelgyro.getRotation(&gx, &gy, &gz);
     
    #ifdef OUTPUT_READABLE_ACCELGYRO
        // display tab-separated accel/gyro x/y/z values
        // Serial.print("a/g:\t");
        // Serial.print(ax); // Serial.print("\t");
        // Serial.print(ay); // Serial.print("\t");
        // Serial.print(az+calz); // Serial.print("\t");
        // Serial.print(gx); // Serial.print("\t");
        // Serial.print(gy); // Serial.print("\t");
        // Serial.println(gz);
            #endif

    #ifdef OUTPUT_BINARY_ACCELGYRO
        Serial.write((uint8_t)(ax >> 8)); Serial.write((uint8_t)(ax & 0xFF));
        Serial.write((uint8_t)(ay >> 8)); Serial.write((uint8_t)(ay & 0xFF));
        Serial.write((uint8_t)(az >> 8)); Serial.write((uint8_t)(az & 0xFF));
        Serial.write((uint8_t)(gx >> 8)); Serial.write((uint8_t)(gx & 0xFF));
        Serial.write((uint8_t)(gy >> 8)); Serial.write((uint8_t)(gy & 0xFF));
        Serial.write((uint8_t)(gz >> 8)); Serial.write((uint8_t)(gz & 0xFF));
    #endif
    /*              Accelerometer             */
      
    running_average();  
    OLED_Display();
    BT_Display();
 //    delay(50);
    
}


void running_average(void) {

  totalx=totalx-readings_x[readindex];    //clear old values
  totaly=totaly-readings_y[readindex];    //clear old values
  totalz=totalz-readings_z[readindex];    //clear old values
  readings_x[readindex]=abs(ax - ini_x);          //take absolute value
  readings_y[readindex]=abs(ay - ini_y);          //take absolute value
  readings_z[readindex]=abs(az - ini_z);          //take absolute value
  totalx=totalx+readings_x[readindex];    //add new values
  totaly=totaly+readings_y[readindex];    //add new values
  totalz=totalz+readings_z[readindex];    //add new values
  readindex++;
  if (readindex >= numReadings) readindex=0;     //doing averages
  average_x=totalx/numReadings;
  average_y=totaly/numReadings;
  average_z=totalz/numReadings;
  if (average_x <= 0){                          //omit -ve values
    average_x = 0;                              
  }
  if (average_y <= 0){                        //omit -ve values
    average_y = 0;
  }
   if (average_z <= 0){                        //omit -ve values
    average_z = 0;
  }
     acc_x = (average_x)/16384*9.8066 ;              //raw to acceleration
     acc_y = (average_y)/16384*9.8066 ;              //raw to acceleration
     acc_z = (average_z)/16384*9.8066 ;       //raw to acceleration
  Serial.print("Raw value:");Serial.print("\t"); Serial.print(average_x); Serial.print("\t"); Serial.print(average_y); Serial.print("\t"); Serial.println(average_z); 
  Serial.print("Acceleration:"); Serial.print("\t"); Serial.print(acc_x); Serial.print("\t"); Serial.print(acc_y); Serial.print("\t");Serial.println(acc_z); 
    xy_raw= sqrt((average_x*average_x) + (average_y*average_y));
    xy= sqrt((acc_x*acc_x) + (acc_y*acc_y));
    Serial.print("xy= "); Serial.print("\t"); Serial.println(xy);
    Serial.print("xy_raw= "); Serial.print("\t"); Serial.println(xy_raw);
  
  if (xy_raw >=1000 or average_z >=1000 ) {
    n=n+1 ;
  }    else{
    n=0 ;
  }
      if (n>20){
  
       Serial.println("warning");
  //     tone(9, NOTE_G3);         //buzzer play
      digitalWrite(9, HIGH);       // buzzer play
       m_state=1;
  
}
      else{
   //    noTone(9);                 //buzzer stop
       digitalWrite(9, LOW);     //buzzer stop
       m_state=0;
      }
}

void OLED_Display(void) {
  // OLED print type of wave
//  xy= sqrt((acc_x*acc_x) + (acc_y*acc_y));
        if (xy > acc_z) {
      display.setTextSize(3);
      display.setTextColor(WHITE);
      display.setCursor(0,0);
      display.println("P wave");
      display.display();
      delay(50);
      display.clearDisplay();

    }
    else {
      display.setTextSize(3);
      display.setTextColor(WHITE);
      display.setCursor(0,0);
      display.println("S wave");
      display.display();
      delay(50);
      display.clearDisplay();

    }
}    
    
void BT_Display(void) {
  // OLED print type of wave
 // xy= sqrt((acc_x*acc_x) + (acc_y*acc_y));
        if (xy > acc_z) {
      BTserial.print("P wave |");
      BTserial.print(xy);
      BTserial.print("|");
      BTserial.println(acc_z);
    }
    else {
      BTserial.print("S wave |");
      BTserial.print(xy);
      BTserial.print("|");
      BTserial.println(acc_z);
    }      
}
