<?php get_header(); ?>

<main class="p-0 font-2">
  <div class="container home px-2">
    <?php
    // 1️⃣ جلب بيانات الدولة الحالية (من الرابط)
    $current_term = get_queried_object();
    $country_name = $current_term->name; // الاسم بالعربي
    $english_name = get_term_meta($current_term->term_id, 'country_english_name', true);
    $country_code = get_term_meta($current_term->term_id, 'country_code', true);
    $country_flag = get_term_meta($current_term->term_id, 'country_flag', true);
    $country_currency = get_term_meta($current_term->term_id, 'country_currency', true);


	  

    // 2️⃣ إعداد مسميات العملة
    global $currency_names;
    $currency_label = isset($currency_names[$country_currency]) ? $currency_names[$country_currency] : $country_currency;
    $today = date('d/m/Y'); 

    // 3️⃣ منطق تحويل العملة (تم نقله من الصفحة الرئيسية)
    $local_currency_per_usd = 1.0;
    if ($country_currency !== 'USD') {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data_for_conversion = infi_get_latest_currency_rates($country_currency);

            if (!empty($currency_data_for_conversion) && isset($currency_data_for_conversion['rate_to_usd']) && $currency_data_for_conversion['rate_to_usd'] > 0) {
                $local_currency_per_usd = floatval($currency_data_for_conversion['rate_to_usd']);
            }
        }
    }
	  
	  
 $usd_rate_value = 1; // للاستخدام المستقبلي إذا لزم الأمر

       
?>


<?php goldnow_display_ad('below_cards'); ?>
	  
    <!-- ✅ أزرار التبويبات (مطابقة للصفحة الرئيسية) -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" data-tab="now">الأسعار الآن</button>
      <button class="gold-tab-btn" data-tab="buy-sell">أسعار السبائك</button>
      <button class="gold-tab-btn" data-tab="indicator">مؤشر الذهب</button>
    </div>

    <!-- ✅ محتوى التبويبات -->
    <div class="gold-tabs-content">
      
      <!-- 1. الأسعار الآن -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
                <!-- 📊 عنوان الجدول التلقائي المطور للسيو: يتغير حسب نوع العيار أو العملة المفتوحة -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: right; direction: rtl;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="أسعار الذهب الآن في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-left: 5px;">
                  <?php
        // قراءة المتغير لتحديد صياغة العنوان الداخلي للجدول والمقال
        if ( $gold_view == '24k' ) { echo 'أسعار الذهب عيار 24 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '22k' ) { echo 'أسعار الذهب عيار 22 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '21k' ) { echo 'سعر جرام الذهب عيار 21 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '18k' ) { echo 'أسعار الذهب عيار 18 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '14k' ) { echo 'أسعار الذهب عيار 14 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'أسعار أونصة الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'coin' ) { echo 'سعر الجنيه الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'أسعار سبائك الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'مؤشر الذهب المباشر اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'سعر الدولار والعملات اليوم في ' . esc_html($country_name); }
        else { echo 'أسعار الذهب في ' . esc_html($country_name) . ' اليوم '; }
        ?>

        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: right; direction: rtl;">
          <?php 
          if ($gold_view == 'usd') { echo 'مؤشر أسعار صرف العملات الأجنبية والعربية بالتحديث اللحظي'; }
          else { echo 'سعر الذهب في ' . esc_html($country_name) . ' بدون المصنعية تعاملات حية'; }
          ?>
        </h3>



    <!-- بطاقات أسعار الذهب -->
    <section id="gold-cards" class="mb-4">
        <?php echo do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'); ?>
    </section>

    <!-- صناديق معلومات الذهب -->
    <section id="gold-info-boxes" class="mb-4">
        <?php echo do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'); ?>
    </section>

		</div>
		
      <!-- 2. السبائك والجنيهات (تم التعديل ليكون مثل الرئيسية تماماً) -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none;" data-loaded="false">
        <h2 class="col-12 p-0 font-3 mb-0">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px">
            أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7;font-size: 15px;">
          أحدث أسعار السبائك والجنيهات (بدون مصنعية)
        </h3>

        <?php
        if (function_exists('infi_get_latest_gold_prices')) {
            // جلب سعر عيار 24 الأساسي للحسابات
            $latest_24k = infi_get_latest_gold_prices('24k');
            $gram_24k_price_usd_raw = !empty($latest_24k) ? floatval($latest_24k[0]['price_usd']) : 0;
            $gram_24k_price_currency = $gram_24k_price_usd_raw * $local_currency_per_usd;
            $gram_24k_price_usd_converted = $gram_24k_price_usd_raw;
            ?>

            <!-- أ) جدول السبائك -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار سبائك الذهب في <?php echo $country_name; ?></h4>
                    <span class="date-badge"><?php echo $today; ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>الوزن / النوع</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'سبيكة 1 جرام'],
                                ['weight' => 2.5, 'name' => 'سبيكة 2.5 جرام'],
                                ['weight' => 5, 'name' => 'سبيكة 5 جرام'],
                                ['weight' => 10, 'name' => 'سبيكة 10 جرام'],
                                ['weight' => 20, 'name' => 'سبيكة 20 جرام'],
                                ['weight' => 31.1, 'name' => 'أونصة (31.1 جرام)'],
                                ['weight' => 50, 'name' => 'سبيكة 50 جرام'],
                                ['weight' => 100, 'name' => 'سبيكة 100 جرام'],
                            ];
                            
                            foreach ($weights as $bar) {
                                // معالجة خاصة للأونصة
                                if ($bar['weight'] == 31.1) {
                                    $ounce_data = infi_get_latest_gold_prices('24k_oz');
                                    if (!empty($ounce_data)) {
                                        $bar_price_usd = floatval($ounce_data[0]['price_usd']);
                                        $bar_price_currency = $bar_price_usd * $local_currency_per_usd;
                                    } else {
                                        $bar_price_currency = $gram_24k_price_currency * $bar['weight'];
                                        $bar_price_usd = $gram_24k_price_usd_converted * $bar['weight'];
                                    }
                                } else {
                                    $bar_price_currency = $gram_24k_price_currency * $bar['weight'];
                                    $bar_price_usd = $gram_24k_price_usd_converted * $bar['weight'];
                                }
                                ?>
                                <tr>
                                    <td class="font-bold"><?php echo $bar['name']; ?></td>
                                    <td class="price-cell"><?php echo number_format($bar_price_currency, 2); ?></td>
                                    <td class="usd-cell"><?php echo number_format($bar_price_usd, 2); ?> $</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ب) جدول الجنيهات -->
            <section id="gold-pounds-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار جنيهات الذهب في <?php echo $country_name; ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>عيار الجنيه</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gold_pounds_carats = ['21k', '22k', '24k']; 
                            foreach ($gold_pounds_carats as $carat) {
                                $pound_gram_data = infi_get_latest_gold_prices($carat);
                                if (!empty($pound_gram_data)) {
                                    $price_usd_per_gram = floatval($pound_gram_data[0]['price_usd']);
                                    $pound_weight = 8;
                                    
                                    $pound_price_currency = $price_usd_per_gram * $pound_weight * $local_currency_per_usd;
                                    $pound_price_usd = $price_usd_per_gram * $pound_weight;
                                    $carat_num = str_replace('k', '', $carat);
                                ?>
                                <tr>
                                    <td class="font-bold">جنيه ذهب 8 جرام (عيار <?php echo $carat_num; ?>)</td>
                                    <td class="price-cell"><?php echo number_format($pound_price_currency, 2); ?></td>
                                    <td class="usd-cell"><?php echo number_format($pound_price_usd, 2); ?> $</td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ج) التنويه -->
            <div class="raw-gold-alert mt-4">
                <span class="alert-icon">⚠️</span>
                <strong>تنويه هام:</strong> الأسعار المعروضة أعلاه (السبائك والجنيهات) هي أسعار <u>الذهب الخام</u> فقط، ولا تشمل المصنعية أو الدمغة أو الضريبة.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">عذراً، البيانات غير متوفرة حالياً.</p>
        <?php } ?>
      </div>
     
      <!-- 3. مؤشر الذهب -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none;">
        <div class="gold-frame-box mb-5">
          <?php echo do_shortcode('[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="تغير السعر محلياً عيار"]'); ?>
        </div>
        <div id="ajax-indicator-frames"></div>
      </div>

    </div>
  </div>
</main>

<!-- ✅ جافاسكربت -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".gold-tab-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", async (event) => {
            const tab = event.target.getAttribute("data-tab");

            // إخفاء كل التبويبات
            document.querySelectorAll(".gold-tab-pane").forEach(p => p.style.display = "none");
            document.querySelectorAll(".gold-tab-btn").forEach(b => b.classList.remove("active"));

            // إظهار التبويب المختار
            const pane = document.getElementById("tab-" + tab);
            pane.style.display = "block";
            event.target.classList.add("active");

            // التبويب مؤشر الذهب: تحميل iframes فقط عند أول مرة
            if (tab === 'indicator' && !pane.dataset.framesLoaded) {
                const formData = new FormData();
                formData.append("action", "load_indicator_frames");
                formData.append("country_currency", "<?php echo esc_js($country_currency); ?>");
                formData.append("country_name", "<?php echo esc_js($country_name); ?>");

                const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>", { method: "POST", body: formData });
                const html = await response.text();
                document.getElementById("ajax-indicator-frames").innerHTML = html;
                pane.dataset.framesLoaded = "true";
            }

            // بالنسبة لتبويب السبائك (buy-sell)، تم إزالة الـ AJAX لأنه أصبح الآن محملاً مسبقاً
            // ولكن نضع هذا السطر لتأكيد التحميل في حالة أردت استخدام الكود لاحقاً
            if (tab === 'buy-sell') {
                pane.dataset.loaded = "true";
            }
        });
    });
});
</script>

<?php goldnow_display_ad('below_countries'); ?>






<?php
// إعداد حسابات الأسعار الإضافية للموضوع بناءً على كود قالبك
$ounce_price_currency = $gram_24k_price_currency * 31.1; // سعر الأونصة بالعملة المحلية
$ounce_price_usd = $gram_24k_price_usd_converted * 31.1;   // سعر الأونصة بالدولار
$gold_pound_currency = $gram_24k_price_currency * 8 * 0.875; // سعر الجنيه الذهب عيار 21 (8 جرام)

// جلب وتأمين المتغير الجغرافي الفرعي لـ التقرير جولد لمعالجة شروط السيو والإخفاء والإظهار
$gold_view = get_query_var('gold_view');
?>

<?php 
// 2️⃣ شروط إخفاء وإظهار ذكية: يظهر البوكس العلوي الكبير المطور وجدول عملاته فقط فى صفحة الدولة الرئيسية ويختفي من الفرعيات
if (empty($gold_view)) : 
?>
<!-- حاوية المقال الذكي محددة العرض (بوكس) بلون متباين وهادئ لمنع التداخل البصري -->
<div class="altaqrer-dynamic-article-box" style="background: #1f2126; padding: 20px; border: 1px solid #323742; border-right: 5px solid <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; color: #f0f1f5; font-size: 14.5px; line-height: 1.9; direction: rtl; text-align: right; border-radius: 8px; margin: 25px auto; max-width: 800px; width: 95%; box-sizing: border-box; box-shadow: 0 4px 15px rgba(0,0,0,0.25); font-family: sans-serif; clear: both;">
    
    <p style="margin-top: 0; margin-bottom: 15px;">
        📊 يرصد مؤشر <strong>التقرير جولد</strong> تحديثاً شاملاً لحركة <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>أسعار الذهب في <?php echo esc_html($country_name); ?> لحظة بلحظة</strong></span> اليوم <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> بتاريخ <strong><?php echo esc_html($today); ?></strong> مباشرة من داخل أسواق الصاغة المحلية وبورصة الذهب العالمية المخصصة لنطاق (<?php echo esc_html($english_name); ?>).
    </p>

    <!-- تطوير محتوى السيو ليشمل فقرات مكثفة عن الفرعيات والأعيرة والسبائك لاستهداف كلمات بحثية قوية لجوجل -->
    <p style="margin-bottom: 15px;">
        💡 يتيح لك هذا التقرير الشامل تتبع تداولات الذهب الحية بكافة تصنيفاتها؛ حيث يمكنك فحص <strong>سعر الذهب عيار 21 اليوم</strong> الخيار الأكثر طلباً وتداولاً، ومتابعة ندرة <strong>عيار 22</strong>، بالإضافة إلى حسابات <strong>عيار 18</strong> الاقتصادي و<strong>عيار 14</strong>. كما يغطي المؤشر أسعار المعدن النفيس في الأسواق الفرعية والمشغولات وصافي التداول اليومي.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ سجلت شاشات العرض الحية الآن الأسعار الحرة بدون مصنعية، حيث بلغ <strong>سعر جرام الذهب عيار 24</strong> النقي نحو <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (ما يعادل <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> دولار أمريكي</strong>). ويُعد هذا العيار هو المكون الأساسي لـ <strong>سبائك الذهب</strong> الاستثمارية بفضل نقائه المطلق.
    </p>

    <p style="margin-bottom: 15px;">
        📈 وعلى صعيد التعاملات التداولية لوحدات الذهب الكبرى، سجلت <strong>أسعار أونصة الذهب اليوم في <?php echo esc_html($country_name); ?></strong> قيمة <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> في السوق المحلي، وهو ما يقابل <strong><?php echo number_format($ounce_price_usd, 2); ?> دولار</strong> في التحديث المباشر للبورصة.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 بالنسبة لراغبي الادخار والاستثمار الذكي، سجل <strong>سعر الجنيه الذهب اليوم</strong> (وزن 8 جرامات من عيار 21 الأكثر تداولاً) نحو <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ إذا كنت تبحث عن حفظ قيمة مدخراتك، فإن رصد <strong>مؤشر الذهب المباشر</strong> ومتابعة <strong>أسعار سبائك الذهب</strong> بجميع أوزانها (من 1 جرام وحتى 1 كيلو) يمنحك الرؤية الدقيقة للتوقيت المثالي للشراء والبيع داخل محلات الصاغة، وتجنب تقلبات الأسعار المفاجئة.
    </p>

    <!-- صندوق مؤشر صرف العملة بلون داخلي متناسق ومنفصل -->
    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>مؤشر صرف العملة:</strong> يرتبط تسعير المعدن الثمين محلياً بحركة الصرف الحية؛ حيث يسجل <strong>سعر الدولار اليوم في <?php echo esc_html($country_name); ?></strong> تحديثا عند <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> لكل دولار أمريكي واحد بحسب البيانات الحالية المربطة بالسوق المالي. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي التابع لشبكة التقرير للحصول على التنبيهات فوراً.
    </div>
</div>
<?php endif; ?>






<?php
// دالة ذكية لحساب سعر صرف العملات المختلفة مقابل العملة المحلية للموقع
if (!function_exists('altaqrer_get_currency_live_rate')) {
    function altaqrer_get_currency_live_rate($target_currency, $local_currency_per_usd) {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data = infi_get_latest_currency_rates($target_currency);
            if (!empty($currency_data) && isset($currency_data['rate_to_usd']) && $currency_data['rate_to_usd'] > 0) {
                return $local_currency_per_usd / floatval($currency_data['rate_to_usd']);
            }
        }
        return 0;
    }
}

// حساب أسعار سلة العملات حياً ومباشرة من السيرفر
$local_currency_per_euro = altaqrer_get_currency_live_rate('EUR', $local_currency_per_usd);
$local_currency_per_gbp  = altaqrer_get_currency_live_rate('GBP', $local_currency_per_usd);
$local_currency_per_sar  = altaqrer_get_currency_live_rate('SAR', $local_currency_per_usd);
$local_currency_per_aed  = altaqrer_get_currency_live_rate('AED', $local_currency_per_usd);
$local_currency_per_kwd  = altaqrer_get_currency_live_rate('KWD', $local_currency_per_usd);
$local_currency_per_qar  = altaqrer_get_currency_live_rate('QAR', $local_currency_per_usd);
$local_currency_per_bhd  = altaqrer_get_currency_live_rate('BHD', $local_currency_per_usd);
$local_currency_per_omr  = altaqrer_get_currency_live_rate('OMR', $local_currency_per_usd);
$local_currency_per_jpy  = altaqrer_get_currency_live_rate('JPY', $local_currency_per_usd);
?>

<?php 
// إخفاء جدول العملات العلوي من الصفحات الفرعية ونتركه فقط في صفحة الدولة الرئيسية
if (empty($gold_view)) : 
?>
    <!-- صندوق مؤشر صرف العملات المتناسق والمحاذي هندسياً لأبعاد البوكس العلوي -->
    <div style="background: #17191d; padding: 15px; border-radius: 6px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 14px; margin: 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both;">
        <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 15px; text-align: right; direction: rtl;">
            💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <!-- تقسيم ديناميكي مرن ومترابط بالكامل للشاشات -->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: right; direction: rtl;">
            
            <!-- العمود الأول -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- العمود الثاني موازي تماماً -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: right; direction: rtl;">* التحديث يتم تلقائياً بالتزامن مع شاشات صرف البورصة العالمية الحية. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي.</p>
    </div>
<?php endif; ?>






<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: <?php echo (isset($_SERVER['REQUEST_URI']) && preg_match('#^/en(?:/|$)#i', wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH))) ? 'ltr' : 'rtl'; ?>;">
    <?php
    $current_term_object = get_queried_object();

    $request_path = isset($_SERVER['REQUEST_URI'])
        ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH)
        : '/';

    $is_english = (bool) preg_match('#^/en(?:/|$)#i', $request_path);

    $base_country_url = '';

    if ($is_english) {
        // Build the English country URL while preserving the country slug.
        $country_slug = '';

        if (isset($current_term_object->slug)) {
            $country_slug = $current_term_object->slug;
        } elseif (isset($country_code)) {
            $country_slug = strtolower($country_code);
        }

        if ($country_slug !== '') {
            $base_country_url = home_url('/en/country/' . rawurlencode($country_slug) . '/');
        }
    } else {
        // Keep the original Arabic URL behavior.
        if (isset($current_term_object->term_id)) {
            $term_link = get_term_link($current_term_object->term_id);

            if (!is_wp_error($term_link)) {
                $base_country_url = trailingslashit($term_link);
            }
        }

        if (empty($base_country_url) && isset($country_code)) {
            $base_country_url = home_url('/country/' . strtolower($country_code) . '/');
        }
    }

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'ar' => 'سعر الذهب',            'en' => 'Gold Price'],
        ['key' => '24k',       'ar' => 'عيار 24',              'en' => '24K'],
        ['key' => '22k',       'ar' => 'عيار 22',              'en' => '22K'],
        ['key' => '21k',       'ar' => 'عيار 21',              'en' => '21K'],
        ['key' => '18k',       'ar' => 'عيار 18',              'en' => '18K'],
        ['key' => '14k',       'ar' => 'عيار 14',              'en' => '14K'],
        ['key' => 'ounce',     'ar' => 'أونصة الذهب',          'en' => 'Gold Ounce'],
        ['key' => 'coin',      'ar' => 'الجنيه الذهب',         'en' => 'Gold Coin'],
        ['key' => 'gold-bars', 'ar' => 'أسعار السبائك',        'en' => 'Gold Bars'],
        ['key' => 'gold-index','ar' => 'مؤشر الذهب',           'en' => 'Gold Index'],
        ['key' => 'usd',       'ar' => 'سعر الدولار والعملات', 'en' => 'USD and Currency Rates'],
    ];

    $container_direction = $is_english ? 'ltr' : 'rtl';
    ?>

    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; row-gap: 10px; direction: <?php echo esc_attr($container_direction); ?>;">
        <?php foreach ($tabs as $tab) :
            $key = $tab['key'];
            $is_active = ($key === '') ? empty($gold_view) : ($gold_view === $key);

            $tab_url = ($key === '')
                ? $base_country_url
                : $base_country_url . rawurlencode($key) . '/';

            $tab_style = 'text-decoration: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; border: 1px solid #3a3f4d; ';

            if ($is_active) {
                $tab_style .= "color: {$active_color}; background: {$active_bg}; font-weight: bold;";
            } else {
                $tab_style .= "color: {$default_color}; background: {$default_bg}; font-weight: 500;";
            }

            $label = $is_english ? $tab['en'] : $tab['ar'];
        ?>
            <a href="<?php echo esc_url($tab_url); ?>"
               style="<?php echo esc_attr($tab_style); ?>"
               <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>




<?php
// 3️⃣ تطوير البوكس السفلي للفرعيات: توليد نصوص سيو متغيرة وديناميكية بالكامل لكل تبويب على حدة لمنع تكرار نص عيار 22
if (!empty($gold_view)) {
    // 📊 حسابات الأعيرة والوحدات الاستثمارية الأساسية لتمريرها في الجداول والمقالات المطولة
    $ounce_price_currency = $gram_24k_price_currency * 31.1; 
    $ounce_price_usd      = $gram_24k_price_usd_converted * 31.1;   
    
    $price_24k_local = $gram_24k_price_currency;
    $price_22k_local = $gram_24k_price_currency * 0.9166;
    $price_21k_local = $gram_24k_price_currency * 0.875;
    $price_18k_local = $gram_24k_price_currency * 0.75;
    $price_14k_local = $gram_24k_price_currency * 0.5833;

    $price_24k_usd   = $gram_24k_price_usd_converted;
    $price_22k_usd   = $gram_24k_price_usd_converted * 0.9166;
    $price_21k_usd   = $gram_24k_price_usd_converted * 0.875;
    $price_18k_usd   = $gram_24k_price_usd_converted * 0.75;
    $price_14k_usd   = $gram_24k_price_usd_converted * 0.5833;
    ?>
    <div class="altaqrer-unified-hero-box" style="background: #17191d; padding: 25px; border-radius: 8px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 15px; margin: 15px auto 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; box-shadow: 0 4px 15px rgba(0,0,0,0.3); direction: rtl; text-align: right; line-height: 1.8;">
        <div class="altaqrer-dynamic-inner-content">
            
            <?php 
            // ==================== 1️⃣ التبويب الأول: مؤشر الذهب (gold-index) ====================
            if ($gold_view == 'gold-index') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 مؤشر الذهب مباشر اليوم وأسعار الأعيرة الحية في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 24 النقي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 22 الممتاز:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">عيار 21 المفضل:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 18 الاقتصادي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_18k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 14 الخفيف:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_14k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930; grid-column: span 1;">🔸 <strong>أونصة الذهب (31.1ج):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($ounce_price_usd, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم <strong>مؤشر الذهب مباشر اليوم</strong> قراءة برمجية فورية لرصد حركة التعاملات الحية وتدفقات الصاغة داخل أسواق <strong><?php echo esc_html($country_name); ?></strong> بالتزامن مع البورصة الفورية. يتيح لك هذا التقرير فحص وتتبع أسعار أعيرة الذهب في الصاغة لحظة بلحظة لكافة التصنيفات التجارية بدون مصنعية، حيث يسجل عيار 24 النقي الآن نحو <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار)، بينما يبلغ عيار 21 الأكثر طلباً بقيمة <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار) وعيار 18 بسعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار)، كما تسجل الأونصة العالمية <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار). يرتبط المؤشر الهندسي بحجم العرض والطلب وحجم التداولات الفورية الجارية لبورصة الذهب في نطاق تداول المعدن النفيس عالمياً، مما يمنح المستثمرين الرؤية الدقيقة لتحديد التوقيت المثالي لعمليات الشراء والبيع وتجنب تقلبات الأسعار المفاجئة.
                </p>

            <?php 
            // ==================== 2️⃣ التبويب الثاني: أسعار السبائك (gold-bars) ====================
            elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 أسعار سبائك الذهب اليوم في <?php echo esc_html($country_name); ?> لجميع الأوزان (عيار 24 النقي):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 1 جرام:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 1, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 2.5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 2.5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 10 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 10, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 20 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 20, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>أونصة ذهب (31.1 جرام):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($ounce_price_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 50 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 50, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 100 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 100, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد مؤشر التقرير جولد بشكل هندسي دقيق <strong>أسعار سبائك الذهب اليوم</strong> المصنوعة كلياً من نقاء <strong>سبيكة ذهب عيار 24</strong> النقي بنسبة 999.9 بدون احتساب قيم تشغيلية إضافية. يبدأ تسعير الأوزان الصغيرة من سبيكة 1 جرام بقيمة <strong><?php echo number_format($price_24k_local * 1, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 1, 2); ?></strong> دولار)، وصولاً إلى الأونصة القياسية بسعر <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار)، وسبيكة الـ 100 جرام بنحو <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 100, 2); ?></strong> دولار). يفضل المستثمرون ورجال الأعمال شراء سبائك الذهب للادخار وحفظ قيمة رأس المال والأموال السائلة داخل محلات الصاغة في <strong><?php echo esc_html($country_name); ?></strong> كونه الملاذ الآمن والأكثر كفاءة ضد التضخم الاقتصادي وتراجع القوة الشرائية للعملات، وتتميز هذه السبائك بانخفاض مصنعيتها مقارنة بالمشغولات، مع ميزة استرداد جزء من الكاش (الكاش باك) عند إعادة بيعها.
                </p>

            <?php 
            // ==================== 3️⃣ التبويب الثالث: الجنيه الذهب (coin) ====================
            elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 سعر الجنيه الذهب اليوم في <?php echo esc_html($country_name); ?> بجميع أعيرته القياسية (وزن 8 جرام):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 21:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 22:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 24:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 8, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    تحديث حي ومباشر يرصد <strong>سعر الجنيه الذهب اليوم</strong> في محلات الصاغة والأسواق الاستثمارية بجميع تصنيفاته التجارية. يغطي هذا الجدول فحص <strong>أنواع وأعيرة الجنيه الذهب</strong> بوزنها القياسي الثابت (8 جرامات)، وعلى رأسها <strong>جنيه ذهب عيار 21 وزن 8 جرام</strong> الخيار الاستثماري الطاغي والأكثر بحثاً وطلباً في <strong><?php echo esc_html($country_name); ?></strong> والذي يسجل اليوم <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd * 8, 2); ?></strong> دولار)، متقدماً على الجنيه عيار 22 البالغ <strong><?php echo number_format($price_22k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> والجنيه عيار 24 بقيمة <strong><?php echo number_format($price_24k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong>. يعد الجنيه الذهب الملاذ الأفضل لراغبي الادخار وحفظ السيولة النقدية بأقل مصنعية ممكنة وتجنب تكاليف تشغيل المشغولات الذهبية التقليدية الخفيفة.
                </p>

            <?php 
            // ==================== 4️⃣ التبويب الرابع: سعر الدولار والعملات (usd) ====================
            elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: right; direction: rtl; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_gbp) && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_sar) && $local_currency_per_sar > 0) : ?>
                            <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_bhd) && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if (isset($local_currency_per_euro) && $local_currency_per_euro > 0) : ?>
                            <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_aed) && $local_currency_per_aed > 0) : ?>
                            <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_kwd) && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_qar) && $local_currency_per_qar > 0) : ?>
                            <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد <strong>مؤشد صرف العملات اليوم</strong> الأداء الحي لحركة المال الأجنبي والتداولات المصرفية والبنكية. يتم تحديث <strong>سعر الدولار اليوم في الصاغة</strong> والأسواق المالية الفورية في <strong><?php echo esc_html($country_name); ?></strong> حيث تسجل العملة الأمريكية الآن قيمة <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong> بالتزامن مع شاشات القطاع المصرفي المركزي لضمان تقديم دقيق لـ <strong>أسعار العملات مقابل العملة المحلية</strong> لحظة بلحظة. وبما أن تسعير المعدن النفيس محلياً يرتبط كلياً بحركة أسعار الصرف الحية أمام النقد الأجنبي، فإن رصد هذا المؤشر يمنحك الرؤية الشاملة لحساب السعر الصافي للذهب وتوقع اتجاهات التداولات القادمة بوضوح.
                </p>

            <?php 
            // ==================== 5️⃣ التبويب الخامس: عيار 24 (24k) ====================
            elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 24 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم مؤشر التقرير جولد رصداً حياً لحركة التداول، حيث استقر <strong>سعر جرام الذهب عيار 24 اليوم</strong> النقي بأسواق <strong><?php echo esc_html($country_name); ?></strong> عند قيمة <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> في الصاغة الحية، وهو ما يعادل عالمياً <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار أمريكي. يتميز هذا العيار الاستثماري بالنقاء المطلق والكامل بنسبة 99.9%، وهو المكون والركيزة الأساسية لصناعة وبيع سبائك الذهب بجميع أوزانها لحفظ الثروات ومدخرات الأفراد؛ ليمثل الأمان المالي بعيداً عن تقلبات السوق والتضخم النظري للعملة المحلية.
                </p>

            <?php 
            // ==================== 6️⃣ التبويب السادس: عيار 22 (22k) ====================
            elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 22 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    سجلت شاشات العرض المباشرة تحديثاً جديداً لحركة أسواق الصاغة لـ <strong>سعر جرام الذهب عيار 22 اليوم</strong> النقي في <strong><?php echo esc_html($country_name); ?></strong> ليبلغ قيمته الحالية البالغة <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_22k_usd, 2); ?></strong> دولار أمريكي). ويعتبر عيار 22 من التصنيفات الممتازة والفريدة التي تجمع بشكل متناسق وهندسي بين النقاوة العالية والصلابة النسبية المطلوبة لتصنيع وتشكيل أفخم قطع الحلي والمشغولات الفنية الفاخرة داخل محلات الصاغة الفرعية، ونحن نغطي مؤشره الفوري الحر بدون مصنعيات ودمغات مضافة بالتزامن مع البورصة.
                </p>

            <?php 
            // ==================== 7️⃣ التبويب السابع: عيار 21 (21k) ====================
            elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 21 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد المؤشر الفوري لشبكة التقرير جولد رغبة المستهلكين الأولى، حيث استقر <strong>سعر جرام الذهب عيار 21 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> محققاً تداولات نشطة بالصاغة عند مستوى <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، بما يوازي قيمته الدولية البالغة <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 21 الخيار الأكثر بحثاً وطلباً بالأسواق ويمثل النسبة الأكبر من حجم التداولات والمشغولات المحلية والجنيهات الذهب بوزن 8 جرام، وذلك بفضل بريقه الكلاسيكي الجذاب، ونحن نضمن لك المتابعة الحية لحركة هذا العيار بدون احتساب المصنعية لتحديد الوقت الأنسب لتداولاتك.
                </p>

            <?php 
            // ==================== 8️⃣ التبويب الثامن: عيار 18 (18k) ====================
            elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 18 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    شهدت أسواق التداول الفورية تحديثاً جديداً في حركة <strong>سعر جرام الذهب عيار 18 اليوم</strong> في <strong><?php echo esc_html($country_name); ?></strong>، حيث يسجل الجرام الآن سعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (أي ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار أمريكي)، مشكلاً رواجاً واسعاً بفضل تشكيلاته الهندسي الفاخرة وخفته المناسبة لصناعة أحدث أطقم الحلي العصرية. ويُعد عيار 18 المفضل والأول للهدايا والادخار متوسط الميزانية لراغبي اقتناء الذهب الاقتصادي بأقل كلفة تشغيلية ممكنة، ونحن نوفر لك التحديث الفوري المربوط بالبورصة العالمية على مدار الساعة.
                </p>

            <?php 
            // ==================== 9️⃣ التبويب التاسع: عيار 14 (14k) ====================
            elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 14 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    بالتزامن مع شاشات العرض الفورية الجارية بالبورصة، سجل <strong>سعر جرام الذهب عيار 14 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> تحديثاً مستقراً عند مستوى <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، وهو ما يعادل <strong><?php echo number_format($price_14k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 14 خياراً اقتصادياً وعملياً وممتازاً داخل أسواق الصاغة لراغبي اقتناء القطع الذهبية والمشغولات الخفيفة بأقل تكلفة ممكنة للجرام الواحد، بفضل صلابته العالية التي تتحمل الاستخدام اليومي المستمر وتدني سعره الصافي الحر بالمقارنة مع الأعيرة الكبرى.
                </p>

            <?php 
            // ==================== 🔟 التبويب العاشر: أونصة الذهب (ounce) ====================
            elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ أونصة الذهب العالمية في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    وفقاً لشاشات التداول المباشرة لبورصة الذهب العالمية الفورية، بلغت <strong>أسعار أونصة الذهب اليوم</strong> في نطاق أسواق <strong><?php echo esc_html($country_name); ?></strong> قيمتها الحالية المستقرة عند <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>، لتعادل بالدولار <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار. وترتبط الأونصة (وزن 31.1 جرام من عيار 24 الصافي) ارتباطاً وثيقاً ومباشراً بحركة المؤشرات الكلية للاقتصاد العالمي والتغير السعري للدولار، وتعتبر الأونصة هي المحرك الرئيسي والدليل المعتمد لتسعير كافة الأعيرة والسبائك بالأسواق المحلية والفرعية.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>


<!-- قسم الوصف المحسن للسيو (SEO Description Section) -->
<div class="gold-seo-description" style="margin: 20px 0; padding: 15px; background: #fff; border-right: 4px solid #d4af37; border-radius: 4px; direction: rtl; text-align: justify;">
    <h2 style="font-size: 1.3rem; color: #333; margin-bottom: 10px; font-weight: bold;">
        تابع أسعار الذهب اليوم في مصر والدول العربية لحظة بلحظة
    </h2>
    <p style="font-size: 1rem; color: #555; line-height: 1.8; margin: 0;">
        تابع <strong>أسعار الذهب اليوم في مصر</strong> و<strong>أسعار الذهب لحظة بلحظة</strong> مع تطبيق وموقع "التقرير جولد" دليلك الموثوق من قلب الصاغة وحركة <strong>بورصة الذهب مباشر</strong>. تعرف فوراً <strong>سعر الذهب عيار 21 بكام النهاردة</strong>، وتابع تحديثات <strong>أسعار الذهب عيار 18</strong> وعيار 24، بالإضافة إلى رصد دقيق لـ <strong>سعر الجنيه الذهب اليوم</strong> وأسعار السبائك وتوقعات السوق.
    </p>
</div>

<?php get_footer(); ?>

