# Lịch Vạn Niên Công Giáo - WordPress Plugin

## Giới Thiệu

**Phụng Vụ Xítô** là một WordPress plugin hoàn chỉnh cung cấp Lịch Phụng Vụ Công Giáo Roma từ năm 2022 đến 2100.

Plugin này giúp các trang web Công Giáo:
- 📅 Hiển thị lịch phụng vụ chi tiết theo từng ngày
- ⛪ Cung cấp thông tin về các ngày lễ, Thánh được cử hành
- 🎨 Hiển thị các màu sắc phụng vụ theo nghi thức Giáo hội
- 📖 Quản lý dữ liệu lịch dưới định dạng JSON

## Tính Năng

- ✅ Lịch phụng vụ hoàn chỉnh từ 2022-2100
- ✅ Tất cả các ngày lễ Công Giáo Roma
- ✅ Các ngày thường, Chủ Nhật, và ngày lễ các Thánh
- ✅ Màu sắc phụng vụ (Trắng, Đỏ, Xanh Lục, Tím, Hồng)
- ✅ Dữ liệu JSON dễ sử dụng và mở rộng
- ✅ Shortcode để hiển thị lịch trên trang
- ✅ Admin panel cho quản lý

## Cài Đặt

### Từ GitHub

1. Clone repository:
   ```bash
   git clone https://github.com/acutistan-cyber/phung-vu-xito.git
   ```

2. Sao chép thư mục `phung-vu-xito` vào thư mục `wp-content/plugins/` của WordPress

3. Kích hoạt plugin trong WordPress Admin → Plugins

## Sử Dụng

### Shortcode Cơ Bản

Hiển thị lịch phụng vụ của tháng hiện tại:
```
[phung_vu_calendar]
```

### Shortcode Với Tham Số

Hiển thị lịch của tháng và năm cụ thể:
```
[phung_vu_calendar month="1" year="2025"]
```

**Tham Số:**
- `month` - Tháng (1-12), mặc định là tháng hiện tại
- `year` - Năm (2022-2100), mặc định là năm hiện tại

### Ví Dụ

```
[phung_vu_calendar month="3" year="2025"]  <!-- Hiển thị tháng 3 năm 2025 -->
[phung_vu_calendar month="12" year="2024"] <!-- Hiển thị tháng 12 năm 2024 -->
```

## Cấu Trúc Dữ Liệu JSON

Dữ liệu lịch được lưu trong file `data/calendar-data.json` với cấu trúc:

```json
{
  "date": "2022-01-01",
  "day": "1",
  "month": "1",
  "year": "2022",
  "name": "Lễ Mẹ Maria, Mẹ Thiên Chúa",
  "season": "Lễ Cứu Thế",
  "season_week": "Tuần 1",
  "color": "white",
  "saint": "Mẹ Maria",
  "type": "solemnity"
}
```

### Giải Thích Các Trường:

- **date**: Ngày theo định dạng YYYY-MM-DD
- **day**: Ngày trong tháng (1-31)
- **month**: Tháng (1-12)
- **year**: Năm
- **name**: Tên ngày lễ hoặc sự kiện phụng vụ
- **season**: Mùa phụng vụ (Vọng, Giáng Sinh, Thường Niên, Tứ旬, Phục Sinh)
- **season_week**: Tuần trong mùa phụng vụ
- **color**: Màu phụng vụ
  - `white` = Trắng (Lễ các Thánh, Giáng Sinh, Phục Sinh)
  - `red` = Đỏ (Các Thánh Tử Đạo, Pentecost)
  - `green` = Xanh Lục (Thời Kỳ Thường Niên)
  - `purple` = Tím (Mùa Vọng, Tứ旬)
  - `rose` = Hồng (Gaudete Sunday, Laetare Sunday)
- **saint**: Tên Thánh hoặc mầu nhiệm được tôn vinh
- **type**: Loại ngày lễ
  - `solemnity` = Ngày Lễ Chính
  - `feast` = Lễ Kỷ Niệm
  - `memorial` = Tưởng Niệm
  - `optional_memorial` = Tưởng Niệm Tùy Chọn
  - `weekday` = Ngày Thường
  - `sunday` = Chủ Nhật

## Cấu Trúc Plugin

```
phung-vu-xito/
├── phung-vu-xito.php           # File chính của plugin
├── README.md                    # Tài liệu này
├── includes/
│   ├── class-liturgical-calendar.php  # Lớp quản lý lịch phụng vụ
│   ├── class-shortcode.php            # Lớp xử lý shortcode
│   └── class-admin.php                # Lớp admin panel
├── data/
│   └── calendar-data.json      # Dữ liệu lịch phụng vụ (2022-2100)
└── assets/
    └── css/
        └── calendar.css        # Stylesheet cho hiển thị lịch
```

## Mở Rộng Dữ Liệu

Để thêm hoặc chỉnh sửa dữ liệu lịch, hãy chỉnh sửa file `data/calendar-data.json`.

## Yêu Cầu

- WordPress 5.0 hoặc cao hơn
- PHP 7.0 hoặc cao hơn

## Giấy Phép

GPL v2 hoặc cao hơn

## Tác Giả

**Acutistan Cyber**
- GitHub: https://github.com/acutistan-cyber

## Hỗ Trợ

Nếu bạn gặp vấn đề hoặc có đề nghị cải tiến, vui lòng tạo [Issue](https://github.com/acutistan-cyber/phung-vu-xito/issues) trên GitHub.

## Changelog

### Version 1.0.0
- ✅ Phát hành ban đầu
- ✅ Hỗ trợ lịch phụng vụ 2022-2100
- ✅ Shortcode hiển thị lịch
- ✅ Admin panel cơ bản
- ✅ Hỗ trợ các màu sắc phụng vụ
