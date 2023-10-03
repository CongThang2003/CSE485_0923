CREATE DATABASE QuanLyBaiHat;

-- Sử dụng cơ sở dữ liệu QuanLyBaiHat
USE QuanLyBaiHat;

-- Tạo bảng TheLoai
CREATE TABLE TheLoai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenTheLoai VARCHAR(255)
);

-- Tạo bảng BaiHat
CREATE TABLE BaiHat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenBaiHat VARCHAR(255),
    caSi VARCHAR(255),
    idTheLoai INT,
    FOREIGN KEY (idTheLoai) REFERENCES TheLoai(id)
);

-- Thêm dữ liệu vào bảng TheLoai
INSERT INTO TheLoai (tenTheLoai) VALUES
    ('Nhạc Pop'),
    ('Nhạc Rock'),
    ('Nhạc Rap'),
    ('Nhạc Ballad'),
    ('Nhạc EDM');
-- Thêm dữ liệu vào bảng BaiHat
INSERT INTO BaiHat (tenBaiHat, caSi, idTheLoai) VALUES
    ('Bài hát số 1', 'Ca sĩ 1', 1),
    ('Bài hát số 2', 'Ca sĩ 2', 2),
    ('Bài hát số 3', 'Ca sĩ 3', 3),
    ('Bài hát số 4', 'Ca sĩ 4', 1),
    ('Bài hát số 5', 'Ca sĩ 5', 4);