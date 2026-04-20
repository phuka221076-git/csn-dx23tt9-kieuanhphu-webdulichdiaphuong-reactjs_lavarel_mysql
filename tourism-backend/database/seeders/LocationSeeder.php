<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $hanoiId = 1; // THAY ĐỔI ID NÀY CHO ĐÚNG VỚI ID HÀ NỘI TRONG BẢNG PROVINCES CỦA BẠN
        $hcmId = 2;
        $hpId = 3;
        $dnId = 4;
        $ctId = 5;
        $hueId = 6;
        $tqId = 7;

        $locations = [
        // Lâm Đồng (province_id = 1)
           /*  [
                'province_id' => 19, 'category_id' => 2,
                'name' => 'Thung Lũng Tình Yêu', 'address' => '03 - 05 - 07 Mai Anh Đào, Đà Lạt',
                'content' => 'Một trong những thắng cảnh thơ mộng nhất tại Đà Lạt...',
                'image_thumbnail' => 'thunglung.jpg', 'is_featured' => true
            ],
            [
                'province_id' => 19, 'category_id' => 2,
                'name' => 'Đỉnh Langbiang', 'address' => 'Huyện Lạc Dương, Lâm Đồng',
                'content' => 'Nóc nhà của cao nguyên Lâm Viên...',
                'image_thumbnail' => 'langbiang.jpg', 'is_featured' => false
            ],
            // Đà Nẵng (province_id = 2)
            [
                'province_id' => 4, 'category_id' => 1,
                'name' => 'Bãi biển Mỹ Khê', 'address' => 'Sơn Trà, Đà Nẵng',
                'content' => 'Một trong 6 bãi biển quyến rũ nhất hành tinh...',
                'image_thumbnail' => 'mykhe.jpg', 'is_featured' => true
            ],
            [
                'province_id' => 4, 'category_id' => 3,
                'name' => 'Ngũ Hành Sơn', 'address' => 'Hòa Hải, Ngũ Hành Sơn',
                'content' => 'Quần thể thắng cảnh tâm linh nổi tiếng...',
                'image_thumbnail' => 'nguhanhson.jpg', 'is_featured' => false
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 3, // Di tích Lịch sử
                'name' => 'Lăng Chủ tịch Hồ Chí Minh',
                'address' => 'Số 2 Hùng Vương, Điện Biên, Ba Đình, Hà Nội',
                'content' => 'Nơi lưu giữ thi hài của Bác Hồ kính yêu. Một điểm đến thiêng liêng mà mọi người dân Việt Nam và du khách quốc tế đều muốn ghé thăm.',
                'image_thumbnail' => 'lang-bac.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Hồ Hoàn Kiếm (Hồ Gươm)',
                'address' => 'Hàng Trống, Hoàn Kiếm, Hà Nội',
                'content' => 'Trái tim của thủ đô Hà Nội với Tháp Rùa cổ kính và cầu Thê Húc đỏ rực dẫn vào đền Ngọc Sơn.',
                'image_thumbnail' => 'ho-guom.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 3, // Di tích Lịch sử
                'name' => 'Văn Miếu - Quốc Tử Giám',
                'address' => '58 Quốc Tử Giám, Văn Miếu, Đống Đa, Hà Nội',
                'content' => 'Trường đại học đầu tiên của Việt Nam, biểu tượng của tinh thần hiếu học và nền văn hiến nghìn năm.',
                'image_thumbnail' => 'van-mieu.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 3, // Di tích Lịch sử
                'name' => 'Hoàng thành Thăng Long',
                'address' => '19 Hoàng Diệu, Quán Thánh, Ba Đình, Hà Nội',
                'content' => 'Di sản văn hóa thế giới được UNESCO công nhận, nơi ghi dấu ấn lịch sử của nhiều triều đại phong kiến Việt Nam.',
                'image_thumbnail' => 'hoang-thanh.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 5, // Tâm linh
                'name' => 'Chùa Trấn Quốc',
                'address' => 'Đường Thanh Niên, Yên Phụ, Tây Hồ, Hà Nội',
                'content' => 'Ngôi chùa cổ nhất ở Thăng Long - Hà Nội với lịch sử hơn 1.500 năm, nằm trên một hòn đảo nhỏ phía Đông Hồ Tây.',
                'image_thumbnail' => 'chua-tran-quoc.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hanoiId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Chợ Đồng Xuân',
                'address' => 'Đồng Xuân, Hoàn Kiếm, Hà Nội',
                'content' => 'Khu chợ sầm uất nhất Hà Nội, nơi bạn có thể tìm thấy mọi mặt hàng và thưởng thức những món ăn đặc sản phố cổ.',
                'image_thumbnail' => 'cho-dong-xuan.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Dinh Độc Lập',
                'address' => '135 Nam Kỳ Khởi Nghĩa, Quận 1, TP. HCM',
                'content' => 'Di tích quốc gia đặc biệt, nơi chứng kiến sự kiện lịch sử giải phóng miền Nam thống nhất đất nước.',
                'image_thumbnail' => 'dinh-doc-lap.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Bưu điện Trung tâm Thành phố',
                'address' => '02 Công xã Paris, Quận 1, TP. HCM',
                'content' => 'Một trong những công trình kiến trúc thời Pháp đẹp nhất Sài Gòn với phong cách kiến trúc Gothic kết hợp Phục Hưng.',
                'image_thumbnail' => 'buu-dien-hcm.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 9, // Thắng cảnh
                'name' => 'Phố đi bộ Nguyễn Huệ',
                'address' => 'Đường Nguyễn Huệ, Quận 1, TP. HCM',
                'content' => 'Con phố sôi động nhất Sài Gòn về đêm với nhiều hoạt động vui chơi, giải trí và ẩm thực đường phố.',
                'image_thumbnail' => 'pho-di-bo.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Bảo tàng Chứng tích Chiến tranh',
                'address' => '28 Võ Văn Tần, Quận 3, TP. HCM',
                'content' => 'Nơi lưu giữ những hình ảnh, hiện vật về các cuộc chiến tranh tại Việt Nam, thu hút đông đảo khách quốc tế.',
                'image_thumbnail' => 'bao-tang-chien-tranh.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 5, // Tâm linh
                'name' => 'Chùa Ngọc Hoàng (Phước Hải Tự)',
                'address' => '73 Mai Thị Lựu, Quận 1, TP. HCM',
                'content' => 'Ngôi chùa cổ nổi tiếng linh thiêng, từng đón tiếp Tổng thống Mỹ Barack Obama ghé thăm năm 2016.',
                'image_thumbnail' => 'chua-ngoc-hoang.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hcmId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Chợ Bến Thành',
                'address' => 'Phường Bến Thành, Quận 1, TP. HCM',
                'content' => 'Biểu tượng của TP. HCM, nơi tập trung đầy đủ các loại hàng hóa đặc sắc và khu ẩm thực phong phú.',
                'image_thumbnail' => 'cho-ben-thanh.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hpId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Quần đảo Cát Bà',
                'address' => 'Huyện Cát Hải, Hải Phòng',
                'content' => 'Khu dự trữ sinh quyển thế giới với những bãi biển trong xanh, rừng nguyên sinh và vịnh Lan Hạ thơ mộng.',
                'image_thumbnail' => 'cat-ba.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hpId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Bãi biển Đồ Sơn',
                'address' => 'Quận Đồ Sơn, Hải Phòng',
                'content' => 'Khu nghỉ mát nổi tiếng từ thời Pháp thuộc với các bãi tắm chia làm 3 khu và đảo Hòn Dấu hữu tình.',
                'image_thumbnail' => 'do-son.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hpId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Khu di tích Tràng Kênh',
                'address' => 'Thị trấn Minh Đức, huyện Thủy Nguyên, Hải Phòng',
                'content' => 'Quần thể đền thờ gắn liền với các trận chiến trên sông Bạch Đằng, nơi giao thoa giữa lịch sử và thiên nhiên hùng vĩ.',
                'image_thumbnail' => 'trang-kenh.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hpId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Chợ Cát Bi - Thiên đường Food Tour',
                'address' => 'Quận Hải An, Hải Phòng',
                'content' => 'Nổi tiếng là thiên đường ăn vặt của Hải Phòng với các món đặc sản như bánh đa cua, ốc, và chè trang trí bắt mắt.',
                'image_thumbnail' => 'cho-cat-bi.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hpId,
                'category_id' => 5, // Tâm linh
                'name' => 'Chùa Hang (Cốc Tự)',
                'address' => 'Quận Đồ Sơn, Hải Phòng',
                'content' => 'Ngôi chùa được coi là nơi đầu tiên Phật giáo du nhập vào Việt Nam theo đường biển, nằm sâu trong một hang đá tự nhiên.',
                'image_thumbnail' => 'chua-hang.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hpId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Bánh mì que Hải Phòng (Hàng Kênh)',
                'address' => 'Quận Lê Chân, Hải Phòng',
                'content' => 'Món ăn biểu tượng của thành phố Cảng với lớp pate thơm ngậy và nước chấm chí chương đặc trưng.',
                'image_thumbnail' => 'banh-mi-que.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $dnId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Khu du lịch Sun World Bà Nà Hills',
                'address' => 'Thôn An Sơn, xã Hòa Ninh, huyện Hòa Vang, Đà Nẵng',
                'content' => 'Nổi tiếng với Cầu Vàng (Golden Bridge), làng Pháp cổ kính và hệ thống cáp treo đạt nhiều kỷ lục thế giới.',
                'image_thumbnail' => 'ba-na-hills.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $dnId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Bãi biển Mỹ Khê',
                'address' => 'Phường Phước Mỹ, quận Sơn Trà, Đà Nẵng',
                'content' => 'Một trong những bãi biển quyến rũ nhất hành tinh với bãi cát trắng mịn, sóng biển ôn hòa và nước ấm quanh năm.',
                'image_thumbnail' => 'my-khe.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $dnId,
                'category_id' => 3, // Di tích lịch sử / Văn hóa
                'name' => 'Danh thắng Ngũ Hành Sơn',
                'address' => '81 Huyền Trân Công Chúa, Hòa Hải, Ngũ Hành Sơn, Đà Nẵng',
                'content' => 'Quần thể gồm 5 ngọn núi đá vôi với hệ thống hang động và chùa chiền huyền bí như động Huyền Không, chùa Tam Thai.',
                'image_thumbnail' => 'ngu-hanh-son.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $dnId,
                'category_id' => 5, // Tâm linh
                'name' => 'Chùa Linh Ứng - Bán đảo Sơn Trà',
                'address' => 'Bán đảo Sơn Trà, quận Sơn Trà, Đà Nẵng',
                'content' => 'Nơi có tượng Phật Bà Quan Âm cao nhất Việt Nam (67m), hướng ra biển Đông để cầu bình an cho ngư dân.',
                'image_thumbnail' => 'chua-linh-ung.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $dnId,
                'category_id' => 9, // Thắng cảnh
                'name' => 'Cầu Rồng',
                'address' => 'Phường An Hải Tây, quận Sơn Trà, Đà Nẵng',
                'content' => 'Biểu tượng của sự vươn mình của thành phố, nổi tiếng với màn trình diễn phun lửa và phun nước vào cuối tuần.',
                'image_thumbnail' => 'cau-rong.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $dnId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Chợ Cồn',
                'address' => '290 Hùng Vương, Vĩnh Trung, Hải Châu, Đà Nẵng',
                'content' => 'Thiên đường quà vặt tại Đà Nẵng với các món đặc sản như mắm nêm, tré, bánh xèo, và hải sản khô.',
                'image_thumbnail' => 'cho-con.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $ctId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Chợ nổi Cái Răng',
                'address' => 'Sông Cần Thơ, quận Cái Răng, Cần Thơ',
                'content' => 'Trải nghiệm nét văn hóa sông nước đặc trưng của miền Tây Nam Bộ với hàng trăm ghe xuồng tụ họp buôn bán các loại nông sản địa phương từ tờ mờ sáng.',
                'image_thumbnail' => 'cho-noi-cai-rang.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $ctId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Bến Ninh Kiều',
                'address' => 'Phường Tân An, quận Ninh Kiều, Cần Thơ',
                'content' => 'Biểu tượng của xứ Tây Đô, nơi bạn có thể dạo bộ ngắm nhìn dòng sông Hậu hiền hòa và cầu đi bộ Cần Thơ lung linh về đêm.',
                'image_thumbnail' => 'ben-ninh-kieu.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $ctId,
                'category_id' => 3, // Di tích lịch sử / Văn hóa
                'name' => 'Nhà cổ Bình Thủy',
                'address' => '26/1A Bùi Hữu Nghĩa, Bình Thủy, Cần Thơ',
                'content' => 'Ngôi nhà cổ hơn 140 năm tuổi với kiến trúc giao thoa Đông - Tây độc đáo, từng là phim trường của bộ phim nổi tiếng "Người tình" (L\'Amant).',
                'image_thumbnail' => 'nha-co-binh-thuy.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $ctId,
                'category_id' => 5, // Tâm linh
                'name' => 'Thiền viện Trúc Lâm Phương Nam',
                'address' => 'Ấp Mỹ Nhơn, xã Mỹ Khánh, huyện Phong Điền, Cần Thơ',
                'content' => 'Ngôi thiền viện lớn nhất miền Tây Nam Bộ với kiến trúc thời Lý - Trần, mang lại không gian thanh tịnh và bình yên cho du khách.',
                'image_thumbnail' => 'thien-vien-truc-lam.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $ctId,
                'category_id' => 9, // Thắng cảnh / Sinh thái
                'name' => 'Làng du lịch Mỹ Khánh',
                'address' => '335 Lộ Vòng Cung, xã Mỹ Khánh, huyện Phong Điền, Cần Thơ',
                'content' => 'Khu du lịch sinh thái tổng hợp với các hoạt động trải nghiệm làm nông dân, thưởng thức trái cây tại vườn và xem đua heo vui nhộn.',
                'image_thumbnail' => 'my-khanh.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $ctId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Làng nghề hủ tiếu truyền thống',
                'address' => 'Khu vực phường An Bình, quận Ninh Kiều, Cần Thơ',
                'content' => 'Nơi du khách có thể tận mắt xem quy trình làm ra những sợi hủ tiếu trắng ngần và thưởng thức món "Pizza hủ tiếu" độc lạ.',
                'image_thumbnail' => 'hu-tieu-can-tho.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hueId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Quần thể Đại Nội Huế',
                'address' => 'Phường Phú Hậu, Thành phố Huế',
                'content' => 'Hoàng cung của 13 vị vua triều Nguyễn, nơi lưu giữ những công trình kiến trúc cung đình uy nghi như Ngọ Môn, Điện Thái Hòa và Tử Cấm Thành.',
                'image_thumbnail' => 'dai-noi-hue.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hueId,
                'category_id' => 5, // Tâm linh
                'name' => 'Chùa Thiên Mụ',
                'address' => 'Đồi Hà Khê, đường Nguyễn Phúc Nguyên, Huế',
                'content' => 'Ngôi chùa cổ kính soi bóng bên dòng sông Hương thơ mộng, nổi tiếng với tháp Phước Duyên 7 tầng - biểu tượng của xứ Huế.',
                'image_thumbnail' => 'chua-thien-mu.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hueId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Lăng Minh Mạng',
                'address' => 'Quốc lộ 49, Hương Thọ, TP. Huế',
                'content' => 'Một trong những lăng tẩm đẹp nhất triều Nguyễn với sự kết hợp hài hòa giữa kiến trúc uy nghiêm và không gian thiên nhiên tĩnh lặng.',
                'image_thumbnail' => 'lang-minh-mang.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hueId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Lăng Khải Định',
                'address' => 'Xã Thủy Bằng, huyện Hương Thủy, Huế',
                'content' => 'Công trình lăng tẩm có kiến trúc độc đáo bậc nhất, giao thoa giữa văn hóa Á - Âu với nghệ thuật khảm sành sứ tinh xảo.',
                'image_thumbnail' => 'lang-khai-dinh.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $hueId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Cầu Trường Tiền',
                'address' => 'Cầu Trường Tiền, TP. Huế',
                'content' => 'Cây cầu lịch sử bắc qua sông Hương, nhân chứng của bao thăng trầm lịch sử cố đô, đẹp nhất là khi lên đèn về đêm.',
                'image_thumbnail' => 'cau-truong-tien.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $hueId,
                'category_id' => 7, // Ẩm thực
                'name' => 'Chợ Đông Ba',
                'address' => 'Số 2 Trần Hưng Đạo, TP. Huế',
                'content' => 'Ngôi chợ truyền thống lâu đời nhất Huế, nơi hội tụ đủ mọi tinh hoa ẩm thực như bún bò Huế, cơm hến và các loại chè cung đình.',
                'image_thumbnail' => 'cho-dong-ba.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $tqId,
                'category_id' => 3, // Di tích lịch sử
                'name' => 'Khu di tích lịch sử Tân Trào',
                'address' => 'Xã Tân Trào, huyện Sơn Dương, Tuyên Quang',
                'content' => 'Nơi ở và làm việc của Bác Hồ cùng các cơ quan Trung ương trong thời kỳ kháng chiến. Các điểm nhấn gồm lán Nà Nưa, cây đa Tân Trào và đình Tân Trào.',
                'image_thumbnail' => 'tan-trao.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $tqId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Khu bảo tồn thiên nhiên Na Hang',
                'address' => 'Huyện Na Hang, Tuyên Quang',
                'content' => 'Nổi tiếng với lòng hồ thủy điện xanh ngắt, núi Cọc Vài Phạ và thác Mơ. Đây là điểm đến lý tưởng cho du lịch sinh thái và chèo thuyền Kayak.',
                'image_thumbnail' => 'na-hang.jpg',
                'is_featured' => true
            ],
            [
                'province_id' => $tqId,
                'category_id' => 9, // Thắng cảnh / Lễ hội
                'name' => 'Quảng trường Nguyễn Tất Thành',
                'address' => 'Phường Tân Quang, Thành phố Tuyên Quang',
                'content' => 'Nơi diễn ra Lễ hội Thành Tuyên - lễ hội Trung thu lớn nhất Việt Nam với những mô hình đèn khổng lồ độc đáo đạt kỷ lục Guinness.',
                'image_thumbnail' => 'quang-truong-tq.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $tqId,
                'category_id' => 9, // Danh lam thắng cảnh
                'name' => 'Thác Bản Ba',
                'address' => 'Xã Trung Hà, huyện Chiêm Hóa, Tuyên Quang',
                'content' => 'Dòng thác 3 tầng tuyệt đẹp nằm giữa núi rừng Chiêm Hóa, được ví như một dải lụa trắng vắt ngang qua sườn núi.',
                'image_thumbnail' => 'thac-ban-ba.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $tqId,
                'category_id' => 5, // Tâm linh
                'name' => 'Đền Hạ (Đền Thần Mẫu)',
                'address' => 'Phường Tân Quang, TP. Tuyên Quang',
                'content' => 'Ngôi đền cổ kính nằm bên dòng sông Lô, thờ mẫu thần và là trung tâm tín ngưỡng quan trọng của người dân Tuyên Quang.',
                'image_thumbnail' => 'den-ha.jpg',
                'is_featured' => false
            ],
            [
                'province_id' => $tqId,
                'category_id' => 2, // Nghỉ dưỡng / Suối khoáng
                'name' => 'Suối khoáng nóng Mỹ Lâm',
                'address' => 'Xã Phú Lâm, huyện Yên Sơn, Tuyên Quang',
                'content' => 'Nguồn nước khoáng thiên nhiên giàu khoáng chất, là điểm nghỉ dưỡng chữa bệnh và thư giãn nổi tiếng tại miền Bắc.',
                'image_thumbnail' => 'khoang-nong-my-lam.jpg',
                'is_featured' => false
            ],


 */

        // Bạn có thể thêm nhiều địa điểm tương tự ở đây...
        ];

        foreach ($locations as $loc) {
            \App\Models\Location::create($loc);
        }

       
        /* $faker = \Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 50; $i++) {
            \App\Models\Location::create([
                'province_id' => rand(1, 34), // Giả sử bạn đã seed 34 tỉnh thành ở bước trước
                'category_id' => rand(1, 9),  // Giả sử bạn có 9 loại hình du lịch
                'name' => 'Địa điểm ' . $faker->company, // Faker Việt Nam tạo tên công ty/địa danh khá hay
                'address' => $faker->address, // Trả về địa chỉ dạng: Số 12, ngõ 34, phố...
                'content' => $faker->paragraphs(3, true), // Đoạn văn bản mô tả giả
                'image_thumbnail' => 'location_' . rand(1, 10) . '.jpg', // Random tên ảnh từ 1-10
                'is_featured' => $faker->boolean(20), // 20% tỉ lệ là địa điểm nổi bật
            ]);
        } */

 
    }
}
