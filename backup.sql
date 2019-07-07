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
INSERT INTO dang_ky VALUES("4","Kim Ngân","229","","Kim Ngân","3","");
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

INSERT INTO de_tai VALUES("2","DACNTT2_1","Tìm hi?u Python và OpenCV 
cho nh?n d?ng m?t ng??i","D? án CNTT 2","- H?c l?p trình Python
- S? d?ng OpenCV trong Python
- Xây d?ng h? th?ng nh?n d?ng m?t ng??i v?i Python và OpenCV","32","","1","2","2019-04-11 00:00:00","","0","0","");
INSERT INTO de_tai VALUES("3","DACNTT2_2","Tìm hi?u Google Map APIs và framework Laravel xây d?ng trang web rao v?t b?t ??ng s?n","D? án CNTT 2","- Tìm hi?u Google Map APIs
- Tìm hi?u Laravel Framework
- Xây d?ng website mình h?a","32","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("4","DACNTT2_3","PUBG (Game) Finish Placement Prediction","D? án CNTT 2","- Battle Royale-style video games have taken the world by storm. 100 players are dropped onto an island empty-handed and must explore, scavenge, and eliminate other players until only one is left standing, all while the play zone continues to shrink. - PlayerUnknown\'s BattleGrounds (PUBG) has enjoyed massive popularity. - You are given over 65,000 games\' worth of anonymized player data, split into training and testing sets, and asked to predict final placement from final in-game stats and initial player ratings. - What\'s the best strategy to win in PUBG? Should you sit in one spot and hide your way into victory, or do you need to be the top shot? Let\'s let the data do the talking!","13","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("5","DACNTT2_4","Phát tri?n m?ng xã h?i FOTOBOOK","D? án CNTT 2","Giai ?o?n 1: Tìm hi?u v? các extra functions và n?m rõ l?i v? l?p trình Ruby on Rails c?ng nh? l?p trình theo Best Practices. Giai ?o?n 2: Thi?t k? Model và ki?m th? database tr??c khi b??c vào t?ng function. Giai ?o?n 4: Ki?m th? thành công t?ng extra functions tr??c khi ?i vào các main functions Giai ?o?n 3: X? lý main functions theo th? t? t? trên xu?ng. Giai ?o?n 4: X? lý extra functions theo th? t? d? ??n khó. Giai ?o?n 5: Ki?m th? t?ng ch?c n?ng và Code theo Best Practices. Giai ?o?n 6: Thi?t k? giao di?n và deploy Heroku.","13","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("6","DACNTT2_5","Tìm hi?u và cài ??t thu?t toán khai thác t?p ph? bi?n trên CSDL l?n trên môi tr??ng song song/phân tán","D? án CNTT 2","-Tìm hi?u itemset, database transaction, các tính ch?t và thu?c tính c?a itemset
- Tìm hi?u các thu?t toán khai thác t?p ph? bi?n (PrePost, Prepost+,..)
- Tìm hi?u Framework Spark/ Map Reduce
- ?? xu?t và cài ??t thu?t toán th?c nghi?m","24","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("7","DACNTT2_6","Tìm hi?u và cài ??t thu?t khai thác t?p h?u ích cao b?ng ph??ng pháp ti?n hoá","D? án CNTT 2","- Tìm hi?u HUI
- Tìm hi?u các k? thu?t khai thác HUI (HUI-Miner, EFIM-Miner)
- Tìm hi?u các k? thu?t Optimization (GA, PSO,..)
- ?? xu?t và cài ??t th?c nghi?m","24","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("8","DACNTT2_7","Tìm hi?u các k? thu?t h?i ?áp t? ??ng d?a trên Ontology","D? án CNTT 2","Tìm hi?u Ontology;
Xây d?ng c? s? tri th?c d?a trên Ontology;
Tìm hi?u các k? thu?t phân tích câu h?i;
Xây d?ng ph?n m?m th? nghi?m h?i ?áp trên mi?n d? li?u c? th?","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("9","DACNTT2_8","Tìm hi?u các k? thu?t h?i ?áp d?a trên Information Retrieval ","D? án CNTT 2","Tìm hi?u các k? thu?t Information Retrieval;
Tìm hi?u các k? thu?t phân tích câu h?i;
Tìm hi?u các k? thu?t ?o ?? t??ng t? gi?a câu h?i và v?n b?n;
Xây d?ng ph?n m?m th? nghi?m h?i ?áp trên mi?n d? li?u c? th?","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("10","DACNTT2_9","Các mô hình h?c máy cho sinh ngôn ng? t? nhiên và ?ng d?ng trong h?i ?áp t? ??ng","D? án CNTT 2","Tìm hi?u các mô hình h?c máy RNN; LSTM;
Tìm hi?u bài toán Question Answering;
?ng d?ng ?? th? nghi?m ti?p c?n generation cho QAs","10","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("11","DACNTT2_10","Tìm hi?u và xây d?ng h? th?ng qu?n lý bán hàng ?a kênh trên n?n t?ng web","D? án CNTT 2","- Tìm hi?u c?ng ngh? NodeJS
- Xây d?ng ?ng d?ng qu?n lý bán hàng ?a kênh g?m các ch?c n?ng chính:
1. ??a s?n ph?m lên nhi?u kênh bán hàng khác nhau
2. Qu?n lý bán hàng t?i qu?y
3. Qu?n lý bán hàng trên các trang th??ng m?i ?i?n t?
4. Qu?n lý ??n hàng trên website bán hàng wordpress woocomerce
5. ??ng b? thông tin s?n ph?m, ??n hàng, khách hàng, t?n kho, ... gi?a các kênh bán hàng","11","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("12","DACNTT2_11","Tìm hi?u và xây d?ng h? th?ng qu?n lý bán hàng ?a kênh trên n?n t?ng di ??ng","D? án CNTT 2","- Tìm hi?u công ngh? React Native và các công ngh? liên quan
- Xây d?ng ?ng d?ng qu?n lý bán hàng ?a kênh bao g?m các ch?c n?ng chính sau ?ây:
1. ??a s?n ph?m lên nhi?u kênh bán hàng khác nhau
2. Qu?n lý bán hàng t?i qu?y
3. Qu?n lý bán hàng trên các trang th??ng m?i ?i?n t?
4. Qu?n lý ??n hàng trên website bán hàng wordpress woocomerce
5. ??ng b? thông tin s?n ph?m, ??n hàng, khách hàng, t?n kho, ... gi?a các kênh bán hàng","11","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("13","DACNTT2_12","Tìm hi?u v? IoT ?? qu?n lý màn hình qu?ng cáo","D? án CNTT 2","IoT và IoT platform","20","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("14","DACNTT2_13","Blockchain trong qu?n lý s?n ph?m hàng hóa","D? án CNTT 2","Blockchain và các ?ng d?ng","20","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("15","DACNTT2_14","Phát tri?n ?ng d?ng bán hàng trên Desktop dành cho các c?a hàng bán l?","D? án CNTT 2","Phát tri?n k? n?ng l?p trình","17","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("16","DACNTT2_15","Phát tri?n ?ng d?ng bán hàng trên Web dành cho các c?a hàng bán l?","D? án CNTT 2","Phát tri?n k? n?ng l?p trình","17","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("17","DACNTT2_16","Tìm hi?u và cài ??t Mô hình ?? th? c?a th? tr??ng ch?ng khoán Vi?t Nam ","D? án CNTT 2","-Tìm hi?u Mô hình ?? th? c?a th? tr??ng ch?ng khoán
-Thu th?p d? li?u ch?ng khoán Vi?t Nam
-Cài ??t mô hình ?? th? s? d?ng d? li?u thu th?p ???c
-?ánh giá ch?t l??ng mô hình thông qua ?ng d?ng nó vào l?a ch?n danh m?c ??u t?","16","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("18","DACNTT2_17","Tìm hi?u và cài ??t ph??ng pháp tích h?p thông tin v? d? ?oán xu h??ng trong l?a ch?n c? phi?u","D? án CNTT 2","-Tìm hi?u Các gi?i thu?t d? ?oán chu?i th?i gian
-Thu th?p d? li?u ch?ng khoán Vi?t Nam
-Cài ??t Các gi?i thu?t d? ?oán chu?i th?i gian
-Tích h?p d? ?oán vào l?a ch?n danh m?c ??u t?","16","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("19","DACNTT2_18","Kh?o sát bài toán nh?n d?ng ng??i b?ng ??c tr?ng sóng não","D? án CNTT 2","- Tìm hi?u ??c tr?ng sóng não v?i vai trò ??c tr?ng sinh tr?c
- Kh?o sát các công trình nh?n d?ng ng??i b?ng ??c tr?ng sóng não ?ã có
- ?ánh giá kh? n?ng áp d?ng vào th?c t? c?a bài toán này","23","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("20","DACNTT2_19","Xây d?ng ?ng d?ng di ??ng theo dõi ho?t ??ng ch?y b?","D? án CNTT 2","- Xây d?ng ?ng d?ng di ??ng theo dõi quá trình ch?y b?, s? b??c chân, t?n s? t?p luy?n
- Thu th?p d? li?u theo th?i gian
- ??a ra l?i khuyên, c?nh báo s?c kh?e...","23","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("21","DACNTT2_20","Tìm hi?u mô hình Autoencoders và ?ng d?ng trong th? giác máy tính","D? án CNTT 2","- Tìm hi?u và t?ng h?p các nghiên c?u v? Autoencoders, m?t mô hình h?c sâu ??c bi?t trong h?c máy
- Tìm hi?u công c?, mã ngu?n m? trong x? lý ?nh s?, h?c sâu (Tensorflow, Keras, Pytorch...)
- Cài ??t và s? d?ng ???c các công c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? giác máy tính (tìm ?nh t??ng t?, chuy?n ??i màu ?nh...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("22","DACNTT2_21","Tìm hi?u mô hình GAN và ?ng d?ng trong th? giác máy tính","D? án CNTT 2","- Tìm hi?u và t?ng h?p các nghiên c?u v? GAN, m?t mô hình h?c sâu ??c bi?t ?? h?c cách tái sinh d? li?u
- Tìm hi?u công c?, mã ngu?n m? trong x? lý ?nh s?, h?c sâu (Tensorflow, Keras, Pytorch...)
- Cài ??t và s? d?ng ???c các công c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? giác máy tính (nâng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("23","DACNTT2_22","Tìm hi?u k? thu?t one-shot learning và ?ng d?ng vào vi?c nh?n d?ng g??ng m?t","D? án CNTT 2","- Tìm hi?u các mô hình h?c sâu nói chung, và one-shot learning (siamese NN) ?? nâng cao hi?u qu? vi?c nh?n d?ng g??ng m?t ng??i so v?i m?ng CNN truy?n th?ng
- Tìm hi?u công c?, mã ngu?n m? trong x? lý ?nh s?, h?c sâu (Tensorflow, Keras, Pytorch...)
- Cài ??t và s? d?ng ???c các công c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? giác máy tính (nâng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("24","DACNTT2_23","Tìm hi?u các k? thuât h?c sâu cho nh?n d?ng thu?c tính ng??i ?i b? qua video","D? án CNTT 2","- Tìm hi?u các mô hình h?c sâu nói chung, và các mô hình c? th? cho vi?c nh?n d?ng ??n thu?c tính, ?a thu?c trong video ng??i ?i b?
- Tìm hi?u công c?, mã ngu?n m? trong x? lý ?nh s?, h?c sâu (Tensorflow, Keras, Pytorch...)
- Cài ??t và s? d?ng ???c các công c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? giác máy tính (nâng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("25","DACNTT2_24","Tìm hi?u các k? thuât h?c sâu ?ng d?ng trong vi?c nâng cao ch?t l??ng ?nh","D? án CNTT 2","- Tìm hi?u các mô hình h?c sâu nói chung, và các mô hình c? th? cho vi?c nâng cao ch?t l??ng ?nh: ?? phân gi?i, gi?m nhi?u...
- Tìm hi?u công c?, mã ngu?n m? trong x? lý ?nh s?, h?c sâu (Tensorflow, Keras, Pytorch...)
- Cài ??t và s? d?ng ???c các công c? ?? demo minh h?a 1-2 ?ng d?ng trong l?nh v?c th? giác máy tính (nâng cao ch?t l??ng ?nh,...)","9","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("26","DACNTT2_25"," Xây d?ng ?ng d?ng ki?m l?i chính t? ti?ng Vi?t","D? án CNTT 2","Tìm hi?u Python, Django. Các mô hình ki?m l?i chính t? cho ti?ng Vi?t. Xây d?ng ?ng d?ng minh h?a.","27","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("27","DACNTT2_26","Nghiên c?u m?t s? ph??ng pháp phân l?p v?n b?n và áp d?ng cho phân l?p v?n b?n ti?ng Vi?t","D? án CNTT 2","-Nghiên c?u m?t s? ph??ng pháp phân l?p nh?: Bayes, cây quy?t ??nh, SVM,...
- Kh?i t?o v?n b?n ti?ng Vi?t có gán nhãn theo ch? ?? (ví d? nh?: download toàn b? website vnexpress.net theo các ch? ??: v?n hóa, pháp lu?t, th? thao).
- Phân ?o?n t? ti?ng Vi?t (s? d?ng công c? VnTokenizer)
- Phân l?p v?n b?n ti?ng Vi?t.","19","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("28","DACNTT2_27","Tích h?p th?c th? có tên vào d?ch máy n? ron Hoa-Vi?t","D? án CNTT 2","- Nghiên c?u d?ch máy n? ron (NMT)
- S? d?ng ???c m?t framework ?? th?c hi?n NMT
- Tìm hi?u v? NER ti?ng Hoa (s? d?ng ???c công c? Stanford NER)
- Tích h?p NE vào d?ch  máy n? ron Hoa-Vi?t","19","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("29","DACNTT2_28","Tìm hi?u v? Nosql và vi?t ?ng d?ng minh h?a","D? án CNTT 2","- Tìm hi?u công ngh? hi?n t?i c?a Nosql
- Tìm hi?u ngôn ng? truy v?n Cypher
- Vi?t ?ng d?ng minh h?a trên n?n t?ng Graph Database Neo4J và th?c hi?n các truy v?n","31","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("30","DACNTT2_29","Tìm hieur v? OLAP và vi?t ?ng d?ng minh h?a","D? án CNTT 2","- Tìm hi?u các thu?t toán c?a OLAP
- Vi?t ?ng d?ng minh h?a d?a trên n?n t?ng này","31","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("31","DACNTT2_30","Xây d?ng ?i?u khi?n ?i?n cho nhà thông minh trên n?n t?ng Sonoff- Tasmota","D? án CNTT 2","- L?p trình Arduino ?i?u khi?n các thi?t b? 
- Thi?t l?p webserver.
- Ki?m th? h? th?ng
- Phân tích các tình hu?ng th?c t? s? d?ng","21","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("32","DACNTT2_31","L?p trình ?i?u khi?n xe quan tr?c t? ??ng","D? án CNTT 2","- Xe ?ã có s?n và g?n các c?m bi?n.
- SV l?p trình cho xe ?i theo m?t l? trình ??nh s?n.
- Truy?n d? li?u gi?a xe và trung tâm ?i?u khi?n b?ng wifi và/ho?c sóng vô tuy?n.","21","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("33","DACNTT2_32","Nghiên c?u tích h?p b? gõ ti?ng Dân t?c vào Unikey","D? án CNTT 2","- ??a b?ng mã ti?ng dân t?c vào unikey; - Gõ ???c ti?ng dân t?c dùng Unikey","22","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("34","DACNTT2_33","Nghiên c?u nh?n d?ng ch? vi?t ti?ng dân t?c","D? án CNTT 2","- Nh?n d?ng ???c ch? dân t?c vi?t tay ho?c ?ánh máy","22","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("35","DACNTT2_34","Tìm hi?u OpenPose và vi?t ?ng d?ng minh h?a 
cho bài toán xác ??nh các ?i?m keypoints trên ?nh","D? án CNTT 2","- Tìm hi?u OpenPose
- Vi?t ?ng d?ng minh h?a","12","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("36","DACNTT2_35","Tìm hi?u và vi?t ?ng d?ng xác ??nh 
vùng ??i t??ng trong ?nh","D? án CNTT 2","- Tìm hi?u các bài toán xác ??nh vùng ??i t??ng 
- Vi?t ?ng d?ng minh h?a","12","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("37","DACNTT2_36","H? th?ng bán hàng cho công ty v?a và nh?","D? án CNTT 2","- H?c l?p trình web, l?p trình di ??ng
- Tìm hi?u các công ngh? .NET, react-native
- H? th?ng g?m 2 ph?n: 
+ Client là ?ng d?ng trên di ??ng ???c vi?t b?ng react-native. Client cho phép ng??i dùng ghi nh?n các m?t hàng ?ã bán, c?p nh?t thông tin ??n hàng, báo cáo, và m?t s? tính n?ng khác (g?p giáo viên ?? bi?t chi ti?t)
+ Server là website và api vi?t trên n?n .NET. Server l?u tr? các thông tin c?a h? th?ng nh? s?n ph?m, nhân viên, ??n hàng,... cho phép qu?n lý d? li?u trên website và cung c?p api cho app mobile ho?t ??ng. (g?p giáo viên ?? bi?t chi ti?t)","18","","1","2","","","0","0","");
INSERT INTO de_tai VALUES("38","DACNTT2_37","H? th?ng ?ánh giá d?ch v? qua m?ng xã h?i","D? án CNTT 2","- H?c l?p trình web, l?p trình di ??ng
- Tìm hi?u các công ngh? .NET, react-native
- H? th?ng g?m 2 ph?n: 
+ Client là ?ng d?ng trên di ??ng ???c vi?t b?ng react-native. Client cho phép ng??i dùng quyét mã v?ch và ghi nh?n thông tin ?ánh giá (g?p giáo viên ?? bi?t chi ti?t)
+ Server là website và api vi?t trên n?n .NET. Server l?u tr? các thông tin c?a h? th?ng nh? d?ch v?, công ty, ... cho phép qu?n lý d? li?u trên website và cung c?p api cho app mobile ho?t ??ng. (g?p giáo viên ?? bi?t chi ti?t)","18","","1","2","","","0","0","");



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

INSERT INTO giang_vien VALUES("1","1","Lê Nguyên Hoài Ngh?a","lenghialk1@gmail.com","","");
INSERT INTO giang_vien VALUES("2","2","M?c C? ??ng Khoa","leondk237@gmail.com","","");
INSERT INTO giang_vien VALUES("4","4","Chu Nguyên ??ng","nguyendong4694@gmail.com","","");
INSERT INTO giang_vien VALUES("5","5","Ph?m V?n Huy","phamvanhuy@tdtu.edu.vn","","");
INSERT INTO giang_vien VALUES("6","6","Hoàng Anh","tvhanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("9","9","Ph?m V?n Huy","pvhuy@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("10","10","Lê Anh C??ng","lacuong@it.tdt.edu.vn","PGS","");
INSERT INTO giang_vien VALUES("11","11","Lê V?n Vang","lvvang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("12","12","Võ Hoàng Anh","vhanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("13","13","D??ng H?u Phúc","dhphuc@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("14","14","Nguy?n Thanh Hiên","nthien@it.tdt.edu.vn","PGS","");
INSERT INTO giang_vien VALUES("15","15","Hu?nh Ng?c Tú","hntu@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("16","16","Nguy?n Chí Thi?n","ncthien@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("17","17","Mai V?n M?nh","mvmanh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("18","18","V? ?ình H?ng","vdhong@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("19","19","Tr?n Thanh Ph??c","ttphuoc@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("20","20","Mai Ng?c Th?ng","mnthang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("21","21","Tr?n Trung Tín","tttin@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("22","22","Tr??ng ?ình Tú","tdtu@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("23","23","Nguy?n Qu?c Bình","nqbinh@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("24","24","Hu?nh Qu?c B?o","hqbao@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("25","25","Tr?nh Hùng C??ng","thcuong@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("26","26","Dung C?m Quang","dcquang@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("27","27","Tr?n L??ng Qu?c ??i","tlqdai@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("28","28","Cao Phi Ph?ng","cpphung@it.tdt.edu.vn","","");
INSERT INTO giang_vien VALUES("29","29","Tr??ng V? Hoàng Anh","tvhanh@it.tdt.edu.vn","","");
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

INSERT INTO sinh_vien VALUES("51503005","Hà Th?y Sâm","51503005@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503007","Tr??ng Tr?n Hào","51503007@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503017","Tr?n Ngô Ti?u H?o","51503017@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503035","Nguy?n Ph?c Nghi","51503035@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503038","Nguy?n L??ng Ti?n D?ng","51503038@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503039","Cao Ng?c Nh? Qu?nh","51503039@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503044","Lê Tr?n Nh?t Duy","51503044@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503050","Bùi H?i D??ng","51503050@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503059","L??ng V?n Ki?t","51503059@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503063","Lê Ng?c K? Quang","51503063@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503064","Nguy?n Anh Huy","51503064@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503065","Tr??ng Thành Nh?n","51503065@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503067","Hu?nh Thiên Phúc","51503067@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503084","Tôn Th? Duy","51503084@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503097","Nguy?n ??ng Duy","51503097@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503106","Nguy?n Bình An","51503106@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503118","Lê Qu?c Vinh","51503118@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503128","Võ Thành Nhân","51503128@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503133","Bùi Nguy?n Trung","51503133@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503135","Tr?n Ng?c D??ng","51503135@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503158","Nguy?n Phúc H?u","51503158@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503164","Âu Qu?c Hoà","51503164@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503175","Lê Th? Th?o Vy","51503175@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503178","Nguy?n Ng?c Quang Vinh","51503178@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503183","??ng Qu?c Khanh","51503183@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503185","Chu Phan V? Duy","51503185@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503194","Nguy?n Ph??c L?c","51503194@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503199","Nguy?n Qu?c B?o","51503199@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503208","Nguy?n Trung Kiên","51503208@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503223","Trâ?N Duy Tuâ?N","51503223@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503231","Nguy?n ?ình Th?n","51503231@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503233","V??ng Th? Nguy?t X??ng","51503233@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503260","D??ng Chung S? Hào","51503260@student.tdtu.edu.vn","15050303","");
INSERT INTO sinh_vien VALUES("51503293","Nguy?n Th?ng Phúc","51503293@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503317","Lê ?? Th?o Lam","51503317@student.tdtu.edu.vn","15050302","");
INSERT INTO sinh_vien VALUES("51503321","Nguy?n Ph??c Thi?n","51503321@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503332","Cao Ng?c Th?","51503332@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51503355","Tr??ng Hoàng Phúc","51503355@student.tdtu.edu.vn","15050301","");
INSERT INTO sinh_vien VALUES("51503365","Nguy?n Ph??c An Khang","51503365@student.tdtu.edu.vn","15050304","");
INSERT INTO sinh_vien VALUES("51600053","Lê Nguyên Hoài Ngh?a","51600053@student.tdtu.edu.vn","16050311","");



DROP TABLE trang_thai;

CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maTT` varchar(20) DEFAULT NULL,
  `tenTT` varchar(30) NOT NULL,
  `moTa` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `maTT` (`maTT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




