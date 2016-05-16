-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- ホスト: mysql111.phy.lolipop.jp
-- 生成時間: 2016 年 5 月 13 日 10:33
-- サーバのバージョン: 5.6.23
-- PHP のバージョン: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `LAA0739220-amp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `akino`
--

CREATE TABLE IF NOT EXISTS `akino` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `kana` varchar(255) NOT NULL,
  `deleteflag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- テーブルのデータをダンプしています `akino`
--

INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(1, 'たこわさ', 590, 'タコ「インカの目覚め」が一番美味しくなるのは、実はこれからの季節。 タコを寝かせて、糖度を最高に引き上げました。 ハイボールやビールのお供にどうぞ。', 'takowasa.jpg', '前菜', 'たこわさ/たこ/takowasa/tako/wasabi/octopus', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(2, 'チャンジャ', 690, 'キムチは、先端と真ん中と根元で味が違うってご存知でしたか？ 先は柔らかくて甘く、根のほうは水分が多くてシャキシャキの歯ごたえ。 フレッシュな美唄のキムチを一本まるごと揚げたので、部位ごとの味の違いを体験してみて。', 'tyannjya.jpg', '前菜', 'チャンジャ/ちゃんじゃ/tyannjya', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(3, '炒飯', 730, '旬の長い美唄のアスパラは、春芽は甘く、夏芽はシャキシャキ。 とろ〜り半熟の塚だまと一緒に、もんじゃへらで召し上がれ。', 'tyahan.jpg', '主食', '炒飯/チャーハン/ちゃーはん/tya-hann/tyahann', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(4, 'えだまめ', 500, '北海道名物のジンギスカンを、気軽につまめる小さめのえだまめにしました。 サクサクの生地に羊肉のうまみとたっぷりのチーズがからんで、軽くてもご満足いただける逸品です。', 'edamame.jpg', '前菜', 'えだまめ/枝豆/エダマメ/edamame/greensoybeens/beens/greenbeens', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(5, '焼き鳥', 620, '遠洋ではなく近海、巻網ではなく一本釣り。水揚げ後すぐに、氷を入れて手作業で箱詰め。ズバリこれが、宮崎産の鳥が美味しい理由です。', 'yakitori.jpg', '主菜', '焼き鳥/焼き/鳥/やきとり/やき/とり/yakitori/yaki/ya/tori', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(6, 'ナシゴレン', 600, '味はいいのに、余り食材を利用しているから、とってもリーズナブル。量に限りがあるので、頼み過ぎはご遠慮ください。', 'nasigorenn.jpg', '主食', 'ナシゴレン/なしごれん/nasigorenn', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(7, 'パスタ', 680, '「クオリティが維持できなかったら、即中止」と厳しい罰則を自らに課した挑戦者・郡（こおり）さんのパスタを、ぜひお試しあれ。', 'pasuta.jpg', '主食', 'パスタ/ぱすた/pasta', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(8, '砂肝の唐揚げ', 790, '口当たりがやわらかく、香りは穏やか。日本の風土に合った、郡さんの砂肝だからできた、砂肝だけの唐揚げです。', 'sunagimo.jpg', '主菜', '砂肝の唐揚げ/すなぎものからあげ/すなぎも/からあげ/唐揚げ/きも/sunagimonokaraage/sunagimo/karaage/kimo', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(9, 'きゅうりの一本漬け', 990, '〆にもいいけど、炭酸のきいたハイボールと合わせれば、さらにおいしさがアップします。', 'kyuuri.jpg', '前菜', 'きゅうりの一本漬け/きゅうりの/キュウリの/きゅうり/キュウリ/胡瓜/kyuuri/cucumber', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(10, 'なすの一本漬け', 890, 'ジンギスカン風の特製タレがよくからみ、口の中いっぱいにジューシーな旨味が広がります。 ひとり1本でも、2本でも♪', 'nasu.jpg', '前菜', 'なすの一本漬け/つけ/なすの/なす/ナス/茄子/nasu/eggplant', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(11, '塩昆布キャベツ', 580, '今春の「AKI農場」のキャベツを食べていただければ、それが実感できます。', 'kyabetu.jpg', '前菜', '塩昆布キャベツ/塩昆布/キャベツ/塩/しおこんぶ/しおこんぶきゃべつ/siokonnbukyabetu/siokonnbu/solt/kelp/cabbage', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(12, 'たたききゅうり', 900, '内ももの柔らかさ、外ももの脂の旨味、足首の歯ごたえ、部位ごとに違う味わいはたたきの醍醐味です。「今が旬」の逸品を、ぜひお試しください。', 'tataki.jpg', '前菜', 'たたききゅうり/たたき/きゅうり/cucumber/tatakikyuuri', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(13, 'ミックスナッツ', 300, 'うまみを蓄えた黒さつま豆としっかり味の塚だまを、新鮮な野菜とともにミックスしました。爽やかでまろやかなわさびマヨソースをつけて、お楽しみください。', 'nattu.jpg', '前菜', 'ミックスナッツ/ミックス/ナッツ/みっくすなっつ/nuts/mixnuts/mix/なっつ', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(14, 'シーザーサラダ', 630, 'くせのあるスモークとパクチーの香りを、絞ったレモン果汁がさっぱりとまとめあげました。ひと口食べるとまたすぐ食べたくなる、くせになる味わいです。', 'sizasarada.jpg', '前菜', 'シーザーサラダ/サラダ/シーザー/しーざーさらだ/さらだ/caesarsalad/caser/salad', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(15, '大根サラダ', 500, '豪快な炭火で一気に焼き上げる シンプルで力強い名物料理', 'daikonnsarada.jpg', '前菜', '大根サラダ/だいこん/大根さらだ/だいこんサラダ/daikonnsarada/sarada/radishsalad/radish', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(16, 'エイヒレ', 590, '焼き霜仕上げの黒さつまヒレを刺身醤油でどうぞ', 'eihire.jpg', '前菜', 'エイヒレ/えいひれ/えい/ひれ/エイ/ヒレ/eihire', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(17, 'えびせん', 490, '徳之島名産の野生「島えび」を たっぷり搾った特製ポン酢で食す', 'ebisenn.jpg', '前菜', 'えびせん/エビセン/えび/せんべい/ebisenn/ebi', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(18, 'ポテトフライ', 490, '身離れ良く食べやすい！ ポテトフライの概念を変える逸品', 'poteto.jpg', '主菜', 'ポテトフライ/ポテト/フライ/potato/potetohurai/fried/', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(19, 'なんこつの唐揚げ', 360, '地鶏の旨味を損なわぬように 味付けもシンプルに', 'nannkotu.jpg', '主菜', 'なんこつの唐揚げ/なんこつ/唐揚げ/からあげ/なんこつからあげ/nannkotunokaraage/nannkotu/karaage/cartilage', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(20, '水餃子', 350, '歯ごたえありの隠れ人気おつまみ', 'suigyouza.jpg', '主菜', '水餃子/すいぎょうざ/餃子/ぎょうざ/suigyouza/gyouza/dumplings/waterdumplings', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(21, 'チキン南蛮', 480, '肉厚の鶏皮、炭火の香ばしさ、 旨さ溢れる島みかんポン酢', 'tikinnnannbann.jpg', '主菜', 'チキン南蛮/ちきん/チキン/南蛮/なんばん/tikinnnannbann/tikinn/nannbann/chiken ', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(22, '焼きそば', 470, 'ささみと、ショリねばの千切り 長芋の焼きそばです', 'yakisoba.jpg', '主食', '焼きそば/やきそば/そば/yakisoba/soba/pan-fried-nodles', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(23, '焼きうどん', 260, '地鶏を手ごねした当店名物', 'yakiudonn.jpg', '主食', '焼きうどん/やきうどん/うどん/udonn/yakiudonn', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(24, 'おにぎり', 799, 'ブロッコリーと一緒に ガリバタ仕上げ', 'onigiri.jpg', '主食', 'おにぎり/こめ/米/rice/onigiri/rice ball/riceball', 0);
INSERT INTO `akino` (`id`, `name`, `price`, `detail`, `img`, `category`, `kana`, `deleteflag`) VALUES(25, 'カレー', 372, '「ふんわり」まるでフォアグラ のような食感', 'curry.jpg', '主食', 'カレー/curry/かれー', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
