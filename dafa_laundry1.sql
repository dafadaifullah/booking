
CREATE DATABASE IF NOT EXISTS dafa_laundry;
USE dafa_laundry;

CREATE TABLE dafa_admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE dafa_layanan (
    id_layanan INT AUTO_INCREMENT PRIMARY KEY,
    nama_layanan VARCHAR(100),
    harga INT
);

CREATE TABLE dafa_transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100),
    no_hp VARCHAR(20),
    id_layanan INT,
    berat FLOAT,
    total_harga INT,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_layanan) REFERENCES dafa_layanan(id_layanan)
);

INSERT INTO dafa_admin (username, password) VALUES ('admin', MD5('admin123'));

INSERT INTO dafa_layanan (nama_layanan, harga) VALUES
('Cuci Kering', 5000),
('Cuci Setrika', 8000),
('Setrika Saja', 4000),
('Laundry Ekspres', 12000);
