<?php
/* Template Name: Korean — Gold Country Prices (Rebuild) */
// Language-specific country gold-price template. Shared calculations, routes and layout are preserved.
if (!function_exists('altaqrer_gold_ko_localize_output')) {
 function altaqrer_gold_ko_localize_output($html) {
  $map = json_decode('{"Live Gold Prices and Market Overview":"오늘의 금 시세 및 시장 개요","24K Gold Price Today":"오늘의 24K 금 시세","22K Gold Price Today":"오늘의 22K 금 시세","21K Gold Price Today":"오늘의 21K 금 시세","18K Gold Price Today":"오늘의 18K 금 시세","14K Gold Price Today":"오늘의 14K 금 시세","Global Gold Ounce Price Today in USD":"오늘의 국제 금 트로이온스 가격 (USD)","8-Gram Gold Coin Price Today":"오늘의 8그램 금화 가격","Gold Bar Prices Today":"오늘의 골드바 가격","Live Gold Price Index":"실시간 금 가격 지수","USD Exchange Rate":"미국 달러 환율","Updated:":"업데이트:","Frequently asked questions":"자주 묻는 질문","Related gold prices":"관련 금 시세","Important Links":"중요한 링크","Privacy Policy":"개인정보 처리방침","Terms of Use":"이용약관","Contact Us":"문의하기","Follow Us":"팔로우","Join Our Telegram Channel":"텔레그램 채널 참여하기","Gold Price Charts":"금 가격 차트","Gold Bar Prices":"골드바 가격","Gold Price Today":"오늘의 금 시세","per Gram":"그램당","How to read the local and USD prices":"현지 통화 및 USD 가격 확인 방법","How the 8-gram coin value is calculated":"8그램 금화 가격 계산 방법","How to compare gold bullion bar weights":"골드바 중량 비교 방법","How currency movements affect local gold prices":"환율 변동이 국내 금 가격에 미치는 영향","Reference date:":"기준일:","All rights reserved":"저작권 소유","Home":"홈","Gold Prices":"금 시세","Gold Bars":"골드바","Gold Index":"금 가격 지수","USD Rates":"USD 환율","Countries ▾":"국가 ▾","Egypt":"이집트","Saudi Arabia":"사우디아라비아","United Arab Emirates":"아랍에미리트","Kuwait":"쿠웨이트","All Countries":"전체 국가","Live Prices":"실시간 가격","Gold Price Chart":"금 가격 차트","Gold Bars and Coins":"골드바 및 금화","Latest gold bar and coin prices (excluding making charges)":"최신 골드바 및 금화 가격 (가공비 제외)","Weight / Type":"중량 / 종류","Price (USD)":"가격 (USD)","Coin Purity":"금화 순도","8g Gold Coin":"8그램 금화","Important:":"중요:","Sorry, the market data is currently unavailable.":"죄송합니다. 현재 시장 데이터를 이용할 수 없습니다","Gold Price Chart in":"금 가격 차트 -","Charts show indicative market movements. Local prices may differ due to exchange rates, premiums and market conditions.":"차트는 참고용 시장 움직임을 보여줍니다. 현지 가격은 환율, 프리미엄 및 시장 상황에 따라 달라질 수 있습니다","Price in Local Currency:":"현지 통화 가격:","Equivalent in US Dollars:":"미국 달러 환산액:","International Spot Price:":"국제 현물 가격:","Quote Currency:":"표시 통화:","Global Gold Ounce (31.1g):":"국제 금 1트로이온스 (31.1g):","Gold Price Sections":"금 시세 섹션","About AlTaqrer Gold":"AlTaqrer Gold 소개","Gold Coin Prices in ":"의 금화 가격","Gold Bars and Coins in ":"의 골드바 및 금화 가격","Gold Price Today in ":"의 오늘 금 시세","Gold Price per Gram Today in ":"의 오늘 그램당 금 시세","Gold Bullion Bar Prices Today in ":"의 오늘 골드바 가격","Live Gold Market Index Today in ":"의 오늘 실시간 금 가격 지수","US Dollar and Currency Exchange Rates Today in ":"의 오늘 미국 달러 및 환율","International spot benchmark for one troy ounce of 24K gold, quoted in USD":"24K 금 1트로이온스의 국제 현물 기준 가격(USD 표시)","Gold Price in ":"의 금 시세"," live market price, excluding making charges":" 실시간 참고 시세(가공비 제외)","Live Report for ":"실시간 가격 보고서: ","Price in Local Currency":"현지 통화 가격","Equivalent in US Dollars":"미국 달러 환산액","Global Gold Ounce (31.1g)":"국제 금 1트로이온스(31.1g)","International spot price, quoted in USD":"USD 기준 국제 현물 가격","Gold Ounce in Local Currency":"현지 통화 기준 금 온스 가격","Gold Coin (8g)":"금화(8g)","8g Gold Coin (":"8g 금화(","Troy Ounce (31.1 Grams)":"트로이온스(31.1그램)","Today":"오늘","Why the global gold ounce matters":"국제 금 온스 가격이 중요한 이유","What does ":"의 의미: "," gold mean?":" 금이란?","How many grams are in a gold troy ounce?":"금 1트로이온스는 몇 그램인가요?","Is this ounce price converted to local currency?":"이 온스 가격은 현지 통화로 환산되나요?","No. This page shows the international gold ounce benchmark in USD only.":"아니요. 이 페이지는 국제 금 온스 기준 가격을 USD로만 표시합니다.","Gold Bullion Bar Prices in ":"의 골드바 가격","Live Gold Market Index in ":"의 실시간 금 가격 지수","Gold Price Chart in ":"의 금 가격 차트","Gold Prices in ":"의 금 시세","Live exchange rates against ":"대비 실시간 환율","The prices shown above for bars and coins represent":"위에 표시된 골드바와 금화 가격은","gold value only":"금 자체의 가치만을 나타내며","they exclude making charges, hallmarking fees, and taxes.":"가공비, 품질 인증 비용 및 세금은 포함하지 않습니다","Exchange Rate Indicator:":"환율 지표:","US Dollar:":"미국 달러:","British Pound:":"영국 파운드:","Saudi Riyal:":"사우디 리얄:","Bahraini Dinar:":"바레인 디나르:","Omani Rial:":"오만 리알:","Euro:":"유로:","UAE Dirham:":"UAE 디르함:","Kuwaiti Dinar:":"쿠웨이트 디나르:","Qatari Riyal:":"카타르 리얄:","Japanese Yen:":"일본 엔:","Pure 24K Gold:":"순금 24K:","Premium 22K Gold:":"프리미엄 22K 금:","Popular 21K Gold:":"인기 21K 금:","Standard 18K Gold:":"표준 18K 금:","Light 14K Gold:":"14K 금:","Gold Bar — 1 Gram:":"골드바 — 1그램:","Gold Bar — 2.5 Grams:":"골드바 — 2.5그램:","Gold Bar — 5 Grams:":"골드바 — 5그램:","Gold Bar — 10 Grams:":"골드바 — 10그램:","Gold Bar — 20 Grams:":"골드바 — 20그램:","Gold Bar — 50 Grams:":"골드바 — 50그램:","Gold Bar — 100 Grams:":"골드바 — 100그램:","21K Gold Coin (8g):":"21K 금화(8g):","22K Gold Coin (8g):":"22K 금화(8g):","24K Gold Coin (8g):":"24K 금화(8g):"}', true);
  $map = array_merge($map, array(
   "Most Traded" => "가장 많이 거래됨",
   "24K Gold" => "24K 금",
   "22K Gold" => "22K 금",
   "21K Gold" => "21K 금",
   "18K Gold" => "18K 금",
   "14K Gold" => "14K 금",
   "12K Gold" => "12K 금",
   "24K" => "24K",
   "22K" => "22K",
   "21K" => "21K",
   "18K" => "18K",
   "14K" => "14K",
   "12K" => "12K",
   "Global Gold Ounce" => "국제 금 트로이온스",
   "Global Gold Ounce Price Today (USD)" => "오늘의 국제 금 트로이온스 가격 (USD)",
   "Gold Ounce in Local Currency" => "현지 통화 기준 금 온스 가격",
   "Gold Coin" => "금화",
   "Gold Coin Price" => "금화 가격",
   "Gold Coin Price Today" => "오늘의 금화 가격",
   "US Dollar Rate" => "미국 달러 환율",
   "US Dollar Rate Today" => "오늘의 미국 달러 환율",
   "Price in USD" => "USD 가격",
   "Price in Local Currency" => "현지 통화 가격",
   "Gold Price in USD" => "USD 기준 금 가격",
   "Local Currency" => "현지 통화",
   "Egyptian Pound" => "이집트 파운드",
   "ian Pound" => " 파운드",
   "US Dollar" => "미국 달러",
   "British Pound" => "영국 파운드",
   "Saudi Riyal" => "사우디 리얄",
   "Bahraini Dinar" => "바레인 디나르",
   "Omani Rial" => "오만 리알",
   "Euro" => "유로",
   "UAE Dirham" => "UAE 디르함",
   "Kuwaiti Dinar" => "쿠웨이트 디나르",
   "Qatari Riyal" => "카타르 리얄",
   "Japanese Yen" => "일본 엔",
   "Exchange Rate Indicator:" => "환율 지표:",
   "US Dollar:" => "미국 달러:",
   "British Pound:" => "영국 파운드:",
   "Saudi Riyal:" => "사우디 리얄:",
   "Bahraini Dinar:" => "바레인 디나르:",
   "Omani Rial:" => "오만 리알:",
   "Euro:" => "유로:",
   "UAE Dirham:" => "UAE 디르함:",
   "Kuwaiti Dinar:" => "쿠웨이트 디나르:",
   "Qatari Riyal:" => "카타르 리얄:",
   "Japanese Yen:" => "일본 엔:",
   "Live Prices" => "실시간 가격",
   "Gold Bars" => "골드바",
   "Gold Price Chart" => "금 가격 차트",
   "Gold Bars and Coins" => "골드바 및 금화",
   "Gold Bars and Coins in " => "골드바 및 금화 가격 - ",
   "Latest gold bar and coin prices (excluding making charges)" => "최신 골드바 및 금화 가격 (가공비 제외)",
   "About AlTaqrer Gold" => "AlTaqrer Gold 소개",
   " helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes." => "은 지역 및 국제 시장의 금 시세를 확인할 수 있도록 돕습니다. 24K, 22K, 21K, 18K, 14K 금의 실시간 기준 가격을 살펴보고 골드바와 8그램 금화의 가치를 비교하며 USD 기준 국제 금 트로이온스 가격을 확인할 수 있습니다. 가격은 정보 제공 및 비교 목적으로 제공되며 실제 소매 가격에는 세공비, 프리미엄 및 세금이 포함될 수 있습니다",
   "USD and Currency Rates" => "USD 및 환율",
   "Gold Price" => "금 시세",
   "Gold Prices" => "금 시세",
   "Gold Price Today" => "오늘의 금 시세",
   "Gold Price Today in " => "오늘의 금 시세 - ",
   "24K Gold Price Today in " => "오늘의 24K 금 시세 - ",
   "22K Gold Price Today in " => "오늘의 22K 금 시세 - ",
   "21K Gold Price per Gram Today in " => "오늘의 21K 금 그램당 가격 - ",
   "18K Gold Price Today in " => "오늘의 18K 금 시세 - ",
   "14K Gold Price Today in " => "오늘의 14K 금 시세 - ",
   "Gold Coin Price Today in " => "오늘의 금화 가격 - ",
   "Gold Bullion Bar Prices Today in " => "오늘의 골드바 가격 - ",
   "Live Gold Market Index Today in " => "오늘의 실시간 금 가격 지수 - ",
   "US Dollar and Currency Exchange Rates Today in " => "오늘의 미국 달러 및 환율 - ",
   "The gold tracker monitors the latest movements in " => "금 시세 추적기는 다음의 최신 가격 변동을 실시간으로 추적합니다: ",
   "Gold prices in " => "의 금 시세",
   " in real time" => " 실시간으로",
   " using regional market data and the international gold stock exchange rate for (" => "지역 시장 데이터와 국제 금 거래소 환율을 사용합니다 (",
   "This report lets you track live gold prices across all categories, including " => "이 보고서에서는 다음을 포함한 모든 종류의 실시간 금 시세를 확인할 수 있습니다: ",
   "21K gold price today" => "오늘의 21K 금 가격",
   " — the most widely traded purity — as well as " => " — 가장 많이 거래되는 순도 — 및 ",
   "22K gold" => "22K 금",
   "18K gold" => "18K 금",
   " value options, and " => " 가격과 ",
   "14K gold" => "14K 금",
   "The tracker also covers precious-metal prices, jewellery markets, and daily market movements. It also helps compare local-currency values with the international USD benchmark when reviewing daily price changes." => "또한 귀금속 가격, 주얼리 시장 및 일일 시장 변동도 다룹니다.",
   "It also helps compare local-currency values with the international USD benchmark when reviewing daily price changes." => "일일 가격 변동을 살펴볼 때 현지 통화 가격과 국제 USD 기준 가격을 비교하는 데에도 도움이 됩니다.",
   "Live market data, excluding making charges, puts the " => "세공비를 제외한 실시간 시장 데이터에 따르면 ",
   "24K gold price per gram" => "24K 금 1그램 가격",
   " at approximately " => "은 약 ",
   " US dollars" => " 미국 달러",
   ". This purity is the primary standard for " => "입니다. 이 순도는 높은 정제도 때문에",
   "gold bars" => "골드바",
   " because of its high refinement status." => "의 주요 기준으로 사용됩니다.",
   "global gold ounce price today" => "오늘의 국제 금 온스 가격",
   " (31.1 grams of 24K gold) is " => "(24K 금 31.1그램)은 ",
   " USD. This is the international spot benchmark; local gold prices are converted separately using the latest available exchange rate." => " USD입니다. 이는 국제 현물 기준 가격이며 현지 금 가격은 최신 환율을 사용해 별도로 환산됩니다.",
   "For savers and investors, the " => "저축자와 투자자에게 ",
   "gold coin price today" => "오늘의 금화 가격",
   " (an 8-gram coin in the widely traded 21K purity) is approximately " => "(널리 거래되는 21K 순도의 8그램 금화)는 약 ",
   "To help preserve the value of your savings, tracking the " => "저축 가치를 보존하는 데 도움이 되도록 ",
   "live gold market index" => "실시간 금 시장 지수",
   "Prices of gold bars" => "골드바 가격",
   " across weights from 1 gram to 1 kilogram can help you follow market movements when considering a purchase or sale." => "을 1그램부터 1킬로그램까지 중량별로 추적하면 매수 또는 매도를 고려할 때 시장 움직임을 파악하는 데 도움이 됩니다.",
   "Local gold prices move with exchange rates." => "현지 금 가격은 환율에 따라 변동합니다.",
   "US dollar exchange rate today in " => "오늘의 현지 미국 달러 환율은 ",
   " per US dollar, based on the latest available market data." => "미국 달러당이며 최신 시장 데이터를 기준으로 합니다.",
   "Download the " => "가격 알림을 받으려면 ",
   "gold prices app" => "금 시세 앱",
   " for timely price alerts." => "을 다운로드하세요.",
   "Prices of gold live in " => "실시간 금 시세 - ",
   "Global Gold Ounce Price Today in USD" => "오늘의 국제 금 트로이온스 가격 (USD)",
   "8-Gram Gold Coin Price Today in " => "오늘의 8그램 금화 가격 - "
  ));
  // Final Korean coverage for visible template text that was still hard-coded in English.
  $map = array_merge($map, array(
    "Gold Bars" => "골드바",
    "Gold Coin" => "금화",
    "Gold Ounce" => "금 트로이온스",
    "Gold Index" => "금 시세 지수",
    "USD and Currency Rates" => "미국 달러 및 환율",
    "Live Prices" => "실시간 금 시세",
    "24K Gold Price Today" => "오늘의 24캐럿 금 시세",
    "22K Gold Price Today" => "오늘의 22캐럿 금 시세",
    "21K Gold Price Today" => "오늘의 21캐럿 금 시세",
    "18K Gold Price Today" => "오늘의 18캐럿 금 시세",
    "14K Gold Price Today" => "오늘의 14캐럿 금 시세",
    "12K Gold Price Today" => "오늘의 12캐럿 금 시세",
    "Most Traded" => "가장 많이 거래됨",
    "24K" => "24캐럿",
    "22K" => "22캐럿",
    "21K" => "21캐럿",
    "18K" => "18캐럿",
    "14K" => "14캐럿",
    "12K" => "12캐럿",
    "Gold Bars and Coins" => "골드바 및 금화",
    "Gold Bars and Coins in " => "골드바 및 금화 가격 - ",
    "Gold Price Sections" => "금 시세 메뉴",
    "Regional Gold Prices" => "지역별 금 시세",
    "Live Gold Index" => "실시간 금 시세 지수",
    "About AlTaqrer Gold" => "AlTaqrer Gold 소개",
    "Follow Us" => "소셜 채널",
    "Important Links" => "주요 링크",
    "All rights reserved" => "모든 권리 보유",
    "Home" => "홈",
    "Main navigation" => "주요 메뉴",
    "Gold Price Charts" => "금 시세 차트",
    "Gold Bar Prices Today" => "오늘의 골드바 가격",
    "Gold Bullion Bar Prices in " => "골드바 가격 - ",
    "Gold Coin Prices in " => "금화 가격 - ",
    "Gold Coin Price Today in " => "오늘의 금화 가격 - ",
    "Weight / Type" => "중량 / 종류",
    "Price (" => "가격 (",
    "Price (USD)" => "가격 (미국 달러)",
    "Coin Purity" => "금화 순도",
    "Gold Bar — 1 Gram" => "골드바 — 1그램",
    "Gold Bar — 2.5 Grams" => "골드바 — 2.5그램",
    "Gold Bar — 5 Grams" => "골드바 — 5그램",
    "Gold Bar — 10 Grams" => "골드바 — 10그램",
    "Gold Bar — 20 Grams" => "골드바 — 20그램",
    "Gold Bar — 50 Grams" => "골드바 — 50그램",
    "Gold Bar — 100 Grams" => "골드바 — 100그램",
    "Gold Bar — 1 Gram:" => "골드바 — 1그램:",
    "Gold Bar — 2.5 Grams:" => "골드바 — 2.5그램:",
    "Gold Bar — 5 Grams:" => "골드바 — 5그램:",
    "Gold Bar — 10 Grams:" => "골드바 — 10그램:",
    "Gold Bar — 20 Grams:" => "골드바 — 20그램:",
    "Gold Bar — 50 Grams:" => "골드바 — 50그램:",
    "Gold Bar — 100 Grams:" => "골드바 — 100그램:",
    "8g Gold Coin (" => "8그램 금화 (",
    "21K Gold Coin (8g):" => "21캐럿 금화 (8그램):",
    "22K Gold Coin (8g):" => "22캐럿 금화 (8그램):",
    "24K Gold Coin (8g):" => "24캐럿 금화 (8그램):",
    "21K Gold Price Movement" => "21캐럿 금 가격 변동",
    "Gold Price Movement" => "금 가격 변동",
    "Updated:" => "업데이트:",
    "Reference date:" => "기준일:",
    "Prices are indicative and may change with the market." => "표시된 가격은 참고용이며 시장 상황에 따라 변동될 수 있습니다.",
    "Prices are indicative and reflect the latest available data returned to this page; they may change as market and exchange-rate data are updated." => "표시된 가격은 이 페이지에서 확인할 수 있는 최신 자료를 바탕으로 한 참고 가격입니다. 시장과 환율 자료가 갱신되면 가격도 달라질 수 있습니다.",
    "Live foreign exchange rates for major international and regional currencies" => "주요 국제 통화와 지역 통화의 실시간 환율",
    "Latest gold bar and coin prices (excluding making charges)" => "세공비를 제외한 최신 골드바 및 금화 가격",
    "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "미국 달러로 표시한 24캐럿 금 1트로이온스의 국제 현물 기준 가격",
    "Gold Price Today in " => "오늘의 금 시세 - ",
    "24K Gold Price Today in " => "오늘의 24캐럿 금 시세 - ",
    "22K Gold Price Today in " => "오늘의 22캐럿 금 시세 - ",
    "21K Gold Price per Gram Today in " => "오늘의 21캐럿 금 1그램 가격 - ",
    "18K Gold Price Today in " => "오늘의 18캐럿 금 시세 - ",
    "14K Gold Price Today in " => "오늘의 14캐럿 금 시세 - ",
    "Gold Price Chart in" => "금 시세 차트 -",
    "Gold Price Chart in " => "금 시세 차트 - ",
    "Global Gold Ounce Price Today in USD" => "오늘의 국제 금 1트로이온스 가격 (미국 달러)",
    "8-Gram Gold Coin Price Today in " => "오늘의 8그램 금화 가격 - ",
    "Live Gold Market Index and Karat Prices in " => "실시간 금 시세 지수 및 순도별 가격 - ",
    "USD Exchange Rate and Currency Conversion in " => "미국 달러 환율 및 통화 환산 - ",
    "What does " => "의 의미: ",
    " gold mean?" => " 금이란 무엇인가요?",
    "How to read the local and USD prices" => "현지 통화와 미국 달러 가격 읽는 방법",
    "Related gold prices" => "관련 금 시세",
    "Frequently asked questions" => "자주 묻는 질문",
    "Why the global gold ounce matters" => "국제 금 1트로이온스 가격이 중요한 이유",
    "From the global ounce to a local gram price" => "국제 온스 가격을 현지 그램 가격으로 환산하는 방법",
    "How the 8-gram coin value is calculated" => "8그램 금화 가격 계산 방법",
    "How to compare gold bullion bar weights" => "골드바 중량별 가격 비교 방법",
    "What the gold index helps you compare" => "금 시세 지수로 비교할 수 있는 항목",
    "How currency movements affect local gold prices" => "환율 변동이 현지 금 가격에 미치는 영향",
    "Is this ounce price converted to local currency?" => "이 온스 가격은 현지 통화로 환산되나요?",
    "How many grams are in a gold troy ounce?" => "금 1트로이온스는 몇 그램인가요?",
    "What weight is used for the gold coin calculation?" => "금화 가격 계산에 사용하는 중량은 얼마인가요?",
    "Does the displayed value include a dealer premium?" => "표시된 가격에 판매자 프리미엄이 포함되나요?",
    "Are the gold bar prices inclusive of making charges?" => "골드바 가격에 세공비가 포함되어 있나요?",
    "Why can two bars of the same weight have different prices?" => "중량이 같은 골드바의 가격이 서로 다른 이유는 무엇인가요?",
    "Does the index show a guaranteed market trading price?" => "금 시세 지수는 확정된 거래 가격을 보여주나요?",
    "Why are different karats priced differently?" => "금의 순도에 따라 가격이 다른 이유는 무엇인가요?",
    "Is this exchange rate the rate offered by every bank?" => "이 환율은 모든 은행에서 적용하는 환율인가요?",
    "Why does the dollar rate matter for gold?" => "금 가격에서 달러 환율이 중요한 이유는 무엇인가요?",
    "Gold Price Today" => "오늘의 금 시세",
    "Gold Prices" => "금 시세",
    "Gold Price" => "금 시세",
    "Gold Price Chart" => "금 시세 차트",
    "USD Rates" => "미국 달러 환율",
    "Countries ▾" => "국가 ▾",
    "Egypt" => "이집트",
    "Saudi Arabia" => "사우디아라비아",
    "United Arab Emirates" => "아랍에미리트",
    "Kuwait" => "쿠웨이트",
    "All Countries" => "전체 국가",
    "Gold Prices in Egypt" => "이집트 금 시세",
    "Gold Prices in Saudi Arabia" => "사우디아라비아 금 시세",
    "Gold Prices in the UAE" => "아랍에미리트 금 시세",
    "Gold Prices in Kuwait" => "쿠웨이트 금 시세",
    "Join Our Telegram Channel" => "텔레그램 채널 참여하기",
    "Privacy Policy" => "개인정보 처리방침",
    "Terms of Use" => "이용약관",
    "Contact Us" => "문의하기",
    "Flag of " => "국기: ",
    "Track the latest " => "최신 시세 확인: ",
    "gold price today" => "오늘의 금 시세",
    "gold bars" => "골드바",
    "gold bar prices" => "골드바 가격",
    "gold coin price today" => "오늘의 금화 가격",
    "global gold spot benchmark" => "국제 금 현물 기준 가격",
    "global gold ounce" => "국제 금 1트로이온스",
    "Gold bar prices today" => "오늘의 골드바 가격",
    "Gold coin price today" => "오늘의 금화 가격",
    "Price in Local Currency:" => "현지 통화 가격:",
    "Equivalent in US Dollars:" => "미국 달러 환산 가격:",
    "International Spot Price:" => "국제 현물 가격:",
    "Quote Currency:" => "표시 통화:",
    "Exchange Rate Indicator:" => "환율 지표:",
    "Pure 24K Gold:" => "순도 24캐럿 금:",
    "Premium 22K Gold:" => "순도 22캐럿 금:",
    "Popular 21K Gold:" => "순도 21캐럿 금:",
    "Standard 18K Gold:" => "순도 18캐럿 금:",
    "Light 14K Gold:" => "순도 14캐럿 금:",
    "US Dollar:" => "미국 달러:",
    "British Pound:" => "영국 파운드:",
    "Saudi Riyal:" => "사우디 리얄:",
    "Bahraini Dinar:" => "바레인 디나르:",
    "Omani Rial:" => "오만 리알:",
    "Euro:" => "유로:",
    "UAE Dirham:" => "아랍에미리트 디르함:",
    "Kuwaiti Dinar:" => "쿠웨이트 디나르:",
    "Qatari Riyal:" => "카타르 리얄:",
    "Japanese Yen:" => "일본 엔:",
    "Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today’s movement." => "국제 시장에서는 금 가격을 주로 트로이온스로 표시합니다. 거래업체와 정련업체, 금융기관 및 금괴 판매업체는 이 기준을 활용해 여러 시장의 금 가치를 비교합니다. 미국 달러의 움직임, 금리 전망, 물가 예상, 중앙은행의 활동과 투자 수요 등이 국제 금 가격에 영향을 줄 수 있습니다. 이는 일반적인 시장 요인에 대한 설명이며, 특정 요인이 오늘의 가격 변동을 일으켰다고 단정하는 것은 아닙니다.",
    "The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site’s established 8-gram coin calculation." => "금화의 기준 가격은 해당 순도의 1그램 가격에 8그램을 곱해 계산합니다. 일반적으로 많이 비교하는 21캐럿 금화는 21캐럿 1그램 가격의 8배로 산출합니다. 22캐럿과 24캐럿 금화도 같은 중량에 각 순도의 그램당 가격을 적용합니다. 기존 사이트에서 사용하던 8그램 금화 계산 방식은 그대로 유지됩니다.",
    "For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page." => "골드바의 기준 가격은 24캐럿 금 1그램 가격에 골드바의 중량을 곱해 간단히 계산할 수 있습니다. 이렇게 산출한 금액은 제조 프리미엄, 순도 분석 및 인증 비용, 판매 수수료, 배송비와 세금을 더하기 전의 금 자체 가치입니다. 따라서 실제 판매 가격은 이 페이지의 단순 계산값보다 높을 수 있습니다.",
    "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "현지 금 가격은 국제 금 기준 가격을 현지 통화로 환산해 산출하며, 실제 판매 시에는 지역별 프리미엄과 세금 및 기타 비용이 더해질 수 있습니다. 이 페이지의 통화 비교 자료는 환산 기준을 이해하는 데 도움을 주기 위한 것입니다. 표시된 환율은 참고용이며 은행, 현금 환전소, 카드사 또는 해외 송금 서비스에서 개인에게 적용하는 환율과 다를 수 있습니다.",
    "No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable." => "아니요. 이 페이지에는 국제 금 1트로이온스 기준 가격을 미국 달러로만 표시합니다. 현지 통화 가격은 해당하는 국가별 금 시세 표에 별도로 표시됩니다.",
    "No. The table estimates the gold value only and excludes fabrication, certification, dealer premiums, and taxes." => "아니요. 표에 표시된 금액은 금 자체의 가치만을 계산한 것으로 제조비, 인증 비용, 판매자 프리미엄과 세금은 포함하지 않습니다.",
    "No. It is an informational reference based on the latest available data used by the site. Actual transaction prices may include local premiums and fees." => "아니요. 사이트에서 제공하는 최신 자료를 바탕으로 한 정보용 기준 가격입니다. 실제 거래 가격에는 현지 프리미엄과 수수료가 추가될 수 있습니다.",
    "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values." => "국제 금 가격은 일반적으로 미국 달러로 표시됩니다. 따라서 국제 기준 가격을 현지 통화로 환산하는 과정은 현지 금 가격을 산정하는 주요 요소 중 하나입니다.",
    "No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees." => "아니요. 사이트에서 제공하는 최신 참고 환율입니다. 은행과 환전 업체마다 매입·매도 환율과 환전 차액 및 수수료가 다를 수 있습니다."
  ));
  $protected = array();
  $html = preg_replace_callback('~<!--.*?-->|<(script|style)\\b[^>]*>.*?</\\1\\s*>~is', function($m) use (&$protected) { $k='LANGBLOCK'.count($protected).'TOKEN'; $protected[$k]=$m[0]; return $k; }, $html);
  $html = preg_replace_callback('~>([^<>]+)<~u', function($m) use ($map) { return '>'.strtr($m[1], $map).'<'; }, $html);
  $html = preg_replace_callback("~\\b(alt|title|aria-label|placeholder)\\s*=\\s*([\\\"'])(.*?)\\2~isu", function($m) use ($map) { return $m[1].'='.$m[2].strtr($m[3],$map).$m[2]; }, $html);
  return strtr($html, $protected);
 }
}
ob_start('altaqrer_gold_ko_localize_output');
/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$ko_header_term = get_queried_object();
$ko_header_country_slug = (is_object($ko_header_term) && !empty($ko_header_term->slug))
    ? sanitize_title($ko_header_term->slug)
    : '';
if ($ko_header_country_slug === '' && is_object($ko_header_term) && !empty($ko_header_term->term_id)) {
    $ko_header_country_slug = strtolower((string) get_term_meta((int) $ko_header_term->term_id, 'country_code', true));
}
if ($ko_header_country_slug === '') {
    $ko_header_country_slug = 'eg';
}
$ko_header_country_url = home_url('/ko/country/' . rawurlencode($ko_header_country_slug) . '/');
$ko_header_home_url = home_url('/ko/');
$ko_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$ko_header_logo_id = (int) get_theme_mod('custom_logo');
$ko_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="manifest" href="<?php echo esc_url(site_url('/manifest.json')); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_site_icon_url(32)); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_site_icon_url(16)); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_site_icon_url(180)); ?>">
<link rel="shortcut icon" href="<?php echo esc_url(get_site_icon_url()); ?>" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet';">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></noscript>
<?php
// Preserve the original working AdSense header output and app-view condition.
$ad_options = get_option('adsense_header_settings');
$ad_code    = isset($ad_options['adsense_code']) ? $ad_options['adsense_code'] : '';
$is_enabled = isset($ad_options['enable_adsense']) ? $ad_options['enable_adsense'] : 0;

if ($is_enabled && !empty($ad_code) && !(isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app')) {
    echo "\n<!-- بداية كود أدسنس (Header) -->\n";
    echo $ad_code;
    echo "\n<!-- نهاية كود أدسنس -->\n";
}
?>
<?php
// EN SEO metadata: unique Rank Math title and description for every gold section.
$ko_meta_term = get_queried_object();
$ko_meta_term_id = (is_object($ko_meta_term) && isset($ko_meta_term->term_id)) ? (int) $ko_meta_term->term_id : 0;
$ko_meta_code = $ko_meta_term_id ? strtolower((string) get_term_meta($ko_meta_term_id, 'country_code', true)) : '';
$ko_meta_names = array('eg'=>'이집트','sa'=>'사우디아라비아','ae'=>'아랍에미리트','kw'=>'쿠웨이트','qa'=>'카타르','bh'=>'바레인','om'=>'오만','jo'=>'요르단','iq'=>'이라크','ma'=>'모로코','tn'=>'튀니지','dz'=>'알제리','tr'=>'튀르키예','us'=>'미국','gb'=>'영국','in'=>'인도','jp'=>'일본','kr'=>'대한민국','vn'=>'베트남','id'=>'인도네시아','th'=>'태국');
$ko_meta_country = isset($ko_meta_names[$ko_meta_code]) ? $ko_meta_names[$ko_meta_code] : '각 국가';
$ko_meta_view = sanitize_key((string) get_query_var('gold_view'));
$ko_meta_titles = array(
 ''=>'오늘의 금 시세와 시장 동향 - '.$ko_meta_country,
 '24k'=>'오늘의 24캐럿 순금 가격 - '.$ko_meta_country,
 '22k'=>'오늘의 22캐럿 금 가격 - '.$ko_meta_country,
 '21k'=>'오늘의 21캐럿 금 가격 - '.$ko_meta_country,
 '18k'=>'오늘의 18캐럿 금 가격 - '.$ko_meta_country,
 '14k'=>'오늘의 14캐럿 금 가격 - '.$ko_meta_country,
 'ounce'=>'국제 금 트로이온스 가격 - USD',
 'coin'=>'표준 8그램 금화 가격 - '.$ko_meta_country,
 'gold-bars'=>'금괴 중량별 가격 - '.$ko_meta_country,
 'gold-index'=>'실시간 금 시세 지수 - '.$ko_meta_country,
 'usd'=>'미국 달러 환율과 주요 통화 - '.$ko_meta_country
);
$ko_meta_descriptions = array(
 ''=>$ko_meta_country.'의 실시간 금 시세를 확인하고 24K부터 14K까지의 가격, 국제 금 시세, 8그램 금화, 금괴 및 환율을 비교하세요.',
 '24k'=>$ko_meta_country.'의 24캐럿 순금 1그램 가격과 USD 환산액을 확인하세요. 국제 시세와 환율이 가격에 미치는 영향도 살펴볼 수 있습니다.',
 '22k'=>$ko_meta_country.'의 22캐럿 금 1그램 가격과 순금 함량을 확인하고 24캐럿 금과의 차이 및 장신구 가격에 더해질 수 있는 비용을 알아보세요.',
 '21k'=>$ko_meta_country.'의 21캐럿 금 1그램 시세와 USD 환산액을 확인하세요. 금 함량과 8그램 금화 가격을 이해하는 데 필요한 기준 정보를 제공합니다.',
 '18k'=>$ko_meta_country.'의 18캐럿 금 가격과 순금 함량, 내구성 및 다른 순도와의 가격 차이를 비교하세요.',
 '14k'=>$ko_meta_country.'의 14캐럿 금 시세와 1그램 기준 가격, 합금의 특성 및 구매 전 확인할 사항을 살펴보세요.',
 'ounce'=>'국제 시장에서 거래되는 금 1트로이온스의 가격을 USD로 확인하세요. 약 31.1035그램의 24캐럿 금을 기준으로 하며 현지 통화 가격과 구분됩니다.',
 'coin'=>$ko_meta_country.'의 표준 8그램 금화 가격을 21K, 22K 및 24K 기준으로 비교하세요. 표시 금액은 금 함량의 가치이며 별도 비용은 포함하지 않습니다.',
 'gold-bars'=>$ko_meta_country.'의 24캐럿 금괴 가격을 다양한 중량별로 비교하세요. 계산 기준과 인증 비용, 세공비 및 세금의 차이를 알아보세요.',
 'gold-index'=>$ko_meta_country.'의 주요 금 순도별 가격과 국제 금 시세를 비교하세요. 지수의 구성과 시장 변동을 해석하는 방법을 안내합니다.',
 'usd'=>$ko_meta_country.'의 미국 달러 환율과 주요 통화의 환산 기준을 확인하세요. 환율 변화가 현지 금 가격에 미치는 영향도 살펴보세요.'
);
$ko_meta_title = isset($ko_meta_titles[$ko_meta_view]) ? $ko_meta_titles[$ko_meta_view] : '오늘의 24K 금 시세 (' . $ko_meta_country;
$ko_meta_description = isset($ko_meta_descriptions[$ko_meta_view]) ? $ko_meta_descriptions[$ko_meta_view] : '의 24K 금 그램당 기준 가격을 확인하고 다른 순도와 비교하세요.' . $ko_meta_country;
add_filter('rank_math/frontend/title', function ($title) use ($ko_meta_title) {
    return $ko_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($ko_meta_description) {
    return $ko_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $ko_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.ko-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($ko_header_accent); ?>; color:#fff; }
.ko-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.en-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.en-main-nav a, .en-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.en-main-nav a:hover, .en-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($ko_header_accent); ?>; }
.en-country-wrap { position:relative; }
.en-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.en-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.en-country-menu.is-open { display:block; }
@media(max-width:760px) { .ko-site-header-inner { align-items:flex-start; flex-direction:column; } .en-main-nav { justify-content:flex-start; width:100%; } .en-main-nav a,.en-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .en-main-nav { gap:6px; } .en-main-nav a,.en-country-toggle { font-size:12px; } }
.gold-tabs-nav { display:flex; justify-content:center; flex-wrap:wrap; gap:5px; }
.gold-tab-btn { flex:1 1 auto; text-align:center; background:#fff8e1; border:1px solid #dfb551; padding:10px 0; cursor:pointer; font-weight:bold; border-radius:6px; transition:.3s; color:#3a2e0a; }
.gold-tab-btn.active { background:#b8860b; color:#fff; border-color:#b8860b; }
.gold-section { margin-bottom:25px; }
#tab-buy-sell > h2, #tab-buy-sell > h3 { text-align:left !important; direction:ltr !important; }
.section-header { display:flex; justify-content:space-between; align-items:center; background:#b8860b; padding:12px 15px; border-radius:8px 8px 0 0; border:1px solid #b8860b; color:#fff; }
.section-header h4 { margin:0; font-size:18px; font-weight:bold; color:#fff; }
.date-badge { background:#fff8e1; padding:2px 8px; border-radius:4px; font-size:12px; color:#b8860b; font-weight:bold; }
.table-responsive { overflow-x:auto; }
.gold-table { width:100%; background:#fff8e1; border-collapse:collapse; border:1px solid #dfb551; border-radius:0 0 8px 8px; }
.gold-table thead { background:#dfb551; }
.gold-table th { padding:12px; color:#2c2107; border-bottom:2px solid #b8860b; font-size:15px; text-align:center; }
.gold-table td { padding:12px; border-bottom:1px solid #dfb551; color:#3a2e0a; text-align:center; vertical-align:middle; }
.gold-table tr:last-child td { border-bottom:none; }
.gold-table tr:hover { background:#ffe8b3; }
.font-bold { font-weight:bold; text-align:left !important; }
.price-cell { font-weight:bold; color:#b8860b; font-size:16px; }
.usd-cell { font-weight:bold; color:#2c2107; font-size:16px; direction:ltr; }
.raw-gold-alert { background:#fff8e1; border:1px solid #dfb551; border-left:5px solid #b8860b; color:#5a4a1b; padding:15px; border-radius:4px; font-size:14px; line-height:1.6; box-shadow:0 2px 5px rgba(0,0,0,.05); }
.alert-icon { font-size:18px; margin-right:5px; }
.ko-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($ko_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.ko-seo-article h2,.ko-seo-article h3 { color:#fff; line-height:1.35; }
.ko-seo-article h2 { font-size:23px; margin:0 0 14px; }
.ko-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.ko-seo-article p { margin:0 0 13px; }
.ko-seo-article a { color:<?php echo esc_attr($ko_header_accent); ?>; text-decoration:none; font-weight:700; }
.ko-seo-article a:hover { text-decoration:underline; }
.ko-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.ko-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.ko-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.ko-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($ko_header_accent); ?>; }
.ko-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.ko-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.ko-site-footer p,.ko-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.ko-site-footer ul { list-style:none; padding:0; margin:0; }
.ko-site-footer a { color:#e0b94f; text-decoration:none; }
.ko-site-footer a:hover { text-decoration:underline; }
.ko-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .ko-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('en-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$ko_header_is_app) : ?>
<header class="ko-site-header">
  <div class="ko-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($ko_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($ko_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($ko_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="en-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($ko_header_home_url); ?>">Home</a>
      <a href="<?php echo esc_url($ko_header_country_url); ?>">Gold Prices</a>
      <a href="<?php echo esc_url($ko_header_country_url . 'gold-bars/'); ?>">Gold Bars</a>
      <a href="<?php echo esc_url($ko_header_country_url . 'gold-index/'); ?>">Gold Index</a>
      <a href="<?php echo esc_url($ko_header_country_url . 'usd/'); ?>">USD Rates</a>
      <div class="en-country-wrap">
        <button class="en-country-toggle" type="button" aria-expanded="false" aria-controls="en-country-menu">Countries ▾</button>
        <div class="en-country-menu" id="en-country-menu">
          <a href="<?php echo esc_url(home_url('/ko/country/eg/')); ?>">Egypt</a>
          <a href="<?php echo esc_url(home_url('/ko/country/sa/')); ?>">Saudi Arabia</a>
          <a href="<?php echo esc_url(home_url('/ko/country/ae/')); ?>">United Arab Emirates</a>
          <a href="<?php echo esc_url(home_url('/ko/country/kw/')); ?>">Kuwait</a>
          <a href="<?php echo esc_url($ko_header_home_url); ?>">All Countries</a>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php endif; ?>

<?php
/**
 * Place the existing Customizer advertisement immediately below the English
 * title/logo and navigation. Do not duplicate the AdSenseHeaderManager output.
 */
if (!$ko_header_is_app && function_exists('goldnow_display_ad')) :
?>
<div class="en-top-header-ad" style="width:100%;max-width:1200px;margin:0 auto;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_navbar'); ?>
</div>
<?php endif; ?>

<?php
/**
 * language-specific text adapter for shortcode HTML.
 * It translates visible text and accessibility labels only; URLs, HTML structure,
 * CSS and JavaScript are deliberately left untouched.
 */
if (!function_exists('altaqrer_gold_ko_translate_shortcode_html')) {
    function altaqrer_gold_ko_translate_shortcode_html($html, $translations = array()) {
        if (!is_string($html) || $html === '' || empty($translations) || !is_array($translations)) {
            return $html;
        }

        $translations = array_merge($translations, array(
    "Live Prices" => "실시간 금 시세",
    "Gold Price" => "금 시세",
    "Gold Prices" => "금 시세",
    "Gold Bars" => "골드바",
    "Gold Price Chart" => "금 시세 차트",
    "Gold Ounce" => "금 트로이온스",
    "Gold Coin" => "금화",
    "Gold Index" => "금 시세 지수",
    "USD and Currency Rates" => "USD 및 환율",
    "24K" => "24K 금",
    "22K" => "22K 금",
    "21K" => "21K 금",
    "18K" => "18K 금",
    "14K" => "14K 금",
    "12K" => "12K 금",
    "Home" => "홈",
    "USD Rates" => "USD 환율",
    "Countries ▾" => "국가 ▾",
    "Egypt" => "이집트",
    "Saudi Arabia" => "사우디아라비아",
    "United Arab Emirates" => "아랍에미리트",
    "Kuwait" => "쿠웨이트",
    "All Countries" => "전체 국가",
    "Prices of gold live in " => "실시간 금 시세 - ",
    "Gold Prices in " => "금 시세 - ",
    "Gold Price in " => "금 시세 - ",
    "Gold Bars and Coins in " => "골드바 및 금화 가격 - ",
    "Gold Coin Prices in " => "금화 가격 - ",
    "Gold Price Today in " => "오늘의 금 시세 - ",
    "24K Gold Price Today in " => "오늘의 24K 금 시세 - ",
    "22K Gold Price Today in " => "오늘의 22K 금 시세 - ",
    "21K Gold Price per Gram Today in " => "오늘의 21K 금 1그램 가격 - ",
    "18K Gold Price Today in " => "오늘의 18K 금 시세 - ",
    "14K Gold Price Today in " => "오늘의 14K 금 시세 - ",
    "Gold Bullion Bar Prices Today in " => "오늘의 골드바 가격 - ",
    "Live Gold Market Index Today in " => "오늘의 실시간 금 시세 지수 - ",
    "US Dollar and Currency Exchange Rates Today in " => "오늘의 미국 달러 및 환율 - ",
    "Gold Coin Price Today in " => "오늘의 금화 가격 - ",
    "Gold Bullion Bar Prices in " => "골드바 가격 - ",
    "Gold Price Chart in" => "금 시세 차트 -",
    "Gold Price Chart in " => "금 시세 차트 -",
    "Gold Bars and Coins" => "골드바 및 금화",
    "Live foreign exchange rates for major international and regional currencies" => "주요 국제 및 지역 통화의 실시간 환율",
    "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "USD로 표시되는 24K 금 1트로이온스의 국제 현물 기준 가격",
    " live market price, excluding making charges" => " 실시간 참고 시세(세공비 제외)",
    "Latest gold bar and coin prices (excluding making charges)" => "최신 골드바 및 금화 가격 (세공비 제외)",
    "Weight / Type" => "중량 / 종류",
    "Price (" => "가격 (",
    "Price (USD)" => "가격 (USD)",
    "Coin Purity" => "금화 순도",
    "8g Gold Coin (" => "8g 금화 (",
    "Gold Bar — 1 Gram" => "골드바 — 1그램",
    "Gold Bar — 2.5 Grams" => "골드바 — 2.5그램",
    "Gold Bar — 5 Grams" => "골드바 — 5그램",
    "Gold Bar — 10 Grams" => "골드바 — 10그램",
    "Gold Bar — 20 Grams" => "골드바 — 20그램",
    "Gold Bar — 50 Grams" => "골드바 — 50그램",
    "Gold Bar — 100 Grams" => "골드바 — 100그램",
    "Troy Ounce (31.1 g)" => "트로이온스 (31.1그램)",
    "Important:" => "중요:",
    "The prices shown above for bars and coins represent" => "위에 표시된 골드바와 금화 가격은",
    "gold value only" => "금 자체의 가치만을 나타내며",
    "they exclude making charges, hallmarking fees, and taxes." => "세공비, 품질 인증 비용 및 세금은 포함하지 않습니다.",
    "Sorry, the market data is currently unavailable." => "죄송합니다. 현재 시장 데이터를 이용할 수 없습니다.",
    "Charts show indicative market movements. Local prices may differ due to exchange rates, premiums and market conditions." => "차트는 참고용 시장 움직임을 보여줍니다. 현지 가격은 환율, 프리미엄 및 시장 상황에 따라 달라질 수 있습니다.",
    "21K Gold Price Movement" => "21K 금 가격 변동",
    "Gold Price Movement" => "금 가격 변동",
    "Updated:" => "업데이트:",
    "Reference date:" => "기준일:",
    "Prices are indicative and may change with the market." => "가격은 참고용이며 시장 상황에 따라 변동될 수 있습니다.",
    "Live Gold Market Index in " => "실시간 금 시세 지수 - ",
    "Pure 24K Gold:" => "순금 24K:",
    "Premium 22K Gold:" => "고급 22K 금:",
    "Popular 21K Gold:" => "인기 21K 금:",
    "Standard 18K Gold:" => "표준 18K 금:",
    "Light 14K Gold:" => "14K 금:",
    "Value:" => "가격:",
    "Global Gold Ounce (31.1g):" => "국제 금 트로이온스 (31.1g):",
    "International spot price, quoted in USD" => "USD 기준 국제 현물 가격",
    "This index compares the main gold purities in " => "이 지수는 다음 지역의 주요 금 순도별 가격을 국제 현물 기준 가격과 비교합니다: ",
    " with the international spot benchmark. The global ounce benchmark is quoted in USD only; it is not converted into local currency. Retail making charges and dealer premiums are not included." => "의 국제 현물 기준 가격을 비교합니다. 국제 금 트로이온스 기준 가격은 USD로만 표시되며 현지 통화로 환산되지 않습니다. 소매 세공비와 판매자 프리미엄은 포함되지 않습니다.",
    " (Pure 24K Gold):" => " (순도 24K 금):",
    "Gold Bar — 1 Gram:" => "골드바 — 1그램:",
    "Gold Bar — 2.5 Grams:" => "골드바 — 2.5그램:",
    "Gold Bar — 5 Grams:" => "골드바 — 5그램:",
    "Gold Bar — 10 Grams:" => "골드바 — 10그램:",
    "Gold Bar — 20 Grams:" => "골드바 — 20그램:",
    "Gold Bar — 50 Grams:" => "골드바 — 50그램:",
    "Gold Bar — 100 Grams:" => "골드바 — 100그램:",
    "Gold Bar Prices Today" => "오늘의 골드바 가격",
    "This tracker provides structural tracking of " => "이 추적 도구는 다음 금 가격을 지속적으로 확인합니다: ",
    "Gold bar prices today" => "오늘의 골드바 가격",
    " composed exclusively of 999.9 pure 24K gold. Gold bullion bar accumulation remains a primary hedge for wealth conservation and long-term liquidity protection inside " => "은 순도 999.9의 24K 순금으로 구성됩니다. 골드바 축적은 자산 가치를 보존하고 장기적인 유동성을 보호하기 위한 주요 수단으로 여겨집니다. ",
    " against macroeconomic inflation." => "의 거시경제적 인플레이션에 대비하여.",
    " (Standard 8 Gram Weight):" => " (표준 중량 8그램):",
    "21K Gold Coin (8g):" => "21K 금화 (8g):",
    "22K Gold Coin (8g):" => "22K 금화 (8g):",
    "24K Gold Coin (8g):" => "24K 금화 (8g):",
    "Get live updates on the current " => "현재 금화 가격의 실시간 업데이트를 확인하세요: ",
    "Gold coin price today" => "오늘의 금화 가격",
    " within the investment markets of " => "의 투자 시장에서 ",
    ". Sovereign gold coins weighing exactly 8 grams are widely monitored as safe haven physical assets." => " 정확히 8그램인 금화는 안전자산인 실물 자산으로 널리 주목받고 있습니다.",
    "Live Exchange Rates against " => "대비 실시간 환율 - ",
    " in " => " - ",
    "US Dollar:" => "미국 달러:",
    "British Pound:" => "영국 파운드:",
    "Saudi Riyal:" => "사우디 리얄:",
    "Bahraini Dinar:" => "바레인 디나르:",
    "Omani Rial:" => "오만 리알:",
    "Euro:" => "유로:",
    "UAE Dirham:" => "UAE 디르함:",
    "Kuwaiti Dinar:" => "쿠웨이트 디나르:",
    "Qatari Riyal:" => "카타르 리얄:",
    "Japanese Yen:" => "일본 엔:",
    "This dynamic index monitors banking cross rates. Local gold price benchmarks scale directly with exchange fluctuations against global reserves." => "이 실시간 지수는 주요 통화 간 은행 환율을 추적합니다. 현지 금 가격의 기준은 국제 외환 시장 대비 환율 변동에 따라 직접 달라집니다.",
    "Live Report for 24K Gold Price per Gram Today in " => "오늘의 24K 금 1그램 실시간 시세 - ",
    "Live Report for 22K Gold Price per Gram Today in " => "오늘의 22K 금 1그램 실시간 시세 - ",
    "Live Report for 21K Gold Price per Gram Today in " => "오늘의 21K 금 1그램 실시간 시세 - ",
    "Live Report for 18K Gold Price per Gram Today in " => "오늘의 18K 금 1그램 실시간 시세 - ",
    "Live Report for 14K Gold Price per Gram Today in " => "오늘의 14K 금 1그램 실시간 시세 - ",
    "Price in Local Currency:" => "현지 통화 가격:",
    "Equivalent in US Dollars:" => "미국 달러 환산 가격:",
    "The live " => "실시간 ",
    "24K gold price per gram today" => "오늘의 24K 금 1그램 가격",
    " stands at " => "은 ",
    ". Characterized by 99.9% purity, this karat is the industrial asset benchmark for bullion production." => "입니다. 순도 99.9%의 24K 금은 골드바 생산에 사용되는 산업 표준 기준입니다.",
    "The premium " => "프리미엄 ",
    "22K gold price per gram today" => "오늘의 22K 금 1그램 가격",
    " registers at " => "은 ",
    ". It balances high intrinsic precious metal content with raw structural durability." => "입니다. 높은 귀금속 함량과 구조적 내구성의 균형을 갖춘 순도입니다.",
    "The widely requested " => "수요가 많은 ",
    "21K gold price per gram today" => "오늘의 21K 금 1그램 가격",
    " trades at " => "은 ",
    ". This karat accounts for the vast majority of local consumer jewelry trading." => "입니다. 이 순도는 현지 소비자 주얼리 거래에서 큰 비중을 차지합니다.",
    "Market updates place the standard " => "시장 업데이트에 따르면 표준 ",
    "18K gold price per gram today" => "오늘의 18K 금 1그램 가격",
    " at " => "은 ",
    " offering an economical choice for luxury jewelry work." => "입니다. 고급 주얼리 제작에 경제적인 선택지를 제공합니다.",
    "The programmatic index values " => "자동 산출 지수에 따르면 ",
    "14K gold price per gram today" => "오늘의 14K 금 1그램 가격",
    " presenting a durable alloy framework for constant retail utility." => "입니다. 내구성이 뛰어난 합금으로 일상적인 제품에 적합합니다.",
    "Global Gold Ounce Price Today (31.1g):" => "오늘의 국제 금 트로이온스 가격 (31.1g):",
    "International Spot Price:" => "국제 현물 가격:",
    "Quote Currency:" => "표시 통화:",
    "US Dollar (USD)" => "미국 달러 (USD)",
    "The global gold ounce is priced internationally in US dollars and represents 31.1 grams of 24K gold. Local-currency conversions are intentionally excluded from this global benchmark; local gold prices are calculated separately using the applicable exchange rate." => "국제 금 트로이온스 가격은 미국 달러로 표시되며 24K 금 31.1그램을 기준으로 합니다. 이 국제 기준 가격에는 현지 통화 환산을 포함하지 않으며, 현지 금 가격은 해당 환율을 사용해 별도로 계산됩니다.",
    "The gold tracker monitors the latest movements in " => "금 시세 추적기는 다음 지역의 최신 금 가격 변동을 실시간으로 확인합니다: ",
    "Gold prices in " => "금 가격 - ",
    " in real time" => " 실시간",
    " using regional market data and the international gold stock exchange rate for (" => " 지역 시장 데이터와 국제 금 시장 환율을 기준으로 합니다 (",
    "This report lets you track live gold prices across all categories, including " => "이 보고서를 통해 다음을 포함한 모든 종류의 금 시세를 실시간으로 확인할 수 있습니다: ",
    "21K gold price today" => "오늘의 21K 금 가격",
    " — the most widely traded purity — as well as " => " — 가장 널리 거래되는 순도 — 및 ",
    "22K gold" => "22K 금",
    "18K gold" => "18K 금",
    " value options, and " => " 가격과 ",
    "14K gold" => "14K 금",
    "The tracker also covers precious-metal prices, jewellery markets, and daily market movements." => "또한 귀금속 가격, 주얼리 시장 및 일일 시장 변동도 함께 확인할 수 있습니다.",
    "Live market data, excluding making charges, puts the " => "세공비를 제외한 실시간 시장 데이터에 따르면 ",
    " at approximately " => "은 약 ",
    " US dollars" => " 미국 달러",
    " This purity is the primary standard for " => "입니다. 이 순도는 높은 정제도로 인해 ",
    "gold bars" => "골드바",
    " because of its high refinement status." => "의 주요 기준으로 사용됩니다.",
    "global gold ounce price today" => "오늘의 국제 금 트로이온스 가격",
    " (31.1 grams of 24K gold) is " => " (24K 금 31.1그램 기준) 가격은 ",
    " USD. This is the international spot benchmark; local gold prices are converted separately using the latest available exchange rate." => " USD입니다. 이는 국제 현물 기준 가격이며 현지 금 가격은 최신 환율을 적용해 별도로 환산됩니다.",
    "For savers and investors, the " => "저축자와 투자자에게 ",
    "gold coin price today" => "오늘의 금화 가격",
    " (an 8-gram coin in the widely traded 21K purity) is approximately " => " (널리 거래되는 21K 순도의 8그램 금화) 가격은 약 ",
    "To help preserve the value of your savings, tracking the " => "저축 가치를 보존하기 위해 다음 항목을 추적하면 도움이 됩니다: ",
    "live gold market index" => "실시간 금 시장 지수",
    "Prices of gold bars" => "골드바 가격",
    " across weights from 1 gram to 1 kilogram can help you follow market movements when considering a purchase or sale." => "1그램부터 1킬로그램까지 다양한 중량의 가격을 확인하면 구매 또는 판매를 고려할 때 시장 흐름을 파악할 수 있습니다.",
    "Exchange Rate Indicator:" => "환율 지표:",
    "Local gold prices move with exchange rates." => "현지 금 가격은 환율에 따라 변동합니다.",
    "US dollar exchange rate today in " => "오늘의 미국 달러 환율 - ",
    " per US dollar, based on the latest available market data." => "(미국 달러당)이며 최신 시장 데이터를 기준으로 합니다.",
    "Download the " => "다운로드: ",
    "gold prices app" => "금 시세 앱",
    " for timely price alerts." => " 가격 알림을 빠르게 받아보세요.",
    " per Gram" => " 그램당",
    "Follow the latest " => "최신 시세를 확인하세요: ",
    " gold price today in " => " 금 시세 - ",
    " with the live reference shown above. The current indicative value is " => " 위의 실시간 기준 가격을 통해 확인할 수 있습니다. 현재 참고 가격은 ",
    " per gram, equivalent to approximately " => "/그램이며 약 ",
    ". These figures are calculated from the latest available 24K reference price, the purity factor for " => "입니다. 이 수치는 최신 24K 기준 가격, ",
    " gold, and the latest available currency conversion used by the site." => " 금의 순도 계수 및 사이트에서 사용하는 최신 환율을 바탕으로 계산됩니다.",
    "What does " => "의 의미: ",
    " gold mean?" => " 금이란?",
    "Karat indicates the proportion of pure gold in an alloy. 24K is treated as the pure-gold reference, while lower karats contain a greater share of other metals. The " => "캐럿은 합금에 포함된 순금의 비율을 나타냅니다. 24K는 순금 기준으로 사용되며, 캐럿 수가 낮을수록 다른 금속의 비율이 높아집니다. ",
    " rate therefore reflects its gold content rather than the finished retail price of a jewellery item. The final shop price may also include workmanship, retailer premiums, taxes, and other local charges that are not included in the raw market value displayed here." => " 시세는 완제품 주얼리의 소매 가격이 아니라 금 함량을 반영합니다. 실제 판매 가격에는 세공비, 판매자 프리미엄, 세금 및 기타 현지 비용이 추가될 수 있으며, 이는 여기에 표시된 원자재 기준 가격에 포함되지 않습니다.",
    "How to read the local and USD prices" => "현지 통화 및 USD 가격 확인 방법",
    "The local-currency figure helps compare the reference value in " => "현지 통화 가격은 다음 지역의 기준 가치를 비교하는 데 도움이 되며: ",
    " while the USD equivalent makes it easier to compare the same gold content with international quotations. Local prices can move when the global gold benchmark changes, when exchange rates change, or when local market conditions affect premiums. The figures on this page are indicative reference values, not a guaranteed buy-back or retail offer." => " USD 환산 가격은 동일한 금 함량을 국제 시세와 비교하기 쉽게 해줍니다. 국제 금 기준 가격, 환율 또는 현지 시장의 프리미엄이 변하면 현지 가격도 변동할 수 있습니다. 이 페이지의 수치는 참고용이며 확정된 매입 또는 소매 판매 가격이 아닙니다.",
    "Related gold prices" => "관련 금 시세",
    "Compare this rate with " => "이 가격을 다음 시세와 비교해 보세요: ",
    "24K gold" => "24K 금",
    "21K gold" => "21K 금",
    "gold bar prices" => "골드바 가격",
    " and the " => " 및 ",
    " for a broader view of the market." => "를 확인하면 시장을 더 폭넓게 파악할 수 있습니다.",
    "Frequently asked questions" => "자주 묻는 질문",
    "Is the displayed " => "표시된 ",
    " price the final jewellery shop price?" => " 가격은 주얼리 매장의 최종 판매 가격인가요?",
    "No. It is an indicative raw-gold reference and excludes workmanship, retailer premiums, taxes, and any other charges that may apply to a finished item." => "아니요. 이는 원금 기준 참고 가격이며 세공비, 판매자 프리미엄, 세금 및 완제품에 적용될 수 있는 기타 비용은 포함하지 않습니다.",
    "Why is the USD equivalent different from the local price?" => "USD 환산 가격이 현지 가격과 다른 이유는 무엇인가요?",
    "The two values use different currencies. The local figure is converted using the latest available exchange-rate data used by the site; the USD figure represents the corresponding gold value in US dollars." => "두 가격은 서로 다른 통화를 사용하기 때문입니다. 현지 가격은 사이트에서 사용하는 최신 환율 데이터로 환산되며, USD 가격은 동일한 금 가치를 미국 달러로 나타냅니다.",
    "Global Gold Ounce Price Today in USD" => "오늘의 국제 금 트로이온스 가격 (USD)",
    "The international gold ounce reference on this page is " => "이 페이지의 국제 금 트로이온스 기준 가격은 ",
    " for one troy ounce of approximately 31.1 grams of 24K gold. This is the " => "약 31.1그램의 24K 금 1트로이온스 기준입니다. 이는 ",
    "global gold spot benchmark" => "국제 금 현물 기준 가격",
    " quoted in US dollars. It is deliberately not presented as a country-specific local-currency ounce price; local gram prices are converted separately for the selected country." => "이며 미국 달러로 표시됩니다. 특정 국가의 현지 통화 기준 온스 가격으로 표시하지 않으며, 현지 그램 가격은 선택한 국가에 맞춰 별도로 환산됩니다.",
    "Why the global gold ounce matters" => "국제 금 트로이온스 가격이 중요한 이유",
    "Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today’s movement." => "국제 시장에서 금은 일반적으로 트로이온스 단위로 거래됩니다. 거래업자, 정련업체, 금융 서비스 및 금괴 판매업자는 이 기준을 사용해 시장 간 금 가치를 비교합니다. 미국 달러, 금리 전망, 인플레이션 예상, 중앙은행 활동 및 투자 수요의 변화는 국제 금 가격에 영향을 줄 수 있습니다. 이는 일반적인 시장 요인이며 특정 요인이 오늘의 변동을 일으켰다는 의미는 아닙니다.",
    "From the global ounce to a local gram price" => "국제 온스 가격에서 현지 그램 가격으로",
    "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "간단한 비교 기준으로 트로이온스 1개는 약 31.1그램입니다. 현지 그램당 가격은 선택한 환율과 현지 시장 상황에도 영향을 받습니다. 위의 국제 온스 가격은 국제 시세와 일관되게 비교할 수 있도록 USD로 유지됩니다.",
    "Continue to the " => "다음 페이지도 확인해 보세요: ",
    "gold price in " => " 금 시세 - ",
    "24K gold per gram" => "24K 금 1그램 가격",
    " or open the " => " 또는 다음 페이지를 여세요: ",
    "gold market index" => "금 시세 지수",
    "." => "。",
    "How many grams are in a gold troy ounce?" => "금 1트로이온스는 몇 그램인가요?",
    "One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "트로이온스 1개는 약 31.1035그램입니다. 이 페이지의 기준 계산에는 31.1그램을 사용합니다.",
    "Is this ounce price converted to local currency?" => "이 온스 가격은 현지 통화로 환산되나요?",
    "No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable." => "아니요. 이 페이지는 국제 금 온스 기준 가격을 USD로만 표시합니다. 해당하는 경우 현지 통화 가격은 국가별 금 시세 표에 별도로 표시됩니다.",
    "8-Gram Gold Coin Price Today in " => "오늘의 8그램 금화 가격 - ",
    "Track the reference value of an " => "다음 금화의 기준 가격을 확인하세요: ",
    "8-gram gold coin" => "8그램 금화",
    ". Using the current gram prices, the indicative 21K coin value is " => "입니다. 현재 그램당 가격을 기준으로 계산한 21K 금화의 참고 가격은 ",
    " (about " => " (약 ",
    " USD). The page also compares 22K and 24K values for the same 8-gram weight so that the effect of purity is clear." => " USD)입니다. 이 페이지는 순도에 따른 차이를 쉽게 비교할 수 있도록 동일한 8그램 중량의 22K 및 24K 가격도 함께 제공합니다.",
    "How the 8-gram coin value is calculated" => "8그램 금화 가격 계산 방법",
    "The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site’s established 8-gram coin calculation." => "계산은 해당 순도의 그램당 금 가격에 8그램을 곱하는 방식입니다. 일반적인 21K 기준 가격은 21K 그램당 가격에 8을 곱해 산출합니다. 22K 및 24K 비교 가격도 같은 중량에 각 순도의 그램당 가격을 적용합니다. 이는 사이트에서 기존에 사용하던 8그램 금화 계산 방식을 유지합니다.",
    "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote. Compare the " => "실제 금화 가격은 주조 상태, 디자인, 희소성, 판매자 프리미엄 및 현지 세금에 따라 달라질 수 있습니다. 여기에 표시된 값은 금 함량 기준 가격이며 확정 거래 가격이 아닙니다. 다음 가격도 비교해 보세요: ",
    "21K gold gram price" => "21K 금 1그램 가격",
    "22K gold price" => "22K 금 가격",
    "What weight is used for the gold coin calculation?" => "금화 계산에는 어떤 중량을 사용하나요?",
    "This page retains the site’s standard 8-gram calculation for the gold coin comparison." => "이 페이지는 금화 비교를 위해 사이트의 표준 8그램 계산 방식을 유지합니다.",
    "Does the displayed value include a dealer premium?" => "표시된 가격에 판매자 프리미엄이 포함되나요?",
    "No. It estimates the gold content only and does not include minting costs, dealer premiums, workmanship, or taxes." => "아니요. 금 함량만을 기준으로 산출하며 주조 비용, 판매자 프리미엄, 세공비 또는 세금은 포함하지 않습니다.",
    "Gold Bar Prices Today in " => "오늘의 골드바 가격 - ",
    "Gold bars are commonly valued using the 24K gold benchmark. Based on the current 24K reference of " => "골드바는 일반적으로 24K 금 기준 가격으로 평가됩니다. 현재 24K 기준 가격인 ",
    " per gram (approximately " => "/그램 (약 ",
    "), a 10-gram bar has an indicative gold-content value of " => ")을 기준으로 하면 10그램 골드바의 금 함량 참고 가격은 ",
    " while a 100-gram bar is approximately " => "이며 100그램 골드바는 약 ",
    ". The table above lists additional weights for quick comparison." => "입니다. 위 표에는 빠른 비교를 위한 다른 중량도 표시되어 있습니다.",
    "How to compare gold bullion bar weights" => "골드바 중량 비교 방법",
    "For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page." => "간단한 추정 가격은 24K 그램당 기준 가격에 골드바 중량을 곱해 계산합니다. 이 값은 제조 프리미엄, 분석 또는 품질 인증 비용, 판매자 마진, 배송비 및 세금을 더하기 전의 금 함량 기준 가격입니다. 따라서 실제 판매 가격은 이 페이지의 기본 계산값보다 높을 수 있습니다.",
    "Check the bar's stated purity, exact weight, certification, manufacturer, and seller reputation before a transaction. The " => "거래하기 전에 골드바의 표시 순도, 정확한 중량, 인증, 제조업체 및 판매자의 신뢰도를 확인하세요. ",
    "24K gold price" => "24K 금 가격",
    " is the key per-gram reference, while the " => "은 핵심적인 그램당 기준 가격이며 ",
    "global gold ounce" => "국제 금 트로이온스",
    " provides an international comparison in USD." => "는 USD 기준의 국제 비교 가격을 제공합니다.",
    "Are the gold bar prices inclusive of making charges?" => "골드바 가격에 세공비가 포함되어 있나요?",
    "No. The table estimates the gold value only and excludes fabrication, certification, dealer premiums, and taxes." => "아니요. 표는 금 자체의 가치만 추정하며 제조비, 인증 비용, 판매자 프리미엄 및 세금은 제외합니다.",
    "Why can two bars of the same weight have different prices?" => "같은 중량의 골드바라도 가격이 다른 이유는 무엇인가요?",
    "Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price." => "브랜드, 인증, 제조 비용, 판매자 프리미엄, 재고 상황 및 현지 세금이 최종 판매 가격에 영향을 줄 수 있습니다.",
    "Gold Price Charts" => "금 시세 차트",
    "Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "국제 XAU/USD 시장 차트를 통해 미국 달러(USD) 기준 국제 금 현물 가격을 확인하세요. 이는 전 세계 공통 기준 가격이며 특정 국가의 소매 가격이 아닙니다.",
    "Live Gold Market Index and Karat Prices in " => "실시간 금 시장 지수 및 순도별 금 가격 - ",
    "This gold market overview brings together the latest available reference values for several purities. The current 24K benchmark is " => "이 금 시장 개요는 여러 순도에 대한 최신 기준 가격을 한눈에 보여줍니다. 현재 24K 기준 가격은 ",
    " per gram, while 22K is approximately " => "/그램이며 22K는 약 ",
    " and 21K is approximately " => "이고 21K는 약 ",
    ". The global troy ounce is " => "입니다. 국제 금 트로이온스 가격은 ",
    ". This global benchmark is quoted in USD only and is not converted into the selected country's local currency." => "입니다. 이 국제 기준 가격은 USD로만 표시되며 선택한 국가의 현지 통화로 환산되지 않습니다.",
    "What the gold index helps you compare" => "금 시세 지수로 비교할 수 있는 항목",
    "The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market." => "이 지수는 일반적인 순도와 통화별 금 가격을 간편하게 보여줍니다. 24K 골드바 기준 가격과 주얼리에 흔히 사용되는 낮은 순도의 가격을 비교할 수 있습니다. 현지 가격은 기준 금 가격과 이용 가능한 환율 데이터를 바탕으로 산출되며 USD 가격은 국제 시장과 비교하는 데 도움이 됩니다.",
    "Gold prices can respond to global spot-market activity, currency movements, interest-rate expectations, inflation concerns, and changes in investment demand. A single snapshot does not establish a trend, so readers should compare updates over time before drawing conclusions. Visit the " => "금 가격은 국제 현물 시장의 움직임, 환율, 금리 전망, 인플레이션 우려 및 투자 수요 변화에 영향을 받을 수 있습니다. 한 시점의 데이터만으로 추세를 단정할 수 없으므로 결론을 내리기 전에 시간에 따른 업데이트를 비교하세요. 다음 페이지도 확인하세요: ",
    "21K price page" => "21K 가격 페이지",
    "24K price page" => "24K 가격 페이지",
    "global ounce page" => "국제 금 온스 페이지",
    "Does the index show a guaranteed market trading price?" => "이 지수는 확정된 시장 거래 가격을 보여주나요?",
    "No. It is an informational reference based on the latest available data used by the site. Actual transaction prices may include local premiums and fees." => "아니요. 사이트에서 사용하는 최신 데이터를 바탕으로 한 정보 제공용 기준 가격입니다. 실제 거래 가격에는 현지 프리미엄과 수수료가 포함될 수 있습니다.",
    "Why are different karats priced differently?" => "순도에 따라 금 가격이 다른 이유는 무엇인가요?",
    "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered." => "캐럿마다 순금 함량이 다릅니다. 다른 비용을 고려하기 전, 순도가 낮은 합금은 24K 금보다 그램당 순금 가치가 낮습니다.",
    "USD Exchange Rate and Currency Conversion in " => "USD 환율 및 통화 환산 - ",
    "The latest available reference used by this page values one US dollar at approximately " => "이 페이지에서 사용하는 최신 기준에 따르면 미국 달러 1달러의 가치는 약 ",
    ". Exchange rates matter to gold buyers because international bullion prices are commonly quoted in USD. When the local currency changes against the dollar, the converted local value of gold can change even if the international USD gold price remains steady." => "입니다. 국제 골드바 가격은 일반적으로 USD로 표시되므로 환율은 금 구매자에게 중요합니다. 국제 USD 금 가격이 변하지 않더라도 현지 통화가 달러 대비 변동하면 환산된 현지 금 가격은 달라질 수 있습니다.",
    "How currency movements affect local gold prices" => "환율 변동이 현지 금 가격에 미치는 영향",
    "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "현지 금 가격 추정치는 국제 금 기준 가격과 환율을 결합하며 실제 소매 시장에서는 현지 프리미엄, 세금 또는 기타 비용이 추가될 수 있습니다. 이 페이지는 환산 기준을 이해할 수 있도록 일부 통화의 비교 가격을 제공합니다. 환율은 참고용이며 개인 고객이 은행, 현금 시장, 카드 또는 송금 서비스에서 적용받는 환율과 다를 수 있습니다.",
    "For the gold side of the comparison, review the " => "금 가격을 비교하려면 다음 항목을 확인하세요: ",
    "24K gram price" => "24K 그램당 가격",
    "21K gram price" => "21K 그램당 가격",
    "international gold ounce in USD" => "USD 기준 국제 금 트로이온스 가격",
    "Is this exchange rate the rate offered by every bank?" => "이 환율은 모든 은행에서 제공하는 환율인가요?",
    "No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees." => "아니요. 사이트에서 사용하는 최신 기준 환율입니다. 은행과 환전 서비스 제공업체는 서로 다른 매입 및 매도 환율, 스프레드 또는 수수료를 적용할 수 있습니다.",
    "Why does the dollar rate matter for gold?" => "금 가격에서 달러 환율이 중요한 이유는 무엇인가요?",
    "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values." => "국제 금 가격은 일반적으로 미국 달러로 표시되므로, 해당 기준 가격을 현지 통화로 환산하는 것은 현지 금 가격을 추정하는 요소 중 하나입니다.",
    "Prices are indicative and reflect the latest available data returned to this page; they may change as market and exchange-rate data are updated." => "가격은 참고용이며 이 페이지에 제공된 최신 데이터를 반영합니다. 시장 및 환율 데이터가 업데이트되면 변동될 수 있습니다.",
    "About AlTaqrer Gold" => "AlTaqrer Gold 소개",
    " helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes." => "는 지역 및 국제 시장의 금 시세를 확인할 수 있도록 돕습니다. 24K, 22K, 21K, 18K, 14K 금의 실시간 기준 가격을 확인하고 골드바와 8그램 금화의 가치를 비교하며 USD 기준 국제 금 트로이온스 가격을 추적할 수 있습니다. 가격은 정보 제공 및 비교 목적으로 제공되며 실제 소매 가격에는 세공비, 프리미엄 및 세금이 포함될 수 있습니다.",
    "Gold Price Sections" => "금 시세 메뉴",
    "Live Gold Index" => "실시간 금 시세 지수",
    "Regional Gold Prices" => "지역별 금 시세",
    "Follow Us" => "팔로우",
    "Join Our Telegram Channel" => "텔레그램 채널 참여하기",
    "Privacy Policy" => "개인정보 처리방침",
    "Terms of Use" => "이용약관",
    "Contact Us" => "문의하기",
    "Important Links" => "중요한 링크",
    "All rights reserved" => "저작권 소유",
    "Gold Prices in Egypt" => "이집트 금 시세",
    "Gold Prices in Saudi Arabia" => "사우디아라비아 금 시세",
    "Gold Prices in the UAE" => "UAE 금 시세",
    "Gold Prices in Kuwait" => "쿠웨이트 금 시세",
    "Flag of " => "국기: "
   ));
   $translations = array_merge($translations, array(
    "Updated:" => "업데이트:",
    " · Prices are indicative and may change with the market." => " · 가격은 참고용이며 시장 상황에 따라 변동될 수 있습니다",
    "* Updates are performed programmatically via official live market indices. We advise installing the official " => "* 공식 실시간 시장 지수를 통해 데이터가 자동으로 업데이트됩니다. 공식 앱 설치를 권장합니다: ",
    "금 가격 차트를 불러오는 중..." => "금 가격 차트를 불러오는 중...",
    "차트 데이터를 불러올 수 없습니다. 다시 시도해 주세요" => "차트 데이터를 불러올 수 없습니다. 다시 시도해 주세요",
    "Gold Price in " => "금 시세 - ",
    "Gold Price Sections" => "금 시세 메뉴"
   ));
   $protected = array();
        $html = preg_replace_callback('~<!--.*?-->|<(script|style)\\b[^>]*>.*?</\\1\\s*>~is', function ($m) use (&$protected) {
            $token = 'ALTQRGOLDENBLOCK' . count($protected) . 'TOKEN';
            $protected[$token] = $m[0];
            return $token;
        }, $html);

        // Translate text nodes only, never href/src or other structural attributes.
        $html = preg_replace_callback('~>([^<>]+)<~u', function ($m) use ($translations) {
            return '>' . strtr($m[1], $translations) . '<';
        }, $html);

        // Translate visible/accessibility attributes only.
        $html = preg_replace_callback("~\\b(alt|title|aria-label|placeholder)\\s*=\\s*([\"'])(.*?)\\2~isu", function ($m) use ($translations) {
            return $m[1] . '=' . $m[2] . strtr($m[3], $translations) . $m[2];
        }, $html);

        if (!empty($protected)) {
            $html = strtr($html, $protected);
        }
        return $html;
    }
}
?>

<main class="p-0 font-2">
  <div class="container home px-2">
    <?php
    // 1) Resolve the current country safely and use its English taxonomy metadata.
    $current_term = get_queried_object();
    $arabic_country_name = (is_object($current_term) && isset($current_term->name)) ? (string) $current_term->name : '';
    $term_id = (is_object($current_term) && isset($current_term->term_id)) ? (int) $current_term->term_id : 0;

    $english_name = $term_id ? (string) get_term_meta($term_id, 'country_english_name', true) : '';
    $country_code = $term_id ? (string) get_term_meta($term_id, 'country_code', true) : '';
    $country_flag = $term_id ? (string) get_term_meta($term_id, 'country_flag', true) : '';
    $country_currency = $term_id ? strtoupper((string) get_term_meta($term_id, 'country_currency', true)) : '';

    // Never fall back to an Arabic taxonomy name on an English URL.
    $country_fallback = '';
    if (is_object($current_term) && !empty($current_term->slug)) {
        $country_fallback = ucwords(str_replace(array('-', '_'), ' ', (string) $current_term->slug));
        if (preg_match('/[\\x{0600}-\\x{06FF}]/u', $country_fallback)) {
            $country_fallback = '';
        }
    }
    $localized_country_names = array(
        'eg' => '이집트',
        'sa' => '사우디아라비아',
        'ae' => '아랍에미리트',
        'kw' => '쿠웨이트',
        'qa' => '카타르',
        'bh' => '바레인',
        'om' => '오만',
        'jo' => '요르단',
        'iq' => '이라크',
        'ma' => '모로코',
        'tn' => '튀니지',
        'dz' => '알제리',
        'tr' => '튀르키예',
        'us' => '미국',
        'gb' => '영국',
        'in' => '인도',
        'jp' => '일본',
        'kr' => '대한민국',
        'vn' => '베트남',
        'id' => '인도네시아',
        'th' => '태국'
    );
    $country_code_key = strtolower((string) $country_code);
    $display_country_name = isset($localized_country_names[$country_code_key])
        ? $localized_country_names[$country_code_key]
        : ($english_name !== '' ? $english_name : ($country_fallback !== '' ? $country_fallback : 'Country'));
    $country_name = $display_country_name; // AJAX/legacy variables must also receive English.

    // Complete English currency labels for the currencies used by the site’s country map.
    $currency_labels_en = array(
        'USD'=>'US Dollar','EUR'=>'Euro','GBP'=>'British Pound','EGP'=>'Egyptian Pound','SAR'=>'Saudi Riyal','AED'=>'UAE Dirham',
        'KWD'=>'Kuwaiti Dinar','QAR'=>'Qatari Riyal','BHD'=>'Bahraini Dinar','OMR'=>'Omani Rial','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Japanese Yen','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
        'CNY'=>'Chinese Yuan','INR'=>'Indian Rupee','PKR'=>'Pakistani Rupee','RUB'=>'Russian Ruble','ZAR'=>'South African Rand',
        'BRL'=>'Brazilian Real','MXN'=>'Mexican Peso','SGD'=>'Singapore Dollar','HKD'=>'Hong Kong Dollar','SEK'=>'Swedish Krona',
        'NOK'=>'Norwegian Krone','DKK'=>'Danish Krone','PLN'=>'Polish Zloty','CZK'=>'Czech Koruna','HUF'=>'Hungarian Forint',
        'KRW'=>'South Korean Won','THB'=>'Thai Baht','MYR'=>'Malaysian Ringgit','IDR'=>'Indonesian Rupiah','PHP'=>'Philippine Peso',
        'ILS'=>'Israeli New Shekel','LKR'=>'Sri Lankan Rupee','NGN'=>'Nigerian Naira','KES'=>'Kenyan Shilling','GHS'=>'Ghanaian Cedi',
        'LYD'=>'Libyan Dinar','SDG'=>'Sudanese Pound','LBP'=>'Lebanese Pound','SYP'=>'Syrian Pound','YER'=>'Yemeni Rial',
        'TWD'=>'New Taiwan Dollar','SOS'=>'Somali Shilling','DJF'=>'Djiboutian Franc','MRU'=>'Mauritanian Ouguiya',
        'KMF'=>'Comorian Franc','XOF'=>'West African CFA Franc','XAF'=>'Central African CFA Franc','TZS'=>'Tanzanian Shilling',
        'UGX'=>'Ugandan Shilling','CDF'=>'Congolese Franc','AOA'=>'Angolan Kwanza','MZN'=>'Mozambican Metical',
        'ZWL'=>'Zimbabwean Dollar','MGA'=>'Malagasy Ariary','MUR'=>'Mauritian Rupee','ZMW'=>'Zambian Kwacha',
        'BWP'=>'Botswana Pula','NAD'=>'Namibian Dollar','RWF'=>'Rwandan Franc','BIF'=>'Burundian Franc','SSP'=>'South Sudanese Pound',
        'ERN'=>'Eritrean Nakfa','SZL'=>'Swazi Lilangeni','LSL'=>'Lesotho Loti','GMD'=>'Gambian Dalasi','GNF'=>'Guinean Franc',
        'LRD'=>'Liberian Dollar','CVE'=>'Cape Verdean Escudo','SCR'=>'Seychellois Rupee','SLE'=>'Sierra Leonean Leone',
        'STN'=>'São Tomé and Príncipe Dobra','ARS'=>'Argentine Peso','BOB'=>'Bolivian Boliviano','CLP'=>'Chilean Peso',
        'COP'=>'Colombian Peso','GYD'=>'Guyanese Dollar','PYG'=>'Paraguayan Guarani','PEN'=>'Peruvian Sol',
        'SRD'=>'Surinamese Dollar','UYU'=>'Uruguayan Peso','VES'=>'Venezuelan Bolívar','FKP'=>'Falkland Islands Pound',
        'BMD'=>'Bermudian Dollar','KYD'=>'Cayman Islands Dollar','CRC'=>'Costa Rican Colón','CUP'=>'Cuban Peso',
        'DOP'=>'Dominican Peso','GTQ'=>'Guatemalan Quetzal','HNL'=>'Honduran Lempira','NIO'=>'Nicaraguan Córdoba',
        'PAB'=>'Panamanian Balboa','BSD'=>'Bahamian Dollar','BBD'=>'Barbadian Dollar','BZD'=>'Belize Dollar',
        'JMD'=>'Jamaican Dollar','TTD'=>'Trinidad and Tobago Dollar','XCD'=>'East Caribbean Dollar','HTG'=>'Haitian Gourde',
        'RON'=>'Romanian Leu','BGN'=>'Bulgarian Lev','RSD'=>'Serbian Dinar','UAH'=>'Ukrainian Hryvnia','BYN'=>'Belarusian Ruble',
        'MDL'=>'Moldovan Leu','ALL'=>'Albanian Lek','BAM'=>'Bosnia-Herzegovina Convertible Mark','MKD'=>'Macedonian Denar',
        'GEL'=>'Georgian Lari','ISK'=>'Icelandic Krona','GIP'=>'Gibraltar Pound','HRK'=>'Croatian Kuna',
        'KPW'=>'North Korean Won','VND'=>'Vietnamese Dong','BDT'=>'Bangladeshi Taka','NPR'=>'Nepalese Rupee',
        'MMK'=>'Myanmar Kyat','KZT'=>'Kazakhstani Tenge','UZS'=>'Uzbekistani Som','KGS'=>'Kyrgyzstani Som',
        'TJS'=>'Tajikistani Somoni','TMT'=>'Turkmenistani Manat','MNT'=>'Mongolian Tugrik','LAK'=>'Lao Kip',
        'KHR'=>'Cambodian Riel','BTN'=>'Bhutanese Ngultrum','MVR'=>'Maldivian Rufiyaa','BND'=>'Brunei Dollar',
        'IRR'=>'Iranian Rial','AFN'=>'Afghan Afghani','AMD'=>'Armenian Dram','AZN'=>'Azerbaijani Manat','MOP'=>'Macanese Pataca',
        'ETB'=>'Ethiopian Birr','FJD'=>'Fijian Dollar','PGK'=>'Papua New Guinean Kina','SBD'=>'Solomon Islands Dollar',
        'VUV'=>'Vanuatu Vatu','WST'=>'Samoan Tala','TOP'=>'Tongan Paʻanga','XPF'=>'CFP Franc','SHP'=>'Saint Helena Pound'
    );
    $currency_labels_local = array(
        'USD' => '미국 달러',
        'EGP' => '이집트 파운드',
        'SAR' => '사우디 리얄',
        'AED' => 'UAE 디르함',
        'KWD' => '쿠웨이트 디나르',
        'QAR' => '카타르 리얄',
        'BHD' => '바레인 디나르',
        'OMR' => '오만 리알',
        'JOD' => '요르단 디나르',
        'EUR' => '유로',
        'GBP' => '영국 파운드',
        'TRY' => '튀르키예 리라',
        'JPY' => '일본 엔',
        'KRW' => '대한민국 원',
        'VND' => '베트남 동',
        'IDR' => '인도네시아 루피아',
        'THB' => '태국 바트',
        'INR' => '인도 루피',
        'CNY' => '중국 위안'
    );
    $currency_label = isset($currency_labels_local[$country_currency])
        ? $currency_labels_local[$country_currency]
        : (isset($currency_labels_en[$country_currency]) ? $currency_labels_en[$country_currency] : ($country_currency !== '' ? $country_currency : 'Local Currency'));
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map = array(
        'ذهب عيار 24' => '24K Gold', 'ذهب عيار 22' => '22K Gold', 'ذهب عيار 21' => '21K Gold',
        'ذهب عيار 18' => '18K Gold', 'ذهب عيار 14' => '14K Gold', 'ذهب عيار 12' => '12K Gold',
        'عيار 24' => '24K', 'عيار 22' => '22K', 'عيار 21' => '21K', 'عيار 18' => '18K', 'عيار 14' => '14K', 'عيار 12' => '12K',
        'جرام عيار 24' => '24K Gold Gram', 'جرام عيار 22' => '22K Gold Gram', 'جرام عيار 21' => '21K Gold Gram',
        'جرام عيار 18' => '18K Gold Gram', 'جرام عيار 14' => '14K Gold Gram',
        'الأونصة العالمية' => 'Global Gold Ounce', 'أونصة الذهب العالمية' => 'Global Gold Ounce',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Gold Coin', 'الجنيه الذهب' => 'Gold Coin', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Most Traded',
        'الأكثر تداولا' => 'Most Traded',
        'انضم إلى قناتنا على تيليجرام' => 'Join Our Telegram Channel', 'انضم إلى قناتنا على تليجرام' => 'Join Our Telegram Channel', 'انضم لقناتنا على تيليجرام' => 'Join Our Telegram Channel', 'انضم لقناتنا على تليجرام' => 'Join Our Telegram Channel',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Weight / Type', 'السعر' => 'Price',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Excluding Making Charges',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Gold Prices', 'العملة المحلية' => 'Local Currency'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_en[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $currency_labels_en[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'24K Gold','22k'=>'22K Gold','21k'=>'21K Gold','18k'=>'18K Gold','14k'=>'14K Gold','12k'=>'12K Gold','24k_oz'=>'Gold Ounce','gold_pound'=>'Gold Coin');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map[$arabic_country_name] = $display_country_name;
    }

    // 2) Currency conversion. The gold source is USD; multiply by local currency per USD.
    $local_currency_per_usd = 1.0;
    if ($country_currency !== '' && $country_currency !== 'USD' && function_exists('infi_get_latest_currency_rates')) {
        $currency_data_for_conversion = infi_get_latest_currency_rates($country_currency);
        if (!empty($currency_data_for_conversion['rate_to_usd']) && floatval($currency_data_for_conversion['rate_to_usd']) > 0) {
            $local_currency_per_usd = floatval($currency_data_for_conversion['rate_to_usd']);
        }
    }

    $gold_view = sanitize_key((string) get_query_var('gold_view'));

    // Read the 24K gram benchmark once. All karat and weight calculations below
    // continue to use this same USD source and the existing local-currency rate.
    $gram_24k_price_usd_raw = 0;
    $gram_24k_price_currency = 0;
    $gram_24k_price_usd_converted = 0;
    $latest_24k = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k')
        : array();

    if (!empty($latest_24k) && isset($latest_24k[0]['price_usd'])) {
        $gram_24k_price_usd_raw = (float) $latest_24k[0]['price_usd'];
        $gram_24k_price_currency = $gram_24k_price_usd_raw * $local_currency_per_usd;
        $gram_24k_price_usd_converted = $gram_24k_price_usd_raw;
    }

    // Use the provider's dedicated global-ounce quote when available; otherwise
    // fall back to the established 31.1g calculation. Local and global values
    // are two conversions of the same international ounce benchmark.
    $latest_global_ounce = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k_oz')
        : array();
    $ounce_price_usd = (!empty($latest_global_ounce) && isset($latest_global_ounce[0]['price_usd']))
        ? (float) $latest_global_ounce[0]['price_usd']
        : ($gram_24k_price_usd_converted * 31.1);
    $ounce_price_currency = $ounce_price_usd * $local_currency_per_usd;

    // Preserve the site’s established 8g, 21K gold-coin calculation.
    $gold_pound_currency = $gram_24k_price_currency * 8 * 0.875;
?>

<div class="en-middle-ad-slot" style="width:100%;max-width:1200px;margin:12px auto 18px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_cards'); ?>
</div>
	  
<?php
// EN section-specific SEO H1 titles and introductions, following the Hindi/German layout.
$ko_seo_titles = array(
    '' => '오늘의 금 시세 및 시장 개요 (' . $display_country_name,
    '24k' => '오늘의 24K 금 시세 (' . $display_country_name,
    '22k' => '오늘의 22K 금 시세 (' . $display_country_name,
    '21k' => '오늘의 21K 금 시세 (' . $display_country_name,
    '18k' => '오늘의 18K 금 시세 (' . $display_country_name,
    '14k' => '오늘의 14K 금 시세 (' . $display_country_name,
    'ounce' => '오늘의 국제 금 트로이온스 가격 (USD)',
    'coin' => '오늘의 8그램 금화 가격 (' . $display_country_name,
    'gold-bars' => '오늘의 골드바 가격 (' . $display_country_name,
    'gold-index' => '오늘의 금 가격 지수 (' . $display_country_name,
    'usd' => '오늘의 USD 환율 (' . $display_country_name,
);
$ko_seo_intros = array(
    '' => '24K, 22K, 21K, 18K, 14K의 그램당 가격과 USD 기준 국제 금값, 8그램 금화, 골드바 및 환율을 비교할 수 있습니다. 대상 지역:' . $display_country_name,
    '24k' => '의 24K 금 그램당 기준 가격을 확인하고 다른 순도와 비교하세요.' . $display_country_name,
    '22k' => '의 22K 금 가격과 24K 금의 차이를 확인하세요.' . $display_country_name,
    '21k' => '의 21K 금 그램당 가격을 확인하세요.' . $display_country_name,
    '18k' => '의 18K 금 기준 가격을 확인하세요.' . $display_country_name,
    '14k' => '의 14K 금 가격을 다른 순도와 비교하세요.' . $display_country_name,
    'ounce' => '국제 현물 시장의 금 1트로이온스 가격을 USD로 표시합니다. 1트로이온스는 약 31.1035그램입니다. 국가별 현지 통화 가격이 아닌 세계 시장 기준 가격입니다.',
    'coin' => '의 8그램 금화 기준 가치를 확인하세요.' . $display_country_name,
    'gold-bars' => '의 24K 금 그램당 가격을 기준으로 중량별 골드바 가격을 비교하세요.' . $display_country_name,
    'gold-index' => '의 순도 및 통화별 금 가격을 비교하세요.' . $display_country_name,
    'usd' => '에서 사용하는 USD 환율 기준값을 확인하세요.' . $display_country_name,
);
$ko_seo_h1 = isset($ko_seo_titles[$gold_view]) ? $ko_seo_titles[$gold_view] : '오늘의 24K 금 시세 (' . $display_country_name;
$ko_seo_intro = isset($ko_seo_intros[$gold_view]) ? $ko_seo_intros[$gold_view] : '의 24K 금 그램당 기준 가격을 확인하고 다른 순도와 비교하세요.' . $display_country_name;
?>
<section class="ko-seo-intro" aria-labelledby="ko-seo-h1" style="max-width:1000px;width:95%;box-sizing:border-box;margin:18px auto 22px;padding:20px 22px;background:#1f2126;border:1px solid #343944;border-left:5px solid <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;border-radius:9px;color:#e5e7eb;line-height:1.85;text-align:left;direction:ltr;">
    <h1 id="ko-seo-h1" style="margin:0 0 10px;color:#fff;font-size:clamp(22px,3vw,30px);line-height:1.35;font-weight:800;"><?php echo esc_html($ko_seo_h1); ?></h1>
    <p style="margin:0;"><?php echo esc_html($ko_seo_intro); ?></p>
    <p style="margin:10px 0 0;color:#aeb7c4;font-size:13px;">Updated: <?php echo esc_html($today); ?> · Prices are indicative and may change with the market.</p>
</section>

    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Live Prices</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Gold Bars</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Gold Price Chart</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in Korean layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Prices of gold live in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo '24K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo '22K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo '21K Gold Price per Gram Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo '18K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo '14K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Global Gold Ounce Price Today (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Gold Coin Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Gold Bullion Bar Prices Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Live Gold Market Index Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'US Dollar and Currency Exchange Rates Today in ' . esc_html($display_country_name); }
        else { echo 'Gold Prices in ' . esc_html($display_country_name) . ' Today '; }
        ?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Live foreign exchange rates for major international and regional currencies'; }
          elseif ($gold_view == 'ounce') { echo 'International spot benchmark for one troy ounce of 24K gold, quoted in USD'; }
          else { echo 'Gold Price in ' . esc_html($display_country_name) . ' — live market price, excluding making charges'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_ko_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_ko_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Latest gold bar and coin prices (excluding making charges)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Gold Bullion Bar Prices in <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Weight / Type</th>
                                <th>Price (<?php echo $currency_label; ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Gold Bar — 1 Gram'],
                                ['weight' => 2.5, 'name' => 'Gold Bar — 2.5 Grams'],
                                ['weight' => 5, 'name' => 'Gold Bar — 5 Grams'],
                                ['weight' => 10, 'name' => 'Gold Bar — 10 Grams'],
                                ['weight' => 20, 'name' => 'Gold Bar — 20 Grams'],
                                ['weight' => 31.1, 'name' => 'Troy Ounce (31.1 g)'],
                                ['weight' => 50, 'name' => 'Gold Bar — 50 Grams'],
                                ['weight' => 100, 'name' => 'Gold Bar — 100 Grams'],
                            ];
                            
                            foreach ($weights as $bar) {
                                if ((float) $bar['weight'] === 31.1) {
                                    $bar_price_usd = $ounce_price_usd;
                                    $bar_price_currency = $ounce_price_currency;
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

            <section id="gold-pounds-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>Gold Coin Prices in <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Coin Purity</th>
                                <th>Price (<?php echo $currency_label; ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gold_pounds_carats = ['21k', '22k', '24k']; 
                            foreach ($gold_pounds_carats as $carat) {
                                $pound_gram_data = infi_get_latest_gold_prices($carat);
                                if (!empty($pound_gram_data) && isset($pound_gram_data[0]['price_usd'])) {
                                    $price_usd_per_gram = (float) $pound_gram_data[0]['price_usd'];
                                    if ($price_usd_per_gram <= 0) { continue; }
                                    $pound_weight = 8;
                                    
                                    $pound_price_currency = $price_usd_per_gram * $pound_weight * $local_currency_per_usd;
                                    $pound_price_usd = $price_usd_per_gram * $pound_weight;
                                    $carat_num = str_replace('k', '', $carat);
                                ?>
                                <tr>
                                    <td class="font-bold">8g Gold Coin (<?php echo $carat_num; ?>K)</td>
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

            <div class="raw-gold-alert mt-4" style="background: #1f2126; padding: 15px; border-radius: 6px; border-left: 4px solid #ffb301;">
                <span class="alert-icon">⚠️</span>
                <strong>Important:</strong> The prices shown above for bars and coins represent <u>gold value only</u>; they exclude making charges, hallmarking fees, and taxes.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Sorry, the market data is currently unavailable.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Gold Price Chart in <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $ko_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_ko_translate_shortcode_html(do_shortcode($ko_chart_shortcode), $shortcode_translation_map);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Charts show indicative market movements. Local prices may differ due to exchange rates, premiums and market conditions.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateKoreanIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': '24K 금',
        'عيار 22': '22K 금',
        'عيار 21': '21K 금',
        'عيار 18': '18K 금',
        'عيار 14': '14K 금',
        'عيار 12': '12K 금',
        'الأونصة العالمية': '국제 금 1트로이온스 (USD)',
        'جنيه الذهب': '금화',
        'سعر الدولار': '미국 달러 환율',
        'جنيه مصري': '이집트 파운드',
        'دولار أمريكي': '미국 달러',
        'انضم إلى قناتنا على تيليجرام': '텔레그램 채널 참여하기',
        'انضم إلى قناتنا على تليجرام': '텔레그램 채널 참여하기'
    };
    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT);
    const nodes = [];
    while (walker.nextNode()) nodes.push(walker.currentNode);
    nodes.forEach(function (node) {
        let value = node.nodeValue;
        Object.keys(translations).forEach(function (arabic) {
            value = value.split(arabic).join(translations[arabic]);
        });
        node.nodeValue = value;
    });
    root.querySelectorAll('[aria-label],[title],[alt]').forEach(function (element) {
        ['aria-label','title','alt'].forEach(function (attribute) {
            if (!element.hasAttribute(attribute)) return;
            let value = element.getAttribute(attribute);
            Object.keys(translations).forEach(function (arabic) {
                value = value.split(arabic).join(translations[arabic]);
            });
            element.setAttribute(attribute, value);
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".gold-tab-btn");
    const panes = document.querySelectorAll(".gold-tab-pane");

    buttons.forEach(function (button) {
        button.addEventListener("click", async function () {
            const tab = button.getAttribute("data-tab");
            const targetPane = document.getElementById("tab-" + tab);
            if (!targetPane) return;

            panes.forEach(function (pane) { pane.style.display = "none"; });
            buttons.forEach(function (item) { item.classList.remove("active"); });
            targetPane.style.display = "block";
            button.classList.add("active");

            // Load the same indicator frames used by the Arabic template once only.
            if (tab === 'indicator' && !targetPane.dataset.framesLoaded) {
                const framesContainer = document.getElementById('ajax-indicator-frames');
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">금 가격 차트를 불러오는 중...</p>';
                const formData = new FormData();
                formData.append('action', 'load_indicator_frames');
                formData.append('country_currency', <?php echo wp_json_encode($country_currency); ?>);
                formData.append('country_name', <?php echo wp_json_encode($country_name); ?>);
                try {
                    const response = await fetch(<?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>, {
                        method: 'POST',
                        credentials: 'same-origin',
                        body: formData
                    });
                    if (!response.ok) throw new Error('HTTP ' + response.status);
                    framesContainer.innerHTML = await response.text();
                    altaqrerTranslateKoreanIndicator(framesContainer);
                    targetPane.dataset.framesLoaded = 'true';
                } catch (error) {
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">차트 데이터를 불러올 수 없습니다. 다시 시도해 주세요</p>';
                    delete targetPane.dataset.framesLoaded;
                }
            }
        });
    });
});
</script>

<div class="en-below-tabs-ad-slot" style="width:100%;max-width:1200px;margin:18px auto 22px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_countries'); ?>
</div>

<?php if (empty($gold_view)) : ?>
<div class="altaqrer-dynamic-article-box" style="background: #1f2126; padding: 20px; border: 1px solid #323742; border-left: 5px solid <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; color: #f0f1f5; font-size: 14.5px; line-height: 1.9; direction: ltr; text-align: left; border-radius: 8px; margin: 25px auto; max-width: 800px; width: 95%; box-sizing: border-box; box-shadow: 0 4px 15px rgba(0,0,0,0.25); font-family: sans-serif; clear: both;">
    <p style="margin-top: 0; margin-bottom: 15px;">
        📊 The gold tracker monitors the latest movements in <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>Gold prices in <?php echo esc_html($display_country_name); ?> in real time</strong></span> today <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> on <strong><?php echo esc_html($today); ?></strong> using regional market data and the international gold stock exchange rate for (<?php echo esc_html($display_country_name); ?>).
    </p>

    <p style="margin-bottom: 15px;">
        💡 This report lets you track live gold prices across all categories, including <strong>21K gold price today</strong> — the most widely traded purity — as well as <strong>22K gold</strong>, <strong>18K gold</strong> value options, and <strong>14K gold</strong>. The tracker also covers precious-metal prices, jewellery markets, and daily market movements.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Live market data, excluding making charges, puts the <strong>24K gold price per gram</strong> at approximately <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (equivalent to <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> US dollars</strong>). This purity is the primary standard for <strong>gold bars</strong> because of its high refinement status.
    </p>

    <p style="margin-bottom: 15px;">
        📈 The <strong>global gold ounce price today</strong> (31.1 grams of 24K gold) is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. This is the international spot benchmark; local gold prices are converted separately using the latest available exchange rate.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 For savers and investors, the <strong>gold coin price today</strong> (an 8-gram coin in the widely traded 21K purity) is approximately <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ To help preserve the value of your savings, tracking the <strong>live gold market index</strong> and <strong>Prices of gold bars</strong> across weights from 1 gram to 1 kilogram can help you follow market movements when considering a purchase or sale.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Exchange Rate Indicator:</strong> Local gold prices move with exchange rates. The <strong>US dollar exchange rate today in <?php echo esc_html($display_country_name); ?></strong> is <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> per US dollar, based on the latest available market data. Download the <strong>gold prices app</strong> for timely price alerts.
    </div>
</div>
<?php endif; ?>

<?php
if (!function_exists('altaqrer_get_currency_live_rate')) {
    function altaqrer_get_currency_live_rate($target_currency, $local_currency_per_usd) {
        static $rate_cache = array();
        $target_currency = strtoupper(sanitize_text_field((string) $target_currency));

        if ($target_currency === '' || !function_exists('infi_get_latest_currency_rates')) {
            return 0;
        }

        if (!array_key_exists($target_currency, $rate_cache)) {
            $currency_data = infi_get_latest_currency_rates($target_currency);
            $rate_cache[$target_currency] = (!empty($currency_data) && isset($currency_data['rate_to_usd']) && (float) $currency_data['rate_to_usd'] > 0)
                ? (float) $currency_data['rate_to_usd']
                : 0;
        }

        // Same rate direction and conversion formula used by the Arabic template.
        return $rate_cache[$target_currency] > 0
            ? (float) $local_currency_per_usd / $rate_cache[$target_currency]
            : 0;
    }
}

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

<?php if (empty($gold_view)) : ?>
    <div style="background: #17191d; padding: 15px; border-radius: 6px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 14px; margin: 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both;">
        <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 15px; text-align: left; direction: ltr;">
            💵 Live exchange rates against <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Updates are performed programmatically via official live market indices. We advise installing the official <strong>gold prices app</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $ko_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'en' => 'Gold Price'],
        ['key' => '24k',       'en' => '24K'],
        ['key' => '22k',       'en' => '22K'],
        ['key' => '21k',       'en' => '21K'],
        ['key' => '18k',       'en' => '18K'],
        ['key' => '14k',       'en' => '14K'],
        ['key' => 'ounce',     'en' => 'Gold Ounce'],
        ['key' => 'coin',      'en' => 'Gold Coin'],
        ['key' => 'gold-bars', 'en' => 'Gold Bars'],
        ['key' => 'gold-index','en' => 'Gold Index'],
        ['key' => 'usd',       'en' => 'USD and Currency Rates'],
    ];
    ?>

    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; row-gap: 10px; direction: ltr;">
        <?php foreach ($tabs as $tab) :
            $key = $tab['key'];
            $is_active = ($key === '') ? empty($gold_view) : ($gold_view === $key);
            $tab_url = ($key === '') ? $base_country_url : $base_country_url . rawurlencode($key) . '/';
            $tab_style = 'text-decoration: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; border: 1px solid #3a3f4d; ';

            if ($is_active) {
                $tab_style .= "color: {$active_color}; background: {$active_bg}; font-weight: bold;";
            } else {
                $tab_style .= "color: {$default_color}; background: {$default_bg}; font-weight: 500;";
            }
            $label = $tab['en'];
        ?>
            <a href="<?php echo esc_url($tab_url); ?>" style="<?php echo esc_attr($tab_style); ?>" <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php
if (!empty($gold_view)) {
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
    <div class="altaqrer-unified-hero-box" style="background: #17191d; padding: 25px; border-radius: 8px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 15px; margin: 15px auto 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; box-shadow: 0 4px 15px rgba(0,0,0,0.3); direction: ltr; text-align: left; line-height: 1.8;">
        <div class="altaqrer-dynamic-inner-content">
            
            <?php if ($gold_view == 'gold-index') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Live Gold Market Index in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Pure 24K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Premium 22K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Popular 21K Gold:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Standard 18K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Light 14K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Global Gold Ounce (31.1g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">International spot price, quoted in USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This index compares the main gold purities in <?php echo esc_html($display_country_name); ?> with the international spot benchmark. The global ounce benchmark is quoted in USD only; it is not converted into local currency. Retail making charges and dealer premiums are not included.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Gold Bullion Bar Prices Today in <?php echo esc_html($display_country_name); ?> (Pure 24K Gold):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 1 Gram:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 2.5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 10 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 20 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 50 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 100 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This tracker provides structural tracking of <strong>Gold bar prices today</strong> composed exclusively of 999.9 pure 24K gold. Gold bullion bar accumulation remains a primary hedge for wealth conservation and long-term liquidity protection inside <strong><?php echo esc_html($display_country_name); ?></strong> against macroeconomic inflation.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Gold Coin Price Today in <?php echo esc_html($display_country_name); ?> (Standard 8 Gram Weight):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>21K Gold Coin (8g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>22K Gold Coin (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>24K Gold Coin (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Get live updates on the current <strong>Gold coin price today</strong> within the investment markets of <strong><?php echo esc_html($display_country_name); ?></strong>. Sovereign gold coins weighing exactly 8 grams are widely monitored as safe haven physical assets.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Live Exchange Rates against <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This dynamic index monitors banking cross rates. Local gold price benchmarks scale directly with exchange fluctuations against global reserves.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 24K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The live <strong>24K gold price per gram today</strong> stands at <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Characterized by 99.9% purity, this karat is the industrial asset benchmark for bullion production.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 22K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The premium <strong>22K gold price per gram today</strong> registers at <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. It balances high intrinsic precious metal content with raw structural durability.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 21K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The widely requested <strong>21K gold price per gram today</strong> trades at <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. This karat accounts for the vast majority of local consumer jewelry trading.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 18K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Market updates place the standard <strong>18K gold price per gram today</strong> at <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, offering an economical choice for luxury jewelry work.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 14K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The programmatic index values <strong>14K gold price per gram today</strong> at <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, presenting a durable alloy framework for constant retail utility.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Global Gold Ounce Price Today (31.1g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>International Spot Price:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Quote Currency:</strong> US Dollar (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The global gold ounce is priced internationally in US dollars and represents 31.1 grams of 24K gold. Local-currency conversions are intentionally excluded from this global benchmark; local gold prices are calculated separately using the applicable exchange rate.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use the same price snapshot and conversions as the tables above.
    $ko_seo_base = home_url('/ko/country/' . rawurlencode($ko_header_country_slug) . '/');
    // Keep numeric price pairs here: the SEO article reads [0] and [1] with number_format().
$ko_seo_price_map = array(
    '24k' => array($price_24k_local, $price_24k_usd),
    '22k' => array($price_22k_local, $price_22k_usd),
    '21k' => array($price_21k_local, $price_21k_usd),
    '18k' => array($price_18k_local, $price_18k_usd),
    '14k' => array($price_14k_local, $price_14k_usd),
);
?>
<article class="ko-seo-article" aria-labelledby="ko-seo-title">
<?php if (isset($ko_seo_price_map[$gold_view])) :
    $ko_active_price_local = $ko_seo_price_map[$gold_view][0];
    $ko_active_price_usd = $ko_seo_price_map[$gold_view][1];
    $ko_karat = strtoupper($gold_view);
?>
    <h2 id="ko-seo-title"><?php echo esc_html($ko_karat); ?> Gold Price Today in <?php echo esc_html($display_country_name); ?> per Gram</h2>
    <p>Follow the latest <strong><?php echo esc_html($ko_karat); ?> gold price today in <?php echo esc_html($display_country_name); ?></strong> with the live reference shown above. The current indicative value is <strong><?php echo number_format($ko_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> per gram, equivalent to approximately <strong><?php echo number_format($ko_active_price_usd, 2); ?> USD</strong>. These figures are calculated from the latest available 24K reference price, the purity factor for <?php echo esc_html($ko_karat); ?> gold, and the latest available currency conversion used by the site.</p>
    <h3>What does <?php echo esc_html($ko_karat); ?> gold mean?</h3>
    <p>Karat indicates the proportion of pure gold in an alloy. 24K is treated as the pure-gold reference, while lower karats contain a greater share of other metals. The <?php echo esc_html($ko_karat); ?> rate therefore reflects its gold content rather than the finished retail price of a jewellery item. The final shop price may also include workmanship, retailer premiums, taxes, and other local charges that are not included in the raw market value displayed here.</p>
    <h3>How to read the local and USD prices</h3>
    <p>The local-currency figure helps compare the reference value in <?php echo esc_html($display_country_name); ?>, while the USD equivalent makes it easier to compare the same gold content with international quotations. Local prices can move when the global gold benchmark changes, when exchange rates change, or when local market conditions affect premiums. The figures on this page are indicative reference values, not a guaranteed buy-back or retail offer.</p>
    <h3>Related gold prices</h3>
    <p>Compare this rate with <a href="<?php echo esc_url($ko_seo_base . '24k/'); ?>">24K gold</a>, <a href="<?php echo esc_url($ko_seo_base . '21k/'); ?>">21K gold</a>, <a href="<?php echo esc_url($ko_seo_base . 'gold-bars/'); ?>">gold bar prices</a>, and the <a href="<?php echo esc_url($ko_seo_base . 'gold-index/'); ?>">live gold market index</a> for a broader view of the market.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>Is the displayed <?php echo esc_html($ko_karat); ?> price the final jewellery shop price?</summary><p>No. It is an indicative raw-gold reference and excludes workmanship, retailer premiums, taxes, and any other charges that may apply to a finished item.</p></details>
    <details><summary>Why is the USD equivalent different from the local price?</summary><p>The two values use different currencies. The local figure is converted using the latest available exchange-rate data used by the site; the USD figure represents the corresponding gold value in US dollars.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="ko-seo-title">Global Gold Ounce Price Today in USD</h2>
    <p>The international gold ounce reference on this page is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> for one troy ounce of approximately 31.1 grams of 24K gold. This is the <strong>global gold spot benchmark</strong>, quoted in US dollars. It is deliberately not presented as a country-specific local-currency ounce price; local gram prices are converted separately for the selected country.</p>
    <h3>Why the global gold ounce matters</h3>
    <p>Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today’s movement.</p>
    <h3>From the global ounce to a local gram price</h3>
    <p>For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations.</p>
    <p>Continue to the <a href="<?php echo esc_url($ko_seo_base); ?>">gold price in <?php echo esc_html($display_country_name); ?></a>, review <a href="<?php echo esc_url($ko_seo_base . '24k/'); ?>">24K gold per gram</a>, or open the <a href="<?php echo esc_url($ko_seo_base . 'gold-index/'); ?>">gold market index</a>.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>How many grams are in a gold troy ounce?</summary><p>One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation.</p></details>
    <details><summary>Is this ounce price converted to local currency?</summary><p>No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="ko-seo-title">8-Gram Gold Coin Price Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Track the reference value of an <strong>8-gram gold coin</strong> in <?php echo esc_html($display_country_name); ?>. Using the current gram prices, the indicative 21K coin value is <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (about <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). The page also compares 22K and 24K values for the same 8-gram weight so that the effect of purity is clear.</p>
    <h3>How the 8-gram coin value is calculated</h3>
    <p>The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site’s established 8-gram coin calculation.</p>
    <p>Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote. Compare the <a href="<?php echo esc_url($ko_seo_base . '21k/'); ?>">21K gold gram price</a>, <a href="<?php echo esc_url($ko_seo_base . '22k/'); ?>">22K gold price</a>, and <a href="<?php echo esc_url($ko_seo_base . 'gold-bars/'); ?>">gold bar prices</a>.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>What weight is used for the gold coin calculation?</summary><p>This page retains the site’s standard 8-gram calculation for the gold coin comparison.</p></details>
    <details><summary>Does the displayed value include a dealer premium?</summary><p>No. It estimates the gold content only and does not include minting costs, dealer premiums, workmanship, or taxes.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="ko-seo-title">Gold Bar Prices Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Gold bars are commonly valued using the 24K gold benchmark. Based on the current 24K reference of <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> per gram</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, while a 100-gram bar is approximately <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. The table above lists additional weights for quick comparison.</p>
    <h3>How to compare gold bullion bar weights</h3>
    <p>For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page.</p>
    <p>Check the bar's stated purity, exact weight, certification, manufacturer, and seller reputation before a transaction. The <a href="<?php echo esc_url($ko_seo_base . '24k/'); ?>">24K gold price</a> is the key per-gram reference, while the <a href="<?php echo esc_url($ko_seo_base . 'ounce/'); ?>">global gold ounce</a> provides an international comparison in USD.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>Are the gold bar prices inclusive of making charges?</summary><p>No. The table estimates the gold value only and excludes fabrication, certification, dealer premiums, and taxes.</p></details>
    <details><summary>Why can two bars of the same weight have different prices?</summary><p>Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Gold Index SEO section. -->
    <section class="en-gold-index-chart" aria-labelledby="en-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="en-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Gold Price Charts</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Gold Price Charts — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=ko"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price.</p>
    </section>
    <h2 id="ko-seo-title">Live Gold Market Index and Karat Prices in <?php echo esc_html($display_country_name); ?></h2>
    <p>This gold market overview brings together the latest available reference values for several purities. The current 24K benchmark is <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> per gram, while 22K is approximately <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> and 21K is approximately <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. The global troy ounce is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. This global benchmark is quoted in USD only and is not converted into the selected country's local currency.</p>
    <h3>What the gold index helps you compare</h3>
    <p>The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market.</p>
    <p>Gold prices can respond to global spot-market activity, currency movements, interest-rate expectations, inflation concerns, and changes in investment demand. A single snapshot does not establish a trend, so readers should compare updates over time before drawing conclusions. Visit the <a href="<?php echo esc_url($ko_seo_base . '21k/'); ?>">21K price page</a>, <a href="<?php echo esc_url($ko_seo_base . '24k/'); ?>">24K price page</a>, and <a href="<?php echo esc_url($ko_seo_base . 'ounce/'); ?>">global ounce page</a>.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>Does the index show a guaranteed market trading price?</summary><p>No. It is an informational reference based on the latest available data used by the site. Actual transaction prices may include local premiums and fees.</p></details>
    <details><summary>Why are different karats priced differently?</summary><p>Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="ko-seo-title">USD Exchange Rate and Currency Conversion in <?php echo esc_html($display_country_name); ?></h2>
    <p>The latest available reference used by this page values one US dollar at approximately <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Exchange rates matter to gold buyers because international bullion prices are commonly quoted in USD. When the local currency changes against the dollar, the converted local value of gold can change even if the international USD gold price remains steady.</p>
    <h3>How currency movements affect local gold prices</h3>
    <p>A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer.</p>
    <p>For the gold side of the comparison, review the <a href="<?php echo esc_url($ko_seo_base . '24k/'); ?>">24K gram price</a>, the <a href="<?php echo esc_url($ko_seo_base . '21k/'); ?>">21K gram price</a>, and the <a href="<?php echo esc_url($ko_seo_base . 'ounce/'); ?>">international gold ounce in USD</a>.</p>
    <h3>Frequently asked questions</h3>
    <details><summary>Is this exchange rate the rate offered by every bank?</summary><p>No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees.</p></details>
    <details><summary>Why does the dollar rate matter for gold?</summary><p>Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values.</p></details>
<?php endif; ?>
    <p class="ko-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Reference date: <?php echo esc_html($today); ?>. Prices are indicative and reflect the latest available data returned to this page; they may change as market and exchange-rate data are updated.</p>
</article>
<?php endif; ?>

<?php if (!$ko_header_is_app) : ?>
<footer class="ko-site-footer">
  <div class="ko-site-footer-inner">
    <section>
      <h3>About AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes.</p>
    </section>
    <section>
      <h3>Gold Price Sections</h3>
      <ul>
        <li><a href="<?php echo esc_url($ko_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($ko_header_country_url . 'gold-bars/'); ?>">Gold Bars and Coins</a></li>
        <li><a href="<?php echo esc_url($ko_header_country_url . 'gold-index/'); ?>">Live Gold Index</a></li>
        <li><a href="<?php echo esc_url($ko_header_country_url . 'usd/'); ?>">USD and Currency Rates</a></li>
      </ul>
    </section>
    <section>
      <h3>Regional Gold Prices</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/ko/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/ko/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/ko/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/ko/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Follow Us</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Join Our Telegram Channel</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /en/# placeholder links.
    $ko_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Privacy Policy',
        'terms-of-use'   => 'Terms of Use',
        'contact-us'     => 'Contact Us'
    ) as $page_slug => $page_label) {
        $page_object = get_page_by_path('en/' . $page_slug);
        if (!$page_object) {
            $page_object = get_page_by_path($page_slug);
        }
        if ($page_object && $page_object->post_status === 'publish') {
            $ko_footer_pages[] = array('url' => get_permalink($page_object), 'label' => $page_label);
        }
    }
    if (!empty($ko_footer_pages)) : ?>
    <section>
      <h3>Important Links</h3>
      <ul>
        <?php foreach ($ko_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="ko-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($ko_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.en-country-toggle');
  var menu = document.getElementById('en-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.en-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
<?php if (ob_get_level() > 0) { ob_end_flush(); } ?>
</body>
</html>
