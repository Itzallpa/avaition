# avaition
สวัสดีผู้พัฒนา และทีมงานของ Bunny Vir ทุกท่าน จากที่ท่านได้เห็นข้อความนี้แล้วเราอยากให้ท่านนั้นได้อ่านมันถึงวิธีการใช้งานเบื่องต้น ของตัวเว็บไซต์นี้ก่อน

เว็บไซต์นี้ถูกสร้างขึ้นมาจากแนวคิด ของพี่ @Itzallpa ผู้ที่เป็นคนคิดริเริ่มจากที่อยากจะทำ Virsual Airline เป็นของตัวเอง ให้เหมือนกับหลายๆสายการบินที่บินในโลกเสมือนจริง เช่น IVAO, VATSIM และเราก็ได้รวมกลุ่มกันเพื่อสร้างสรรค์ผลงานชิ้นนี้ออกมาโดยมีทีมงานที่พัฒนาและปรับปรุง เว็บไซต์ @Backers , @Bosty และได้รับการสนับสนุนแนวคิดการออกแบบจาก @Bunny จากผู้ที่เป็น Content Creator ของ IVAO

How to Use
====
1. หลังจากที่คุณได้เข้ามาที่เว็บไซต์นี้แล้ว คุณสามารถ พิพม์
```
git clone https://github.com/Itzallpa/avaition.git
```
ลงไปในช่อง Cmd, Terminal ของเครื่องคอมพิวเตอร์คุณ โดยการที่ Directory ที่คุณจะต้องลงจะต้องลงในตัวจำลองเซิร์ฟเวอร์ของเครื่องคุณ เพื่อให้ตัวเว็บไซต์สามารถใช้งานได้ ตัวอย่างเช่น
```
C:\xampp\htdocs <-- this path
```
หรือถ้าหากใช้ตัวจำลองเซิร์ฟเวอร์อื่นๆ สามารถหาได้ตามข้อมูลของตัวจำลองเซิร์ฟนั้นๆ

2. ให้คุณทำการติดตั้งฐานข้อมูล **.sql** ลงในฐานข้อมูลให้เรียบร้อย โดยไฟล์ฐานข้อมูลนั้นอยู่ใน Directory ของ
```
avaition/sql/startup_airliner.sql
```
คุณสามารถหาวิธีการติดตั้ง ได้ใน Youtube ได้เลย!

3. โดยปกติแล้วหลังจากที่คุณโหลดตัวเว็บไซต์ของเราไปจะไม่มีไฟล์สำหรับการเชื่อมต่อฐานข้อมูลให้โดยคุณสามารถสร้างไฟล์ **database.php** ลงไปที่
```
avaition/sql/
```
และข้อมูลภายในไฟล์นั้นจะเขียนดังนี้
```php
<?php

$hostName = "localhost";
$dbUser = "";
$dbPassword = ""; 
$dbName = "daname"; 
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
?>
```
```php

$hostName = <-- โดยปกติจะเปลี่ยนตาม Host ที่เรานำเว็บไปวาง แต่ถ้าทดสอบกับเครื่องตัวเอง สามารถใช้ localhost ได้เลย

$dbUser = <-- โดยปกติจะเปลี่ยนตาม Host ที่เรานำเว็บไปวาง แต่ถ้าทดสอบกับเครื่องตัวเอง สามารถใช้ root ได้เลย

$dbPassword = <- หาก Host นั้นไม่มีรหัสผ่าน สามารถปล่อยว่างไว้ได้

$dbName = <- ชื่อฐานข้อมูล
```

4. ในเรื่องของ Email คุณจำเป็นจะต้องเปลี่ยนด้วยเช่นกันเพราะอันเดิมที่เราให้ไว้นั้น มันคือของ Offcial ซึ่งจะไม่สามารถใช้ได้ จำเป็นต้องเปลี่ยนหลังเมื่อคุณทำการโหลดเว็บไปติดตั้งเรียบร้อยแล้ว สามารถหาวิธีได้ใน Youtube หรือติดต่อ [AsanRodnuan254@gmail.com](https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcRzBWVHwzWgKgHnVBXKxCSlqjdFPxvzPbvkzLDfwQfRWptrhzqlSssKPKrDnXHhHCqBKHvrL)

5. ถ้าหากคุณเป็นทีมเดียวกับกับ @Itzallpa คุณควรสร้าง Brance เพื่อเป็นการไม่เป็นผลกระทบต่อ main หรือตัวหลักของโปรเจคได้

# 
# Requirement
1. ความรู้เรื่อง HTML, CSS, JS  พื้นฐานจนถึงระดับกลาง
2. ความรู้เรื่อง PHP
3. ความรู้เรื่องการจัดการฐานข้อมูล SQL, PHPMYADMIN
4. การจัดการ SMTP เกี่ยวกับ Mail
#

***นี่เป็นข้อจำกัดโดยทั้งหมดของ ตัวเว็บไซต์นี้หากผู้พัฒนาท่านใด หรือที่เป็นทีมเดียวกับเราสามารถนำไปพัฒนาต่อได้โดยจะมีการขออนุญาต จาก @Itzallpa เพื่อไม่ให้มีปัญหาได้ภายหลัง**