-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema `salatino-site`
--

CREATE DATABASE IF NOT EXISTS `salatino-site`;
USE `salatino-site`;

--
-- Definition of table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `idAction` int(11) NOT NULL AUTO_INCREMENT,
  `idController` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `taskType` varchar(20) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idAction`),
  KEY `controllers_actions` (`idController`),
  CONSTRAINT `controllers_actions` FOREIGN KEY (`idController`) REFERENCES `controllers` (`idController`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` (`idAction`,`idController`,`name`,`link`,`taskType`,`order`) VALUES 
 (14,17,'Inserir','admin/controllers/edit/','write',0),
 (15,18,'Listar','admin/groups/list/','read',0),
 (16,18,'Inserir','admin/groups/edit/','write',0),
 (17,19,'Listar','admin/users/list/','read',0),
 (18,19,'Inserir','admin/users/edit/','write',0),
 (19,20,'Listar','admin/actions/list/','read',0),
 (20,20,'Inserir','admin/actions/edit/','write',0),
 (21,21,'Listar','admin/sections/list/','read',0),
 (22,21,'Inserir','admin/sections/edit/','write',0),
 (23,22,'Listar','admin/subsections/list/','read',0),
 (24,22,'Inserir','admin/subsections/edit/','write',0),
 (25,23,'Listar','admin/content/list/','read',0),
 (26,23,'Inserir','admin/content/edit/','write',0),
 (27,24,'Listar','admin/tags/list/','read',0),
 (28,24,'Inserir','admin/tags/edit/','write',0),
 (29,25,'Listar','admin/banners/list/','read',0),
 (30,25,'Inserir','admin/banners/edit/','write',0),
 (31,26,'Listar','admin/pedigree/list/','read',0),
 (32,27,'Listar','admin/contact/list/','read',0),
 (33,27,'Inserir','admin/contact/edit/','write',0),
 (34,28,'Listar','admin/signup/list/','read',0),
 (35,28,'Inserir','admin/signup/edit/','write',0);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;


--
-- Definition of table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `idBanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(45) DEFAULT NULL,
  `active` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`idBanner`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`idBanner`,`image`,`active`) VALUES 
 (5,'78862e12b53484bc49f899abcedb60cf.jpg',1),
 (6,'7c51ca1152c01e87b6d17ee9a00c85eb.jpg',1),
 (7,'2f83d0300b9f28de3a3e7e9816fcb089.jpg',1);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


--
-- Definition of table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `idContact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `message` varchar(1500) DEFAULT NULL,
  `optIn` char(1) DEFAULT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


--
-- Definition of table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `idContent` int(11) NOT NULL AUTO_INCREMENT,
  `idSection` int(11) DEFAULT '0',
  `idSubsection` int(11) DEFAULT '-1',
  `template` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `picture` varchar(100) DEFAULT NULL,
  `smallPicture` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `showGallery` varchar(45) DEFAULT NULL,
  `showVideo` varchar(45) DEFAULT NULL,
  `folder` varchar(100) DEFAULT NULL,
  `tags` varchar(1000) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '1',
  `views` int(11) DEFAULT '0',
  `ranking` int(11) DEFAULT '0',
  `insertDate` datetime DEFAULT NULL,
  PRIMARY KEY (`idContent`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` (`idContent`,`idSection`,`idSubsection`,`template`,`title`,`body`,`picture`,`smallPicture`,`video`,`showGallery`,`showVideo`,`folder`,`tags`,`order`,`active`,`views`,`ranking`,`insertDate`) VALUES 
 (1,17,-1,'imagem-texto','Chinese Crested Dog','O Grande time foi fundado após recebermos de presente da nossa amiga Ana\r\n Paola Diniz criadora de Rhodesian Ridgback ( CANIL MALABO APD ) a \r\npequena Bayshore Malaboartedeco Crystal.<br/><br/>Após a convivência com \r\nCrystal foi necessário apenas uma semana para nos apaixonarmos pela raça\r\n e apartir dai decidimos que montariamos um grande time.<br/>Passamos á estudar as linhas de sangue e estamos apresentando o nosso novo time.<br/><br/>Obrigado aos grandes criadores que confiaram em mandar seus filhos para a família Salatino!!!<br/><br/>Nossos\r\n sinceros agradecimentos a Ana pela Crystal, a família TAM por trazer o \r\nNash e ao Johhny por fotografar nossos pequenos com todo amor e carinho.','0499ad99c97cbab90510e87d466aa564.jpg',NULL,NULL,'0','0','4bf98237643d92223a26329a20217794','noticia',8,1,0,0,'2011-12-04 21:27:43'),
 (2,19,-1,'imagem-texto','Sobre o Teckel de Pêlo Longo','Teckel, Dachshund, Bassê, Cofap, Paqueiro, Salsichinha. Assim chamamos este simpático cãozinho no Brasil. Já nos países de língua inglesa são chamados apenas de Dachshund (“Dáx-únd”) e nos países filiados à FCI (Federation Cynologique Internationale) são oficialmente chamados de Teckel.<br/><br/><br/>O Teckel é um cão pequeno e compacto, de pernas curtas e corpo alongado. Possui dupla aptidão sendo exímio caçador de texugos, raposas e lebres é também um excelente cão de companhia.<br/><br/><br/>Os Teckels existem em três tipos diferentes de pelagem: pêlo curto, pêlo longo e pêlo duro; e em três tamanhos distintos: standard, miniatura e kaninchen. Fazendo então um simples cálculo matemático, verifica-se que existem nove diferentes tipos de Teckels. Esses baixinhos contam com um grupo só para eles: o 4º grupo! A classificação da FCI determina que cada variedade de Teckel é considerada uma raça independente, e, portanto, deve-se evitar acasalamentos entre exemplares de tipos de pelagem e tamanhos diferentes.<br/><br/><br/>Assim como o tamanho e a pelagem, o temperamento de cada variedade do Teckel é diferente. Pode-se dizer sem medo de se cometer alguma injustiça que, de maneira geral, o Teckel de pêlo longo é o mais dócil, o de pêlo duro o mais obstinado e o de pêlo curto o mais determinado. O Teckel de pêlo longo também é considerado o mais delicado com objetos da casa e o mais tranqüilo. Essas qualidades, aliadas à beleza de suas franjas, fazem dele um companheiro belo e especial.<br/><br/><br/>No geral, os Teckels são cães saudáveis e raramente adoecem. No entanto, pelo fato de terem o corpo alongado, são vulneráveis a males de coluna e por isso deve-se impedir que esse cãozinho suba e desça escadas em excesso e pule de lugares altos. Ao ser carregado deve-se tomar muito cuidado para que não seja erguido pelas patas dianteiras – o correto é segurá-lo sempre na horizontal, apoiando o cãozinho no antebraço para que toda a sua coluna receba suporte. A obesidade também é inimiga da coluna do Teckel. É importante oferecer ração balanceada na quantidade correta e exercitá-lo diariamente, com exercícios de baixo impacto para não forçar a coluna.','eaa513ee5d4bb29aab2f84dc299870e8.jpg',NULL,NULL,'0','0','de7093cccc64b1f31ba54c94d6f2c45e','noticia',9,1,0,0,'2011-12-04 23:03:41'),
 (3,17,22,'pedigree','Dona Margarita Freeman Vila Lobos','<strong>Detalhes do Cão</strong><br/><br/><strong>Nome:</strong> Dona Margarita Freeman Vila Lobos<br/><strong>Apelido:</strong> Margo<br/><strong>Raça:</strong> Chinese Crested Dog<br/><strong>Sexo:</strong> Fêmea<br/><strong>Data de Nascimento: </strong>10 de Abril de 2008<br/><strong>Número de Registro:</strong> FCMP5349-B<br/><strong>Cor:</strong> Branco & Preto<br/><br/>','8496df260900ecf75e7ca94c9a6d1e17.jpg','2835b6473dec086471591d5fdf4be347.jpg',NULL,'0','0','1b1bd82b54fb1a38d55e6743a32afd1e','animais',10,1,0,0,'2011-12-05 23:49:42'),
 (4,17,22,'imagem-texto','Hypersexy Top Model De Rama','<strong>Detalhes do Cão</strong><br/><br/><strong>Nome:</strong> Hypersexy Top Model De Rama<br/><strong>Apelido:</strong> Cléo<br/><strong>Raça:</strong> Chinese Crested Dog<br/><strong>Sexo:</strong> Fêmea<br/><strong>Data de Nascimento:</strong> 7 de Março de 2008<br/><strong>Número de Registro:</strong> LOSH 1039453<br/><strong>Cor:</strong> Preto & Branco<br/><br/>','0ac52c9c0800777a15ee5fe640a37b56.jpg','dd0b6aa8fe16e86dafeeb6ff4a8f4468.jpg',NULL,'0','0','57ef70f53bc46c8eb18338533c5c32c6','animais',11,1,0,0,'2011-12-06 20:58:45'),
 (5,19,25,'pedigree','Pamadron Swing Into Spring','teste','5d9facdc395a2c614cde19bd72661163.jpg','8a6e1124ff1bf6b264f03ff7c9aa6602.jpg',NULL,'0','0','bd3f2a33d9b7cfaa9b3aff671f480bf5','animais',7,1,0,0,'2011-12-06 22:15:01'),
 (6,5,-1,'imagem-texto','Hospedagem de cães, gatos, aves e ferrets','A guarda temporária de um animal implica em uma ampla responsabilidade por parte de quem a detém e isso fez com que nós, do Centro Cinófilo Salatino, estabelecêssemos o limite máximo de 40 hóspedes.<br/>Aqui o seu melhor amigo jamais será tratado como um passarinho, a menos que ele seja um. Ele nunca ficará hospedado numa gaiola pois espaço é o que não nos falta.<br/><br/>Nossos hóspedes caninos passam as noites em amplos e arejados apartamentos e aqueles que são bem socializados e tolerantes poderão ter um companheiro de quarto. Para o cão é sempre preferível ficar acompanhado de outro cão, desde que se entendam bem, e isso faz com que a ausência do dono seja menos traumática para o animal.<br/><br/>Durante o dia os cães são soltos revezadamente de maneira que todos passem algumas horas correndo livremente, brincando e incrementando a socialização, quando for o caso nadando e fazendo esteira ou ainda participando de aulas de adestramento e/ou agility. Nosso objetivo é fazer com que os cães tenham prazer em participar de todas as atividades que lhes são oferecidas e que voltem para suas casas em melhor condicionamento físico do que quando chegaram. Vale ressalter que animais idosos e/ou em tratamento recebem cuidados especiais de acordo com a orientação de seu veterinário.','5d4df58ebfdd7679ec66d17610f6a66c.jpg','b70ec2bf0f4769066394c4060142a5ec.jpg',NULL,'1','0','5ac2f9b0e50c3b8362aa255a1425ec6f','noticia',6,1,0,0,'2011-12-07 21:49:09'),
 (7,12,-1,'video-texto','Visita ao programa 1','A certificação de metodologias que nos auxiliam a lidar com a constante \r\ndivulgação das informações afeta positivamente a correta previsão da \r\ngestão inovadora da qual fazemos parte. Podemos já vislumbrar o modo \r\npelo qual o acompanhamento das preferências de consumo obstaculiza a \r\napreciação da importância das direções preferenciais no sentido do \r\nprogresso. Não obstante, o entendimento das metas propostas pode nos \r\nlevar a considerar a reestruturação das novas proposições. A nível \r\norganizacional, o fenômeno da Internet faz parte de um processo de \r\ngerenciamento do sistema de formação de quadros que corresponde às \r\nnecessidades.<br/>',NULL,'da2953af25705cab29304e4ef7dba6cf.jpg','kkGeOWYOFoA','0','1','cc179440d24f726737afdc2e8ee14cd8','midia',1,1,0,0,'2011-12-14 04:19:55'),
 (8,12,-1,'video-texto','Salatino Italian Greyhound ','É claro que o fenômeno da Internet talvez venha a ressaltar a \r\nrelatividade de alternativas às soluções ortodoxas. A certificação de \r\nmetodologias que nos auxiliam a lidar com a complexidade dos estudos \r\nefetuados faz parte de um processo de gerenciamento do orçamento \r\nsetorial. Gostaria de enfatizar que a valorização de fatores subjetivos \r\noferece uma interessante oportunidade para verificação das diversas \r\ncorrentes de pensamento. ',NULL,'d9a60671a458dbc5ecd4aee518e37135.jpg','shceAIuN24k','0','1','b05fd6fdee86a075f935b81351e022ed','midia',2,1,0,0,'2011-12-14 05:05:43'),
 (9,6,27,'imagem-texto','Restaurante Salatino','O VELHO SONHO FINALMENTE TORNOU-SE REALIDADE!<br/><br/>O Restaurante Salatino esta pronto e agora podemos degustar juntos alguns dos pratos que são preparados com muito carinho.<br/><br/>Estamos abertos aos finais de semana e feriados.<br/><br/><strong>Para efetuar reservas entrar em contato pelo telefone 11.4616.0186.</strong><br/>',NULL,NULL,NULL,'1','0','af131f8831ea5b7c7f0b582ac4bcbc6b','clube-salatino',3,1,0,0,'2011-12-15 22:04:30'),
 (10,6,26,'imagem-texto','noticia 1','teste',NULL,NULL,NULL,'0','0','d1044de222185761cbf97d80f7eb7062','noticia',5,1,0,0,'2011-12-15 23:37:36'),
 (11,6,26,'imagem-texto','noticia 2','teste 2<br/>',NULL,NULL,NULL,'0','0','fd33efb8603b7ad1b8fa84e552646a79','noticia',4,1,0,0,'2011-12-15 23:40:10'),
 (12,6,26,'video-texto','noticia 3 com video e galeria','Papillons do Canil Salatino',NULL,NULL,'Z38v5WL1rko','1','1','209dea49dff650dfe9bf78aa99ce01d4','noticia,midia',0,1,0,0,'2011-12-16 03:56:37');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;


--
-- Definition of table `controllers`
--

DROP TABLE IF EXISTS `controllers`;
CREATE TABLE `controllers` (
  `idController` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `label` varchar(45) DEFAULT NULL,
  `taskType` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `display` set('menu','sideBar') DEFAULT NULL,
  PRIMARY KEY (`idController`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `controllers`
--

/*!40000 ALTER TABLE `controllers` DISABLE KEYS */;
INSERT INTO `controllers` (`idController`,`name`,`label`,`taskType`,`order`,`display`) VALUES 
 (17,'Controllers','Controllers','read,write',8,'menu'),
 (18,'Groups','Grupos','read,write',10,'menu'),
 (19,'Users','Usuários','read,write',9,'menu'),
 (20,'Actions','Ações','read,write',11,''),
 (21,'Sections','Menu','read,write',5,'sideBar'),
 (22,'Subsections','Submenu','read,write',6,''),
 (23,'Content','Conteúdo','read,write',1,'sideBar'),
 (24,'Tags','Tags','read,write',7,'sideBar'),
 (25,'Banners','Banners','read,write',3,'sideBar'),
 (26,'Pedigree','Pedigree','read,write',2,'sideBar'),
 (27,'Contact','Contatos','read,write',4,'sideBar'),
 (28,'Signup','Cadastros','read,write',NULL,'sideBar');
/*!40000 ALTER TABLE `controllers` ENABLE KEYS */;


--
-- Definition of table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `controllers` text,
  PRIMARY KEY (`idGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`idGroup`,`name`,`permission`,`controllers`) VALUES 
 (2,'Admin','0,0,0,0,2,2,2,0,2,2,2,2','17,18,19,20,21,22,23,24,25,26,27,28'),
 (3,'Nadeb','2,2,2,2,2,2,2,2,2,2,2,2','17,18,19,20,21,22,23,24,25,26,27,28');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


--
-- Definition of table `indexes`
--

DROP TABLE IF EXISTS `indexes`;
CREATE TABLE `indexes` (
  `key` int(10) unsigned NOT NULL,
  `value` varchar(100) NOT NULL,
  `categ` char(1) NOT NULL,
  KEY `Index_1` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indexes`
--

/*!40000 ALTER TABLE `indexes` DISABLE KEYS */;
INSERT INTO `indexes` (`key`,`value`,`categ`) VALUES 
 (17,'chinese-crested-dog','1'),
 (21,'chinese-crested-dog/machos','2'),
 (22,'chinese-crested-dog/femeas','2'),
 (18,'italian-greyhound','1'),
 (23,'italian-greyhound/machos','2'),
 (24,'italian-greyhound/femeas','2'),
 (19,'teckel-pelo-longo','1'),
 (25,'teckel-pelo-longo/machos','2'),
 (20,'saluki','1'),
 (5,'hotel-spa','1'),
 (6,'clube-salatino','1'),
 (27,'clube-salatino/restaurante','2'),
 (26,'clube-salatino/spa-pra-voce','2'),
 (7,'centro-veterinario','1'),
 (8,'pet-shop','1'),
 (11,'como-cuidar-do-seu-cao','1'),
 (12,'salatino-na-midia','1'),
 (14,'exposicao-de-racas','1'),
 (15,'videos','1'),
 (16,'galerias-de-fotos','1');
/*!40000 ALTER TABLE `indexes` ENABLE KEYS */;


--
-- Definition of table `pedigree`
--

DROP TABLE IF EXISTS `pedigree`;
CREATE TABLE `pedigree` (
  `idContent` int(10) unsigned NOT NULL,
  `cp01` varchar(255) DEFAULT NULL,
  `cp02` varchar(255) DEFAULT NULL,
  `cp03` varchar(255) DEFAULT NULL,
  `cp04` varchar(255) DEFAULT NULL,
  `cp05` varchar(255) DEFAULT NULL,
  `cp06` varchar(255) DEFAULT NULL,
  `cp07` varchar(255) DEFAULT NULL,
  `cp08` varchar(255) DEFAULT NULL,
  `cp09` varchar(255) DEFAULT NULL,
  `cp10` varchar(255) DEFAULT NULL,
  `cp11` varchar(255) DEFAULT NULL,
  `cp12` varchar(255) DEFAULT NULL,
  `cp13` varchar(255) DEFAULT NULL,
  `cp14` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idContent`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedigree`
--

/*!40000 ALTER TABLE `pedigree` DISABLE KEYS */;
INSERT INTO `pedigree` (`idContent`,`cp01`,`cp02`,`cp03`,`cp04`,`cp05`,`cp06`,`cp07`,`cp08`,`cp09`,`cp10`,`cp11`,`cp12`,`cp13`,`cp14`) VALUES 
 (3,'Ludwig- Van Freeman Vila Lobos','Poarott Felipe','The Socialite N´co','Sanpam Basta','Arche Unicovska- Brana','Blandora Withouth A Doubt','Social Butterfly N´co','Kiara Freeman Vila Lobos','The Avenger N´co','Cascaya Candy Ze Zeme Pokladu','Glen - Glo´s Cast No Doubt N´co','When Evening Falls N´co','Genetik Alexa Lachesis','Candy Powder Ok Chipiku');
/*!40000 ALTER TABLE `pedigree` ENABLE KEYS */;


--
-- Definition of table `sample`
--

DROP TABLE IF EXISTS `sample`;
CREATE TABLE `sample` (
  `idSample` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `htmlBody` text,
  `picture` varchar(100) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `options1` varchar(45) DEFAULT NULL,
  `options2` varchar(45) DEFAULT NULL,
  `folder` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '1',
  `insertDate` datetime DEFAULT NULL,
  PRIMARY KEY (`idSample`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sample`
--

/*!40000 ALTER TABLE `sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `sample` ENABLE KEYS */;


--
-- Definition of table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `idSection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `blankContent` int(10) unsigned DEFAULT '0',
  `order` int(10) unsigned DEFAULT '0',
  `active` char(1) DEFAULT '1',
  PRIMARY KEY (`idSection`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`idSection`,`name`,`blankContent`,`order`,`active`) VALUES 
 (5,'Hotel & SPA',0,5,'1'),
 (6,'Clube Salatino',1,6,'1'),
 (7,'Centro Veterinário',0,7,'1'),
 (8,'Pet Shop',0,8,'1'),
 (11,'Como cuidar do seu cão',0,9,'1'),
 (12,'Salatino na Mídia',0,10,'1'),
 (14,'Exposição de Raças',0,11,'1'),
 (15,'Vídeos',0,12,'1'),
 (16,'Galerias de Fotos',0,13,'1'),
 (17,'Chinese Crested Dog',0,1,'1'),
 (18,'Italian Greyhound',0,2,'1'),
 (19,'Teckel pelo longo',0,3,'1'),
 (20,'Saluki ',0,4,'1');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;


--
-- Definition of table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE `signup` (
  `idSignup` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `optIn` char(1) DEFAULT NULL,
  PRIMARY KEY (`idSignup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

/*!40000 ALTER TABLE `signup` DISABLE KEYS */;
/*!40000 ALTER TABLE `signup` ENABLE KEYS */;


--
-- Definition of table `subsections`
--

DROP TABLE IF EXISTS `subsections`;
CREATE TABLE `subsections` (
  `idSubsection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idSection` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '0',
  `active` char(1) DEFAULT '1',
  PRIMARY KEY (`idSubsection`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subsections`
--

/*!40000 ALTER TABLE `subsections` DISABLE KEYS */;
INSERT INTO `subsections` (`idSubsection`,`idSection`,`name`,`order`,`active`) VALUES 
 (21,17,'Machos',0,'1'),
 (22,17,'Fêmeas',0,'1'),
 (23,18,'Machos',0,'1'),
 (24,18,'Fêmeas',0,'1'),
 (25,19,'Machos',0,'1'),
 (26,6,'spa pra você',2,'1'),
 (27,6,'Restaurante',1,'1');
/*!40000 ALTER TABLE `subsections` ENABLE KEYS */;


--
-- Definition of table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `idTag` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idTag`),
  UNIQUE KEY `Index_2` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`idTag`,`name`,`order`) VALUES 
 (1,'noticia',1),
 (2,'midia',2),
 (3,'clube-salatino',3),
 (4,'animais',4);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idGroup` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `user_groups` (`idGroup`),
  CONSTRAINT `user_groups` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`idUser`,`idGroup`,`name`,`email`,`password`) VALUES 
 (2,2,'Salatino','salatino@salatino.com.br','Ù!ê‚º8N§Ú'),
 (3,3,'Mateus Martins','mateusweb@gmail.com','oPŠ.÷¹ˆ¿?oŒ4[');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
