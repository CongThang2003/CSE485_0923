CREATE DATABASE BTTH01_CSE485;

-- Bảng "tacgia"
CREATE TABLE tacgia (
    ma_tgia INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ten_tgia VARCHAR(100) NOT NULL,
    hinh_tgia VARCHAR(100),
    PRIMARY KEY (ma_tgia)
);

-- Bảng "theloai"
CREATE TABLE theloai (
    ma_tloai INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ten_tloai VARCHAR(50) NOT NULL,
    SLBaiViet INT UNSIGNED DEFAULT 0,
    PRIMARY KEY (ma_tloai)
);

-- Bảng "baiviet"
CREATE TABLE baiviet (
    ma_bviet INT UNSIGNED NOT NULL AUTO_INCREMENT,
    tieude VARCHAR(200) NOT NULL,
    ten_bhat VARCHAR(100) NOT NULL,
    ma_tloai INT UNSIGNED NOT NULL,
    tomtat TEXT NOT NULL,
    noidung TEXT,
    ma_tgia INT UNSIGNED NOT NULL,
    ngayviet DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    hinhanh VARCHAR(200),
    PRIMARY KEY (ma_bviet),
    FOREIGN KEY (ma_tloai) REFERENCES theloai(ma_tloai),
    FOREIGN KEY (ma_tgia) REFERENCES tacgia(ma_tgia)
);

-- Bảng "users" (Bổ sung bảng Users)
CREATE TABLE users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (user_id)
);

-- Ràng buộc unique cho username trong bảng "users"
ALTER TABLE users ADD UNIQUE (username);

-- a
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
WHERE tl.ten_tloai = 'Nhạc trữ tình';

-- b
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
WHERE tg.ten_tgia = 'Nhacvietplus';

--c
SELECT tl.ma_tloai, tl.ten_tloai
FROM theloai tl
LEFT JOIN baiviet bv ON tl.ma_tloai = bv.ma_tloai
WHERE bv.ma_bviet IS NULL;

--d
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai;

--e
SELECT tl.ten_tloai, COUNT(bv.ma_bviet) AS SoLuongBaiViet
FROM theloai tl
LEFT JOIN baiviet bv ON tl.ma_tloai = bv.ma_tloai
GROUP BY tl.ten_tloai
ORDER BY SoLuongBaiViet DESC
LIMIT 1;


--f
SELECT tg.ten_tgia, COUNT(bv.ma_bviet) AS SoLuongBaiViet
FROM tacgia tg
LEFT JOIN baiviet bv ON tg.ma_tgia = bv.ma_tgia
GROUP BY tg.ten_tgia
ORDER BY SoLuongBaiViet DESC
LIMIT 2;


--g
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
WHERE bv.tieude LIKE '%yêu%' OR bv.tieude LIKE '%thương%' OR bv.ten_bhat LIKE '%yêu%' OR bv.ten_bhat LIKE '%thương%'
OR bv.tieude LIKE '%anh%' OR bv.tieude LIKE '%em%' OR bv.ten_bhat LIKE '%anh%' OR bv.ten_bhat LIKE '%em%';

--h
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
WHERE bv.tieude LIKE '%yêu%' OR bv.tieude LIKE '%thương%' OR bv.ten_bhat LIKE '%yêu%' OR bv.ten_bhat LIKE '%thương%'
OR bv.tieude LIKE '%anh%' OR bv.tieude LIKE '%em%' OR bv.ten_bhat LIKE '%anh%' OR bv.ten_bhat LIKE '%em%';

--i
CREATE VIEW vw_Music AS
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia AS TacGia, tl.ten_tloai AS TheLoai, bv.ngayviet
FROM baiviet bv
JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai;

--j
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet(IN p_TenTheLoai VARCHAR(50))
BEGIN
    SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tg.ten_tgia, tl.ten_tloai, bv.ngayviet
    FROM baiviet bv
    JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia
    JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai
    WHERE tl.ten_tloai = p_TenTheLoai;
END //
DELIMITER ;

--k
-- Thêm cột SLBaiViet vào bảng theloai
ALTER TABLE theloai ADD COLUMN SLBaiViet INT UNSIGNED DEFAULT 0;

-- Tạo trigger tg_CapNhatTheLoai
DELIMITER //
CREATE TRIGGER tg_CapNhatTheLoai AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;
END //
DELIMITER ;

--l
-- Bảng "users" (Bổ sung bảng Users)
CREATE TABLE users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (user_id)
);

-- Ràng buộc unique cho username trong bảng "users"
ALTER TABLE users ADD UNIQUE (username);