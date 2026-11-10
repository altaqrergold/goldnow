<?php
/**
 * GoldNow multilingual SEO articles.
 * Purpose: useful, localized editorial content for the country gold-price pages.
 * Supported locales: ar, en, fr, de, es, it, pt, ru, hi, tr.
 * This file renders explanatory content only; it never calculates or changes prices.
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('goldnow_seo_article_data')) {
    function goldnow_seo_article_data($language, $section) {
        $language = strtolower((string) $language);
        $section = (string) $section;
        $allowed = array('overview','24k','22k','21k','18k','14k','ounce','coin','gold-bars','gold-index','usd');
        if (!in_array($section, $allowed, true)) {
            $section = 'overview';
        }

        /*
         * Each section has its own search intent, calculation explanation and FAQ.
         * Shared sentence patterns are localized below; no machine-translation fallback
         * is used, and a missing locale is never silently rendered in English.
         */
        $topics = array(
            'ar' => array(
                'overview'=>array('أسعار الذهب اليوم','متابعة أسعار الذهب في الدولة المختارة ومقارنة العيارات والعملات','تعرض الصفحة أسعار الجرام حسب درجة النقاء، إلى جانب قيمة الذهب بالدولار والعملة المحلية عند توافر بيانات التحويل.'),
                '24k'=>array('سعر الذهب عيار 24 اليوم','الذهب الأعلى نقاءً والمرجع الأساسي لتسعير السبائك','يعتمد تقدير الجرام على سعر الذهب الخالص عيار 24، وتُستخدم هذه القيمة مرجعًا لمقارنة العيارات الأقل نقاءً.'),
                '22k'=>array('سعر الذهب عيار 22 اليوم','مقارنة قيمة عيار 22 بالعيارات الأخرى','يمثل عيار 22 ذهبًا عالي النقاء، وتُحسب قيمته وفق نسبة الذهب فيه مقارنة بجرام عيار 24، قبل إضافة أي مصنعية أو رسوم بيع.'),
                '21k'=>array('سعر الذهب عيار 21 اليوم','متابعة سعر الجرام الأكثر تداولًا في أسواق عديدة','يتيح عرض السعر بالعملة المحلية وبالدولار مقارنة قيمة الجرام، مع مراعاة أن السعر النهائي لدى التاجر قد يختلف بسبب المصنعية والضرائب.'),
                '18k'=>array('سعر الذهب عيار 18 اليوم','فهم سعر الذهب المستخدم بكثرة في المشغولات والحلي','تتأثر قيمة عيار 18 بنسبة الذهب الخالص فيه، كما تتغير تكلفة القطعة النهائية بحسب التصميم والمصنعية والرسوم المحلية.'),
                '14k'=>array('سعر الذهب عيار 14 اليوم','متابعة قيمة العيار الأقل نقاءً والمناسب لمنتجات متنوعة','يعكس سعر عيار 14 نسبة الذهب في السبيكة، وتظل جودة القطعة وسعر البيع النهائي مرتبطين أيضًا بالتصنيع والعلامة التجارية.'),
                'ounce'=>array('سعر أونصة الذهب العالمية اليوم بالدولار','قراءة السعر الدولي للأونصة الترويسية دون خلطه بالسعر المحلي','الأونصة الترويسية تساوي نحو 31.1035 جرامًا، ويُعرض السعر العالمي هنا بالدولار الأمريكي للمقارنة مع الأسواق الدولية.'),
                'coin'=>array('سعر الجنيه أو العملة الذهبية اليوم','تقدير قيمة العملة الذهبية القياسية بوزن 8 جرامات','يعتمد هذا العرض على وزن 8 جرامات كما هو معتمد في حسابات الموقع، ويُحسب تقدير الذهب بضرب سعر الجرام في الوزن مع مراعاة العيار.'),
                'gold-bars'=>array('أسعار سبائك الذهب اليوم','مقارنة أوزان السبائك اعتمادًا على سعر جرام عيار 24','تُقدّر قيمة الذهب الخام في السبيكة بضرب سعر جرام عيار 24 في وزن السبيكة، قبل احتساب علاوة التصنيع أو الشهادة أو هامش البائع.'),
                'gold-index'=>array('مؤشر الذهب وأسعار العيارات','مقارنة حركة الذهب بين العيارات والسعر العالمي','يساعد المؤشر على قراءة الفروق بين العيارات والأسعار المحلية والدولية، لكنه لا يثبت اتجاهًا مستقبليًا ولا يمثل توصية استثمارية.'),
                'usd'=>array('سعر الدولار وأسعار صرف العملات','فهم أثر تحويل العملات في عرض سعر الذهب محليًا','تُحوّل قيمة الذهب المقومة بالدولار إلى العملة المحلية باستخدام أحدث بيانات الصرف المتاحة للموقع، وقد تختلف أسعار التنفيذ لدى المؤسسات المالية.')
            ),
            'en' => array(
                'overview'=>array('Gold Prices Today','Track gold prices in the selected country and compare purity levels and currencies','This page brings together per-gram prices by karat, with local-currency and US-dollar references where current exchange data is available.'),
                '24k'=>array('24K Gold Price Today','Understand the highest-purity gold benchmark used for bullion pricing','The 24K rate represents the site’s reference for fine gold. It is also the starting point for comparing lower-purity karats and estimating bullion value.'),
                '22k'=>array('22K Gold Price Today','Compare the value of 22-karat gold with other purity levels','22K gold contains a high proportion of fine gold. Its indicative value follows its gold content relative to 24K, before workmanship or retail charges.'),
                '21k'=>array('21K Gold Price Today','Follow a widely traded gold karat and compare local and USD values','Showing the gram rate in two currencies helps readers compare markets. A jeweller’s final selling price may also include workmanship, taxes and other charges.'),
                '18k'=>array('18K Gold Price Today','Understand the value of gold commonly used in jewellery','The 18K reference reflects its fine-gold content. The final price of a finished item can also depend on design, workmanship, brand and local charges.'),
                '14k'=>array('14K Gold Price Today','Track a lower-purity karat used in a range of jewellery products','The 14K rate reflects the gold portion of the alloy. Craftsmanship, product design, brand and local retail costs can affect the final item price.'),
                'ounce'=>array('Global Gold Ounce Price Today in USD','Read the international spot reference without confusing it with a local-currency quote','A troy ounce is approximately 31.1035 grams. This section reports the global ounce reference in US dollars for consistent international comparison.'),
                'coin'=>array('8-Gram Gold Coin Price Today','Understand the reference value of an eight-gram gold coin','The site’s coin calculation uses an 8-gram weight. Its indicative gold value is based on the selected karat’s gram price multiplied by eight.'),
                'gold-bars'=>array('Gold Bar Prices Today','Compare bullion weights using the 24K per-gram reference','An indicative raw-gold value can be estimated by multiplying the 24K gram rate by the bar’s weight. Fabrication, certification, dealer premiums and taxes are additional.'),
                'gold-index'=>array('Live Gold Market Index and Karat Prices','Compare local karat references with the international gold market','The index brings together selected karat rates and the global reference. It helps explain price differences, but a snapshot alone cannot establish a future market trend.'),
                'usd'=>array('USD Exchange Rate and Currency Conversion','See how exchange rates affect gold prices shown in local currency','The site converts USD-based gold references using the latest available exchange-rate data. Actual bank, cash and payment-provider rates may differ.')
            ),
            'fr' => array(
                'overview'=>array('Prix de l’or aujourd’hui','Suivre le cours de l’or dans le pays sélectionné et comparer les titres et les devises','Cette page rassemble les prix au gramme selon le titrage, avec des références en monnaie locale et en dollars lorsque les données de change sont disponibles.'),
                '24k'=>array('Prix de l’or 24 carats aujourd’hui','Comprendre la référence de l’or le plus pur utilisée pour les lingots','Le cours 24 carats sert de référence pour l’or fin et permet de comparer la valeur des titrages inférieurs.'),
                '22k'=>array('Prix de l’or 22 carats aujourd’hui','Comparer la valeur du 22 carats aux autres titrages','L’or 22 carats contient une forte proportion d’or fin. Sa valeur indicative dépend de cette teneur, avant les frais de fabrication et de vente.'),
                '21k'=>array('Prix de l’or 21 carats aujourd’hui','Suivre un titrage très recherché et comparer les montants locaux et en USD','L’affichage dans deux devises facilite la comparaison. Le prix final chez un bijoutier peut inclure la main-d’œuvre, les taxes et d’autres frais.'),
                '18k'=>array('Prix de l’or 18 carats aujourd’hui','Comprendre la valeur d’un titrage courant en bijouterie','La référence 18 carats reflète sa teneur en or fin. Le prix d’un bijou dépend aussi du design, de la fabrication, de la marque et des frais locaux.'),
                '14k'=>array('Prix de l’or 14 carats aujourd’hui','Suivre un titrage utilisé dans différents types de bijoux','Le cours 14 carats reflète la part d’or dans l’alliage. La fabrication, le design et les coûts de vente influencent le prix final.'),
                'ounce'=>array('Cours mondial de l’once d’or aujourd’hui en USD','Lire la référence internationale sans la confondre avec un prix local','Une once troy équivaut à environ 31,1035 grammes. Cette rubrique affiche le cours mondial de référence en dollars américains.'),
                'coin'=>array('Prix de la pièce d’or de 8 grammes aujourd’hui','Comprendre la valeur indicative d’une pièce de huit grammes','Le calcul du site conserve un poids de référence de 8 grammes. La valeur indicative correspond au cours du gramme du titrage choisi multiplié par huit.'),
                'gold-bars'=>array('Prix des lingots d’or aujourd’hui','Comparer les poids de lingots à partir du cours du gramme 24 carats','La valeur indicative de l’or contenu s’obtient en multipliant le cours 24 carats par le poids. Fabrication, certification, marge du vendeur et taxes s’ajoutent éventuellement.'),
                'gold-index'=>array('Indice du marché de l’or et cours des titrages','Comparer les références locales des titrages au marché international','L’indice rassemble plusieurs cours de référence et facilite leur comparaison. Une seule observation ne suffit toutefois pas à établir une tendance future.'),
                'usd'=>array('Taux de change USD et conversion des devises','Comprendre l’effet des taux de change sur le prix local de l’or','Le site convertit les références en dollars à partir des dernières données de change disponibles. Les taux bancaires ou de paiement peuvent être différents.')
            ),
            'de' => array(
                'overview'=>array('Goldpreise heute','Goldpreise im ausgewählten Land verfolgen und Reinheiten sowie Währungen vergleichen','Diese Seite bündelt Grammpreise nach Karat sowie lokale und US-Dollar-Referenzwerte, sofern aktuelle Wechselkursdaten verfügbar sind.'),
                '24k'=>array('24-Karat-Goldpreis heute','Die Referenz für besonders reines Gold und die Bewertung von Barren verstehen','Der 24-Karat-Kurs dient als Referenz für Feingold und zum Vergleich niedrigerer Goldlegierungen.'),
                '22k'=>array('22-Karat-Goldpreis heute','Den Wert von 22-karätigem Gold mit anderen Legierungen vergleichen','22-karätiges Gold enthält einen hohen Feingoldanteil. Der Richtwert richtet sich nach diesem Anteil, ohne Verarbeitung und Händlerkosten.'),
                '21k'=>array('21-Karat-Goldpreis heute','Einen häufig gehandelten Feingehalt verfolgen und Währungen vergleichen','Die Anzeige in lokaler Währung und US-Dollar erleichtert den Vergleich. Endpreise können zusätzlich Verarbeitung, Steuern und Gebühren enthalten.'),
                '18k'=>array('18-Karat-Goldpreis heute','Den Wert einer häufig für Schmuck verwendeten Goldlegierung verstehen','Der 18-Karat-Referenzwert berücksichtigt den Feingoldanteil. Design, Verarbeitung, Marke und lokale Kosten beeinflussen den Endpreis eines Schmuckstücks.'),
                '14k'=>array('14-Karat-Goldpreis heute','Einen niedrigeren Feingehalt für unterschiedliche Schmuckstücke verfolgen','Der 14-Karat-Kurs spiegelt den Goldanteil der Legierung wider. Herstellung, Design und Verkaufskosten können den Endpreis verändern.'),
                'ounce'=>array('Weltweiter Goldpreis je Unze heute in USD','Die internationale Referenz vom lokalen Währungspreis unterscheiden','Eine Feinunze entspricht ungefähr 31,1035 Gramm. Dieser Bereich zeigt den weltweiten Referenzkurs in US-Dollar.'),
                'coin'=>array('Goldmünzenpreis für 8 Gramm heute','Den Richtwert einer Goldmünze mit acht Gramm verstehen','Die Berechnung der Website verwendet ein Referenzgewicht von 8 Gramm. Der Richtwert ergibt sich aus dem Grammpreis der gewählten Legierung mal acht.'),
                'gold-bars'=>array('Goldbarrenpreise heute','Barrengewichte anhand des 24-Karat-Grammpreises vergleichen','Der Richtwert des enthaltenen Goldes ergibt sich aus dem 24-Karat-Grammpreis multipliziert mit dem Gewicht. Herstellung, Zertifizierung und Händlermarge kommen gegebenenfalls hinzu.'),
                'gold-index'=>array('Goldmarktindex und Karatpreise in Echtzeit','Lokale Karatpreise mit dem internationalen Goldmarkt vergleichen','Der Index fasst ausgewählte Referenzkurse zusammen. Eine einzelne Momentaufnahme belegt jedoch keinen zukünftigen Markttrend.'),
                'usd'=>array('USD-Wechselkurs und Währungsumrechnung','Den Einfluss von Wechselkursen auf lokale Goldpreise verstehen','Die Website rechnet USD-Referenzwerte anhand der neuesten verfügbaren Wechselkursdaten um. Bank- und Zahlungsdienstleister können andere Kurse anwenden.')
            ),
            'es' => array(
                'overview'=>array('Precio del oro hoy','Consultar el precio del oro en el país seleccionado y comparar quilates y monedas','Esta página reúne precios por gramo según los quilates y referencias en moneda local y dólares cuando hay datos de cambio disponibles.'),
                '24k'=>array('Precio del oro de 24 quilates hoy','Comprender la referencia del oro de mayor pureza para valorar lingotes','La cotización de 24 quilates sirve como referencia del oro fino y permite comparar los quilates de menor pureza.'),
                '22k'=>array('Precio del oro de 22 quilates hoy','Comparar el valor del oro de 22 quilates con otras purezas','El oro de 22 quilates contiene una alta proporción de oro fino. Su valor orientativo depende de ese contenido, antes de los costes de fabricación y venta.'),
                '21k'=>array('Precio del oro de 21 quilates hoy','Seguir un quilate muy negociado y comparar valores en distintas monedas','Mostrar el precio en moneda local y USD facilita la comparación. El precio final puede incluir mano de obra, impuestos y otros cargos.'),
                '18k'=>array('Precio del oro de 18 quilates hoy','Entender el valor de una pureza habitual en joyería','La referencia de 18 quilates refleja su contenido de oro fino. El diseño, la fabricación, la marca y los costes locales también influyen en el precio final.'),
                '14k'=>array('Precio del oro de 14 quilates hoy','Consultar una pureza utilizada en distintos productos de joyería','El precio de 14 quilates refleja la proporción de oro de la aleación. La fabricación, el diseño y los costes comerciales pueden cambiar el precio final.'),
                'ounce'=>array('Precio mundial de la onza de oro hoy en USD','Distinguir la referencia internacional del precio en moneda local','Una onza troy equivale aproximadamente a 31,1035 gramos. Esta sección muestra la referencia mundial en dólares estadounidenses.'),
                'coin'=>array('Precio de la moneda de oro de 8 gramos hoy','Comprender el valor orientativo de una moneda de ocho gramos','El cálculo del sitio mantiene un peso de referencia de 8 gramos. El valor estimado resulta de multiplicar por ocho el precio por gramo del quilate elegido.'),
                'gold-bars'=>array('Precio de los lingotes de oro hoy','Comparar pesos de lingotes con la referencia por gramo de 24 quilates','El valor orientativo del oro se calcula multiplicando el precio por gramo de 24 quilates por el peso. La fabricación, certificación y margen comercial pueden añadirse.'),
                'gold-index'=>array('Índice del mercado del oro y precios por quilate','Comparar referencias locales con el mercado internacional','El índice reúne cotizaciones de referencia para facilitar la comparación. Una sola lectura no permite establecer una tendencia futura.'),
                'usd'=>array('Tipo de cambio USD y conversión de divisas','Entender cómo influyen los tipos de cambio en el precio local del oro','El sitio convierte las referencias en USD con los últimos datos de cambio disponibles. Los tipos aplicados por bancos y proveedores pueden variar.')
            ),
            'it' => array(
                'overview'=>array('Prezzo dell’oro oggi','Seguire il prezzo dell’oro nel paese selezionato e confrontare carature e valute','Questa pagina raccoglie i prezzi al grammo per caratura e i riferimenti in valuta locale e in dollari, quando sono disponibili dati aggiornati sul cambio.'),
                '24k'=>array('Prezzo dell’oro 24 carati oggi','Comprendere il riferimento dell’oro più puro per la valutazione dei lingotti','La quotazione a 24 carati è il riferimento per l’oro fino e consente di confrontare le carature inferiori.'),
                '22k'=>array('Prezzo dell’oro 22 carati oggi','Confrontare il valore dell’oro 22 carati con le altre carature','L’oro 22 carati contiene un’elevata percentuale di oro fino. Il valore indicativo dipende da tale contenuto, prima dei costi di lavorazione e vendita.'),
                '21k'=>array('Prezzo dell’oro 21 carati oggi','Seguire una caratura molto trattata e confrontare i valori in più valute','La visualizzazione in valuta locale e USD facilita il confronto. Il prezzo finale può includere lavorazione, imposte e altri costi.'),
                '18k'=>array('Prezzo dell’oro 18 carati oggi','Capire il valore di una caratura comune nella gioielleria','Il riferimento a 18 carati riflette il contenuto di oro fino. Design, lavorazione, marchio e costi locali incidono sul prezzo finale del gioiello.'),
                '14k'=>array('Prezzo dell’oro 14 carati oggi','Consultare una caratura utilizzata in diversi prodotti di gioielleria','Il prezzo a 14 carati riflette la quota d’oro nella lega. Lavorazione, design e costi di vendita possono modificare il prezzo finale.'),
                'ounce'=>array('Prezzo mondiale dell’oncia d’oro oggi in USD','Distinguere il riferimento internazionale dal prezzo in valuta locale','Un’oncia troy equivale a circa 31,1035 grammi. Questa sezione mostra il riferimento mondiale in dollari statunitensi.'),
                'coin'=>array('Prezzo della moneta d’oro da 8 grammi oggi','Comprendere il valore indicativo di una moneta da otto grammi','Il calcolo del sito mantiene il peso di riferimento di 8 grammi. Il valore indicativo deriva dal prezzo al grammo della caratura scelta moltiplicato per otto.'),
                'gold-bars'=>array('Prezzi dei lingotti d’oro oggi','Confrontare i pesi dei lingotti usando il riferimento al grammo 24 carati','Il valore indicativo dell’oro si ottiene moltiplicando il prezzo al grammo 24 carati per il peso. Produzione, certificazione e margine del venditore sono costi aggiuntivi.'),
                'gold-index'=>array('Indice del mercato dell’oro e prezzi per caratura','Confrontare i riferimenti locali con il mercato internazionale','L’indice raccoglie quotazioni di riferimento per facilitare il confronto. Una singola rilevazione non dimostra una tendenza futura.'),
                'usd'=>array('Tasso di cambio USD e conversione delle valute','Capire l’effetto dei cambi sul prezzo locale dell’oro','Il sito converte i riferimenti in USD usando gli ultimi dati di cambio disponibili. I tassi di banche e fornitori di pagamento possono essere diversi.')
            ),
            'pt' => array(
                'overview'=>array('Preço do ouro hoje','Acompanhe o preço do ouro no país selecionado e compare quilates e moedas','Esta página reúne preços por grama de acordo com a pureza e referências em moeda local e dólares quando há dados cambiais disponíveis.'),
                '24k'=>array('Preço do ouro 24 quilates hoje','Entenda a referência do ouro de maior pureza usada na avaliação de barras','A cotação de 24 quilates é a referência do ouro fino e permite comparar purezas inferiores.'),
                '22k'=>array('Preço do ouro 22 quilates hoje','Compare o valor do ouro 22 quilates com outras purezas','O ouro 22 quilates contém uma elevada proporção de ouro fino. O valor indicativo depende desse teor, antes dos custos de fabricação e venda.'),
                '21k'=>array('Preço do ouro 21 quilates hoje','Acompanhe uma pureza bastante negociada e compare valores em moedas diferentes','A apresentação em moeda local e USD facilita a comparação. O preço final pode incluir mão de obra, impostos e outras taxas.'),
                '18k'=>array('Preço do ouro 18 quilates hoje','Entenda o valor de uma pureza comum em joalheria','A referência de 18 quilates reflete o teor de ouro fino. Design, fabricação, marca e custos locais também influenciam o preço final.'),
                '14k'=>array('Preço do ouro 14 quilates hoje','Consulte uma pureza usada em diferentes produtos de joalheria','O preço de 14 quilates reflete a proporção de ouro na liga. Fabricação, design e custos de venda podem alterar o preço final.'),
                'ounce'=>array('Preço mundial da onça de ouro hoje em USD','Diferencie a referência internacional do preço em moeda local','Uma onça troy equivale a aproximadamente 31,1035 gramas. Esta seção apresenta a referência mundial em dólares americanos.'),
                'coin'=>array('Preço da moeda de ouro de 8 gramas hoje','Entenda o valor indicativo de uma moeda de oito gramas','O cálculo do site mantém o peso de referência de 8 gramas. O valor estimado resulta do preço por grama do quilate escolhido multiplicado por oito.'),
                'gold-bars'=>array('Preços das barras de ouro hoje','Compare pesos de barras usando a referência por grama de 24 quilates','O valor indicativo do ouro é calculado multiplicando o preço por grama de 24 quilates pelo peso. Fabricação, certificação e margem do vendedor podem ser adicionais.'),
                'gold-index'=>array('Índice do mercado do ouro e preços por quilate','Compare referências locais com o mercado internacional','O índice reúne cotações de referência para facilitar a comparação. Uma única leitura não estabelece uma tendência futura.'),
                'usd'=>array('Taxa de câmbio USD e conversão de moedas','Entenda como o câmbio influencia o preço local do ouro','O site converte referências em USD com os dados cambiais mais recentes disponíveis. As taxas de bancos e provedores de pagamento podem variar.')
            ),
            'ru' => array(
                'overview'=>array('Цена золота сегодня','Следите за ценой золота в выбранной стране и сравнивайте пробы и валюты','На странице собраны цены за грамм для разных проб, а также значения в местной валюте и долларах США при наличии актуальных данных об обменном курсе.'),
                '24k'=>array('Цена золота 24 карата сегодня','Понять ориентир для золота высшей пробы и оценки слитков','Цена 24-каратного золота служит ориентиром для чистого золота и сравнения с более низкими пробами.'),
                '22k'=>array('Цена золота 22 карата сегодня','Сравнить стоимость золота 22 карата с другими пробами','Золото 22 карата содержит высокую долю чистого золота. Ориентировочная стоимость зависит от этого содержания без учета изготовления и торговли.'),
                '21k'=>array('Цена золота 21 карат сегодня','Следить за востребованной пробой и сравнивать цены в разных валютах','Отображение в местной валюте и долларах США помогает сравнивать рынки. Итоговая цена изделия может включать работу, налоги и сборы.'),
                '18k'=>array('Цена золота 18 карат сегодня','Понять стоимость пробы, широко используемой в ювелирных изделиях','Ориентир 18 карат отражает долю чистого золота. На конечную стоимость украшения также влияют дизайн, изготовление, бренд и местные расходы.'),
                '14k'=>array('Цена золота 14 карат сегодня','Отслеживать пробу, используемую в разных ювелирных изделиях','Цена 14 карат отражает долю золота в сплаве. Изготовление, дизайн и торговые расходы могут изменить конечную цену.'),
                'ounce'=>array('Мировая цена золота за унцию сегодня в USD','Отличать международный ориентир от цены в местной валюте','Тройская унция составляет примерно 31,1035 грамма. В этом разделе мировая цена указана в долларах США.'),
                'coin'=>array('Цена золотой монеты весом 8 граммов сегодня','Понять ориентировочную стоимость монеты весом восемь граммов','В расчетах сайта используется базовый вес 8 граммов. Оценка получается умножением цены грамма выбранной пробы на восемь.'),
                'gold-bars'=>array('Цены на золотые слитки сегодня','Сравнить вес слитков по цене грамма золота 24 карата','Ориентировочная стоимость золота рассчитывается умножением цены грамма 24 карата на вес. Изготовление, сертификат и наценка продавца учитываются отдельно.'),
                'gold-index'=>array('Индекс рынка золота и цены по пробам','Сравнить местные цены по пробам с международным рынком','Индекс объединяет справочные котировки для сравнения. Одного наблюдения недостаточно, чтобы определить будущую тенденцию рынка.'),
                'usd'=>array('Курс USD и конвертация валют','Понять влияние обменных курсов на местную цену золота','Сайт пересчитывает значения в долларах США по последним доступным данным. Курсы банков и платежных сервисов могут отличаться.')
            ),
            'hi' => array(
                'overview'=>array('आज सोने की कीमतें','चुने हुए देश में सोने की कीमत और कैरेट व मुद्राओं की तुलना करें','इस पृष्ठ पर कैरेट के अनुसार प्रति ग्राम कीमतें दी जाती हैं। उपलब्ध विनिमय दरों के आधार पर स्थानीय मुद्रा और अमेरिकी डॉलर के संदर्भ भी दिखाए जाते हैं।'),
                '24k'=>array('आज 24 कैरेट सोने की कीमत','उच्चतम शुद्धता वाले सोने और बुलियन मूल्य के आधार को समझें','24 कैरेट दर शुद्ध सोने का संदर्भ मूल्य है और इससे कम शुद्धता वाले कैरेट की तुलना की जा सकती है।'),
                '22k'=>array('आज 22 कैरेट सोने की कीमत','22 कैरेट सोने की तुलना अन्य शुद्धता स्तरों से करें','22 कैरेट सोने में शुद्ध सोने का बड़ा हिस्सा होता है। इसका अनुमानित मूल्य सोने की मात्रा पर आधारित है और इसमें निर्माण शुल्क शामिल नहीं हैं।'),
                '21k'=>array('आज 21 कैरेट सोने की कीमत','प्रचलित कैरेट की कीमत को स्थानीय मुद्रा और USD में देखें','दो मुद्राओं में कीमत दिखाने से तुलना आसान होती है। आभूषण की अंतिम कीमत में कारीगरी, कर और अन्य शुल्क शामिल हो सकते हैं।'),
                '18k'=>array('आज 18 कैरेट सोने की कीमत','आभूषणों में उपयोग होने वाले कैरेट का मूल्य समझें','18 कैरेट संदर्भ दर उसमें मौजूद शुद्ध सोने को दर्शाती है। डिजाइन, कारीगरी, ब्रांड और स्थानीय लागत अंतिम कीमत को प्रभावित कर सकते हैं।'),
                '14k'=>array('आज 14 कैरेट सोने की कीमत','विभिन्न आभूषण उत्पादों में उपयोग होने वाले कैरेट को देखें','14 कैरेट दर मिश्रधातु में सोने के अनुपात को दर्शाती है। निर्माण और बिक्री लागत अंतिम कीमत बदल सकती है।'),
                'ounce'=>array('आज वैश्विक सोने की कीमत प्रति औंस USD में','अंतरराष्ट्रीय संदर्भ मूल्य को स्थानीय मुद्रा की कीमत से अलग समझें','एक ट्रॉय औंस लगभग 31.1035 ग्राम होता है। इस अनुभाग में वैश्विक संदर्भ मूल्य अमेरिकी डॉलर में दिखाया जाता है।'),
                'coin'=>array('आज 8 ग्राम सोने के सिक्के की कीमत','आठ ग्राम के सोने के सिक्के का अनुमानित मूल्य समझें','वेबसाइट की गणना में 8 ग्राम का मानक वजन रखा गया है। चुने हुए कैरेट की प्रति ग्राम कीमत को आठ से गुणा करके अनुमान मिलता है।'),
                'gold-bars'=>array('आज सोने की छड़ों की कीमतें','24 कैरेट प्रति ग्राम दर से अलग-अलग वजन की तुलना करें','सोने का अनुमानित मूल्य 24 कैरेट प्रति ग्राम दर को छड़ के वजन से गुणा करके निकाला जाता है। निर्माण, प्रमाणन और विक्रेता का मार्जिन अलग हो सकता है।'),
                'gold-index'=>array('सोना बाजार सूचकांक और कैरेट कीमतें','स्थानीय कैरेट दरों की अंतरराष्ट्रीय बाजार से तुलना करें','सूचकांक तुलना के लिए संदर्भ दरों को एक साथ दिखाता है। एक समय का आंकड़ा भविष्य की बाजार दिशा तय नहीं करता।'),
                'usd'=>array('USD विनिमय दर और मुद्रा रूपांतरण','समझें कि विनिमय दर स्थानीय सोने की कीमत को कैसे प्रभावित करती है','वेबसाइट उपलब्ध नवीनतम विनिमय दरों से USD संदर्भ कीमतों को स्थानीय मुद्रा में बदलती है। बैंक और भुगतान सेवाओं की दरें अलग हो सकती हैं।')
            ),
            'tr' => array(
                'overview'=>array('Bugünün Altın Fiyatları','Seçilen ülkedeki altın fiyatlarını ve ayarları farklı para birimlerinde karşılaştırın','Bu sayfa, ayara göre gram fiyatlarını ve mevcut kur verileri bulunduğunda yerel para birimi ile ABD doları karşılıklarını bir araya getirir.'),
                '24k'=>array('Bugün 24 Ayar Altın Fiyatı','En yüksek saflıktaki altının ve külçe değerlemesinin temelini anlayın','24 ayar fiyatı saf altın için referans oluşturur ve daha düşük ayarların karşılaştırılmasını sağlar.'),
                '22k'=>array('Bugün 22 Ayar Altın Fiyatı','22 ayar altının değerini diğer ayarlarla karşılaştırın','22 ayar altın yüksek oranda saf altın içerir. Gösterilen tahmini değer, işçilik ve satış masrafları hariç altın içeriğine dayanır.'),
                '21k'=>array('Bugün 21 Ayar Altın Fiyatı','Yaygın işlem gören bir ayarın yerel ve USD değerini izleyin','Fiyatın iki para biriminde gösterilmesi karşılaştırmayı kolaylaştırır. Nihai ürün fiyatına işçilik, vergi ve diğer ücretler eklenebilir.'),
                '18k'=>array('Bugün 18 Ayar Altın Fiyatı','Mücevheratta yaygın kullanılan bir ayarın değerini anlayın','18 ayar referansı saf altın içeriğini yansıtır. Tasarım, işçilik, marka ve yerel maliyetler nihai ürün fiyatını etkileyebilir.'),
                '14k'=>array('Bugün 14 Ayar Altın Fiyatı','Farklı mücevher ürünlerinde kullanılan ayarı takip edin','14 ayar fiyatı alaşımdaki altın oranını yansıtır. Üretim, tasarım ve satış giderleri nihai fiyatı değiştirebilir.'),
                'ounce'=>array('Bugün Küresel Ons Altın Fiyatı USD','Uluslararası referansı yerel para birimindeki fiyattan ayırın','Bir troy ons yaklaşık 31,1035 gramdır. Bu bölüm küresel referans fiyatı ABD doları cinsinden gösterir.'),
                'coin'=>array('Bugün 8 Gram Altın Sikke Fiyatı','Sekiz gramlık altın sikkenin gösterge değerini anlayın','Sitenin hesaplamasında 8 gramlık referans ağırlık korunur. Tahmini değer, seçilen ayarın gram fiyatının sekizle çarpılmasıyla bulunur.'),
                'gold-bars'=>array('Bugün Altın Külçe Fiyatları','24 ayar gram fiyatıyla farklı külçe ağırlıklarını karşılaştırın','Altının gösterge değeri, 24 ayar gram fiyatının külçe ağırlığıyla çarpılmasıyla hesaplanır. Üretim, sertifika ve satıcı payı ayrıca eklenebilir.'),
                'gold-index'=>array('Canlı Altın Piyasa Endeksi ve Ayar Fiyatları','Yerel ayar fiyatlarını uluslararası piyasayla karşılaştırın','Endeks, karşılaştırma için referans fiyatları bir araya getirir. Tek bir veri gelecekteki piyasa yönünü kanıtlamaz.'),
                'usd'=>array('USD Döviz Kuru ve Para Birimi Dönüşümü','Döviz kurlarının yerel altın fiyatını nasıl etkilediğini anlayın','Site, USD referanslarını mevcut en güncel kur verileriyle dönüştürür. Bankaların ve ödeme sağlayıcılarının uyguladığı kurlar farklı olabilir.')
            )
        );

        if (!isset($topics[$language])) {
            $language = 'en';
        }
        if (!isset($topics[$language][$section])) {
            $section = 'overview';
        }
        return $topics[$language][$section];
    }
}

if (!function_exists('goldnow_render_seo_article')) {
    /**
     * Render a localized, country-aware SEO article.
     *
     * $data keys: country, country_slug, currency, date, prices, base_url.
     * prices keys: 24k, 22k, 21k, 18k, 14k, ounce_usd, usd_rate.
     */
    function goldnow_render_seo_article($language, $section, $data = array()) {
        $language = strtolower((string) $language);
        $supported = array('ar','en','fr','de','es','it','pt','ru','hi','tr');
        if (!in_array($language, $supported, true)) {
            $language = 'en';
        }
        $topic = goldnow_seo_article_data($language, $section);
        $country = isset($data['country']) ? (string) $data['country'] : '';
        $currency = isset($data['currency']) ? (string) $data['currency'] : '';
        $date = isset($data['date']) ? (string) $data['date'] : '';
        $prices = (isset($data['prices']) && is_array($data['prices'])) ? $data['prices'] : array();
        $base = isset($data['base_url']) ? (string) $data['base_url'] : '';
        $rtl = ($language === 'ar');
        $dir = $rtl ? 'rtl' : 'ltr';
        $align = $rtl ? 'right' : 'left';
        $section = in_array($section, array('overview','24k','22k','21k','18k','14k','ounce','coin','gold-bars','gold-index','usd'), true) ? $section : 'overview';

        $price_key = ($section === 'ounce') ? 'ounce_usd' : (($section === 'gold-bars') ? '24k' : (($section === 'coin') ? 'coin' : $section));
        $price = isset($prices[$price_key]) && is_numeric($prices[$price_key]) ? (float) $prices[$price_key] : null;
        $price_label = ($section === 'ounce') ? 'USD' : $currency;
        $formatted_price = ($price !== null) ? number_format_i18n($price, 2) : '';
        $price_sentence = '';
        if ($price !== null && $section !== 'overview' && $section !== 'gold-index' && $section !== 'usd') {
            $price_sentence = '<p class="goldnow-seo-current-price">' .
                esc_html($language === 'ar' ? 'السعر المرجعي المعروض حاليًا:' : (
                    $language === 'fr' ? 'Valeur de référence affichée :' :
                    ($language === 'de' ? 'Angezeigter Referenzwert:' :
                    ($language === 'es' ? 'Valor de referencia mostrado:' :
                    ($language === 'it' ? 'Valore di riferimento mostrato:' :
                    ($language === 'pt' ? 'Valor de referência apresentado:' :
                    ($language === 'ru' ? 'Отображаемое справочное значение:' :
                    ($language === 'hi' ? 'दिखाया गया संदर्भ मूल्य:' :
                    ($language === 'tr' ? 'Gösterilen referans değer:' : 'Current reference value:')))))))) .
                '</p>';
            $price_sentence = str_replace('</p>', ' <strong>' . esc_html($formatted_price . ' ' . $price_label) . '</strong></p>', $price_sentence);
        }

        $links = array();
        if ($base !== '') {
            $base = trailingslashit($base);
            $labels = array(
                '24k'=>array('ar'=>'عيار 24','en'=>'24K gold','fr'=>'Or 24 carats','de'=>'24-Karat-Gold','es'=>'Oro de 24 quilates','it'=>'Oro 24 carati','pt'=>'Ouro 24 quilates','ru'=>'Золото 24 карата','hi'=>'24 कैरेट सोना','tr'=>'24 ayar altın'),
                '22k'=>array('ar'=>'عيار 22','en'=>'22K gold','fr'=>'Or 22 carats','de'=>'22-Karat-Gold','es'=>'Oro de 22 quilates','it'=>'Oro 22 carati','pt'=>'Ouro 22 quilates','ru'=>'Золото 22 карата','hi'=>'22 कैरेट सोना','tr'=>'22 ayar altın'),
                '21k'=>array('ar'=>'عيار 21','en'=>'21K gold','fr'=>'Or 21 carats','de'=>'21-Karat-Gold','es'=>'Oro de 21 quilates','it'=>'Oro 21 carati','pt'=>'Ouro 21 quilates','ru'=>'Золото 21 карат','hi'=>'21 कैरेट सोना','tr'=>'21 ayar altın'),
                '18k'=>array('ar'=>'عيار 18','en'=>'18K gold','fr'=>'Or 18 carats','de'=>'18-Karat-Gold','es'=>'Oro de 18 quilates','it'=>'Oro 18 carati','pt'=>'Ouro 18 quilates','ru'=>'Золото 18 карат','hi'=>'18 कैरेट सोना','tr'=>'18 ayar altın'),
                '14k'=>array('ar'=>'عيار 14','en'=>'14K gold','fr'=>'Or 14 carats','de'=>'14-Karat-Gold','es'=>'Oro de 14 quilates','it'=>'Oro 14 carati','pt'=>'Ouro 14 quilates','ru'=>'Золото 14 карат','hi'=>'14 कैरेट सोना','tr'=>'14 ayar altın'),
                'ounce'=>array('ar'=>'الأونصة العالمية','en'=>'global gold ounce','fr'=>'once mondiale','de'=>'weltweite Goldunze','es'=>'onza mundial de oro','it'=>'oncia mondiale','pt'=>'onça mundial','ru'=>'мировая унция золота','hi'=>'वैश्विक सोने का औंस','tr'=>'küresel altın onsu'),
                'coin'=>array('ar'=>'العملة الذهبية','en'=>'gold coin','fr'=>'pièce d’or','de'=>'Goldmünze','es'=>'moneda de oro','it'=>'moneta d’oro','pt'=>'moeda de ouro','ru'=>'золотая монета','hi'=>'सोने का सिक्का','tr'=>'altın sikke'),
                'gold-bars'=>array('ar'=>'سبائك الذهب','en'=>'gold bars','fr'=>'lingots d’or','de'=>'Goldbarren','es'=>'lingotes de oro','it'=>'lingotti d’oro','pt'=>'barras de ouro','ru'=>'золотые слитки','hi'=>'सोने की छड़ें','tr'=>'altın külçeleri'),
                'gold-index'=>array('ar'=>'مؤشر الذهب','en'=>'gold market index','fr'=>'indice du marché de l’or','de'=>'Goldmarktindex','es'=>'índice del mercado del oro','it'=>'indice del mercato dell’oro','pt'=>'índice do mercado do ouro','ru'=>'индекс рынка золота','hi'=>'सोना बाजार सूचकांक','tr'=>'altın piyasa endeksi'),
                'usd'=>array('ar'=>'أسعار صرف الدولار','en'=>'USD exchange rates','fr'=>'taux de change USD','de'=>'USD-Wechselkurse','es'=>'tipos de cambio USD','it'=>'tassi di cambio USD','pt'=>'taxas de câmbio USD','ru'=>'курсы USD','hi'=>'USD विनिमय दर','tr'=>'USD döviz kurları')
            );
            foreach (array('24k','22k','21k','18k','14k','ounce','coin','gold-bars','gold-index','usd') as $key) {
                $label = isset($labels[$key][$language]) ? $labels[$key][$language] : $labels[$key]['en'];
                $links[] = '<a href="' . esc_url($base . $key . '/') . '">' . esc_html($label) . '</a>';
            }
        }

        $paragraph_market = array(
            'ar'=>'تتغير الأسعار المرجعية مع حركة السوق العالمية وأسعار الصرف وتوقيت تحديث البيانات. لذلك ينبغي مقارنة وقت التحديث والعملة والعيار قبل تفسير أي فرق بين الأسعار.',
            'en'=>'Reference prices can change with global market movements, exchange rates and data-update timing. Compare the timestamp, currency and karat before interpreting differences between displayed values.',
            'fr'=>'Les valeurs de référence évoluent avec les marchés mondiaux, les taux de change et l’heure de mise à jour des données. Comparez la date, la devise et le titrage avant d’interpréter les écarts.',
            'de'=>'Referenzpreise verändern sich durch globale Marktbewegungen, Wechselkurse und den Zeitpunkt der Datenaktualisierung. Vergleichen Sie Datum, Währung und Feingehalt, bevor Sie Preisunterschiede bewerten.',
            'es'=>'Los valores de referencia pueden cambiar por los movimientos del mercado mundial, los tipos de cambio y la hora de actualización. Compare la fecha, la moneda y los quilates antes de interpretar las diferencias.',
            'it'=>'I valori di riferimento possono cambiare in base ai mercati globali, ai tassi di cambio e all’orario di aggiornamento. Confronta data, valuta e caratura prima di interpretare le differenze.',
            'pt'=>'Os valores de referência podem mudar com o mercado global, as taxas de câmbio e o horário da atualização. Compare a data, a moeda e a pureza antes de interpretar diferenças.',
            'ru'=>'Справочные цены меняются под влиянием мирового рынка, валютных курсов и времени обновления данных. Сравнивайте дату, валюту и пробу перед оценкой различий.',
            'hi'=>'संदर्भ कीमतें वैश्विक बाजार, विनिमय दरों और डेटा अपडेट के समय के साथ बदल सकती हैं। अंतर समझने से पहले तारीख, मुद्रा और कैरेट की तुलना करें।',
            'tr'=>'Referans fiyatlar küresel piyasa hareketleri, döviz kurları ve veri güncelleme zamanına göre değişebilir. Farkları yorumlamadan önce tarihi, para birimini ve ayarı karşılaştırın.'
        );
        $disclaimer = array(
            'ar'=>'الأسعار المعروضة استرشادية وتعتمد على البيانات المتاحة للموقع، ولا تشمل بالضرورة المصنعية أو الضرائب أو هامش التاجر. لا تمثل هذه المعلومات نصيحة مالية أو عرض بيع ملزمًا.',
            'en'=>'Displayed prices are indicative and depend on the data available to the site. They do not necessarily include workmanship, taxes or dealer premiums and are not financial advice or a binding offer.',
            'fr'=>'Les prix affichés sont indicatifs et dépendent des données disponibles sur le site. Ils n’incluent pas nécessairement la fabrication, les taxes ou la marge du vendeur et ne constituent ni un conseil financier ni une offre ferme.',
            'de'=>'Die angezeigten Preise sind Richtwerte auf Grundlage der verfügbaren Daten. Verarbeitung, Steuern oder Händlermargen sind möglicherweise nicht enthalten. Die Angaben sind weder Finanzberatung noch ein verbindliches Angebot.',
            'es'=>'Los precios mostrados son orientativos y dependen de los datos disponibles. No incluyen necesariamente fabricación, impuestos o márgenes comerciales, y no constituyen asesoramiento financiero ni una oferta vinculante.',
            'it'=>'I prezzi mostrati sono indicativi e dipendono dai dati disponibili. Potrebbero non includere lavorazione, imposte o margini del venditore e non costituiscono consulenza finanziaria né un’offerta vincolante.',
            'pt'=>'Os preços apresentados são indicativos e dependem dos dados disponíveis. Podem não incluir fabricação, impostos ou margem do vendedor e não constituem aconselhamento financeiro nem uma oferta vinculativa.',
            'ru'=>'Указанные цены являются справочными и зависят от доступных сайту данных. Они могут не включать изготовление, налоги и наценку продавца и не являются финансовой рекомендацией или обязательным предложением.',
            'hi'=>'दिखाई गई कीमतें उपलब्ध डेटा पर आधारित अनुमान हैं। इनमें कारीगरी, कर या विक्रेता का मार्जिन शामिल होना आवश्यक नहीं है। यह वित्तीय सलाह या बाध्यकारी बिक्री प्रस्ताव नहीं है।',
            'tr'=>'Gösterilen fiyatlar mevcut verilere dayalı gösterge niteliğindedir. İşçilik, vergi veya satıcı marjı her zaman dahil değildir. Bu bilgiler finansal tavsiye veya bağlayıcı satış teklifi değildir.'
        );
        $market = isset($paragraph_market[$language]) ? $paragraph_market[$language] : $paragraph_market['en'];
        $note = isset($disclaimer[$language]) ? $disclaimer[$language] : $disclaimer['en'];
        $related_label = array('ar'=>'تابع الأقسام المرتبطة:','en'=>'Related sections:','fr'=>'Rubriques associées :','de'=>'Verwandte Bereiche:','es'=>'Secciones relacionadas:','it'=>'Sezioni correlate:','pt'=>'Seções relacionadas:','ru'=>'Связанные разделы:','hi'=>'संबंधित अनुभाग:','tr'=>'İlgili bölümler:');
        $date_label = array('ar'=>'تاريخ البيانات','en'=>'Data date','fr'=>'Date des données','de'=>'Datenstand','es'=>'Fecha de los datos','it'=>'Data dei dati','pt'=>'Data dos dados','ru'=>'Дата данных','hi'=>'डेटा की तारीख','tr'=>'Veri tarihi');

        $html = '<article class="goldnow-seo-article" lang="' . esc_attr($language) . '" dir="' . esc_attr($dir) . '" aria-label="' . esc_attr($topic[0]) . '" style="direction:' . esc_attr($dir) . ';text-align:' . esc_attr($align) . ';">';
        $html .= '<header><h2>' . esc_html($topic[0] . ($country !== '' ? ' — ' . $country : '')) . '</h2>';
        if ($date !== '') {
            $html .= '<p class="goldnow-seo-date"><small>' . esc_html($date_label[$language]) . ': ' . esc_html($date) . '</small></p>';
        }
        $html .= '</header>';
        $html .= '<section><h3>' . esc_html($topic[1]) . '</h3>';
        $html .= '<p>' . esc_html($topic[2]) . '</p>';
        $html .= $price_sentence;
        $html .= '<p>' . esc_html($market) . '</p>';
        if ($section === 'ounce') {
            $ounce_note = array(
                'ar'=>'يعرض هذا القسم سعر الأونصة العالمية بالدولار الأمريكي فقط. لا يُحوّل هذا الرقم إلى عملة الدولة المختارة داخل هذا المقال.',
                'en'=>'This section displays the global ounce reference in US dollars only. It does not convert that figure into the selected country’s currency in this article.',
                'fr'=>'Cette rubrique affiche uniquement le cours mondial de l’once en dollars américains. Ce montant n’est pas converti dans la monnaie du pays sélectionné dans cet article.',
                'de'=>'Dieser Bereich zeigt ausschließlich den weltweiten Unzen-Referenzkurs in US-Dollar. In diesem Artikel wird der Wert nicht in die Währung des ausgewählten Landes umgerechnet.',
                'es'=>'Esta sección muestra únicamente la referencia mundial de la onza en dólares estadounidenses. En este artículo no se convierte a la moneda del país seleccionado.',
                'it'=>'Questa sezione mostra soltanto il riferimento mondiale dell’oncia in dollari statunitensi. In questo articolo il valore non viene convertito nella valuta del paese selezionato.',
                'pt'=>'Esta seção mostra apenas a referência mundial da onça em dólares americanos. Neste artigo, o valor não é convertido para a moeda do país selecionado.',
                'ru'=>'В этом разделе мировая цена унции указывается только в долларах США. В данной статье сумма не пересчитывается в валюту выбранной страны.',
                'hi'=>'इस अनुभाग में वैश्विक औंस संदर्भ केवल अमेरिकी डॉलर में दिखाया जाता है। इस लेख में इसे चुने हुए देश की मुद्रा में नहीं बदला जाता।',
                'tr'=>'Bu bölümde küresel ons referansı yalnızca ABD dolarıyla gösterilir. Bu makalede tutar seçilen ülkenin para birimine çevrilmez.'
            );
            $html .= '<p class="goldnow-seo-global-ounce">' . esc_html($ounce_note[$language]) . '</p>';
        }
        if ($section === 'coin') {
            $coin_note = array(
                'ar'=>'وزن الحساب المستخدم هنا هو 8 جرامات، مع تطبيق سعر الجرام للعيار المختار. وقد يختلف سعر العملة الفعلية بحسب حالتها وسكّها وهامش البائع.',
                'en'=>'The calculation uses an 8-gram reference weight and the gram rate for the selected karat. An actual coin may be priced differently according to condition, minting and dealer premium.',
                'fr'=>'Le calcul utilise un poids de référence de 8 grammes et le cours du titrage choisi. Le prix réel peut varier selon l’état, la frappe et la marge du vendeur.',
                'de'=>'Die Berechnung verwendet ein Referenzgewicht von 8 Gramm und den Grammpreis der gewählten Legierung. Der tatsächliche Münzpreis kann je nach Zustand, Prägung und Händlermarge abweichen.',
                'es'=>'El cálculo utiliza un peso de referencia de 8 gramos y el precio por gramo del quilate elegido. El precio real puede variar según el estado, la acuñación y el margen del vendedor.',
                'it'=>'Il calcolo utilizza un peso di riferimento di 8 grammi e il prezzo al grammo della caratura scelta. Il prezzo effettivo può variare in base a condizioni, conio e margine del venditore.',
                'pt'=>'O cálculo utiliza um peso de referência de 8 gramas e o preço por grama do quilate escolhido. O preço real pode variar conforme o estado, a cunhagem e a margem do vendedor.',
                'ru'=>'В расчете используется эталонный вес 8 граммов и цена грамма выбранной пробы. Фактическая цена монеты зависит от состояния, чеканки и наценки продавца.',
                'hi'=>'गणना में 8 ग्राम का संदर्भ वजन और चुने हुए कैरेट की प्रति ग्राम दर उपयोग होती है। वास्तविक सिक्के की कीमत उसकी स्थिति, ढलाई और विक्रेता मार्जिन से बदल सकती है।',
                'tr'=>'Hesaplamada 8 gram referans ağırlığı ve seçilen ayarın gram fiyatı kullanılır. Gerçek sikke fiyatı duruma, basıma ve satıcı marjına göre değişebilir.'
            );
            $html .= '<p class="goldnow-seo-coin-method">' . esc_html($coin_note[$language]) . '</p>';
        }
        if ($section === 'gold-bars') {
            $bar_note = array(
                'ar'=>'لمقارنة الأوزان، اضرب سعر جرام عيار 24 في وزن السبيكة. هذه قيمة الذهب التقديرية قبل تكاليف التصنيع والشهادة والتغليف والتوصيل.',
                'en'=>'To compare weights, multiply the 24K gram rate by the bar weight. This estimates the gold content before fabrication, assay, packaging and delivery costs.',
                'fr'=>'Pour comparer les poids, multipliez le cours du gramme 24 carats par le poids du lingot. Cette estimation précède les frais de fabrication, d’analyse, d’emballage et de livraison.',
                'de'=>'Zum Vergleich der Gewichte multiplizieren Sie den 24-Karat-Grammpreis mit dem Barren-Gewicht. Dies schätzt den Goldwert vor Herstellung, Prüfung, Verpackung und Lieferung.',
                'es'=>'Para comparar pesos, multiplique el precio por gramo de 24 quilates por el peso del lingote. Es una estimación previa a fabricación, certificación, embalaje y entrega.',
                'it'=>'Per confrontare i pesi, moltiplica il prezzo al grammo 24 carati per il peso del lingotto. È una stima prima dei costi di produzione, analisi, confezione e consegna.',
                'pt'=>'Para comparar pesos, multiplique o preço por grama de 24 quilates pelo peso da barra. É uma estimativa antes dos custos de fabricação, análise, embalagem e entrega.',
                'ru'=>'Для сравнения веса умножьте цену грамма 24 карата на вес слитка. Это оценка до учета изготовления, проверки, упаковки и доставки.',
                'hi'=>'वजन की तुलना के लिए 24 कैरेट प्रति ग्राम दर को बार के वजन से गुणा करें। यह निर्माण, जांच, पैकेजिंग और डिलीवरी लागत से पहले का अनुमान है।',
                'tr'=>'Ağırlıkları karşılaştırmak için 24 ayar gram fiyatını külçe ağırlığıyla çarpın. Bu tutar üretim, analiz, ambalaj ve teslimat giderlerinden önceki tahmindir.'
            );
            $html .= '<p class="goldnow-seo-bar-method">' . esc_html($bar_note[$language]) . '</p>';
        }
        $faq_heading = array('ar'=>'أسئلة شائعة','en'=>'Frequently asked questions','fr'=>'Questions fréquentes','de'=>'Häufige Fragen','es'=>'Preguntas frecuentes','it'=>'Domande frequenti','pt'=>'Perguntas frequentes','ru'=>'Часто задаваемые вопросы','hi'=>'अक्सर पूछे जाने वाले प्रश्न','tr'=>'Sık sorulan sorular');
        $faq_one_q = array('ar'=>'هل السعر المعروض هو السعر النهائي عند الشراء؟','en'=>'Is the displayed rate the final retail price?','fr'=>'Le cours affiché est-il le prix final en magasin ?','de'=>'Ist der angezeigte Kurs der endgültige Verkaufspreis?','es'=>'¿El precio mostrado es el precio final de venta?','it'=>'Il prezzo mostrato è quello finale al dettaglio?','pt'=>'O preço apresentado é o preço final de venda?','ru'=>'Является ли указанная цена окончательной розничной ценой?','hi'=>'क्या दिखाई गई दर अंतिम खुदरा कीमत है?','tr'=>'Gösterilen fiyat nihai satış fiyatı mıdır?');
        $faq_one_a = array('ar'=>'ليس بالضرورة؛ فقد يضيف البائع المصنعية والضرائب والرسوم أو هامش البيع. السعر هنا مرجع للمقارنة وليس عرضًا نهائيًا.','en'=>'Not necessarily. A seller may add workmanship, taxes, fees or a retail premium. This page provides a reference for comparison, not a final quote.','fr'=>'Pas nécessairement. Le vendeur peut ajouter la fabrication, les taxes, des frais ou une marge. Cette page fournit une référence de comparaison, pas un prix final.','de'=>'Nicht unbedingt. Händler können Verarbeitung, Steuern, Gebühren oder Aufschläge berechnen. Diese Seite bietet einen Vergleichswert und kein endgültiges Angebot.','es'=>'No necesariamente. El vendedor puede añadir mano de obra, impuestos, tasas o un margen. Esta página ofrece una referencia comparativa, no una cotización final.','it'=>'Non necessariamente. Il venditore può aggiungere lavorazione, imposte, commissioni o margini. Questa pagina offre un riferimento, non un prezzo finale.','pt'=>'Não necessariamente. O vendedor pode acrescentar mão de obra, impostos, taxas ou margem. Esta página oferece uma referência de comparação, não uma cotação final.','ru'=>'Не обязательно. Продавец может добавить стоимость работы, налоги, сборы или наценку. Здесь приведена справочная цена для сравнения, а не окончательное предложение.','hi'=>'ज़रूरी नहीं। विक्रेता कारीगरी, कर, शुल्क या अपना मार्जिन जोड़ सकता है। यह पृष्ठ तुलना के लिए संदर्भ देता है, अंतिम कोटेशन नहीं।','tr'=>'Her zaman değil. Satıcı işçilik, vergi, ücret veya kâr payı ekleyebilir. Bu sayfa nihai teklif değil, karşılaştırma için referans sunar.');
        $faq_two_q = array('ar'=>'لماذا يختلف السعر المحلي عن السعر بالدولار؟','en'=>'Why can the local price differ from the USD value?','fr'=>'Pourquoi le prix local peut-il différer de la valeur en USD ?','de'=>'Warum kann der lokale Preis vom USD-Wert abweichen?','es'=>'¿Por qué puede diferir el precio local del valor en USD?','it'=>'Perché il prezzo locale può differire dal valore in USD?','pt'=>'Por que o preço local pode diferir do valor em USD?','ru'=>'Почему местная цена может отличаться от значения в USD?','hi'=>'स्थानीय कीमत USD मूल्य से अलग क्यों हो सकती है?','tr'=>'Yerel fiyat USD değerinden neden farklı olabilir?');
        $faq_two_a = array('ar'=>'تؤثر أسعار صرف العملات وتوقيت تحديث البيانات وظروف السوق المحلية في المقارنة. كما قد تختلف أسعار التنفيذ لدى البنوك والتجار.','en'=>'Exchange rates, data-update timing and local market conditions affect the comparison. Banks and dealers may also apply different transaction rates.','fr'=>'Les taux de change, l’heure de mise à jour et les conditions du marché local influencent la comparaison. Les banques et les vendeurs peuvent appliquer des taux différents.','de'=>'Wechselkurse, Aktualisierungszeitpunkt und lokale Marktbedingungen beeinflussen den Vergleich. Banken und Händler können zudem andere Transaktionskurse verwenden.','es'=>'Los tipos de cambio, la hora de actualización y las condiciones del mercado local influyen en la comparación. Bancos y comerciantes pueden aplicar tipos distintos.','it'=>'Tassi di cambio, orario di aggiornamento e condizioni locali influenzano il confronto. Banche e commercianti possono applicare tassi di transazione diversi.','pt'=>'Taxas de câmbio, horário de atualização e condições locais influenciam a comparação. Bancos e comerciantes podem aplicar taxas diferentes.','ru'=>'На сравнение влияют обменные курсы, время обновления и местные рыночные условия. Банки и продавцы могут применять другие курсы сделок.','hi'=>'विनिमय दर, डेटा अपडेट का समय और स्थानीय बाजार की स्थिति तुलना को प्रभावित करते हैं। बैंक और विक्रेता अलग लेनदेन दरें लागू कर सकते हैं।','tr'=>'Döviz kurları, güncelleme zamanı ve yerel piyasa koşulları karşılaştırmayı etkiler. Bankalar ve satıcılar farklı işlem kurları uygulayabilir.');
        if ($section === 'ounce') {
            $faq_two_q = array('ar'=>'هل يتم تحويل الأونصة العالمية إلى العملة المحلية هنا؟','en'=>'Is the global ounce converted into local currency here?','fr'=>'L’once mondiale est-elle convertie en monnaie locale ici ?','de'=>'Wird die Weltunze hier in die lokale Währung umgerechnet?','es'=>'¿Se convierte aquí la onza mundial a moneda local?','it'=>'L’oncia mondiale viene convertita qui nella valuta locale?','pt'=>'A onça mundial é convertida aqui para a moeda local?','ru'=>'Пересчитывается ли здесь мировая унция в местную валюту?','hi'=>'क्या वैश्विक औंस को यहां स्थानीय मुद्रा में बदला जाता है?','tr'=>'Küresel ons burada yerel para birimine çevriliyor mu?');
            $faq_two_a = array('ar'=>'لا. يعرض هذا القسم سعر الأونصة العالمية بالدولار الأمريكي فقط، بينما تُعرض الأسعار المحلية في أقسامها المنفصلة.','en'=>'No. This section shows the global ounce reference in US dollars only. Local gold prices are shown separately in their relevant sections.','fr'=>'Non. Cette rubrique affiche uniquement le cours mondial de l’once en dollars américains. Les prix locaux sont présentés séparément.','de'=>'Nein. Dieser Bereich zeigt den weltweiten Unzenkurs ausschließlich in US-Dollar. Lokale Goldpreise werden separat angezeigt.','es'=>'No. Esta sección muestra la referencia mundial de la onza solo en dólares estadounidenses. Los precios locales aparecen por separado.','it'=>'No. Questa sezione mostra il riferimento mondiale dell’oncia solo in dollari statunitensi. I prezzi locali sono presentati separatamente.','pt'=>'Não. Esta seção mostra a referência mundial da onça apenas em dólares americanos. Os preços locais são apresentados separadamente.','ru'=>'Нет. В этом разделе мировая цена унции указывается только в долларах США. Местные цены на золото показаны отдельно.','hi'=>'नहीं। यह अनुभाग वैश्विक औंस संदर्भ केवल अमेरिकी डॉलर में दिखाता है। स्थानीय सोने की कीमतें अलग अनुभागों में हैं।','tr'=>'Hayır. Bu bölüm küresel ons referansını yalnızca ABD dolarıyla gösterir. Yerel altın fiyatları ayrı bölümlerde sunulur.');
        } elseif ($section === 'coin') {
            $faq_two_q = array('ar'=>'ما الوزن المستخدم في حساب العملة الذهبية؟','en'=>'What weight is used for the gold coin calculation?','fr'=>'Quel poids est utilisé pour le calcul de la pièce d’or ?','de'=>'Welches Gewicht wird für die Goldmünzenberechnung verwendet?','es'=>'¿Qué peso se utiliza para calcular la moneda de oro?','it'=>'Quale peso viene usato per il calcolo della moneta d’oro?','pt'=>'Qual peso é usado no cálculo da moeda de ouro?','ru'=>'Какой вес используется для расчета золотой монеты?','hi'=>'सोने के सिक्के की गणना में कौन सा वजन उपयोग होता है?','tr'=>'Altın sikke hesabında hangi ağırlık kullanılır?');
            $faq_two_a = array('ar'=>'يحتفظ الموقع بوزن مرجعي قدره 8 جرامات في هذا الحساب، ويُضرب سعر الجرام للعيار المحدد في ثمانية.','en'=>'The site retains an 8-gram reference weight for this calculation. The selected karat’s per-gram rate is multiplied by eight.','fr'=>'Le site conserve un poids de référence de 8 grammes. Le cours au gramme du titrage choisi est multiplié par huit.','de'=>'Die Website verwendet dafür ein Referenzgewicht von 8 Gramm. Der Grammpreis der gewählten Legierung wird mit acht multipliziert.','es'=>'El sitio mantiene un peso de referencia de 8 gramos. El precio por gramo del quilate elegido se multiplica por ocho.','it'=>'Il sito mantiene un peso di riferimento di 8 grammi. Il prezzo al grammo della caratura scelta viene moltiplicato per otto.','pt'=>'O site mantém um peso de referência de 8 gramas. O preço por grama do quilate escolhido é multiplicado por oito.','ru'=>'На сайте для этого расчета сохраняется эталонный вес 8 граммов. Цена грамма выбранной пробы умножается на восемь.','hi'=>'इस गणना के लिए साइट 8 ग्राम का संदर्भ वजन रखती है। चुने हुए कैरेट की प्रति ग्राम दर को आठ से गुणा किया जाता है।','tr'=>'Site bu hesaplamada 8 gram referans ağırlığını korur. Seçilen ayarın gram fiyatı sekizle çarpılır.');
        }
        $html .= '<section class="goldnow-seo-faq"><h3>' . esc_html($faq_heading[$language]) . '</h3>';
        $html .= '<details><summary>' . esc_html($faq_one_q[$language]) . '</summary><p>' . esc_html($faq_one_a[$language]) . '</p></details>';
        $html .= '<details><summary>' . esc_html($faq_two_q[$language]) . '</summary><p>' . esc_html($faq_two_a[$language]) . '</p></details></section>';
        $html .= '</section>';
        if (!empty($links)) {
            $html .= '<nav class="goldnow-seo-related" aria-label="' . esc_attr($related_label[$language]) . '"><p><strong>' . esc_html($related_label[$language]) . '</strong> ' . implode(' · ', $links) . '</p></nav>';
        }
        $html .= '<footer><p class="goldnow-seo-disclaimer">' . esc_html($note) . '</p></footer>';
        $html .= '</article>';
        return $html;
    }
}
