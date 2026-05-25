<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hà Nội',
                'slug' => 'ha-noi',
                'image' => 'ha-noi.jpg',
                'description' => 'Thủ đô nghìn năm văn hiến, trung tâm chính trị và văn hóa của cả nước.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-09 07:59:48',
                'name_search' => 'ha noi',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'TP. Hồ Chí Minh',
                'slug' => 'tp-ho-chi-minh',
                'image' => 'tp-ho-chi-minh.jpg',
                'description' => 'Đô thị kinh tế lớn nhất Việt Nam, sầm uất và năng động bậc nhất.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'tp ho chi minh',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hải Phòng',
                'slug' => 'hai-phong',
                'image' => 'hai-phong.jpg',
                'description' => 'Thành phố Cảng quan trọng, trung tâm công nghiệp và du lịch biển phía Bắc.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'hai phong',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Đà Nẵng',
                'slug' => 'da-nang',
                'image' => 'da-nang.jpg',
                'description' => 'Thành phố đáng sống với những cây cầu hiện đại và bãi biển quyến rũ.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'da nang',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cần Thơ',
                'slug' => 'can-tho',
                'image' => 'can-tho.jpg',
                'description' => 'Thủ phủ miền Tây sông nước, nổi tiếng với chợ nổi và vườn cây ăn trái.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'can tho',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Huế',
                'slug' => 'hue',
                'image' => 'hue.jpg',
                'description' => 'Cố đô cổ kính với di sản cung đình triều Nguyễn và vẻ đẹp thơ mộng.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'hue',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Tuyên Quang',
                'slug' => 'tuyen-quang',
                'image' => 'tuyen-quang.jpg',
                'description' => 'Thủ đô kháng chiến xưa, vùng đất núi non với lễ hội Trung thu độc đáo.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'tuyen quang',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Lào Cai',
                'slug' => 'lao-cai',
                'image' => 'lao-cai.jpg',
                'description' => 'Cửa ngõ biên giới phía Bắc, sở hữu đỉnh Fansipan và thị trấn Sa Pa mù sương.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'lao cai',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Thái Nguyên',
                'slug' => 'thai-nguyen',
                'image' => 'thai-nguyen.jpg',
                'description' => 'Vùng đất "đệ nhất danh trà" và trung tâm công nghiệp nặng phía Bắc.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'thai nguyen',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Phú Thọ',
                'slug' => 'phu-tho',
                'image' => 'phu-tho.jpg',
                'description' => 'Đất Tổ cội nguồn, nơi thờ phụng các vua Hùng có công dựng nước.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'phu tho',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bắc Ninh',
                'slug' => 'bac-ninh',
                'image' => 'bac-ninh.jpg',
                'description' => 'Kinh đô xưa của xứ Kinh Bắc, cái nôi của làn điệu dân ca Quan họ.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'bac ninh',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Hưng Yên',
                'slug' => 'hung-yen',
                'image' => 'hung-yen.jpg',
                'description' => 'Nổi tiếng với Phố Hiến cổ kính và đặc sản nhãn lồng tiến vua.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'hung yen',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Ninh Bình',
                'slug' => 'ninh-binh',
                'image' => 'ninh-binh.jpg',
                'description' => 'Quần thể di sản Tràng An và vẻ đẹp non nước hữu tình của "Hạ Long trên cạn".',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'ninh binh',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Quảng Trị',
                'slug' => 'quang-tri',
                'image' => 'quang-tri.jpg',
                'description' => 'Vùng đất lửa hào hùng với các di tích lịch sử chiến tranh vang dội.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'quang tri',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Quảng Ngãi',
                'slug' => 'quang-ngai',
                'image' => 'quang-ngai.jpg',
                'description' => 'Quê hương đội hùng binh Hoàng Sa, nổi tiếng với đảo Lý Sơn và núi Ấn sông Trà.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'quang ngai',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Gia Lai',
                'slug' => 'gia-lai',
                'image' => 'gia-lai.jpg',
                'description' => 'Cao nguyên đất đỏ với Biển Hồ mênh mông và văn hóa cồng chiêng đặc sắc.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'gia lai',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Đắk Lắk',
                'slug' => 'dak-lak',
                'image' => 'dak-lak.jpg',
                'description' => 'Thủ phủ cà phê Việt Nam, vùng đất của những chú voi và thác nước hùng vĩ.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'dak lak',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Khánh Hòa',
                'slug' => 'khanh-hoa',
                'image' => 'khanh-hoa.jpg',
                'description' => 'Thiên đường du lịch biển Nha Trang và đặc sản yến sào thượng hạng.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'khanh hoa',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Lâm Đồng',
                'slug' => 'lam-dong',
                'image' => 'lam-dong.jpg',
                'description' => 'Thành phố hoa Đà Lạt thơ mộng với khí hậu ôn hòa quanh năm.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-05-10 05:44:00',
                'name_search' => 'lam dong',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Đồng Nai',
                'slug' => 'dong-nai',
                'image' => 'dong-nai.jpg',
                'description' => 'Đầu tàu công nghiệp phía Nam với các khu công nghiệp và rừng quốc gia Nam Cát Tiên.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'dong nai',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Tây Ninh',
                'slug' => 'tay-ninh',
                'image' => 'tay-ninh.jpg',
                'description' => 'Nổi tiếng với núi Bà Đen linh thiêng và tòa thánh Cao Đài uy nghi.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'tay ninh',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Đồng Tháp',
                'slug' => 'dong-thap',
                'image' => 'dong-thap.jpg',
                'description' => 'Xứ sở sen hồng bát ngát và làng hoa Sa Đéc rực rỡ sắc màu.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'dong thap',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Vĩnh Long',
                'slug' => 'vinh-long',
                'image' => 'vinh-long.jpg',
                'description' => 'Vùng đất cù lao trù phú với những vườn trái cây trĩu quả giữa dòng sông Tiền.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'vinh long',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'An Giang',
                'slug' => 'an-giang',
                'image' => 'an-giang.jpg',
                'description' => 'Miền đất tâm linh với Thất Sơn huyền bí và lễ hội vía Bà Chúa Xứ.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'an giang',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Cà Mau',
                'slug' => 'ca-mau',
                'image' => 'ca-mau.jpg',
                'description' => 'Điểm cực Nam của Tổ quốc, nơi có hệ sinh thái rừng ngập mặn đặc trưng.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'ca mau',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Lai Châu',
                'slug' => 'lai-chau',
                'image' => 'lai-chau.jpg',
                'description' => 'Vùng biên viễn phía Tây Bắc với những cung đường đèo hùng vĩ và mây ngàn.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'lai chau',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Điện Biên',
                'slug' => 'dien-bien',
                'image' => 'dien-bien.jpg',
                'description' => 'Nơi ghi dấu chiến thắng Điện Biên Phủ lừng lẫy năm châu, chấn động địa cầu.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'dien bien',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Sơn La',
                'slug' => 'son-la',
                'image' => 'son-la.jpg',
                'description' => 'Cao nguyên Mộc Châu xanh mướt và nhà máy thủy điện lớn nhất Đông Nam Á.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'son la',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Lạng Sơn',
                'slug' => 'lang-son',
                'image' => 'lang-son.jpg',
                'description' => 'Xứ Lạng nổi tiếng với ải Chi Lăng, chợ Kỳ Lừa và nàng Tô Thị.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'lang son',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Quảng Ninh',
                'slug' => 'quang-ninh',
                'image' => 'quang-ninh.jpg',
                'description' => 'Sở hữu kỳ quan thiên nhiên thế giới Vịnh Hạ Long và vùng mỏ than lớn nhất nước.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'quang ninh',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Thanh Hóa',
                'slug' => 'thanh-hoa',
                'image' => 'thanh-hoa.jpg',
                'description' => 'Vùng đất "địa linh nhân kiệt" với di sản Thành Nhà Hồ và biển Sầm Sơn.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'thanh hoa',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Nghệ An',
                'slug' => 'nghe-an',
                'image' => 'nghe-an.jpg',
                'description' => 'Quê hương Chủ tịch Hồ Chí Minh, vùng đất hiếu học và giàu truyền thống.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'nghe an',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Hà Tĩnh',
                'slug' => 'ha-tinh',
                'image' => 'ha-tinh.jpg',
                'description' => 'Xứ sở của những câu hò ví giặm và khu di tích Ngã ba Đồng Lộc.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'ha tinh',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Cao Bằng',
                'slug' => 'cao-bang',
                'image' => 'cao-bang.jpg',
                'description' => 'Vùng non nước hữu tình với thác Bản Giốc và hang Pác Bó lịch sử.',
                'created_at' => '2026-04-19 21:46:57',
                'updated_at' => '2026-04-19 21:46:57',
                'name_search' => 'cao bang',
            ),
        ));
        
        
    }
}