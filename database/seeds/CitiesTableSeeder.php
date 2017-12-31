<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en" : "ابو شخيدم" , "ar":"ابو شخيدم"}',
                'lat' => '35.1708277777778000',
                'lon' => '31.96656388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en" : "ابو قش" , "ar":"ابو قش"}',
                'lat' => '35.1847055555555000',
                'lon' => '31.95080277777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en" : "البيرة" , "ar":"البيرة"}',
                'lat' => '35.2217111111111000',
                'lon' => '31.91259722222220000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en" : "الجانية" , "ar":"الجانية"}',
                'lat' => '35.1239611111111000',
                'lon' => '31.93848333333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en" : "الطبية" , "ar":"الطبية"}',
                'lat' => '35.2984805555556000',
                'lon' => '31.95815000000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '{"en" : "اللبن الغربي" , "ar":"اللبن الغربي"}',
                'lat' => '35.0383166666667000',
                'lon' => '32.03596111111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '{"en" : "المزرعة الشرقية" , "ar":"المزرعة الشرقية"}',
                'lat' => '35.2775388888889000',
                'lon' => '32.00447777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '{"en" : "المزرعةالغربية" , "ar":"المزرعةالغربية"}',
                'lat' => '35.1507250000000000',
                'lon' => '31.95165833333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '{"en" : "بتونيا" , "ar":"بتونيا"}',
                'lat' => '35.1697972222222000',
                'lon' => '31.58932777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '{"en" : "بدرس" , "ar":"بدرس"}',
                'lat' => '34.9936500000000000',
                'lon' => '31.96781111111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '{"en" : "برقة" , "ar":"برقة"}',
                'lat' => '35.2547694444444000',
                'lon' => '31.89606666666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '{"en" : "بلعين" , "ar":"بلعين"}',
                'lat' => '35.0707916666667000',
                'lon' => '31.92895000000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '{"en" : "بتللو" , "ar":"بتللو"}',
                'lat' => '35.1141361111111000',
                'lon' => '31.97666388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '{"en" : "بيت ريما" , "ar":"بيت ريما"}',
                'lat' => '35.1033388888889000',
                'lon' => '32.03263611111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '{"en" : "بيت سيرا" , "ar":"بيت سيرا"}',
                'lat' => '35.0452944444444000',
                'lon' => '31.88760555555560000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '{"en" : "بيت عور التحتا" , "ar":"بيت عور التحتا"}',
                'lat' => '35.0838416666667000',
                'lon' => '31.59521388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '{"en" : "بيت عور الفوقا" , "ar":"بيت عور الفوقا"}',
                'lat' => '35.1142194444444000',
                'lon' => '31.88626944444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '{"en" : "بيت لقيا" , "ar":"بيت لقيا"}',
                'lat' => '35.0651222222222000',
                'lon' => '31.87003333333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '{"en" : "بيتين" , "ar":"بيتين"}',
                'lat' => '35.2369222222222000',
                'lon' => '31.92651388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '{"en" : "بيرزيت" , "ar":"بيرزيت"}',
                'lat' => '35.1933416666667000',
                'lon' => '31.97126944444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '{"en" : "ترمسعيا" , "ar":"ترمسعيا"}',
                'lat' => '35.2883638888889000',
                'lon' => '32.03277222222220000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '{"en" : "جامعة بيرزيت" , "ar":"جامعة بيرزيت"}',
                'lat' => '35.1844444444444000',
                'lon' => '31.96132777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '{"en" : "جفنا" , "ar":"جفنا"}',
                'lat' => '35.2151138888889000',
                'lon' => '31.96348888888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '{"en" : "جلجيليا" , "ar":"جلجيليا"}',
                'lat' => '35.2232444444444000',
                'lon' => '32.03141388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '{"en" : "جلزون" , "ar":"جلزون"}',
                'lat' => '35.2125722222222000',
                'lon' => '31.95172777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '{"en" : "جمالا" , "ar":"جمالا"}',
                'lat' => '35.0920527777778000',
                'lon' => '31.97317777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '{"en" : "خربتة ابو فلاح" , "ar":"خربتة ابو فلاح"}',
                'lat' => '35.3026083333333000',
                'lon' => '32.01370000000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '{"en" : "خربثا المصباح" , "ar":"خربثا المصباح"}',
                'lat' => '35.0720722222222000',
                'lon' => '31.58531111111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '{"en" : "دورا القرع" , "ar":"دورا القرع"}',
                'lat' => '35.2259138888889000',
                'lon' => '31.95857777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '{"en" : "دير ابو مشعل" , "ar":"دير ابو مشعل"}',
                'lat' => '35.0703972222222000',
                'lon' => '32.00011666666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '{"en" : "دير ابزيع" , "ar":"دير ابزيع"}',
                'lat' => '35.9162138888889000',
                'lon' => '31.91621388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '{"en" : "دير السودان" , "ar":"دير السودان"}',
                'lat' => '35.1490027777778000',
                'lon' => '32.03195277777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => '{"en" : "دير جرير" , "ar":"دير جرير"}',
                'lat' => '35.2937527777778000',
                'lon' => '31.96563611111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => '{"en" : "دير دبوان" , "ar":"دير دبوان"}',
                'lat' => '35.2690055555556000',
                'lon' => '31.91125000000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => '{"en" : "دير عمار" , "ar":"دير عمار"}',
                'lat' => '35.0997250000000000',
                'lon' => '31.96699166666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => '{"en" : "دير غسانة" , "ar":"دير غسانة"}',
                'lat' => '35.0981277777778000',
                'lon' => '32.04645277777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => '{"en" : "دير قديس" , "ar":"دير قديس"}',
                'lat' => '35.0450777777778000',
                'lon' => '31.94872500000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => '{"en" : "دير نظام" , "ar":"دير نظام"}',
                'lat' => '35.1136916666667000',
                'lon' => '32.00286666666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => '{"en" : "راس كركر" , "ar":"راس كركر"}',
                'lat' => '35.1038805555556000',
                'lon' => '31.94276666666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => '{"en" : "رام الله" , "ar":"رام الله"}',
                'lat' => '35.2043111111111000',
                'lon' => '31.89821388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => '{"en" : "رمون" , "ar":"رمون"}',
                'lat' => '35.2994555555556000',
                'lon' => '31.92738611111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => '{"en" : "رنتيس" , "ar":"رنتيس"}',
                'lat' => '35.0189444444444000',
                'lon' => '32.03008611111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => '{"en" : "سردا" , "ar":"سردا"}',
                'lat' => '35.2031750000000000',
                'lon' => '31.94179444444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => '{"en" : "سلواد" , "ar":"سلواد"}',
                'lat' => '35.2619138888889000',
                'lon' => '31.97944444444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => '{"en" : "سنجل" , "ar":"سنجل"}',
                'lat' => '35.2639277777778000',
                'lon' => '32.03368888888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => '{"en" : "شبتين" , "ar":"شبتين"}',
                'lat' => '35.0507055555556000',
                'lon' => '31.97486111111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => '{"en" : "شقبا" , "ar":"شقبا"}',
                'lat' => '35.0126500000000000',
                'lon' => '31.97892222222220000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => '{"en" : "صفا" , "ar":"صفا"}',
                'lat' => '35.0601916666667000',
                'lon' => '31.90374166666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => '{"en" : "<طيرة< قرية" , "ar":"<طيرة< قرية"}',
                'lat' => '35.1256750000000000',
                'lon' => '31.87027777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => '{"en" : "عابود" , "ar":"عابود"}',
                'lat' => '35.0686222222222000',
                'lon' => '32.01929444444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => '{"en" : "عارورة" , "ar":"عارورة"}',
                'lat' => '35.1738750000000000',
                'lon' => '32.04075833333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => '{"en" : "عبوين" , "ar":"عبوين"}',
                'lat' => '35.2009944444444000',
                'lon' => '32.03085555555560000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => '{"en" : "عجول" , "ar":"عجول"}',
                'lat' => '35.1804111111111000',
                'lon' => '32.02310277777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => '{"en" : "عطارة" , "ar":"عطارة"}',
                'lat' => '35.2063527777778000',
                'lon' => '32.00212777777780000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => '{"en" : "عين سينيا" , "ar":"عين سينيا"}',
                'lat' => '35.2280000000000000',
                'lon' => '31.97235000000000000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => '{"en" : "عين عريك" , "ar":"عين عريك"}',
                'lat' => '35.1428694444444000',
                'lon' => '31.90731388888890000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => '{"en" : "عين قينيا" , "ar":"عين قينيا"}',
                'lat' => '35.1497083333333000',
                'lon' => '31.92796666666670000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => '{"en" : "عين يبرود" , "ar":"عين يبرود"}',
                'lat' => '35.2498305555556000',
                'lon' => '31.95310833333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => '{"en" : "قبية" , "ar":"قبية"}',
                'lat' => '35.0394805555556000',
                'lon' => '31.98948055555560000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => '{"en" : "قراوة بني زيد" , "ar":"قراوة بني زيد"}',
                'lat' => '35.1254166666667000',
                'lon' => '32.05258055555550000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => '{"en" : "كفر عين" , "ar":"كفر عين"}',
                'lat' => '35.1237972222222000',
                'lon' => '32.04520833333330000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => '{"en" : "كفر مالك" , "ar":"كفر مالك"}',
                'lat' => '35.3102222222222000',
                'lon' => '31.99026111111110000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => '{"en" : "كفر نعمة" , "ar":"كفر نعمة"}',
                'lat' => '35.0969166666667000',
                'lon' => '31.92446944444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => '{"en" : "كوبر" , "ar":"كوبر"}',
                'lat' => '35.1584333333333000',
                'lon' => '31.99001944444440000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => '{"en" : "نعلين" , "ar":"نعلين"}',
                'lat' => '35.0215222222222000',
                'lon' => '31.94702222222220000',
                'attributes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}