-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-12-11 02:16:59
-- サーバのバージョン： 10.4.14-MariaDB
-- PHP のバージョン: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `login`, `password`) VALUES
(1, 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `delete_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `tel`, `mail`, `login`, `password`, `delete_flag`) VALUES
(1, '熊木 和夫', '東京都新宿区西新宿2-8-1', '09011111111', '111@gmail.com', 'kumaki', 'BearTree1', 0),
(2, '鳥居 健二', '神奈川県横浜市中区日本大通1', '09022222222', '222@gmail.com', 'torii', 'BirdStay2', 0),
(3, '鷺沼 美子', '大阪府大阪市中央区大手前2', '09033333333', '333@gmail.com', 'saginuma', 'EgretPond3', 0),
(4, '鷲尾 史郎', '愛知県名古屋市中区三の丸3-1-2', '09044444444', '444@gmail.com', 'washio', 'EagleTail4', 0),
(5, '牛島 大悟', '埼玉県さいたま市浦和区高砂3-15-1', '09055555555', '555@gmail.com', 'ushijima', 'CowIsland5', 0),
(6, '相馬 助六', '千葉県地足中央区市場町1-1', '09066666666', '666@gmail.com', 'souma', 'PhaseHorse6', 0),
(7, '猿飛 菜々子', '兵庫県神戸市中央区下山手通5-10-1', '09077777777', '777@gmail.com', 'sarutobi', 'MonkeyFly7', 0),
(8, '犬山 陣八', '北海道札幌市中央区北3西6', '09088888888', '888@gmail.com', 'inuyama', 'DogMountain8', 0),
(9, '猪口 一休', '福岡県福岡市博多区東公園7-7', '09099999999', '999@gmail.com', 'inokuchi', 'BoarMouse9', 0),
(10, 'aaaaaa', 'aaaaaaaaaaa', '09009990999', 'bjkbkbjnkjnkjnkjnsdkjfnaks', 'iiiiiiii', 'fffffffffffffffffff', 0),
(11, 'くもｍっこ', 'aaaaaaaaaaa', '09009990999', 'bjkbkbjnkjnkjnkjnsdkjfnaks', 'aaaaaa65', 'lllllllllllllllllllll', 0),
(12, 'aaaaaassssssss', '09009990999', 'sssss', 'sssssssssss', 'ssssssssssss', 'ssssssssssss', 0),
(13, 'くもｍっこss', '09009990999', '09009990999', 'bjkbkbjnkjnkjnkjnsdkjfnaks', 'dddddddddd', 'dddddddddddddddd', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `syousai` varchar(200) NOT NULL,
  `keywords` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `syousai`, `keywords`) VALUES
(1, '松の実', 270, '松の実は栄養価が高く、抵抗力を高め精力がつくといわれています。体を潤す力に優れ、カラ咳や声がれなどの肺の症状や、肌や髪などの乾燥に潤いを与えてくれます。また潤いの少ない、コロコロ便でお悩みの方にもおすすめです。脂肪油が豊富に含まれ、特に抗酸化作用を持ったリノール酸が多く含まれています。', 'スタミナをつけカラダを潤す！「仙人の妙薬」と呼ばれるアンチエイジング薬膳食材です'),
(2, 'くるみ', 270, 'くるみに多く含まれるオメガ3脂肪酸には、悪玉コレステロール値や中性脂肪値を下げたり、血管を柔軟(若さの尺度)に保ち、糖尿病や心臓血管疾患、肥満やメタボなど生活習慣病のリスクを下げるなどの効果が期待されます。', 'オメガ３脂肪酸たっぷり！アメリカのカリフォルニア州で育てられた厳選されたくるみです'),
(3, 'ひまわりの種', 210, 'ひまわりの種は、ビタミンE、鉄分、マグネシウム、カルシウム、繊維、亜鉛、カリウムなどさまざまな栄養分が含まれています。スナック感覚で食べたり、和え物に加えたり、果物と合わせたサラダや製パン材料、ヨーグルトやシリアルに混ぜたり、ひとつまみで栄養価を上げることができます。', '栄養価が高く、アンチエイジング（老化対策）やダイエットにも効果も！'),
(4, 'アーモンド', 220, 'コクと自然な甘さが香り立つフルーティなカリフォルニア産アーモンドです。アーモンドはナッツの中でもビタミンEの含有量がトップクラスです。脂質が多いイメージですが、不飽和脂肪酸は体にいい脂質のため積極的にとっていい食材です。', 'カリッと軽い歯ざわり！アーモンドは世界で最も親しまれているナッツです'),
(5, 'カシューナッツ', 250, 'カシュナッツは香ばしく柔らかいおつまみとして人気ですが、実は意外なほどたくさんの栄養素を含んでいます。亜鉛、銅、マンガンなどの栄養をバランス良く含んでおり、栄養価は満点です。', '舌触りが滑らかな食感と香ばしい風味が病みつきになります！'),
(6, 'ジャイアントコーン', 180, 'ちょっとハードな歯応えと塩味の効いたコーンの香ばしさが特徴のジャイアントコーン。実はペルーのごく限られた地域でしか生産することができない貴重なナッツです。腹持ちがよく、ダイエットにも適しています。', '大粒で良質、貴重なジャイアントコーン'),
(7, 'ピスタチオ', 310, 'タンパク質と食物繊維を豊富に含む供給源です。おいしいピスタチオはおやつにぴったりなだけでなく、アイスクリームやビスコッティなど、さまざまなデザートにも使われています。', 'おやつにぴったり低コレステロールのローストピスタチオです'),
(8, 'マカダミアナッツ', 600, '独特の歯ごたえが特徴的であり、淡白な味と豊かな香りから世界中で高い人気を誇っています。そのままはもちろん、チョコレートでコーティングされたものや、クッキーやケーキの材料にも使用されています。', 'ダイエットや美容・健康効果も期待できます！'),
(9, 'かぼちゃの種', 180, '不飽和脂肪酸のリノール酸やオレイン酸が含まれた食材です。これらの不飽和脂肪酸にはLDLコレステロールを減らしたり、血圧を下げるといった嬉しい効能が期待されています。', 'かぼちゃの種は栄養満点！薬として食べられてきた歴史もあるほど栄養がたっぷり'),
(10, 'ピーナッツ', 150, 'ピーナッツは脂質が多いイメージですが、ピーナッツに大量に含まれる油は良質で健康的な油です。生活習慣病の予防や糖尿病リスクの低減、二日酔いの予防に効果があるとされています。生のピーナッツはこうした栄養が損なわれることなく含まれています。', 'あまり出回ってない生のピーナッツです。血管を健康にして死亡率を飛躍的に下げます'),
(11, 'クコの実', 400, 'いま世界でスーパーフードとして有名になっています。原産国の中国やチベットでは「幸福の果実」といわれていたり、世界三大美女のひとり楊貴妃が毎日食べていたともいわれる美容フードでもあります。杏仁豆腐の上にのっているので有名です。', 'ビタミンやミネラルが豊富！ビタミンCはオレンジの約500倍！'),
(12, 'ツタンカーメンのエンドウ豆', 20000, 'このエンドウ豆は濃い紫色のさやをしており、古代エジプトのツタンカーメン王の墓から出土した豆の子孫といわれています。豆の見た目は普通のグリーンピースと変わらないのですが、豆ごはんにすると赤飯のような綺麗な赤色に変わります。', 'ツタンカーメンの墓から発見されたロマンあふれるエンドウ豆'),
(13, 'スナップエンドウ', 150, 'スナップエンドウはグリーンピースの改良品種です。豆が成長して大きくなってもサヤが硬くならず、サヤごと食べられます。甘みがあり、パリっとした食感が楽しめます。スナップエンドウを選ぶ場合はさやにふっくらとした張りがあるものを選ぶと甘くておいしいです。', 'さやごと食べられるシャキシャキ食感'),
(14, '青エンドウ豆', 400, '北海道産の「大緑」品種１００％ならではの、みずみずしい味と嫌味の無い豆の味が特徴です。安価な海外産の青えんどうでは味わえないえんどう豆独特の風味の良さをお楽しみください。', '北海道産「大緑」品種１００％　厳選された高級品'),
(15, 'うすいエンドウ豆', 330, '正式名称は紀州うすいといいます。うすいえんどうの特徴としては、実が大きく上品で繊細な甘みがあり、ほくほくとした食感が特徴です。グリーンピースと比べて皮が薄く、青臭さも少なくて、色はグリーンピースに比べて少し黄緑に近い色合いです。関西地方では古くから春を告げる旬の食材として「豆ご飯」や「卵とじ」といった料理で親しまれています。', '実が大きく上品で繊細な甘みを持つ、春を告げる旬野菜'),
(16, 'スナックエンドウ', 120, '豆本来の美味しさを味わえます。ノンフライで程よい塩味が特徴で、おやつやおつまみにおすすめです。食べてもアンチエイジングやダイエットはできません。とてもコスパが良く、長期保存に適しています。', 'さやごと食べられるパリパリ食感'),
(17, 'きこり', 90000, 'ハイジの父方の祖父でトビアスの実父、元傭兵。「 アルム」は放牧地、「おんじ」はおじさんを意味し、すなわち「アルムおんじ」とは「放牧地のおじさん」と言うあだ名であり、本名は作中では一貫して言及されていない。よく働きます。', 'よく働きます。');

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `purchase`
--

INSERT INTO `purchase` (`id`, `customer_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `purchase_delete_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`, `purchase_delete_flag`) VALUES
(1, 1, 5, 1),
(2, 1, 1, 1),
(2, 2, 7, 1),
(3, 1, 67, 1),
(4, 2, 35, 1),
(5, 2, 6, 1),
(6, 2, 7, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- テーブルのインデックス `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- テーブルの制約 `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- テーブルの制約 `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
