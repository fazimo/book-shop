-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 08:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac_level` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ac_id`, `ac_name`, `ac_username`, `ac_password`, `ac_level`) VALUES
(111111, 'مدیریت سایت', 'a', '123456', 0),
(456789, 'کاربر', 'b', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `bas_id` int(11) NOT NULL,
  `bas_account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baskets_items`
--

CREATE TABLE `baskets_items` (
  `it_id` int(11) NOT NULL,
  `it_basket_id` int(11) DEFAULT NULL,
  `it_product_id` int(11) DEFAULT NULL,
  `it_fee` bigint(20) DEFAULT NULL,
  `it_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bo_id` int(11) NOT NULL,
  `bo_register_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_writer_id` int(11) DEFAULT NULL,
  `bo_publisher_id` int(11) DEFAULT NULL,
  `bo_group_id` int(11) DEFAULT NULL,
  `bo_translate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_age` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_papers` int(11) DEFAULT NULL,
  `bo_fee` bigint(20) DEFAULT NULL,
  `bo_count` int(11) DEFAULT NULL,
  `bo_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_text` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bo_id`, `bo_register_at`, `bo_name`, `bo_writer_id`, `bo_publisher_id`, `bo_group_id`, `bo_translate`, `bo_age`, `bo_year`, `bo_papers`, `bo_fee`, `bo_count`, `bo_pic`, `bo_text`) VALUES
(1, '1399/10/10', 'کتاب کلیدر', 1, 1, 5, NULL, '3', '1392', 100, 18000, 13, '57054.jpg', 'محمود دولت‌آبادی، نویسنده چیره دست و سرشناس ایرانی که جایزه‌های بین‌المللی ادبی یان میخالسکی سوییس و جایزه شوالیه ادب و هنر فرانسه را هم در کارنامه پربارش دارد، رمان بلند سه‌هزار صفحه‌ای و ده جلدی کلیدر را با الهام از یک واقعه تاریخی در دوران کودکی خود نوشته است؛ قتل یک قهرمان مردمی به اسم گل‌محمد کلمیشی که کارش ایستادگی مقابل ظلم و زور اربابان و حکومتی‌ها بود. محمود پنج- شش ساله، آن سال‌ها گوشش پر بوده از مرثیه‌ها و اشعار و داستان‌هایی درباره گل‌محمد. اشعاری که بلاخره کار خود را کردند تا شاهکاری به اسم کلیدر خلق شود. رمانی که تاریخ و خیال را بهم آمیخته تا به قول نویسنده‌اش «یادگاری برای مردم آینده ما» شود.  کلیدر از مردمان روستایی زجرکشیده، مظلوم و همیشه منتظری می‌گوید که در سال‌های ظلم و زور خان‌ها و خان‌زاده‌های دهه ۲۰ در یکی از خشک‌ترین و کم‌رونق‌ترین نقاط روستایی ایران، جایی میان سبزوار، نیشابور و قوچان زندگی می‌کردند و بر زمین‌های خشن و خسیس کویر، عرق می‌ریختند. فضای این داستان، فضای ملتهب سیاسی پس از جنگ جهانی دوم و بین سال‌های ۱۳۲۵تا ۱۳۲۷ است.  بلقیس و شوهرش سه پسر و یک دختر دارند. زندگی آنها با چوپانی می‌گذرد. گل محمد پسر دوم خانواده است که از سربازی برگشته و با وجود داشتن همسری به اسم زیور، عاشق مارال دختر دایی خود می‌شود و این ازدواج آغاز ماجراهای پر از عداوتی می‌شود که آخر آن قتل ناخواسته یکی از مالدارهای سرشناس روستایی است. قتلی که به دنبالش دو خون دیگر ریخته می‌شود. خون دو ماموری که برای تحقیق درباره قتلی که گل‌محمدمرتکب شده، آمده‌اند. قتلی که درواقع دفاع از خود بوده است. گل محمد به زندان می‌افتد اما به کمک یکی از اعضای حزب توده به نام ستار، فرار می‌کند و زندگی مخفیانه و مبارزاتش با اربابان زورگو آغاز می‌شود، آوازه گل‌محمد در سراسر منطقه می‌پیچد و محبوب مردم می‌شود، محبوبیتی که برایش مسئولیتی سنگین و تشویشی مداوم آورده است، او تبدیل به قهرمان مردم شده و زندگی‌اش سراسر ناآرامی و آشوب است؛ ترور محمدرضا شاه به دست حزب توده هم بر این تشویش دامن می‌زند تا سرنوشتی تلخ را برای گل‌محمد افسانه‌ای و یارانش رقم بزند.'),
(2, NULL, 'اگر صبر کنی', 8, 3, 6, 'صبا امیرسلیمانی', '1', '1398', 32, 15000, 10, '_36017.jpg', '(داستان های تخیلی،صبر،رشد گیاهان،گروه سنی:ال،ب(3تا9سال)،تصویرگر:سونیا گودرزی،برگزیده ی چهارمین جشنواره ی دانایی و توانایی،گلاسه)'),
(3, NULL, 'مجموعه مهارت های من', 9, 3, 6, 'مرجان حجازی فر', '1', '1397', 64, 30000, 15, '_44940.jpg', '(داستان های تخیلی،گروه سنی:ب(3تا7سال)،تصویرگر:تونی راس،همراه با شمع،گلاسه،باجعبه)'),
(4, NULL, 'خبر لندری', 10, 2, 6, 'افسانه مختاری سلیمانی', '2', '1388', 178, 10000, 20, '_76124.jpg', '«کارا لندری» دختری در مدرسة دنتون است کسی او را نمیشناسد کارا لندری به روزنامه‌نگاری علاقه‌مند است و با پشتکار زیاد، اولین نشریة شخصی خود را به تابلوی اعلانات نصب میکند و نام خبرلندری را روی آن میگذارد کارل لارش، معلم دبستان، آن را نامناسب میداند اما کارا دقیق و نکته‌سنج است و با قلمی روان و بیانعطاف مقاله‌هایش را مینویسد او با ماجراهای زیادی که برایش رخ میدهد، تغییر میکند و طعم محبت و لطف را میچشد و با حرفة خبرنگاری و جذابیت‌ها و مشکلات خاص آن آشنا میشود'),
(5, NULL, 'آدولف هیتلر', 11, 4, 3, 'محسن عسکری جهقی', '4', '1396', 1990, 420000, 25, '_52042.jpg', '«ایان کرشاو» در پرفروشترین زندگینامه ای که از هیتلر به رشته تحریر در آورده است پیشوا را در اوج قدرت خود به خوانندگان معرفی می کند. میلیونها نفر از مردم آلمان از اینکه هیتلر توانسته بود کشور را به شایستگی از بحران اقتصادی به سلامت بیرون ببرد از او بُت ساختند. حزب نازی، نخبگان نظامی و صنعتی، کارتل های اقتصادی و مدیران عالیرتبه در مسابقه ای شرکت داشتند که باید در «راستای منویات پیشوا» با هم رقابت می کردند. هیتلر نیز در این دوران اندیشه اهریمنی خود را قوام بخشید تا قاره اروپا را زیر استیلا و یوغ رایش سوم در آورده و همزمان یهودیان را نابود کند. \r\nهیتلر و ارتش رژیم نازی سه سالِ تمام  قاره اروپا را در شعله های جنگی خانمان سوز به آتش کشیدند و در کشورهای اروپایی حمام خون به راه اندختند. سربازان ارتش نازی به همراه واحدهای نظامی و خونخوار سازمان اِس.اِس هزاران نفر از مردم و نظامیان کشورهای شکست خوردۀ در جنگ را قصابی کردند و از دم تیغ گذراندند. «ایان کرشاو» در این دو جلد نشان می دهد که چگونه با برتری یافتن متفقین در جنگ، هیتلر به تدریج از یک «نابغه نظامی شکست ناپذیر» به «قماربازی تمام عیار» تبدیل شد که «بباخت هر چه بودش»؛ و نایودی و ویرانی را به کشورش تقدیم کرد طوریکه ناچار شد در اعماق ویرانی های برلین و در پناهگاهی زیر خروارها آوارِ به جامانده از پایتخت رایش به زندگی خود خاتمه دهد. \r\nایان کرشاو در دو جلد «دوران سرمستی» و «دوران ویرانگری» زندگی هیتلر را به زیبایی به تصویر کشیده و برای این کار پژوهش بسیار گسترده ای را انجام داده،  اسناد و مدارکی را کاویده که تا کنون هیچ پژوهشگری بدانها نپرداخته است. این کتاب به یقین موثق ترین زندگی نامه هیتلر در دوران ما است.'),
(6, NULL, 'سفرهای ژان شاردن به ایران', 12, 5, 3, 'محمد مجلسی', '4', '1393', 216, 25000, 15, '_13190.jpg', 'این کتاب دربرگیرنده ی فصولی از جلد سوم و جلد نهم سفرنامه ی دوازده جلدی ژان شاردن به انتخاب کلود گودن می باشد.'),
(7, NULL, 'چهره‌های تمدن', 13, 6, 3, 'کاظم فیروزمند', '4', '1398', 768, 135000, 8, '_24510.jpg', 'سخن گفتن از تمدّن، سخن گفتن از مکان، سرزمین و وضعیت اش، آب و هوا، گیاهان، انواع حیوانات و مواهب طبیعی یا غیر آن است. هم چنین بحث درباره ی چیزهایی است که انسان از این شرایط اساسی ساخته است: کشاورزی، دامداری، غذا، سرپناه، لباس، ارتباطات، صنعت و مانند آن. صحنه ای که نمایش های بی پایان بشریّت را عرضه می کند، به لحاظی تعیین کننده ی خط داستانی آنهاست و خصلت آنها را توضیح می دهد. بازیگران تغییر می کنند، امّا صحنه ی ماجرا عمدتاً همان است.'),
(8, NULL, 'در میان گم‌شدگان', 14, 7, 5, 'امیرمهدی حقیقت', '3', '1399', 192, 25000, 10, '_20397.jpg', 'کتاب در میان گم‌شدگان نوشته‌ی دن شاون می‌باشد که امیرمهدی حقیقت آن را به فارسی ترجمه کرده است. این کتاب توسط انتشارات ماهی چاپ و در 192 صفحه به بازار عرضه شده است.آخرین چاپ آن مربوط به سال 1399 بوده و می‌توان به لحاظ موضوع‌بندی آن را در بخش مجموعه داستان جهان قرار داد.'),
(9, NULL, 'سرزمین مامورهای مخفی', 15, 5, 5, 'نرگس حسن‌لی', '4', '1398', 356, 45000, 30, '_50878.jpg', 'اشتازی، ارتشی داخلی بود که تحت نظر دولت کار میکرد. وظیفه‌ اش دانستن همه‌ چیز راجع به همه‌ کس و با استفاده از هر ابزاری که میخواست بود. میدانست مهمانانتان کیستند، میدانست به چه کسی تلفن میکنید و میدانست آیا سر و گوش همسرتان میجنبد یا نه. بوروکراسی ای بود که در تمام جامعه آلمان شرقی پخش شده بود؛ آشکارا یا مخفیانه، یک نفر در هر مدرسه، هر کارخانه، هر بار و هر ساختمان مسکونی بود که گزارش همکاران و دوستان خود را به اشتازی میداد. اشتازی چنان به جزئیات وسواس پیدا کرده بود که از پیش‌ بینی پایان کمونیسم و همراه با آن پایان کشور غافل مانده بود.\r\nکتاب سرزمین‌ مامورهای مخفی را یک روزنامه‌نگار استرالیایی نوشته است که پس از فروپاشی دیوار برلین به آن‌جا می رود و روایت مردم و ماموران، قربانیان و جانیان را در کتاب خود ثبت می‌کند.'),
(10, NULL, 'شکسپیر و شرکا', 16, 8, 2, 'پوپه میثاقی', '4', '1398', 372, 43500, 100, '_70942.jpg', 'کتاب شکسپیر و شرکا، سفرنامه ای نوشته ی جرمی مرسر است که نخستین بار در سال 2005 وارد بازار نشر شد. روزنامه نگاری کانادایی به نام جرمی مرسر، فقیر و بیکار بر کرانه ی جنوبی رود سن در پاریس قدم می زد که با کتابفروشی کوچکی به نام شکسپیر و شرکا مواجه شد. مرسر از این کتابخانه کتابی خرید و کارکنان آن جا از او دعوت کردند که با آن ها چای بنوشد. مرسر برای چندین هفته در طبقه ی بالای کتابفروشی زندگی کرد، برای مالک کتابفروشی یعنی آقای جُرج ویتمن مشغول به کار شد، روابطی عاشقانه را تجربه کرد و ماجراهای بزرگ و کوچک زیادی را از سر گذراند. کتاب شکسپیر و شرکا، داستان سفری به سرزمین عجایبی ادبی در پاریس است.'),
(11, NULL, 'هزار و یک شب', 1, 1, 2, '', '3', '1390', 520, 350000, 18, '_48957.jpg', 'کتاب مقدمه‌ای نسبتا مفصل دارد، و برای هرجلد و موضوع نیز مقدمه‌ای جداگانه تدارک دیده شده است که در ابتدای هر کتاب آمده است. ابراهیم اقلیدی که تحقیق و ترجمه این کتاب را بر عهده دارد در مقدمه اثر نوشته که این ترجمه کاملتر از ترجمه «تسوجی» است، و آورده: «کتاب در بردارنده بیش از 280 داستان است که در دل هر کدام از آنها قصه های فرعی فراوانی نیز قرار گرفته است» اما در شش جلد نخست تنها 95 قصه آمده است. اقلیدی دلیل اصلی موضوعی کردن قصه‌ها را چنین توضیح داده است: «در طبقه بندی مضمونی، قصه‌های همگون یا هم خانواده کنار هم قرار می‌گیرند و برجستگی و ارزش برخی داستان‌ها که در انبوه پرشمار داستان‌های ناهمگون گم بوده‌اند، بهتر نمایانده می‌شوند. دو جلد نخست از این مجموعه، «پریانه‌ها» نام دارد، که آغاز داستان هزار ویک شب است، و در آن روایت چگونگی شروع قصه گویی شهرزاد آمده است');

-- --------------------------------------------------------

--
-- Table structure for table `books_comments`
--

CREATE TABLE `books_comments` (
  `cm_id` int(11) NOT NULL,
  `cm_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cm_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cm_book_id` int(11) DEFAULT NULL,
  `cm_text` longtext COLLATE utf8_unicode_ci,
  `cm_visible` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books_comments`
--

INSERT INTO `books_comments` (`cm_id`, `cm_date`, `cm_time`, `cm_book_id`, `cm_text`, `cm_visible`) VALUES
(2, '1399/10/15', '09:24:18', 1, 'این کتاب رو دیروز تهیه کردم بسیار کتاب خوبی است.', 1),
(4, '1399/11/18', '14:38:36', 1, 'این کتاب رو چندبار خوندم، محشره', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gr_id`, `gr_name`) VALUES
(1, 'سایر'),
(2, 'ادبیات'),
(3, 'تاریخ و مذهب'),
(5, 'داستان و رمان'),
(6, 'کودک و نوجوان'),
(7, 'علوم پزشکی'),
(8, 'علوم پایه و مهندسی'),
(9, 'درسی و کمک آموزشی'),
(11, 'هنر');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `or_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `or_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `or_account_id` int(11) NOT NULL,
  `or_sum` bigint(20) NOT NULL,
  `or_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `or_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `or_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_date`, `or_time`, `or_account_id`, `or_sum`, `or_mobile`, `or_address`, `or_status`) VALUES
(14851, '1399/10/16', '14:30:18', 456789, 18000, '09358521648', 'خیابان شهید فهمیده، فهمیده 4', 1),
(787991, '1399/11/21', '15:45:43', 456789, 36000, '09301201819', 'خیابان امام خمینی، خمینی 5، پلاک 126', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `it_id` int(11) NOT NULL,
  `it_order_id` int(11) NOT NULL,
  `it_product_id` int(11) NOT NULL,
  `it_fee` bigint(20) NOT NULL,
  `it_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`it_id`, `it_order_id`, `it_product_id`, `it_fee`, `it_count`) VALUES
(1, 14851, 1, 18000, 1),
(4, 787991, 1, 18000, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_baskets_items`
-- (See below for the actual view)
--
CREATE TABLE `vw_baskets_items` (
`it_id` int(11)
,`it_fee` bigint(20)
,`it_count` int(11)
,`it_basket_id` int(11)
,`bo_name` varchar(200)
,`bo_pic` varchar(50)
,`wr_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_books`
-- (See below for the actual view)
--
CREATE TABLE `vw_books` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_comments`
-- (See below for the actual view)
--
CREATE TABLE `vw_comments` (
`cm_id` int(11)
,`cm_date` varchar(20)
,`cm_time` varchar(20)
,`bo_name` varchar(200)
,`cm_text` longtext
,`cm_visible` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_groups`
-- (See below for the actual view)
--
CREATE TABLE `vw_groups` (
`gr_id` int(11)
,`gr_name` varchar(50)
,`counts` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orders`
-- (See below for the actual view)
--
CREATE TABLE `vw_orders` (
`or_id` int(11)
,`or_date` varchar(20)
,`or_time` varchar(20)
,`ac_name` varchar(200)
,`or_sum` bigint(20)
,`or_mobile` varchar(20)
,`or_address` longtext
,`or_status` int(11)
,`or_account_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orders_items`
-- (See below for the actual view)
--
CREATE TABLE `vw_orders_items` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_publishers`
-- (See below for the actual view)
--
CREATE TABLE `vw_publishers` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_writers`
-- (See below for the actual view)
--
CREATE TABLE `vw_writers` (
`wr_id` int(11)
,`wr_name` varchar(255)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `wr_id` int(11) NOT NULL,
  `wr_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`wr_id`, `wr_name`) VALUES
(15, 'آنا فاندر'),
(10, 'اندرو کلمنتس'),
(11, 'ایان کرشاو'),
(7, 'پائولو کوئیلو'),
(5, 'پی‌یر لومتر'),
(9, 'تونی راس'),
(16, 'جرمی مرسر'),
(14, 'دن شاون'),
(6, 'رابین شارما'),
(2, 'رضا جولایی'),
(12, 'ژان شاردن'),
(8, 'سوزی شیک'),
(13, 'فرنان برودل'),
(1, 'محمود دولت‌آبادی'),
(4, 'مهدی یزدانی‌خرم');

-- --------------------------------------------------------

--
-- Structure for view `vw_baskets_items`
--
DROP TABLE IF EXISTS `vw_baskets_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_baskets_items`  AS  select `baskets_items`.`it_id` AS `it_id`,`baskets_items`.`it_fee` AS `it_fee`,`baskets_items`.`it_count` AS `it_count`,`baskets_items`.`it_basket_id` AS `it_basket_id`,`books`.`bo_name` AS `bo_name`,`books`.`bo_pic` AS `bo_pic`,`writers`.`wr_name` AS `wr_name` from ((`baskets_items` join `books` on((`baskets_items`.`it_product_id` = `books`.`bo_id`))) join `writers` on((`books`.`bo_writer_id` = `writers`.`wr_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_books`
--
DROP TABLE IF EXISTS `vw_books`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_books`  AS  select `books`.`bo_id` AS `bo_id`,`books`.`bo_register_at` AS `bo_register_at`,`books`.`bo_name` AS `bo_name`,`writers`.`wr_name` AS `wr_name`,`publishers`.`pu_name` AS `pu_name`,`groups`.`gr_name` AS `gr_name`,`books`.`bo_translate` AS `bo_translate`,`books`.`bo_age` AS `bo_age`,`books`.`bo_year` AS `bo_year`,`books`.`bo_papers` AS `bo_papers`,`books`.`bo_fee` AS `bo_fee`,`books`.`bo_count` AS `bo_count`,`books`.`bo_pic` AS `bo_pic`,`books`.`bo_text` AS `bo_text`,`books`.`bo_group_id` AS `bo_group_id` from (((`books` join `writers` on((`books`.`bo_writer_id` = `writers`.`wr_id`))) join `publishers` on((`books`.`bo_publisher_id` = `publishers`.`pu_id`))) join `groups` on((`books`.`bo_group_id` = `groups`.`gr_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_comments`
--
DROP TABLE IF EXISTS `vw_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_comments`  AS  select `books_comments`.`cm_id` AS `cm_id`,`books_comments`.`cm_date` AS `cm_date`,`books_comments`.`cm_time` AS `cm_time`,`books`.`bo_name` AS `bo_name`,`books_comments`.`cm_text` AS `cm_text`,`books_comments`.`cm_visible` AS `cm_visible` from (`books_comments` join `books` on((`books_comments`.`cm_book_id` = `books`.`bo_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_groups`
--
DROP TABLE IF EXISTS `vw_groups`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_groups`  AS  select `groups`.`gr_id` AS `gr_id`,`groups`.`gr_name` AS `gr_name`,count(`books`.`bo_group_id`) AS `counts` from (`groups` left join `books` on((`books`.`bo_group_id` = `groups`.`gr_id`))) group by `groups`.`gr_id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_orders`
--
DROP TABLE IF EXISTS `vw_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders`  AS  select `orders`.`or_id` AS `or_id`,`orders`.`or_date` AS `or_date`,`orders`.`or_time` AS `or_time`,`accounts`.`ac_name` AS `ac_name`,`orders`.`or_sum` AS `or_sum`,`orders`.`or_mobile` AS `or_mobile`,`orders`.`or_address` AS `or_address`,`orders`.`or_status` AS `or_status`,`orders`.`or_account_id` AS `or_account_id` from (`orders` join `accounts` on((`orders`.`or_account_id` = `accounts`.`ac_id`))) WITH LOCAL CHECK OPTION ;

-- --------------------------------------------------------

--
-- Structure for view `vw_orders_items`
--
DROP TABLE IF EXISTS `vw_orders_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders_items`  AS  select `books`.`bo_name` AS `bo_name`,`writers`.`wr_name` AS `wr_name`,`groups`.`gr_name` AS `gr_name`,`books`.`bo_translate` AS `bo_translate`,`books`.`bo_year` AS `bo_year`,`orders_items`.`it_fee` AS `it_fee`,`orders_items`.`it_count` AS `it_count`,`orders_items`.`it_order_id` AS `it_order_id`,`publishers`.`pu_name` AS `pu_name`,`orders_items`.`it_id` AS `it_id` from ((((`groups` join `books` on((`groups`.`gr_id` = `books`.`bo_group_id`))) join `writers` on((`writers`.`wr_id` = `books`.`bo_writer_id`))) join `orders_items` on((`orders_items`.`it_product_id` = `books`.`bo_id`))) join `publishers` on((`books`.`bo_publisher_id` = `publishers`.`pu_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_publishers`
--
DROP TABLE IF EXISTS `vw_publishers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_publishers`  AS  select `publishers`.`pu_id` AS `pu_id`,`publishers`.`pu_name` AS `pu_name`,count(`books`.`bo_id`) AS `count` from (`publishers` left join `books` on((`books`.`bo_publisher_id` = `publishers`.`pu_id`))) group by `publishers`.`pu_id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_writers`
--
DROP TABLE IF EXISTS `vw_writers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_writers`  AS  select `writers`.`wr_id` AS `wr_id`,`writers`.`wr_name` AS `wr_name`,count(`books`.`bo_id`) AS `count` from (`writers` left join `books` on((`books`.`bo_writer_id` = `writers`.`wr_id`))) group by `writers`.`wr_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`bas_id`);

--
-- Indexes for table `baskets_items`
--
ALTER TABLE `baskets_items`
  ADD PRIMARY KEY (`it_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bo_id`);

--
-- Indexes for table `books_comments`
--
ALTER TABLE `books_comments`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`it_id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`wr_id`),
  ADD UNIQUE KEY `UK_writers_wr_name` (`wr_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets_items`
--
ALTER TABLE `baskets_items`
  MODIFY `it_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books_comments`
--
ALTER TABLE `books_comments`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `it_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `wr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
