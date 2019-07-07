DROP TABLE dang_ky;

CREATE TABLE `dang_ky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maSV` varchar(9) DEFAULT NULL,
  `maDT` int(12) NOT NULL,
  `ngayDK` datetime DEFAULT NULL,
  `maNhom` varchar(30) DEFAULT NULL,
  `ttDK` int(11) DEFAULT NULL,
  `ngayTT` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO dang_ky VALUES("2","51503005","24","","51503005","3","");
INSERT INTO dang_ky VALUES("3","Ph?c Nghi","228","","Ph?c Nghi","3","");
INSERT INTO dang_ky VALUES("4","Kim Ng�n","229","","Kim Ng�n","3","");
INSERT INTO dang_ky VALUES("6","51503044","21","2019-04-10 01:00:44","51503044","3","2019-04-10 01:00:44");
INSERT INTO dang_ky VALUES("7","51503365","215","2019-04-10 01:01:23","51503365","2","2019-04-10 01:01:23");
INSERT INTO dang_ky VALUES("8","51503067","215","2019-04-10 01:01:23","51503365","2","2019-04-10 01:01:23");
INSERT INTO dang_ky VALUES("9","51503231","214","2019-04-10 01:01:50","51503231","2","2019-04-10 01:01:50");
INSERT INTO dang_ky VALUES("10","51503135","214","2019-04-10 01:01:50","51503231","2","2019-04-10 01:01:50");
INSERT INTO dang_ky VALUES("11","51503321","25","2019-04-10 01:02:59","51503321","2","2019-04-10 01:02:59");
INSERT INTO dang_ky VALUES("12","51503293","210","2019-04-10 01:05:17","51503293","2","2019-04-10 01:05:17");
INSERT INTO dang_ky VALUES("13","51503059","22","2019-04-10 01:17:34","51503059","3","2019-04-10 01:17:34");
INSERT INTO dang_ky VALUES("14","51503133","22","2019-04-10 01:17:34","51503059","3","2019-04-10 01:17:34");
INSERT INTO dang_ky VALUES("15","51503065","225","2019-04-10 01:21:55","51503065","2","2019-04-10 01:21:55");
INSERT INTO dang_ky VALUES("16","51503128","221","2019-04-10 01:44:17","51503128","2","2019-04-10 01:44:17");
INSERT INTO dang_ky VALUES("17","51503118","221","2019-04-10 01:44:17","51503128","2","2019-04-10 01:44:17");
INSERT INTO dang_ky VALUES("18","Th?o Lam","228","","Ph?c Nghi","3","");
INSERT INTO dang_ky VALUES("19","51503039","236","2019-04-10 04:10:17","51503039","2","2019-04-10 04:10:17");
INSERT INTO dang_ky VALUES("20","51503178","236","2019-04-10 04:10:17","51503039","2","2019-04-10 04:10:17");
INSERT INTO dang_ky VALUES("21","51503208","213","2019-04-11 17:21:59","51503208","2","2019-04-11 17:21:59");



DROP TABLE de_tai;

CREATE TABLE `de_tai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maDT` char(12) NOT NULL,
  `tenDT` varchar(255) NOT NULL,
  `loaiDT` char(12) DEFAULT NULL,
  `moTa` text,
  `maGV` int(11) DEFAULT NULL,
  `ngayBS` datetime DEFAULT NULL,
  `slNhom` int(11) DEFAULT NULL,
  `slSV` int(11) DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  `dotDK` int(11) NOT NULL,
  `slDK` int(11) NOT NULL,
  `VPKDuyet` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `maDT` (`maDT`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO de_tai VALUES("2","DACNTT2_1","T�m hi?u Python v� OpenCV 
cho nh?n d?ng m?t ng??i","D? �n CNTT 2","- H?c l?p tr�nh Python
- S? d?ng OpenCV trong Python
- X�y d?ng h? th?ng nh?n d?ng m?t ng??i v?i Python v� OpenCV","32","","1","2","2019-04-11 00:00:00","","0","0","");
INSERT INTO de_tai VALUES("3","DACNTT2_2","T�m hi?u Google Map APIs v� framework Laravel x�y d?ng trang web rao v?t b?t ??ng s?n","D? �n CNTT 2","- T�m hi?u Google Map APIs
- T�m hi?u Laravel Framework
- X�y d?ng website m�nh h?a","32","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("4","DACNTT2_3","PUBG (Game) Finish Placement Prediction","D? �n CNTT 2","- Battle Royale-style video games have taken the world by storm. 100 players are dropped onto an island empty-handed and must explore, scavenge, and eliminate other players until only one is left standing, all while the play zone continues to shrink. - PlayerUnknown\'s BattleGrounds (PUBG) has enjoyed massive popularity. - You are given over 65,000 games\' worth of anonymized player data, split into training and testing sets, and asked to predict final placement from final in-game stats and initial player ratings. - What\'s the best strategy to win in PUBG? Should you sit in one spot and hide your way into victory, or do you need to be the top shot? Let\'s let the data do the talking!","13","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("5","DACNTT2_4","Ph�t tri?n m?ng x� h?i FOTOBOOK","D? �n CNTT 2","Giai ?o?n 1: T�m hi?u v? c�c extra functions v� n?m r� l?i v? l?p tr�nh Ruby on Rails c?ng nh? l?p tr�nh theo Best Practices. Giai ?o?n 2: Thi?t k? Model v� ki?m th? database tr??c khi b??c v�o t?ng function. Giai ?o?n 4: Ki?m th? th�nh c�ng t?ng extra functions tr??c khi ?i v�o c�c main functions Giai ?o?n 3: X? l� main functions theo th? t? t? tr�n xu?ng. Giai ?o?n 4: X? l� extra functions theo th? t? d? ??n kh�. Giai ?o?n 5: Ki?m th? t?ng ch?c n?ng v� Code theo Best Practices. Giai ?o?n 6: Thi?t k? giao di?n v� deploy Heroku.","13","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("6","DACNTT2_5","T�m hi?u v� c�i ??t thu?t to�n khai th�c t?p ph? bi?n tr�n CSDL l?n tr�n m�i tr??ng song song/ph�n t�n","D? �n CNTT 2","-T�m hi?u itemset, database transaction, c�c t�nh ch?t v� thu?c t�nh c?a itemset
- T�m hi?u c�c thu?t to�n khai th�c t?p ph? bi?n (PrePost, Prepost+,..)
- T�m hi?u Framework Spark/ Map Reduce
- ?? xu?t v� c�i ??t thu?t to�n th?c nghi?m","24","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("7","DACNTT2_6","T�m hi?u v� c�i ??t thu?t khai th�c t?p h?u �ch cao b?ng ph??ng ph�p ti?n ho�","D? �n CNTT 2","- T�m hi?u HUI
- T�m hi?u c�c k? thu?t khai th�c HUI (HUI-Miner, EFIM-Miner)
- T�m hi?u c�c k? thu?t Optimization (GA, PSO,..)
- ?? xu?t v� c�i ??t th?c nghi?m","24","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("8","DACNTT2_7","T�m hi?u c�c k? thu?t h?i ?�p t? ??ng d?a tr�n Ontology","D? �n CNTT 2","T�m hi?u Ontology;
X�y d?ng c? s? tri th?c d?a tr�n Ontology;
T�m hi?u c�c k? thu?t ph�n t�ch c�u h?i;
X�y d?ng ph?n m?m th? nghi?m h?i ?�p tr�n mi?n d? li?u c? th?","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("9","DACNTT2_8","T�m hi?u c�c k? thu?t h?i ?�p d?a tr�n Information Retrieval ","D? �n CNTT 2","T�m hi?u c�c k? thu?t Information Retrieval;
T�m hi?u c�c k? thu?t ph�n t�ch c�u h?i;
T�m hi?u c�c k? thu?t ?o ?? t??ng t? gi?a c�u h?i v� v?n b?n;
X�y d?ng ph?n m?m th? nghi?m h?i ?�p tr�n mi?n d? li?u c? th?","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("10","DACNTT2_9","C�c m� h�nh h?c m�y cho sinh ng�n ng? t? nhi�n v� ?ng d?ng trong h?i ?�p t? ??ng","D? �n CNTT 2","T�m hi?u c�c m� h�nh h?c m�y RNN; LSTM;
T�m hi?u b�i to�n Question Answering;
?ng d?ng ?? th? nghi?m ti?p c?n generation cho QAs","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("11","DACNTT2_10","T�m hi?u v� x�y d?ng h? th?ng qu?n l� b�n h�ng ?a k�nh tr�n n?n t?ng web","D? �n CNTT 2","- T�m hi?u c?ng ngh? NodeJS
- X�y d?ng ?ng d?ng qu?n l� b�n h�ng ?a k�nh g?m c�c ch?c n?ng ch�nh:
1. ??a s?n ph?m l�n nhi?u k�nh b�n h�ng kh�c nhau
2. Qu?n l� b�n h�ng t?i qu?y
3. Qu?n l� b�n h�ng tr�n c�c trang th??ng m?i ?i?n t?
4. Qu?n l� ??n h�ng tr�n website b�n h�ng wordpress woocomerce
5. ??ng b? th�ng tin s?n ph?m, ??n h�ng, kh�ch h�ng, t?n kho, ... gi?a c�c k�nh b�n h�ng","11","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("12","DACNTT2_11","T�m hi?u v� x�y d?ng h? th?ng qu?n l� b�n h�ng ?a k�nh tr�n n?n t?ng di ??ng","D? �n CNTT 2","- T�m hi?u c�ng ngh? React Native v� c�c c�ng ngh? li�n quan
- X�y d?ng ?ng d?ng qu?n l� b�n h�ng ?a k�nh bao g?m c�c ch?c n?ng ch�nh sau ?�y:
1. ??a s?n ph?m l�n nhi?u k�nh b�n h�ng kh�c nhau
2. Qu?n l� b�n h�ng t?i qu?y
3. Qu?n l� b�n h�ng tr�n c�c trang th??ng m?i ?i?n t?
4. Qu?n l� ??n h�ng tr�n website b�n h�ng wordpress woocomerce
5. ??ng b? th�ng tin s?n ph?m, ??n h�ng, kh�ch h�ng, t?n kho, ... gi?a c�c k�nh b�n h�ng","11","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("13","DACNTT2_12","T�m hi?u v? IoT ?? qu?n l� m�n h�nh qu?ng c�o","D? �n CNTT 2","IoT v� IoT platform","20","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("14","DACNTT2_13","Blockchain trong qu?n l� s?n ph?m h�ng h�a","D? �n CNTT 2","Blockchain v� c�c ?ng d?ng","20","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("15","DACNTT2_14","Ph�t tri?n ?ng d?ng b�n h�ng tr�n Desktop d�nh cho c�c c?a h�ng b�n l?","D? �n CNTT 2","Ph�t tri?n k? n?ng l?p tr�nh","17","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("16","DACNTT2_15","Ph�t tri?n ?ng d?ng b�n h�ng tr�n Web d�nh cho c�c c?a h�ng b�n l?","D? �n CNTT 2","Ph�t tri?n k? n?ng l?p tr�nh","17","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("17","DACNTT2_16","T�m hi?u v� c�i ??t M� h�nh ?? th? c?a th? tr??ng ch?ng kho�n Vi?t Nam ","D? �n CNTT 2","-T�m hi?u M� h�nh ?? th? c?a th? tr??ng ch?ng kho�n
-Thu th?p d? li?u ch?ng kho�n Vi?t Nam
-C�i ??t m� h�nh ?? th? s? d?ng d? li?u thu th?p ???c
-?�nh gi� ch?t l??ng m� h�nh th�ng qua ?ng d?ng n� v�o l?a ch?n danh m?c ??u t?","16","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("18","DACNTT2_17","T�m hi?u v� c�i ??t ph??ng ph�p t�ch h?p th�ng tin v? d? ?o�n xu h??ng trong l?a ch?n c? phi?u","D? �n CNTT 2","-T�m hi?u C�c gi?i thu?t d? ?o�n chu?i th?i gian
-Thu th?p d? li?u ch?ng kho�n Vi?t Nam
-C�i ??t C�c gi?i thu?t d? ?o�n chu?i th?i gian
-T�ch h?p d? ?o�n v�o l?a ch?n danh m?c ??u t?","16","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("19","DACNTT2_18","Kh?o s�t b�i to�n nh?n d?ng ng??i b?ng ??c tr?ng s�ng n�o","D? �n CNTT 2","- T�m hi?u ??c tr?ng s�ng n�o v?i vai tr� ??c tr?ng sinh tr?c
- Kh?o s�t c�c c�ng tr�nh nh?n d?ng ng??i b?ng ??c tr?ng s�ng n�o ?� c�
- ?�nh gi� kh? n?ng �p d?ng v�o th?c t? c?a b�i to�n n�y","23","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("20","DACNTT2_19","X�y d?ng ?ng d?ng di ??ng theo d�i ho?t ??ng ch?y b?","D? �n CNTT 2","- X�y d?ng ?ng d?ng di ??ng theo d�i qu� tr�nh ch?y b?, s? b??c ch�n, t?n s? t?p luy?n
- Thu th?p d? li?u theo th?i gian
- ??a ra l?i khuy�n, c?nh b�o s?c kh?e...","23","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("21","DACNTT2_20","T�m hi?u m� h�nh Autoencoders v� ?ng d?ng trong th? gi�c m�y t�nh","D? �n CNTT 2","- T�m hi?u v� t?ng h?p c�c nghi�n c?u v? Autoencoders, m?t m� h�nh h?c s�u ??c bi?t trong h?c m�y
- T�m hi?u c�ng c?, m� ngu?n m? trong x? l� ?nh s?, h?c s�u (Tensorflow, Keras, Pytorch...)
- C�i ??t v� s? d?ng ???c c�c c�ng c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? gi�c m�y t�nh (t�m ?nh t??ng t?, chuy?n ??i m�u ?nh...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("22","DACNTT2_21","T�m hi?u m� h�nh GAN v� ?ng d?ng trong th? gi�c m�y t�nh","D? �n CNTT 2","- T�m hi?u v� t?ng h?p c�c nghi�n c?u v? GAN, m?t m� h�nh h?c s�u ??c bi?t ?? h?c c�ch t�i sinh d? li?u
- T�m hi?u c�ng c?, m� ngu?n m? trong x? l� ?nh s?, h?c s�u (Tensorflow, Keras, Pytorch...)
- C�i ??t v� s? d?ng ???c c�c c�ng c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? gi�c m�y t�nh (n�ng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("23","DACNTT2_22","T�m hi?u k? thu?t one-shot learning v� ?ng d?ng v�o vi?c nh?n d?ng g??ng m?t","D? �n CNTT 2","- T�m hi?u c�c m� h�nh h?c s�u n�i chung, v� one-shot learning (siamese NN) ?? n�ng cao hi?u qu? vi?c nh?n d?ng g??ng m?t ng??i so v?i m?ng CNN truy?n th?ng
- T�m hi?u c�ng c?, m� ngu?n m? trong x? l� ?nh s?, h?c s�u (Tensorflow, Keras, Pytorch...)
- C�i ??t v� s? d?ng ???c c�c c�ng c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? gi�c m�y t�nh (n�ng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("24","DACNTT2_23","T�m hi?u c�c k? thu�t h?c s�u cho nh?n d?ng thu?c t�nh ng??i ?i b? qua video","D? �n CNTT 2","- T�m hi?u c�c m� h�nh h?c s�u n�i chung, v� c�c m� h�nh c? th? cho vi?c nh?n d?ng ??n thu?c t�nh, ?a thu?c trong video ng??i ?i b?
- T�m hi?u c�ng c?, m� ngu?n m? trong x? l� ?nh s?, h?c s�u (Tensorflow, Keras, Pytorch...)
- C�i ??t v� s? d?ng ???c c�c c�ng c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? gi�c m�y t�nh (n�ng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("25","DACNTT2_24","T�m hi?u c�c k? thu�t h?c s�u ?ng d?ng trong vi?c n�ng cao ch?t l??ng ?nh","D? �n CNTT 2","- T�m hi?u c�c m� h�nh h?c s�u n�i chung, v� c�c m� h�nh c? th? cho vi?c n�ng cao ch?t l??ng ?nh: ?? ph�n gi?i, gi?m nhi?u...
- T�m hi?u c�ng c?, m� ngu?n m? trong x? l� ?nh s?, h?c s�u (Tensorflow, Keras, Pytorch...)
- C�i ??t v� s? d?ng ???c c�c c�ng c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? gi�c m�y t�nh (n�ng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("26","DACNTT2_25"," X�y d?ng ?ng d?ng ki?m l?i ch�nh t? ti?ng Vi?t","D? �n CNTT 2","T�m hi?u Python, Django. C�c m� h�nh ki?m l?i ch�nh t? cho ti?ng Vi?t. X�y d?ng ?ng d?ng minh h?a.","27","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("27","DACNTT2_26","Nghi�n c?u m?t s? ph??ng ph�p ph�n l?p v?n b?n v� �p d?ng cho ph�n l?p v?n b?n ti?ng Vi?t","D? �n CNTT 2","-Nghi�n c?u m?t s? ph??ng ph�p ph�n l?p nh?: Bayes, c�y quy?t ??nh, SVM,...
- Kh?i t?o v?n b?n ti?ng Vi?t c� g�n nh�n theo ch? ?? (v� d? nh?: download to�n b? website vnexpress.net theo c�c ch? ??: v?n h�a, ph�p lu?t, th? thao).
- Ph�n ?o?n t? ti?ng Vi?t (s? d?ng c�ng c? VnTokenizer)
- Ph�n l?p v?n b?n ti?ng Vi?t.","19","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("28","DACNTT2_27","T�ch h?p th?c th? c� t�n v�o d?ch m�y n? ron Hoa-Vi?t","D? �n CNTT 2","- Nghi�n c?u d?ch m�y n? ron (NMT)
- S? d?ng ???c m?t framework ?? th?c hi?n NMT
- T�m hi?u v? NER ti?ng Hoa (s? d?ng ???c c�ng c? Stanford NER)
- T�ch h?p NE v�o d?ch  m�y n? ron Hoa-Vi?t","19","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("29","DACNTT2_28","T�m hi?u v? Nosql v� vi?t ?ng d?ng minh h?a","D? �n CNTT 2","- T�m hi?u c�ng ngh? hi?n t?i c?a Nosql
- T�m hi?u ng�n ng? truy v?n Cypher
- Vi?t ?ng d?ng minh h?a tr�n n?n t?ng Graph Database Neo4J v� th?c hi?n c�c truy v?n","31","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("30","DACNTT2_29","T�m hieur v? OLAP v� vi?t ?ng d?ng minh h?a","D? �n CNTT 2","- T�m hi?u c�c thu?t to�n c?a OLAP
- Vi?t ?ng d?ng minh h?a d?a tr�n n?n t?ng n�y","31","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("31","DACNTT2_30","X�y d?ng ?i?u khi?n ?i?n cho nh� th�ng minh tr�n n?n t?ng Sonoff- Tasmota","D? �n CNTT 2","- L?p tr�nh Arduino ?i?u khi?n c�c thi?t b? 
- Thi?t l?p webserver.
- Ki?m th? h? th?ng
- Ph�n t�ch c�c t�nh hu?ng th?c t? s? d?ng","21","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("32","DACNTT2_31","L?p tr�nh ?i?u khi?n xe quan tr?c t? ??ng","D? �n CNTT 2","- Xe ?� c� s?n v� g?n c�c c?m bi?n.
- SV l?p tr�nh cho xe ?i theo m?t l? tr�nh ??nh s?n.
- Truy?n d? li?u gi?a xe v� trung t�m ?i?u khi?n b?ng wifi v�/ho?c s�ng v� tuy?n.","21","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("33","DACNTT2_32","Nghi�n c?u t�ch h?p b? g� ti?ng D�n t?c v�o Unikey","D? �n CNTT 2","- ??a b?ng m� ti?ng d�n t?c v�o unikey; - G� ???c ti?ng d�n t?c d�ng Unikey","22","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("34","DACNTT2_33","Nghi�n c?u nh?n d?ng ch? vi?t ti?ng d�n t?c","D? �n CNTT 2","- Nh?n d?ng ???c ch? d�n t?c vi?t tay ho?c ?�nh m�y","22","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("35","DACNTT2_34","T�m hi?u OpenPose v� vi?t ?ng d?ng minh h?a 
cho b�i to�n x�c ??nh c�c ?i?m keypoints tr�n ?nh","D? �n CNTT 2","- T�m hi?u OpenPose
- Vi?t ?ng d?ng minh h?a","12","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("36","DACNTT2_35","T�m hi?u v� vi?t ?ng d?ng x�c ??nh 
v�ng ??i t??ng trong ?nh","D? �n CNTT 2","- T�m hi?u c�c b�i to�n x�c ??nh v�ng ??i t??ng 
- Vi?t ?ng d?ng minh h?a","12","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("37","DACNTT2_36","H? th?ng b�n h�ng cho c�ng ty v?a v� nh?","D? �n CNTT 2","- H?c l?p tr�nh web, l?p tr�nh di ??ng
- T�m hi?u c�c c�ng ngh? .NET, react-native
- H? th?ng g?m 2 ph?n: 
+ Client l� ?ng d?ng tr�n di ??ng ???c vi?t b?ng react-native. Client cho ph�p ng??i d�ng ghi nh?n c�c m?t h�ng ?� b�n, c?p nh?t th�ng tin ??n h�ng, b�o c�o, v� m?t s? t�nh n?ng kh�c (g?p gi�o vi�n ?? bi?t chi ti?t)
+ Server l� website v� api vi?t tr�n n?n .NET. Server l?u tr? c�c th�ng tin c?a h? th?ng nh? s?n ph?m, nh�n vi�n, ??n h�ng,... cho ph�p qu?n l� d? li?u tr�n website v� cung c?p api cho app mobile ho?t ??ng. (g?p gi�o vi�n ?? bi?t chi ti?t)","18","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("38","DACNTT2_37","H? th?ng ?�nh gi� d?ch v? qua m?ng x� h?i","D? �n CNTT 2","- H?c l?p tr�nh web, l?p tr�nh di ??ng
- T�m hi?u c�c c�ng ngh? .NET, react-native
- H? th?ng g?m 2 ph?n: 
+ Client l� ?ng d?ng tr�n di ??ng ???c vi?t b?ng react-native. Client cho ph�p ng??i d�ng quy�t m� v?ch v� ghi nh?n th�ng tin ?�nh gi� (g?p gi�o vi�n ?? bi?t chi ti?t)
+ Server l� website v� api vi?t tr�n n?n .NET. Server l?u tr? c�c th�ng tin c?a h? th?ng nh? d?ch v?, c�ng ty, ... cho ph�p qu?n l� d? li?u tr�n website v� cung c?p api cho app mobile ho?t ??ng. (g?p gi�o vi�n ?? bi?t chi ti?t)","18","","1","2","","","0","0","");



DROP TABLE dot_dk;

CREATE TABLE `dot_dk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loaiDT` int(11) DEFAULT NULL,
  `tenDot` varchar(50) DEFAULT NULL,
  `moTa` text,
  `slNgay` date DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE giang_vien;

CREATE TABLE `giang_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maGV` varchar(30) NOT NULL,
  `tenGV` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `hocHam` varchar(15) DEFAULT NULL,
  `moTa` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `maGV` (`maGV`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO giang_vien VALUES("1","1","L� Nguy�n Ho�i Ngh?a","lenghialk1@gmail.com","","");
INSERT INTO giang_vien VALUES("2","2","M?c C? ??ng Khoa","leondk237@gmail.com","","");
INSERT INTO giang_vien VALUES("4","4","Chu Nguy�n ??ng","nguyendong4694@gmail.com","","");
INSERT INTO giang_vien VALUES("5","5","Ph?m V?n Huy","phamvanhuy@tdtu.edu.vn","","");
INSERT INTO giang_vien VALUES("6","6","Ho�ng Anh","tvhanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("9","9","Ph?m V?n Huy","pvhuy@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("10","10","L� Anh C??ng","lacuong@it.tdt.edu.vn","PGS","");
INSERT INTO giang_vien VALUES("11","11","L� V?n Vang","lvvang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("12","12","V� Ho�ng Anh","vhanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("13","13","D??ng H?u Ph�c","dhphuc@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("14","14","Nguy?n Thanh Hi�n","nthien@it.tdt.edu.vn","PGS","");
INSERT INTO giang_vien VALUES("15","15","Hu?nh Ng?c T�","hntu@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("16","16","Nguy?n Ch� Thi?n","ncthien@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("17","17","Mai V?n M?nh","mvmanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("18","18","V? ?�nh H?ng","vdhong@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("19","19","Tr?n Thanh Ph??c","ttphuoc@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("20","20","Mai Ng?c Th?ng","mnthang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("21","21","Tr?n Trung T�n","tttin@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("22","22","Tr??ng ?�nh T�","tdtu@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("23","23","Nguy?n Qu?c B�nh","nqbinh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("24","24","Hu?nh Qu?c B?o","hqbao@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("25","25","Tr?nh H�ng C??ng","thcuong@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("26","26","Dung C?m Quang","dcquang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("27","27","Tr?n L??ng Qu?c ??i","tlqdai@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("28","28","Cao Phi Ph?ng","cpphung@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("29","29","Tr??ng V? Ho�ng Anh","tvhanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("30","30","Bhagawan Nath","nath@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("31","31","Tr?n Th? H?ng Nhung","tthnhung@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("32","32","??ng Minh Th?ng","dangminhthang@tdtu.edu.vn","","");



DROP TABLE loai_detai;

CREATE TABLE `loai_detai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(50) DEFAULT NULL,
  `moTa` text,
  `slNgay` date DEFAULT NULL,
  `slNhom` int(11) DEFAULT NULL,
  `slSV` int(11) DEFAULT NULL,
  `ngayBD` datetime DEFAULT NULL,
  `ngayKT` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE nhom_dk;

CREATE TABLE `nhom_dk` (
  `maSV` varchar(9) NOT NULL,
  `maDot` int(11) NOT NULL,
  `slDK` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`maSV`,`maDot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE sinh_vien;

CREATE TABLE `sinh_vien` (
  `maSV` varchar(9) NOT NULL,
  `tenSV` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `maLop` int(11) DEFAULT NULL,
  `moTa` text,
  PRIMARY KEY (`maSV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sinh_vien VALUES("51503005","H� Th?y S�m","51503005@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503007","Tr??ng Tr?n H�o","51503007@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503017","Tr?n Ng� Ti?u H?o","51503017@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503035","Nguy?n Ph?c Nghi","51503035@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503038","Nguy?n L??ng Ti?n D?ng","51503038@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503039","Cao Ng?c Nh? Qu?nh","51503039@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503044","L� Tr?n Nh?t Duy","51503044@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503050","B�i H?i D??ng","51503050@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503059","L??ng V?n Ki?t","51503059@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503063","L� Ng?c K? Quang","51503063@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503064","Nguy?n Anh Huy","51503064@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503065","Tr??ng Th�nh Nh?n","51503065@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503067","Hu?nh Thi�n Ph�c","51503067@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503084","T�n Th? Duy","51503084@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503097","Nguy?n ??ng Duy","51503097@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503106","Nguy?n B�nh An","51503106@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503118","L� Qu?c Vinh","51503118@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503128","V� Th�nh Nh�n","51503128@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503133","B�i Nguy?n Trung","51503133@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503135","Tr?n Ng?c D??ng","51503135@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503158","Nguy?n Ph�c H?u","51503158@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503164","�u Qu?c Ho�","51503164@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503175","L� Th? Th?o Vy","51503175@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503178","Nguy?n Ng?c Quang Vinh","51503178@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503183","??ng Qu?c Khanh","51503183@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503185","Chu Phan V? Duy","51503185@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503194","Nguy?n Ph??c L?c","51503194@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503199","Nguy?n Qu?c B?o","51503199@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503208","Nguy?n Trung Ki�n","51503208@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503223","Tr�?N Duy Tu�?N","51503223@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503231","Nguy?n ?�nh Th?n","51503231@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503233","V??ng Th? Nguy?t X??ng","51503233@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503260","D??ng Chung S? H�o","51503260@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503293","Nguy?n Th?ng Ph�c","51503293@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503317","L� ?? Th?o Lam","51503317@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503321","Nguy?n Ph??c Thi?n","51503321@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503332","Cao Ng?c Th?","51503332@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503355","Tr??ng Ho�ng Ph�c","51503355@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503365","Nguy?n Ph??c An Khang","51503365@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51600053","L� Nguy�n Ho�i Ngh?a","51600053@student.tdtu.edu.vn","16050311","");



DROP TABLE trang_thai;

CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maTT` varchar(20) DEFAULT NULL,
  `tenTT` varchar(30) NOT NULL,
  `moTa` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `maTT` (`maTT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




