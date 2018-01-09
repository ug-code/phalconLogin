# phalconLogin

Project Live      => https://phalcon-login.herokuapp.com/auth

sql file          => /schemas/phalcon.sql

Virtual host name => phalcon.local 

```sh
- Yapılanlar
 Register ve login işlemi yapıldı.
 password için mail validasyonu uygulandı password min 8 karakter zorunluluğu koyuldu.
 validasyonlar hem phalcone form klasöründe yapılmış olup hemde jquery validasyon yapılmaktadır.
 post methodlarında csrf kullanıldı.
 model ve controlcu oluşturmak için  Phalcon DevTools'dan yararlanıldı.
 Template engine için volt seçildi.
```
```sh

Phalcon DevTools (3.2.12)
```sh
Environment:
  OS: Windows NT  6.3 build 9600 (Windows 8.1) i586
  PHP Version: 7.0.25
  PHP SAPI: cli
  PHP Bin: C:\xampp\php\php.exe
  PHP Extension Dir: C:\php\ext
  PHP Bin Dir: C:\php
  Loaded PHP config: C:\xampp\php\php.ini
  
Versions:
  Phalcon DevTools Version: 3.2.12
  Phalcon Version: 3.3.0
  AdminLTE Version: 2.3.6
```
```sh
Yapılacak proje: PhalconPHP kullanarak oturum açan kullanıcıya parola güncelleme işlemi yaptırma.

 

Beklenen özellikler:

Eposta ve şifre ile giriş yapılabilen bir oturum açma ekranı hazırlanır.
Kullanıcı, bilgileri ile bu ekranı kullanarak giriş yapar. 
Bilgileri doğru ise oturum açılır, yanlış ise hata mesajı verilir.
Oturum açmış kullanıcı karşısında sadece şifresini güncelleme ekranını görür.
Şifresini güncellemek isteyen kullanıcı, mevcut şifresini ve yeni şifresini girerek güncellemeyi yapar.
Şifreyi güncellerken, yeni gireceği parolayı bir policy e göre belirlemek zorunda kalır. 
Eğer bu policy e uymuyorsa hata mesajı verilir.
 

Kullanılması beklenen işler:

RegexP veya Phalcon Validation kullanımı.
Solid yaklaşım ile yazım.
OOP programlama mantığı ile yazım.
Template engine kullanımı (Örneğin: Volt veya Twig…)
Kod okunabilirliği
```
