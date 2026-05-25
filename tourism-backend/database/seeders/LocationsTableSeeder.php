<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 1,
                'category_id' => 9,
                'name' => 'Hồ Hoàn Kiếm',
                'name_search' => 'ho hoan kiem',
                'address' => 'Hàng Trống, Hoàn Kiếm, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Trái tim của Thủ đô nghìn năm văn hiến, gắn liền với truyền thuyết vua Lê Lợi trả gươm cho Rùa Thần. 

🚩 Biểu tượng: Tháp Rùa cổ kính, Cầu Thê Húc đỏ rực và Tháp Bút. 
🌅 Trải nghiệm: Dạo phố đi bộ, ăn kem Tràng Tiền và thăm đền Ngọc Sơn. 
🚗 Di chuyển: Trung tâm quận Hoàn Kiếm. 
💡 Lưu ý: Phố đi bộ chỉ mở từ tối Thứ 6 đến hết Chủ Nhật.',
                'image_thumbnail' => 'ha-noi-ho-hoan-kiem.jpg',
                'latitude' => '21.02850000',
                'longitude' => '105.85220000',
                'is_featured' => 1,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:03:21',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 1,
                'category_id' => 3,
                'name' => 'Phố Cổ Hà Nội',
                'name_search' => 'pho co ha noi',
                'address' => 'Quận Hoàn Kiếm, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Khu vực 36 phố phường với nhà ống rêu phong, mái ngói âm dương, lưu giữ hồn cốt kinh kỳ xưa. 
🚩 Biểu tượng: Nhà cổ 87 Mã Mây, Ô Quan Chưởng. 
🌅 Trải nghiệm: Khám phá ẩm thực vỉa hè: bún chả, chả cá Lã Vọng và bia hơi Tạ Hiện. 
🚗 Di chuyển: Đi bộ hoặc xe điện du lịch. 

💡 Lưu ý: Đường nhỏ hẹp, dễ lạc, nên dùng Google Maps.',
                'image_thumbnail' => 'ha-noi-pho-co-ha-noi.jpg',
                'latitude' => '21.03330000',
                'longitude' => '105.85000000',
                'is_featured' => 1,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:06:16',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 1,
                'category_id' => 5,
                'name' => 'Chùa Một Cột',
                'name_search' => 'chua mot cot',
                'address' => 'Chùa Một Cột, Đội Cấn, Ba Đình, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Xây dựng năm 1049, kiến trúc hình đóa sen nở trên mặt nước độc nhất vô nhị. 
🚩 Biểu tượng: Cột đá duy nhất đỡ toàn bộ ngôi chùa gỗ. 
🌅 Trải nghiệm: Chiêm bái kiến trúc thời Lý và cảm nhận sự thanh tịnh. 
🚗 Di chuyển: Nằm trong quần thể Lăng Bác. 

💡 Lưu ý: Mặc trang phục kín đáo khi vào lễ Phật.',
                'image_thumbnail' => 'ha-noi-chua-mot-cot.jpg',
                'latitude' => '21.03580000',
                'longitude' => '105.83330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:41:40',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => 1,
                'category_id' => 3,
                'name' => 'Lăng Bác',
                'name_search' => 'lang bac',
                'address' => '2 Hùng Vương, Điện Biên, Ba Đình, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Nơi an nghỉ của Chủ tịch Hồ Chí Minh. Công trình xây bằng các loại đá quý từ mọi miền đất nước. 
🚩 Biểu tượng: Đội tiêu binh đổi gác và Quảng trường Ba Đình. 
🌅 Trải nghiệm: Viếng Bác và tham quan Nhà sàn, ao cá. 
🚗 Di chuyển: Taxi hoặc xe buýt (tuyến 09, 22). 

💡 Lưu ý: Đóng cửa Thứ 2 và Thứ 6. Không chụp ảnh bên trong.',
                'image_thumbnail' => 'ha-noi-lang-bac.jpg',
                'latitude' => '21.03680000',
                'longitude' => '105.83470000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-22 15:24:55',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => 1,
                'category_id' => 3,
                'name' => 'Văn Miếu - Quốc Tử Giám',
                'name_search' => 'van mieu - quoc tu giam',
                'address' => '58 Quốc Tử Giám, Đống Đa, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Trường Đại học đầu tiên của Việt Nam, xây dựng năm 1070 mang đậm triết lý Nho giáo. 
🚩 Biểu tượng: Khuê Văn Các, 82 Bia Tiến Sĩ trên lưng rùa. 
🌅 Trải nghiệm: Xin chữ ông đồ cầu may mắn học hành. 
🚗 Di chuyển: Quận Đống Đa. 

💡 Lưu ý: Không sờ đầu rùa đá. Mặc đồ lịch sự.',
                'image_thumbnail' => 'ha-noi-van-mieu-quoc-tu-giam.jpg',
                'latitude' => '21.02850000',
                'longitude' => '105.83560000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-22 23:48:02',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => 1,
                'category_id' => 2,
                'name' => 'Hồ Tây',
                'name_search' => 'ho tay',
                'address' => 'Quận Tây Hồ, Hà Nội',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Hồ tự nhiên lớn nhất Hà Nội với cảnh quan thơ mộng, gắn liền nhiều đền chùa cổ. 
🚩 Biểu tượng: Chùa Trấn Quốc cổ nhất VN, đường Thanh Niên. 
🌅 Trải nghiệm: Ngắm hoàng hôn, ăn bánh tôm Hồ Tây và đạp vịt. 
🚗 Di chuyển: Thuê xe máy đi vòng quanh hồ. 

💡 Lưu ý: Chiều tối rất đông đúc, chú ý giao thông.',
                'image_thumbnail' => 'ha-noi-ho-tay.jpg',
                'latitude' => '21.05830000',
                'longitude' => '105.82500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:46:22',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => 2,
                'category_id' => 3,
                'name' => 'Địa đạo Củ Chi',
                'name_search' => 'đia dao cu chi',
                'address' => 'Nhuận Đức, Củ Chi, TP. Hồ Chí Minh',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: "Mê cung dưới lòng đất" dài hơn 250km, kỳ tích của quân dân miền Nam. 
🚩 Biểu tượng: Cổng hầm ngụy trang và bếp Hoàng Cầm. 
🌅 Trải nghiệm: Thử thách chui hầm hẹp, ăn khoai mì chấm muối mè. 
🚗 Di chuyển: Cách trung tâm 70km. 

💡 Lưu ý: Người mắc chứng sợ không gian hẹp nên cân nhắc.',
                'image_thumbnail' => 'tp-ho-chi-minh-dia-dao-cu-chi.jpg',
                'latitude' => '11.14200000',
                'longitude' => '106.46330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:55:09',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => 2,
                'category_id' => 5,
                'name' => 'Nhà thờ Đức Bà',
                'name_search' => 'nha tho đuc ba',
                'address' => '01 Công xã Paris, Bến Nghé, Quận 1, TP.HCM',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Tuyệt tác Gothic Pháp với gạch trần đỏ rực mang từ Marseille sang. 
🚩 Biểu tượng: Tháp chuông cao 57m và tượng Đức Mẹ Hòa Bình. 
🌅 Trải nghiệm: Chụp ảnh quảng trường, uống cà phê bệt. 
🚗 Di chuyển: Ngay trung tâm Quận 1. 

💡 Lưu ý: Hiện đang trùng tu, chỉ có thể tham quan bên ngoài.',
                'image_thumbnail' => 'tp-ho-chi-minh-nha-tho-duc-ba.jpg',
                'latitude' => '10.77980000',
                'longitude' => '106.69900000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 00:57:09',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => 2,
                'category_id' => 3,
                'name' => 'Bến Nhà Rồng',
                'name_search' => 'ben nha rong',
                'address' => '01 Nguyễn Tất Thành, Quận 4, TP.HCM',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Tòa nhà Pháp cổ nơi Bác Hồ ra đi tìm đường cứu nước năm 1911. 
🚩 Biểu tượng: Đôi rồng tráng men xanh trên mái nhà. 
🌅 Trải nghiệm: Tìm hiểu lịch sử và ngắm tàu thuyền trên sông Sài Gòn. 
🚗 Di chuyển: Quận 4, gần cầu Khánh Hội. 

💡 Lưu ý: Đóng cửa Thứ Hai hàng tuần.',
                'image_thumbnail' => 'tp-ho-chi-minh-ben-nha-rong.jpg',
                'latitude' => '10.77040000',
                'longitude' => '106.70680000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-23 01:01:36',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => 2,
                'category_id' => 7,
                'name' => 'Chợ Bến Thành',
                'name_search' => 'cho ben thanh',
                'address' => 'Lê Lợi, Phường Bến Thành, Quận 1, TP.HCM',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Biểu tượng giao thương lâu đời nhất Sài Gòn với tháp đồng hồ 4 mặt. 
🚩 Biểu tượng: Cửa Nam chợ Bến Thành. 
🌅 Trải nghiệm: Khám phá ẩm thực, mua đồ lưu niệm đặc sản. 
🚗 Di chuyển: Ngay ga Metro trung tâm Bến Thành. 

💡 Lưu ý: Chú ý bảo quản tư trang khi mua sắm.',
                'image_thumbnail' => 'tp-ho-chi-minh-cho-ben-thanh.jpg',
                'latitude' => '10.77260000',
                'longitude' => '106.69800000',
                'is_featured' => 1,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-10 04:25:43',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => 2,
                'category_id' => 9,
                'name' => 'Bitexco Financial Tower',
                'name_search' => 'bitexco financial tower',
                'address' => '2 Hải Triều, Bến Nghé, Quận 1, TP.HCM',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Thiết kế lấy cảm hứng từ búp hoa sen, biểu tượng sự năng động của TP.HCM. 
🚩 Biểu tượng: Sân đậu trực thăng lơ lửng tầng 52. 
🌅 Trải nghiệm: Ngắm thành phố 360 độ từ Saigon Skydeck. 
🚗 Di chuyển: Quận 1. 

💡 Lưu ý: Vé lên đài quan sát là dịch vụ có phí.',
                'image_thumbnail' => 'tp-ho-chi-minh-bitexco-financial-tower.jpg',
                'latitude' => '10.77160000',
                'longitude' => '106.70440000',
                'is_featured' => 1,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-10 03:58:26',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => 3,
                'category_id' => 9,
                'name' => 'Đảo Cát Bà',
                'name_search' => 'đao cat ba',
                'address' => 'Huyện Cát Hải, TP. Hải Phòng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: "Viên ngọc xanh" với hệ sinh thái rừng nguyên sinh và vịnh biển. 
🚩 Biểu tượng: Vịnh Lan Hạ và Pháo đài Thần công. 
🌅 Trải nghiệm: Chèo thuyền Kayak, tắm biển Cát Cò. 
🚗 Di chuyển: Đi phà bến Gót hoặc cáp treo. 

💡 Lưu ý: Mùa hè thường rất đông khách, nên đặt phòng sớm.',
                'image_thumbnail' => 'hai-phong-dao-cat-ba.jpg',
                'latitude' => '20.71890000',
                'longitude' => '107.04220000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => 3,
                'category_id' => 2,
                'name' => 'Bãi biển Đồ Sơn',
                'name_search' => 'bai bien đo son',
                'address' => 'Quận Đồ Sơn, TP. Hải Phòng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Khu nghỉ mát nổi tiếng với các bán đảo vươn ra biển lộng gió. 
🚩 Biểu tượng: Biệt thự Bảo Đại và đảo Hòn Dấu. 
🌅 Trải nghiệm: Tắm biển, ăn hải sản và thăm bến tàu Không Số. 
🚗 Di chuyển: Cách trung tâm HP 20km. 

💡 Lưu ý: Nước biển có màu phù sa tự nhiên.',
                'image_thumbnail' => 'hai-phong-bai-bien-do-son.jpg',
                'latitude' => '20.70640000',
                'longitude' => '106.79170000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => 3,
                'category_id' => 3,
                'name' => 'Bảo tàng Hải Phòng',
                'name_search' => 'bao tang hai phong',
                'address' => '66 Điện Biên Phủ, Hồng Bàng, Hải Phòng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Tòa nhà Gothique Pháp cổ xây từ 1919, kiến trúc uy nghiêm. 
🚩 Biểu tượng: Hiện vật văn hóa Đông Sơn. 
🌅 Trải nghiệm: Tìm hiểu lịch sử hình thành vùng đất Cảng. 
🚗 Di chuyển: Trục đường trung tâm thành phố. 

💡 Lưu ý: Đóng cửa vào Thứ Hai hàng tuần.',
                'image_thumbnail' => 'hai-phong-bao-tang-hai-phong.jpg',
                'latitude' => '20.85940000',
                'longitude' => '106.68330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => 4,
                'category_id' => 9,
                'name' => 'Cầu Rồng',
                'name_search' => 'cau rong',
                'address' => 'Nguyễn Văn Linh, Phước Ninh, Đà Nẵng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Hình dáng rồng thời Lý vươn mình ra biển lớn. 
🚩 Biểu tượng: Đầu rồng phun lửa và nước. 
🌅 Trải nghiệm: Xem rồng phun lửa lúc 21:00 tối Thứ 7, Chủ Nhật. 
🚗 Di chuyển: Nối trung tâm và biển Mỹ Khê. 

💡 Lưu ý: Đến sớm để có vị trí quan sát tốt nhất.',
                'image_thumbnail' => 'da-nang-cau-rong.jpg',
                'latitude' => '16.06110000',
                'longitude' => '108.22740000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => 4,
                'category_id' => 9,
                'name' => 'Bán đảo Sơn Trà',
                'name_search' => 'ban dao son tra',
                'address' => 'Thọ Quang, Sơn Trà, Đà Nẵng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: "Lá phổi xanh" với hệ động thực vật đa dạng, đặc biệt là Voọc chà vá. 
🚩 Biểu tượng: Đỉnh Bàn Cờ, Cây đa ngàn năm. 
🌅 Trải nghiệm: Chạy xe máy quanh bán đảo ngắm biển. 
🚗 Di chuyển: Cách trung tâm 10km. 

💡 Lưu ý: Tuyệt đối không dùng xe tay ga cũ khi leo dốc.',
                'image_thumbnail' => 'da-nang-ban-dao-son-tra.jpg',
                'latitude' => '16.12000000',
                'longitude' => '108.28000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => 4,
                'category_id' => 5,
                'name' => 'Chùa Linh Ứng',
                'name_search' => 'chua linh ứng',
                'address' => 'Sơn Trà, Thọ Quang, Đà Nẵng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Ngôi chùa lớn nhất Đà Nẵng với vị thế "tựa sơn hướng thủy". 
🚩 Biểu tượng: Tượng Phật Bà Quan Thế Âm cao 67m. 
🌅 Trải nghiệm: Ngắm toàn cảnh vịnh Đà Nẵng và chiêm bái Phật. 
🚗 Di chuyển: Đường ven biển Sơn Trà. 

💡 Lưu ý: Mặc đồ trang nghiêm, không cho khỉ hoang ăn.',
                'image_thumbnail' => 'da-nang-chua-linh-ung.jpg',
                'latitude' => '16.10030000',
                'longitude' => '108.27780000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => 4,
                'category_id' => 2,
                'name' => 'Bãi biển Mỹ Khê',
                'name_search' => 'bai bien my khe',
                'address' => 'Phước Mỹ, Sơn Trà, Đà Nẵng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Một trong những bãi biển quyến rũ nhất hành tinh với cát trắng, sóng êm. 
🚩 Biểu tượng: Rặng dừa ven bờ. 
🌅 Trải nghiệm: Tắm biển bình minh, chơi thể thao nước. 
🚗 Di chuyển: Ngay trung tâm Đà Nẵng. 

💡 Lưu ý: Tắm tại các khu vực có đội cứu hộ.',
                'image_thumbnail' => 'da-nang-bai-bien-my-khe.jpg',
                'latitude' => '16.06100000',
                'longitude' => '108.24600000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => 4,
                'category_id' => 9,
                'name' => 'Ngũ Hành Sơn',
                'name_search' => 'ngu hanh son',
                'address' => '81 Huyền Trân Công Chúa, Ngũ Hành Sơn',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Quần thể 5 ngọn núi đá vôi kỳ ảo Kim-Mộc-Thủy-Hỏa-Thổ. 
🚩 Biểu tượng: Động Huyền Không, Chùa Tam Thai. 
🌅 Trải nghiệm: Leo núi, thăm hang động và làng đá mỹ nghệ. 
🚗 Di chuyển: Trục đường Đà Nẵng - Hội An. 

💡 Lưu ý: Có thang máy hỗ trợ lên núi.',
                'image_thumbnail' => 'da-nang-ngu-hanh-son.jpg',
                'latitude' => '16.00250000',
                'longitude' => '108.26390000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => 5,
                'category_id' => 9,
                'name' => 'Chợ nổi Cái Răng',
                'name_search' => 'cho noi cai rang',
                'address' => 'Sông Cần Thơ, Cái Răng, Cần Thơ',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Nét văn hóa sông nước giao thương trên ghe thuyền đặc sắc. 
🚩 Biểu tượng: "Cây bẹo" treo sản vật. 
🌅 Trải nghiệm: Ăn sáng hủ tiếu trên ghe lúc mờ sáng. 
🚗 Di chuyển: Thuê tàu từ bến Ninh Kiều từ 5h-6h sáng. 

💡 Lưu ý: Đi thật sớm vì chợ tan sau 8h sáng.',
                'image_thumbnail' => 'can-tho-cho-noi-cai-rang.jpg',
                'latitude' => '9.99310000',
                'longitude' => '105.74830000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => 5,
                'category_id' => 9,
                'name' => 'Bến Ninh Kiều',
                'name_search' => 'ben ninh kieu',
                'address' => 'Tân An, Ninh Kiều, Cần Thơ',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Biểu tượng của Tây Đô với công viên xanh ven sông Hậu. 
🚩 Biểu tượng: Tượng đài Bác Hồ cao 7.2m. 
🌅 Trải nghiệm: Đi du thuyền nghe đờn ca tài tử đêm. 
🚗 Di chuyển: Trung tâm thành phố. 

💡 Lưu ý: Chợ đêm gần bến có nhiều đồ ăn vặt hấp dẫn.',
                'image_thumbnail' => 'can-tho-ben-ninh-kieu.jpg',
                'latitude' => '10.03350000',
                'longitude' => '105.78720000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => 5,
                'category_id' => 9,
                'name' => 'Lung Ngọc Hoàng',
                'name_search' => 'lung ngoc hoang',
                'address' => 'Phương Bình, Phụng Hiệp, Hậu Giang',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Khu bảo tồn thiên nhiên ngập nước với rừng tràm hoang sơ. 
🚩 Biểu tượng: Thảm thực vật xanh ngắt và chim quý. 
🌅 Trải nghiệm: Ngồi xuồng ba lá len lỏi rừng tràm. 
🚗 Di chuyển: Cách Vị Thanh 40km. 

💡 Lưu ý: Nên chuẩn bị thuốc chống muỗi khi vào rừng.',
                'image_thumbnail' => 'can-tho-lung-ngoc-hoang.jpg',
                'latitude' => '9.70420000',
                'longitude' => '105.68830000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => 5,
                'category_id' => 5,
                'name' => 'Chùa Dơi',
                'name_search' => 'chua doi',
                'address' => 'Phường 3, TP. Sóc Trăng, Sóc Trăng',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Ngôi chùa Khmer cổ kính với kiến trúc rực rỡ, nơi cư ngụ của hàng ngàn con dơi. 
🚩 Biểu tượng: Những đàn dơi treo mình trên cây. 
🌅 Trải nghiệm: Tìm hiểu văn hóa Khmer và xem dơi bay đi kiếm ăn lúc chiều. 
🚗 Di chuyển: Trung tâm TP. Sóc Trăng. 

💡 Lưu ý: Không gây tiếng động lớn làm ảnh hưởng đàn dơi.',
                'image_thumbnail' => 'can-tho-chua-doi.jpg',
                'latitude' => '9.60000000',
                'longitude' => '105.97500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => 6,
                'category_id' => 3,
                'name' => 'Đại Nội Huế',
                'name_search' => 'đai noi hue',
                'address' => 'Phú Hậu, TP. Huế, Thừa Thiên Huế',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Di sản thế giới, nơi ở của 13 vị vua triều Nguyễn với kiến trúc cung đình kiên cố. 
🚩 Biểu tượng: Cổng Ngọ Môn, Điện Thái Hòa. 
🌅 Trải nghiệm: Thuê áo dài chụp ảnh cung đình, xem lễ đổi gác. 
🚗 Di chuyển: Trung tâm thành phố Huế. 

💡 Lưu ý: Khu vực rất rộng, nên mang theo nước và ô/dù.',
                'image_thumbnail' => 'hue-dai-noi-hue.jpg',
                'latitude' => '16.46330000',
                'longitude' => '107.57830000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => 6,
                'category_id' => 5,
                'name' => 'Chùa Thiên Mụ',
                'name_search' => 'chua thien mu',
                'address' => 'Hương Hòa, TP. Huế, Thừa Thiên Huế',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Ngôi chùa cổ nhất Huế tọa lạc bên dòng sông Hương thơ mộng. 
🚩 Biểu tượng: Tháp Phước Duyên 7 tầng. 
🌅 Trải nghiệm: Ngắm hoàng hôn trên sông Hương và nghe tiếng chuông chùa. 
🚗 Di chuyển: Đi thuyền rồng hoặc xe máy dọc Kim Long. 

💡 Lưu ý: Mặc trang phục trang nghiêm.',
                'image_thumbnail' => 'hue-chua-thien-mu.jpg',
                'latitude' => '16.45250000',
                'longitude' => '107.54500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => 6,
                'category_id' => 3,
                'name' => 'Lăng Khải Định',
                'name_search' => 'lang khai đinh',
                'address' => 'Thủy Bằng, Hương Thủy, Thừa Thiên Huế',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Sự pha trộn độc đáo giữa kiến trúc Việt và phương Tây với nghệ thuật khảm sành sứ. 
🚩 Biểu tượng: Cung Thiên Định lộng lẫy. 
🌅 Trải nghiệm: Chiêm ngưỡng tranh "Cửu long ẩn vân". 
🚗 Di chuyển: Cách trung tâm Huế 10km. 

💡 Lưu ý: Có nhiều bậc thang cao, cần cẩn thận khi leo.',
                'image_thumbnail' => 'hue-lang-khai-dinh.jpg',
                'latitude' => '16.39890000',
                'longitude' => '107.59390000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => 6,
                'category_id' => 9,
                'name' => 'Sông Hương - Núi Ngự',
                'name_search' => 'song huong - nui ngu',
                'address' => 'TP. Huế, Thừa Thiên Huế',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Bộ đôi danh thắng tạo nên vẻ đẹp trầm mặc cho xứ Huế. 
🚩 Biểu tượng: Cầu Trường Tiền bắc qua sông Hương. 
🌅 Trải nghiệm: Đi thuyền rồng nghe ca Huế và dạo núi Ngự Bình. 
🚗 Di chuyển: Ngay trung tâm thành phố. 

💡 Lưu ý: Đi du thuyền buổi tối để ngắm thành phố lên đèn.',
                'image_thumbnail' => 'hue-song-huong-nui-ngu.jpg',
                'latitude' => '16.45000000',
                'longitude' => '107.58330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => 7,
                'category_id' => 9,
                'name' => 'Cao nguyên đá Đồng Văn',
                'name_search' => 'cao nguyen da đong van',
                'address' => 'Huyện Đồng Văn, Hà Giang',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Công viên địa chất toàn cầu với cảnh quan núi đá tai mèo kỳ vĩ. 
🚩 Biểu tượng: Cột cờ Lũng Cú, Nhà của Pao. 
🌅 Trải nghiệm: Chinh phục đèo Mã Pì Lèng và chợ phiên Đồng Văn. 
🚗 Di chuyển: Xe khách hoặc xe máy từ TP. Hà Giang. 

💡 Lưu ý: Đường nhiều đèo dốc hiểm trở, lái xe cần tập trung.',
                'image_thumbnail' => 'tuyen-quang-cao-nguyen-da-dong-van.jpg',
                'latitude' => '23.23890000',
                'longitude' => '105.21110000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => 7,
                'category_id' => 9,
                'name' => 'Sông Nho Quế',
                'name_search' => 'song nho que',
                'address' => 'Pải Lủng, Mèo Vạc, Hà Giang',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Dòng sông xanh ngọc bích uốn lượn dưới chân đèo Mã Pì Lèng hùng vĩ. 
🚩 Biểu tượng: Hẻm vực Tu Sản sâu nhất Đông Nam Á. 
🌅 Trải nghiệm: Đi thuyền trên sông và ngắm vách đá dựng đứng. 
🚗 Di chuyển: Xuống bến thuyền Xín Cái hoặc Pải Lủng. 

💡 Lưu ý: Đường xuống bến thuyền rất dốc và nhiều cua gắt.',
                'image_thumbnail' => 'tuyen-quang-song-nho-que.jpg',
                'latitude' => '23.15000000',
                'longitude' => '105.40000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => 8,
                'category_id' => 9,
                'name' => 'Đỉnh Fansipan',
                'name_search' => 'đinh fansipan',
                'address' => 'Sa Pa, Lào Cai',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: "Nóc nhà Đông Dương" với độ cao 3.143m và quần thể tâm linh đỉnh núi. 
🚩 Biểu tượng: Cột mốc đỉnh Fansipan. 
🌅 Trải nghiệm: Đi cáp treo xuyên mây và săn mây trên đỉnh. 
🚗 Di chuyển: Đi tàu leo núi từ trung tâm Sapa. 

💡 Lưu ý: Luôn mang theo áo khoác vì trên đỉnh rất lạnh.',
                'image_thumbnail' => 'lao-cai-dinh-fansipan.jpg',
                'latitude' => '22.30330000',
                'longitude' => '103.77500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            30 => 
            array (
                'id' => 31,
                'province_id' => 8,
                'category_id' => 9,
                'name' => 'Bản Cát Cát',
                'name_search' => 'ban cat cat',
                'address' => 'San Sả Hồ, Sa Pa, Lào Cai',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Ngôi làng cổ của người H\'Mông với những nếp nhà gỗ bên dòng suối nhỏ. 
🚩 Biểu tượng: Thác nước Cát Cát và cối xay nước gỗ. 
🌅 Trải nghiệm: Thuê váy dân tộc chụp ảnh và tìm hiểu nghề dệt vải. 
🚗 Di chuyển: Cách trung tâm Sapa 2km. 

💡 Lưu ý: Đoạn đường đi bộ bậc thang khá dài, nên đi giày bệt.',
                'image_thumbnail' => 'lao-cai-ban-cat-cat.jpg',
                'latitude' => '22.32890000',
                'longitude' => '103.83440000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            31 => 
            array (
                'id' => 32,
                'province_id' => 8,
                'category_id' => 5,
                'name' => 'Nhà thờ Đá Sapa',
                'name_search' => 'nha tho đa sapa',
                'address' => 'TT. Sa Pa, Lào Cai',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Biểu tượng của thị trấn sương mù, kiến trúc Gothic Pháp từ thời thuộc địa. 
🚩 Biểu tượng: Tháp chuông đá trung tâm quảng trường. 
🌅 Trải nghiệm: Xem múa hát dân tộc tại quảng trường trước nhà thờ. 
🚗 Di chuyển: Ngay trung tâm Sapa. 

💡 Lưu ý: Buổi tối cuối tuần khu vực này rất nhộn nhịp.',
                'image_thumbnail' => 'lao-cai-nha-tho-da-sapa.jpg',
                'latitude' => '22.33500000',
                'longitude' => '103.84280000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            32 => 
            array (
                'id' => 33,
                'province_id' => 8,
                'category_id' => 9,
                'name' => 'Thung lũng Mường Hoa',
                'name_search' => 'thung lung muong hoa',
                'address' => 'Xã Hầu Thào, Sa Pa, Lào Cai',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Cảnh quan ruộng bậc thang tuyệt đẹp xen lẫn những bãi đá cổ huyền bí. 
🚩 Biểu tượng: Bãi đá cổ Sapa với các hình chạm khắc. 
🌅 Trải nghiệm: Trekking qua các bản làng ngắm lúa chín. 
🚗 Di chuyển: Cách trung tâm Sapa khoảng 8km. 

💡 Lưu ý: Mùa lúa chín vào tháng 9-10 là lúc đẹp nhất.',
                'image_thumbnail' => 'lao-cai-thung-lung-muong-hoa.jpg',
                'latitude' => '22.30000000',
                'longitude' => '103.88330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            33 => 
            array (
                'id' => 34,
                'province_id' => 8,
                'category_id' => 9,
                'name' => 'Đèo Ô Quy Hồ',
                'name_search' => 'đeo ô quy ho',
                'address' => 'Ranh giới Lào Cai - Lai Châu',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Một trong tứ đại đỉnh đèo với cung đường uốn lượn mây phủ quanh năm. 
🚩 Biểu tượng: Cổng trời đỉnh đèo. 
🌅 Trải nghiệm: Ngắm hoàng hôn trên biển mây và ăn cơm lam nướng. 
🚗 Di chuyển: Đường nối Sapa đi Lai Châu. 

💡 Lưu ý: Chiều tối thường có sương mù dày đặc, lái xe thận trọng.',
                'image_thumbnail' => 'lao-cai-deo-o-quy-ho.jpg',
                'latitude' => '22.35000000',
                'longitude' => '103.76670000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            34 => 
            array (
                'id' => 35,
                'province_id' => 9,
                'category_id' => 9,
                'name' => 'Hồ Núi Cốc',
                'name_search' => 'ho nui coc',
                'address' => 'Huyện Đại Từ, Thái Nguyên',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Khu du lịch sinh thái gắn liền với huyền thoại nàng Công chàng Cốc. 
🚩 Biểu tượng: Tượng Phật khổng lồ cao 45m. 
🌅 Trải nghiệm: Đi thuyền ngắm các đảo nhỏ và tham quan động Huyền Thoại. 
🚗 Di chuyển: Cách TP. Thái Nguyên 15km. 

💡 Lưu ý: Phù hợp cho du lịch gia đình cuối tuần.',
                'image_thumbnail' => 'thai-nguyen-ho-nui-coc.jpg',
                'latitude' => '17.78170000',
                'longitude' => '105.71170000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            35 => 
            array (
                'id' => 36,
                'province_id' => 9,
                'category_id' => 7,
                'name' => 'Làng nghề chè Tân Cương',
                'name_search' => 'lang nghe che tan cuong',
                'address' => 'Xã Tân Cương, TP. Thái Nguyên',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Thủ phủ chè xanh nổi tiếng với những đồi chè uốn lượn xanh mướt. 
🚩 Biểu tượng: Đặc sản chè móc câu Tân Cương. 
🌅 Trải nghiệm: Thử làm nghệ nhân hái trà và thưởng trà tại chỗ. 
🚗 Di chuyển: Cách trung tâm Thái Nguyên 10km. 

💡 Lưu ý: Sáng sớm là thời điểm chụp ảnh đồi chè đẹp nhất.',
                'image_thumbnail' => 'thai-nguyen-lang-nghe-che-tan-cuong.jpg',
                'latitude' => '17.75000000',
                'longitude' => '105.78330000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            36 => 
            array (
                'id' => 37,
                'province_id' => 9,
                'category_id' => 3,
                'name' => 'ATK Định Hóa',
                'name_search' => 'atk đinh hoa',
                'address' => 'Huyện Định Hóa, Thái Nguyên',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Di tích quốc gia đặc biệt, nơi ở và làm việc của Bác Hồ thời kháng chiến. 
🚩 Biểu tượng: Đồi Tỉn Keo và nhà sàn Bác Hồ. 
🌅 Trải nghiệm: Tìm hiểu lịch sử cách mạng tại chiến khu xưa. 
🚗 Di chuyển: Cách TP. Thái Nguyên 50km. 

💡 Lưu ý: Đường vào có nhiều đồi núi xanh mát nhưng nhỏ hẹp.',
                'image_thumbnail' => 'thai-nguyen-atk-dinh-hoa.jpg',
                'latitude' => '17.88330000',
                'longitude' => '105.65000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            37 => 
            array (
                'id' => 38,
                'province_id' => 10,
                'category_id' => 5,
                'name' => 'Đền Hùng',
                'name_search' => 'đen hung',
                'address' => 'Hy Cương, Việt Trì, Phú Thọ',
                'content' => '🏛️ Ý nghĩa & Kiến trúc: Trung tâm thờ tự các vua Hùng, tổ tiên của dân tộc Việt Nam. 
🚩 Biểu tượng: Đền Thượng trên đỉnh núi Nghĩa Lĩnh. 
🌅 Trải nghiệm: Lễ hội Giỗ tổ Hùng Vương 10/3 âm lịch. 
🚗 Di chuyển: Cách Hà Nội 90km. 

💡 Lưu ý: Cần nhiều sức khỏe để leo hàng trăm bậc đá lên đền Thượng.',
                'image_thumbnail' => 'phu-tho-den-hung.jpg',
                'latitude' => '21.36530000',
                'longitude' => '105.32110000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            38 => 
            array (
                'id' => 39,
                'province_id' => 10,
                'category_id' => 9,
                'name' => 'Hồ Thác Bà',
                'name_search' => 'ho thac ba',
                'address' => 'Huyện Yên Bình, Yên Bái',
                'content' => '🏛️ Ý nghĩa: Một trong ba hồ nước nhân tạo lớn nhất Việt Nam, được ví như "Hạ Long trên núi" với hơn 1.300 đảo lớn nhỏ. 
🚩 Biểu tượng: Nhà máy Thủy điện Thác Bà và động Thủy Tiên. 
🌅 Trải nghiệm: Đi thuyền thưởng ngoạn lòng hồ, thăm các bản làng người Dao quần trắng ven hồ. 
🚗 Di chuyển: Cách TP. Yên Bái 15km. 

💡 Lưu ý: Nên đi thuyền vào sáng sớm để ngắm cảnh đẹp nhất.',
                'image_thumbnail' => 'phu-tho-ho-thac-ba.jpg',
                'latitude' => '21.75000000',
                'longitude' => '104.91670000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            39 => 
            array (
                'id' => 40,
                'province_id' => 10,
                'category_id' => 9,
                'name' => 'Vườn quốc gia Xuân Thủy',
                'name_search' => 'vuon quoc gia xuan thuy',
                'address' => 'Huyện Giao Thủy, Nam Định',
                'content' => '🏛️ Ý nghĩa: Vùng đất ngập nước đầu tiên của Việt Nam gia nhập Công ước quốc tế Ramsar, là nơi dừng chân của các loài chim di cư. 
🚩 Biểu tượng: Rừng ngập mặn cửa sông Hồng. 
🌅 Trải nghiệm: Xem chim di cư từ tháng 10 đến tháng 3 năm sau, đi bộ giữa rừng bần, rừng mắm. 
🚗 Di chuyển: Cách trung tâm Nam Định 60km. 

💡 Lưu ý: Cần mang theo ống nhòm để quan sát chim rõ hơn.',
                'image_thumbnail' => 'phu-tho-vuon-quoc-gia-xuan-thuy.jpg',
                'latitude' => '20.25000000',
                'longitude' => '106.50000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            40 => 
            array (
                'id' => 41,
                'province_id' => 11,
                'category_id' => 5,
                'name' => 'Chùa Bút Tháp',
                'name_search' => 'chua but thap',
                'address' => 'Thuận Thành, Bắc Ninh',
                'content' => '🏛️ Ý nghĩa: Ngôi chùa cổ mang đậm dấu ấn kiến trúc thời Hậu Lê, lưu giữ nhiều bảo vật quốc gia. 
🚩 Biểu tượng: Tượng Phật Bà Quan Thế Âm thiên thủ thiên nhãn bằng gỗ lớn nhất VN. 
🌅 Trải nghiệm: Chiêm ngưỡng nghệ thuật điêu khắc gỗ tinh xảo và tháp Báo Nghiêm bằng đá. 
🚗 Di chuyển: Cách trung tâm Bắc Ninh 15km. 

💡 Lưu ý: Giữ im lặng tuyệt đối khi tham quan khu vực bái đường.',
                'image_thumbnail' => 'bac-ninh-chua-but-thap.jpg',
                'latitude' => '21.05000000',
                'longitude' => '106.10000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            41 => 
            array (
                'id' => 42,
                'province_id' => 11,
                'category_id' => 9,
                'name' => 'Làng nghề Quan Họ',
                'name_search' => 'lang nghe quan ho',
            'address' => 'Viêm Xá (Diềm), Bắc Ninh',
                'content' => '🏛️ Ý nghĩa: Cái nôi của dân ca Quan họ Bắc Ninh - Di sản văn hóa phi vật thể đại diện của nhân loại. 
🚩 Biểu tượng: Đền Cùng - Giếng Ngọc linh thiêng. 
🌅 Trải nghiệm: Nghe các liền anh, liền chị hát quan họ tại các nhà chứa và thưởng thức trầu cánh phượng. 
🚗 Di chuyển: Cách trung tâm TP. Bắc Ninh 5km. 

💡 Lưu ý: Nên ghé thăm vào dịp lễ hội tháng Giêng.',
                'image_thumbnail' => 'bac-ninh-lang-nghe-quan-ho.jpg',
                'latitude' => '21.18330000',
                'longitude' => '106.06670000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            42 => 
            array (
                'id' => 43,
                'province_id' => 11,
                'category_id' => 3,
                'name' => 'Đình Bắc Ninh',
                'name_search' => 'đinh bac ninh',
                'address' => 'TP. Bắc Ninh, Bắc Ninh',
                'content' => '🏛️ Ý nghĩa: Hệ thống các ngôi đình làng cổ kính tiêu biểu cho văn hóa xứ Kinh Bắc xưa. 
🚩 Biểu tượng: Kiến trúc đình gỗ mái đao cong vút. 
🌅 Trải nghiệm: Tìm hiểu tín ngưỡng thờ Thành hoàng làng và nghệ thuật chạm khắc kiến trúc. 
🚗 Di chuyển: Nằm rải rác tại các phường trung tâm. 

💡 Lưu ý: Các đình thường mở cửa vào ngày rằm hoặc mồng một.',
                'image_thumbnail' => 'bac-ninh-dinh-bac-ninh.jpg',
                'latitude' => '21.18330000',
                'longitude' => '106.05000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            43 => 
            array (
                'id' => 44,
                'province_id' => 12,
                'category_id' => 3,
                'name' => 'Phố Hiến',
                'name_search' => 'pho hien',
                'address' => 'TP. Hưng Yên, Hưng Yên',
                'content' => '🏛️ Ý nghĩa: Thương cảng sầm uất thứ hai của miền Bắc vào thế kỷ XVI-XVII với câu nói nổi tiếng "Thứ nhất Kinh Kỳ, thứ nhì Phố Hiến". 
🚩 Biểu tượng: Văn Miếu Xích Đằng và Chùa Chuông. 
🌅 Trải nghiệm: Khám phá kiến trúc đền chùa và thưởng thức đặc sản nhãn lồng tiến vua. 
🚗 Di chuyển: Trung tâm TP. Hưng Yên. 

💡 Lưu ý: Phù hợp để đi tour tham quan trong ngày từ Hà Nội.',
                'image_thumbnail' => 'hung-yen-pho-hien.jpg',
                'latitude' => '20.65000000',
                'longitude' => '106.05000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            44 => 
            array (
                'id' => 45,
                'province_id' => 12,
                'category_id' => 5,
                'name' => 'Chùa Chuông',
                'name_search' => 'chua chuong',
                'address' => 'Hiến Nam, TP. Hưng Yên',
                'content' => '🏛️ Ý nghĩa: Được mệnh danh là "Phố Hiến đệ nhất danh lam", ngôi chùa gắn liền với truyền thuyết quả chuông vàng. 
🚩 Biểu tượng: Hệ thống tượng La Hán bằng đất sét tinh xảo. 
🌅 Trải nghiệm: Đi qua cây cầu đá cổ kính và chiêm bái các pho tượng cổ. 
🚗 Di chuyển: Nằm trong quần thể di tích Phố Hiến. 

💡 Lưu ý: Trang phục trang nghiêm khi vào lễ.',
                'image_thumbnail' => 'hung-yen-chua-chuong.jpg',
                'latitude' => '20.65000000',
                'longitude' => '106.05000000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            45 => 
            array (
                'id' => 46,
                'province_id' => 13,
                'category_id' => 9,
                'name' => 'Tràng An',
                'name_search' => 'trang an',
                'address' => 'Hoa Lư, Ninh Bình',
                'content' => '🏛️ Ý nghĩa: Di sản Thế giới kép, sự kết hợp hoàn mỹ giữa vẻ đẹp thiên nhiên và các di tích lịch sử triều Đinh - Lê. 
🚩 Biểu tượng: Các hang động xuyên thủy và bến thuyền Tràng An. 
🌅 Trải nghiệm: Ngồi thuyền nan dọc theo sông Sào Khê, tham quan Hành cung Vũ Lâm. 
🚗 Di chuyển: Cách TP. Ninh Bình 7km. 

💡 Lưu ý: Nên đi tour sớm để tránh nắng đỉnh điểm.',
                'image_thumbnail' => 'ninh-binh-trang-an.jpg',
                'latitude' => '20.21670000',
                'longitude' => '105.91670000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            46 => 
            array (
                'id' => 47,
                'province_id' => 13,
                'category_id' => 5,
                'name' => 'Chùa Bái Đính',
                'name_search' => 'chua bai đinh',
                'address' => 'Gia Viễn, Ninh Bình',
                'content' => '🏛️ Ý nghĩa: Quần thể chùa tâm linh lớn nhất Việt Nam, là nơi tổ chức nhiều sự kiện Phật giáo quốc tế quan trọng. 
🚩 Biểu tượng: Bảo Tháp cao 100m và tượng Phật bằng đồng dát vàng. 
🌅 Trải nghiệm: Vãn cảnh hành lang 500 pho tượng La Hán đá. 
🚗 Di chuyển: Trong quần thể danh thắng Tràng An. 

💡 Lưu ý: Nên dùng xe điện để di chuyển giữa các điểm vì diện tích rất lớn.',
                'image_thumbnail' => 'ninh-binh-chua-bai-dinh.jpg',
                'latitude' => '20.26780000',
                'longitude' => '105.86780000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            47 => 
            array (
                'id' => 48,
                'province_id' => 13,
                'category_id' => 9,
                'name' => 'Tam Cốc - Bích Động',
                'name_search' => 'tam coc - bich đong',
                'address' => 'Hoa Lư, Ninh Bình',
                'content' => '🏛️ Ý nghĩa: Vẻ đẹp sơn thủy hữu tình được ví như "Hạ Long trên cạn". 
🚩 Biểu tượng: Chùa Bích Động và hệ thống 3 hang động. 
🌅 Trải nghiệm: Đi thuyền giữa cánh đồng lúa và sông Ngô Đồng. 
🚗 Di chuyển: Cách trung tâm Ninh Bình 7km. 

💡 Lưu ý: Đẹp nhất vào mùa lúa chín tháng 5 - tháng 6.',
                'image_thumbnail' => 'ninh-binh-tam-coc-bich-dong.jpg',
                'latitude' => '20.20310000',
                'longitude' => '105.91500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            48 => 
            array (
                'id' => 49,
                'province_id' => 13,
                'category_id' => 3,
                'name' => 'Cố đô Hoa Lư',
                'name_search' => 'co do hoa lu',
                'address' => 'Hoa Lư, Ninh Bình',
                'content' => '🏛️ Ý nghĩa: Kinh đô đầu tiên của nước Đại Cồ Việt, chứng tích của một thời đại lịch sử hào hùng. 
🚩 Biểu tượng: Đền thờ Vua Đinh Tiên Hoàng và Vua Lê Đại Hành. 
🌅 Trải nghiệm: Tìm hiểu lịch sử và chiêm ngưỡng các cổ vật nghìn năm. 
🚗 Di chuyển: Gần khu du lịch Tràng An. 

💡 Lưu ý: Nên đi cùng hướng dẫn viên để nghe kể về lịch sử.',
                'image_thumbnail' => 'ninh-binh-co-do-hoa-lu.jpg',
                'latitude' => '20.28470000',
                'longitude' => '105.90830000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            49 => 
            array (
                'id' => 50,
                'province_id' => 13,
                'category_id' => 9,
                'name' => 'Hang Múa',
                'name_search' => 'hang mua',
                'address' => 'Ninh Xuân, Hoa Lư, Ninh Bình',
                'content' => '🏛️ Ý nghĩa: Nơi vua Trần về thưởng ngoạn múa hát xưa kia, giờ là điểm ngắm toàn cảnh đẹp nhất Ninh Bình. 
🚩 Biểu tượng: Đỉnh núi Ngọa Long với tượng rồng đá. 
🌅 Trải nghiệm: Chinh phục 500 bậc đá ngắm nhìn Tam Cốc từ trên cao. 
🚗 Di chuyển: Gần khu Tam Cốc. 

💡 Lưu ý: Cần đi giày thể thao để leo núi an toàn.',
                'image_thumbnail' => 'ninh-binh-hang-mua.jpg',
                'latitude' => '20.23190000',
                'longitude' => '105.93250000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            50 => 
            array (
                'id' => 51,
                'province_id' => 14,
                'category_id' => 3,
                'name' => 'Thành cổ Quảng Trị',
                'name_search' => 'thanh co quang tri',
                'address' => 'Thị xã Quảng Trị, Quảng Trị',
                'content' => '🏛️ Ý nghĩa: Biểu tượng cho tinh thần bất khuất của quân dân Việt Nam trong cuộc chiến 81 ngày đêm bảo vệ thành cổ. 
🚩 Biểu tượng: Đài tưởng niệm linh thiêng hình nấm mồ chung. 
🌅 Trải nghiệm: Thắp hương tri ân các anh hùng và thăm bảo tàng chứng tích. 
🚗 Di chuyển: Nằm trung tâm thị xã Quảng Trị. 

💡 Lưu ý: Giữ thái độ thành kính, trang nghiêm.',
                'image_thumbnail' => 'quang-tri-thanh-co-quang-tri.jpg',
                'latitude' => '16.74170000',
                'longitude' => '107.19500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            51 => 
            array (
                'id' => 52,
                'province_id' => 14,
                'category_id' => 3,
                'name' => 'Địa đạo Vịnh Mốc',
                'name_search' => 'đia dao vinh moc',
                'address' => 'Vĩnh Linh, Quảng Trị',
                'content' => '🏛️ Ý nghĩa: Hệ thống làng hầm kỳ vĩ dưới lòng đất, minh chứng cho sức sống mãnh liệt vùng "đất lửa". 
🚩 Biểu tượng: Cổng hầm hướng ra biển và các căn phòng trong lòng đất. 
🌅 Trải nghiệm: Khám phá đời sống dưới hầm và sự kỳ diệu của hệ thống thông gió. 
🚗 Di chuyển: Cách Đông Hà 30km. 

💡 Lưu ý: Người cao nên chú ý tránh va chạm trần hầm.',
                'image_thumbnail' => 'quang-tri-dia-dao-vinh-moc.jpg',
                'latitude' => '17.03810000',
                'longitude' => '107.10890000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            52 => 
            array (
                'id' => 53,
                'province_id' => 14,
                'category_id' => 2,
                'name' => 'Biển Cửa Việt',
                'name_search' => 'bien cua viet',
                'address' => 'Gio Linh, Quảng Trị',
                'content' => '🏛️ Ý nghĩa: Bãi biển rộng, thoải, nước trong và đặc biệt hoang sơ. 
🚩 Biểu tượng: Tượng đài anh hùng bến cảng Cửa Việt. 
🌅 Trải nghiệm: Tắm biển, dạo cát và thưởng thức hải sản Quảng Trị. 
🚗 Di chuyển: Cách Đông Hà 15km về phía Đông. 

💡 Lưu ý: Bãi biển rất dài, thích hợp cho các hoạt động teambuilding.',
                'image_thumbnail' => 'quang-tri-bien-cua-viet.jpg',
                'latitude' => '16.89170000',
                'longitude' => '107.17500000',
                'is_featured' => 0,
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
            ),
            53 => 
            array (
                'id' => 54,
                'province_id' => 15,
                'category_id' => 9,
                'name' => 'Đảo Lý Sơn',
                'name_search' => 'đao ly son',
                'address' => 'Huyện Lý Sơn, Quảng Ngãi',
                'content' => '🏛️ Ý nghĩa: Di tích núi lửa hàng triệu năm, quê hương của đội hùng binh Hoàng Sa kiêm quản Trường Sa xưa. 
🚩 Biểu tượng: Cổng Tò Vo và hải đăng Lý Sơn. 
🌅 Trải nghiệm: Lặn ngắm san hô bãi Sau, tham quan hang Câu. 
🚗 Di chuyển: Tàu cao tốc từ cảng Sa Kỳ. 

💡 Lưu ý: Tránh đi vào mùa mưa bão (tháng 10 - 12).',
                    'image_thumbnail' => 'quang-ngai-dao-ly-son.jpg',
                    'latitude' => '15.38330000',
                    'longitude' => '109.11670000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                54 => 
                array (
                    'id' => 55,
                    'province_id' => 15,
                    'category_id' => 3,
                    'name' => 'Thánh địa Mỹ Sơn',
                    'name_search' => 'thanh dia my son',
                    'address' => 'Duy Xuyên, Quảng Nam',
                    'content' => '🏛️ Ý nghĩa: Quần thể đền đài Ấn Độ giáo độc đáo của Vương quốc Champa. 
🚩 Biểu tượng: Các ngôi tháp gạch nung hàng nghìn năm tuổi. 
🌅 Trải nghiệm: Thưởng thức điệu múa Apsara huyền ảo trước chân tháp. 
🚗 Di chuyển: Cách Hội An 40km. 

💡 Lưu ý: Nên mang theo mũ rộng vành vì khu di tích khá nắng.',
                    'image_thumbnail' => 'quang-ngai-thanh-dia-my-son.jpg',
                    'latitude' => '15.76670000',
                    'longitude' => '108.11670000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                55 => 
                array (
                    'id' => 56,
                    'province_id' => 15,
                    'category_id' => 2,
                    'name' => 'Bãi biển Mỹ Khê Quảng Ngãi',
                    'name_search' => 'bai bien my khe quang ngai',
                    'address' => 'Sơn Tịnh, Quảng Ngãi',
                    'content' => '🏛️ Ý nghĩa: Bãi biển thanh bình với rặng phi lao xanh ngắt chắn sóng. 
🚩 Biểu tượng: Những con sóng hiền hòa và bãi cát trắng mịn. 
🌅 Trải nghiệm: Thưởng thức cá nướng và nghe sóng vỗ giữa không gian yên tĩnh. 
🚗 Di chuyển: Cách TP. Quảng Ngãi 12km. 

💡 Lưu ý: Bãi biển còn hoang sơ, hãy chú ý bảo vệ môi trường.',
                    'image_thumbnail' => 'quang-ngai-bai-bien-my-khe-quang-ngai.jpg',
                    'latitude' => '15.17640000',
                    'longitude' => '108.87560000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                56 => 
                array (
                    'id' => 57,
                    'province_id' => 4,
                    'category_id' => 9,
                    'name' => 'Hồ Tơ Nưng',
                    'name_search' => 'ho to nung',
                    'address' => 'TP. Pleiku, Gia Lai',
                    'content' => '🏛️ Ý nghĩa: "Đôi mắt Pleiku" thơ mộng, là một trong những hồ tự nhiên đẹp nhất Tây Nguyên. 
🚩 Biểu tượng: Con đường hàng thông lá kim dẫn lối vào hồ. 
🌅 Trải nghiệm: Ngắm mặt hồ xanh ngắt và dạo bước dưới tán rừng thông mát rượi. 
🚗 Di chuyển: Cách trung tâm TP 7km. 

💡 Lưu ý: Thời điểm ngắm cảnh đẹp nhất là bình minh.',
                    'image_thumbnail' => 'gia-lai-ho-to-nung.jpg',
                    'latitude' => '14.05000000',
                    'longitude' => '108.00000000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-05-23 17:55:27',
                ),
                57 => 
                array (
                    'id' => 58,
                    'province_id' => 16,
                    'category_id' => 9,
                    'name' => 'Biển Hồ',
                    'name_search' => 'bien ho',
                    'address' => 'TP. Pleiku, Gia Lai',
                    'content' => '🏛️ Ý nghĩa: Tên gọi dân gian của hồ Tơ Nưng, biểu trưng cho vẻ đẹp nguyên sơ của núi rừng Gia Lai. 
🚩 Biểu tượng: Tượng Phật Bà hướng nhìn ra hồ. 
🌅 Trải nghiệm: Tận hưởng không khí se lạnh đặc trưng của phố núi. 
🚗 Di chuyển: Theo quốc lộ 14 hướng về Kontum. 

💡 Lưu ý: Có xe điện hỗ trợ di chuyển vào cổng di tích.',
                    'image_thumbnail' => 'gia-lai-bien-ho.jpg',
                    'latitude' => '14.05000000',
                    'longitude' => '108.00000000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                58 => 
                array (
                    'id' => 59,
                    'province_id' => 16,
                    'category_id' => 9,
                    'name' => 'Thác Phú Cường',
                    'name_search' => 'thac phu cuong',
                    'address' => 'Chư Sê, Gia Lai',
                    'content' => '🏛️ Ý nghĩa: Ngọn thác kỳ vĩ chảy trên nền nham thạch của ngọn núi lửa đã tắt. 
🚩 Biểu tượng: Cột nước trắng xóa từ độ cao 45m. 
🌅 Trải nghiệm: Chinh phục các bậc đá xuống chân thác và ngắm thảm thực vật xung quanh. 
🚗 Di chuyển: Cách TP. Pleiku 45km. 

💡 Lưu ý: Chú ý an toàn khi di chuyển trên các tảng đá trơn trượt.',
                    'image_thumbnail' => 'gia-lai-thac-phu-cuong.jpg',
                    'latitude' => '13.78330000',
                    'longitude' => '108.13330000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                59 => 
                array (
                    'id' => 60,
                    'province_id' => 16,
                    'category_id' => 9,
                    'name' => 'Eo Gió',
                    'name_search' => 'eo gio',
                    'address' => 'Nhơn Lý, Quy Nhơn, Bình Định',
                    'content' => '🏛️ Ý nghĩa: Vẻ đẹp hoang sơ của eo biển lộng gió ôm lấy rặng núi đá hùng vĩ. 
🚩 Biểu tượng: Cung đường đi bộ ven biển đẹp như tranh vẽ. 
🌅 Trải nghiệm: Ngắm bình minh trên biển và chụp ảnh cùng các hang đá tự nhiên. 
🚗 Di chuyển: Cách Quy Nhơn 20km. 

💡 Lưu ý: Gió rất mạnh, nên cột chặt mũ nón khi chụp ảnh.',
                    'image_thumbnail' => 'gia-lai-eo-gio.jpg',
                    'latitude' => '13.92360000',
                    'longitude' => '109.29440000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                60 => 
                array (
                    'id' => 61,
                    'province_id' => 16,
                    'category_id' => 2,
                    'name' => 'Bãi biển Quy Nhơn',
                    'name_search' => 'bai bien quy nhon',
                    'address' => 'TP. Quy Nhơn, Bình Định',
                    'content' => '🏛️ Ý nghĩa: Bãi biển uốn cong duyên dáng ngay cạnh trung tâm thành phố nhộn nhịp. 
🚩 Biểu tượng: Ghềnh Ráng Tiên Sa gần bờ. 
🌅 Trải nghiệm: Tắm biển và chạy bộ dọc công viên biển xanh mát. 
🚗 Di chuyển: Nằm dọc đường Xuân Diệu. 

💡 Lưu ý: Bãi tắm sạch và an toàn cho trẻ nhỏ.',
                    'image_thumbnail' => 'gia-lai-bai-bien-quy-nhon.jpg',
                    'latitude' => '13.77500000',
                    'longitude' => '109.23330000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                61 => 
                array (
                    'id' => 62,
                    'province_id' => 16,
                    'category_id' => 3,
                    'name' => 'Tháp Chăm Bánh Ít',
                    'name_search' => 'thap cham banh ít',
                    'address' => 'Tuy Phước, Bình Định',
                    'content' => '🏛️ Ý nghĩa: Một trong những quần thể kiến trúc Chăm cổ đẹp nhất Việt Nam với thiết kế độc bản. 
🚩 Biểu tượng: Tháp chính trên đỉnh đồi với kiến trúc cầu kỳ. 
🌅 Trải nghiệm: Khám phá nghệ thuật điêu khắc và ngắm toàn cảnh Tuy Phước từ đỉnh đồi. 
🚗 Di chuyển: Sát QL 1A. 

💡 Lưu ý: Nên đi vào buổi sáng để có ánh sáng chụp ảnh đẹp nhất.',
                    'image_thumbnail' => 'gia-lai-thap-cham-banh-it.jpg',
                    'latitude' => '13.88330000',
                    'longitude' => '109.11670000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                62 => 
                array (
                    'id' => 63,
                    'province_id' => 17,
                    'category_id' => 9,
                    'name' => 'Hồ Lắk',
                    'name_search' => 'ho lak',
                    'address' => 'Huyện Lắk, Đắk Lắk',
                    'content' => '🏛️ Ý nghĩa: Hồ nước ngọt tự nhiên rộng lớn gắn liền với truyền thuyết của người M\'Nông. 
🚩 Biểu tượng: Biệt điện Bảo Đại nhìn ra hồ. 
🌅 Trải nghiệm: Ngồi thuyền độc mộc ngắm sen và thưởng thức chả cá thát lát hồ Lắk. 
🚗 Di chuyển: Cách Buôn Ma Thuột 56km. 

💡 Lưu ý: Thích hợp cho kỳ nghỉ dưỡng bình yên.',
                    'image_thumbnail' => 'dak-lak-ho-lak.jpg',
                    'latitude' => '12.41670000',
                    'longitude' => '108.18330000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                63 => 
                array (
                    'id' => 64,
                    'province_id' => 17,
                    'category_id' => 9,
                    'name' => 'Thác Dray Nur',
                    'name_search' => 'thac dray nur',
                    'address' => 'Krông Ana, Đắk Lắk',
                    'content' => '🏛️ Ý nghĩa: Ngọn thác hùng vĩ bậc nhất Tây Nguyên, nơi kết nối linh hồn của dòng sông Serepôk. 
🚩 Biểu tượng: Dòng nước đổ như tấm rèm lụa trắng khổng lồ. 
🌅 Trải nghiệm: Chụp ảnh check-in và khám phá hệ thống hang động chân thác. 
🚗 Di chuyển: Cách trung tâm 25km. 

💡 Lưu ý: Cần đi theo biển chỉ dẫn để tránh lạc đường rừng.',
                    'image_thumbnail' => 'dak-lak-thac-dray-nur.jpg',
                    'latitude' => '12.54080000',
                    'longitude' => '107.90220000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                64 => 
                array (
                    'id' => 65,
                    'province_id' => 17,
                    'category_id' => 9,
                    'name' => 'Buôn Đôn',
                    'name_search' => 'buon đon',
                    'address' => 'Krông Na, Buôn Đôn, Đắk Lắk',
                    'content' => '🏛️ Ý nghĩa: Vùng đất huyền thoại với nghề săn bắt voi rừng và bản sắc văn hóa đa dân tộc. 
🚩 Biểu tượng: Nhà sàn cổ 120 năm và mộ vua săn voi. 
🌅 Trải nghiệm: Đi bộ trên cầu treo dài và tìm hiểu phong tục người Lào - Ê đê. 
🚗 Di chuyển: Cách Buôn Ma Thuột 40km. 

💡 Lưu ý: Không gây ồn ào khi vào thăm các nhà sàn cổ.',
                    'image_thumbnail' => 'dak-lak-buon-don.jpg',
                    'latitude' => '12.83330000',
                    'longitude' => '107.78330000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                65 => 
                array (
                    'id' => 66,
                    'province_id' => 18,
                    'category_id' => 2,
                    'name' => 'VinWonders',
                    'name_search' => 'vinwonders',
                    'address' => 'Hòn Tre, Nha Trang, Khánh Hòa',
                    'content' => '🏛️ Ý nghĩa: Thiên đường vui chơi giải trí trên đảo với nhiều trò chơi đẳng cấp quốc tế. 
🚩 Biểu tượng: Lâu đài trung tâm và đu quay bánh xe mặt trời. 
🌅 Trải nghiệm: Tham gia trò chơi cảm giác mạnh, xem show Tata kỳ ảo. 
🚗 Di chuyển: Cáp treo hoặc cano vượt biển. 

💡 Lưu ý: Nên mang theo kem chống nắng vì vui chơi ngoài trời nhiều.',
                    'image_thumbnail' => 'khanh-hoa-vinwonders.jpg',
                    'latitude' => '12.21920000',
                    'longitude' => '109.24310000',
                    'is_featured' => 0,
                    'created_at' => '2026-04-19 21:46:57',
                    'updated_at' => '2026-04-19 21:46:57',
                ),
                66 => 
                array (
                    'id' => 67,
                    'province_id' => 18,
                    'category_id' => 3,
                    'name' => 'Tháp Bà Ponagar',
                    'name_search' => 'thap ba ponagar',
                    'address' => 'TP. Nha Trang, Khánh Hòa',
                    'content' => '🏛️ Ý nghĩa: Biểu tượng văn hóa của thành phố biển, thờ Nữ thần Mẹ Xứ Sở. 
🚩 Biểu tượng: Tháp gạch đỏ hàng trăm năm tuổi trên đồi Cù Lao. 
🌅 Trải nghiệm: Xem múa bóng Chăm và cầu bình an. 
🚗 Di chuyển: Phía Bắc trung tâm Nha Trang. 

💡 Lưu ý: Giữ trang nghiêm và mặc trang phục kín đáo (nhà chùa có cho mượn áo choàng).',
                        'image_thumbnail' => 'khanh-hoa-thap-ba-ponagar.jpg',
                        'latitude' => '12.26530000',
                        'longitude' => '109.19580000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    67 => 
                    array (
                        'id' => 68,
                        'province_id' => 18,
                        'category_id' => 9,
                        'name' => 'Viện Hải dương học',
                        'name_search' => 'vien hai duong hoc',
                        'address' => 'Cầu Đá, Nha Trang, Khánh Hòa',
                        'content' => '🏛️ Ý nghĩa: Bảo tàng sinh vật biển quy mô lớn với nhiều mẫu vật quý hiếm nhất Việt Nam. 
🚩 Biểu tượng: Bộ xương cá voi khổng lồ được phục dựng hoàn chỉnh. 
🌅 Trải nghiệm: Khám phá thế giới đại dương qua hàng ngàn loài cá rực rỡ. 
🚗 Di chuyển: Gần cảng Cầu Đá. 

💡 Lưu ý: Rất thú vị cho các gia đình đi kèm trẻ em.',
                        'image_thumbnail' => 'khanh-hoa-vien-hai-duong-hoc.jpg',
                        'latitude' => '12.21310000',
                        'longitude' => '109.21360000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    68 => 
                    array (
                        'id' => 69,
                        'province_id' => 18,
                        'category_id' => 9,
                        'name' => 'Đảo Bình Ba',
                        'name_search' => 'đao binh ba',
                        'address' => 'Cam Ranh, Khánh Hòa',
                        'content' => '🏛️ Ý nghĩa: "Đảo quốc tôm hùm" hoang sơ với các bãi tắm nước xanh biếc nhìn thấu đáy. 
🚩 Biểu tượng: Đặc sản tôm hùm Bình Ba và bãi Nồm. 
🌅 Trải nghiệm: Thưởng thức hải sản tươi tại bè và lặn ngắm san hô. 
🚗 Di chuyển: Tàu từ cảng Ba Ngòi. 

💡 Lưu ý: Chỉ tiếp đón du khách mang quốc tịch Việt Nam.',
                        'image_thumbnail' => 'khanh-hoa-dao-binh-ba.jpg',
                        'latitude' => '11.83330000',
                        'longitude' => '109.23330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    69 => 
                    array (
                        'id' => 70,
                        'province_id' => 18,
                        'category_id' => 9,
                        'name' => 'Bãi Dài',
                        'name_search' => 'bai dai',
                        'address' => 'Cam Lâm, Khánh Hòa',
                        'content' => '🏛️ Ý nghĩa: Một trong những bãi biển mịn nhất với triền cát dài thoai thoải. 
🚩 Biểu tượng: Các resort cao cấp ven biển. 
🌅 Trải nghiệm: Chụp ảnh bãi cát trắng và tham gia trò chơi môtô nước. 
🚗 Di chuyển: Gần sân bay Cam Ranh. 

💡 Lưu ý: Sóng ở đây khá êm, phù hợp cho người không rành bơi.',
                        'image_thumbnail' => 'khanh-hoa-bai-dai.jpg',
                        'latitude' => '12.03330000',
                        'longitude' => '109.20000000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    70 => 
                    array (
                        'id' => 71,
                        'province_id' => 18,
                        'category_id' => 3,
                        'name' => 'Tháp Chăm Po Klong Garai',
                        'name_search' => 'thap cham po klong garai',
                        'address' => 'TP. Phan Rang - Tháp Chàm, Ninh Thuận',
                        'content' => '🏛️ Ý nghĩa: Quần thể tháp Chăm hùng vĩ và nguyên vẹn nhất tại miền Trung. 
🚩 Biểu tượng: Kiến trúc tháp bằng gạch đỏ với hoa văn điêu khắc đá tinh vi. 
🌅 Trải nghiệm: Tham dự lễ hội Ka-tê đầy màu sắc. 
🚗 Di chuyển: Nằm trên đồi Trầu, ngoại ô TP. 

💡 Lưu ý: Nên thuê hướng dẫn viên tại điểm để hiểu rõ về văn hóa Chăm.',
                        'image_thumbnail' => 'khanh-hoa-thap-cham-po-klong-garai.jpg',
                        'latitude' => '11.59780000',
                        'longitude' => '108.97140000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    71 => 
                    array (
                        'id' => 72,
                        'province_id' => 19,
                        'category_id' => 9,
                        'name' => 'Hồ Xuân Hương',
                        'name_search' => 'ho xuan huong',
                        'address' => 'Phường 1, Đà Lạt, Lâm Đồng',
                        'content' => '🏛️ Ý nghĩa: Viên ngọc xanh giữa lòng Đà Lạt, tạo nên nét lãng mạn đặc trưng của phố núi. 
🚩 Biểu tượng: Tháp bút chì của nhà thiếu nhi và cầu gỗ ven hồ. 
🌅 Trải nghiệm: Đạp xe đạp đôi hoặc nhâm nhi cà phê ngắm hồ buổi sáng. 
🚗 Di chuyển: Ngay trung tâm thành phố. 

💡 Lưu ý: Chiều tối quanh hồ có nhiều món ăn vặt ấm nóng.',
                        'image_thumbnail' => 'lam-dong-ho-xuan-huong.jpg',
                        'latitude' => '11.94250000',
                        'longitude' => '108.44110000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    72 => 
                    array (
                        'id' => 73,
                        'province_id' => 19,
                        'category_id' => 9,
                        'name' => 'Langbiang',
                        'name_search' => 'langbiang',
                        'address' => 'Lạc Dương, Lâm Đồng',
                        'content' => '🏛️ Ý nghĩa: Đỉnh núi huyền thoại gắn với chuyện tình Romeo và Juliet xứ cao nguyên. 
🚩 Biểu tượng: Tượng chàng Lang và nàng Biang. 
🌅 Trải nghiệm: Đi xe Jeep leo đỉnh Radar ngắm toàn cảnh Đà Lạt mờ sương. 
🚗 Di chuyển: Cách trung tâm Đà Lạt 12km. 

💡 Lưu ý: Trên đỉnh gió lạnh, nên mặc thêm áo khoác.',
                        'image_thumbnail' => 'lam-dong-langbiang.jpg',
                        'latitude' => '12.04670000',
                        'longitude' => '108.43500000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    73 => 
                    array (
                        'id' => 74,
                        'province_id' => 19,
                        'category_id' => 9,
                        'name' => 'Thác Datanla',
                        'name_search' => 'thac datanla',
                        'address' => 'Phường 3, Đà Lạt, Lâm Đồng',
                        'content' => '🏛️ Ý nghĩa: Ngọn thác đẹp với lưu lượng nước ổn định, nằm ẩn mình giữa rừng thông già. 
🚩 Biểu tượng: Máng trượt dài nhất Đông Nam Á xuyên qua rừng. 
🌅 Trải nghiệm: Chơi máng trượt và các trò chơi mạo hiểm High Rope Course. 
🚗 Di chuyển: Nằm trên đèo Prenn. 

💡 Lưu ý: Chú ý kiểm soát tốc độ khi đi máng trượt.',
                        'image_thumbnail' => 'lam-dong-thac-datanla.jpg',
                        'latitude' => '11.90220000',
                        'longitude' => '108.45030000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    74 => 
                    array (
                        'id' => 75,
                        'province_id' => 19,
                        'category_id' => 9,
                        'name' => 'Vườn hoa Thành phố',
                        'name_search' => 'vuon hoa thanh pho',
                        'address' => 'Phường 8, Đà Lạt, Lâm Đồng',
                        'content' => '🏛️ Ý nghĩa: Showroom hoa lớn nhất cả nước, nơi quy tụ hàng trăm loài hoa rực rỡ quanh năm. 
🚩 Biểu tượng: Cổng hoa uốn vòm khổng lồ. 
🌅 Trải nghiệm: Check-in cùng vương quốc hoa và mua các giống hoa lạ về trồng. 
🚗 Di chuyển: Cuối hồ Xuân Hương. 

💡 Lưu ý: Mùa festival hoa là lúc vườn hoa rực rỡ nhất.',
                        'image_thumbnail' => 'lam-dong-vuon-hoa-thanh-pho.jpg',
                        'latitude' => '11.94830000',
                        'longitude' => '108.45030000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    75 => 
                    array (
                        'id' => 76,
                        'province_id' => 19,
                        'category_id' => 2,
                        'name' => 'Mũi Né',
                        'name_search' => 'mui ne',
                        'address' => 'TP. Phan Thiết, Bình Thuận',
                        'content' => '🏛️ Ý nghĩa: Thiên đường nghỉ dưỡng với những rặng dừa xanh và bãi cát vàng óng ả. 
🚩 Biểu tượng: Đồi Cát Bay (Đồi Cát Vàng). 
🌅 Trải nghiệm: Trượt cát, lái môtô trên cát và nghỉ dưỡng cao cấp. 
🚗 Di chuyển: Cách Phan Thiết 22km. 

💡 Lưu ý: Nên đi vào buổi sáng sớm để tránh cát bị nóng.',
                        'image_thumbnail' => 'lam-dong-mui-ne.jpg',
                        'latitude' => '10.93330000',
                        'longitude' => '108.28330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    76 => 
                    array (
                        'id' => 77,
                        'province_id' => 19,
                        'category_id' => 2,
                        'name' => 'Bãi biển Hàm Tiến - Mũi Né',
                        'name_search' => 'bai bien ham tien - mui ne',
                        'address' => 'Hàm Tiến, Phan Thiết, Bình Thuận',
                        'content' => '🏛️ Ý nghĩa: Trung tâm thể thao biển sôi động, đặc biệt là môn lướt ván diều. 
🚩 Biểu tượng: Dãy resort san sát và cuộc sống "phố Tây" đêm. 
🌅 Trải nghiệm: Ngắm lướt ván diều chuyên nghiệp và thưởng thức cocktail ven biển. 
🚗 Di chuyển: Trục đường Nguyễn Đình Chiểu. 

💡 Lưu ý: Buổi tối khu này rất nhộn nhịp với các quán bar nhỏ.',
                        'image_thumbnail' => 'lam-dong-bai-bien-ham-tien-mui-ne.jpg',
                        'latitude' => '10.95000000',
                        'longitude' => '108.21670000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    77 => 
                    array (
                        'id' => 78,
                        'province_id' => 20,
                        'category_id' => 9,
                        'name' => 'Vườn quốc gia Cát Tiên',
                        'name_search' => 'vuon quoc gia cat tien',
                        'address' => 'Tân Phú, Đồng Nai',
                        'content' => '🏛️ Ý nghĩa: Một trong những khu bảo tồn sinh quyển thế giới quan trọng nhất Đông Nam Á. 
🚩 Biểu tượng: Cây Tung nghìn năm tuổi và loài chim quý. 
🌅 Trải nghiệm: Đạp xe trong rừng và khám phá Bàu Sấu hoang dã. 
🚗 Di chuyển: Cách TP.HCM 150km. 

💡 Lưu ý: Mang giày đi bộ và trang phục bảo hộ chống vắt.',
                        'image_thumbnail' => 'dong-nai-vuon-quoc-gia-cat-tien.jpg',
                        'latitude' => '11.41670000',
                        'longitude' => '107.41670000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    78 => 
                    array (
                        'id' => 79,
                        'province_id' => 20,
                        'category_id' => 2,
                        'name' => 'Hồ Trị An',
                        'name_search' => 'ho tri an',
                        'address' => 'Vĩnh Cửu, Đồng Nai',
                        'content' => '🏛️ Ý nghĩa: Hồ nước ngọt rộng lớn tuyệt đẹp phục vụ cho thủy điện đầu tiên ở phía Nam. 
🚩 Biểu tượng: Đảo Chim Ó và hồ nước xanh ngắt. 
🌅 Trải nghiệm: Cắm trại ven hồ, câu cá và ngắm sao đêm. 
🚗 Di chuyển: Cách TP.HCM 70km. 

💡 Lưu ý: Rất phù hợp cho các nhóm phượt tự túc cuối tuần.',
                        'image_thumbnail' => 'dong-nai-ho-tri-an.jpg',
                        'latitude' => '11.13330000',
                        'longitude' => '107.03330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    79 => 
                    array (
                        'id' => 80,
                        'province_id' => 20,
                        'category_id' => 9,
                        'name' => 'Đồi Chóp Chài',
                        'name_search' => 'đoi chop chai',
                        'address' => 'TP. Tuy Hòa, Phú Yên',
                        'content' => '🏛️ Ý nghĩa: Một trong những đỉnh núi biểu tượng che chở cho thành phố biển Tuy Hòa. 
🚩 Biểu tượng: Đài phát thanh truyền hình và tầm nhìn bao quát toàn tỉnh. 
🌅 Trải nghiệm: Ngắm hoàng hôn trên cánh đồng lúa xanh ngắt. 
🚗 Di chuyển: Rìa TP. Tuy Hòa. 

💡 Lưu ý: Đường lên đỉnh dốc nhưng thảm thực vật hai bên đường rất mát mẻ.',
                        'image_thumbnail' => 'dong-nai-doi-chop-chai.jpg',
                        'latitude' => '13.11670000',
                        'longitude' => '109.30000000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    80 => 
                    array (
                        'id' => 81,
                        'province_id' => 20,
                        'category_id' => 9,
                    'name' => 'Thác Đray Nur (vùng giáp)',
                    'name_search' => 'thac đray nur (vung giap)',
                        'address' => 'Giáp ranh Đắk Lắk - Đắk Nông',
                        'content' => '🏛️ Ý nghĩa: Phần thác nằm tại ranh giới hành chính hai tỉnh, thuộc dòng sông Serepôk kỳ vĩ. 
🚩 Biểu tượng: Dòng thác đổ trắng xóa chia đôi bờ tỉnh lỵ. 
🌅 Trải nghiệm: Trekking ven sông và khám phá cầu treo nối liền hai bờ. 
🚗 Di chuyển: Theo cung đường từ Buôn Ma Thuột đi Đắk Mil. 

💡 Lưu ý: Mang theo nước uống khi trekking đường rừng.',
                        'image_thumbnail' => 'dong-nai-thac-dray-nur-vung-giap.jpg',
                        'latitude' => '12.54080000',
                        'longitude' => '107.90220000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    81 => 
                    array (
                        'id' => 82,
                        'province_id' => 20,
                        'category_id' => 3,
                        'name' => 'Bảo tàng Bình Phước',
                        'name_search' => 'bao tang binh phuoc',
                        'address' => 'TP. Đồng Xoài, Bình Phước',
                        'content' => '🏛️ Ý nghĩa: Nơi lưu giữ giá trị lịch sử, văn hóa của các dân tộc và quá trình kháng chiến tại Bình Phước. 
🚩 Biểu tượng: Các hiện vật văn hóa dân tộc Xtiêng và S\'tiêng. 
🌅 Trải nghiệm: Tìm hiểu lịch sử giải phóng vùng đất Bình Phước. 
🚗 Di chuyển: Trung tâm thành phố Đồng Xoài. 

💡 Lưu ý: Đóng cửa vào Thứ Hai.',
                        'image_thumbnail' => 'dong-nai-bao-tang-binh-phuoc.jpg',
                        'latitude' => '11.53330000',
                        'longitude' => '106.88330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    82 => 
                    array (
                        'id' => 83,
                        'province_id' => 20,
                        'category_id' => 3,
                        'name' => 'Đồng Xoài - Khu di tích lịch sử',
                        'name_search' => 'đong xoai - khu di tich lich su',
                        'address' => 'TP. Đồng Xoài, Bình Phước',
                        'content' => '🏛️ Ý nghĩa: Ghi dấu chiến thắng Đồng Xoài lẫy lừng trong cuộc kháng chiến chống Mỹ cứu nước. 
🚩 Biểu tượng: Tượng đài chiến thắng Đồng Xoài uy nghiêm. 
🌅 Trải nghiệm: Tham quan di tích và tưởng niệm các anh hùng liệt sĩ. 
🚗 Di chuyển: Ngay trung tâm TP. Đồng Xoài. 

💡 Lưu ý: Khuôn viên thoáng đãng, thích hợp dạo bộ chiều mát.',
                        'image_thumbnail' => 'dong-nai-dong-xoai-khu-di-tich-lich-su.jpg',
                        'latitude' => '11.53330000',
                        'longitude' => '106.88330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    83 => 
                    array (
                        'id' => 84,
                        'province_id' => 21,
                        'category_id' => 5,
                        'name' => 'Núi Bà Đen',
                        'name_search' => 'nui ba đen',
                        'address' => 'TP. Tây Ninh, Tây Ninh',
                        'content' => '🏛️ Ý nghĩa: "Nóc nhà Nam Bộ" cao 986m, trung tâm tâm linh lớn nhất vùng biên giới Tây Nam. 
🚩 Biểu tượng: Tượng Phật Bà bằng đồng cao nhất châu Á trên đỉnh núi. 
🌅 Trải nghiệm: Chinh phục đỉnh núi bằng cáp treo và hành hương chùa Bà linh thiêng. 
🚗 Di chuyển: Cách TP. Tây Ninh 11km. 

💡 Lưu ý: Nên đi vào đầu năm để tham gia hội Xuân núi Bà.',
                        'image_thumbnail' => 'tay-ninh-nui-ba-den.jpg',
                        'latitude' => '11.37000000',
                        'longitude' => '106.12670000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    84 => 
                    array (
                        'id' => 85,
                        'province_id' => 21,
                        'category_id' => 5,
                        'name' => 'Tòa Thánh Cao Đài',
                        'name_search' => 'toa thanh cao đai',
                        'address' => 'Huyện Hòa Thành, Tây Ninh',
                        'content' => '🏛️ Ý nghĩa: Công trình kiến trúc tôn giáo độc đáo, là thủ đô của đạo Cao Đài trên toàn thế giới. 
🚩 Biểu tượng: Hình Thiên Nhãn (Mắt trời) và kiến trúc đa văn hóa Á - Âu. 
🌅 Trải nghiệm: Xem lễ cúng thời Ngọ (12h trưa) với trang phục áo dài trắng tuyệt đẹp. 
🚗 Di chuyển: Cách TP. Tây Ninh 5km. 

💡 Lưu ý: Bỏ giày dép bên ngoài và giữ trật tự khi vào chính điện.',
                        'image_thumbnail' => 'tay-ninh-toa-thanh-cao-dai.jpg',
                        'latitude' => '11.30000000',
                        'longitude' => '106.11670000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    85 => 
                    array (
                        'id' => 86,
                        'province_id' => 21,
                        'category_id' => 9,
                        'name' => 'Hồ Dầu Tiếng',
                        'name_search' => 'ho dau tieng',
                        'address' => 'Tây Ninh - Bình Dương',
                        'content' => '🏛️ Ý nghĩa: Hồ nước nhân tạo lớn nhất Việt Nam, cung cấp nước tưới tiêu cho cả vùng Đông Nam Bộ. 
🚩 Biểu tượng: Cảnh núi Bà Đen soi bóng xuống mặt hồ xanh biếc. 
🌅 Trải nghiệm: Cắm trại (camping) ven hồ ngắm hoàng hôn và câu cá tự nhiên. 
🚗 Di chuyển: Cách TP. Tây Ninh khoảng 20km. 

💡 Lưu ý: Cần chuẩn bị đầy đủ dụng cụ nếu có ý định cắm trại qua đêm.',
                        'image_thumbnail' => 'tay-ninh-ho-dau-tieng.jpg',
                        'latitude' => '11.35000000',
                        'longitude' => '106.33330000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    86 => 
                    array (
                        'id' => 87,
                        'province_id' => 21,
                        'category_id' => 3,
                        'name' => 'Khu di tích lịch sử Tân Trụ',
                        'name_search' => 'khu di tich lich su tan tru',
                        'address' => 'Huyện Tân Trụ, Long An',
                        'content' => '🏛️ Ý nghĩa: Nơi ghi dấu các sự kiện cách mạng quan trọng trong hai cuộc kháng chiến tại Long An. 
🚩 Biểu tượng: Di tích Vàm Nhựt Tảo gắn liền với anh hùng Nguyễn Trung Trực. 
🌅 Trải nghiệm: Tham quan đền thờ và tìm hiểu lịch sử hào khí sông nước. 
🚗 Di chuyển: Theo quốc lộ 1A từ TP.HCM về hướng Tân An. 

💡 Lưu ý: Không gian yên tĩnh, thích hợp cho du lịch về nguồn.',
                        'image_thumbnail' => 'tay-ninh-khu-di-tich-lich-su-tan-tru.jpg',
                        'latitude' => '10.51670000',
                        'longitude' => '106.51670000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    87 => 
                    array (
                        'id' => 88,
                        'province_id' => 21,
                        'category_id' => 9,
                        'name' => 'Chợ nổi Long An',
                        'name_search' => 'cho noi long an',
                        'address' => 'TP. Tân An, Long An',
                        'content' => '🏛️ Ý nghĩa: Nét giao thương sông nước đặc trưng vùng cửa ngõ miền Tây Nam Bộ. 
🚩 Biểu tượng: Các ghe xuồng đầy ắp nông sản địa phương. 
🌅 Trải nghiệm: Thưởng thức trái cây tươi trên ghe và cảm nhận nhịp sống sông nước. 
🚗 Di chuyển: Khu vực cầu Tân An. 

💡 Lưu ý: Chợ thường nhộn nhịp nhất vào sáng sớm.',
                        'image_thumbnail' => 'tay-ninh-cho-noi-long-an.jpg',
                        'latitude' => '10.53330000',
                        'longitude' => '106.40000000',
                        'is_featured' => 0,
                        'created_at' => '2026-04-19 21:46:57',
                        'updated_at' => '2026-04-19 21:46:57',
                    ),
                    88 => 
                    array (
                        'id' => 89,
                        'province_id' => 22,
                        'category_id' => 9,
                        'name' => 'Vườn quốc gia Tràm Chim',
                        'name_search' => 'vuon quoc gia tram chim',
                        'address' => 'Tam Nông, Đồng Tháp',
                        'content' => '🏛️ Ý nghĩa: Khu Ramsar thế giới, vùng đất ngập nước nội địa tiêu biểu của vùng Đồng Tháp Mười. 
🚩 Biểu tượng: Loài Sếu đầu đỏ quý hiếm. 
🌅 Trải nghiệm: Đi xuồng máy ngắm chim, sen hồng và thảm thực vật đa dạng mùa nước nổi. 
🚗 Di chuyển: Cách TP. Cao Lãnh 40km. 

💡 Lưu ý: Mùa nước nổi (tháng 9-12) là lúc vườn quốc gia đẹp nhất.',
                            'image_thumbnail' => 'dong-thap-vuon-quoc-gia-tram-chim.jpg',
                            'latitude' => '10.58330000',
                            'longitude' => '105.51670000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        89 => 
                        array (
                            'id' => 90,
                            'province_id' => 22,
                            'category_id' => 9,
                            'name' => 'Làng hoa Sa Đéc',
                            'name_search' => 'lang hoa sa đec',
                            'address' => 'TP. Sa Đéc, Đồng Tháp',
                            'content' => '🏛️ Ý nghĩa: Một trong những vựa hoa lớn nhất miền Tây với lịch sử hàng trăm năm tuổi. 
🚩 Biểu tượng: Cánh đồng hoa trên giàn giáo (không chạm đất) độc đáo. 
🌅 Trải nghiệm: Chụp ảnh giữa bạt ngàn các loài hoa và thăm nhà cổ Huỳnh Thủy Lê. 
🚗 Di chuyển: Trung tâm TP. Sa Đéc. 

💡 Lưu ý: Nên ghé thăm vào tháng Chạp âm lịch (trước Tết) để ngắm hoa đẹp nhất.',
                                'image_thumbnail' => 'dong-thap-lang-hoa-sa-dec.jpg',
                                'latitude' => '10.28330000',
                                'longitude' => '105.76670000',
                                'is_featured' => 0,
                                'created_at' => '2026-04-19 21:46:57',
                                'updated_at' => '2026-04-19 21:46:57',
                            ),
                            90 => 
                            array (
                                'id' => 91,
                                'province_id' => 22,
                                'category_id' => 5,
                                'name' => 'Chùa Vĩnh Tràng',
                                'name_search' => 'chua vinh trang',
                                'address' => 'TP. Mỹ Tho, Tiền Giang',
                            'content' => '🏛️ Ý nghĩa: Ngôi chùa cổ lớn nhất tỉnh Tiền Giang với kiến trúc giao thoa Á - Âu (Pháp, La Mã, Khmer). 
🚩 Biểu tượng: Các pho tượng Phật khổng lồ (Phật Di Lặc, Phật nằm). 
🌅 Trải nghiệm: Tham quan khuôn viên vườn hoa và kiến trúc độc đáo của chính điện. 
🚗 Di chuyển: Cách trung tâm Mỹ Tho 3km. 

💡 Lưu ý: Giữ trang nghiêm khi chụp ảnh trong khu vực thờ tự.',
                            'image_thumbnail' => 'dong-thap-chua-vinh-trang.jpg',
                            'latitude' => '10.36670000',
                            'longitude' => '106.36670000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        91 => 
                        array (
                            'id' => 92,
                            'province_id' => 22,
                            'category_id' => 9,
                            'name' => 'Cồn Thới Sơn',
                            'name_search' => 'con thoi son',
                            'address' => 'Thới Sơn, TP. Mỹ Tho',
                            'content' => '🏛️ Ý nghĩa: Điểm đến du lịch miệt vườn tiêu biểu, nơi thưởng thức hương vị sông nước Tiền Giang. 
🚩 Biểu tượng: Những con rạch nhỏ rợp bóng dừa nước. 
🌅 Trải nghiệm: Đi xuồng ba lá, nghe đờn ca tài tử và tham quan xưởng kẹo dừa. 
🚗 Di chuyển: Đi tàu từ bến tàu du lịch Mỹ Tho. 

💡 Lưu ý: Đội nón lá chụp ảnh xuồng ba lá là trải nghiệm rất thú vị.',
                            'image_thumbnail' => 'dong-thap-con-thoi-son.jpg',
                            'latitude' => '10.35000000',
                            'longitude' => '106.33330000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        92 => 
                        array (
                            'id' => 93,
                            'province_id' => 22,
                            'category_id' => 9,
                            'name' => 'Khu du lịch sinh thái Gáo Giồng',
                            'name_search' => 'khu du lich sinh thai gao giong',
                            'address' => 'Cao Lãnh, Đồng Tháp',
                            'content' => '🏛️ Ý nghĩa: Được ví như "Đồng Tháp Mười thu nhỏ" với hệ sinh thái rừng tràm và chim muông phong phú. 
🚩 Biểu tượng: Đài quan sát cao 18m để ngắm toàn cảnh rừng tràm. 
🌅 Trải nghiệm: Thưởng thức cơm gói lá sen và các món ăn dân dã đặc sản miền Tây. 
🚗 Di chuyển: Cách TP. Cao Lãnh 15km. 

💡 Lưu ý: Thuê xuồng bơi tay sẽ giúp bạn cảm nhận rõ hơn sự yên bình.',
                            'image_thumbnail' => 'dong-thap-khu-du-lich-sinh-thai-gao-giong.jpg',
                            'latitude' => '10.50000000',
                            'longitude' => '105.58330000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        93 => 
                        array (
                            'id' => 94,
                            'province_id' => 23,
                            'category_id' => 9,
                            'name' => 'Chợ nổi Trà Ôn',
                            'name_search' => 'cho noi tra ôn',
                            'address' => 'Huyện Trà Ôn, Vĩnh Long',
                            'content' => '🏛️ Ý nghĩa: Một trong những chợ nổi lâu đời nhất vùng hạ lưu sông Hậu, mang nét bình dị mộc mạc. 
🚩 Biểu tượng: Ghe thuyền bán các mặt hàng nông sản rẫy và vườn. 
🌅 Trải nghiệm: Ăn bún riêu trên ghe và ngắm cảnh chợ họp nhộn nhịp theo con nước nổi. 
🚗 Di chuyển: Cách TP. Vĩnh Long 40km. 

💡 Lưu ý: Chợ thường họp sớm và tan khi mặt trời lên cao.',
                            'image_thumbnail' => 'vinh-long-cho-noi-tra-on.jpg',
                            'latitude' => '9.96670000',
                            'longitude' => '105.91670000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        94 => 
                        array (
                            'id' => 95,
                            'province_id' => 23,
                            'category_id' => 9,
                            'name' => 'Cánh đồng hoa màu',
                            'name_search' => 'canh dong hoa mau',
                            'address' => 'Huyện Trà Ôn, Vĩnh Long',
                            'content' => '🏛️ Ý nghĩa: Vùng đất phù sa trù phú chuyên canh các loại hoa màu đặc trưng của ĐBSCL. 
🚩 Biểu tượng: Những luống rau, rẫy dưa xanh ngắt chạy tít tắp. 
🌅 Trải nghiệm: Tìm hiểu kỹ thuật canh tác truyền thống và chụp ảnh nông thôn yên bình. 
🚗 Di chuyển: Nằm dọc theo các tuyến rạch tại Trà Ôn. 

💡 Lưu ý: Có thể mua nông sản tươi sạch ngay tại ruộng.',
                            'image_thumbnail' => 'vinh-long-canh-dong-hoa-mau.jpg',
                            'latitude' => '9.95000000',
                            'longitude' => '105.93330000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        95 => 
                        array (
                            'id' => 96,
                            'province_id' => 24,
                            'category_id' => 9,
                            'name' => 'Rừng tràm Trà Sư',
                            'name_search' => 'rung tram tra su',
                            'address' => 'Tịnh Biên, An Giang',
                            'content' => '🏛️ Ý nghĩa: "Kỳ quan của rừng tràm" với thảm bèo xanh phủ kín mặt nước quanh năm. 
🚩 Biểu tượng: Cầu tre vạn bước xuyên rừng dài nhất Việt Nam. 
🌅 Trải nghiệm: Ngồi xuồng máy lướt trên bèo và ngắm hàng ngàn con cò trắng đậu trên ngọn tràm. 
🚗 Di chuyển: Cách TP. Châu Đốc 25km. 

💡 Lưu ý: Nên đi vào sáng sớm để đón nắng xuyên qua kẽ lá rất đẹp.',
                            'image_thumbnail' => 'an-giang-rung-tram-tra-su.jpg',
                            'latitude' => '10.55280000',
                            'longitude' => '105.05280000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        96 => 
                        array (
                            'id' => 97,
                            'province_id' => 24,
                            'category_id' => 5,
                            'name' => 'Miếu Bà Chúa Xứ',
                            'name_search' => 'mieu ba chua xu',
                            'address' => 'Núi Sam, Châu Đốc, An Giang',
                            'content' => '🏛️ Ý nghĩa: Trung tâm hành hương linh thiêng nhất miền Tây, thu hút hàng triệu lượt khách mỗi năm. 
🚩 Biểu tượng: Tượng Bà Chúa Xứ bằng đá sa thạch có niên đại thế kỷ thứ VI. 
🌅 Trải nghiệm: Cầu may mắn và chiêm bái kiến trúc lăng miếu uy nghiêm. 
🚗 Di chuyển: Ngay chân núi Sam. 

💡 Lưu ý: Cẩn thận với các dịch vụ chào mời bán chim phóng sinh hoặc nhang đèn xung quanh.',
                            'image_thumbnail' => 'an-giang-mieu-ba-chua-xu.jpg',
                            'latitude' => '10.70000000',
                            'longitude' => '105.08330000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        97 => 
                        array (
                            'id' => 98,
                            'province_id' => 24,
                            'category_id' => 9,
                            'name' => 'Núi Cấm',
                            'name_search' => 'nui cam',
                            'address' => 'Tịnh Biên, An Giang',
                            'content' => '🏛️ Ý nghĩa: Ngọn núi cao nhất vùng Thất Sơn hùng vĩ, được mệnh danh là "Đà Lạt của miền Tây". 
🚩 Biểu tượng: Tượng Phật Di Lặc khổng lồ trên đỉnh núi. 
🌅 Trải nghiệm: Đi cáp treo ngắm hồ Thanh Long và vãn cảnh chùa Vạn Linh. 
🚗 Di chuyển: Cách Châu Đốc 35km. 

💡 Lưu ý: Khí hậu trên núi khá mát mẻ, nên mang theo áo khoác mỏng.',
                            'image_thumbnail' => 'an-giang-nui-cam.jpg',
                            'latitude' => '10.48330000',
                            'longitude' => '105.00000000',
                            'is_featured' => 0,
                            'created_at' => '2026-04-19 21:46:57',
                            'updated_at' => '2026-04-19 21:46:57',
                        ),
                        98 => 
                        array (
                            'id' => 99,
                            'province_id' => 24,
                            'category_id' => 9,
                            'name' => 'Chợ nổi Long Xuyên',
                            'name_search' => 'cho noi long xuyen',
                            'address' => 'TP. Long Xuyên, An Giang',
                            'content' => '🏛️ Ý nghĩa: Chợ nổi còn giữ nguyên nét bình dị, ít bị thương mại hóa so với các chợ nổi khác. 
🚩 Biểu tượng: Tiếng rao và nụ cười sảng khoái của người dân sông nước. 
🌅 Trải nghiệm: Thưởng thức bữa sáng nóng hổi ngay trên thuyền giữa sông Hậu. 
🚗 Di chuyển: Bến tàu khách Long Xuyên. 

💡 Lưu ý: Đây là nơi lý tưởng để chụp ảnh đời thường (street life) miền Tây.',
                                'image_thumbnail' => 'an-giang-cho-noi-long-xuyen.jpg',
                                'latitude' => '10.36670000',
                                'longitude' => '105.45000000',
                                'is_featured' => 0,
                                'created_at' => '2026-04-19 21:46:57',
                                'updated_at' => '2026-04-19 21:46:57',
                            ),
                            99 => 
                            array (
                                'id' => 100,
                                'province_id' => 25,
                                'category_id' => 9,
                                'name' => 'Mũi Cà Mau',
                                'name_search' => 'mui ca mau',
                                'address' => 'Ngọc Hiển, Cà Mau',
                                'content' => '🏛️ Ý nghĩa: Cực Nam của Tổ quốc, nơi đất biết nở rừng biết bò và là nơi duy nhất ngắm được cả bình minh và hoàng hôn trên biển. 
🚩 Biểu tượng: Cột mốc tọa độ quốc gia và hình ảnh con tàu vươn khơi. 
🌅 Trải nghiệm: Chụp ảnh tại cột mốc tọa độ và đi xuyên rừng ngập mặn. 
🚗 Di chuyển: Đi xe ô tô hoặc cano từ TP. Cà Mau. 

💡 Lưu ý: Nên chuẩn bị thuốc chống muỗi và mặc quần áo dài.',
                                'image_thumbnail' => 'ca-mau-mui-ca-mau.jpg',
                                'latitude' => '8.61670000',
                                'longitude' => '104.71670000',
                                'is_featured' => 0,
                                'created_at' => '2026-04-19 21:46:57',
                                'updated_at' => '2026-04-19 21:46:57',
                            ),
                            100 => 
                            array (
                                'id' => 101,
                                'province_id' => 25,
                                'category_id' => 9,
                                'name' => 'Vườn quốc gia U Minh Hạ',
                                'name_search' => 'vuon quoc gia u minh ha',
                                'address' => 'Huyện Trần Văn Thời, Cà Mau',
                                'content' => '🏛️ Ý nghĩa: Khu dự trữ sinh quyển thế giới với hệ sinh thái rừng tràm trên đất than bùn đặc trưng. 
🚩 Biểu tượng: Đài quan sát cao ngất ngưởng để canh lửa rừng. 
🌅 Trải nghiệm: Đi võng ngắm rừng, thưởng thức mật ong rừng và các món cá đồng đặc sản. 
🚗 Di chuyển: Cách TP. Cà Mau 25km. 

💡 Lưu ý: Chú ý không hút thuốc hoặc mang vật dụng dễ gây cháy vào rừng.',
                                'image_thumbnail' => 'ca-mau-vuon-quoc-gia-u-minh-ha.jpg',
                                'latitude' => '9.21670000',
                                'longitude' => '104.83330000',
                                'is_featured' => 0,
                                'created_at' => '2026-04-19 21:46:57',
                                'updated_at' => '2026-04-19 21:46:57',
                            ),
                            101 => 
                            array (
                                'id' => 102,
                                'province_id' => 25,
                                'category_id' => 9,
                                'name' => 'Hòn Đá Bạc',
                                'name_search' => 'hon đa bac',
                                'address' => 'Huyện Trần Văn Thời, Cà Mau',
                                'content' => '🏛️ Ý nghĩa: Cụm đảo đẹp kỳ ảo với những viên đá xếp chồng lên nhau, gắn liền với di tích chiến thắng Kế hoạch CM12. 
🚩 Biểu tượng: Lăng Ông Nam Hải thờ bộ xương cá voi khổng lồ. 
🌅 Trải nghiệm: Ngắm cảnh biển hoang sơ và câu cá ngắt ven các ghềnh đá. 
🚗 Di chuyển: Cách TP. Cà Mau 40km. 

💡 Lưu ý: Có cầu vượt biển nối liền các đảo rất đẹp để chụp ảnh.',
                                'image_thumbnail' => 'ca-mau-hon-da-bac.jpg',
                                'latitude' => '9.18330000',
                                'longitude' => '104.81670000',
                                'is_featured' => 0,
                                'created_at' => '2026-04-19 21:46:57',
                                'updated_at' => '2026-04-19 21:46:57',
                            ),
                            102 => 
                            array (
                                'id' => 103,
                                'province_id' => 26,
                                'category_id' => 9,
                                'name' => 'Sông Đà',
                                'name_search' => 'song đa',
                                'address' => 'Vùng Tây Bắc, Việt Nam',
                                'content' => '🏛️ Ý nghĩa: Dòng sông hùng vĩ của vùng núi phía Bắc, cung cấp nguồn năng lượng sạch khổng lồ cho đất nước. 
🚩 Biểu tượng: Công trình Thủy điện Hòa Bình và Thủy điện Sơn La. 
🌅 Trải nghiệm: Đi du thuyền trên lòng hồ ngắm cảnh núi non trùng điệp. 
🚗 Di chuyển: Có thể tham quan từ phía Hòa Bình hoặc Sơn La. 

💡 Lưu ý: Cảnh quan lòng hồ đẹp nhất vào mùa nước đầy (tháng 9-11).',
                                    'image_thumbnail' => 'lai-chau-song-da.jpg',
                                    'latitude' => '21.25000000',
                                    'longitude' => '105.00000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                103 => 
                                array (
                                    'id' => 104,
                                    'province_id' => 27,
                                    'category_id' => 3,
                                    'name' => 'Điện Biên Phủ',
                                    'name_search' => 'đien bien phu',
                                    'address' => 'TP. Điện Biên Phủ, Điện Biên',
                                    'content' => '🏛️ Ý nghĩa: Nơi ghi dấu chiến thắng "Lừng lẫy năm châu, chấn động địa cầu" năm 1954. 
🚩 Biểu tượng: Tượng đài chiến thắng và hầm Đờ Cát. 
🌅 Trải nghiệm: Tham quan Bảo tàng Chiến thắng với bức tranh Panorama khổng lồ. 
🚗 Di chuyển: Có chuyến bay trực tiếp từ Hà Nội/TP.HCM. 

💡 Lưu ý: Nên đi vào dịp kỷ niệm 7/5 để thấy không khí trang trọng của thành phố.',
                                    'image_thumbnail' => 'dien-bien-dien-bien-phu.jpg',
                                    'latitude' => '21.38330000',
                                    'longitude' => '103.01670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                104 => 
                                array (
                                    'id' => 105,
                                    'province_id' => 27,
                                    'category_id' => 9,
                                    'name' => 'Vườn quốc gia Mường Nhé',
                                    'name_search' => 'vuon quoc gia muong nhe',
                                    'address' => 'Huyện Mường Nhé, Điện Biên',
                                    'content' => '🏛️ Ý nghĩa: Khu bảo tồn thiên nhiên lớn nằm tại ngã ba biên giới Việt - Lào - Trung. 
🚩 Biểu tượng: Hệ sinh thái rừng đặc dụng vùng cao biên giới. 
🌅 Trải nghiệm: Chinh phục cực Tây Tổ quốc (A Pa Chải) nằm trong khu vực vườn quốc gia. 
🚗 Di chuyển: Cách TP. Điện Biên Phủ hơn 200km đường đèo. 

💡 Lưu ý: Đây là khu vực biên giới, cần xin giấy phép tham quan từ Bộ chỉ huy Bộ đội Biên phòng tỉnh.',
                                    'image_thumbnail' => 'dien-bien-vuon-quoc-gia-muong-nhe.jpg',
                                    'latitude' => '22.00000000',
                                    'longitude' => '102.50000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                105 => 
                                array (
                                    'id' => 106,
                                    'province_id' => 28,
                                    'category_id' => 9,
                                    'name' => 'Thác Dải Yếm',
                                    'name_search' => 'thac dai yem',
                                    'address' => 'Mường Sang, Mộc Châu, Sơn La',
                                    'content' => '🏛️ Ý nghĩa: Ngọn thác đẹp dịu dàng như dải yếm của người con gái Thái, gắn liền với một câu chuyện tình thủy chung. 
🚩 Biểu tượng: Cầu kính tình yêu đầu tiên tại Việt Nam. 
🌅 Trải nghiệm: Dạo bước trên cầu kính và ngắm dòng thác đổ xuống bãi đá. 
🚗 Di chuyển: Cách trung tâm Mộc Châu 5km. 

💡 Lưu ý: Thác đẹp nhất từ tháng 5 đến tháng 9 khi lượng nước dồi dào.',
                                    'image_thumbnail' => 'son-la-thac-dai-yem.jpg',
                                    'latitude' => '20.84170000',
                                    'longitude' => '104.65000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                106 => 
                                array (
                                    'id' => 107,
                                    'province_id' => 28,
                                    'category_id' => 9,
                                    'name' => 'Cao nguyên Mộc Châu',
                                    'name_search' => 'cao nguyen moc chau',
                                    'address' => 'Huyện Mộc Châu, Sơn La',
                                    'content' => '🏛️ Ý nghĩa: "Đà Lạt của Tây Bắc" với những đồng cỏ xanh mướt và những đồi chè hình trái tim. 
🚩 Biểu tượng: Đồi chè trái tim và rừng thông bản Áng. 
🌅 Trải nghiệm: Ngắm hoa cải trắng, hoa mận nở rộ và thưởng thức sữa bò tươi. 
🚗 Di chuyển: Cách Hà Nội 200km theo QL6. 

💡 Lưu ý: Mùa hoa mận nở vào tháng 1-2 là thời điểm lý tưởng nhất để tham quan.',
                                    'image_thumbnail' => 'son-la-cao-nguyen-moc-chau.jpg',
                                    'latitude' => '20.85000000',
                                    'longitude' => '104.63330000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                107 => 
                                array (
                                    'id' => 108,
                                    'province_id' => 29,
                                    'category_id' => 9,
                                    'name' => 'Động Tam Thanh',
                                    'name_search' => 'đong tam thanh',
                                    'address' => 'Tam Thanh, TP. Lạng Sơn',
                                    'content' => '🏛️ Ý nghĩa: Hang động kỳ ảo gắn liền với câu nói "Đồng Đăng có phố Kỳ Lừa, có nàng Tô Thị, có chùa Tam Thanh". 
🚩 Biểu tượng: Tượng nàng Tô Thị bồng con vọng phu. 
🌅 Trải nghiệm: Khám phá các nhũ đá trong động và hồ Âm Ty xanh ngắt. 
🚗 Di chuyển: Ngay trung tâm TP. Lạng Sơn. 

💡 Lưu ý: Trong động khá ẩm và trơn, nên đi giày có độ bám tốt.',
                                    'image_thumbnail' => 'lang-son-dong-tam-thanh.jpg',
                                    'latitude' => '21.85000000',
                                    'longitude' => '106.75000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                108 => 
                                array (
                                    'id' => 109,
                                    'province_id' => 29,
                                    'category_id' => 7,
                                    'name' => 'Chợ Kỳ Lừa',
                                    'name_search' => 'cho ky lua',
                                    'address' => 'TP. Lạng Sơn, Lạng Sơn',
                                    'content' => '🏛️ Ý nghĩa: Chợ phiên vùng cao nổi tiếng, nơi giao lưu văn hóa và kinh tế của các dân tộc Tày, Nùng, Dao. 
🚩 Biểu tượng: Các mặt hàng thổ cẩm và ẩm thực đặc sản xứ Lạng. 
🌅 Trải nghiệm: Thưởng thức lợn quay lá mác mật và mua sắm nông sản địa phương. 
🚗 Di chuyển: Trung tâm thành phố. 

💡 Lưu ý: Chợ phiên chính vào các ngày 2, 7 âm lịch hàng tháng.',
                                    'image_thumbnail' => 'lang-son-cho-ky-lua.jpg',
                                    'latitude' => '21.85000000',
                                    'longitude' => '106.75000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                109 => 
                                array (
                                    'id' => 110,
                                    'province_id' => 29,
                                    'category_id' => 9,
                                    'name' => 'Mẫu Sơn',
                                    'name_search' => 'mau son',
                                    'address' => 'Huyện Lộc Bình, Lạng Sơn',
                                    'content' => '🏛️ Ý nghĩa: Vùng núi cao với khí hậu ôn hòa quanh năm, là nơi hiếm hoi có tuyết rơi vào mùa đông tại VN. 
🚩 Biểu tượng: Các biệt thự Pháp cổ rêu phong trên đỉnh núi. 
🌅 Trải nghiệm: Thưởng thức rượu mẫu sơn, đào mẫu sơn và săn mây trên đỉnh. 
🚗 Di chuyển: Cách TP. Lạng Sơn 30km. 

💡 Lưu ý: Đường lên đỉnh núi có nhiều khúc cua hẹp, lái xe cần chú ý.',
                                    'image_thumbnail' => 'lang-son-mau-son.jpg',
                                    'latitude' => '21.85000000',
                                    'longitude' => '106.91670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                110 => 
                                array (
                                    'id' => 111,
                                    'province_id' => 30,
                                    'category_id' => 9,
                                    'name' => 'Vịnh Hạ Long',
                                    'name_search' => 'vinh ha long',
                                    'address' => 'Thành phố Hạ Long, Quảng Ninh',
                                    'content' => '🏛️ Ý nghĩa: Di sản Thiên nhiên Thế giới với hàng nghìn đảo đá vôi kỳ vĩ soi bóng xuống làn nước xanh lục. 
🚩 Biểu tượng: Hòn Trống Mái và động Thiên Cung. 
🌅 Trải nghiệm: Ngủ đêm trên du thuyền và lèo núi Ti Tốp ngắm vịnh. 
🚗 Di chuyển: Qua đường cao tốc Hà Nội - Hải Phòng. 

💡 Lưu ý: Tránh đi vào cuối tuần mùa hè vì lượng khách rất đông.',
                                    'image_thumbnail' => 'quang-ninh-vinh-ha-long.jpg',
                                    'latitude' => '20.91000000',
                                    'longitude' => '107.18390000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                111 => 
                                array (
                                    'id' => 112,
                                    'province_id' => 30,
                                    'category_id' => 5,
                                    'name' => 'Yên Tử',
                                    'name_search' => 'yen tu',
                                    'address' => 'Thượng Yên Công, Uông Bí, Quảng Ninh',
                                    'content' => '🏛️ Ý nghĩa: "Đất tổ Phật giáo Việt Nam", nơi vua Trần Nhân Tông sáng lập thiền phái Trúc Lâm Yên Tử. 
🚩 Biểu tượng: Chùa Đồng nằm trên đỉnh núi ở độ cao 1.068m. 
🌅 Trải nghiệm: Hành hương lễ Phật và chinh phục đỉnh núi bằng cáp treo. 
🚗 Di chuyển: Cách TP. Hạ Long 40km. 

💡 Lưu ý: Mùa lễ hội diễn ra từ mùng 10 tháng Giêng đến hết tháng Ba âm lịch.',
                                    'image_thumbnail' => 'quang-ninh-yen-tu.jpg',
                                    'latitude' => '21.15000000',
                                    'longitude' => '106.71670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                112 => 
                                array (
                                    'id' => 113,
                                    'province_id' => 30,
                                    'category_id' => 9,
                                    'name' => 'Đảo Cô Tô',
                                    'name_search' => 'đao co to',
                                    'address' => 'Huyện Cô Tô, Quảng Ninh',
                                    'content' => '🏛️ Ý nghĩa: Hòn đảo biên cương mang vẻ đẹp tinh khôi với nước biển trong vắt và bãi cát dài. 
🚩 Biểu tượng: Tượng đài Bác Hồ và hải đăng Cô Tô. 
🌅 Trải nghiệm: Tắm biển tại bãi Hồng Vàn, Vàn Chảy và ngắm bình minh cầu Mỵ. 
🚗 Di chuyển: Tàu cao tốc từ cảng Cái Rồng (Vân Đồn). 

💡 Lưu ý: Nên theo dõi dự báo thời tiết để tránh bị kẹt trên đảo khi biển động.',
                                    'image_thumbnail' => 'quang-ninh-dao-co-to.jpg',
                                    'latitude' => '20.98330000',
                                    'longitude' => '107.75000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                113 => 
                                array (
                                    'id' => 114,
                                    'province_id' => 30,
                                    'category_id' => 2,
                                    'name' => 'Bán đảo Tuần Châu',
                                    'name_search' => 'ban dao tuan chau',
                                    'address' => 'Hạ Long, Quảng Ninh',
                                    'content' => '🏛️ Ý nghĩa: Cổng vào vịnh Hạ Long với khu đô thị và bến tàu du lịch quốc tế hiện đại nhất Việt Nam. 
🚩 Biểu tượng: Cảng tàu Tuần Châu và các show biểu diễn cá heo. 
🌅 Trải nghiệm: Tắm biển nhân tạo và tham gia các trò chơi giải trí trên bờ. 
🚗 Di chuyển: Kết nối với đất liền bằng một con đường bê tông dài 2km. 

💡 Lưu ý: Là điểm xuất phát của hầu hết các tàu du lịch tham quan vịnh.',
                                    'image_thumbnail' => 'quang-ninh-ban-dao-tuan-chau.jpg',
                                    'latitude' => '20.93330000',
                                    'longitude' => '107.01670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                114 => 
                                array (
                                    'id' => 115,
                                    'province_id' => 31,
                                    'category_id' => 3,
                                    'name' => 'Thành nhà Hồ',
                                    'name_search' => 'thanh nha ho',
                                    'address' => 'Vĩnh Lộc, Thanh Hóa',
                                    'content' => '🏛️ Ý nghĩa: Di sản văn hóa thế giới, tòa thành bằng đá lớn độc nhất vô nhị còn sót lại ở Đông Nam Á. 
🚩 Biểu tượng: Các cổng thành bằng đá xanh tảng khổng lồ. 
🌅 Trải nghiệm: Chiêm ngưỡng nghệ thuật ghép đá không dùng vữa của người xưa. 
🚗 Di chuyển: Cách TP. Thanh Hóa 45km. 

💡 Lưu ý: Khu di tích khá rộng, nên mang theo nước uống và mũ nón.',
                                    'image_thumbnail' => 'thanh-hoa-thanh-nha-ho.jpg',
                                    'latitude' => '20.07720000',
                                    'longitude' => '105.60610000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                115 => 
                                array (
                                    'id' => 116,
                                    'province_id' => 31,
                                    'category_id' => 2,
                                    'name' => 'Biển Sầm Sơn',
                                    'name_search' => 'bien sam son',
                                    'address' => 'TP. Sầm Sơn, Thanh Hóa',
                                    'content' => '🏛️ Ý nghĩa: Bãi biển nổi tiếng lâu đời từ thời Pháp với bãi tắm dài và sóng mạnh. 
🚩 Biểu tượng: Đền Độc Cước trên núi Trường Lệ. 
🌅 Trải nghiệm: Tắm biển và ngắm bình minh trên đỉnh núi Trường Lệ. 
🚗 Di chuyển: Cách trung tâm Thanh Hóa 16km. 

💡 Lưu ý: Hiện nay Sầm Sơn đã được quy hoạch hiện đại với nhiều resort cao cấp.',
                                    'image_thumbnail' => 'thanh-hoa-bien-sam-son.jpg',
                                    'latitude' => '19.74310000',
                                    'longitude' => '105.89420000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                116 => 
                                array (
                                    'id' => 117,
                                    'province_id' => 31,
                                    'category_id' => 9,
                                    'name' => 'Pù Luông',
                                    'name_search' => 'pu luong',
                                    'address' => 'Bá Thước, Thanh Hóa',
                                    'content' => '🏛️ Ý nghĩa: Khu bảo tồn thiên nhiên xanh mướt với những thửa ruộng bậc thang và mây phủ. 
🚩 Biểu tượng: Các bánh xe nước (cọn nước) của người Thái. 
🌅 Trải nghiệm: Trekking xuyên bản làng và tắm suối Hiêu. 
🚗 Di chuyển: Đi xe ô tô từ Hà Nội hoặc TP. Thanh Hóa. 

💡 Lưu ý: Phù hợp cho những người muốn tìm về không gian yên tĩnh, hòa mình vào thiên nhiên.',
                                    'image_thumbnail' => 'thanh-hoa-pu-luong.jpg',
                                    'latitude' => '20.45000000',
                                    'longitude' => '105.15000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                117 => 
                                array (
                                    'id' => 118,
                                    'province_id' => 32,
                                    'category_id' => 3,
                                    'name' => 'Quê Bác Hồ - Kim Liên',
                                    'name_search' => 'que bac ho - kim lien',
                                    'address' => 'Nam Đàn, Nghệ An',
                                    'content' => '🏛️ Ý nghĩa: Di tích lịch sử đặc biệt, nơi Chủ tịch Hồ Chí Minh sinh ra và lớn lên. 
🚩 Biểu tượng: Ngôi nhà tranh đơn sơ tại quê nội làng Sen và quê ngoại làng Hoàng Trù. 
🌅 Trải nghiệm: Tìm hiểu về thời niên thiếu của Bác và thăm mộ bà Hoàng Thị Loan. 
🚗 Di chuyển: Cách TP. Vinh 15km. 

💡 Lưu ý: Giữ trang nghiêm và nghe thuyết minh về gia đình Bác.',
                                    'image_thumbnail' => 'nghe-an-que-bac-ho-kim-lien.jpg',
                                    'latitude' => '18.66670000',
                                    'longitude' => '105.55000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                118 => 
                                array (
                                    'id' => 119,
                                    'province_id' => 32,
                                    'category_id' => 2,
                                    'name' => 'Biển Cửa Lò',
                                    'name_search' => 'bien cua lo',
                                    'address' => 'Thị xã Cửa Lò, Nghệ An',
                                    'content' => '🏛️ Ý nghĩa: Một trong những bãi biển đẹp nhất miền Trung với cát trắng mịn và đặc sản mực nhảy nổi tiếng. 
🚩 Biểu tượng: Đảo Song Ngư ngoài khơi. 
🌅 Trải nghiệm: Tắm biển và đi "câu mực đêm" cùng ngư dân bản địa. 
🚗 Di chuyển: Cách TP. Vinh 16km. 

💡 Lưu ý: Thưởng thức mực nhảy Cửa Lò là trải nghiệm ẩm thực không thể bỏ qua.',
                                    'image_thumbnail' => 'nghe-an-bien-cua-lo.jpg',
                                    'latitude' => '18.81670000',
                                    'longitude' => '105.71670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                119 => 
                                array (
                                    'id' => 120,
                                    'province_id' => 33,
                                    'category_id' => 2,
                                    'name' => 'Biển Thiên Cầm',
                                    'name_search' => 'bien thien cam',
                                    'address' => 'Cẩm Xuyên, Hà Tĩnh',
                                    'content' => '🏛️ Ý nghĩa: "Cung đàn biển" hiền hòa với vẻ đẹp thơ mộng và làn nước biển trong xanh. 
🚩 Biểu tượng: Núi Thiên Cầm soi bóng xuống biển. 
🌅 Trải nghiệm: Nghe tiếng sóng vỗ như tiếng đàn và thưởng thức hải sản tươi rẻ. 
🚗 Di chuyển: Cách TP. Hà Tĩnh 20km. 

💡 Lưu ý: Biển Thiên Cầm vẫn giữ được nét hoang sơ, thích hợp cho nghỉ dưỡng gia đình.',
                                    'image_thumbnail' => 'ha-tinh-bien-thien-cam.jpg',
                                    'latitude' => '18.16670000',
                                    'longitude' => '105.98330000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                120 => 
                                array (
                                    'id' => 121,
                                    'province_id' => 33,
                                    'category_id' => 3,
                                    'name' => 'Đền Thờ Nguyễn Du',
                                    'name_search' => 'đen tho nguyen du',
                                    'address' => 'Tiên Điền, Nghi Xuân, Hà Tĩnh',
                                    'content' => '🏛️ Ý nghĩa: Khu di tích tưởng niệm đại thi hào dân tộc, danh nhân văn hóa thế giới Nguyễn Du - tác giả Truyện Kiều. 
🚩 Biểu tượng: Nhà bảo tàng trưng bày các bản gốc Truyện Kiều cổ. 
🌅 Trải nghiệm: Tìm hiểu về dòng họ Nguyễn Tiên Điền và cuộc đời thi hào. 
🚗 Di chuyển: Gần cầu Bến Thủy, cách TP. Vinh 5km. 

💡 Lưu ý: Không gian văn hóa trang trọng, thích hợp cho người yêu văn học.',
                                    'image_thumbnail' => 'ha-tinh-den-tho-nguyen-du.jpg',
                                    'latitude' => '18.61670000',
                                    'longitude' => '105.75000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                121 => 
                                array (
                                    'id' => 122,
                                    'province_id' => 34,
                                    'category_id' => 9,
                                    'name' => 'Thác Bản Giốc',
                                    'name_search' => 'thac ban gioc',
                                    'address' => 'Đàm Thủy, Trùng Khánh, Cao Bằng',
                                    'content' => '🏛️ Ý nghĩa: Thác nước xuyên biên giới lớn nhất Đông Nam Á, kỳ quan thiên nhiên giữa đại ngàn. 
🚩 Biểu tượng: Dòng thác 3 tầng hùng vĩ phân chia ranh giới Việt - Trung. 
🌅 Trải nghiệm: Ngồi mảng tre ra sát chân thác để cảm nhận sức mạnh dòng nước. 
🚗 Di chuyển: Cách TP. Cao Bằng 90km. 

💡 Lưu ý: Cần mang theo giấy tờ tùy thân để làm thủ tục tham quan khu vực biên giới.',
                                    'image_thumbnail' => 'cao-bang-thac-ban-gioc.jpg',
                                    'latitude' => '22.85420000',
                                    'longitude' => '106.72310000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                122 => 
                                array (
                                    'id' => 123,
                                    'province_id' => 34,
                                    'category_id' => 3,
                                    'name' => 'Hang Pác Bó',
                                    'name_search' => 'hang pac bo',
                                    'address' => 'Hà Quảng, Cao Bằng',
                                    'content' => '🏛️ Ý nghĩa: Di tích lịch sử đặc biệt, nơi Bác Hồ trở về nước trực tiếp lãnh đạo cách mạng sau 30 năm bôn ba. 
🚩 Biểu tượng: Suối Lê-nin, núi Các-Mác và bàn đá nơi Bác ngồi làm việc. 
🌅 Trải nghiệm: Tham quan hang Cốc Bó và chiêm ngưỡng dòng suối xanh ngọc bích. 
🚗 Di chuyển: Cách TP. Cao Bằng 50km. 

💡 Lưu ý: Nên đi vào mùa khô để suối có màu xanh đẹp nhất.',
                                    'image_thumbnail' => 'cao-bang-hang-pac-bo.jpg',
                                    'latitude' => '22.78330000',
                                    'longitude' => '106.11670000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                                123 => 
                                array (
                                    'id' => 124,
                                    'province_id' => 34,
                                    'category_id' => 9,
                                    'name' => 'Phố cổ Cao Bằng',
                                    'name_search' => 'pho co cao bang',
                                    'address' => 'TP. Cao Bằng, Cao Bằng',
                                    'content' => '🏛️ Ý nghĩa: Khu vực trung tâm lâu đời với nét sinh hoạt văn hóa vùng cao biên giới phía Bắc. 
🚩 Biểu tượng: Các ngôi nhà cổ ven sông Bằng Giang và chợ trung tâm. 
🌅 Trải nghiệm: Thưởng thức bánh cuốn Cao Bằng, phở vịt quay và hạt dẻ Trùng Khánh. 
🚗 Di chuyển: Nằm ngay trung tâm thành phố. 

💡 Lưu ý: Buổi tối dọc sông Bằng có nhiều quán ăn vặt rất nhộn nhịp.',
                                    'image_thumbnail' => 'cao-bang-pho-co-cao-bang.jpg',
                                    'latitude' => '22.66670000',
                                    'longitude' => '106.25000000',
                                    'is_featured' => 0,
                                    'created_at' => '2026-04-19 21:46:57',
                                    'updated_at' => '2026-04-19 21:46:57',
                                ),
                            ));
        
        
    }
}