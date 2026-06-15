# KİTAKS - Web Tabanlı Kitap Takas Sistemi 📚🔄

KİTAKS, kullanıcıların ellerindeki kitapları sisteme ekleyerek diğer kullanıcılarla güvenli ve kolay bir şekilde takas etmesini sağlayan modüler bir web uygulamasıdır.

## 🛠️ Kullanılan Teknolojiler
* **Backend:** PHP
* **Frontend:** HTML5, CSS3, JavaScript
* **Veritabanı:** MySQL

## 📁 Klasör Yapısı
* `css/` - Sayfa tasarımları (Stil dosyaları)
* `db/` - Veritabanı bağlantısı (`baglanti.php`) ve veritabanı şeması (`kitaptakas.sql`)
* `img/` - Logo ve arka plan görselleri
* `php/` - Dinamik arka plan sayfaları ve yönlendirmeler
* `index.php` - Projenin ana giriş sayfası

## 🚀 Kurulum ve Çalıştırma Talimatları

Projeyi bilgisayarınızda çalıştırmak için lütfen aşağıdaki adımları takip edin:

### 1. Kodların Yerleştirilmesi
* İndirdiğiniz `kitaptakas` proje klasörünü `xampp/htdocs/` klasörünün içerisine atın.
* XAMPP panelinden **Apache** ve **MySQL** servislerini başlatın.

### 2. Veritabanının Kurulması
* Tarayıcınızdan `localhost/phpmyadmin` adresine gidin.
* **`kitaptakas`** adında yeni bir veritabanı oluşturun.
* Oluşturduğunuz veritabanına tıklayıp üst menüden **"İçe Aktar" (Import)** sekmesine gelin.
* Projenin içindeki **`db/kitaptakas.sql`** dosyasını seçip sayfanın altındaki **"Git" (Go)** butonuna basarak tabloları yükleyin.

### 3. Projenin Çalıştırılması
* Tarayıcınızı açın ve `localhost/kitaptakas/index.php` adresine giderek projeyi test edin.

## 👥 Test Kullanıcı Bilgileri
Sistemi hızlıca test edebilmeniz için hazır örnek hesap:
* **E-posta:** test@gmail.com | **Şifre:** 123456
