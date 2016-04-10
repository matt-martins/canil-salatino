-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2012 at 09:39 PM
-- Server version: 5.1.52
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mateuswe_salatinosite`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE IF NOT EXISTS `actions` (
  `idAction` int(11) NOT NULL AUTO_INCREMENT,
  `idController` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `taskType` varchar(20) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idAction`),
  KEY `controllers_actions` (`idController`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`idAction`, `idController`, `name`, `link`, `taskType`, `order`) VALUES
(14, 17, 'Inserir', 'admin/controllers/edit/', 'write', 0),
(15, 18, 'Listar', 'admin/groups/list/', 'read', 0),
(16, 18, 'Inserir', 'admin/groups/edit/', 'write', 0),
(17, 19, 'Listar', 'admin/users/list/', 'read', 0),
(18, 19, 'Inserir', 'admin/users/edit/', 'write', 0),
(19, 20, 'Listar', 'admin/actions/list/', 'read', 0),
(20, 20, 'Inserir', 'admin/actions/edit/', 'write', 0),
(21, 21, 'Listar', 'admin/sections/list/', 'read', 0),
(22, 21, 'Inserir', 'admin/sections/edit/', 'write', 0),
(23, 22, 'Listar', 'admin/subsections/list/', 'read', 0),
(24, 22, 'Inserir', 'admin/subsections/edit/', 'write', 0),
(25, 23, 'Listar', 'admin/content/list/', 'read', 0),
(26, 23, 'Inserir', 'admin/content/edit/', 'write', 0),
(27, 24, 'Listar', 'admin/tags/list/', 'read', 0),
(28, 24, 'Inserir', 'admin/tags/edit/', 'write', 0),
(29, 25, 'Listar', 'admin/banners/list/', 'read', 0),
(30, 25, 'Inserir', 'admin/banners/edit/', 'write', 0),
(31, 26, 'Listar', 'admin/pedigree/list/', 'read', 0),
(32, 27, 'Listar', 'admin/contact/list/', 'read', 0),
(33, 27, 'Inserir', 'admin/contact/edit/', 'write', 0),
(34, 28, 'Listar', 'admin/signup/list/', 'read', 0),
(35, 28, 'Inserir', 'admin/signup/edit/', 'write', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `idBanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(45) DEFAULT NULL,
  `active` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`idBanner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`idBanner`, `image`, `active`) VALUES
(5, '78862e12b53484bc49f899abcedb60cf.jpg', 1),
(6, '7c51ca1152c01e87b6d17ee9a00c85eb.jpg', 1),
(7, '2f83d0300b9f28de3a3e7e9816fcb089.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `message` varchar(1500) DEFAULT NULL,
  `optIn` char(1) DEFAULT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idContact`, `subject`, `name`, `email`, `city`, `state`, `message`, `optIn`) VALUES
(1, NULL, 'mateus', 'mateusweb@gmail.com', 'Ribeirão Preto', 'SP', 'Teste', '1'),
(2, 'Papillom', 'Claudio Gornati', 'cgornatibr@terra.com.br', 'Cotia', 'SP', 'Favor corrigir a palavra PAPILLON que está erroneamente escrita com "M" no final', '1');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`idContent`, `idSection`, `idSubsection`, `template`, `title`, `body`, `picture`, `smallPicture`, `video`, `showGallery`, `showVideo`, `folder`, `tags`, `order`, `active`, `views`, `ranking`, `insertDate`) VALUES
(1, 17, -1, 'imagem-texto', 'Chinese Crested Dog', 'O Grande time foi fundado após recebermos de presente da nossa amiga Ana\r\n Paola Diniz criadora de Rhodesian Ridgback ( CANIL MALABO APD ) a \r\npequena Bayshore Malaboartedeco Crystal.<br/><br/>Após a convivência com \r\nCrystal foi necessário apenas uma semana para nos apaixonarmos pela raça\r\n e apartir dai decidimos que montariamos um grande time.<br/>Passamos á estudar as linhas de sangue e estamos apresentando o nosso novo time.<br/><br/>Obrigado aos grandes criadores que confiaram em mandar seus filhos para a família Salatino!!!<br/><br/>Nossos\r\n sinceros agradecimentos a Ana pela Crystal, a família TAM por trazer o \r\nNash e ao Johhny por fotografar nossos pequenos com todo amor e carinho.', '0499ad99c97cbab90510e87d466aa564.jpg', 'd27cec4175f35a0bf4061cf1fef87a6a.jpg', NULL, '0', '0', '4bf98237643d92223a26329a20217794', 'noticia', 27, 1, 0, 0, '2011-12-04 21:27:43'),
(2, 19, -1, 'imagem-texto', 'Sobre o Teckel de Pêlo Longo', 'Teckel, Dachshund, Bassê, Cofap, Paqueiro, Salsichinha. Assim chamamos este simpático cãozinho no Brasil. Já nos países de língua inglesa são chamados apenas de Dachshund (“Dáx-únd”) e nos países filiados à FCI (Federation Cynologique Internationale) são oficialmente chamados de Teckel.<br/><br/><br/>O Teckel é um cão pequeno e compacto, de pernas curtas e corpo alongado. Possui dupla aptidão sendo exímio caçador de texugos, raposas e lebres é também um excelente cão de companhia.<br/><br/><br/>Os Teckels existem em três tipos diferentes de pelagem: pêlo curto, pêlo longo e pêlo duro; e em três tamanhos distintos: standard, miniatura e kaninchen. Fazendo então um simples cálculo matemático, verifica-se que existem nove diferentes tipos de Teckels. Esses baixinhos contam com um grupo só para eles: o 4º grupo! A classificação da FCI determina que cada variedade de Teckel é considerada uma raça independente, e, portanto, deve-se evitar acasalamentos entre exemplares de tipos de pelagem e tamanhos diferentes.<br/><br/><br/>Assim como o tamanho e a pelagem, o temperamento de cada variedade do Teckel é diferente. Pode-se dizer sem medo de se cometer alguma injustiça que, de maneira geral, o Teckel de pêlo longo é o mais dócil, o de pêlo duro o mais obstinado e o de pêlo curto o mais determinado. O Teckel de pêlo longo também é considerado o mais delicado com objetos da casa e o mais tranqüilo. Essas qualidades, aliadas à beleza de suas franjas, fazem dele um companheiro belo e especial.<br/><br/><br/>No geral, os Teckels são cães saudáveis e raramente adoecem. No entanto, pelo fato de terem o corpo alongado, são vulneráveis a males de coluna e por isso deve-se impedir que esse cãozinho suba e desça escadas em excesso e pule de lugares altos. Ao ser carregado deve-se tomar muito cuidado para que não seja erguido pelas patas dianteiras – o correto é segurá-lo sempre na horizontal, apoiando o cãozinho no antebraço para que toda a sua coluna receba suporte. A obesidade também é inimiga da coluna do Teckel. É importante oferecer ração balanceada na quantidade correta e exercitá-lo diariamente, com exercícios de baixo impacto para não forçar a coluna.', 'eaa513ee5d4bb29aab2f84dc299870e8.jpg', NULL, NULL, '0', '0', 'de7093cccc64b1f31ba54c94d6f2c45e', 'animais', 29, 1, 0, 0, '2011-12-04 23:03:41'),
(3, 17, 35, 'pedigree', 'Br Ch Dona Margarita Freeman Vila Lobos', '<strong></strong>Nome: Br Ch Dona Margarita Freeman Vila Lobos<br/><br/>Apelido: Margo<br/><br/>Data de Nascimento:<br/><br/>Cor: Branca<br/><br/>Sexo: Fêmea<br/><br/>Microchip: 147939390A<br/><br/>Proprietário: Canil Salatino / Luana Pontes<br/><br/>Títulos: Campeã Brasileira de Estrutura e Beleza - CBKC FCI<br/>', '8496df260900ecf75e7ca94c9a6d1e17.jpg', '2835b6473dec086471591d5fdf4be347.jpg', NULL, '0', '0', '1b1bd82b54fb1a38d55e6743a32afd1e', 'animais', 30, 1, 0, 0, '2011-12-05 23:49:42'),
(4, 17, 35, 'imagem-texto', ' Br Ch Hypersexy Top Model De Rama', '<strong>Nome:&nbsp; Br Ch </strong>Hypersexy Top Model De Rama<br/><strong><br/>Apelido:<br/><br/>Data de Nascimento: 07/03/2008<br/><br/>Cor: Preta e Branca <br/><br/>Sexo: Fêmea<br/><br/>Proprietários: Canil Salatino / Família Haddad<br/><br/>Títulos: Campeã Brasileira de Estrutura e Beleza - CBKC FCI<br/><br/><br/><br/></strong><strong></strong> <br/><br/>', '0ac52c9c0800777a15ee5fe640a37b56.jpg', 'dd0b6aa8fe16e86dafeeb6ff4a8f4468.jpg', NULL, '0', '0', '57ef70f53bc46c8eb18338533c5c32c6', 'animais', 31, 1, 0, 0, '2011-12-06 20:58:45'),
(5, 19, 25, 'pedigree', 'Pamadron Swing Into Spring', 'teste', '5d9facdc395a2c614cde19bd72661163.jpg', '8a6e1124ff1bf6b264f03ff7c9aa6602.jpg', NULL, '0', '0', 'bd3f2a33d9b7cfaa9b3aff671f480bf5', 'animais', 26, 1, 0, 0, '2011-12-06 22:15:01'),
(6, 5, -1, 'imagem-texto', 'Hospedagem de cães, gatos e aves', 'A guarda temporária de um animal implica em uma ampla responsabilidade por parte de quem a detém e isso fez com que nós, do Centro Cinófilo Salatino, estabelecêssemos o limite máximo de 40 hóspedes.<br/>Aqui o seu melhor amigo jamais será tratado como um passarinho, a menos que ele seja um. Ele nunca ficará hospedado numa gaiola pois espaço é o que não nos falta.<br/><br/>Nossos hóspedes caninos passam as noites em amplos e arejados apartamentos e aqueles que são bem socializados e tolerantes poderão ter um companheiro de quarto. Para o cão é sempre preferível ficar acompanhado de outro cão, desde que se entendam bem, e isso faz com que a ausência do dono seja menos traumática para o animal.<br/><br/>Durante o dia os cães são soltos  em corrdeiras teladas e gramadas de ate 80om de acordo com o tamanha e sexo, nossos hóspedes passam o dia  correndo livremente, brincando e incrementando a socialização, quando for o caso nadando e fazendo esteira ou ainda participando de aulas de adestramento. Nosso objetivo é fazer com que os cães tenham prazer em participar de todas as atividades que lhes são oferecidas e que voltem para suas casas em melhor condicionamento físico do que quando chegaram. Vale ressalter que animais idosos e/ou em tratamento recebem cuidados especiais de acordo com a orientação de seu veterinário.<br/><br/>Temos também hospedagem especializada para gatos que, dada a peculiar agilidade desses animais, necessitam de instalações apropriadas para contê-los.<br/> <br/><br/>Nossos gatis são totalmente telados, suas portas de vidro blindado abrem-se para uma ante-câmara de segurança, igualmente fechada por tela, e tudo isso evita qualquer possibilidade de fuga. Além disso os gatis localizam-se em área completamente separada dos cães o que faz com que os gatos fiquem menos estressados uma vez que não ouvem latidos ou outros ruídos que possam amedrontá-los.<br/> <br/><br/>Todo animal antes de fazer o chek-in deve apresentar sua carteirinha de vacinações onde devem constar todas as vacinas pertinentes à espécie. Os cães devem estar vacinados contra Raiva, V8, giárdia e tosse canina além de ser obrigatória a aplicação de uma bisnaga de algum anti-parasita (carrapatos, pulgas e mosquitos) disponível no mercado, evitando assim a entrada desse tipo de parasita no recinto do canil.<br/> <br/>Durante a estadia aqui no Centro Cinófilo Salatino, todos os cães são vermifugados, fazendo com que retornem para suas casas livres de vermes.<br/> <br/>Outra prática que adotamos é o corte regular das unhas dos nossos hóspedes pois via de regra esse serviço é relegado pelos pet shops.<br/> <br/>Fazemos também limpeza nos ouvidos dos nossos hóspedes, sejam eles cães ou gatos, coisa que o dono geralmente tem dificuldade em fazê-lo.<br/><br/>Para os donos que não tem tempo de trazer o seu animal até o Hotel Salatino, disponibilizamos também o serviço de transporte, contando com um veículo apropriado, monitorado via-satélite e com ar condicionado para garantir a segurança e o conforto térmico dos hóspedes.Este serviço não esta disponível aos finais de semana e feriados e o horario de atendimento e das 7 as 17 horas<br/>', '5d4df58ebfdd7679ec66d17610f6a66c.jpg', 'b70ec2bf0f4769066394c4060142a5ec.jpg', NULL, '1', '0', '5ac2f9b0e50c3b8362aa255a1425ec6f', 'noticia', 10, 1, 0, 0, '2011-12-07 21:49:09'),
(9, 6, 27, 'imagem-texto', 'Restaurante Salatino', 'O VELHO SONHO FINALMENTE TORNOU-SE REALIDADE!<br/><br/>O Restaurante Salatino esta pronto e agora podemos degustar juntos alguns dos pratos que são preparados com muito carinho.<br/><br/>Estamos abertos aos finais de semana e feriados.<br/><br/><strong>Para efetuar reservas entrar em contato pelo telefone 11.4616.0186.</strong><br/>', 'c8232f13ba4f5463683f9e0ca9e3a161.jpg', 'ef439d0a195d057b63f70f598f9e2f97.jpg', NULL, '1', '0', 'af131f8831ea5b7c7f0b582ac4bcbc6b', 'clube-salatino', 28, 1, 0, 0, '2011-12-15 22:04:30'),
(13, 22, -1, 'imagem-texto', 'Papillon', '<br/>O Papillon é um simpático cãozinho de companhia, muito inteligente e dinâmico e cujo maior prazer é agradar ao seu dono. Por ser um cão extremamente limpo e cheio de saúde torna-se um companheiro fácil de conviver. Sua pelagem sedosa se espalha por todo o corpo e possui longas franjas nas orelhas cujo formato lhe conferem o aspecto das asas de uma borboleta, daí o nome “papillon” que em francês significa justamente borboleta. Apesar de ser um cão de pelagem longa, é de muito fácil manutenção pois não possui sub-pêlo diminuindo muito a formação de nós e por conseguinte o risco de embaraçar. Pela mesma razão é um tipo de pelagem que não solta pêlos pela casa pois a muda anual é infinitamente mais discreta uma vez que não existe o sub-pêlo.<br/> <br/><br/>O Papillon é uma raça que surgiu em meados do século XIV, simultaneamente nas cortes da França, da Bélgica e da Espanha, sendo um descendente direto do “Continental Toy Spaniel”. Por se tratar efetivamente de um cão do tipo spaniel, no Brasil a raça é chamada pela CBKC de “Pequeno Spaniel Continental” e apesar de muito difundida em todo o mundo, entre nós ainda é uma raça pouco conhecida tendo apenas alguns criadores que se dedicam a ela.<br/> <br/><br/>Ao mesmo tempo que são cães ativos e inteligentes, sendo por isso muito utilizados nas provas de agility, são igualmente muito dóceis e amáveis podendo, e devendo, então viver muito intimamente próximos do dono.<br/>O Papillon está classificado em 8º lugar dentre todas as raças caninas no livro de Stanley Coren “A Inteligência dos Cães.<br/>Essa dupla aptidão do Papillon faz dele um cão versátil sendo por isso um companheiro perfeito tanto para crianças quanto para pessoas mais idosas. <br/>', '4d9303c2b4bee2790368339245ddc2ec.jpg', 'c44a84dbeba83ed8a2eb9127133b6ce8.jpg', NULL, '0', '0', '49c38f6202e2e5e5dfd1183c38bfe11c', 'animais', 25, 1, 0, 0, '2012-01-07 14:39:40'),
(15, 23, -1, 'imagem-texto', 'Italian Greyhound', 'O Pequeno Lebrel Italiano, como o próprio nome já sugere, é o menor dentre todas as variedades de GALGOS. Acredita-se que ele tenha surgido há mais de 2.000 anos na região do Mediterrâneo entre Grécia, Turquia e Egito.<br/><br/>Imagina-se que esse elegante e adorável galguinho foi desenvolvido para ser principalmente um animal de companhia, numa tentativa de miniaturização dos grandes galgos que eram utilizados para a caça.<br/> <br/>Foi na Idade Média que a incontestável graça dos galguinhos começou a transformá-los em companheiros bastante apreciados na região sudeste da Europa fazendo deles, a partir do século 16, os cães favoritos da realeza local sendo então fartamente retratados pelos mais importantes pintores da época, principalmente os italianos.<br/> <br/>De beleza incomum e de temperamento carinhoso, o moderno galguinho continua até os dias de hoje derramando todo o seu charme e elegância pelos sofás, poltronas e camas das mais variadas sociedades.<br/><br/>O Pequeno Lebrel Italiano, com participação crescente e ativa em exposições de beleza e obediência, vem cada vez mais alcançando excelentes resultados em suas apresentações e com isso conquistando maior número de amantes pelo mundo afora.<br/> <br/>Graças a seu tamanho reduzido e a seu temperamento dócil, o galguinho tem sido cada vez mais utilizado como cão de terapia e tem se mostrando um excelente ator na moderna técnica de auxílio às pessoas doentes.<br/> <br/>Não se esqueça nunca que um galguinho, em condições normais de saúde, viverá 12 ou mais anos e que você será durante toda a vida dele o único responsável direto por sua manutenção e saúde.<br/> <br/>Qualquer dúvida que você tenha com relação à compra de um filhote, por gentileza entre em contato conosco que teremos o maior prazer em ajudá-lo nessa tão importante decisão que é a de levar um novo ser vivo para o convívio de seu lar.<br/> <br/>QUANDO TUDO COMEÇOU<br/> <br/>Meu interesse pelos galgos vem de longuíssima data.<br/> <br/>A primeira vez na minha vida que pus os meus olhos sobre um galgo de verdade foi em 1963. Estava eu então com 10 anos de idade, indo para o Colégio Nossa Senhora do Carmo que ficava na Praça Clóvis Beviláqua quando de dentro do ônibus avistei uma senhora que caminhava, pela calçada da Rua do Arouche, levando a passear com uma linda coleira um magérrimo cão cor de areia.<br/> <br/>Naquele dia assisti às aulas com a cabeça naquele cachorro e ao chegar em casa fui correndo pesquisar a Enciclopédia Barsa (logicamente naquela “era” não havia internet) para saber qual seria aquela raça de cão que tanto me encantara. Logo descobri que se tratava de um galgo e pelo tamanho daquele exemplar, tudo indicava se tratar de um Whippet.<br/> <br/>Alguns anos mais tarde tive a sorte de conhecer a criadora daquele cachorro e que até hoje é a minha grande amiga Maria Lúcia Kernke que foi a primeira criadora de Whippets e Greyhounds em nosso país tendo registrado sua primneira ninhada em 1947 no lendário canil Pirajense localizado em Campinas SP.<br/> <br/>No final dos anos 70, morando então na França, tive a oportunidade de conhecer o Petit Levrier Italien que é o nome dado naquele país ao Pequeno Lebrel Italiano. Naquele momento achei aquele cãozinho a raça mais perfeita que poderia existir no mundo pois reunia ao mesmo tempo uma beleza extravagante, uma elegância inquestionável e uma praticidade insuperável em sua manutenção.<br/> <br/>Em 1980, então de volta ao Brasil, agora amigo de Maria Lúcia Kernke e já criando Whippets sob o sufixo WHIPOJUCA, resolvi que também queria criar Pequeno Lebrel Italiano.<br/> <br/>Decidi então entrar em contato com o criador francês Mr. Louis Lelias do canil Des Pitchoun Diables e dele comprei quatro cães:<br/><br/>Sirius Des Pitchoun Diables, um lindo macho cinza que foi o pai da primeira ninhada de galguinhos registrada no Canil Whipojuca e que foi modelo em uma campanha publicitária da marca Lycra.<br/> <br/>Samba Des Pitchoun Diables, uma charmosa e lindíssima fêmea isabela que foi a mãe do primeiro galguinho campeão de minha criação e que se chamava Grissini de Whipojuca.<br/> <br/>Savina Des Pitchoun Diables e Severina Des Pitchoun Diables, duas irmãs de ninhada que foram, juntamente com a Samba, importantes matrizes do canil Whipojuca.<br/> <br/>Na mesma ocasião também trouxe ao Brasil um outro galguinho, comprado por intermédio do até hoje criador de Petit Levrier Italien e Salukis Mr. Jean Louis Grunheid, que se chamava Scapin du Pigeonier Romain. Infelizmente esse cão tinha sérios problemas de mordedura e de estrutura; por sorte além de tudo isso ele também era estéril.<br/><br/>Só depois de haver importado todos esses cães e de ter iniciado em 1980 minha criação de galguinhos, fui descobrir que havia, naquela época, um grave problema na raça: os galguinhos de então possuíam uma extremada fragilidade óssea o que lhes causava frequentes fraturas nas pernas.<br/> <br/>Após cinco anos de criação e depois de ter tido alguns cães vítimas de fraturas, decidi encerrar minha criação castrando todo o plantel que estava em meu poder.<br/> <br/>Em 2006, quando os galguinhos eram apenas parte do meu passado cinófilo e o Canil Salatino já de há muito estava focado em Salukis, Papillons e Dachshund Miniatura de Pêlo Longo, o nosso querido amigo Gabriel Valdez, renomado juiz e proprietário do canil DaVinci’s da Colômbia, em visita ao Brasil e ao nosso canil, gentilmente resolveu nos presentear com uma belíssima galguinha negra chamada DaVinci’s Lucrecia Borgia. Como se não bastasse o maravilhoso presente, a Lucrecia ainda por cima estava coberta pelo campeão americano Belcanto Indian Summer que é de criação e propriedade daquela que se transformou em nossa mentora e amiga sincera Patrícia Anders do canil Belcanto, localizado em Stauton, Virginia, USA.<br/> <br/>A partir daí a retomada aos galguinhos era inevitável e felizmente foi triunfal.<br/> <br/>Em Setembro de 2006 nasceram 7 lindos filhotes da Lucrecia e que foram nossos primeiros galguinhos agora registrados no Canil Salatino que é de propriedade minha e de meu sócio Rochester.<br/> <br/>Em 2007 Rochester e eu fomos à França para uma vez mais buscar galguinhos e por incrível que pareça novamente do Mr. Louis Lelias, agora na casa dos 90 anos de idade, que mantém ativo até hoje o canil Des Pitchoun Diables e que é considerado o mais antigo criador de Petit Levrier Italien de toda a Europa.<br/> <br/>Dessa viagem trouxemos do Mr. Louis Lelias um macho isabela chamado Bianco Des Pitchoun Diables e também um lindo macho cinza, nascido em um famoso canil francês da atualidade cujos proprietários são o casal Laveyssiere, cujo nome é Cyrano Du Domaine De Chanteloup.<br/> <br/>Em seguida, ainda durante o ano de 2007, nosso amigo Gabriel Valdez nos mandou mais duas de suas cadelas adultas, a de cor isabela Davinci’s Mia Dolce Condoleeza e de cor azul Belcanto Davinci’s Sicília.<br/> <br/>Recentemente, em Maio de 2008, fomos aos EUA buscar com nossa amiga e mentora Patrícia Anders do Canil Belcanto, duas preciosidades da raça, o macho vermelho Belcanto Mandrake The Magician e a fêmea isabela Belcanto Ionia The Enchantress. Tanto Mandrake quanto Ionia, embora americanos são praticamente sólidos e assim poderão colaborar bastante no aperfeiçoamento das estruturas de nossos galguinhos europeus.<br/> <br/>A CONTRAPOSIÇÃO DOS PADRÕES FCI E AKC<br/> <br/>Embora esses dois padrões sejam coincidentes na maioria de suas assertivas relativas à estrutura e movimentação, no que tange à cor dos galguinhos há uma contraditória divergência praticamente intransponível entre eles e que acaba por dividir a raça ao meio.<br/> <br/>Enquanto na Europa e nos países filiados à FCI os galguinhos têm necessariamente que ter coloração SÓLIDA, permitindo o padrão FCI marcações brancas apenas no peito e nos pés, o AKC aceita cães com manchas brancas por todo o corpo podendo inclusive chegar a um animal totalmente branco desde que bem pigmentado.<br/> <br/>Essa questão tem sido motivo de debates e discussões apaixonadas e ferrenhas entre aqueles criadores europeus que concordam e aqueles que discordam dessa regra limitante de coloração. Indubitavelmente na média os cães americanos têm melhores estruturas e movimentações do que os cães europeus e isso se explica pela maior liberdade dada aos americanos pelo padrão AKC que não impõe limites de cores.<br/> <br/>O grande desafio dos criadores filiados à FCI é criarem cães sólidos e ao mesmo tempo com boas estruturas e essa é a razão de nós, do Canil Salatino, trabalharmos com linhas de sangue importadas tanto da Europa quanto dos Estados Unidos.<br/>', '53e5ef6154629c696e0dd154e5535281.jpg', NULL, NULL, '0', '0', 'd9963aeace4c00ced8f80383314d9e57', NULL, 24, 1, 0, 0, '2012-01-12 07:59:11'),
(16, 7, -1, 'imagem-texto', 'Centro Veterinário Salatino', 'CENTRO VETERINÁRIO SALATINO<br/><br/>O Centro Cinófilo Salatino conta com a direção geral do competente<br/>e experiente&nbsp; Médico Veterinário&nbsp; Dr. Claudio Ribeiro Cruz,&nbsp; CRMV-SP<br/>07429, cujas especialidades são respectivamente clínica geral,<br/>cirurgia geral e ortopedia.<br/>A clínica Salatino conta também com equipamentos profissionais de<br/>última geração como anestesia inalatória, cilindros de oxigênio,<br/>microscópio binocular, monitor cardíaco multiparâmetro, autoclave<br/>para esterilização, balança digital, geladeiras especiais para<br/>armazenamento de vacinas e o suporte, caso necessário, de um gerador<br/>de energia elétrica com 55.000 KWAs, capaz de segurar toda a<br/>estrutura do Centro Cinófilo Salatino durante 24 horas por dia em<br/>casos de falta de energia.<br/>Além dos serviços previamente citados, o Centro Cinófilo Salatino<br/>conta também com o apoio técnico e profissional dos seguintes médicos<br/>veterinários:<br/>Dra Mônica&nbsp; Sartori, especialista em fisioterapia&nbsp; e acupuntura veterinária.<br/>Prof&nbsp; Dra Silvia Crusco, especialista em reprodução animal.<br/>Dra Renata Squarzoni, especialista em oftalmologia veterinária.<br/>Dr Guilherme Pereira, especialista em cardiologia veterinária.<br/>Dr Ronaldo Lucas especialista em dermatologia veterinária.<br/>', '113d9d2082fb2404460ecea719d0c976.jpg', 'b4aafb2e6e2443d1da0ee2140d06d159.jpg', NULL, '0', '0', '1929ee11e44bec524a8eaad3f4461deb', 'noticia', 22, 1, 0, 0, '2012-01-12 08:57:14'),
(17, 6, 26, 'imagem-texto', 'SPA para Yoga, Massagem e Meditação', 'O SPA Salatino é comandado por Lucas Ribeiro, que iniciou seu trabalho&nbsp; na&nbsp; IAM (integrated Amrta Meditation), pela mestra&nbsp; indiana Sri. Mata Amrtanandamay Devi , AMMA. Ainda nesta época&nbsp; foi para San Francisco, California onde se formou em Vinyasa Yoga pelo instituto Yoga Tree; professores responsaveis: Darren Main, Les Leventhal, Elise Lorimer e Stacey Rosenberg (Anusara Yoga). Aulas com Christopher Tompkins. Perto de San Francisco, estudou&nbsp; Terapias Indianas pela California College of Ayurveda, Grassvalley, CA. Formacao: abhyanga (massagem ayurvedica), basti, facial, marma terapia e shirodhara. <br/><br/>Experiência em ashtanga com o prof Larry Schultz, pratica com Janet Stone e Stephanie Snyder,&nbsp; Lauren Slater, Chrisandra Fox, Elizabeth Rosser e Pedro Franco e Lygia Lima. Workshops com o professor Les Leventhal de Vinyasa e Arm Balancing.<br/><br/>De volta ao Brasil, iniciou sua pratica como instrutor na Escola Santoshi, Yoga e terapias Indianas, e em aulas particulares e agora também faz parte da família Salatino. <br/><br/>Introdução a Massagem Ayurvedica e Yoga<br/><br/>Vinyasa é uma pratica vigorosa onde mescla respiração com movimento. A aula tem uma fluência maior comparado com os outros estilos. O professor instrui você a passar de uma pose para outra dentro de um ritmo respiratório, fazendo com que a seqüência fique parecendo uma “dança”. O que se pode esperar de uma aula de vinyasa? Muito movimento, alinhamento, respiração forte, maior relaxamento e claro, alongamento.<br/>A massagem ayurvédica é uma vigorosa massagem que estimula os músculos e a circulação, liberando as toxinas presas aos músculos e tecidos. A massagem Ayurvédica propicia um realinhamento postural, alívio de tensões (por vezes crônica) no corpo físico, fortalece o sistema imunológico, e tem efeitos anti-stress e anti-depressivos.', '6d29ecf100b254c21ce6f0808a8d66d1.jpg', '1cfc58da152e7af2fdecedcaffdb8b2e.jpg', NULL, '0', '0', 'cd21246fa777ad54e3e4f5132926191a', 'clube-salatino', 23, 1, 0, 0, '2012-01-12 09:23:15'),
(18, 17, 21, 'pedigree', 'Salatino Gardenal ML ', 'Nome: Salatino Gardenal 2HL<br/><br/>Apelido: Gardenal<br/><br/>Data de Nascimento: 02/11/2009<br/><br/>Cor: Branco e Preto<br/><br/>Sexo: Macho<br/><br/>Microchip: 900006000090316<br/><br/>Proprietário: Canil Salatino<br/><br/>Títulos: Campeão Brasileiro de Estrutura e Beleza - CBKC FCI<br/><br/><br/>', '7ba9af0dae28590f0b64a705350af419.jpg', '4a87aa34597d528138226aa142364e12.jpg', NULL, '0', '0', '4f7bc2f25ec720f44e42dbc4ff870e22', 'animais', 21, 1, 0, 0, '2012-01-12 10:09:37'),
(19, 17, 21, 'pedigree', 'Salatino Vivarin  1HL ', 'Nome: Salatino Vivarin 1 HL<br/><br/>Apelido: Vivarin <br/><br/>Data de Nascimento: 18/10/2009<br/><br/>Cor: Preto e Branco<br/><br/>Sexo: Macho <br/><br/>Microchip: 900006000093229<br/><br/>Proprietário: Canil Salatino<br/><br/>Títulos: Campeão Brasileiro de Estrutura e Beleza - CBKC FCI<br/>', '2c31a9889437fba9b434b36c4deff971.jpg', '5b983d3d6e6c0ff22bcb722950c55517.jpg', NULL, '0', '0', '19b0a525070cb633f44eefe6ec695fdb', 'animais', 20, 1, 0, 0, '2012-01-12 11:06:27'),
(20, 17, 22, 'pedigree', 'BR Ch Salatino Legend´s Chesecake Baked For Salatino', 'Nome: BR Ch Salatino Legend´s Chesecake Baked For Salatino<br/><br/>Apelido: Chesecake<br/><br/>Data de Nascimento: 05/12/2008<br/><br/>Cor: Branca<br/><br/>Sexo: Fêmea<br/><br/>Microchip: 939000002003989<br/><br/>Proprietário: Canil Salatino<br/><br/>Títulos: Campeã Brasileira de Estrutura e Beleza - CBKC FCI', '12c898b919ced1692269b64524c50d0c.jpg', '13f1eddc2fe49efd65c3c17a0cb22b75.jpg', NULL, '0', '0', '0bac463bd0c444516636c35bc5b7e458', 'animais', 19, 1, 0, 0, '2012-01-12 11:44:10'),
(22, 17, 22, 'pedigree', 'Br Ch I´M a Show Off N´Co', 'Nome: Br Ch I´M a Show Off N´Co<br/><br/>Apelido: Showy<br/><br/>Data de Nascimento: 09/07/2009<br/><br/>Cor: Branca<br/><br/>Sexo: Fêmea<br/><br/>Microchip: 939000001158530<br/><br/>Proprietário: Canil Salatino<br/><br/>Títulos: Campeã Brasileira de Estrutura e Beleza - CBKC FCI', '8d57a0d9fe95ddab93863ded49615c42.jpg', '063214402998bd1c1bc69d44ab1bb874.jpg', NULL, '0', '0', 'f3a973759f3da55544c350f16a812915', 'animais', 17, 1, 0, 0, '2012-01-12 12:45:12'),
(23, 20, -1, 'imagem-texto', 'Saluki', 'Os Salukis são cães muito especiais e não são para qualquer tipo de pessoa, por isso nos países árabes o Saluki é considerado um presente de Alá.<br/>O cão é considerado pelos muçulmanos um animal impuro, exceção feita apenas ao Saluki que é perfeitamente aceito pela religião Islâmica por se tratar de um animal útil ao homem. São usados pelas tribos nômades como cães de proteção contra predadores além de serem extremamente úteis no auxílio à caça que é um dos poucos meios de se conseguir alimento no deserto.<br/>&nbsp;<br/>Embora seja muito difundida em todo o Oriente Médio, é no Irã que parece estar o berço dessa raça e ao que tudo indica o nome Saluki provém da antiga cidade árabe Saluk, já desaparecida e que significa “o nobre”.<br/>&nbsp;<br/>Através de gravuras egípcias e de esculturas antigas acredita-se que os Salukis tenham surgido ainda nos tempos dos faraós mas só chegaram ao Ocidente no século XIX. Dada a vastidão territorial do Oriente Médio, a raça desenvolveu-se com uma grande diversidade de tipos e de tamanhos.<br/>&nbsp;<br/>Em regiões de clima mais adverso e com menor oferta de alimento natural os Salukis costumam ser menores e mais ágeis, sendo assim mais utilizados para a caça de lebres.<br/>Já os cães que são oriundos de regiões ricas em alimento natural, costumam ser maiores e mais fortes sendo então utilizados para a caça de presas maiores como alces e gazelas.<br/>&nbsp;<br/>Por ser historicamente um exímio caçador e viver milenarmente em regiões muito áridas, tornou-se extremamente resistente e veloz e se utiliza mais da visão do que do faro para encontrar e perseguir suas vítimas. O Saluki avista sua presa a longas distâncias e só então dá início a uma rápida e ágil perseguição até o alvo.<br/>&nbsp;<br/>Por se tratar de um cão de caça e de velocidade, precisa se exercitar com muita frequência para fortalecer a musculatura que é a proteção dos ossos, evitando assim possíveis fraturas. Em contra partida ao seu lado atlético, os Salukis adoram dormir em lugares macios e confortáveis.<br/>&nbsp;<br/>Mesmo sem ser agressivo, o Saluki exerce com muita propriedade a função de guardião pois cerca o intruso com pulos e latidos fazendo assim com que ele se sinta amedrontado. São cães de temperamento reservado, muito discretos em seus gestos e atitudes e pouco efusivos em suas demonstrações de carinho. Apesar desse caráter independente e dessa economia de afeto, são cães extremamente ligados ao seu dono e por isso são considerados cães de um dono só.<br/>&nbsp;<br/>São também animais extremamente limpos podendo passar horas a fio deitados lambendo-se como gatos e por essa razão não possuem cheiro.<br/>Existem duas variedades de Salukis, os de pêlo longo e os de pêlo curto. Os cruzamentos entre as variedades são comuns e numa mesma ninhada podem nascer tanto filhotes totalmente de pêlo curto quanto filhotes totalmente de pêlo longo.<br/>&nbsp;<br/>Criar cães com o intuito de se conseguir exemplares ganhadores de exposições de beleza não é jamais uma tarefa fácil porém há certas raças que são mais difíceis do que outras, seja do ponto de vista da criação propriamente dita (partos, montas, cesarianas etc), seja da dificuldade de se conseguir corrigir certos defeitos.<br/>Com os salukis não se costuma ter nenhum problema especial de criação, as fêmeas são excelentes parideiras, mães prolíferas e extremamente zelosas.<br/>No que tange ao melhoramento de certos defeitos típicos da raça pode-se dizer que essa dificuldade não é maior nem menor do que em outras raças. Melhorar as cabeças por exemplo é tarefa muito mais fácil do que melhorar as angulações tanto trazeiras quanto dianteiras e estas sensivelmente mais difíceis de serem melhoradas do que aquelas. Outros pontos com relativa dificuldade para serem corrigidos são a abertura de ante-peito e a profundidade de peito. Como já disse anteriormente, o ítem mais importante a ser levado em conta quando se julga um saluki é sua movimentação e esta, como sabemos, está diretamente ligada à qualidade das angulações, principalmente as de ombros. Por esta razão os criadores de saluki que conhecem a raça que criam, visam a melhora das angulações de seus cães visando com isso conseguir uma movimentação de qualidade. Um saluki quando se move de maneira típica é dos animais mais belos do mundo.<br/>&nbsp;<br/>Os sighthounds de modo geral e por conseqüência também os salukis, não são os cães mais indicados para provas de adestramento, agility ou qualquer outro tipo de exercício que exija disciplina e auto-controle. Os galgos são cães que foram desenvolvidos para perseguir com muita velocidade e determinação a presa que surge repentinamente à sua frente.<br/>Se um saluki estiver no meio de alguma atividade de treinamento, que diga-se de passagem para ele é sempre muito cansativa, e subitamente avistar ao longe um animal qualquer correndo, certamente ele largará tudo o que estava fazendo e sairá em disparada ao encalço daquilo que para ele é uma presa, mesmo que na realidade não seja.<br/>&nbsp;<br/>A raça saluki existe em duas variedades de pelagem, cães de pêlo longo que são os mais conhecidos do grande público e cães de pêlo curto que são mais raros.<br/>Apesar de duas variedades de pelagem, ambos são salukis e como tal são tratados tanto no que diz respeito à criação quanto nas exposições.<br/>As duas variedades podem perfeitamente ser cruzadas entre si e os resultados serão os seguintes:<br/>1) pêlo longo X pêlo longo = todos os filhotes serão de pêlo longo<br/>2) pêlo longo X pêlo curto = podem nascer filhotes de pêlo longo e de pêlo curto<br/>3) pêlo curto X pêlo curto = podem nascer filhotes de pêlo curto e de pêlo longo<br/>&nbsp;<br/>É muito importante salientar que um saluki de pêlo longo nascido de dois cães de pêlo curto ou de um cão de pêlo curto e outro cão de pêlo longo, terá a pelagem longa absolutamente normal, não existindo a possibilidade dele ser menos provido de franjas porque seus pais ou um de seus pais for de pêlo curto.<br/>A abundância ou não de franjas é naturalmente hereditária porém é transmitida apenas entre os cães de pêlo longo. O melhor saluki nascido no Canil Salatino, de nome Salatino Danado de Bom, tem franjas belíssimas tanto nas orelhas quanto na cauda e é filho de dois cães de pêlo curto.<br/>&nbsp;<br/>Como são a mesma raça, as características costumam ser as mesmas embora há criadores que vêem os de pêlo curto como mais dóceis e afáveis; eu particularmente tendo a concordar com essa teoria pois sou um fã incondicional dos de pêlo curto.<br/>Os salukis de pêlo curto são como ostras ou comida japonesa, prova-se e aprende-se a gostar. Além disso, na minha opinião as duas variedades se completam esteticamente pois enquanto o de pêlo longo tem o glamour o de pêlo curto tem a excentricidade.<br/>&nbsp;<br/>Claudio Gornati', '0aae02ebf9b25343695d8a16e9435aaf.jpg', NULL, NULL, '0', '0', 'ecb53172272df5e1354a00cf2a56ec54', NULL, 18, 1, 0, 0, '2012-01-12 13:10:52'),
(24, 5, 51, 'video-texto', 'Jaiminho e Nina ', 'Jaiminho e Nina de férias no Hotel Salatino.<br/>', NULL, '7978168c84e0b16614ad08cf3f22e374.jpg', 'yEsOyalto1Y', '0', '0', '48625749c212aaeed92c258805804ee1', NULL, 6, 1, 0, 0, '2012-01-12 13:44:27'),
(25, 5, 51, 'video-texto', 'Woody no Hotel Salatino', 'Woody de férias no Hotel e SPA  Salatino.', NULL, 'a61ce77a8736fe0749a3d5bb505207de.jpg', 'Mka9ebU3Pno', '0', '0', '61b372bafeef191e1393104bc5dd3dbd', NULL, 8, 1, 0, 0, '2012-01-12 14:07:09'),
(26, 17, 35, 'pedigree', 'Br Ch I Only Date Models N´co ', 'Nome: Br Ch I Only Date Models N´co <br/><br/>Apelido: Nico <br/><br/>Raça: Chinese Crested Dog <br/><br/>Sexo: Macho <br/><br/>Data de Nascimento: 23 de Janeiro de 2008 <br/><br/>Número de Registro: TR 7479402 <br/><br/>Cor: Preto & Branco <br/>', 'd6802ae4fa1873e3ba5dcd1e7c87a667.jpg', '62134128ad1d2cb42313c83ee72a9c39.jpg', NULL, '0', '0', '88c1700c513e82a4b49d4245b6558006', NULL, 16, 1, 0, 0, '2012-01-12 14:20:37'),
(27, 17, 21, 'pedigree', 'Br Ch Solino´s Nashville ', 'Nome: Solino´s Nashville <br/><br/>Apelido: Nash <br/><br/>Raça: Chinese Crested Dog <br/><br/>Sexo: Macho <br/><br/>Data de Nascimento: 1 de Maio de 2008 <br/><br/>Número de Registro: VDH/CER CC 3386/08 <br/><br/>Cor: Branco & Preto <br/><br/>Proprietários: Marisa Oliveira / Canil Salatino<br/>', '4a41d0f3ae24d606aa334ee23848c0c6.jpg', 'c4b7221d5f8a1a0ee8fecdac4a79ad0f.jpg', NULL, '0', '0', 'd585f3c1be5ef1fb67758d3a67f79cf6', NULL, 14, 1, 0, 0, '2012-01-12 14:33:41'),
(28, 20, 45, 'pedigree', 'Salatino Deu A Louca Na Nega', 'Nome: Salatino Deu A Louca Na Nega<br/><br/>Apelido: Nega<br/><br/>Raça: Saluki<br/><br/>Sexo: Fêmea<br/><br/>Data de Nascimento: 4 de Julho de 2008<br/><br/>Número de Registro: SPX/08/03523<br/><br/>Cor: Preto & Prata<br/><br/>MIcrochip: 939000002004213<br/><br/>Proprietário: Canil Salatino<br/>', 'ffe2f0a4b25c22ad0caae373dd1616fa.jpg', '801d60dca53571d506575bbbae980ab3.jpg', NULL, '0', '0', '71e1a5ba573ba2f558901ea38eedcd74', NULL, 15, 1, 0, 0, '2012-01-12 14:41:34'),
(29, 20, 44, 'pedigree', 'Ch Bis Salatino Danado De Bom PL', 'Nome: Salatino Danado De Bom PL<br/><br/>Apelido: Bom Bom<br/><br/>Raça: Saluki<br/><br/>Sexo: Macho<br/><br/>Data de Nascimento: 30 de Janeiro de 2004<br/><br/>Número de Registro: SPX / 04/00312<br/><br/>Cor: Branco<br/><br/>Proprietários: Canil Salatino- Brazil / Brian -&nbsp; USA<br/><br/>Títulos:<br/>Campeão Brasileiro<br/>Campeão Argentino<br/>Campeão Colombiano<br/>Campeão Panamericano<br/>Campeão Internacional<br/><br/><br/>', 'f5e7a32e675fbd9aecdb92df3475e144.jpg', '51a32662f0ecec5252432ccf2994eb79.jpg', NULL, '0', '0', '4756f19bdfff99ef77fb48eab1232737', NULL, 7, 1, 0, 0, '2012-01-12 14:54:54'),
(30, 20, 44, 'pedigree', 'Salatino Astro em Desfile', 'Nome: Salatino Astro Em Desfile<br/><br/>Apelido: Astro<br/><br/>Raça: Saluki<br/><br/>Sexo: Macho<br/><br/>Data de Nascimento: 4 de Julho de 2008<br/><br/>Número de Registro: SPX/08/03524<br/><br/>Cor: Preto & Prata<br/><br/>Proprietário: Canil Salatino / Alfredo Stefani<br/>', '562cbb88d50eddb12a4520618afa721e.jpg', '9b308ee9bc88f32aacab2110d6293394.jpg', NULL, '0', '0', '984c19d2f84872f41a29c5c6044e3f18', NULL, 9, 1, 0, 0, '2012-01-12 15:03:30'),
(31, 20, 46, 'pedigree', 'Br Ch Salatino Saia Justa PL', 'Nome: Salatino Saia Justa <br/><br/>Apelido: Saia <br/><br/>Raça: Saluki <br/><br/>Sexo: Fêmea <br/><br/>Data de Nascimento: 21 de Dezembro de 2007 <br/><br/>Número de Registro: SPX / 07/08688 <br/><br/>Cor: Branco &amp; Vermelho <br/><br/>Proprietários: Canil Salatino / João Paulo<br/>', NULL, NULL, NULL, '0', '0', 'b71fc301f08a1b1cca57d963c1b34b66', NULL, 11, 1, 0, 0, '2012-01-12 15:12:00'),
(32, 20, 44, 'pedigree', 'Salatino O  Bem Amado Pl', 'Nome: Salatino O Bem Amado Pl<br/><br/>Apelido: Bem <br/><br/>Data de Nascimento:13/01/2011<br/><br/>Cor: Areia<br/><br/>Sexo: Macho <br/><br/>Microchip: 939000002072992<br/><br/>Proprietário: Canil Salatino <br/><br/>', 'd0905f2f41f9709aaa58a286692bcf3c.jpg', '09b99717191fbb29834abaeaf65beb44.jpg', NULL, '0', '0', '4fbc25807a39ccb0910b9bf62cf1f309', NULL, 12, 1, 0, 0, '2012-01-12 15:28:03'),
(33, 20, 45, 'pedigree', 'Salatino Noiva de Copacabana', 'Nome: Salatino Noiva de Copacabana Pl<br/><br/>Apelido: Noiva<br/><br/>Data de Nascimento:13/01/2011<br/><br/>Cor :Branca<br/><br/>Sexo: Fêmea<br/><br/>Microchip: 939000002073348<br/><br/>Proprietário: Canil Salatino<br/><br/>', '20eda7bab99172b6afcf8c71d3f2c8cc.jpg', '84f78cefb70f94d65376be7c1383f606.jpg', NULL, '0', '0', '95321317de0359f4ffbfcf13752e06e4', NULL, 13, 1, 0, 0, '2012-01-12 15:34:54'),
(34, 25, -1, 'imagem-texto', 'AGORA TAMBÉM GATIL SALATINO', 'AGORA TAMBÉM GATIL SALATINO<br/><br/>Depois de ter sido, juntamente com Anne Marie Gasnier, um dos sócios<br/>fundadores, no início dos anos 70, do Clube Brasileiro do Gato, e de<br/>ter sido um dos primeiros criadores de gatos Abissínios no Brasil,<br/>com o nome de Gatil Bororo, Cláudio Gornati retoma agora sua paixão<br/>pelos felinos e funda, juntamente com seu sócio Rochester Oliveira, o<br/>GATIL SALATINO.<br/><br/>O recém fundado Gatil Salatino tem por objetivo a criação<br/>criteriosa das raças Ragdoll e British Shorthair nas variedades<br/>Silver Classic Tabby e Chinchila. Para isso Cláudio e Rochester<br/>foram, em fins de Outubro passado, assistir à edição 2011 da FIFE<br/>World Cat Show em Poznan, na Polônia.   <br/><br/>Aproveitaram a viagem e trouxeram, dos melhores gatis europeus, seis<br/>magníficos exemplares de British Shorthair, sendo dois machos e<br/>quatro fêmeas com belíssimos olhos verde esmeralda profundos,<br/>capazes de causar inveja até mesmo à Elizabete Taylor.<br/><br/>Em 2010 já haviam importado dos EUA, do Gatil Willowtreerags dois<br/>lindos exemplares dos dóceis Ragdolls.<br/>Mantendo a tradição de dedicação, esmero, investimento na<br/>criação e buscando sempre as melhores linhas de sangue mundo afora,<br/>o Gatil Salatino em breve estará produzindo o que há de melhor em<br/>Ragdolls e British Shorthair nas cores Silver Classic Tabby e<br/>Chinchila. <br/>', 'f3cd103c2f8d977cbfac03843fb3c63e.jpg', '6e6a4345846a1184a847560c8a108e88.jpg', NULL, '1', '0', '9ec8214af49da3001b0aec6ba1c04520', 'noticia', 32, 1, 0, 0, '2012-01-12 16:10:48'),
(35, 6, 52, 'imagem-texto', 'Nossos mascotes', 'Além dos nossos amigos de 4 patas outra grande paixão da familía Salatino são animais silvestres e exóticos, em especial os psitacídeos.<br/>Todos nossos animais possuem nota fiscal de origem e nasceram em criatórios legalizados pelo Ibama.<br/>Nossos animais são anilhados e microchipados conforme as leis.<br/>Não compre animal do tráfico pois para cada animal vendido desta maneira 9 morrem pelas péssimas condições de saúde e higiene.<br/>Estes animais do Salatino NÂO estão à venda.<br/>Caso queira comprar&nbsp; um animal silvestre ou exótico consulte a lista de criatórios autorizados pelo Ibama.', '1b06384083a3f3a554bbfc7d3d001921.jpg', 'd675e3da3f96ee5e84e960a95b1eb900.jpg', NULL, '1', '0', '5aa7f835f844ede2fae47b7408fb047e', 'clube-salatino', 1, 1, 0, 0, '2012-01-12 17:09:25'),
(36, 23, 34, 'pedigree', 'Vuylstekeara Fulvio', 'Nome: Vuylstekeara Fulvio<br/><br/>Apelido:Fulvio<br/><br/>Data de Nascimento:01/08/2010<br/><br/>Cor: Vermelho<br/><br/>Sexo: Macho<br/><br/>Microchip:250269604150898<br/><br/>Proprietário: Canil Salatino<br/><br/>Origem: França<br/>', 'c853d2b2971e6d8eeae8b70328916c84.jpg', '42cf99dda1b41bf3cb8c1c860ec66a16.jpg', NULL, '0', '0', '725d13f96911d842bb5684ce4dbeab30', NULL, 2, 1, 0, 0, '2012-01-12 17:27:26'),
(37, 12, -1, 'imagem-texto', 'Revista Vogue', 'A Edição Histórica de número 400 da Revista Vogue, que traz na<br/>capa o ator Rodrigo Santoro e a modelo Alessandra Ambrósio, contou também<br/>com a participação de uma Salatino.<br/><br/>Na matéria intitulada Meio a Meio, o estilista Alexandre<br/>Herchcovitch e seu marido o antiquário Fábio Souza abrem as portas<br/>de seu belíssimo apartamento dos anos 50, projetado por Artacho<br/>Jurado, onde além de esbanjarem bom gosto numa decoração eclética<br/>e original, também apresentam aos leitores da Vogue seus filhos de<br/>quatro patas, nossa orelhudíssima papillon Salatino Coco Chanel e os<br/>chinese cresteds Paschoal e Berenice. <br/>', '154aa8cb33cd776692fd7647d3c267f2.jpg', '552c401490e6943ca169f12de0dae773.jpg', NULL, '0', '0', '66521a437f1b4050a74d752bcad6734b', 'midia', 3, 1, 0, 0, '2012-01-12 17:49:47'),
(38, 12, -1, 'imagem-texto', 'Revista Looks', ' SALATINO NA CAPA DA REVISTA LOOKS <br/>\r\n<br/>\r\nA edição de número 05 da Revista Looks, trás em sua capa a<br/>\r\nruivíssima Atriz Marina Ruy Barbosa da novela Morde e Assopra da Rede Glogo de Televião.<br/>Marina esbanjando charme e elegância&nbsp; carrega no colo a<br/>\r\nnossa ruivinha Zizi cujo nome de batismo é SALATINO ELLE DEFILE AUX<br/>\r\nCHAMPS ELYSEES, très chic n''est ce pas? Ambas foram clicadas pelas<br/>\r\nlentes competentes do fotógrafo Danilo Borges.\r\n', '7a436ba8cd5b4aaf8e32f497a4e55e6b.jpg', '797588fb5e8bb33233f283ec82d285d5.jpg', NULL, '0', '0', 'b35b354f4d65373c93d135959cd7ab91', 'Nenhuma', 4, 1, 0, 0, '2012-01-12 18:08:19'),
(39, 12, -1, 'video-texto', 'Making of do cd manuscrito da cantora Sandy Lima', 'Making of do cd manuscrito da cantora Sandy Lima com participaçao da pequena Zelda .<br/>', NULL, '82a1b94b60d5a6093fca948a17fbe038.jpg', 'G0zNsAjgMII', '0', '0', '42d3986693ffbc01682fbd52d6d86748', 'midia', 5, 1, 0, 0, '2012-01-12 18:24:20'),
(40, 23, 37, 'pedigree', 'Salatino Davinci Celeste Aida PLI', 'Nome: Salatino Davinci Celeste Aida PLI<br/><br/>Apelido: Aida <br/><br/>Data de Nascimento: 20/04/2008<br/><br/>Cor: Isabela<br/><br/>Sexo: Fêmea<br/><br/>Microchip: 941000002712952<br/><br/>Proprietário: Canil Salatino<br/>', 'bff91d0643ce9dd4ad26f9a7fe8d329e.jpg', 'd4622597d335c9347a2c01b374d040d5.jpg', NULL, '0', '0', 'd21dd3963ab1c271522a743f3da91169', NULL, 0, 1, 0, 0, '2012-01-12 18:38:41'),
(41, 22, 41, 'pedigree', 'Br Ch Salatino Mini Jupe Serree', 'Nome: Salatino Mini Jupe Serre<div><br/></div><div>Data de Nascimento 19/04/2010</div><div><br/></div><div>Cor: Branca e Preta</div><div><br/></div><div>Sexo: Fêmea</div><div><br/></div><div>Microchip: 900006000090696</div><div><br/></div><div>Proprietários: Canil Salatino Brasil / Paula Cox USA</div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; "><br/>Títulos:&nbsp;</span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; "><br/></span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; ">Campeã Brasileira</span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; "><br/></span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; ">Campeonato Americano em andamento</span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; "><br/></span></div><div><span class="Apple-style-span" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(101, 85, 70); line-height: 18px; "><br/>&nbsp;</span></div>', '41918056b1b9d6b12f49546efd8a0285.jpeg', '1995ea6d28f20df93e253c145536ccc7.jpeg', NULL, '0', '0', 'c22df9034e08a6887958df85aaf876ad', NULL, 0, 1, 0, 0, '2012-01-13 16:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `controllers`
--

DROP TABLE IF EXISTS `controllers`;
CREATE TABLE IF NOT EXISTS `controllers` (
  `idController` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `label` varchar(45) DEFAULT NULL,
  `taskType` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `display` set('menu','sideBar') DEFAULT NULL,
  PRIMARY KEY (`idController`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `controllers`
--

INSERT INTO `controllers` (`idController`, `name`, `label`, `taskType`, `order`, `display`) VALUES
(17, 'Controllers', 'Controllers', 'read,write', 9, 'menu'),
(18, 'Groups', 'Grupos', 'read,write', 11, 'menu'),
(19, 'Users', 'Usuários', 'read,write', 10, 'menu'),
(20, 'Actions', 'Ações', 'read,write', 12, ''),
(21, 'Sections', 'Menu', 'read,write', 6, 'sideBar'),
(22, 'Subsections', 'Submenu', 'read,write', 7, ''),
(23, 'Content', 'Conteúdo', 'read,write', 1, 'sideBar'),
(24, 'Tags', 'Tags', 'read,write', 8, 'sideBar'),
(25, 'Banners', 'Banners', 'read,write', 3, 'sideBar'),
(26, 'Pedigree', 'Pedigree', 'read,write', 2, 'sideBar'),
(27, 'Contact', 'Contatos', 'read,write', 4, 'sideBar'),
(28, 'Signup', 'Cadastros', 'read,write', 5, 'sideBar');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `controllers` text,
  PRIMARY KEY (`idGroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`idGroup`, `name`, `permission`, `controllers`) VALUES
(2, 'Admin', '0,0,0,0,2,2,2,0,2,2,2,2', '17,18,19,20,21,22,23,24,25,26,27,28'),
(3, 'Nadeb', '2,2,2,2,2,2,2,2,2,2,2,2', '17,18,19,20,21,22,23,24,25,26,27,28');

-- --------------------------------------------------------

--
-- Table structure for table `indexes`
--

DROP TABLE IF EXISTS `indexes`;
CREATE TABLE IF NOT EXISTS `indexes` (
  `key` int(10) unsigned NOT NULL,
  `value` varchar(100) NOT NULL,
  `categ` char(1) NOT NULL,
  KEY `Index_1` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indexes`
--

INSERT INTO `indexes` (`key`, `value`, `categ`) VALUES
(23, 'italian-greyhound', '1'),
(34, 'italian-greyhound/machos', '2'),
(37, 'italian-greyhound/femeas', '2'),
(38, 'italian-greyhound/filhotes-a-venda', '2'),
(39, 'italian-greyhound/retirados', '2'),
(22, 'papillon', '1'),
(40, 'papillon/machos', '2'),
(41, 'papillon/femeas', '2'),
(42, 'papillon/filhotes-a-venda', '2'),
(43, 'papillon/retirados', '2'),
(19, 'teckel-pelo-longo', '1'),
(47, 'teckel-pelo-longo/machos', '2'),
(48, 'teckel-pelo-longo/femeas', '2'),
(49, 'teckel-pelo-longo/filhotes-a-venda', '2'),
(50, 'teckel-pelo-longo/retirados', '2'),
(17, 'chinese-crested-dog', '1'),
(21, 'chinese-crested-dog/machos', '2'),
(22, 'chinese-crested-dog/femeas', '2'),
(36, 'chinese-crested-dog/filhotes-a-venda', '2'),
(35, 'chinese-crested-dog/retirados', '2'),
(20, 'saluki', '1'),
(44, 'saluki/machos', '2'),
(45, 'saluki/femeas', '2'),
(46, 'saluki/retirados', '2'),
(6, 'clube-salatino', '1'),
(52, 'clube-salatino/mascotes', '2'),
(27, 'clube-salatino/restaurante', '2'),
(26, 'clube-salatino/spa-pra-voce', '2'),
(5, 'hotel-spa', '1'),
(51, 'hotel-spa/videos-dos-hospedes', '2'),
(7, 'centro-veterinario', '1'),
(11, 'como-cuidar-do-seu-cao', '1'),
(25, 'gatil-salatino', '1'),
(12, 'salatino-na-midia', '1'),
(14, 'exposicao-de-racas', '1'),
(15, 'videos', '1'),
(16, 'galerias-de-fotos', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pedigree`
--

DROP TABLE IF EXISTS `pedigree`;
CREATE TABLE IF NOT EXISTS `pedigree` (
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

INSERT INTO `pedigree` (`idContent`, `cp01`, `cp02`, `cp03`, `cp04`, `cp05`, `cp06`, `cp07`, `cp08`, `cp09`, `cp10`, `cp11`, `cp12`, `cp13`, `cp14`) VALUES
(3, 'Ludwig- Van Freeman Vila Lobos', 'Poarott Felipe', 'The Socialite N´co', 'Sanpam Basta', 'Arche Unicovska- Brana', 'Blandora Withouth A Doubt', 'Social Butterfly N´co', 'Kiara Freeman Vila Lobos', 'The Avenger N´co', 'Cascaya Candy Ze Zeme Pokladu', 'Glen - Glo´s Cast No Doubt N´co', 'When Evening Falls N´co', 'Genetik Alexa Lachesis', 'Candy Powder Ok Chipiku'),
(18, 'I Only Date Models N´Co', 'American Icon N`Co', 'Sun-Hee´s Unlimited Unique', 'De La Mahafus Royal Blou ', 'The Whole Sha Bang N `co', 'Beddi´s Buccaneer', 'Sun-Hee´s Nova', 'Dona Margarita Freeman Villalobos', 'Ludwig Van Freeman Villalobos', 'Kiara Freeman Villalobos', 'Poarott Felipe', 'The Socialite N´Co', 'The Avenger N´co', 'Cascaya Candy Ze Zeme Pkladu'),
(19, 'Br Ch Solinos Nashville', 'Legends The Great Contender', 'Solino´s Exotic Darjeeling', 'Creststars Legendary Bruizer', 'I´M One Hot Tottie N ´Co', 'The Natural N´Co', 'Solino´s Allure', 'Bayshore Crystal Artdecomalabo', 'Starward Onetowatch At Brocade', 'Bayshore´s Relish The Thought', 'Shamar Acre´s Pockhet Watch', 'Starward LotusTanaki', 'Casbar Double Image', 'Bayshore´s Icesikle'),
(20, 'Legend´s Top Gun', 'Ch Legend´s Ready To Rumble', 'Ch Crestars Xquizite At Legends P', 'Ch Crestars Legendary Bruizer', 'Ch I´m One Hot Tottie N´Co', 'Ch Blandora Whithout a Doubt', 'Ch Crestars Optical Attraction HL', 'Ch Solaris Cover GirlAt Legends', 'Ch Woodlyn Last Comic Standing', 'Ch Crazi Horse´s Lola Cabana', 'Ch Kulana´s Standing Ovation', 'Ch Woodlyns Chardonnay', 'Crazy Horse Double Surprise', 'Ch Bayshore´s Lunar Effect'),
(22, 'Ch De La Mahafu´s Royal Blou', 'Lionheart Kross The Ridge', 'Lionheart Keep Winning For Norway', 'Lionheart Key To Millenium', 'Nanimo Dayzee Belle', 'Beddi´s Jackpot', 'Lionheart Konsider Ulla', 'Ch Take A Look At Me Now N´Co ', 'Ch Crestwood Bamboo Bear', 'Ch It´s All Or Nothing N`co', 'Serre From The House Off Angie', 'Bedlam Ebony', 'CH Blandora Without', 'Ch I Am All That And More N´Co'),
(26, 'Ch American Icon N´co', 'Ch De La Mahafu´s Royal Blou', 'Ch The Whole Sha Bang N´co', 'Lionheart Kross The Ridge', 'Lionheart Keep Winning For Norway', 'Ch Blandora Without A Doubt', 'Ch Juicy Fruit N´co', 'Ch Sun-hee´s Unlimited Unique', 'Beddi´s Buccaneer', 'Sun-Hee´s Nova', 'Willow Of Honey Croft', 'Beddi´s Jewel Case', 'Lohamras Dukat', 'Sun-hee´s Persimmon'),
(27, 'Legends The Great Contender ', 'Creststars Legendary Bruizer', 'I´m One Hot Tottie N´co', 'Lemiz Valjean', 'Crestars All The Right Moves H', 'Crestwood Bamboo Bear', 'A Little Rendevous N´co', 'Solino´s Exotic Darjeeling', 'The Natural N´co', 'Solino´s Allure', 'Glebeheath The Guvnor', 'It´s All Or Nothing N´co', 'Shambala´Hot To Trot', 'Nazhdi Von Shinbashi'),
(28, 'El Hamrah Alamgir', 'El Hamrah La-Jallab', 'El Hamrah Rashida', 'El Hamrah Ergamenes', 'El Hamrahh Qashdah', 'Khalils Sahir', 'El HAmrah Ganesha', 'Salatino GArota Papo Firme PC', 'Ararb Bahari´sTawaasul Uali', 'Midsummer Julia do Repouso do Brookie', 'Arab Bahari´s Oman Rub´al Khali', 'Ara Bahari´s Lalf Laila Wa Laila', 'Midsummer Julia do Repouso do Brookie Midsummer Zavion JC ', 'Midsummers Kismet'),
(29, 'Arab Bahari´s Tawaasul Uali', 'Arab Bahari´s Oman Rub´Al Khali', 'Arab Bahari´s Lalf Laila Wa Laila', 'Arab Bahari´s Iranian Cheik', 'Arab Bahari´s Ifrane Daalan', 'Arab Bahari´s Cha ´ Ali Uali', 'Arab Bahari´s Gamar Zaia', 'Ranesaw Torridon JD Amazon', 'Ranesaw Torridon Let´s Fling', 'Heather Creek Peaseblossom JC', 'Ranesaw Huckle-Bare-Y', 'Ranesaw Do you Wanna Danz', 'Ranesaw Phinale of Sintara SC', 'Ranesaw L A Rain Danz'),
(30, 'El Hamrah Alamgir', 'El Hamrah La-Jallab', 'El Hamrah Rashida', 'El Hamrah Ergamenes', 'El Hamrahh Qashdah', 'Khalils Sahir', 'El HAmrah Ganesha', 'Salatino Garota Papo Firme PC', 'Ararb Bahari´sTawaasul Uali', 'Midsummer Julia do Repouso do Brookie', 'Arab Bahari´s Oman Rub´al Khali', 'Ara Bahari´s Lalf Laila Wa Laila', 'Midsummer Zavion JC', 'Midsummers Kismet'),
(31, 'El Hamrah Alamgir', 'El Hamrah La-Jallab', 'El Hamrah Rashida', 'El Hamrah Ergamenes', 'El Hamrah Qashdah', 'Khalils Sahir Ack-Taz-Eet Schariar', 'El Hamrah Ganesha', 'Salatino Cintura Fina', 'Arab Bahari´s Tawaasul Uali', 'Ranesaw Torridon JD Amazon', 'Arab Bahari´s Oman Rub´All Khali', 'Arab Bahari´s Lalf Laila Wa Laila', 'Ranesaw Torridon Let´s Fling', 'Heather Creek Peaseblossom JC'),
(32, 'Ch Salatino Da Cor Do Pecado Pl ', 'Ch Anjal Sahara Aha Zaman', 'Ch Salatino Zavion Vai Pra Boracéia', 'El Hamrah Wajeeh-Aslan', 'El Hamrah Rammah-Sahir', 'Midsummers Zavion Jc ', 'Ranesaw Torridow JD Amazon', 'Ch Salatino Saia Justa Pl', 'Ch El Hamrah Alamgir', 'Ch Salatino Cintura Fina Pl', 'El Hamarah La-Jallab', 'El Hamrah Rashida', 'Ch Arab Bahari`s Tawaasul Uali', 'Ch Bis Ranesaw Torridon Jd Amazon'),
(33, 'Ch Salatino Da Cor Do Pecado Pl ', 'Ch Anjal Sahara Aha Zaman', 'Ch Salatino Zavion Vai Pra Boracéia', 'El Hamrah Wajeeh-Aslan', 'El Hamrah Rammah-Sahir', 'Midsummers Zavion Jc ', 'Ranesaw Torridow JD Amazon', 'Ch Salatino Saia Justa Pl', 'Ch El Hamrah Alamgir', 'Ch Salatino Cintura Fina Pl', 'El Hamarah La-Jallab', 'El Hamrah Rashida', 'Ch Arab Bahari`s Tawaasul Uali', 'Ch Bis Ranesaw Torridon Jd Amazon'),
(36, 'Caviar Noir Des Princes De Kazan', 'Un Diamant NOir Des Princes de Kazan ', 'Vanina Des Princes de Kazan', 'Neptune Mio Bello Vincitore NKK', 'Walishbury Mille Et Une Nuit Italienne', 'Ares Du Chien D´Ebene', 'Mea Culpa Des Princes De Kazan', 'Dinette Des Princes de Kazan', 'Volubilis Du Manoir Des Ombreuses', 'Aquarelle Des Princes de Kazan ', 'Tadzio Tiepolo Du Manoir Des Ombreuses', 'Tout Feu Tout Flamme Des Princes de Kazan', 'Nil de Shirkan', 'Cremona Pustynny Wiatr PKR'),
(40, 'Ch Bianco Des Pitchoun Diables', 'Lorius Des Pitchoun Diables', 'Uranie Des Pitchoun Diables ', 'Adrian Vom Wetterstein', 'Gemmula Des Pitchoun Diables', 'Nedoper Pitchoun Diables Del Discole', 'Lady Des Pitchoun Diables', 'Belcanto Davinci Sicilia', 'Marchwind Blues fest', 'Marchwind Care Enough', 'Bo-Bett liver Opal Of Windermere', 'Marchwind Magnolia', 'Soloaria Marchwind Andante', 'Marchwind Murphy Brown ');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

DROP TABLE IF EXISTS `sample`;
CREATE TABLE IF NOT EXISTS `sample` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `idSection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `blankContent` int(10) unsigned DEFAULT '0',
  `order` int(10) unsigned DEFAULT '0',
  `active` char(1) DEFAULT '1',
  PRIMARY KEY (`idSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`idSection`, `name`, `blankContent`, `order`, `active`) VALUES
(5, 'Hotel & SPA', 0, 7, '1'),
(6, 'Clube Salatino', 1, 6, '1'),
(7, 'Centro Veterinário', 0, 8, '1'),
(8, 'Pet Shop', 0, 9, '0'),
(11, 'Como cuidar do seu cão', 0, 10, '1'),
(12, 'Salatino na Mídia', 0, 12, '1'),
(14, 'Exposição de Raças', 0, 13, '1'),
(15, 'Vídeos', 0, 14, '1'),
(16, 'Galerias de Fotos', 0, 15, '1'),
(17, 'Chinese Crested Dog', 0, 4, '1'),
(19, 'Teckel pelo longo', 0, 3, '1'),
(20, 'Saluki ', 0, 5, '1'),
(22, 'Papillon', 0, 2, '1'),
(23, 'Italian Greyhound', 0, 1, '1'),
(25, 'Gatil Salatino', 0, 11, '1');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `idSignup` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `optIn` char(1) DEFAULT NULL,
  PRIMARY KEY (`idSignup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`idSignup`, `name`, `email`, `city`, `state`, `optIn`) VALUES
(1, 'mateus', 'mateusweb@gmail.com', 'São Paulo', 'SP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subsections`
--

DROP TABLE IF EXISTS `subsections`;
CREATE TABLE IF NOT EXISTS `subsections` (
  `idSubsection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idSection` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '0',
  `active` char(1) DEFAULT '1',
  PRIMARY KEY (`idSubsection`),
  KEY `idSection` (`idSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`idSubsection`, `idSection`, `name`, `order`, `active`) VALUES
(21, 17, 'Machos', 1, '1'),
(22, 17, 'Fêmeas', 2, '1'),
(26, 6, 'spa pra você', 2, '1'),
(27, 6, 'Restaurante', 1, '1'),
(34, 23, 'Machos', 1, '1'),
(35, 17, 'Retirados', 4, '1'),
(36, 17, 'Filhotes á Venda', 3, '1'),
(37, 23, 'Fêmeas', 2, '1'),
(38, 23, 'Filhotes à Venda', 3, '1'),
(39, 23, 'Retirados', 4, '1'),
(40, 22, 'Machos', 1, '1'),
(41, 22, 'Fêmeas', 2, '1'),
(42, 22, 'Filhotes à Venda', 3, '1'),
(43, 22, 'Retirados', 4, '1'),
(44, 20, 'Machos', 1, '1'),
(45, 20, 'Fêmeas', 2, '1'),
(46, 20, 'Retirados', 3, '1'),
(47, 19, 'Machos', 1, '1'),
(48, 19, 'Fêmeas', 2, '1'),
(49, 19, 'Filhotes à Venda', 3, '1'),
(50, 19, 'Retirados', 4, '1'),
(51, 5, 'Vídeos dos Hóspedes', 0, '1'),
(52, 6, 'Mascotes', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `idTag` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idTag`),
  UNIQUE KEY `Index_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`idTag`, `name`, `order`) VALUES
(1, 'noticia', 1),
(2, 'midia', 2),
(3, 'clube-salatino', 3),
(4, 'animais', 4),
(5, 'Nenhuma', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idGroup` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `user_groups` (`idGroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `idGroup`, `name`, `email`, `password`) VALUES
(2, 2, 'Salatino', 'salatino@salatino.com.br', 'yczrÀ.7ëLe“»â'),
(3, 3, 'Mateus Martins', 'mateusweb@gmail.com', 'oPŠ.÷¹ˆ¿?oŒ4[');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `controllers_actions` FOREIGN KEY (`idController`) REFERENCES `controllers` (`idController`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subsections`
--
ALTER TABLE `subsections`
  ADD CONSTRAINT `subsections_ibfk_1` FOREIGN KEY (`idSection`) REFERENCES `sections` (`idSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_groups` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
