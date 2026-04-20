<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       $provinces = [
    ['name' => 'Hà Nội', 'slug' => 'ha-noi', 'image' => 'ha-noi.jpg', 'description' => 'Thủ đô nghìn năm văn hiến, trung tâm chính trị và văn hóa của cả nước.'],
    ['name' => 'TP. Hồ Chí Minh', 'slug' => 'tp-ho-chi-minh', 'image' => 'tp-ho-chi-minh.jpg', 'description' => 'Đô thị kinh tế lớn nhất Việt Nam, sầm uất và năng động bậc nhất.'],
    ['name' => 'Hải Phòng', 'slug' => 'hai-phong', 'image' => 'hai-phong.jpg', 'description' => 'Thành phố Cảng quan trọng, trung tâm công nghiệp và du lịch biển phía Bắc.'],
    ['name' => 'Đà Nẵng', 'slug' => 'da-nang', 'image' => 'da-nang.jpg', 'description' => 'Thành phố đáng sống với những cây cầu hiện đại và bãi biển quyến rũ.'],
    ['name' => 'Cần Thơ', 'slug' => 'can-tho', 'image' => 'can-tho.jpg', 'description' => 'Thủ phủ miền Tây sông nước, nổi tiếng với chợ nổi và vườn cây ăn trái.'],
    ['name' => 'Huế', 'slug' => 'hue', 'image' => 'hue.jpg', 'description' => 'Cố đô cổ kính với di sản cung đình triều Nguyễn và vẻ đẹp thơ mộng.'],
    ['name' => 'Tuyên Quang', 'slug' => 'tuyen-quang', 'image' => 'tuyen-quang.jpg', 'description' => 'Thủ đô kháng chiến xưa, vùng đất núi non với lễ hội Trung thu độc đáo.'],
    ['name' => 'Lào Cai', 'slug' => 'lao-cai', 'image' => 'lao-cai.jpg', 'description' => 'Cửa ngõ biên giới phía Bắc, sở hữu đỉnh Fansipan và thị trấn Sa Pa mù sương.'],
    ['name' => 'Thái Nguyên', 'slug' => 'thai-nguyen', 'image' => 'thai-nguyen.jpg', 'description' => 'Vùng đất "đệ nhất danh trà" và trung tâm công nghiệp nặng phía Bắc.'],
    ['name' => 'Phú Thọ', 'slug' => 'phu-tho', 'image' => 'phu-tho.jpg', 'description' => 'Đất Tổ cội nguồn, nơi thờ phụng các vua Hùng có công dựng nước.'],
    ['name' => 'Bắc Ninh', 'slug' => 'bac-ninh', 'image' => 'bac-ninh.jpg', 'description' => 'Kinh đô xưa của xứ Kinh Bắc, cái nôi của làn điệu dân ca Quan họ.'],
    ['name' => 'Hưng Yên', 'slug' => 'hung-yen', 'image' => 'hung-yen.jpg', 'description' => 'Nổi tiếng với Phố Hiến cổ kính và đặc sản nhãn lồng tiến vua.'],
    ['name' => 'Ninh Bình', 'slug' => 'ninh-binh', 'image' => 'ninh-binh.jpg', 'description' => 'Quần thể di sản Tràng An và vẻ đẹp non nước hữu tình của "Hạ Long trên cạn".'],
    ['name' => 'Quảng Trị', 'slug' => 'quang-tri', 'image' => 'quang-tri.jpg', 'description' => 'Vùng đất lửa hào hùng với các di tích lịch sử chiến tranh vang dội.'],
    ['name' => 'Quảng Ngãi', 'slug' => 'quang-ngai', 'image' => 'quang-ngai.jpg', 'description' => 'Quê hương đội hùng binh Hoàng Sa, nổi tiếng với đảo Lý Sơn và núi Ấn sông Trà.'],
    ['name' => 'Gia Lai', 'slug' => 'gia-lai', 'image' => 'gia-lai.jpg', 'description' => 'Cao nguyên đất đỏ với Biển Hồ mênh mông và văn hóa cồng chiêng đặc sắc.'],
    ['name' => 'Đắk Lắk', 'slug' => 'dak-lak', 'image' => 'dak-lak.jpg', 'description' => 'Thủ phủ cà phê Việt Nam, vùng đất của những chú voi và thác nước hùng vĩ.'],
    ['name' => 'Khánh Hòa', 'slug' => 'khanh-hoa', 'image' => 'khanh-hoa.jpg', 'description' => 'Thiên đường du lịch biển Nha Trang và đặc sản yến sào thượng hạng.'],
    ['name' => 'Lâm Đồng', 'slug' => 'lam-dong', 'image' => 'lam-dong.jpg', 'description' => 'Thành phố hoa Đà Lạt thơ mộng với khí hậu ôn hòa quanh năm.'],
    ['name' => 'Đồng Nai', 'slug' => 'dong-nai', 'image' => 'dong-nai.jpg', 'description' => 'Đầu tàu công nghiệp phía Nam với các khu công nghiệp và rừng quốc gia Nam Cát Tiên.'],
    ['name' => 'Tây Ninh', 'slug' => 'tay-ninh', 'image' => 'tay-ninh.jpg', 'description' => 'Nổi tiếng với núi Bà Đen linh thiêng và tòa thánh Cao Đài uy nghi.'],
    ['name' => 'Đồng Tháp', 'slug' => 'dong-thap', 'image' => 'dong-thap.jpg', 'description' => 'Xứ sở sen hồng bát ngát và làng hoa Sa Đéc rực rỡ sắc màu.'],
    ['name' => 'Vĩnh Long', 'slug' => 'vinh-long', 'image' => 'vinh-long.jpg', 'description' => 'Vùng đất cù lao trù phú với những vườn trái cây trĩu quả giữa dòng sông Tiền.'],
    ['name' => 'An Giang', 'slug' => 'an-giang', 'image' => 'an-giang.jpg', 'description' => 'Miền đất tâm linh với Thất Sơn huyền bí và lễ hội vía Bà Chúa Xứ.'],
    ['name' => 'Cà Mau', 'slug' => 'ca-mau', 'image' => 'ca-mau.jpg', 'description' => 'Điểm cực Nam của Tổ quốc, nơi có hệ sinh thái rừng ngập mặn đặc trưng.'],
    ['name' => 'Lai Châu', 'slug' => 'lai-chau', 'image' => 'lai-chau.jpg', 'description' => 'Vùng biên viễn phía Tây Bắc với những cung đường đèo hùng vĩ và mây ngàn.'],
    ['name' => 'Điện Biên', 'slug' => 'dien-bien', 'image' => 'dien-bien.jpg', 'description' => 'Nơi ghi dấu chiến thắng Điện Biên Phủ lừng lẫy năm châu, chấn động địa cầu.'],
    ['name' => 'Sơn La', 'slug' => 'son-la', 'image' => 'son-la.jpg', 'description' => 'Cao nguyên Mộc Châu xanh mướt và nhà máy thủy điện lớn nhất Đông Nam Á.'],
    ['name' => 'Lạng Sơn', 'slug' => 'lang-son', 'image' => 'lang-son.jpg', 'description' => 'Xứ Lạng nổi tiếng với ải Chi Lăng, chợ Kỳ Lừa và nàng Tô Thị.'],
    ['name' => 'Quảng Ninh', 'slug' => 'quang-ninh', 'image' => 'quang-ninh.jpg', 'description' => 'Sở hữu kỳ quan thiên nhiên thế giới Vịnh Hạ Long và vùng mỏ than lớn nhất nước.'],
    ['name' => 'Thanh Hóa', 'slug' => 'thanh-hoa', 'image' => 'thanh-hoa.jpg', 'description' => 'Vùng đất "địa linh nhân kiệt" với di sản Thành Nhà Hồ và biển Sầm Sơn.'],
    ['name' => 'Nghệ An', 'slug' => 'nghe-an', 'image' => 'nghe-an.jpg', 'description' => 'Quê hương Chủ tịch Hồ Chí Minh, vùng đất hiếu học và giàu truyền thống.'],
    ['name' => 'Hà Tĩnh', 'slug' => 'ha-tinh', 'image' => 'ha-tinh.jpg', 'description' => 'Xứ sở của những câu hò ví giặm và khu di tích Ngã ba Đồng Lộc.'],
    ['name' => 'Cao Bằng', 'slug' => 'cao-bang', 'image' => 'cao-bang.jpg', 'description' => 'Vùng non nước hữu tình với thác Bản Giốc và hang Pác Bó lịch sử.'],
];

foreach ($provinces as $province) {
    \App\Models\Province::create($province);
}
    }
}
