// I2Cdev and MPU6050 must be installed as libraries, or else the .cpp/.h files
// for both classes must be in the include path of your project
#include "I2Cdev.h"
#include "MPU6050.h"
#include <SPI.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include "Wire.h"
#include <SoftwareSerial.h>

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

float total_z = 0;
float calz = 0;
float i = 0;
float acc_z = 0;

float total_x = 0;
float calx = 0;
float acc_x = 0;

/*            Accelerometer                 */
char bt_data[] = {acc_x, acc_z} ;

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
      // initialize serial communication
    // (38400 chosen because it works as well at 8MHz as it does at 16MHz, but
    // it's really up to you depending on your project)
    Serial.begin(9600);
    BTserial.begin(9600);
    
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
    
  /*            Accelerometer                 */
        Wire.begin();
    // initialize device
    Serial.println("Initializing I2C devices...");  
    display.setTextSize(1);
    display.setTextColor(WHITE);
    display.setCursor(0,0);
    display.println("Initializing");
    display.display();
    
    accelgyro.initialize();
    // Set up offsets, first calibration   (by MPU6050_calibration)
    // 49	502	2077	76	-53	29
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
        total_z = total_z + az ;
        total_x = total_x + ax ;
        delay(50);    
       // Serial.print("the value is "); Serial.println(az);
    }
    calz = 16384-total_z/i;      //take average and let it be the value of 1G
    calx = 16384-total_x/i;      //take average and let it be the value of 1G 
 //   calz = 0;
    Serial.println(calz);
    Serial.println(calx); 
    delay(1000);
    Serial.println("Done!");
    display.println("Done!");
    display.display();
    delay(1000);
    display.clearDisplay();
    /*            Accelerometer                 */
    

    
}

void loop() {
    // read raw accel/gyro measurements from device
    accelgyro.getMotion6(&ax, &ay, &az, &gx, &gy, &gz);
   // Tmp=Wire.read()<<8|Wire.read();  // 0x41 (TEMP_OUT_H) & 0x42 (TEMP_OUT_L)

    // these methods (and a few others) are also available
    //accelgyro.getAcceleration(&ax, &ay, &az);
    //accelgyro.getRotation(&gx, &gy, &gz);

    #ifdef OUTPUT_READABLE_ACCELGYRO
        // display tab-separated accel/gyro x/y/z values
        Serial.print("a/g:\t");
        Serial.print(ax); Serial.print("\t");
        Serial.print(ay); Serial.print("\t");
        Serial.print(az+calz); Serial.print("\t");
        Serial.print(gx); Serial.print("\t");
        Serial.print(gy); Serial.print("\t");
        Serial.println(gz);
   //     Serial.print(" | Tmp = "); Serial.println((Tmp/340.00+36.53)*10000);  //equation for temperature in degrees C from datasheet
        
        
    #endif

    #ifdef OUTPUT_BINARY_ACCELGYRO
        Serial.write((uint8_t)(ax >> 8)); Serial.write((uint8_t)(ax & 0xFF));
        Serial.write((uint8_t)(ay >> 8)); Serial.write((uint8_t)(ay & 0xFF));
        Serial.write((uint8_t)(az >> 8)); Serial.write((uint8_t)(az & 0xFF));
        Serial.write((uint8_t)(gx >> 8)); Serial.write((uint8_t)(gx & 0xFF));
        Serial.write((uint8_t)(gy >> 8)); Serial.write((uint8_t)(gy & 0xFF));
        Serial.write((uint8_t)(gz >> 8)); Serial.write((uint8_t)(gz & 0xFF));
    #endif
    acc_x = (ax+calx)/16384*9.8066 ;          //find the acceleration of Z axis
    Serial.print("Acceleration of X axis = "); Serial.println(acc_x);    //print the acceleration of Z axis
 //   BTserial.print("Acceleration of X axis = "); BTserial.println(acc_x);    //print the acceleration of Z axis
    //Serial.print("Total Z axis = "); Serial.println(total_z);
    //Serial.print("mean value of Z axis = "); Serial.println(calvalue);
    acc_z = (az+calz)/16384*9.8066 ;          //find the acceleration of Z axis
    Serial.print("Acceleration of Z axis = "); Serial.println(acc_z);    //print the acceleration of Z axis
 //   BTserial.print("Acceleration of Z axis = "); BTserial.println(acc_z);    //print the acceleration of Z axis

    OLED_Display();
    BT_Display();
 //   delay(50);
      if (acc_x > acc_z) {
      Serial.print("P wave | ");        
      Serial.print(acc_x);
      Serial.print(" | ");
      Serial.println(acc_z);
    }
    else {
      Serial.print("S wave |");
      Serial.print(acc_x);
      Serial.print(" | ");
      Serial.println(acc_z);
      
    }    
   
    

}


void OLED_Display(void) {
  // OLED print type of wave
        if (acc_x > acc_z) {
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
        if (acc_x > acc_z) {
      BTserial.print("P wave |");
      BTserial.print(acc_x);
      BTserial.print("|");
      BTserial.println(acc_z);
    }
    else {
      BTserial.print("S wave |");
      BTserial.print(acc_x);
      BTserial.print("|");
      BTserial.println(acc_z);
    }      
}
  
