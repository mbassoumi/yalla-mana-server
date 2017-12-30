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
                'name' => 'ابو شخيدم',
                'lon' => '31.96656388888890000',
                'lat' => '35.1708277777778000',
                'attributes' => NULL,
            ),
            1 => 
            array (
                'name' => 'ابو قش',
                'lon' => '31.95080277777780000',
                'lat' => '35.1847055555555000',
                'attributes' => NULL,
            ),
            2 => 
            array (
                'name' => 'البيرة',
                'lon' => '31.91259722222220000',
                'lat' => '35.2217111111111000',
                'attributes' => NULL,
            ),
            3 => 
            array (
                'name' => 'الجانية',
                'lon' => '31.93848333333330000',
                'lat' => '35.1239611111111000',
                'attributes' => NULL,
            ),
            4 => 
            array (
                'name' => 'الطبية',
                'lon' => '31.95815000000000000',
                'lat' => '35.2984805555556000',
                'attributes' => NULL,
            ),
            5 => 
            array (
                'name' => 'اللبن الغربي',
                'lon' => '32.03596111111110000',
                'lat' => '35.0383166666667000',
                'attributes' => NULL,
            ),
            6 => 
            array (
                'name' => 'المزرعة الشرقية',
                'lon' => '32.00447777777780000',
                'lat' => '35.2775388888889000',
                'attributes' => NULL,
            ),
            7 => 
            array (
                'name' => 'المزرعةالغربية',
                'lon' => '31.95165833333330000',
                'lat' => '35.1507250000000000',
                'attributes' => NULL,
            ),
            8 => 
            array (
                'name' => 'بتونيا',
                'lon' => '31.58932777777780000',
                'lat' => '35.1697972222222000',
                'attributes' => NULL,
            ),
            9 => 
            array (
                'name' => 'بدرس',
                'lon' => '31.96781111111110000',
                'lat' => '34.9936500000000000',
                'attributes' => NULL,
            ),
            10 => 
            array (
                'name' => 'برقة',
                'lon' => '31.89606666666670000',
                'lat' => '35.2547694444444000',
                'attributes' => NULL,
            ),
            11 => 
            array (
                'name' => 'بلعين',
                'lon' => '31.92895000000000000',
                'lat' => '35.0707916666667000',
                'attributes' => NULL,
            ),
            12 => 
            array (
                'name' => 'بتللو',
                'lon' => '31.97666388888890000',
                'lat' => '35.1141361111111000',
                'attributes' => NULL,
            ),
            13 => 
            array (
                'name' => 'بيت ريما',
                'lon' => '32.03263611111110000',
                'lat' => '35.1033388888889000',
                'attributes' => NULL,
            ),
            14 => 
            array (
                'name' => 'بيت سيرا',
                'lon' => '31.88760555555560000',
                'lat' => '35.0452944444444000',
                'attributes' => NULL,
            ),
            15 => 
            array (
                'name' => 'بيت عور التحتا',
                'lon' => '31.59521388888890000',
                'lat' => '35.0838416666667000',
                'attributes' => NULL,
            ),
            16 => 
            array (
                'name' => 'بيت عور الفوقا',
                'lon' => '31.88626944444440000',
                'lat' => '35.1142194444444000',
                'attributes' => NULL,
            ),
            17 => 
            array (
                'name' => 'بيت لقيا',
                'lon' => '31.87003333333330000',
                'lat' => '35.0651222222222000',
                'attributes' => NULL,
            ),
            18 => 
            array (
                'name' => 'بيتين',
                'lon' => '31.92651388888890000',
                'lat' => '35.2369222222222000',
                'attributes' => NULL,
            ),
            19 => 
            array (
                'name' => 'بيرزيت',
                'lon' => '31.97126944444440000',
                'lat' => '35.1933416666667000',
                'attributes' => NULL,
            ),
            20 => 
            array (
                'name' => 'ترمسعيا',
                'lon' => '32.03277222222220000',
                'lat' => '35.2883638888889000',
                'attributes' => NULL,
            ),
            21 => 
            array (
                'name' => 'جامعة بيرزيت',
                'lon' => '31.96132777777780000',
                'lat' => '35.1844444444444000',
                'attributes' => NULL,
            ),
            22 => 
            array (
                'name' => 'جفنا',
                'lon' => '31.96348888888890000',
                'lat' => '35.2151138888889000',
                'attributes' => NULL,
            ),
            23 => 
            array (
                'name' => 'جلجيليا',
                'lon' => '32.03141388888890000',
                'lat' => '35.2232444444444000',
                'attributes' => NULL,
            ),
            24 => 
            array (
                'name' => 'جلزون',
                'lon' => '31.95172777777780000',
                'lat' => '35.2125722222222000',
                'attributes' => NULL,
            ),
            25 => 
            array (
                'name' => 'جمالا',
                'lon' => '31.97317777777780000',
                'lat' => '35.0920527777778000',
                'attributes' => NULL,
            ),
            26 => 
            array (
                'name' => 'خربتة ابو فلاح',
                'lon' => '32.01370000000000000',
                'lat' => '35.3026083333333000',
                'attributes' => NULL,
            ),
            27 => 
            array (
                'name' => 'خربثا المصباح',
                'lon' => '31.58531111111110000',
                'lat' => '35.0720722222222000',
                'attributes' => NULL,
            ),
            28 => 
            array (
                'name' => 'دورا القرع',
                'lon' => '31.95857777777780000',
                'lat' => '35.2259138888889000',
                'attributes' => NULL,
            ),
            29 => 
            array (
                'name' => 'دير ابو مشعل',
                'lon' => '32.00011666666670000',
                'lat' => '35.0703972222222000',
                'attributes' => NULL,
            ),
            30 => 
            array (
                'name' => 'دير ابزيع',
                'lon' => '31.91621388888890000',
                'lat' => '35.9162138888889000',
                'attributes' => NULL,
            ),
            31 => 
            array (
                'name' => 'دير السودان',
                'lon' => '32.03195277777780000',
                'lat' => '35.1490027777778000',
                'attributes' => NULL,
            ),
            32 => 
            array (
                'name' => 'دير جرير',
                'lon' => '31.96563611111110000',
                'lat' => '35.2937527777778000',
                'attributes' => NULL,
            ),
            33 => 
            array (
                'name' => 'دير دبوان',
                'lon' => '31.91125000000000000',
                'lat' => '35.2690055555556000',
                'attributes' => NULL,
            ),
            34 => 
            array (
                'name' => 'دير عمار',
                'lon' => '31.96699166666670000',
                'lat' => '35.0997250000000000',
                'attributes' => NULL,
            ),
            35 => 
            array (
                'name' => 'دير غسانة',
                'lon' => '32.04645277777780000',
                'lat' => '35.0981277777778000',
                'attributes' => NULL,
            ),
            36 => 
            array (
                'name' => 'دير قديس',
                'lon' => '31.94872500000000000',
                'lat' => '35.0450777777778000',
                'attributes' => NULL,
            ),
            37 => 
            array (
                'name' => 'دير نظام',
                'lon' => '32.00286666666670000',
                'lat' => '35.1136916666667000',
                'attributes' => NULL,
            ),
            38 => 
            array (
                'name' => 'راس كركر',
                'lon' => '31.94276666666670000',
                'lat' => '35.1038805555556000',
                'attributes' => NULL,
            ),
            39 => 
            array (
                'name' => 'رام الله',
                'lon' => '31.89821388888890000',
                'lat' => '35.2043111111111000',
                'attributes' => NULL,
            ),
            40 => 
            array (
                'name' => 'رمون',
                'lon' => '31.92738611111110000',
                'lat' => '35.2994555555556000',
                'attributes' => NULL,
            ),
            41 => 
            array (
                'name' => 'رنتيس',
                'lon' => '32.03008611111110000',
                'lat' => '35.0189444444444000',
                'attributes' => NULL,
            ),
            42 => 
            array (
                'name' => 'سردا',
                'lon' => '31.94179444444440000',
                'lat' => '35.2031750000000000',
                'attributes' => NULL,
            ),
            43 => 
            array (
                'name' => 'سلواد',
                'lon' => '31.97944444444440000',
                'lat' => '35.2619138888889000',
                'attributes' => NULL,
            ),
            44 => 
            array (
                'name' => 'سنجل',
                'lon' => '32.03368888888890000',
                'lat' => '35.2639277777778000',
                'attributes' => NULL,
            ),
            45 => 
            array (
                'name' => 'شبتين',
                'lon' => '31.97486111111110000',
                'lat' => '35.0507055555556000',
                'attributes' => NULL,
            ),
            46 => 
            array (
                'name' => 'شقبا',
                'lon' => '31.97892222222220000',
                'lat' => '35.0126500000000000',
                'attributes' => NULL,
            ),
            47 => 
            array (
                'name' => 'صفا',
                'lon' => '31.90374166666670000',
                'lat' => '35.0601916666667000',
                'attributes' => NULL,
            ),
            48 => 
            array (
                'name' => '<طيرة< قرية',
                'lon' => '31.87027777777780000',
                'lat' => '35.1256750000000000',
                'attributes' => NULL,
            ),
            49 => 
            array (
                'name' => 'عابود',
                'lon' => '32.01929444444440000',
                'lat' => '35.0686222222222000',
                'attributes' => NULL,
            ),
            50 => 
            array (
                'name' => 'عارورة',
                'lon' => '32.04075833333330000',
                'lat' => '35.1738750000000000',
                'attributes' => NULL,
            ),
            51 => 
            array (
                'name' => 'عبوين',
                'lon' => '32.03085555555560000',
                'lat' => '35.2009944444444000',
                'attributes' => NULL,
            ),
            52 => 
            array (
                'name' => 'عجول',
                'lon' => '32.02310277777780000',
                'lat' => '35.1804111111111000',
                'attributes' => NULL,
            ),
            53 => 
            array (
                'name' => 'عطارة',
                'lon' => '32.00212777777780000',
                'lat' => '35.2063527777778000',
                'attributes' => NULL,
            ),
            54 => 
            array (
                'name' => 'عين سينيا',
                'lon' => '31.97235000000000000',
                'lat' => '35.2280000000000000',
                'attributes' => NULL,
            ),
            55 => 
            array (
                'name' => 'عين عريك',
                'lon' => '31.90731388888890000',
                'lat' => '35.1428694444444000',
                'attributes' => NULL,
            ),
            56 => 
            array (
                'name' => 'عين قينيا',
                'lon' => '31.92796666666670000',
                'lat' => '35.1497083333333000',
                'attributes' => NULL,
            ),
            57 => 
            array (
                'name' => 'عين يبرود',
                'lon' => '31.95310833333330000',
                'lat' => '35.2498305555556000',
                'attributes' => NULL,
            ),
            58 => 
            array (
                'name' => 'قبية',
                'lon' => '31.98948055555560000',
                'lat' => '35.0394805555556000',
                'attributes' => NULL,
            ),
            59 => 
            array (
                'name' => 'قراوة بني زيد',
                'lon' => '32.05258055555550000',
                'lat' => '35.1254166666667000',
                'attributes' => NULL,
            ),
            60 => 
            array (
                'name' => 'كفر عين',
                'lon' => '32.04520833333330000',
                'lat' => '35.1237972222222000',
                'attributes' => NULL,
            ),
            61 => 
            array (
                'name' => 'كفر مالك',
                'lon' => '31.99026111111110000',
                'lat' => '35.3102222222222000',
                'attributes' => NULL,
            ),
            62 => 
            array (
                'name' => 'كفر نعمة',
                'lon' => '31.92446944444440000',
                'lat' => '35.0969166666667000',
                'attributes' => NULL,
            ),
            63 => 
            array (
                'name' => 'كوبر',
                'lon' => '31.99001944444440000',
                'lat' => '35.1584333333333000',
                'attributes' => NULL,
            ),
            64 => 
            array (
                'name' => 'نعلين',
                'lon' => '31.94702222222220000',
                'lat' => '35.0215222222222000',
                'attributes' => NULL,
            ),
        ));
        
        
    }
}