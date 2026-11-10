<?php
add_action('init', function() {
    load_theme_textdomain('newscrunch', get_template_directory() . '/languages');
});



	
function goldnow_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'goldnow_theme_setup' );

// Variables globales
$country_to_currency = [
    // الدول العربية
    'eg' => 'EGP',  // مصر
    'sa' => 'SAR',  // السعودية
    'ae' => 'AED',  // الإمارات
    'kw' => 'KWD',  // الكويت
    'qa' => 'QAR',  // قطر
    'bh' => 'BHD',  // البحرين
    'om' => 'OMR',  // عمان
    'ma' => 'MAD',  // المغرب
    'dz' => 'DZD',  // الجزائر
    'tn' => 'TND',  // تونس
    'ly' => 'LYD',  // ليبيا
    'sd' => 'SDG',  // السودان
    'so' => 'SOS',  // الصومال
    'dj' => 'DJF',  // جيبوتي
    'mr' => 'MRU',  // موريتانيا
    'jo' => 'JOD',  // الأردن
    'lb' => 'LBP',  // لبنان
    'sy' => 'SYP',  // سوريا
    'iq' => 'IQD',  // العراق
    'ps' => 'ILS',  // فلسطين
    'ye' => 'YER',  // اليمن
    'km' => 'KMF',  // جزر القمر

    // أمريكا الشمالية
    'us' => 'USD',  // الولايات المتحدة
    'ca' => 'CAD',  // كندا
    'mx' => 'MXN',  // المكسيك
    'bm' => 'BMD',  // برمودا
    'ky' => 'KYD',  // جزر كايمان
    'cr' => 'CRC',  // كوستاريكا
    'cu' => 'CUP',  // كوبا
    'do' => 'DOP',  // جمهورية الدومينيكان
    'gt' => 'GTQ',  // غواتيمالا
    'hn' => 'HNL',  // هندوراس
    'ni' => 'NIO',  // نيكاراغوا
    'pa' => 'PAB',  // بنما
    'sv' => 'USD',  // السلفادور
    'bs' => 'BSD',  // جزر البهاما
    'bb' => 'BBD',  // بربادوس
    'bz' => 'BZD',  // بليز
    'jm' => 'JMD',  // جامايكا
    'tt' => 'TTD',  // ترينيداد وتوباغو
    'ag' => 'XCD',  // أنتيغوا وباربودا
    'dm' => 'XCD',  // دومينيكا
    'gd' => 'XCD',  // غرينادا
    'kn' => 'XCD',  // سانت كيتس ونيفيس
    'lc' => 'XCD',  // سانت لوسيا
    'vc' => 'XCD',  // سانت فنسنت والغرينادين
    'ht' => 'HTG',  // هايتي
    'pr' => 'USD',  // بورتو ريكو
    'vi' => 'USD',  // جزر العذراء الأمريكية
    'vg' => 'USD',  // جزر العذراء البريطانية
    'ai' => 'XCD',  // أنغويلا
    'ms' => 'XCD',  // مونتسيرات
    'tc' => 'USD',  // جزر توركس وكايكوس
    'gl' => 'DKK',  // غرينلاند

    // أمريكا الجنوبية
    'ar' => 'ARS',  // الأرجنتين
    'bo' => 'BOB',  // بوليفيا
    'br' => 'BRL',  // البرازيل
    'cl' => 'CLP',  // تشيلي
    'co' => 'COP',  // كولومبيا
    'ec' => 'USD',  // الإكوادور
    'gy' => 'GYD',  // غيانا
    'py' => 'PYG',  // باراغواي
    'pe' => 'PEN',  // بيرو
    'sr' => 'SRD',  // سورينام
    'uy' => 'UYU',  // أوروغواي
    've' => 'VES',  // فنزويلا
    'fk' => 'FKP',  // جزر فوكلاند
    'gf' => 'EUR',  // غويانا الفرنسية

    // أوروبا
    'gb' => 'GBP',  // المملكة المتحدة
    'de' => 'EUR',  // ألمانيا
    'fr' => 'EUR',  // فرنسا
    'it' => 'EUR',  // إيطاليا
    'es' => 'EUR',  // إسبانيا
    'nl' => 'EUR',  // هولندا
    'be' => 'EUR',  // بلجيكا
    'pt' => 'EUR',  // البرتغال
    'at' => 'EUR',  // النمسا
    'ch' => 'CHF',  // سويسرا
    'se' => 'SEK',  // السويد
    'no' => 'NOK',  // النرويج
    'dk' => 'DKK',  // الدنمارك
    'fi' => 'EUR',  // فنلندا
    'ie' => 'EUR',  // أيرلندا
    'pl' => 'PLN',  // بولندا
    'cz' => 'CZK',  // التشيك
    'hu' => 'HUF',  // المجر
    'ro' => 'RON',  // رومانيا
    'bg' => 'BGN',  // بلغاريا
    'hr' => 'EUR',  // كرواتيا
    'rs' => 'RSD',  // صربيا
    'ua' => 'UAH',  // أوكرانيا
    'by' => 'BYN',  // بيلاروسيا
    'md' => 'MDL',  // مولدوفا
    'al' => 'ALL',  // ألبانيا
    'ba' => 'BAM',  // البوسنة والهرسك
    'mk' => 'MKD',  // مقدونيا الشمالية
    'me' => 'EUR',  // الجبل الأسود
    'kos' => 'EUR',  // كوسوفو
    'is' => 'ISK',  // آيسلندا
    'ee' => 'EUR',  // إستونيا
    'lv' => 'EUR',  // لاتفيا
    'lt' => 'EUR',  // ليتوانيا
    'sk' => 'EUR',  // سلوفاكيا
    'si' => 'EUR',  // سلوفينيا
    'cy' => 'EUR',  // قبرص
    'mt' => 'EUR',  // مالطا
    'lu' => 'EUR',  // لوكسمبورغ
    'gr' => 'EUR',  // اليونان
    'ad' => 'EUR',  // أندورا
    'sm' => 'EUR',  // سان مارينو
    'va' => 'EUR',  // الفاتيكان
    'mc' => 'EUR',  // موناكو
    'li' => 'CHF',  // ليختنشتاين
    'fo' => 'DKK',  // جزر فارو
    'gi' => 'GIP',  // جبل طارق
    'je' => 'GBP',  // جيرسي
    'im' => 'GBP',  // جزيرة مان
    'gg' => 'GBP',  // غيرنسي

    // آسيا
    'cn' => 'CNY',  // الصين
    'jp' => 'JPY',  // اليابان
    'in' => 'INR',  // الهند
    'kr' => 'KRW',  // كوريا الجنوبية
    'kp' => 'KPW',  // كوريا الشمالية
    'sg' => 'SGD',  // سنغافورة
    'my' => 'MYR',  // ماليزيا
    'th' => 'THB',  // تايلاند
    'id' => 'IDR',  // إندونيسيا
    'ph' => 'PHP',  // الفلبين
    'vn' => 'VND',  // فيتنام
    'pk' => 'PKR',  // باكستان
    'bd' => 'BDT',  // بنغلاديش
    'lk' => 'LKR',  // سريلانكا
    'np' => 'NPR',  // نيبال
    'mm' => 'MMK',  // ميانمار
    'kz' => 'KZT',  // كازاخستان
    'uz' => 'UZS',  // أوزبكستان
    'kg' => 'KGS',  // قيرغيزستان
    'tj' => 'TJS',  // طاجيكستان
    'tm' => 'TMT',  // تركمانستان
    'mn' => 'MNT',  // منغوليا
    'la' => 'LAK',  // لاوس
    'kh' => 'KHR',  // كمبوديا
    'bt' => 'BTN',  // بوتان
    'mv' => 'MVR',  // جزر المالديف
    'bn' => 'BND',  // بروناي
    'tl' => 'USD',  // تيمور الشرقية
    'tr' => 'TRY',  // تركيا
    'il' => 'ILS',  // إسرائيل
    'ir' => 'IRR',  // إيران
    'af' => 'AFN',  // أفغانستان
    'ge' => 'GEL',  // جورجيا
    'am' => 'AMD',  // أرمينيا
    'az' => 'AZN',  // أذربيجان
    'hk' => 'HKD',  // هونغ كونغ
    'mo' => 'MOP',  // ماكاو
    'tw' => 'TWD',  // تايوان

    // أفريقيا
    'za' => 'ZAR',  // جنوب أفريقيا
    'ng' => 'NGN',  // نيجيريا
    'ke' => 'KES',  // كينيا
    'et' => 'ETB',  // إثيوبيا
    'gh' => 'GHS',  // غانا
    'ci' => 'XOF',  // ساحل العاج
    'sn' => 'XOF',  // السنغال
    'tz' => 'TZS',  // تنزانيا
    'ug' => 'UGX',  // أوغندا
    'cm' => 'XAF',  // الكاميرون
    'cd' => 'CDF',  // الكونغو الديمقراطية
    'ao' => 'AOA',  // أنغولا
    'mz' => 'MZN',  // موزمبيق
    'zw' => 'ZWL',  // زيمبابوي
    'mg' => 'MGA',  // مدغشقر
    'mu' => 'MUR',  // موريشيوس
    'zm' => 'ZMW',  // زامبيا
    'bw' => 'BWP',  // بوتسوانا
    'na' => 'NAD',  // ناميبيا
    'rw' => 'RWF',  // رواندا
    'bi' => 'BIF',  // بوروندي
    'ss' => 'SSP',  // جنوب السودان
    'er' => 'ERN',  // إريتريا
    'sz' => 'SZL',  // إسواتيني
    'ls' => 'LSL',  // ليسوتو
    'gm' => 'GMD',  // غامبيا
    'gn' => 'GNF',  // غينيا
    'gw' => 'XOF',  // غينيا بيساو
    'lr' => 'LRD',  // ليبيريا
    'ml' => 'XOF',  // مالي
    'ne' => 'XOF',  // النيجر
    'bf' => 'XOF',  // بوركينا فاسو
    'tg' => 'XOF',  // توغو
    'bj' => 'XOF',  // بنين
    'ga' => 'XAF',  // الغابون
    'cg' => 'XAF',  // جمهورية الكونغو
    'td' => 'XAF',  // تشاد
    'cf' => 'XAF',  // جمهورية أفريقيا الوسطى
    'gq' => 'XAF',  // غينيا الاستوائية
    'st' => 'STN',  // ساو تومي وبرينسيب
    'cv' => 'CVE',  // الرأس الأخضر
    'sc' => 'SCR',  // سيشل
    'sl' => 'SLE',  // سيراليون

    // أوقيانوسيا
    'au' => 'AUD',  // أستراليا
    'nz' => 'NZD',  // نيوزيلندا
    'pg' => 'PGK',  // بابوا غينيا الجديدة
    'fj' => 'FJD',  // فيجي
    'sb' => 'SBD',  // جزر سليمان
    'vu' => 'VUV',  // فانواتو
    'ws' => 'WST',  // ساموا
    'to' => 'TOP',  // تونغا
    'ki' => 'AUD',  // كيريباتي
    'nr' => 'AUD',  // ناورو
    'tv' => 'AUD',  // توفالو
    'pw' => 'USD',  // بالاو
    'fm' => 'USD',  // ميكرونيسيا
    'mh' => 'USD',  // جزر مارشال
    'pf' => 'XPF',  // بولينيزيا الفرنسية
    'nc' => 'XPF',  // كاليدونيا الجديدة
    'wf' => 'XPF',  // واليس وفوتونا
    'ck' => 'NZD',  // جزر كوك
    'nu' => 'NZD',  // نيوي
    'tk' => 'NZD',  // توكيلاو
    'as' => 'USD',  // ساموا الأمريكية
    'gu' => 'USD',  // غوام
    'mp' => 'USD',  // جزر ماريانا الشمالية

    // أقاليم أخرى
    'ax' => 'EUR',  // جزر أولاند
    'bl' => 'EUR',  // سان بارتليمي
    'bq' => 'USD',  // بونير وسانت يوستاتيوس وسابا
    'bv' => 'NOK',  // جزيرة بوفيه
    'cc' => 'AUD',  // جزر كوكوس
    'cx' => 'AUD',  // جزيرة الكريسماس
    'hm' => 'AUD',  // جزر هيرد وماكدونالد
    'nf' => 'AUD',  // جزيرة نورفولك
    'pn' => 'NZD',  // جزر بيتكيرن
    're' => 'EUR',  // ريونيون
    'sh' => 'SHP',  // سانت هيلينا
    'sj' => 'NOK',  // سفالبارد وجان ماين
    'tf' => 'EUR',  // الأراضي الفرنسية الجنوبية
    'um' => 'USD',  // جزر الولايات المتحدة الصغيرة النائية
    'yt' => 'EUR',  // مايوت
];
$currency_names = [
    // العملات العربية
    'AED' => 'درهم إماراتي',
    'SAR' => 'ريال سعودي',
    'KWD' => 'دينار كويتي',
    'BHD' => 'دينار بحريني',
    'QAR' => 'ريال قطري',
    'OMR' => 'ريال عماني',
    'EGP' => 'جنيه مصري',
    'MAD' => 'درهم مغربي',
    'DZD' => 'دينار جزائري',
    'TND' => 'دينار تونسي',
    'LYD' => 'دينار ليبي',
    'SDG' => 'جنيه سوداني',
    'SOS' => 'شلن صومالي',
    'DJF' => 'فرنك جيبوتي',
    'MRU' => 'أوقية موريتانية',
    'JOD' => 'دينار أردني',
    'LBP' => 'ليرة لبنانية',
    'SYP' => 'ليرة سورية',
    'IQD' => 'دينار عراقي',
    'YER' => 'ريال يمني',
    'KMF' => 'فرنك قمري',
    
    // باقي عملات العالم
    'USD' => 'دولار أمريكي',
    'EUR' => 'يورو',
    'GBP' => 'جنيه إسترليني',
    'CAD' => 'دولار كندي',
    'AUD' => 'دولار أسترالي',
    'NZD' => 'دولار نيوزيلندي',
    'JPY' => 'ين ياباني',
    'CNY' => 'يوان صيني',
    'INR' => 'روبية هندية',
    'RUB' => 'روبل روسي',
    'BRL' => 'ريال برازيلي',
    'ZAR' => 'راند جنوب أفريقي',
    'MXN' => 'بيزو مكسيكي',
    'KRW' => 'وون كوري جنوبي',
    'SGD' => 'دولار سنغافوري',
    'MYR' => 'رينغيت ماليزي',
    'THB' => 'باخت تايلاندي',
    'IDR' => 'روبية إندونيسية',
    'PHP' => 'بيزو فلبيني',
    'VND' => 'دونغ فيتنامي',
    'CHF' => 'فرنك سويسري',
    'SEK' => 'كرونة سويدية',
    'NOK' => 'كرونة نرويجية',
    'DKK' => 'كرونة دنماركية',
    'PLN' => 'زلوتي بولندي',
    'TRY' => 'ليرة تركية',
    'ILS' => 'شيكل إسرائيلي',
    'NGN' => 'نايرا نيجيرية',
    'KES' => 'شلن كيني',
    'ARS' => 'بيزو أرجنتيني',
    'CLP' => 'بيزو تشيلي',
    'COP' => 'بيزو كولومبي',
    'PEN' => 'سول بيروفي',
    'VES' => 'بوليفار فنزويلي',
    'PKR' => 'روبية باكستانية',
    'BDT' => 'تاكا بنغلاديشية',
    'LKR' => 'روبية سريلانكية',
    'NPR' => 'روبية نيبالية',
    'MMK' => 'كيات ميانماري',
    'KZT' => 'تينغ كازاخستاني',
    'UZS' => 'سوم أوزبكي',
    'IRR' => 'ريال إيراني',
    'AFN' => 'أفغاني أفغاني',
    'ETB' => 'بير إثيوبي',
    'GHS' => 'سيدي غاني',
    'XOF' => 'فرنك غرب أفريقي',
    'TZS' => 'شلن تنزاني',
    'UGX' => 'شلن أوغندي',
    'XAF' => 'فرنك وسط أفريقي',
    'CDF' => 'فرنك كونغولي',
    'AOA' => 'كوانزا أنغولي',
    'MZN' => 'متكال موزمبيقي',
    'ZWL' => 'دولار زيمبابوي',
    'MGA' => 'أرياري مدغشقري',
    'MUR' => 'روبية موريشية',
    'ISK' => 'كرونة آيسلندية',
    'HRK' => 'كونا كرواتية',
    'HUF' => 'فورنت مجري',
    'CZK' => 'كرونة تشيكية',
    'RON' => 'ليو روماني',
    'BGN' => 'ليف بلغاري',
    'RSD' => 'دينار صربي',
    'UAH' => 'هريفنيا أوكرانية',
    'BYN' => 'روبل بيلاروسي',
    'MDL' => 'ليو مولدوفي',
    'GEL' => 'لاري جورجي',
    'AMD' => 'درام أرميني',
    'AZN' => 'مانات أذربيجاني',
    'KGS' => 'سوم قيرغيزستاني',
    'TJS' => 'سوموني طاجيكستاني',
    'TMT' => 'مانات تركمانستاني',
    'MNT' => 'توجروغ منغولي',
    'LAK' => 'كيب لاوسي',
    'KHR' => 'رييل كمبودي',
    'BTN' => 'نولترم بوتاني',
    'MVR' => 'روفية مالديفية',
    'BND' => 'دولار بروني',
    'PGK' => 'كينا بابوا غينيا الجديدة',
    'FJD' => 'دولار فيجي',
    'SBD' => 'دولار جزر سليمان',
    'VUV' => 'فاتو فانواتي',
    'WST' => 'تالا ساموي',
    'TOP' => 'بانغا تونغاني',
    'BSD' => 'دولار باهامي',
    'BBD' => 'دولار بربادوسي',
    'JMD' => 'دولار جامايكي',
    'HTG' => 'غورد هايتي',
    'DOP' => 'بيزو دومينيكاني',
    'CUP' => 'بيزو كوبي',
    'TTD' => 'دولار ترينيداد وتوباغو',
    'GYD' => 'دولار غياني',
    'SRD' => 'دولار سورينامي',
    'BZD' => 'دولار بليزي',
    'CRC' => 'عولون كوستاريكي',
    'GTQ' => 'كتزال غواتيمالي',
    'HNL' => 'لمبيرا هندوراسي',
    'NIO' => 'كوردوبا نيكاراغوا',
    'PAB' => 'بالبوا بنمي',
    'PYG' => 'غواراني باراغواي',
    'UYU' => 'بيزو أوروغواي',
    'BOB' => 'بوليفيانو بوليفي',
    'XPF' => 'فرنك بولينيزي',
];
   // أسماء العملات
$currency_names = [
    // الدول العربية
    'AED' => 'درهم إماراتي',         // الإمارات
    'BHD' => 'دينار بحريني',         // البحرين
    'DJF' => 'فرنك جيبوتي',         // جيبوتي
    'DZD' => 'دينار جزائري',        // الجزائر
    'EGP' => 'جنيه مصري',           // مصر
    'IQD' => 'دينار عراقي',         // العراق
    'JOD' => 'دينار أردني',         // الأردن
    'KMF' => 'فرنك قمري',           // جزر القمر
    'KWD' => 'دينار كويتي',         // الكويت
    'LBP' => 'ليرة لبنانية',        // لبنان
    'LYD' => 'دينار ليبي',          // ليبيا
    'MAD' => 'درهم مغربي',          // المغرب
    'MRU' => 'أوقية موريتانية',     // موريتانيا
    'OMR' => 'ريال عماني',          // عمان
    'QAR' => 'ريال قطري',           // قطر
    'SAR' => 'ريال سعودي',          // السعودية
    'SDG' => 'جنيه سوداني',         // السودان
    'SOS' => 'شلن صومالي',         // الصومال
    'SYP' => 'ليرة سورية',          // سوريا
    'TND' => 'دينار تونسي',         // تونس
    'YER' => 'ريال يمني',           // اليمن
    'ILS' => 'شيكل إسرائيلي',       // فلسطين، إسرائيل

    // أوروبا
    'EUR' => 'يورو',                 // ألمانيا، فرنسا، إيطاليا، إسبانيا، هولندا، بلجيكا، البرتغال، النمسا، فنلندا، أيرلندا، قبرص، مالطا، لوكسمبورغ، اليونان، إستونيا، لاتفيا، ليتوانيا، سلوفاكيا، سلوفينيا، الجبل الأسود، كوسوفو، أندورا، سان مارينو، الفاتيكان، موناكو، غويانا الفرنسية، ريونيون، مايوت، جزر أولاند، الأراضي الفرنسية الجنوبية
    'GBP' => 'جنيه إسترليني',       // المملكة المتحدة، جيرسي، جزيرة مان، غيرنسي
    'CHF' => 'فرنك سويسري',         // سويسرا، ليختنشتاين
    'DKK' => 'كرونة دنماركية',      // الدنمارك، غرينلاند، جزر فارو
    'SEK' => 'كرونة سويدية',        // السويد
    'NOK' => 'كرونة نرويجية',       // النرويج، سفالبارد وجان ماين، جزيرة بوفيه
    'PLN' => 'زلوتي بولندي',        // بولندا
    'CZK' => 'كرونة تشيكية',        // التشيك
    'HUF' => 'فورنت مجري',          // المجر
    'RON' => 'ليو روماني',          // رومانيا
    'BGN' => 'ليف بلغاري',          // بلغاريا
    'RSD' => 'دينار صربي',          // صربيا
    'UAH' => 'هريفنيا أوكرانية',    // أوكرانيا
    'BYN' => 'روبل بيلاروسي',       // بيلاروسيا
    'MDL' => 'ليو مولدوفي',         // مولدوفا
    'ALL' => 'ليك ألباني',          // ألبانيا
    'BAM' => 'مارك بوسني',          // البوسنة والهرسك
    'MKD' => 'دينار مقدوني',        // مقدونيا الشمالية
    'GEL' => 'لاري جورجي',          // جورجيا
    'ISK' => 'كرونة آيسلندية',      // آيسلندا
    'GIP' => 'جنيه جبل طارق',       // جبل طارق

    // أمريكا الشمالية
    'USD' => 'دولار أمريكي',        // الولايات المتحدة، السلفادور، الإكوادور، تيمور الشرقية، بالاو، ميكرونيسيا، جزر مارشال، بورتو ريكو، جزر العذراء الأمريكية، جزر العذراء البريطانية، جزر توركس وكايكوس، ساموا الأمريكية، غوام، جزر ماريانا الشمالية، بونير وسانت يوستاتيوس وسابا، جزر الولايات المتحدة الصغيرة النائية
    'CAD' => 'دولار كندي',          // كندا
    'MXN' => 'بيزو مكسيكي',         // المكسيك
    'BMD' => 'دولار برمودي',        // برمودا
    'KYD' => 'دولار جزر كايمان',    // جزر كايمان
    'CRC' => 'كولون كوستاريكي',     // كوستاريكا
    'CUP' => 'بيزو كوبي',           // كوبا
    'DOP' => 'بيزو دومينيكاني',     // جمهورية الدومينيكان
    'GTQ' => 'كتزال غواتيمالي',     // غواتيمالا
    'HNL' => 'لمبيرا هندوراسي',     // هندوراس
    'NIO' => 'كوردوبا نيكاراغوا',   // نيكاراغوا
    'PAB' => 'بالبوا بنمي',         // بنما
    'BSD' => 'دولار باهامي',        // جزر البهاما
    'BBD' => 'دولار بربادوسي',      // بربادوس
    'BZD' => 'دولار بليزي',         // بليز
    'JMD' => 'دولار جامايكي',       // جامايكا
    'TTD' => 'دولار ترينيداد وتوباغو', // ترينيداد وتوباغو
    'XCD' => 'دولار شرق الكاريبي',   // أنتيغوا وباربودا، دومينيكا، غرينادا، سانت كيتس ونيفيس، سانت لوسيا، سانت فنسنت والغرينادين، أنغويلا، مونتسيرات
    'HTG' => 'غورد هايتي',          // هايتي

    // أمريكا الجنوبية
    'ARS' => 'بيزو أرجنتيني',       // الأرجنتين
    'BOB' => 'بوليفيانو بوليفي',    // بوليفيا
    'BRL' => 'ريال برازيلي',        // البرازيل
    'CLP' => 'بيزو تشيلي',          // تشيلي
    'COP' => 'بيزو كولومبي',        // كولومبيا
    'GYD' => 'دولار غياني',         // غيانا
    'PYG' => 'غواراني باراغواي',    // باراغواي
    'PEN' => 'سول بيروفي',          // بيرو
    'SRD' => 'دولار سورينامي',      // سورينام
    'UYU' => 'بيزو أوروغواي',       // أوروغواي
    'VES' => 'بوليفار فنزويلي',     // فنزويلا
    'FKP' => 'جنيه جزر فوكلاند',    // جزر فوكلاند

    // آسيا
    'CNY' => 'يوان صيني',           // الصين
    'JPY' => 'ين ياباني',           // اليابان
    'INR' => 'روبية هندية',         // الهند
    'KRW' => 'وون كوري جنوبي',      // كوريا الجنوبية
    'KPW' => 'وون كوري شمالي',      // كوريا الشمالية
    'SGD' => 'دولار سنغافوري',      // سنغافورة
    'MYR' => 'رينغيت ماليزي',       // ماليزيا
    'THB' => 'بخت تايلاندي',        // تايلاند
    'IDR' => 'روبية إندونيسية',     // إندونيسيا
    'PHP' => 'بيزو فلبيني',         // الفلبين
    'VND' => 'دونغ فيتنامي',        // فيتنام
    'PKR' => 'روبية باكستانية',     // باكستان
    'BDT' => 'تاكا بنغلاديشية',     // بنغلاديش
    'LKR' => 'روبية سريلانكية',     // سريلانكا
    'NPR' => 'روبية نيبالية',       // نيبال
    'MMK' => 'كيات ميانماري',       // ميانمار
    'KZT' => 'تينغ كازاخستاني',     // كازاخستان
    'UZS' => 'سوم أوزبكي',          // أوزبكستان
    'KGS' => 'سوم قيرغيزستاني',     // قيرغيزستان
    'TJS' => 'سوموني طاجيكستاني',   // طاجيكستان
    'TMT' => 'مانات تركمانستاني',   // تركمانستان
    'MNT' => 'توغروغ منغولي',       // منغوليا
    'LAK' => 'كيب لاوسي',           // لاوس
    'KHR' => 'رييل كمبودي',         // كمبوديا
    'BTN' => 'نولترم بوتاني',       // بوتان
    'MVR' => 'روفية مالديفية',      // جزر المالديف
    'BND' => 'دولار بروني',         // بروناي
    'TRY' => 'ليرة تركية',          // تركيا
    'IRR' => 'ريال إيراني',         // إيران
    'AFN' => 'أفغاني أفغاني',       // أفغانستان
    'AMD' => 'درام أرميني',         // أرمينيا
    'AZN' => 'مانات أذربيجاني',     // أذربيجان
    'HKD' => 'دولار هونغ كونغ',     // هونغ كونغ
    'MOP' => 'باتاكا ماكاو',        // ماكاو
    'TWD' => 'دولار تايواني',       // تايوان

    // أفريقيا
    'ZAR' => 'راند جنوب أفريقي',    // جنوب أفريقيا
    'NGN' => 'نايرا نيجيرية',       // نيجيريا
    'KES' => 'شلن كيني',            // كينيا
    'ETB' => 'بير إثيوبي',          // إثيوبيا
    'GHS' => 'سيدي غاني',           // غانا
    'XOF' => 'فرنك غرب أفريقي',     // ساحل العاج، السنغال، غينيا بيساو، مالي، النيجر، بوركينا فاسو، توغو، بنين
    'XAF' => 'فرنك وسط أفريقي',     // الكاميرون، الكونغو الديمقراطية، الغابون، جمهورية الكونغو، تشاد، جمهورية أفريقيا الوسطى، غينيا الاستوائية
    'TZS' => 'شلن تنزاني',          // تنزانيا
    'UGX' => 'شلن أوغندي',          // أوغندا
    'CDF' => 'فرنك كونغولي',        // الكونغو الديمقراطية
    'AOA' => 'كوانزا أنغولي',       // أنغولا
    'MZN' => 'متكال موزمبيقي',      // موزمبيق
    'ZWL' => 'دولار زيمبابوي',      // زيمبابوي
    'MGA' => 'أرياري مدغشقري',      // مدغشقر
    'MUR' => 'روبية موريشية',       // موريشيوس
    'ZMW' => 'كواتشا زامبية',       // زامبيا
    'BWP' => 'بولا بوتسواني',       // بوتسوانا
    'NAD' => 'دولار ناميبي',        // ناميبيا
    'RWF' => 'فرنك رواندي',         // رواندا
    'BIF' => 'فرنك بوروندي',        // بوروندي
    'SSP' => 'جنيه جنوب سوداني',    // جنوب السودان
    'ERN' => 'ناكفا إريتري',        // إريتريا
    'SZL' => 'ليلانغيني سوازي',     // إسواتيني
    'LSL' => 'لوتي ليسوتو',         // ليسوتو
    'GMD' => 'دلاسي غامبي',         // غامبيا
    'GNF' => 'فرنك غيني',           // غينيا
    'LRD' => 'دولار ليبيري',        // ليبيريا
    'CVE' => 'إسكودو الرأس الأخضر',  // الرأس الأخضر
    'SCR' => 'روبية سيشلية',        // سيشل
    'SLE' => 'ليون سيراليوني',      // سيراليون
    'STN' => 'دوبرا ساو تومي',      // ساو تومي وبرينسيب

    // أوقيانوسيا
    'AUD' => 'دولار أسترالي',       // أستراليا، كيريباتي، ناورو، توفالو، جزر كوكوس، جزيرة الكريسماس، جزيرة نورفولك، جزر هيرد وماكدونالد
    'NZD' => 'دولار نيوزيلندي',     // نيوزيلندا، جزر كوك، نيوي، توكيلاو، جزر بيتكيرن
    'FJD' => 'دولار فيجي',          // فيجي
    'PGK' => 'كينا بابوا غينيا الجديدة', // بابوا غينيا الجديدة
    'SBD' => 'دولار جزر سليمان',    // جزر سليمان
    'VUV' => 'فاتو فانواتي',        // فانواتو
    'WST' => 'تالا ساموي',          // ساموا
    'TOP' => 'بانغا تونغاني',       // تونغا
    'XPF' => 'فرنك بولينيزي',       // بولينيزيا الفرنسية، كاليدونيا الجديدة، واليس وفوتونا

    // أقاليم أخرى
    'SHP' => 'جنيه سانت هيلينا',    // سانت هيلينا
];

$carat_labels = [
    '24k' => 'ذهب عيار 24',
    '22k' => 'ذهب عيار 22',
    '21k' => 'ذهب عيار 21',
    '18k' => 'ذهب عيار 18',
    '14k' => 'ذهب عيار 14',
    '12k' => 'ذهب عيار 12',
    '24k_oz' => 'أونصة الذهب',
    'gold_pound' => 'جنيه الذهب'

];

$country_map = [
    // الدول العربية
    'dz' => ['currency' => 'DZD', 'name' => 'الجزائر'],
    'bh' => ['currency' => 'BHD', 'name' => 'البحرين'],
    'eg' => ['currency' => 'EGP', 'name' => 'مصر'],
    'iq' => ['currency' => 'IQD', 'name' => 'العراق'],
    'jo' => ['currency' => 'JOD', 'name' => 'الأردن'],
    'kw' => ['currency' => 'KWD', 'name' => 'الكويت'],
    'lb' => ['currency' => 'LBP', 'name' => 'لبنان'],
    'ly' => ['currency' => 'LYD', 'name' => 'ليبيا'],
    'mr' => ['currency' => 'MRU', 'name' => 'موريتانيا'],
    'ma' => ['currency' => 'MAD', 'name' => 'المغرب'],
    'om' => ['currency' => 'OMR', 'name' => 'عمان'],
    'ps' => ['currency' => 'ILS', 'name' => 'فلسطين'],
    'qa' => ['currency' => 'QAR', 'name' => 'قطر'],
    'sa' => ['currency' => 'SAR', 'name' => 'السعودية'],
    'so' => ['currency' => 'SOS', 'name' => 'الصومال'],
    'sd' => ['currency' => 'SDG', 'name' => 'السودان'],
    'sy' => ['currency' => 'SYP', 'name' => 'سوريا'],
    'tn' => ['currency' => 'TND', 'name' => 'تونس'],
    'ae' => ['currency' => 'AED', 'name' => 'الإمارات'],
    'ye' => ['currency' => 'YER', 'name' => 'اليمن'],
    'km' => ['currency' => 'KMF', 'name' => 'جزر القمر'],
    'dj' => ['currency' => 'DJF', 'name' => 'جيبوتي'],
    
    // باقي دول العالم
    'us' => ['currency' => 'USD', 'name' => 'الولايات المتحدة'],
    'gb' => ['currency' => 'GBP', 'name' => 'بريطانيا'],
    'ca' => ['currency' => 'CAD', 'name' => 'كندا'],
    'au' => ['currency' => 'AUD', 'name' => 'أستراليا'],
    'nz' => ['currency' => 'NZD', 'name' => 'نيوزيلندا'],
    'eu' => ['currency' => 'EUR', 'name' => 'أوروبا'],
    'ch' => ['currency' => 'CHF', 'name' => 'سويسرا'],
    'no' => ['currency' => 'NOK', 'name' => 'النرويج'],
    'se' => ['currency' => 'SEK', 'name' => 'السويد'],
    'dk' => ['currency' => 'DKK', 'name' => 'الدنمارك'],
    'is' => ['currency' => 'ISK', 'name' => 'آيسلندا'],
    'pl' => ['currency' => 'PLN', 'name' => 'بولندا'],
    'cz' => ['currency' => 'CZK', 'name' => 'التشيك'],
    'hu' => ['currency' => 'HUF', 'name' => 'المجر'],
    'ro' => ['currency' => 'RON', 'name' => 'رومانيا'],
    'bg' => ['currency' => 'BGN', 'name' => 'بلغاريا'],
    'hr' => ['currency' => 'HRK', 'name' => 'كرواتيا'],
    'rs' => ['currency' => 'RSD', 'name' => 'صربيا'],
    'al' => ['currency' => 'ALL', 'name' => 'ألبانيا'],
    'mk' => ['currency' => 'MKD', 'name' => 'مقدونيا الشمالية'],
    'ba' => ['currency' => 'BAM', 'name' => 'البوسنة والهرسك'],
    'ge' => ['currency' => 'GEL', 'name' => 'جورجيا'],
    'ua' => ['currency' => 'UAH', 'name' => 'أوكرانيا'],
    'by' => ['currency' => 'BYN', 'name' => 'بيلاروسيا'],
    'md' => ['currency' => 'MDL', 'name' => 'مولدوفا'],
    'ru' => ['currency' => 'RUB', 'name' => 'روسيا'],
    'cn' => ['currency' => 'CNY', 'name' => 'الصين'],
    'jp' => ['currency' => 'JPY', 'name' => 'اليابان'],
    'in' => ['currency' => 'INR', 'name' => 'الهند'],
    'kr' => ['currency' => 'KRW', 'name' => 'كوريا الجنوبية'],
    'sg' => ['currency' => 'SGD', 'name' => 'سنغافورة'],
    'my' => ['currency' => 'MYR', 'name' => 'ماليزيا'],
    'th' => ['currency' => 'THB', 'name' => 'تايلاند'],
    'id' => ['currency' => 'IDR', 'name' => 'إندونيسيا'],
    'ph' => ['currency' => 'PHP', 'name' => 'الفلبين'],
    'vn' => ['currency' => 'VND', 'name' => 'فيتنام'],
    'mm' => ['currency' => 'MMK', 'name' => 'ميانمار'],
    'kz' => ['currency' => 'KZT', 'name' => 'كازاخستان'],
    'uz' => ['currency' => 'UZS', 'name' => 'أوزبكستان'],
    'tj' => ['currency' => 'TJS', 'name' => 'طاجيكستان'],
    'tm' => ['currency' => 'TMT', 'name' => 'تركمانستان'],
    'la' => ['currency' => 'LAK', 'name' => 'لاوس'],
    'kh' => ['currency' => 'KHR', 'name' => 'كمبوديا'],
    'mn' => ['currency' => 'MNT', 'name' => 'منغوليا'],
    'bd' => ['currency' => 'BDT', 'name' => 'بنغلاديش'],
    'pk' => ['currency' => 'PKR', 'name' => 'باكستان'],
    'lk' => ['currency' => 'LKR', 'name' => 'سريلانكا'],
    'np' => ['currency' => 'NPR', 'name' => 'نيبال'],
    'bt' => ['currency' => 'BTN', 'name' => 'بوتان'],
    'mv' => ['currency' => 'MVR', 'name' => 'جزر المالديف'],
    'ir' => ['currency' => 'IRR', 'name' => 'إيران'],
    'af' => ['currency' => 'AFN', 'name' => 'أفغانستان'],
    'za' => ['currency' => 'ZAR', 'name' => 'جنوب أفريقيا'],
    'ng' => ['currency' => 'NGN', 'name' => 'نيجيريا'],
    'ke' => ['currency' => 'KES', 'name' => 'كينيا'],
    'et' => ['currency' => 'ETB', 'name' => 'إثيوبيا'],
    'gh' => ['currency' => 'GHS', 'name' => 'غانا'],
    'ci' => ['currency' => 'XOF', 'name' => 'ساحل العاج'],
    'sn' => ['currency' => 'XOF', 'name' => 'السنغال'],
    'tz' => ['currency' => 'TZS', 'name' => 'تنزانيا'],
    'ug' => ['currency' => 'UGX', 'name' => 'أوغندا'],
    'cm' => ['currency' => 'XAF', 'name' => 'الكاميرون'],
    'cd' => ['currency' => 'CDF', 'name' => 'الكونغو الديمقراطية'],
    'ao' => ['currency' => 'AOA', 'name' => 'أنغولا'],
    'mz' => ['currency' => 'MZN', 'name' => 'موزمبيق'],
    'zw' => ['currency' => 'ZWL', 'name' => 'زيمبابوي'],
    'mg' => ['currency' => 'MGA', 'name' => 'مدغشقر'],
    'mu' => ['currency' => 'MUR', 'name' => 'موريشيوس'],
    'mx' => ['currency' => 'MXN', 'name' => 'المكسيك'],
    'br' => ['currency' => 'BRL', 'name' => 'البرازيل'],
    'ar' => ['currency' => 'ARS', 'name' => 'الأرجنتين'],
    'cl' => ['currency' => 'CLP', 'name' => 'تشيلي'],
    'co' => ['currency' => 'COP', 'name' => 'كولومبيا'],
    'pe' => ['currency' => 'PEN', 'name' => 'بيرو'],
    've' => ['currency' => 'VES', 'name' => 'فنزويلا'],
    'py' => ['currency' => 'PYG', 'name' => 'باراغواي'],
    'uy' => ['currency' => 'UYU', 'name' => 'أوروغواي'],
    'bo' => ['currency' => 'BOB', 'name' => 'بوليفيا'],
    'gt' => ['currency' => 'GTQ', 'name' => 'غواتيمالا'],
    'hn' => ['currency' => 'HNL', 'name' => 'هندوراس'],
    'ni' => ['currency' => 'NIO', 'name' => 'نيكاراغوا'],
    'cr' => ['currency' => 'CRC', 'name' => 'كوستاريكا'],
    'pa' => ['currency' => 'PAB', 'name' => 'بنما'],
    'bs' => ['currency' => 'BSD', 'name' => 'جزر البهاما'],
    'jm' => ['currency' => 'JMD', 'name' => 'جامايكا'],
    'ht' => ['currency' => 'HTG', 'name' => 'هايتي'],
    'do' => ['currency' => 'DOP', 'name' => 'جمهورية الدومينيكان'],
    'tt' => ['currency' => 'TTD', 'name' => 'ترينيداد وتوباغو'],
    'gy' => ['currency' => 'GYD', 'name' => 'غيانا'],
    'sr' => ['currency' => 'SRD', 'name' => 'سورينام'],
    'bz' => ['currency' => 'BZD', 'name' => 'بليز'],
    'fj' => ['currency' => 'FJD', 'name' => 'فيجي'],
    'pg' => ['currency' => 'PGK', 'name' => 'بابوا غينيا الجديدة'],
    'sb' => ['currency' => 'SBD', 'name' => 'جزر سليمان'],
    'vu' => ['currency' => 'VUV', 'name' => 'فانواتو'],
    'ws' => ['currency' => 'WST', 'name' => 'ساموا'],
    'to' => ['currency' => 'TOP', 'name' => 'تونغا'],
    'ki' => ['currency' => 'AUD', 'name' => 'كيريباتي'],
    'nr' => ['currency' => 'AUD', 'name' => 'ناورو'],
    'tv' => ['currency' => 'AUD', 'name' => 'توفالو'],
    'pw' => ['currency' => 'USD', 'name' => 'بالاو'],
    'fm' => ['currency' => 'USD', 'name' => 'ميكرونيسيا'],
    'mh' => ['currency' => 'USD', 'name' => 'جزر مارشال'],
];



// تعطيل شريط الإدارة (admin bar) لجميع المستخدمين
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  show_admin_bar(false);
}

// Walker مخصص للقائمة لدعم Bootstrap
class Bootstrap_Nav_Walker extends Walker_Nav_Menu {
    // إنشاء عنصر في القائمة
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if (!empty($item->classes)) {
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            
            // تحديد فئة العنصر الحالي
            $active_class = in_array('current-menu-item', $classes) ? ' active' : '';
            
            // إضافة فئة nav-item لكل عنصر
            $class_names = ' class="nav-item' . $active_class . '"';
        } else {
            $class_names = ' class="nav-item"';
        }
        
        // بناء عنصر القائمة
        $output .= '<li' . $class_names . '>';
        
        // الصفات القياسية للرابط
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // إضافة صنف nav-link
        $atts['class'] = 'nav-link';
        
        // بناء سلسلة الصفات
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        // بناء الرابط
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        
        // نص الرابط
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        
        // تحقق إذا كان عنصر تغيير اللغة
        if (strpos($item->title, 'English') !== false || strpos($item->title, 'العربية') !== false) {
            $item_output = '<a' . $attributes . ' style="color:inherit;">';
            $item_output .= '<div class="col-12 p-0 text-center">';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</div>';
        }
        
        // تحقق إذا كان زر تحميل التطبيق
        if (strpos($item->title, 'تحميل التطبيق') !== false) {
            $item_output = '<a' . $attributes . ' data-fancybox="" data-src="#download-app" class="btn font-1 px-0 din" style="color: #fff;background: #fca309;padding: 2px 6px 4px;cursor: pointer;width:122px;height:40px;margin: auto 0px;">';
            $item_output .= '<span class="fas fa-paper-plane mx-1"></span> ';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= $item_output;
    }
    
    // دالة عند انتهاء العنصر
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        // إذا كان زر تحميل التطبيق
        if (strpos($item->title, 'تحميل التطبيق') !== false) {
            $output .= "\n";
            return;
        }
        $output .= "</li>\n";
    }
    
    // دالة نسخ احتياطية إذا لم يتم العثور على القائمة
    function custom_nav_fallback() {
        echo '<ul class="navbar-nav mb-2 mb-lg-0 top-navbar px-0 me-auto">';
        echo '<li class="nav-item"><a class="nav-link" href="'.home_url().'">الرئيسية</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="'.home_url('/countries').'">الدول</a></li>';
        echo '</ul>';
    }
}
// تسجيل قوائم الملاحة
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('القائمة الرئيسية'),
            'footer-menu' => __('قائمة التذييل')
        )
    );
}
add_action('init', 'register_my_menus');

// إضافة دعم الأزرار المخصصة في القائمة
function custom_nav_menu_item_class($classes, $item) {
    // تحقق إذا كان العنصر هو زر التطبيق
    if (strpos($item->title, 'تحميل التطبيق') !== false) {
        $classes[] = 'menu-button';
    }
    
    // تحقق إذا كان العنصر هو زر تغيير اللغة
    if (strpos($item->title, 'English') !== false || strpos($item->title, 'العربية') !== false) {
        $classes[] = 'language-switcher';
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_menu_item_class', 10, 2);


// إضافة خيارات التخصيص لزر التطبيق
function goldnow_customizer_app_button($wp_customize) {
    // إضافة قسم جديد
    $wp_customize->add_section('app_button_section', array(
        'title'       => 'زر التطبيق',
        'priority'    => 30,
        'description' => 'تخصيص زر تحميل/تثبيت التطبيق',
    ));

    // إضافة إعداد لنص الزر
    $wp_customize->add_setting('app_button_text', array(
        'default'           => 'تحميل التطبيق',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم لنص الزر
    $wp_customize->add_control('app_button_text', array(
        'label'    => 'نص الزر',
        'section'  => 'app_button_section',
        'type'     => 'text',
        'priority' => 10,
    ));

    // إضافة إعداد لوظيفة الزر
    $wp_customize->add_setting('app_button_function', array(
        'default'           => 'modal',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم لوظيفة الزر
    $wp_customize->add_control('app_button_function', array(
        'label'    => 'وظيفة الزر',
        'section'  => 'app_button_section',
        'type'     => 'select',
        'choices'  => array(
            'link'  => 'فتح رابط',
            'modal' => 'إظهار مودال',
            'pwa'   => 'تثبيت PWA',
        ),
        'priority' => 20,
    ));

    // إضافة إعداد للرابط (في حالة اختيار "فتح رابط")
    $wp_customize->add_setting('app_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم للرابط
    $wp_customize->add_control('app_button_url', array(
        'label'           => 'رابط الزر',
        'section'         => 'app_button_section',
        'type'            => 'url',
        'priority'        => 30,
        'active_callback' => 'is_app_button_link_function',
    ));

    // إضافة إعداد لمعرف المودال (في حالة اختيار "إظهار مودال")
    $wp_customize->add_setting('app_button_modal_id', array(
        'default'           => 'download-app',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم لمعرف المودال
    $wp_customize->add_control('app_button_modal_id', array(
        'label'           => 'معرف المودال (بدون #)',
        'section'         => 'app_button_section',
        'type'            => 'text',
        'priority'        => 40,
        'active_callback' => 'is_app_button_modal_function',
    ));

    // إضافة إعداد لمعرف دالة PWA (في حالة اختيار "تثبيت PWA")
    $wp_customize->add_setting('app_button_pwa_function', array(
        'default'           => 'installPWA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم لمعرف دالة PWA
    $wp_customize->add_control('app_button_pwa_function', array(
        'label'           => 'اسم دالة تثبيت PWA',
        'section'         => 'app_button_section',
        'type'            => 'text',
        'priority'        => 50,
        'active_callback' => 'is_app_button_pwa_function',
    ));

    // إضافة إعداد للون خلفية الزر
    $wp_customize->add_setting('app_button_bg_color', array(
        'default'           => '#fca309',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم للون خلفية الزر
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'app_button_bg_color', array(
        'label'    => 'لون خلفية الزر',
        'section'  => 'app_button_section',
        'priority' => 60,
    )));

    // إضافة إعداد للون نص الزر
    $wp_customize->add_setting('app_button_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم للون نص الزر
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'app_button_text_color', array(
        'label'    => 'لون نص الزر',
        'section'  => 'app_button_section',
        'priority' => 70,
    )));

    // إضافة إعداد لإظهار/إخفاء الزر
    $wp_customize->add_setting('app_button_display', array(
        'default'           => true,
        'sanitize_callback' => 'goldnow_sanitize_checkbox',
        'transport'         => 'refresh',
    ));

    // إضافة عنصر التحكم لإظهار/إخفاء الزر
    $wp_customize->add_control('app_button_display', array(
        'label'    => 'إظهار زر التطبيق',
        'section'  => 'app_button_section',
        'type'     => 'checkbox',
        'priority' => 5,
    ));
}
add_action('customize_register', 'goldnow_customizer_app_button');

// دوال التحقق من حالة وظيفة الزر (Active Callbacks)
function is_app_button_link_function() {
    return get_theme_mod('app_button_function') === 'link';
}

function is_app_button_modal_function() {
    return get_theme_mod('app_button_function') === 'modal';
}

function is_app_button_pwa_function() {
    return get_theme_mod('app_button_function') === 'pwa';
}

// دالة لتنظيف قيمة مربع الاختيار (Checkbox)
function goldnow_sanitize_checkbox($checked) {
    return (isset($checked) && true == $checked) ? true : false;
}




// إضافة إعدادات تخصيص الدول المعروضة
// إضافة إعدادات تخصيص الدول المعروضة
function goldnow_countries_customizer($wp_customize) {
    // إضافة قسم جديد للدول المعروضة
    $wp_customize->add_section('countries_display_section', array(
        'title'       => 'قائمة الدول المعروضة',
        'priority'    => 30,
        'description' => 'تحديد الدول التي سيتم عرضها في صفحة الدول المدعومة',
    ));

    // إضافة إعداد لعنوان قسم الدول
    $wp_customize->add_setting('countries_section_title', array(
        'default'           => 'الدول المدعومة',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('countries_section_title', array(
        'label'    => 'عنوان قسم الدول',
        'section'  => 'countries_display_section',
        'type'     => 'text',
        'priority' => 10,
    ));

    // إضافة إعداد للنص الفرعي
    $wp_customize->add_setting('countries_section_subtitle', array(
        'default'           => 'تابع آخر أسعار الذهب في دولتك',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('countries_section_subtitle', array(
        'label'    => 'النص الفرعي لقسم الدول',
        'section'  => 'countries_display_section',
        'type'     => 'text',
        'priority' => 15,
    ));

    // الحصول على قائمة بجميع الدول
    $countries = get_terms(array(
        'taxonomy'   => 'countries',
        'hide_empty' => false,
    ));

    // إذا كانت هناك دول، نضيف خيار لكل دولة
    if (!is_wp_error($countries) && !empty($countries)) {
        foreach ($countries as $country) {
            $country_code = get_term_meta($country->term_id, 'country_code', true);
            
            if (!empty($country_code)) {
                $wp_customize->add_setting('show_country_' . $country_code, array(
                    'default'           => false, // تغيير من true إلى false للبدء بدون تحديد
                    'sanitize_callback' => 'goldnow_sanitize_checkbox',
                ));

                $wp_customize->add_control('show_country_' . $country_code, array(
                    'label'    => 'عرض ' . $country->name,
                    'section'  => 'countries_display_section',
                    'type'     => 'checkbox',
                    'priority' => 20,
                ));
            }
        }
    }
}
add_action('customize_register', 'goldnow_countries_customizer');



// إضافة ترتيب مخصص للدول
function goldnow_country_order_customizer($wp_customize) {
    // إضافة إعدادات ترتيب الدول
    $countries = get_terms(array(
        'taxonomy'   => 'countries',
        'hide_empty' => false,
    ));
    
    if (!is_wp_error($countries) && !empty($countries)) {
        foreach ($countries as $country) {
            $country_code = get_term_meta($country->term_id, 'country_code', true);
            
            if (!empty($country_code) && get_theme_mod('show_country_' . $country_code, true)) {
                // الحصول على ترتيب الدولة
                $order = get_theme_mod('country_order_' . $country_code, 10);
                
                // تخزين الدولة مع ترتيبها
                $ordered_countries[] = array(
                    'country' => $country,
                    'code'    => $country_code,
                    'order'   => $order
                );
            }
        }
    }
}
add_action('customize_register', 'goldnow_country_order_customizer');






// إضافة قسم الأسئلة الشائعة إلى المخصص
function goldnow_faq_customizer($wp_customize) {
    // إضافة قسم الأسئلة الشائعة
    $wp_customize->add_section('faq_section', array(
        'title'       => 'الأسئلة الشائعة',
        'priority'    => 40,
        'description' => 'تخصيص قسم الأسئلة الشائعة في الموقع. يمكنك استخدام الأكواد المختصرة التالية: 
        <br><strong>{country}</strong> - اسم الدولة (مثل: مصر)
        <br><strong>{country_code}</strong> - رمز الدولة (مثل: eg)
        <br><strong>{country_id}</strong> - معرف الدولة في قاعدة البيانات
        <br><strong>{country_flag}</strong> - صورة علم الدولة
        <br><strong>{current_date}</strong> - التاريخ الحالي (مثل: 2025-03-20)
        <br><strong>{current_time}</strong> - الوقت الحالي (مثل: 11:21)
        <br><strong>{current_datetime}</strong> - التاريخ والوقت الحالي (مثل: 2025-03-20 11:21)',
    ));

    // إضافة إعداد لعنوان القسم
    $wp_customize->add_setting('faq_title', array(
        'default'           => 'الأسئلة الشائعة',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('faq_title', array(
        'label'    => 'عنوان القسم',
        'section'  => 'faq_section',
        'type'     => 'text',
        'priority' => 10,
    ));

    // إضافة إعداد للوصف
    $wp_customize->add_setting('faq_description', array(
        'default'           => 'نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('faq_description', array(
        'label'    => 'وصف القسم',
        'section'  => 'faq_section',
        'type'     => 'textarea',
        'priority' => 15,
    ));

    // إضافة إعداد لعدد الأسئلة
    $wp_customize->add_setting('faq_count', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('faq_count', array(
        'label'       => 'عدد الأسئلة',
        'description' => 'حدد عدد الأسئلة التي تريد إضافتها',
        'section'     => 'faq_section',
        'type'        => 'number',
        'priority'    => 20,
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 20,
            'step' => 1,
        ),
    ));

    // استرجاع عدد الأسئلة المحددة
    $faq_count = get_theme_mod('faq_count', 5);

    // إضافة حقول لكل سؤال وجواب
    for ($i = 1; $i <= $faq_count; $i++) {
        // إعداد السؤال
        $wp_customize->add_setting('faq_question_' . $i, array(
            'default'           => 'السؤال ' . $i,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('faq_question_' . $i, array(
            'label'    => 'السؤال ' . $i,
            'section'  => 'faq_section',
            'type'     => 'text',
            'priority' => 30 + ($i * 10),
        ));

        // إعداد الجواب
        $wp_customize->add_setting('faq_answer_' . $i, array(
            'default'           => 'الجواب ' . $i,
            'sanitize_callback' => 'wp_kses_post', // نسمح بالتنسيق HTML البسيط
        ));

        $wp_customize->add_control('faq_answer_' . $i, array(
            'label'    => 'الجواب ' . $i,
            'section'  => 'faq_section',
            'type'     => 'textarea',
            'priority' => 30 + ($i * 10) + 5,
        ));
    }
}
add_action('customize_register', 'goldnow_faq_customizer');

// إضافة جافاسكريبت للتحديث التلقائي عند تغيير عدد الأسئلة
function goldnow_faq_customizer_live_preview() {
    wp_enqueue_script(
        'goldnow-faq-customizer',
        get_template_directory_uri() . '/js/customizer-faq.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'goldnow_faq_customizer_live_preview');


/**
 * دالة لمعالجة الأكواد المختصرة في الأسئلة والأجوبة
 * 
 * تستبدل الأكواد المختصرة مثل {country} بمعلومات الدولة المناسبة
 * 
 * @param string $text النص المحتوي على الأكواد المختصرة
 * @return string النص بعد استبدال الأكواد المختصرة
 */
function goldnow_parse_faq_shortcodes($text) {
    // إذا كان النص فارغاً، إرجاع نفس النص
    if (empty($text)) {
        return $text;
    }
    
    $settings = get_option('infi_gold_manager_settings', []);
    $detection_method = isset($settings['user_country_detection']) ? $settings['user_country_detection'] : 'cloudflare';
    $default_country_code = isset($settings['default_country_code']) ? $settings['default_country_code'] : 'sa';
    
    // التحقق ما إذا كنا في صفحة تصنيف للدول
    $current_term = get_queried_object();
    $country = array();
    
    if (is_tax('countries') && $current_term) {
        // استخدام معلومات الدولة من التصنيف المختار
        $country['name'] = $current_term->name;
        $country['code'] = get_term_meta($current_term->term_id, 'country_code', true);
        $country['id'] = $current_term->term_id;
        $country['flag'] = get_term_meta($current_term->term_id, 'country_flag', true);
        // إذا كان علم الدولة غير متوفر، استخدام الافتراضي
        if (empty($country['flag'])) {
            $country['flag'] = '/flags/' . $country['code'] . '.svg';
        }
    } else {
        // في الصفحة الرئيسية أو أي صفحة أخرى، استخدام الدولة المكتشفة
        $country = get_user_country_info($default_country_code);
    }
    
    // قائمة بالأكواد المختصرة والقيم المقابلة لها
    $shortcodes = array(
        '{country}' => $country['name'],
        '{country_code}' => $country['code'],
        '{country_id}' => $country['id'],
        '{country_flag}' => '<img src="' . $country['flag'] . '" alt="' . $country['name'] . '" style="width: 20px; height: auto;" />',
        '{current_date}' => date('Y-m-d'),
        '{current_time}' => date('H:i'),
        '{current_datetime}' => date('Y-m-d H:i'),
    );
    
    // استبدال كل كود مختصر بالقيمة المناسبة
    foreach ($shortcodes as $code => $value) {
        $text = str_replace($code, $value, $text);
    }
    
    return $text;
}


/**
 * دالة لعرض قسم الأسئلة الشائعة
 * 
 * @param array $args معلمات إضافية (اختيارية)
 * @return string HTML لقسم الأسئلة الشائعة
 */
function goldnow_display_faq($args = array()) {
    // دمج المعلمات الافتراضية مع المعلمات المقدمة
    $args = wp_parse_args($args, array(
        'class' => '',
    ));
    
    // بدء تخزين مؤقت للمخرجات
    ob_start();
    
    // الحصول على إعدادات القسم
    $title = get_theme_mod('faq_title', 'الأسئلة الشائعة');
    $description = get_theme_mod('faq_description', 'نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب.');
    $faq_count = get_theme_mod('faq_count', 5);
    
    // معالجة الأكواد المختصرة في العنوان والوصف
    $title = goldnow_parse_faq_shortcodes($title);
    $description = goldnow_parse_faq_shortcodes($description);
    ?>
    
    <section class="wrapper bg-light <?php echo esc_attr($args['class']); ?>">
      <div class="container py-14 py-md-16">
        <h2 class="display-4 mb-3 text-center faq-title"><?php echo esc_html($title); ?></h2>
        <p class="lead text-center mb-10 px-md-16 px-lg-0 faq-description cls203"><?php echo esc_html($description); ?></p>
        <div class="row">
          <div class="col-lg-12 mb-0">
            <div id="accordion-1" class="accordion-wrapper">
              <?php
              // عرض الأسئلة والأجوبة
              for ($i = 1; $i <= $faq_count; $i++) {
                  $question = get_theme_mod('faq_question_' . $i, 'السؤال ' . $i);
                  $answer = get_theme_mod('faq_answer_' . $i, 'الجواب ' . $i);
                  
                  // معالجة الأكواد المختصرة
                  $question = goldnow_parse_faq_shortcodes($question);
                  $answer = goldnow_parse_faq_shortcodes($answer);
                  
                  // تجاهل الأسئلة الفارغة
                  if (empty(trim($question))) {
                      continue;
                  }
                  
                  $index = $i - 1; // نحتاج إلى تقليل المؤشر بواحد لتتوافق مع HTML
                  ?>
                  <div class="card accordion-item col-lg-12">
                    <div class="card-header p-0" id="accordion-heading-<?php echo $index; ?>">
                      <button class="p-3 collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-<?php echo $index; ?>" aria-expanded="false" aria-controls="accordion-collapse-<?php echo $index; ?>" style="text-align: start">
                        <?php echo esc_html($question); ?>
                      </button>
                    </div>
                    <!-- /.card-header -->
                    <div id="accordion-collapse-<?php echo $index; ?>" class="collapse" aria-labelledby="accordion-heading-<?php echo $index; ?>" data-bs-target="#accordion-1">
                      <div class="card-body">
                        <p><?php echo wp_kses_post($answer); ?></p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.collapse -->
                  </div>
                  <?php
              }
              ?>
            </div>
            <!-- /.accordion-wrapper -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    
    <?php
    // إرجاع المخرجات المخزنة مؤقتًا
    return ob_get_clean();
}




/**
 * إنشاء Shortcode لعرض قسم الأسئلة الشائعة
 */
function goldnow_faq_shortcode($atts) {
    // معالجة المعلمات المرسلة إلى الـ shortcode
    $atts = shortcode_atts(array(
        'class' => '',
    ), $atts, 'goldnow_faq');
    
    // استدعاء دالة العرض
    return goldnow_display_faq($atts);
}
add_shortcode('goldnow_faq', 'goldnow_faq_shortcode');


include(get_template_directory() . '/inc/get_user_country_info.php'); 



// أضف هذا الكود في functions.php للقالب
function gold_now_customize_register($wp_customize) {
    // قسم إعدادات الفوتر
    $wp_customize->add_section('gold_now_footer_options', array(
        'title' => 'إعدادات الفوتر',
        'priority' => 120,
    ));
    
    // إضافة عنوان الموقع في الفوتر
    $wp_customize->add_setting('footer_site_title', array(
        'default' => 'الذهب الآن',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_site_title', array(
        'label' => 'عنوان الموقع في الفوتر',
        'section' => 'gold_now_footer_options',
        'type' => 'text',
    ));
    
    // إضافة وصف الموقع في الفوتر
    $wp_customize->add_setting('footer_site_description', array(
        'default' => 'تابع آخر أسعار الذهب في دولتك',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_site_description', array(
        'label' => 'وصف الموقع في الفوتر',
        'section' => 'gold_now_footer_options',
        'type' => 'textarea',
    ));
    
    // رابط تطبيق أندرويد
    $wp_customize->add_setting('android_app_link', array(
        'default' => 'https://play.google.com/store/apps/details?id=com.goldnow',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('android_app_link', array(
        'label' => 'رابط تطبيق الأندرويد',
        'section' => 'gold_now_footer_options',
        'type' => 'url',
    ));
    
    // رابط تطبيق آيفون
    $wp_customize->add_setting('ios_app_link', array(
        'default' => 'https://apps.apple.com/us/app/اسعار-الذهب-اليوم/id6469338231',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('ios_app_link', array(
        'label' => 'رابط تطبيق الآيفون',
        'section' => 'gold_now_footer_options',
        'type' => 'url',
    ));
    
    // نص حقوق النشر
    $wp_customize->add_setting('copyright_text', array(
        'default' => 'جميع الحقوق محفوظة © الذهب الآن ' . date('Y'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('copyright_text', array(
        'label' => 'نص حقوق النشر',
        'section' => 'gold_now_footer_options',
        'type' => 'text',
    ));
}
add_action('customize_register', 'gold_now_customize_register');

class Footer_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<div><a class="link-body" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></div>';
    }
}

function theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,  // ارتفاع الشعار
        'width'       => 400,  // عرض الشعار
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_setup');


function custom_wp_head_for_rank_math() {
    // إزالة جميع الأكواد الافتراضية من wp_head
    remove_all_actions('wp_head');

    // إعادة إضافة أكواد Rank Math فقط
    if (function_exists('rank_math_the_breadcrumbs')) {
        do_action('rank_math/head');
    }
}
add_action('wp_head', 'custom_wp_head_for_rank_math', 1);





// إضافة قسم الإعلانات إلى لوحة التخصيص (Customizer)
function goldnow_ads_customizer($wp_customize) {
    // إضافة قسم الإعلانات
    $wp_customize->add_section('goldnow_ads_section', array(
        'title'       => 'الإعلانات',
        'priority'    => 30,
        'description' => 'إعدادات الإعلانات في مواقع مختلفة في الصفحة. يمكنك إضافة أكواد إعلانية أو محتوى HTML مخصص.',
    ));

    // إعداد اختيار تفعيل/تعطيل الإعلانات
    $wp_customize->add_setting('goldnow_enable_ads', array(
        'default'           => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('goldnow_enable_ads', array(
        'label'    => 'تفعيل الإعلانات',
        'section'  => 'goldnow_ads_section',
        'type'     => 'checkbox',
        'priority' => 5,
    ));

    // تعريف مواقع الإعلانات
    $ad_locations = array(
        'below_navbar'     => 'اعلان اسفل النافبار مباشرة',
        'below_cards'      => 'اعلان اسفل البطاقات',
        'above_table'      => 'اعلان فوق الجدول',
        'below_table'      => 'اعلان اسفل الجدول',
        'below_global'     => 'اعلان اسفل أسعار الذهب عالمياً',
        'below_countries'  => 'اعلان اسفل الدول المدعومة',
        'below_faq'        => 'اعلان اسفل الأسئلة الشائعة',
        'below_title'      => 'اعلان الصفحة اسفل العنوان',
        'above_article'    => 'اعلان الصفحة فوق المقال',
        'below_article'    => 'اعلان الصفحة اسفل المقال',
       // 'below_calculator' => 'اعلان الصفحة اسفل الحاسبة'
    );

    // إضافة حقول لكل موقع إعلاني
    foreach ($ad_locations as $location_id => $location_name) {
        // إعداد تفعيل/تعطيل الإعلان في هذا الموقع
        $wp_customize->add_setting('goldnow_ad_enable_' . $location_id, array(
            'default'           => false,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('goldnow_ad_enable_' . $location_id, array(
            'label'    => 'تفعيل: ' . $location_name,
            'section'  => 'goldnow_ads_section',
            'type'     => 'checkbox',
            'priority' => 10,
        ));

        // إعداد كود الإعلان
        $wp_customize->add_setting('goldnow_ad_code_' . $location_id, array(
            'default'           => '',
            'sanitize_callback' => 'goldnow_sanitize_html',
        ));

        $wp_customize->add_control('goldnow_ad_code_' . $location_id, array(
            'label'       => $location_name,
            'description' => 'أضف كود الإعلان أو المحتوى HTML المخصص',
            'section'     => 'goldnow_ads_section',
            'type'        => 'textarea',
            'priority'    => 10,
        ));
    }

    // إضافة قسم حقن الأكواد
    $wp_customize->add_section('goldnow_code_injection_section', array(
        'title'       => 'حقن الأكواد',
        'priority'    => 35,
        'description' => 'حقن أكواد مخصصة في الهيدر والفوتر',
    ));

    // إعداد كود الهيدر
    $wp_customize->add_setting('goldnow_header_code', array(
        'default'           => '',
        'sanitize_callback' => 'goldnow_sanitize_html',
    ));

    $wp_customize->add_control('goldnow_header_code', array(
        'label'       => 'كود الهيدر',
        'description' => 'سيتم إضافة هذا الكود قبل إغلاق وسم head',
        'section'     => 'goldnow_code_injection_section',
        'type'        => 'textarea',
        'priority'    => 10,
    ));

    // إعداد كود الفوتر
    $wp_customize->add_setting('goldnow_footer_code', array(
        'default'           => '',
        'sanitize_callback' => 'goldnow_sanitize_html',
    ));

    $wp_customize->add_control('goldnow_footer_code', array(
        'label'       => 'كود الفوتر',
        'description' => 'سيتم إضافة هذا الكود قبل إغلاق وسم body',
        'section'     => 'goldnow_code_injection_section',
        'type'        => 'textarea',
        'priority'    => 20,
    ));
}
add_action('customize_register', 'goldnow_ads_customizer');

// دالة للتنظيف الآمن للـ HTML
function goldnow_sanitize_html($input) {
    return $input; // السماح بأكواد HTML و JS للإعلانات
}

// إضافة الأكواد المخصصة للهيدر
function goldnow_add_header_code() {
    $header_code = get_theme_mod('goldnow_header_code', '');
    if (!empty($header_code)) {
        echo $header_code;
    }
}
add_action('wp_head', 'goldnow_add_header_code', 999);

// إضافة الأكواد المخصصة للفوتر
function goldnow_add_footer_code() {
    $footer_code = get_theme_mod('goldnow_footer_code', '');
    if (!empty($footer_code)) {
        echo $footer_code;
    }
}
add_action('wp_footer', 'goldnow_add_footer_code', 999);

// دالة عرض الإعلان
function goldnow_display_ad($location) {
    $enable_ads = get_theme_mod('goldnow_enable_ads', true);
    $ad_enable = get_theme_mod('goldnow_ad_enable_' . $location, false);
    $ad_code = get_theme_mod('goldnow_ad_code_' . $location, '');
    
    if ($enable_ads && $ad_enable && !empty($ad_code)) {
        echo '<div class="goldnow-ad goldnow-ad-' . esc_attr($location) . '">';
        echo $ad_code;
        echo '</div>';
    }
}

function allow_editors_to_edit_templates() {
    $role = get_role('editor');
    if ($role && !$role->has_cap('edit_theme_options')) {
        $role->add_cap('edit_theme_options');
    }
}
add_action('init', 'allow_editors_to_edit_templates');




// 🟢 التبويب الثاني: تحميل الفريمات العالمي والمحلي
add_action('wp_ajax_load_indicator_frames', 'infi_load_indicator_frames');
add_action('wp_ajax_nopriv_load_indicator_frames', 'infi_load_indicator_frames');

function infi_load_indicator_frames() {
    // استقبال وتنظيف البيانات
    $currency = sanitize_text_field($_POST['country_currency'] ?? 'USD');
    $country_name = sanitize_text_field($_POST['country_name'] ?? '');

    // تحديد لغة الصفحة الأصلية من رابط الصفحة التي استدعت AJAX
    $referer = wp_get_referer();
    $page_path = $referer ? (string) wp_parse_url($referer, PHP_URL_PATH) : '';

    // العناوين الافتراضية بالعربية
    $global_ounce_title = 'سعر أونصة الذهب العالمي (USD)';
    $local_ounce_title = 'سعر أونصة الذهب في';

    // الإنجليزية
    if (preg_match('#^/en(?:/|$)#i', $page_path)) {
        $global_ounce_title = 'Global Gold Ounce Price (USD)';
        $local_ounce_title = 'Gold Ounce Price in';
    }
    // الفرنسية
    elseif (preg_match('#^/fr(?:/|$)#i', $page_path)) {
        $global_ounce_title = 'Prix mondial de l’once d’or (USD)';
        $local_ounce_title = 'Prix de l’once d’or en';
    }

    ob_start();
    ?>
    <!-- تنسيقات خاصة بالعناوين داخل AJAX -->
    <style>
        .chart-header {
            background: #b8860b;
            color: #fff;
            padding: 12px 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border: 1px solid #b8860b;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .chart-header h3 {
            margin: 0;
            font-size: 18px;
            color: #fff;
            font-family: 'Cairo', sans-serif;
            font-weight: bold;
        }
        .chart-container {
            background: #fff8e1;
            border: 1px solid #dfb551;
            border-top: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 5px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .chart-icon {
            font-size: 20px;
        }
    </style>

    <!-- 1. الشارت العالمي -->
    <div class="gold-frame-box mb-4">
        <div class="chart-header">
            <span class="chart-icon">🌍</span>
            <h3><?php echo esc_html($global_ounce_title); ?></h3>
        </div>
        <div class="chart-container">
            <iframe
              src="https://www.tradingview-widget.com/embed-widget/symbol-overview/?locale=ar_AE#%7B%22symbols%22%3A%5B%5B%22TVC%3AGOLD%7C1D%22%5D%5D%2C%22chartOnly%22:false%2C%22width%22:%22100%25%22%2C%22height%22:%22400%22%2C%22colorTheme%22:%22light%22%2C%22gridLineColor%22%3A%22%23f0f3fa%22%2C%22fontColor%22%3A%22%23787b86%22%2C%22isTransparent%22%3Atrue%2C%22showFloatingTooltip%22%3Atrue%7D"
              style="width:100%; height:400px; border:none;">
            </iframe>
        </div>
    </div>

    <!-- 2. الشارت المحلي -->
    <div class="gold-frame-box mb-5">
        <div class="chart-header">
            <span class="chart-icon">📊</span>
            <h3>
                <?php echo esc_html($local_ounce_title); ?>
                <?php echo esc_html($country_name); ?>
                (<?php echo esc_html($currency); ?>)
            </h3>
        </div>
        <div class="chart-container">
            <?php
            // بناء إعدادات TradingView JSON بشكل آمن
            $tv_config = [
                "symbols" => [["TVC:GOLD|1D|" . $currency]],
                "chartOnly" => false,
                "width" => "100%",
                "height" => "400",
                "locale" => "ar_AE",
                "colorTheme" => "light",
                "gridLineColor" => "#f0f3fa",
                "isTransparent" => true,
                "chartType" => "area",
                "lineColor" => "#b8860b",
                "bottomColor" => "#fff8e1"
            ];

            $json_config = json_encode($tv_config);
            ?>
            <iframe
              src="https://www.tradingview-widget.com/embed-widget/symbol-overview/?locale=ar_AE#<?php echo rawurlencode($json_config); ?>"
              style="width:100%; height:400px; border:none;">
            </iframe>
        </div>
    </div>

    <?php
    echo ob_get_clean();
    wp_die();
}

// 🟡 التبويب الثالث: أسعار الشراء والبيع
add_action('wp_ajax_load_buy_sell', 'infi_load_buy_sell');
add_action('wp_ajax_nopriv_load_buy_sell', 'infi_load_buy_sell');

function infi_load_buy_sell() {
    $currency = sanitize_text_field($_POST['country_currency'] ?? '');
    $country = sanitize_text_field($_POST['country_name'] ?? '');

    ob_start();

    // عرض الجدول
    echo do_shortcode('[infi_gold_table_advanced currency="' . esc_attr($currency) . '" country="' . esc_attr($country) . '"]');

    // عرض التنويه بتصميم متناسق
    ?>
    <div class="mt-4" style="
        background: #fff8e1;
        border: 1px solid #dfb551;
        border-right: 5px solid #b8860b;
        padding: 15px;
        border-radius: 6px;
        color: #5a4a1b;
        font-family: 'Cairo', sans-serif;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);">

        <h4 style="color: #b8860b; font-weight: bold; margin-bottom: 8px; font-size: 16px;">
            <span style="margin-left: 5px;">⚠️</span> ملاحظة هامة:
        </h4>
        <p style="margin: 0; font-size: 14px; line-height: 1.6;">
            الأسعار الموضحة في جدول "البيع والشراء" هي قيم تقريبية استرشادية، وقد تختلف قليلاً من صاغة لأخرى بناءً على قيمة المصنعية، الدمغة، والضريبة المضافة في منطقتك.
        </p>
    </div>
    <?php

    echo ob_get_clean();
    wp_die();
}

register_nav_menu('footer-menu', __('قائمة التذييل', 'textdomain'));







/**
 * ALTAQRER GOLD - Latest 10 Language-Specific Posts Above Footer
 *
 * Arabic:   URLs containing gold-price
 * English:  URLs containing gold-price-today
 * French:   URLs containing prix-or-aujourdhui
 */

add_action('wp_footer', 'insert_latest_posts_above_footer_php', 5);

function insert_latest_posts_above_footer_php() {

    if (is_admin()) {
        return;
    }

    // Detect current language from URL.
    $request_uri = $_SERVER['REQUEST_URI'] ?? '/';
    $current_path = parse_url($request_uri, PHP_URL_PATH);

    $current_path = is_string($current_path) ? $current_path : '/';

    if (preg_match('#^/en(?:/|$)#i', $current_path)) {

        $language_keyword = 'gold-price-today';
        $current_language = 'en';

    } elseif (preg_match('#^/fr(?:/|$)#i', $current_path)) {

        $language_keyword = 'prix-or-aujourdhui';
        $current_language = 'fr';

    } else {

        $language_keyword = 'gold-price';
        $current_language = 'ar';
    }

    // Collect the latest 10 matching posts with featured images.
    $matching_posts = [];
    $page = 1;
    $batch_size = 50;

    while (count($matching_posts) < 10) {

        $query = new WP_Query([
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => $batch_size,
            'paged'               => $page,
            'orderby'             => 'date',
            'order'               => 'DESC',
            'ignore_sticky_posts' => true,
            'no_found_rows'       => false,
            'meta_query'          => [
                [
                    'key'     => '_thumbnail_id',
                    'compare' => 'EXISTS',
                ],
            ],
        ]);

        if (!$query->have_posts()) {
            wp_reset_postdata();
            break;
        }

        while ($query->have_posts()) {

            $query->the_post();

            $post_url = get_permalink();

            if (!$post_url || stripos($post_url, $language_keyword) === false) {
                continue;
            }

            // Prevent English articles from appearing in Arabic results.
            if (
                $current_language === 'ar' &&
                stripos($post_url, 'gold-price-today') !== false
            ) {
                continue;
            }

            $matching_posts[] = get_the_ID();

            if (count($matching_posts) >= 10) {
                break;
            }
        }

        $has_more_posts = $query->max_num_pages > $page;

        wp_reset_postdata();

        if (!$has_more_posts || count($matching_posts) >= 10) {
            break;
        }

        $page++;
    }

    if (empty($matching_posts)) {
        return;
    }

    // Load the selected posts in their original date order.
    $display_query = new WP_Query([
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'post__in'            => $matching_posts,
        'orderby'             => 'post__in',
        'posts_per_page'      => 10,
        'ignore_sticky_posts' => true,
    ]);

    if (!$display_query->have_posts()) {
        wp_reset_postdata();
        return;
    }
    ?>

    <div id="custom-footer-grid-container"
         style="background:#1a1a1a;padding:25px 0;border-top:4px solid #efb923;width:100%;box-sizing:border-box;">

        <div class="posts-grid-wrapper">

            <?php while ($display_query->have_posts()) : $display_query->the_post(); ?>

                <div class="grid-post-item">

                    <a href="<?php the_permalink(); ?>" class="grid-post-link">

                        <div class="grid-post-thumb-wrap">
                            <?php
                            the_post_thumbnail('medium', [
                                'class'   => 'grid-post-thumb',
                                'loading' => 'lazy',
                            ]);
                            ?>
                        </div>

                        <div class="grid-post-info">
                            <h4 class="grid-post-title">
                                <?php the_title(); ?>
                            </h4>
                        </div>

                    </a>

                </div>

            <?php endwhile; ?>

        </div>
    </div>

    <style>
    .posts-grid-wrapper {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 15px;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
        box-sizing: border-box;
        direction: rtl;
    }

    .grid-post-item {
        background: #262626;
        border: 1px solid #3d3d3d;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        transition: transform 0.2s ease, border-color 0.2s ease;
        display: flex;
        flex-direction: column;
    }

    .grid-post-item:hover {
        transform: translateY(-4px);
        border-color: #efb923;
    }

    .grid-post-link {
        text-decoration: none;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .grid-post-thumb-wrap {
        width: 100%;
        padding-top: 65px;
        position: relative;
        background: #111;
    }

    .grid-post-thumb {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .grid-post-info {
        padding: 12px 10px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: center;
        background: #262626;
    }

    .grid-post-title {
        margin: 0;
        font-size: 13px;
        font-weight: bold;
        line-height: 1.5;
        text-align: center;
        color: #fff;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media (max-width: 992px) {
        .posts-grid-wrapper {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .posts-grid-wrapper {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .grid-post-title {
            font-size: 12px;
        }
    }

    @media (max-width: 400px) {
        .posts-grid-wrapper {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        var containers = document.querySelectorAll(
            '#custom-footer-grid-container'
        );

        // Prevent duplicate sections.
        if (containers.length > 1) {
            for (var i = 0; i < containers.length - 1; i++) {
                containers[i].remove();
            }
        }

        var container = document.getElementById(
            'custom-footer-grid-container'
        );

        var footer = document.querySelector('footer') ||
                     document.getElementById('footer') ||
                     document.querySelector('.footer');

        // Move the posts section directly above the footer.
        if (container && footer && footer.parentNode) {
            footer.parentNode.insertBefore(container, footer);
        }

    });
    </script>

    <?php
    wp_reset_postdata();
}












/**
 * ==========================================================
 * ALTAQRER GOLD - MULTILINGUAL ROUTES + SEO + SITEMAPS
 * Languages: ar, en, fr, de, es, it, pt, ru, hi, tr
 * ==========================================================
 */


/* ----------------------------------------------------------
 * 1. إعداد اللغات والمسارات
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_languages' ) ) {
    function altaqrer_ml_languages() {
        return array(
            'ar' => '',
            'en' => 'en',
            'fr' => 'fr',
            'de' => 'de',
            'es' => 'es',
            'it' => 'it',
            'pt' => 'pt',
            'ru' => 'ru',
            'hi' => 'hi',
            'tr' => 'tr',
        );
    }
}

if ( ! function_exists( 'altaqrer_ml_sections' ) ) {
    function altaqrer_ml_sections() {
        return array(
            '24k', '22k', '21k', '18k', '14k',
            'ounce', 'coin', 'usd', 'gold-bars', 'gold-index',
        );
    }
}

if ( ! function_exists( 'altaqrer_ml_current_language' ) ) {
    function altaqrer_ml_current_language() {

        $lang = get_query_var( 'lang' );

        if ( ! $lang ) {

            $path = wp_parse_url(
                isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/',
                PHP_URL_PATH
            );

            $first = strtolower(
                strtok( trim( (string) $path, '/' ), '/' )
            );

            $languages = altaqrer_ml_languages();

            if ( isset( $languages[ $first ] ) && $first !== 'ar' ) {
                $lang = $first;
            }
        }

        $languages = altaqrer_ml_languages();

        return isset( $languages[ $lang ] ) ? $lang : 'ar';
    }
}


/* ----------------------------------------------------------
 * 2. تسجيل Query Vars مرة واحدة
 * ---------------------------------------------------------- */

add_filter( 'query_vars', 'altaqrer_ml_register_query_vars', 30 );

function altaqrer_ml_register_query_vars( $vars ) {

    foreach ( array( 'lang', 'gold_view', 'altaqrer_ml_sitemap' ) as $var ) {

        if ( ! in_array( $var, $vars, true ) ) {
            $vars[] = $var;
        }
    }

    return $vars;
}


/* ----------------------------------------------------------
 * 3. Rewrite Rules للغات العشر
 * ---------------------------------------------------------- */

add_action( 'init', 'altaqrer_ml_register_rewrite_rules', 30 );

function altaqrer_ml_register_rewrite_rules() {

    $sections = implode( '|', altaqrer_ml_sections() );

    // العربية.
    add_rewrite_rule(
        '^country/([^/]+)/(' . $sections . ')/?$',
        'index.php?countries=$matches[1]&gold_view=$matches[2]',
        'top'
    );

    // بقية اللغات.
    foreach ( altaqrer_ml_languages() as $lang => $prefix ) {

        if ( $lang === 'ar' || empty( $prefix ) ) {
            continue;
        }

        // صفحة الدولة الرئيسية.
        add_rewrite_rule(
            '^' . preg_quote( $prefix, '/' ) . '/country/([^/]+)/?$',
            'index.php?countries=$matches[1]&lang=' . $lang,
            'top'
        );

        // التبويبات العشرة.
        add_rewrite_rule(
            '^' . preg_quote( $prefix, '/' ) . '/country/([^/]+)/(' . $sections . ')/?$',
            'index.php?countries=$matches[1]&gold_view=$matches[2]&lang=' . $lang,
            'top'
        );
    }

    // خرائط Sitemap مستقلة لكل لغة.
    foreach ( altaqrer_ml_languages() as $lang => $prefix ) {

        add_rewrite_rule(
            '^gold-sitemap-' . $lang . '\.xml$',
            'index.php?altaqrer_ml_sitemap=' . $lang,
            'top'
        );
    }
}


/* ----------------------------------------------------------
 * 4. أسماء الدول كاملة حسب اللغة
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_country_name' ) ) {
    function altaqrer_ml_country_name( $term, $lang ) {

        if ( ! ( $term instanceof WP_Term ) ) {
            return '';
        }

        if ( $lang === 'ar' ) {
            return $term->name;
        }

        // مفاتيح أسماء الدول المترجمة.
        $meta_keys = array(
            'en' => array(
                'country_english_name',
                'country_en_name',
                'english_name',
                'country_name_en'
            ),
            'fr' => array(
                'country_french_name',
                'country_fr_name',
                'french_name',
                'country_name_fr'
            ),
            'de' => array(
                'country_german_name',
                'country_de_name',
                'german_name',
                'country_name_de'
            ),
            'es' => array(
                'country_spanish_name',
                'country_es_name',
                'spanish_name',
                'country_name_es'
            ),
            'it' => array(
                'country_italian_name',
                'country_it_name',
                'italian_name',
                'country_name_it'
            ),
            'pt' => array(
                'country_portuguese_name',
                'country_pt_name',
                'portuguese_name',
                'country_name_pt'
            ),
            'ru' => array(
                'country_russian_name',
                'country_ru_name',
                'russian_name',
                'country_name_ru'
            ),
            'hi' => array(
                'country_hindi_name',
                'country_hi_name',
                'hindi_name',
                'country_name_hi'
            ),
            'tr' => array(
                'country_turkish_name',
                'country_tr_name',
                'turkish_name',
                'country_name_tr'
            ),
        );

        // أولًا: البحث عن الاسم المحفوظ باللغة المطلوبة.
        if ( isset( $meta_keys[ $lang ] ) ) {

            foreach ( $meta_keys[ $lang ] as $key ) {

                $value = get_term_meta(
                    $term->term_id,
                    $key,
                    true
                );

                if ( is_string( $value ) && trim( $value ) !== '' ) {
                    return sanitize_text_field( $value );
                }
            }
        }

        // ثانيًا: استخراج اسم الدولة الكامل من رمز ISO باستخدام Intl.
        $locales = array(
            'en' => 'en',
            'fr' => 'fr',
            'de' => 'de',
            'es' => 'es',
            'it' => 'it',
            'pt' => 'pt',
            'ru' => 'ru',
            'hi' => 'hi',
            'tr' => 'tr',
        );

        $country_code = strtoupper( trim( $term->slug ) );

        if (
            class_exists( 'Locale' ) &&
            isset( $locales[ $lang ] ) &&
            preg_match( '/^[A-Z]{2}$/', $country_code )
        ) {

            $localized_name = Locale::getDisplayRegion(
                'en_' . $country_code,
                $locales[ $lang ]
            );

            if (
                is_string( $localized_name ) &&
                trim( $localized_name ) !== '' &&
                strtoupper( trim( $localized_name ) ) !== $country_code
            ) {
                return $localized_name;
            }
        }

        // ثالثًا: استخدام الاسم الإنجليزي المحفوظ إن وجد.
        $english_name = get_term_meta(
            $term->term_id,
            'country_english_name',
            true
        );

        if (
            is_string( $english_name ) &&
            trim( $english_name ) !== ''
        ) {
            return sanitize_text_field( $english_name );
        }

        // رابعًا: اسم التصنيف نفسه.
        if ( ! empty( $term->name ) ) {
            return sanitize_text_field( $term->name );
        }

        return $country_code;
    }
}


/* ----------------------------------------------------------
 * 5. عناوين الصفحة الرئيسية لكل لغة
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_home_titles' ) ) {
    function altaqrer_ml_home_titles() {

        return array(
            'ar' => 'التقرير جولد: تطبيق أسعار الذهب اليوم لحظة بلحظة | AlTaqrer Gold',
            'en' => "Today's Gold Price | Live Gold Rates – AlTaqrer Gold",
            'fr' => "Prix de l’or aujourd’hui | Cours de l’or en direct – AlTaqrer Gold",
            'de' => 'Goldpreis heute | Aktuelle Goldkurse live – AlTaqrer Gold',
            'es' => 'Precio del oro hoy | Cotización del oro en vivo – AlTaqrer Gold',
            'it' => 'Prezzo dell’oro oggi | Quotazione oro in tempo reale – AlTaqrer Gold',
            'pt' => 'Preço do ouro hoje | Cotação do ouro em tempo real – AlTaqrer Gold',
            'ru' => 'Цена золота сегодня | Курс золота онлайн – AlTaqrer Gold',
            'hi' => 'आज के सोने के भाव | लाइव गोल्ड रेट – AlTaqrer Gold',
            'tr' => 'Güncel Altın Fiyatları | Canlı Altın Kuru – AlTaqrer Gold',
        );
    }
}


/* ----------------------------------------------------------
 * 6. تسميات التبويبات وعناوين SEO لكل لغة
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_section_labels' ) ) {
    function altaqrer_ml_section_labels() {

        return array(

            'ar' => array(
                '24k' => 'سعر الذهب عيار 24',
                '22k' => 'سعر الذهب عيار 22',
                '21k' => 'سعر الذهب عيار 21',
                '18k' => 'سعر الذهب عيار 18',
                '14k' => 'سعر الذهب عيار 14',
                'ounce' => 'سعر أونصة الذهب',
                'coin' => 'سعر الجنيه الذهب',
                'usd' => 'سعر الدولار والعملات',
                'gold-bars' => 'أسعار سبائك الذهب',
                'gold-index' => 'مؤشر الذهب',
            ),

            'en' => array(
                '24k' => '24 Karat Gold Price',
                '22k' => '22 Karat Gold Price',
                '21k' => '21 Karat Gold Price',
                '18k' => '18 Karat Gold Price',
                '14k' => '14 Karat Gold Price',
                'ounce' => 'Gold Ounce Price',
                'coin' => 'Gold Coin Price',
                'usd' => 'Dollar and Currency Rates',
                'gold-bars' => 'Gold Bars Prices',
                'gold-index' => 'Gold Index',
            ),

            'fr' => array(
                '24k' => 'Prix de l’or 24 carats',
                '22k' => 'Prix de l’or 22 carats',
                '21k' => 'Prix de l’or 21 carats',
                '18k' => 'Prix de l’or 18 carats',
                '14k' => 'Prix de l’or 14 carats',
                'ounce' => 'Prix de l’once d’or',
                'coin' => 'Prix de la pièce d’or',
                'usd' => 'Taux du dollar et des devises',
                'gold-bars' => 'Prix des lingots d’or',
                'gold-index' => 'Indice de l’or',
            ),

            'de' => array(
                '24k' => 'Goldpreis 24 Karat',
                '22k' => 'Goldpreis 22 Karat',
                '21k' => 'Goldpreis 21 Karat',
                '18k' => 'Goldpreis 18 Karat',
                '14k' => 'Goldpreis 14 Karat',
                'ounce' => 'Goldpreis je Unze',
                'coin' => 'Goldmünzenpreis',
                'usd' => 'Dollar- und Wechselkurse',
                'gold-bars' => 'Goldbarrenpreise',
                'gold-index' => 'Goldindex',
            ),

            'es' => array(
                '24k' => 'Precio del oro de 24 quilates',
                '22k' => 'Precio del oro de 22 quilates',
                '21k' => 'Precio del oro de 21 quilates',
                '18k' => 'Precio del oro de 18 quilates',
                '14k' => 'Precio del oro de 14 quilates',
                'ounce' => 'Precio de la onza de oro',
                'coin' => 'Precio de la moneda de oro',
                'usd' => 'Dólar y tipos de cambio',
                'gold-bars' => 'Precios de lingotes de oro',
                'gold-index' => 'Índice del oro',
            ),

            'it' => array(
                '24k' => 'Prezzo oro 24 carati',
                '22k' => 'Prezzo oro 22 carati',
                '21k' => 'Prezzo oro 21 carati',
                '18k' => 'Prezzo oro 18 carati',
                '14k' => 'Prezzo oro 14 carati',
                'ounce' => 'Prezzo dell’oncia d’oro',
                'coin' => 'Prezzo della moneta d’oro',
                'usd' => 'Dollaro e tassi di cambio',
                'gold-bars' => 'Prezzi dei lingotti d’oro',
                'gold-index' => 'Indice dell’oro',
            ),

            'pt' => array(
                '24k' => 'Preço do ouro 24 quilates',
                '22k' => 'Preço do ouro 22 quilates',
                '21k' => 'Preço do ouro 21 quilates',
                '18k' => 'Preço do ouro 18 quilates',
                '14k' => 'Preço do ouro 14 quilates',
                'ounce' => 'Preço da onça de ouro',
                'coin' => 'Preço da moeda de ouro',
                'usd' => 'Dólar e taxas de câmbio',
                'gold-bars' => 'Preços de barras de ouro',
                'gold-index' => 'Índice do ouro',
            ),

            'ru' => array(
                '24k' => 'Цена золота 24 карата',
                '22k' => 'Цена золота 22 карата',
                '21k' => 'Цена золота 21 карат',
                '18k' => 'Цена золота 18 карат',
                '14k' => 'Цена золота 14 карат',
                'ounce' => 'Цена золотой унции',
                'coin' => 'Цена золотой монеты',
                'usd' => 'Курс доллара и валют',
                'gold-bars' => 'Цены на золотые слитки',
                'gold-index' => 'Индекс золота',
            ),

            'hi' => array(
                '24k' => '24 कैरेट सोने की कीमत',
                '22k' => '22 कैरेट सोने की कीमत',
                '21k' => '21 कैरेट सोने की कीमत',
                '18k' => '18 कैरेट सोने की कीमत',
                '14k' => '14 कैरेट सोने की कीमत',
                'ounce' => 'सोने की प्रति औंस कीमत',
                'coin' => 'सोने के सिक्के की कीमत',
                'usd' => 'डॉलर और मुद्रा विनिमय दरें',
                'gold-bars' => 'सोने की छड़ों की कीमतें',
                'gold-index' => 'सोना मूल्य सूचकांक',
            ),

            'tr' => array(
                '24k' => '24 Ayar Altın Fiyatı',
                '22k' => '22 Ayar Altın Fiyatı',
                '21k' => '21 Ayar Altın Fiyatı',
                '18k' => '18 Ayar Altın Fiyatı',
                '14k' => '14 Ayar Altın Fiyatı',
                'ounce' => 'Ons Altın Fiyatı',
                'coin' => 'Altın Sikke Fiyatı',
                'usd' => 'Dolar ve Döviz Kurları',
                'gold-bars' => 'Altın Külçe Fiyatları',
                'gold-index' => 'Altın Fiyat Endeksi',
            ),
        );
    }
}


/* ----------------------------------------------------------
 * 7. إنشاء عنوان SEO موحد ومحسّن
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_build_seo_title' ) ) {
    function altaqrer_ml_build_seo_title( $title ) {

        $lang = altaqrer_ml_current_language();

        $path = wp_parse_url(
            isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/',
            PHP_URL_PATH
        );

        $home_titles = altaqrer_ml_home_titles();

        // الصفحة الرئيسية لكل لغة.
        if (
            ( $lang === 'ar' && ( is_front_page() || is_home() ) ) ||
            (
                $lang !== 'ar' &&
                untrailingslashit( (string) $path ) === '/' . $lang
            )
        ) {
            return isset( $home_titles[ $lang ] )
                ? $home_titles[ $lang ]
                : $title;
        }

        $term = get_queried_object();

        if (
            ! ( $term instanceof WP_Term ) ||
            $term->taxonomy !== 'countries'
        ) {
            return $title;
        }

        $country = altaqrer_ml_country_name( $term, $lang );

        if ( $country === '' ) {
            return $title;
        }

        $view   = get_query_var( 'gold_view' );
        $labels = altaqrer_ml_section_labels();

        // اسم القسم أو العيار.
        if (
            ! empty( $view ) &&
            isset( $labels[ $lang ][ $view ] )
        ) {
            $section = $labels[ $lang ][ $view ];
        } else {

            $home_sections = array(
                'ar' => 'أسعار الذهب اليوم',
                'en' => 'Gold Prices',
                'fr' => 'Prix de l’or',
                'de' => 'Goldpreise',
                'es' => 'Precios del oro',
                'it' => 'Prezzi dell’oro',
                'pt' => 'Preços do ouro',
                'ru' => 'Цены на золото',
                'hi' => 'सोने की कीमतें',
                'tr' => 'Altın Fiyatları',
            );

            $section = isset( $home_sections[ $lang ] )
                ? $home_sections[ $lang ]
                : $home_sections['en'];
        }

        // قوالب العناوين المحسّنة.
        $patterns = array(
            'ar' => '%1$s في %2$s اليوم | أسعار الذهب مباشر – التقرير جولد',
            'en' => '%1$s in %2$s Today | Live Gold Prices – AlTaqrer Gold',
            'fr' => '%1$s en %2$s aujourd’hui | Cours de l’or en direct – AlTaqrer Gold',
            'de' => '%1$s in %2$s heute | Aktuelle Goldpreise live – AlTaqrer Gold',
            'es' => '%1$s en %2$s hoy | Precio del oro en vivo – AlTaqrer Gold',
            'it' => '%1$s in %2$s oggi | Prezzo dell’oro in tempo reale – AlTaqrer Gold',
            'pt' => '%1$s em %2$s hoje | Preço do ouro ao vivo – AlTaqrer Gold',
            'ru' => '%1$s в стране %2$s сегодня | Курс золота онлайн – AlTaqrer Gold',
            'hi' => '%2$s में %1$s आज | लाइव गोल्ड रेट – AlTaqrer Gold',
            'tr' => '%2$s %1$s bugün | Canlı Altın Fiyatları – AlTaqrer Gold',
        );

        if ( ! isset( $patterns[ $lang ] ) ) {
            return $title;
        }

        return sprintf(
            $patterns[ $lang ],
            $section,
            $country
        );
    }
}

add_filter( 'pre_get_document_title', 'altaqrer_ml_build_seo_title', 2000 );
add_filter( 'wpseo_title', 'altaqrer_ml_build_seo_title', 2000 );
add_filter( 'rank_math/frontend/title', 'altaqrer_ml_build_seo_title', 2000 );


/* ----------------------------------------------------------
 * 8. Canonical موحد للدول والتبويبات
 * ---------------------------------------------------------- */

add_filter( 'rank_math/frontend/canonical', 'altaqrer_ml_canonical', 2000 );

function altaqrer_ml_canonical( $canonical ) {

    $term = get_queried_object();

    if (
        ! ( $term instanceof WP_Term ) ||
        $term->taxonomy !== 'countries'
    ) {
        return $canonical;
    }

    $lang = altaqrer_ml_current_language();
    $view = get_query_var( 'gold_view' );

    if ( $lang === 'ar' ) {

        $base = get_term_link( $term );

        if ( is_wp_error( $base ) ) {
            return $canonical;
        }

        $url = trailingslashit( $base );

    } else {

        $url = home_url(
            '/' . $lang . '/country/' . $term->slug . '/'
        );
    }

    if ( in_array( $view, altaqrer_ml_sections(), true ) ) {
        $url = trailingslashit( $url . $view );
    }

    return esc_url( $url );
}


/* ----------------------------------------------------------
 * 9. Breadcrumbs موحدة للغات العشر
 * ---------------------------------------------------------- */

add_filter( 'rank_math/frontend/breadcrumb/items', 'altaqrer_ml_breadcrumbs', 2000 );

function altaqrer_ml_breadcrumbs( $crumbs ) {

    if ( ! is_array( $crumbs ) || empty( $crumbs ) ) {
        return $crumbs;
    }

    $term = get_queried_object();

    if (
        ! ( $term instanceof WP_Term ) ||
        $term->taxonomy !== 'countries'
    ) {
        return $crumbs;
    }

    $lang    = altaqrer_ml_current_language();
    $country = altaqrer_ml_country_name( $term, $lang );

    $home_labels = array(
        'ar' => 'الرئيسية',
        'en' => 'Home',
        'fr' => 'Accueil',
        'de' => 'Startseite',
        'es' => 'Inicio',
        'it' => 'Home',
        'pt' => 'Início',
        'ru' => 'Главная',
        'hi' => 'होम',
        'tr' => 'Ana Sayfa',
    );

    $home_url = ( $lang === 'ar' )
        ? home_url( '/' )
        : home_url( '/' . $lang . '/' );

    if ( isset( $crumbs[0][0] ) ) {
        $crumbs[0][0] = $home_labels[ $lang ];
        $crumbs[0][1] = $home_url;
    }

    $view   = get_query_var( 'gold_view' );
    $labels = altaqrer_ml_section_labels();
    $last   = count( $crumbs ) - 1;

    if ( isset( $crumbs[ $last ][0] ) ) {

        $crumbs[ $last ][0] = (
            ! empty( $view ) &&
            isset( $labels[ $lang ][ $view ] )
        )
            ? $labels[ $lang ][ $view ] . ' - ' . $country
            : $country;
    }

    return $crumbs;
}


/* ----------------------------------------------------------
 * 10. آخر تحديث ناجح من جدول إضافة الذهب
 * ---------------------------------------------------------- */

if ( ! function_exists( 'altaqrer_ml_last_update' ) ) {
    function altaqrer_ml_last_update() {

        global $wpdb;

        if ( ! defined( 'INFI_MAIN_PREFIX' ) ) {
            return '';
        }

        $table = INFI_MAIN_PREFIX . 'infi_last_updates';

        $last_update = $wpdb->get_var(
            "SELECT MAX(last_update)
             FROM {$table}
             WHERE status = 'success'
             AND api_type IN ('metals_api', 'exchange_rates_api')"
        );

        if ( empty( $last_update ) ) {
            return '';
        }

        $timestamp = strtotime( $last_update . ' UTC' );

        return $timestamp ? gmdate( 'c', $timestamp ) : '';
    }
}


/* ----------------------------------------------------------
 * 11. إضافة خرائط اللغات العشر إلى فهرس Rank Math
 * ---------------------------------------------------------- */

add_filter( 'rank_math/sitemap/index', 'altaqrer_ml_sitemap_index', 30 );

function altaqrer_ml_sitemap_index( $xml ) {

    foreach ( altaqrer_ml_languages() as $lang => $prefix ) {

        $url = home_url( '/gold-sitemap-' . $lang . '.xml' );

        if ( strpos( $xml, $url ) !== false ) {
            continue;
        }

        $xml .= "\n<sitemap>\n";
        $xml .= '  <loc>' . esc_url( $url ) . "</loc>\n";
        $xml .= "</sitemap>\n";
    }

    return $xml;
}


/* ----------------------------------------------------------
 * 12. توليد Sitemap مستقلة لكل لغة
 * تشمل: الرئيسية + صفحة الدولة + التبويبات العشرة
 * ---------------------------------------------------------- */

add_action( 'template_redirect', 'altaqrer_ml_generate_sitemap', 0 );

function altaqrer_ml_generate_sitemap() {

    $lang = get_query_var( 'altaqrer_ml_sitemap' );

    if ( empty( $lang ) ) {
        return;
    }

    $languages = altaqrer_ml_languages();

    if ( ! isset( $languages[ $lang ] ) ) {
        return;
    }

    $terms = get_terms( array(
        'taxonomy'   => 'countries',
        'hide_empty' => false,
    ) );

    if ( is_wp_error( $terms ) ) {
        status_header( 500 );
        exit;
    }

    $lastmod = altaqrer_ml_last_update();
    $urls    = array();

    // الصفحة الرئيسية للغة.
    $urls[] = ( $lang === 'ar' )
        ? home_url( '/' )
        : home_url( '/' . $lang . '/' );

    // صفحات الدول والتبويبات العشرة.
    foreach ( $terms as $term ) {

        if ( $lang === 'ar' ) {

            $base = trailingslashit(
                home_url( '/country/' . $term->slug )
            );

        } else {

            $base = trailingslashit(
                home_url( '/' . $lang . '/country/' . $term->slug )
            );
        }

        // صفحة الدولة الرئيسية.
        $urls[] = $base;

        // التبويبات العشرة.
        foreach ( altaqrer_ml_sections() as $section ) {
            $urls[] = trailingslashit( $base . $section );
        }
    }

    $urls = array_values( array_unique( $urls ) );

    status_header( 200 );
    nocache_headers();

    header( 'Content-Type: application/xml; charset=UTF-8' );
    header( 'X-Robots-Tag: noindex, follow', true );

    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ( $urls as $url ) {

        echo "  <url>\n";

        echo '    <loc>' . esc_url( $url ) . "</loc>\n";

        if ( ! empty( $lastmod ) ) {
            echo '    <lastmod>' . esc_xml( $lastmod ) . "</lastmod>\n";
        }

        echo "  </url>\n";
    }

    echo '</urlset>';

    exit;
}
