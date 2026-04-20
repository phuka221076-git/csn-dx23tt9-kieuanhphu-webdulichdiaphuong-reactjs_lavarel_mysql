<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Province;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BigLocationSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy ID các danh mục phổ biến để tránh lỗi Foreign Key
        $catLS = Category::where('name', 'LIKE', '%Lịch sử%')->first()->id ?? 1;
        $catTC = Category::where('name', 'LIKE', '%Thắng cảnh%')->first()->id ?? 2;
        $catTL = Category::where('name', 'LIKE', '%Tâm linh%')->first()->id ?? 3;
        $catAT = Category::where('name', 'LIKE', '%Ẩm thực%')->first()->id ?? 4;
        $catND = Category::where('name', 'LIKE', '%Nghỉ dưỡng%')->first()->id ?? 5;

        $data = [
            
                    'Hà Nội' => [
                        ['name' => 'Hồ Hoàn Kiếm', 'cat' => $catTC, 'addr' => 'Quận Hoàn Kiếm', 'desc' => 'Trái tim thủ đô với Tháp Rùa và Đền Ngọc Sơn.'],
                        ['name' => 'Phố Cổ Hà Nội', 'cat' => $catLS, 'addr' => 'Quận Hoàn Kiếm', 'desc' => 'Không gian kiến trúc Pháp - Việt cổ kính.'],
                        ['name' => 'Chùa Một Cột', 'cat' => $catTL, 'addr' => 'Ba Đình', 'desc' => 'Di tích kiến trúc độc đáo hình hoa sen.'],
                        ['name' => 'Lăng Bác', 'cat' => $catLS, 'addr' => 'Ba Đình', 'desc' => 'Nơi tưởng niệm Chủ tịch Hồ Chí Minh.'],
                        ['name' => 'Văn Miếu - Quốc Tử Giám', 'cat' => $catLS, 'addr' => 'Đống Đa', 'desc' => 'Trường đại học đầu tiên của Việt Nam.'],
                        ['name' => 'Hồ Tây', 'cat' => $catND, 'addr' => 'Tây Hồ', 'desc' => 'Khu nghỉ dưỡng, dạo chơi lãng mạn.'],
                    ],

                    'TP. Hồ Chí Minh' => [
                        ['name' => 'Địa đạo Củ Chi', 'cat' => $catLS, 'addr' => 'Củ Chi', 'desc' => 'Di tích lịch sử cách mạng nổi tiếng.'],
                        ['name' => 'Nhà thờ Đức Bà', 'cat' => $catTL, 'addr' => 'Quận 1', 'desc' => 'Kiến trúc Gothic Pháp cổ.'],
                        ['name' => 'Bến Nhà Rồng', 'cat' => $catLS, 'addr' => 'Quận 4', 'desc' => 'Nơi Bác Hồ ra đi tìm đường cứu nước.'],
                        ['name' => 'Chợ Bến Thành', 'cat' => $catAT, 'addr' => 'Quận 1', 'desc' => 'Thiên đường ẩm thực và mua sắm.'],
                        ['name' => 'Bitexco Financial Tower', 'cat' => $catTC, 'addr' => 'Quận 1', 'desc' => 'Tòa nhà biểu tượng ngắm toàn cảnh Sài Gòn.'],
                    ],

                    'Hải Phòng' => [
                        ['name' => 'Đảo Cát Bà', 'cat' => $catTC, 'addr' => 'Huyện Cát Hải', 'desc' => 'Vịnh Lan Hạ - thiên đường vịnh đảo.'],
                        ['name' => 'Bãi biển Đồ Sơn', 'cat' => $catND, 'addr' => 'Đồ Sơn', 'desc' => 'Khu nghỉ dưỡng biển nổi tiếng.'],
                        ['name' => 'Bảo tàng Hải Phòng', 'cat' => $catLS, 'addr' => 'Quận Hồng Bàng', 'desc' => 'Lịch sử thành phố cảng sôi động.'],
                    ],

                    'Đà Nẵng' => [
                        ['name' => 'Cầu Rồng', 'cat' => $catTC, 'addr' => 'Quận Hải Châu', 'desc' => 'Cầu phun lửa - phun nước độc đáo.'],
                        ['name' => 'Bán đảo Sơn Trà', 'cat' => $catTC, 'addr' => 'Sơn Trà', 'desc' => 'Rừng nguyên sinh và view biển tuyệt đẹp.'],
                        ['name' => 'Chùa Linh Ứng', 'cat' => $catTL, 'addr' => 'Bán đảo Sơn Trà', 'desc' => 'Tượng Phật Quan Âm cao nhất Việt Nam.'],
                        ['name' => 'Bãi biển Mỹ Khê', 'cat' => $catND, 'addr' => 'Ngũ Hành Sơn', 'desc' => 'Một trong những bãi biển đẹp nhất hành tinh.'],
                        ['name' => 'Ngũ Hành Sơn', 'cat' => $catTC, 'addr' => 'Ngũ Hành Sơn', 'desc' => 'Quần thể núi đá với hang động huyền bí.'],
                    ],

                    'Cần Thơ' => [
                        ['name' => 'Chợ nổi Cái Răng', 'cat' => $catTC, 'addr' => 'Cái Răng', 'desc' => 'Chợ sông nước đặc trưng miền Tây.'],
                        ['name' => 'Bến Ninh Kiều', 'cat' => $catTC, 'addr' => 'Ninh Kiều', 'desc' => 'Quảng trường ven sông Cần Thơ.'],
                        ['name' => 'Lung Ngọc Hoàng', 'cat' => $catTC, 'addr' => 'Thới Lai', 'desc' => 'Khu sinh thái ngập nước đẹp mê hoặc.'],
                        ['name' => 'Chùa Dơi', 'cat' => $catTL, 'addr' => 'Sóc Trăng (vùng sáp nhập)', 'desc' => 'Kiến trúc chùa Khmer độc đáo.'],
                    ],

                    'Huế' => [
                        ['name' => 'Đại Nội Huế', 'cat' => $catLS, 'addr' => 'TP. Huế', 'desc' => 'Kinh thành triều Nguyễn - di sản UNESCO.'],
                        ['name' => 'Chùa Thiên Mụ', 'cat' => $catTL, 'addr' => 'TP. Huế', 'desc' => 'Ngôi chùa cổ linh thiêng bên sông Hương.'],
                        ['name' => 'Lăng Khải Định', 'cat' => $catLS, 'addr' => 'Hương Thủy', 'desc' => 'Kiến trúc lăng mộ độc đáo nhất nhà Nguyễn.'],
                        ['name' => 'Sông Hương - Núi Ngự', 'cat' => $catTC, 'addr' => 'TP. Huế', 'desc' => 'Phong cảnh thơ mộng cố đô.'],
                    ],

                    'Tuyên Quang' => [
                        ['name' => 'Cao nguyên đá Đồng Văn', 'cat' => $catTC, 'addr' => 'Đồng Văn', 'desc' => 'Di sản UNESCO địa chất hùng vĩ.'],
                        ['name' => 'Sông Nho Quế', 'cat' => $catTC, 'addr' => 'Mèo Vạc', 'desc' => 'Hẻm vực sâu tuyệt đẹp.'],
                    ],

                    'Lào Cai' => [
                        ['name' => 'Đỉnh Fansipan', 'cat' => $catTC, 'addr' => 'Sapa', 'desc' => 'Nóc nhà Đông Dương.'],
                        ['name' => 'Bản Cát Cát', 'cat' => $catTC, 'addr' => 'Sapa', 'desc' => 'Bản làng cổ của người H\'Mông.'],
                        ['name' => 'Nhà thờ Đá Sapa', 'cat' => $catTL, 'addr' => 'TT. Sapa', 'desc' => 'Dấu ấn kiến trúc Pháp cổ.'],
                        ['name' => 'Thung lũng Mường Hoa', 'cat' => $catTC, 'addr' => 'Hầu Thào', 'desc' => 'Bãi đá cổ và ruộng bậc thang.'],
                        ['name' => 'Đèo Ô Quy Hồ', 'cat' => $catTC, 'addr' => 'Sapa', 'desc' => 'Một trong tứ đại đỉnh đèo.'],
                    ],

                    'Thái Nguyên' => [
                        ['name' => 'Hồ Núi Cốc', 'cat' => $catTC, 'addr' => 'Đại Từ', 'desc' => 'Hồ nước ngọt đẹp như tranh.'],
                        ['name' => 'Làng nghề chè Tân Cương', 'cat' => $catAT, 'addr' => 'TP. Thái Nguyên', 'desc' => 'Thiên đường chè ngon nổi tiếng.'],
                        ['name' => 'ATK Định Hóa', 'cat' => $catLS, 'addr' => 'Định Hóa', 'desc' => 'Di tích lịch sử cách mạng.'],
                    ],

                    'Phú Thọ' => [
                        ['name' => 'Đền Hùng', 'cat' => $catTL, 'addr' => 'Việt Trì', 'desc' => 'Cội nguồn dân tộc Việt Nam.'],
                        ['name' => 'Hồ Thác Bà', 'cat' => $catTC, 'addr' => 'Yên Bình', 'desc' => 'Hồ nước lớn, phong cảnh thiên nhiên đẹp.'],
                        ['name' => 'Vườn quốc gia Xuân Thủy', 'cat' => $catTC, 'addr' => 'Việt Trì', 'desc' => 'Khu bảo tồn sinh thái.'],
                    ],

                    'Bắc Ninh' => [
                        ['name' => 'Chùa Bút Tháp', 'cat' => $catTL, 'addr' => 'Thuận Thành', 'desc' => 'Ngôi chùa cổ nổi tiếng với tượng Phật Quan Âm.'],
                        ['name' => 'Làng nghề Quan Họ', 'cat' => $catTC, 'addr' => 'Huyện Lim', 'desc' => 'Di sản văn hóa phi vật thể.'],
                        ['name' => 'Đình Bắc Ninh', 'cat' => $catLS, 'addr' => 'TP. Bắc Ninh', 'desc' => 'Kiến trúc đình làng truyền thống.'],
                    ],

                    'Hưng Yên' => [
                        ['name' => 'Phố Hiến', 'cat' => $catLS, 'addr' => 'TP. Hưng Yên', 'desc' => 'Phố cổ cổ kính một thời sầm uất.'],
                        ['name' => 'Chùa Chuông', 'cat' => $catTL, 'addr' => 'Khoái Châu', 'desc' => 'Ngôi chùa cổ với quả chuông lớn.'],
                    ],

                    'Ninh Bình' => [
                        ['name' => 'Tràng An', 'cat' => $catTC, 'addr' => 'Hoa Lư', 'desc' => 'Di sản thế giới kép UNESCO.'],
                        ['name' => 'Chùa Bái Đính', 'cat' => $catTL, 'addr' => 'Gia Viễn', 'desc' => 'Quần thể chùa lớn nhất Việt Nam.'],
                        ['name' => 'Tam Cốc - Bích Động', 'cat' => $catTC, 'addr' => 'Ninh Hải', 'desc' => 'Vịnh Hạ Long trên cạn.'],
                        ['name' => 'Cố đô Hoa Lư', 'cat' => $catLS, 'addr' => 'Trường Yên', 'desc' => 'Kinh đô đầu tiên của Việt Nam.'],
                        ['name' => 'Hang Múa', 'cat' => $catTC, 'addr' => 'Ninh Xuân', 'desc' => 'Điểm ngắm toàn cảnh Tam Cốc.'],
                    ],

                    'Quảng Trị' => [
                        ['name' => 'Thành cổ Quảng Trị', 'cat' => $catLS, 'addr' => 'TP. Đông Hà', 'desc' => 'Di tích lịch sử hào hùng.'],
                        ['name' => 'Địa đạo Vịnh Mốc', 'cat' => $catLS, 'addr' => 'Vĩnh Linh', 'desc' => 'Công trình kỳ diệu dưới lòng đất.'],
                        ['name' => 'Biển Cửa Việt', 'cat' => $catND, 'addr' => 'Gio Linh', 'desc' => 'Bãi biển yên bình.'],
                    ],

                    'Quảng Ngãi' => [
                        ['name' => 'Đảo Lý Sơn', 'cat' => $catTC, 'addr' => 'Huyện Lý Sơn', 'desc' => 'Đảo hoang sơ với ruộng tỏi và biển xanh.'],
                        ['name' => 'Thánh địa Mỹ Sơn', 'cat' => $catLS, 'addr' => 'Duy Xuyên', 'desc' => 'Di tích đền tháp Chăm Pa (gần giáp).'],
                        ['name' => 'Bãi biển Mỹ Khê Quảng Ngãi', 'cat' => $catND, 'addr' => 'TP. Quảng Ngãi', 'desc' => 'Bãi biển sạch và yên bình.'],
                    ],

                    'Gia Lai' => [
                        ['name' => 'Hồ Tơ Nưng', 'cat' => $catTC, 'addr' => 'TP. Pleiku', 'desc' => 'Hồ nước ngọt đẹp như tranh.'],
                        ['name' => 'Biển Hồ', 'cat' => $catTC, 'addr' => 'TP. Pleiku', 'desc' => 'Phong cảnh núi hồ Tây Nguyên hùng vĩ.'],
                        ['name' => 'Thác Phú Cường', 'cat' => $catTC, 'addr' => 'Chư Sê', 'desc' => 'Thác nước ấn tượng.'],
                        ['name' => 'Eo Gió', 'cat' => $catTC, 'addr' => 'Phù Yên (Bình Định cũ)', 'desc' => 'Phong cảnh biển hùng vĩ, điểm check-in nổi tiếng.'],
                        ['name' => 'Bãi biển Quy Nhơn', 'cat' => $catND, 'addr' => 'TP. Quy Nhơn', 'desc' => 'Bãi biển sạch, khu nghỉ dưỡng hiện đại ven biển.'],
                        ['name' => 'Tháp Chăm Bánh Ít', 'cat' => $catLS, 'addr' => 'Phù Cát (Bình Định cũ)', 'desc' => 'Quần thể tháp Chăm Pa cổ kính.'],
                    ],

                    'Đắk Lắk' => [
                        ['name' => 'Hồ Lắk', 'cat' => $catTC, 'addr' => 'Lắk', 'desc' => 'Hồ nước ngọt lớn nhất Tây Nguyên.'],
                        ['name' => 'Thác Dray Nur', 'cat' => $catTC, 'addr' => 'Krông Ana', 'desc' => 'Thác nước hùng vĩ.'],
                        ['name' => 'Buôn Đôn', 'cat' => $catTC, 'addr' => 'Buôn Đôn', 'desc' => 'Văn hóa cồng chiêng và voi nhà.'],
                    ],

                    'Khánh Hòa' => [
                        ['name' => 'VinWonders', 'cat' => $catND, 'addr' => 'Đảo Hòn Tre', 'desc' => 'Công viên giải trí ven biển.'],
                        ['name' => 'Tháp Bà Ponagar', 'cat' => $catLS, 'addr' => 'Nha Trang', 'desc' => 'Di tích văn hóa Chăm Pa.'],
                        ['name' => 'Viện Hải dương học', 'cat' => $catTC, 'addr' => 'Nha Trang', 'desc' => 'Khám phá thế giới đại dương.'],
                        ['name' => 'Đảo Bình Ba', 'cat' => $catTC, 'addr' => 'Cam Ranh', 'desc' => 'Vương quốc tôm hùm.'],
                        ['name' => 'Bãi Dài', 'cat' => $catTC, 'addr' => 'Cam Lâm', 'desc' => 'Bãi biển mịn màng xanh ngắt.'],
                        ['name' => 'Tháp Chăm Po Klong Garai', 'cat' => $catLS, 'addr' => 'Phan Rang (Ninh Thuận cũ)', 'desc' => 'Quần thể tháp Chăm Pa nổi bật nhất Ninh Thuận cũ.'],
                    ],

                    'Lâm Đồng' => [
                        ['name' => 'Hồ Xuân Hương', 'cat' => $catTC, 'addr' => 'Đà Lạt', 'desc' => 'Trái tim của thành phố sương mù.'],
                        ['name' => 'Langbiang', 'cat' => $catTC, 'addr' => 'Lạc Dương', 'desc' => 'Đỉnh núi cao nhất Đà Lạt.'],
                        ['name' => 'Thác Datanla', 'cat' => $catTC, 'addr' => 'Đèo Prenn', 'desc' => 'Trải nghiệm máng trượt xuyên rừng.'],
                        ['name' => 'Vườn hoa Thành phố', 'cat' => $catTC, 'addr' => 'Đà Lạt', 'desc' => 'Nơi quy tụ hàng trăm loài hoa.'],
                        ['name' => 'Mũi Né', 'cat' => $catND, 'addr' => 'Phan Thiết (Bình Thuận cũ)', 'desc' => 'Thiên đường nghỉ dưỡng với đồi cát vàng và biển xanh.'],
                        ['name' => 'Bãi biển Hàm Tiến - Mũi Né', 'cat' => $catND, 'addr' => 'Phan Thiết (Bình Thuận cũ)', 'desc' => 'Khu nghỉ dưỡng cao cấp, nổi tiếng với đồi cát bay.'],
                    ],

                    'Đồng Nai' => [
                        ['name' => 'Vườn quốc gia Cát Tiên', 'cat' => $catTC, 'addr' => 'Cát Tiên', 'desc' => 'Khu bảo tồn sinh học đa dạng.'],
                        ['name' => 'Hồ Trị An', 'cat' => $catND, 'addr' => 'Vĩnh Cửu', 'desc' => 'Khu nghỉ dưỡng sinh thái.'],
                        ['name' => 'Đồi Chóp Chài', 'cat' => $catTC, 'addr' => 'Long Khánh', 'desc' => 'View toàn cảnh đẹp.'],
                        ['name' => 'Thác Đray Nur (vùng giáp)', 'cat' => $catTC, 'addr' => 'Bình Phước cũ', 'desc' => 'Thác nước hùng vĩ giữa rừng núi.'],
                        ['name' => 'Bảo tàng Bình Phước', 'cat' => $catLS, 'addr' => 'Đồng Xoài (Bình Phước cũ)', 'desc' => 'Di tích lịch sử cách mạng và văn hóa địa phương.'],
                        ['name' => 'Đồng Xoài - Khu di tích lịch sử', 'cat' => $catLS, 'addr' => 'Đồng Xoài (Bình Phước cũ)', 'desc' => 'Nơi ghi dấu chiến thắng lịch sử năm 1965.'],
                    ],

                    'Tây Ninh' => [
                        ['name' => 'Núi Bà Đen', 'cat' => $catTL, 'addr' => 'TP. Tây Ninh', 'desc' => 'Nóc nhà Nam Bộ, quần thể tâm linh.'],
                        ['name' => 'Tòa Thánh Cao Đài', 'cat' => $catTL, 'addr' => 'TP. Tây Ninh', 'desc' => 'Kiến trúc tôn giáo độc đáo.'],
                        ['name' => 'Hồ Dầu Tiếng', 'cat' => $catTC, 'addr' => 'Dầu Tiếng', 'desc' => 'Hồ nước nhân tạo lớn nhất.'],
                        ['name' => 'Khu di tích lịch sử Tân Trụ', 'cat' => $catLS, 'addr' => 'Tân Trụ (Long An cũ)', 'desc' => 'Di tích cách mạng quan trọng của tỉnh Long An cũ.'],
                        ['name' => 'Chợ nổi Long An', 'cat' => $catTC, 'addr' => 'Tân An (Long An cũ)', 'desc' => 'Văn hóa sông nước đặc trưng miền Tây.'],
                    ],

                    'Đồng Tháp' => [
                        ['name' => 'Vườn quốc gia Tràm Chim', 'cat' => $catTC, 'addr' => 'Tam Nông', 'desc' => 'Hệ sinh thái chim nước nổi tiếng.'],
                        ['name' => 'Làng hoa Sa Đéc', 'cat' => $catTC, 'addr' => 'Sa Đéc', 'desc' => 'Thiên đường hoa miền Tây.'],
                        ['name' => 'Chùa Vĩnh Tràng', 'cat' => $catTL, 'addr' => 'Mỹ Tho (Tiền Giang cũ)', 'desc' => 'Ngôi chùa lớn và đẹp nhất Tiền Giang cũ, kiến trúc Á - Âu.'],
                        ['name' => 'Cồn Thới Sơn', 'cat' => $catTC, 'addr' => 'Mỹ Tho (Tiền Giang cũ)', 'desc' => 'Khu sinh thái sông nước, vườn trái cây miệt vườn.'],
                        ['name' => 'Khu du lịch sinh thái Gáo Giồng', 'cat' => $catTC, 'addr' => 'Gáo Giồng (Tiền Giang cũ)', 'desc' => 'Rừng tràm và hệ sinh thái ngập nước đặc trưng.'],
                    ],

                    'Vĩnh Long' => [
                        ['name' => 'Chợ nổi Trà Ôn', 'cat' => $catTC, 'addr' => 'Trà Ôn', 'desc' => 'Chợ sông nước đặc trưng.'],
                        ['name' => 'Cánh đồng hoa màu', 'cat' => $catTC, 'addr' => 'Vĩnh Long', 'desc' => 'Phong cảnh nông thôn miền Tây.'],
                    ],

                    'An Giang' => [
                        ['name' => 'Rừng tràm Trà Sư', 'cat' => $catTC, 'addr' => 'Tịnh Biên', 'desc' => 'Hệ sinh thái ngập mặn đặc trưng.'],
                        ['name' => 'Miếu Bà Chúa Xứ', 'cat' => $catTL, 'addr' => 'Châu Đốc', 'desc' => 'Điểm tâm linh lớn nhất Miền Tây.'],
                        ['name' => 'Núi Cấm', 'cat' => $catTC, 'addr' => 'Tịnh Biên', 'desc' => 'Nóc nhà của đồng bằng sông Cửu Long.'],
                        ['name' => 'Chợ nổi Long Xuyên', 'cat' => $catTC, 'addr' => 'TP. Long Xuyên', 'desc' => 'Văn hóa sông nước mộc mạc.'],
                    ],

                    'Cà Mau' => [
                        ['name' => 'Mũi Cà Mau', 'cat' => $catTC, 'addr' => 'Ngọc Hiển', 'desc' => 'Điểm cực Nam của Tổ quốc.'],
                        ['name' => 'Vườn quốc gia U Minh Hạ', 'cat' => $catTC, 'addr' => 'U Minh', 'desc' => 'Rừng ngập mặn lớn nhất Việt Nam.'],
                        ['name' => 'Hòn Đá Bạc', 'cat' => $catTC, 'addr' => 'Cà Mau', 'desc' => 'Phong cảnh biển đảo hoang sơ.'],
                    ],

                    'Lai Châu' => [
                        ['name' => 'Sông Đà', 'cat' => $catTC, 'addr' => 'Lai Châu', 'desc' => 'Phong cảnh hùng vĩ.'],
                    ],

                    'Điện Biên' => [
                        ['name' => 'Điện Biên Phủ', 'cat' => $catLS, 'addr' => 'TP. Điện Biên Phủ', 'desc' => 'Chiến trường lịch sử hào hùng.'],
                        ['name' => 'Vườn quốc gia Mường Nhé', 'cat' => $catTC, 'addr' => 'Mường Nhé', 'desc' => 'Khu bảo tồn thiên nhiên.'],
                    ],

                    'Sơn La' => [
                        ['name' => 'Thác Dải Yếm', 'cat' => $catTC, 'addr' => 'Mộc Châu', 'desc' => 'Thác nước nổi tiếng.'],
                        ['name' => 'Cao nguyên Mộc Châu', 'cat' => $catTC, 'addr' => 'Mộc Châu', 'desc' => 'Ruộng bậc thang và hoa cải.'],
                    ],

                    'Lạng Sơn' => [
                        ['name' => 'Động Tam Thanh', 'cat' => $catTC, 'addr' => 'TP. Lạng Sơn', 'desc' => 'Hang động đẹp với kiến trúc chùa.'],
                        ['name' => 'Chợ Kỳ Lừa', 'cat' => $catAT, 'addr' => 'TP. Lạng Sơn', 'desc' => 'Chợ biên giới sầm uất.'],
                        ['name' => 'Mẫu Sơn', 'cat' => $catTC, 'addr' => 'Lộc Bình', 'desc' => 'Khu du lịch núi cao mát mẻ.'],
                    ],

                    'Quảng Ninh' => [
                        ['name' => 'Vịnh Hạ Long', 'cat' => $catTC, 'addr' => 'TP. Hạ Long', 'desc' => 'Kỳ quan thiên nhiên thế giới.'],
                        ['name' => 'Yên Tử', 'cat' => $catTL, 'addr' => 'Uông Bí', 'desc' => 'Đất tổ của Thiền phái Trúc Lâm.'],
                        ['name' => 'Đảo Cô Tô', 'cat' => $catTC, 'addr' => 'Huyện Cô Tô', 'desc' => 'Vẻ đẹp hoang sơ vùng biển đảo.'],
                        ['name' => 'Bán đảo Tuần Châu', 'cat' => $catND, 'addr' => 'TP. Hạ Long', 'desc' => 'Khu du lịch giải trí cao cấp.'],
                    ],

                    'Thanh Hóa' => [
                        ['name' => 'Thành nhà Hồ', 'cat' => $catLS, 'addr' => 'Vĩnh Lộc', 'desc' => 'Di sản UNESCO.'],
                        ['name' => 'Biển Sầm Sơn', 'cat' => $catND, 'addr' => 'Sầm Sơn', 'desc' => 'Bãi biển dài, khu nghỉ dưỡng sôi động.'],
                        ['name' => 'Pù Luông', 'cat' => $catTC, 'addr' => 'Quan Hóa', 'desc' => 'Ruộng bậc thang và thiên nhiên hoang sơ.'],
                    ],

                    'Nghệ An' => [
                        ['name' => 'Quê Bác Hồ - Kim Liên', 'cat' => $catLS, 'addr' => 'Nam Đàn', 'desc' => 'Khu di tích lịch sử Chủ tịch Hồ Chí Minh.'],
                        ['name' => 'Biển Cửa Lò', 'cat' => $catND, 'addr' => 'Cửa Lò', 'desc' => 'Khu nghỉ dưỡng biển nổi tiếng miền Trung.'],
                    ],

                    'Hà Tĩnh' => [
                        ['name' => 'Biển Thiên Cầm', 'cat' => $catND, 'addr' => 'Cẩm Xuyên', 'desc' => 'Bãi biển hoang sơ đẹp mê hoặc.'],
                        ['name' => 'Đền Thờ Nguyễn Du', 'cat' => $catLS, 'addr' => 'Nghi Xuân', 'desc' => 'Tưởng niệm đại thi hào dân tộc.'],
                    ],

                    'Cao Bằng' => [
                        ['name' => 'Thác Bản Giốc', 'cat' => $catTC, 'addr' => 'Trùng Khánh', 'desc' => 'Thác biên giới đẹp nhất Đông Nam Á.'],
                        ['name' => 'Hang Pác Bó', 'cat' => $catLS, 'addr' => 'Hà Quảng', 'desc' => 'Di tích lịch sử cách mạng.'],
                        ['name' => 'Phố cổ Cao Bằng', 'cat' => $catTC, 'addr' => 'TP. Cao Bằng', 'desc' => 'Phong cảnh biên giới.'],
                    ],
                
            // Bạn có thể tiếp tục bổ sung tương tự cho các tỉnh còn lại như Điện Biên (Điện Biên Phủ), Lai Châu (đèo Pha Đin), Lạng Sơn (động Tam Thanh), v.v.

        ];

        foreach ($data as $provinceName => $locations) {
            $province = Province::where('name', 'LIKE', "%$provinceName%")->first();
            if ($province) {
                foreach ($locations as $loc) {
                    // Bước 1: Tạo chuỗi kết hợp Tỉnh + Địa điểm
                    // Ví dụ: "Hà Nội Hồ Hoàn Kiếm"
                    $combinedName = $provinceName . ' ' . $loc['name'];
                    Location::create([
                        'province_id'     => $province->id,
                        'category_id'     => $loc['cat'],
                        'name'            => $loc['name'],
                        'address'         => $loc['addr'],
                        'content'         => $loc['desc'],
                        // Bước 2: Chuyển chuỗi kết hợp thành slug
                        // Kết quả: "ha-noi-ho-hoan-kiem.jpg"
                        'image_thumbnail' => Str::slug($combinedName) . '.jpg',
                        'is_featured'     => false,
                    ]);
                }
            } else {
                // Optional: log nếu không tìm thấy province
                // \Log::warning("Province not found: $provinceName");
            }
        }

        $locations = [
            [
                'name' => 'Hồ Hoàn Kiếm',
                'province' => 'Hà Nội',
                // Tên file bài viết tương ứng
                'content_file' => 'ha-noi-ho-hoan-kiem.html', 
            ],
            [
                'name' => 'Phố Cổ Hà Nội',
                'province' => 'Hà Nội',
                // Tên file bài viết tương ứng
                'content_file' => 'ha-noi-pho-co-ha-noi.html', 
            ],
            [
                'name' => 'Chùa một cột',
                'province' => 'Hà Nội',
                // Tên file bài viết tương ứng
                'content_file' => 'ha-noi-chua-mot-cot.html', 
            ],
            // Thêm các địa điểm khác...
        ];

        foreach ($locations as $item) {
            // Đường dẫn đến file chứa bài viết
            $filePath = database_path('seeders/contents/' . $item['content_file']);
            
            // Kiểm tra nếu file tồn tại thì mới đọc nội dung
            $content = File::exists($filePath) ? File::get($filePath) : "Nội dung đang cập nhật...";

            Location::where('name', $item['name'])->update([
                'content' => $content,
                // Cập nhật luôn slug ảnh nếu bạn muốn đồng bộ
                'image_thumbnail' => Str::slug($item['province'] . ' ' . $item['name']) . '.jpg',
            ]);
        }
    }
}