# TP7DPBO2025C2

Saya Meisya Amalia dengan NIM 2309357 berjanji mengerjakan TP 7 dengan keberkahan-Nya, 
maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin. 

# Desain Program

![ERD TP 7](https://github.com/user-attachments/assets/968beb08-bcc1-43cf-a019-03ca87ead8d1)

Saya menggunakan tema klinik yang berisi 3 tabel, yaitu Pasien, Dokter, dan Appointment. Dalam tabel Pasien berisi atribut id(PK), nama, usia, alamat, dan telepon. Dalam tabel Dokter berisi atribut id(PK), nama, spesialisasi, jadwal_praktek, dan telepon. Dalam tabel Appointment terdapat atribut id(PK), pasien_id(FK), dokter_id(FK), tanggal, waktu, dan keluhan. pasien_id dan dokter_id pada tabel Appointment adalah foreign key dari tabel Pasien dan tabel Dokter.

# Alur

Pertama ada page awal, lalu disana terdapat 3 tabel yang dapat dipilih, yaitu Pasien, Dokter, dan Appointment. Saat memilih tabel Pasien maka akan muncul daftar pasien yang sudah ada sebelumnya, ada button untuk menambah pasien dan juga ada edit dan hapus, lalu ada fitur search bedasarkan nama atau alamat. Begitu juga dengan tabel lainnya, saat memilih tabel Dokter maka akan muncul daftar dokter yang ada, lalu ada button tambah doker serta ada edit dan hapus, ada juga fitur search bedasarkan nama atau spesialisasi. Saat memiilih tabel appointment akan muncul daftar appointment yang sebelumnya telah dibuat dan ada button buat appointment serta ada edit dan hapus, ada juga fitur search bedasarkan nama pasien atau nama dokter.

