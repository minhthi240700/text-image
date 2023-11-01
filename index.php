<?php
// Đường dẫn đến ảnh nền
$background_image = "background.png";

// Nạp ảnh nền từ tệp PNG
$background = imagecreatefrompng($background_image);

// Kích thước của ảnh nền
$width = imagesx($background);
$height = imagesy($background);

// Tạo ảnh mới để vẽ nội dung lên
$new_image = imagecreatetruecolor($width, $height);

// Sao chép ảnh nền vào ảnh mới
imagecopy($new_image, $background, 0, 0, 0, 0, $width, $height);

// Màu sắc cho văn bản
$text_color = imagecolorallocate($new_image, 17, 68, 80); // Màu #114450
$text_color2 = imagecolorallocate($new_image, 60, 76, 115); // Màu #3C4C73
$text_color3 = imagecolorallocate($new_image, 34, 157, 87); // Màu #229D57
$text_color4 = imagecolorallocate($new_image, 106, 144, 185); // Màu #6A90B9

// Đường dẫn đến font TrueType Lato (.ttf)
$lato_font = './fonts/Lato-Regular.ttf';

// Lấy kích thước font từ font Lato
$font_size = 100; // Kích thước font 100 pixel

// Các thông tin về từng mẩu văn bản
$texts = array(
    array("MÃ: 00001", $text_color, 50, 100),
    array("VOUCHER PREP MIỄN PHÍ", $text_color, 100, 300),
    array("HỌ TÊN: HUỲNH MINH THI", $text_color2, 50, 500),
    array("NĂM SINH: 2000", $text_color2, 50, 600),
    array("Vui lòng đưa phiếu voucher cho bộ phận tiếp đón, Mang theo CCCD để sử dụng dịch vụ", $text_color3, 50, 800),
    array("NGUỒN: PREPTHANHTRI", $text_color4, 50, 1000)
);

// Vẽ từng mẩu văn bản lên ảnh mới
foreach ($texts as $text_data) {
    list($text, $color, $x, $y) = $text_data;
    imagettftext($new_image, $font_size, 0, $x, $y, $color, $lato_font, $text);
}

// Lưu ảnh kết quả dưới dạng tệp PNG
imagepng($new_image, "output.png");

// Giải phóng tài nguyên ảnh
imagedestroy($new_image);
imagedestroy($background);

// readfile("output.png");
?>