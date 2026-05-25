<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 1. Tạo các loại nhãn nội dung
        $types = [
            ['name' => 'Kiến trúc & Ý nghĩa', 'slug' => 'architecture'],
            ['name' => 'Điểm khác biệt', 'slug' => 'difference'],
            ['name' => 'Trải nghiệm', 'slug' => 'experience'],
            ['name' => 'Phương thức di chuyển', 'slug' => 'transport'],
            ['name' => 'Ẩm thực', 'slug' => 'food'],
            ['name' => 'Lưu ý', 'slug' => 'note'],
            ['name' => 'Lưu trú', 'slug' => 'hotel'],
            ['name' => 'Thông tin liên hệ', 'slug' => 'contact'],
        ];

        foreach ($types as $t) {
            LocationInfoType::updateOrCreate(['slug' => $t['slug']], $t);
        }

        // 2. Lấy địa điểm đầu tiên để gán dữ liệu mẫu
        $location = Location::first();

        if ($location) {
            // 2. Gán nội dung cho địa điểm đầu tiên (giả sử ID = 1)
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 1, // Kiến trúc
                'content' => 'Nội dung chi tiết về kiến trúc cổ kính của địa điểm này...'
            ]);

            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 2, // Điểm khác biệt
                'content' => '1. Ý nghĩa lịch sử - Tâm linh (The Legend)
                    Đây là điểm khác biệt lớn nhất. Hồ Hoàn Kiếm không chỉ là một danh thắng mà là một "bảo tàng sống" gắn liền với truyền thuyết trả gươm thần của vua Lê Lợi. Tên gọi "Hoàn Kiếm" mang đậm tinh thần yêu chuộng hòa bình của dân tộc Việt Nam.

                    2. Kiến trúc "Nhị đảo, Tam tòa"
                    Hồ Hoàn Kiếm có cấu trúc cảnh quan rất đặc trưng với sự kết hợp của:

                    Đảo Ngọc & Đền Ngọc Sơn: Kết nối bằng cây cầu Thê Húc đỏ rực – cấu trúc cầu gỗ uốn cong độc nhất vô nhị.

                    Đảo Rùa & Tháp Rùa: Nằm cô độc giữa lòng hồ, tạo nên một điểm nhấn cổ kính, u nghiêm.

                    Quần thể Tháp Bút - Đài Nghiên: Mang ý nghĩa tôn vinh sự học, một điểm khác biệt so với các khu vực giải trí thông thường.

                    3. "Trái tim" của sự kết nối
                    Trong khi Hồ Tây mang tính chất nghỉ dưỡng, Hồ Hoàn Kiếm là điểm giao thoa giữa:

                    Khu phố cổ (36 phố phường) phía Bắc.

                    Khu phố cũ (phố Pháp) phía Nam.

                    Trung tâm hành chính và các không gian văn hóa cộng đồng (Phố đi bộ).

                    4. Hệ sinh thái đặc hữu (Rùa Hồ Gươm)
                    Trong lịch sử, Hồ Hoàn Kiếm từng là nơi sinh sống của loài rùa lớn đặc hữu (Rafetus swinhoei). Dù "Cụ Rùa" cuối cùng đã qua đời, nhưng hình ảnh rùa vàng vẫn là một điểm khác biệt mang tính biểu tượng, gắn liền với niềm tin về sự linh thiêng của mảnh đất Thăng Long.

                    5. Màu nước xanh lục đặc trưng
                    Hồ còn có tên gọi khác là Hồ Lục Thủy (Hồ nước xanh) vì nước hồ có màu xanh lục quanh năm. Sự khác biệt này đến từ các loại tảo đặc trưng trong hồ, tạo nên sắc nước rất riêng, không trong veo nhưng cũng không đục ngầu.'
            ]);
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 3, // Trải nghiệm
                'content' => '🕒 Trải nghiệm theo dòng thời gian
                                1. Sáng sớm: Hà Nội nguyên bản
                                Nếu bạn thức dậy lúc 5:00 - 6:00 sáng, bạn sẽ thấy một Hồ Gươm rất khác:

                                Âm thanh: Tiếng chim hót, tiếng chổi tre quét lá khô và tiếng nhạc tập thể dục phát ra từ những chiếc đài cũ.

                                Hoạt động: Các cụ già đánh cờ, tập dưỡng sinh, người trẻ chạy bộ quanh hồ trong làn sương mờ ảo. Đây là lúc không khí trong lành và yên tĩnh nhất.

                                2. Chiều tà: Góc lãng mạn
                                Khi hoàng hôn buông xuống, ánh mặt trời phản chiếu xuống mặt nước màu xanh lục:

                                Cầu Thê Húc: Màu đỏ của cầu càng rực rỡ hơn dưới ánh đèn vàng khởi động.

                                Đi dạo: Cảm giác thư thái khi đi dưới những hàng lộc vừng rủ bóng, ngắm Tháp Rùa cô đơn giữa lòng hồ.

                                3. Cuối tuần: Không gian hội hội (Phố đi bộ)
                                Từ tối thứ 6 đến hết Chủ nhật, khu vực quanh hồ trở thành sàn diễn khổng lồ:

                                Âm nhạc đường phố: Từ chèo, xẩm truyền thống đến nhạc Rock, Acoustic hiện đại.

                                Trò chơi dân gian: Bạn có thể bắt gặp các nhóm bạn trẻ chơi ô ăn quan, kéo co ngay trên lòng đường.

                                🍦 Những trải nghiệm "Phải làm" (Checklist)
                                Ăn Kem Tràng Tiền: Đứng ăn kem ở phố Tràng Tiền ngay sát hồ là một "nghi thức" của cả người dân lẫn du khách. Vị kem đậu xanh hay cốm đặc trưng sẽ làm trải nghiệm thêm trọn vẹn.

                                Check-in Cầu Thê Húc: Bước chân lên những nhịp cầu cong cong để vào Đền Ngọc Sơn, ngắm nhìn nghiên đài và tháp Bút.

                                Ngắm "Cụ Rùa" trong tủ kính: Vào đền Ngọc Sơn để chiêm ngưỡng tiêu bản rùa khổng lồ, để thấy truyền thuyết không hề xa lạ.

                                Uống Cà phê view hồ: Tìm lên các quán cà phê trên cao ở khu vực Hàm Cá Mập (như Highlands hay các quán nhỏ ở phố Đinh Tiên Hoàng) để ngắm toàn cảnh hồ từ trên cao.']);
        
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 4, // Di chuyển
                'content' => '🛵 1. Phương tiện cá nhân (Xe máy, Xe đạp)
    Đây là cách cơ động nhất để bạn có thể len lỏi qua các con phố cổ trước khi dừng chân tại Hồ Gươm.

    Gửi xe: Quanh hồ có rất nhiều điểm trông giữ xe trên vỉa hè (phố Bảo Khánh, Hai Bà Trưng, Đinh Lễ...).

    Lưu ý: Vào các tối cuối tuần (thứ 6 đến Chủ nhật), các tuyến đường quanh hồ sẽ thành phố đi bộ, bạn phải gửi xe ở các điểm vòng ngoài và đi bộ vào.

    🚌 2. Xe buýt (Public Bus)
    Hệ thống xe buýt đi qua Hồ Gươm rất phong phú và tiết kiệm.

    Các tuyến phổ biến: * Điểm dừng Bờ Hồ: Tuyến 09, 14, 36.

    Điểm dừng Bưu điện Thành phố: Tuyến 08, 09, 31, 36.

    Điểm dừng phố Hàng Khay: Tuyến 02, 18, 31, 34, 40.

    Giá vé: Chỉ từ 7.000đ - 9.000đ/lượt.

    🚕 3. Xe công nghệ (Grab, Be, Xanh SM)
    Nếu bạn không muốn lo lắng về việc tìm chỗ gửi xe hay mù đường, hãy book xe công nghệ.

    Ưu điểm: Nhanh chóng, biết trước giá và được đưa đón tận nơi (trừ giờ phố đi bộ).

    Mẹo nhỏ: Hãy chọn điểm đến là "Đài phun nước Bờ Hồ" hoặc "Bưu điện Hà Nội" để dễ gặp tài xế nhất.

    🚍 4. Xe buýt 2 tầng (City Sightseeing)
    Đây là trải nghiệm di chuyển cực kỳ "sang chảnh" và thú vị cho khách du lịch.

    Lộ trình: Xe đi qua nhiều điểm di tích và dừng tại điểm khởi hành ngay cạnh Quảng trường Đông Kinh Nghĩa Thục (Hàm Cá Mập).

    Trải nghiệm: Ngắm nhìn hồ từ tầng 2 không mui là góc nhìn rất khác biệt và thoáng đãng.

    🚲 5. Xe đạp công cộng (TNGo)
    Hiện nay Hà Nội đã có hệ thống xe đạp công cộng rất phát triển.

    Cách dùng: Bạn chỉ cần tải app, quét mã QR tại các trạm quanh hồ (như trạm ở phố Đinh Tiên Hoàng) là có thể thong dong đạp xe quanh hồ.'
            ]);
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 5, // Ẩm thực
                'content' => '🍦 Những món "Ăn chơi" mang tính biểu tượng
    Kem Tràng Tiền (Số 35 Tràng Tiền): Trải nghiệm đứng ăn kem tại chỗ cùng dòng người tấp nập là một "đặc sản" văn hóa. Hãy thử vị Kem cốm hoặc Kem đậu xanh để cảm nhận vị ngọt thanh, béo ngậy truyền thống.

    Kem Thủy Tạ (Số 1 Lê Thái Tổ): Nằm ngay sát mép hồ, kem Thủy Tạ nổi tiếng với dòng kem chanh bạc hà mát lạnh, cực kỳ hợp để nhâm nhi khi dạo bộ.

    Nộm bò khô phố Đinh Tiên Hoàng: Những đĩa nộm đầy đặn với đu đủ bào sợi, thịt bò khô cắt miếng, lạc rang và nước mắm chua ngọt từ lâu đã là món ăn "ruột" của giới trẻ Hà Thành.

    🍜 Những món ăn mặn "Danh bất hư truyền"
    Phở Thìn Bờ Hồ (Số 61 Đinh Tiên Hoàng): Nằm sâu trong một con ngõ nhỏ đối diện đền Ngọc Sơn. Phở ở đây giữ được nét thanh lịch của phở Hà Nội xưa với nước dùng trong, thịt bò tươi tái lăn thơm mùi gừng.

    Bún chả Đắc Kim / Bún chả Hàng Quạt: Cách hồ chỉ vài phút đi bộ, bún chả với những miếng thịt nướng cháy cạnh, thơm nức mũi ăn kèm nước chấm chua ngọt là lựa chọn tuyệt vời cho bữa trưa.

    Bún thang Cầu Gỗ: Được mệnh danh là "thiên hạ đệ nhất bún", bún thang là sự tổng hòa tinh tế của trứng tráng thái sợi, giò lụa, thịt gà và nước dùng tôm thơm phức.

    Phở cuốn & Phở chiên phồng (Phố Ngũ Xá hoặc khu vực lân cận): Một biến tấu hiện đại hơn của phở, rất dễ ăn và thú vị.

    ☕ Văn hóa Cà phê "View" Hồ
    Nếu bạn muốn một không gian tĩnh lặng hơn để ngắm nhìn hồ từ trên cao:

    Cà phê Trứng (Giảng Cafe - Ngõ 39 Nguyễn Hữu Huân): Dù cách hồ một đoạn ngắn nhưng đây là nơi khai sinh ra món cà phê trứng béo ngậy, nồng nàn.

    Đinh Cafe (Tầng 2, số 13 Đinh Tiên Hoàng): Một quán cà phê cũ kỹ, nhuốm màu thời gian với ban công nhìn thẳng ra Tháp Rùa. Ngồi đây, bạn sẽ cảm nhận được vẻ đẹp cổ kính nhất của Hà Nội.

    Lục Thủy Restaurant & Cafe: Một không gian sang trọng hơn nằm ngay sát mép nước, phù hợp cho những buổi hẹn hò tối lãng mạn.'
            ]);
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 6, // Lưu ý
                'content' => '1. Thời gian và Không gian (Phố đi bộ)
    Lịch hoạt động: Phố đi bộ quanh hồ chỉ bắt đầu từ 19:00 Thứ Sáu đến 24:00 Chủ Nhật. Nếu bạn đến vào ngày thường, xe cộ đi lại rất đông và ồn ào, không thể thong dong dạo bước dưới lòng đường được.

    Sáng sớm: Nếu muốn chụp ảnh không dính người và hít thở không khí trong lành, hãy đến trước 7:00 sáng.

    2. Bảo vệ môi trường & Cảnh quan
    Không xả rác: Hà Nội kiểm soát rất gắt gao việc xả rác quanh Hồ Gươm. Có rất nhiều thùng rác hình chim cánh cụt dọc bờ hồ, bạn hãy sử dụng chúng để tránh bị phạt hành chính nhé.

    Không câu cá: Đây là khu vực tâm linh và di tích quốc gia, tuyệt đối không được câu cá hay thả lưới tại hồ.

    3. Trang phục & Hành xử
    Vào Đền Ngọc Sơn: Nếu bạn định đi qua cầu Thê Húc vào thăm đền, hãy nhớ mặc trang phục kín đáo (không mặc váy quá ngắn hoặc áo sát nách). Đây là nơi thờ tự linh thiêng.

    Giữ khoảng cách với các nghệ sĩ: Ở phố đi bộ có nhiều nhóm nghệ sĩ đường phố biểu diễn. Bạn có thể xem miễn phí, nhưng nếu muốn quay phim lâu hoặc chụp ảnh cùng, việc ủng hộ một chút tiền lẻ vào thùng quỹ của họ là một cử chỉ đẹp.

    4. Cẩn trọng khi mua sắm & Ăn uống
    Hỏi giá trước: Dù là trung tâm du lịch nhưng bạn vẫn nên hỏi giá trước khi ăn nộm, uống trà đá vỉa hè hoặc mua quà lưu niệm để tránh tình trạng "nói thách".

    Đánh giày & Mua hàng rong: Hãy tỉnh táo với lời mời đánh giày hoặc mua hoa quả dầm từ những người bán hàng rong không có bảng giá. Nếu không có nhu cầu, hãy từ chối dứt khoát nhưng lịch sự.

    5. An ninh cá nhân
    Bảo quản đồ đạc: Vào cuối tuần phố đi bộ rất đông đúc, hãy đeo ba lô ra phía trước hoặc chú ý túi xách, điện thoại để tránh bị móc túi.

    Gửi xe: Chỉ nên gửi xe tại các điểm có biển niêm yết giá của nhà nước (thường từ 5.000đ - 10.000đ). Tránh các bãi xe tự phát vì giá có thể lên tới 30.000đ - 50.000đ.

    6. "Văn hóa" chụp ảnh
    Nếu bạn thấy các đoàn chụp ảnh cưới hoặc các bạn trẻ mặc áo dài chụp ảnh kỷ yếu, hãy vui lòng nhường một chút không gian hoặc đợi một lát để họ hoàn thành khung hình nhé, đó là một nét văn hóa rất "Hà Nội".

    Note: Nếu bạn đi vào mùa Đông (tháng 12 - tháng 2), gió hồ thổi rất lạnh. Nhớ mang theo khăn quàng cổ để vừa ấm vừa có những bức ảnh "check-in" đúng chất mùa đông Hà Nội!'
            ]);
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 7, // Lưu trú
                'content' => 'Nội dung chi tiết về lưu trú gần địa điểm này...'
            ]);
            \App\Models\LocationContent::create([
                'location_id' => $location->id,
                'info_type_id' => 8, // Thông tin liện hệ
                'content' => '🚨 1. Số điện thoại khẩn cấp (Emergency)
    Trong trường hợp xảy ra sự cố về an ninh, y tế hoặc cần sự trợ giúp ngay lập tức:

    Công an Quận Hoàn Kiếm: 024 3825 2331 (Trụ sở tại số 2 phố Tràng Thi).

    Công an Phường Hàng Trống: 024 3825 7151 (Khu vực quản lý trực tiếp phía Tây hồ).

    Công an Phường Lý Thái Tổ: 024 3825 3521 (Khu vực quản lý phía Đông hồ - Tòa thị chính).

    Cấp cứu y tế: 115.

    Cảnh sát 113: 113.

    ℹ️ 2. Hỗ trợ Du lịch (Tourist Support)
    Nếu bạn gặp vấn đề về thông tin điểm đến, khiếu nại dịch vụ hoặc bị thất lạc đồ đạc:

    Tổng đài hỗ trợ du khách Hà Nội: 1800 556 896 (Hỗ trợ miễn phí).

    Sở Du lịch Hà Nội: 024 3941 1062.

    Trung tâm thông tin du lịch (Tourist Information Center): Số 28 phố Hàng Dầu (ngay gần ngã tư Hàng Bè - Hàng Dầu, phía Bắc hồ). Tại đây bạn có thể lấy bản đồ miễn phí.

    🏥 3. Y tế & Bệnh viện gần nhất
    Quanh hồ có các cơ sở y tế uy tín nếu bạn gặp vấn đề về sức khỏe:

    Bệnh viện Việt Đức: Số 40 Tràng Thi (cách hồ khoảng 500m).

    Bệnh viện Phụ sản Trung ương: Số 43 Tràng Thi.

    Bệnh viện Đa khoa Hoàn Kiếm: Số 65 Lý Thường Kiệt.

    🚕 4. Hãng taxi & Xe điện uy tín
    Để di chuyển an toàn và tránh tình trạng "hét giá":

    Taxi Mai Linh: 024 38 333 333.

    Taxi Group: 024 38 53 53 53.

    Xe điện du lịch Hồ Gươm (Dong Xuan Electric): Điểm khởi hành tại phố Đinh Tiên Hoàng (đối diện Hàm Cá Mập). Bạn có thể liên hệ trực tiếp tại quầy vé để đặt xe đi quanh phố cổ.

    💡 Lưu ý nhỏ cho bạn (Note):
    Ứng dụng hữu ích: Bạn nên cài đặt các ứng dụng như iHanoi (ứng dụng của chính quyền thành phố) để phản ánh các vấn đề đô thị hoặc Xanh SM/Grab/Be để chủ động về giá khi di chuyển.

    Wifi miễn phí: Tại khu vực quanh hồ có hệ thống wifi miễn phí mang tên "Freewifi_UBNDHanoi". Tuy nhiên, do lượng người truy cập đông nên đôi khi kết nối không ổn định.'
            ]);
            
        }
    }
}
