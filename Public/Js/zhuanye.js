function zhuanye(){
	if($("select#college").val() == 'error'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option>请选择</option></select>');
	}
	if($("select#college").val() == '人文与法学学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>哲学</option><option>历史学(文化旅游方向)</option><option>法学</option><option>历史学</option><option>汉语言文学</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '理学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>数学与应用数学(金融数学)</option><option>光电信息科学与工程</option><option>材料科学与工程</option><option>数学与应用数学</option><option>信息与计算科学</option><option>信息与计算科学(统计学方向)</option><option>材料化学</option><option>光信息科学与技术</option><option>应用化学</option><option>应用化学(化学生物学方向)</option><option>统计学</option><option>电子信息科学与技术</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '农学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>农学(农业生物技术方向)</option><option>种子科学与工程</option><option>草业科学(草坪与高尔夫管理)</option><option>农学(农产品标准化与贸易方向)</option><option>农学</option><option>草业科学</option><option>农学(草业科学方向)</option><option>农学(农业信息技术方向)</option><option>生态学</option><option>农学丁颖班</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '资源环境学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>植物保护(农产品安全与检测)</option><option>资源环境科学</option><option>植物保护</option><option>农业资源与环境(农业化学方向)</option><option>环境工程</option><option>植物保护(微生物工程方向)</option><option>农业资源与环境</option><option>植物保护(生物制药方向)</option><option>植物保护(生物安全与植物检疫)</option><option>制药工程</option><option>环境科学</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '生命科学学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>生物科学（爱尔兰合作班）</option><option>生物科学</option><option>丁颖班(植物科学类)</option><option>生物科学(人才基地班)</option><option>生物化学与分子生物学</option><option>生物技术(人才基地班)</option><option>生物技术</option><option>生物科学丁颖班</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '园艺学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option value="园艺(花卉与景观设计方向)">园艺(花卉与景观设计方向)</option><option value="园艺(园艺生物技术方向)">园艺(园艺生物技术方向)</option><option value="茶学(茶艺方向)">茶学(茶艺方向)</option><option value="园艺(设施园艺方向)">园艺(设施园艺方向)</option><option value="园艺(种子科学与工程方向)">园艺(种子科学与工程方向)</option><option value="设施农业科学与工程">设施农业科学与工程</option><option value="茶学(茶艺与品牌营销方向)">茶学(茶艺与品牌营销方向)</option><option value="茶学(茶叶加工与贸易方向)">茶学(茶叶加工与贸易方向)</option><option value="茶学">茶学</option><option value="园艺(园艺产品贮藏与流通方向)">园艺(园艺产品贮藏与流通方向)</option><option value="园艺">园艺</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '艺术学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>服装设计与工程(广告表演与商务礼仪方向)</option><option>艺术设计(环境艺术设计)</option><option>服装设计与工程</option><option>服装与服饰设计</option><option>视觉传达设计</option><option>环境设计</option><option>产品设计</option><option>服装与服饰设计（服装表演与形象设计方向）</option><option>服装与服饰设计(广告表演与商务礼仪方向）</option><option>艺术设计(家具与室内设计)</option><option>音乐学(音乐教育与表演方向)</option><option>艺术设计(展示艺术设计方向)</option><option>艺术设计(视觉传达方向)</option><option>艺术设计(产品造型设计方向)</option><option>动画(动漫方向)</option><option>动画(数码影像设计方向)</option><option>服装设计与工程(服装设计方向)</option><option>服装设计与工程(纺织品设计方向)</option><option>音乐学(音乐表演方向)</option><option>艺术设计(创意媒体设计方向)</option><option>广播电视编导</option><option>艺术设计</option><option>艺术设计(电脑美术设计方向)</option><option>音乐学</option><option>服装设计与工程(服装工程方向)</option><option>动画</option><option>艺术设计(动画方向)</option><option>服装设计与工程(服装表演方向)</option><option>服装设计与工程</option><option>艺术设计(室内装饰与家具设计方向)</option><option>艺术设计(形象艺术设计方向)</option><option>服装设计与工程(服装表演与形象设计方向)</option><option>服装设计与工程(服装配饰设计方向)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '林学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>林学(林业生态工程)</option><option>木材科学与工程(家具设计与制造)</option><option>森林资源保护与游憩(生态保护及资源信息管理)</option><option>森林保护</option><option>城乡规划</option><option>城市规划</option><option>木材科学与工程(家具及装饰工程方向)</option><option>园林</option><option>木材科学与工程(家具工程)</option><option>旅游管理</option><option>森林资源保护与游憩(旅游管理方向)</option><option>园林(城市园林与景观设计方向)</option><option>林学(城市林业方向)</option><option>木材科学与工程(木质材料工程方向)</option><option>森林资源保护与游憩(森林资产及林政管理方向)</option><option>园林(风景园林方向)</option><option>林学</option><option>森林资源保护与游憩</option><option>木材科学与工程</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '动物科学学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>动物科学（动物生物技术方向）</option><option>水产养殖学</option><option>动物科学</option><option>水产养殖学(观赏鱼方向)</option><option>水产养殖学(海洋生物资源与环境方向)</option><option>动物生物技术</option><option>蚕学(蚕业资源与生物技术方向)</option><option>动物科学(动物营养与饲料方向)</option><option>动物科学(生物工程方向)</option><option>动物科学(水产养殖方向)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '兽医学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>丁颖班(动物科学类)</option><option>动物医学</option><option>动物药学</option><option>动物医学(动物药学方向)</option><option>动物医学(小动物疾病防治方向)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '工程学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>自动化</option><option>能源与环境系统工程</option><option>机械设计制造及其自动化</option><option>电气工程及其自动化</option><option>交通运输(汽车运用工程方向)</option><option>电子信息工程</option><option>工业设计</option><option>交通运输(汽车服务工程方向)</option><option>车辆类</option><option>电气类</option><option>电子类</option><option>电子科学与技术</option><option>车辆工程</option><option>交通工程</option><option>通信工程</option><option>农业电气化及其自动化</option><option>农业机械化及其自动化(机电一体化方向)</option><option>电气信息类(国际班)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '食品学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>食品科学与工程(食品营养)</option><option>生物工程(发酵工程与食品酿造)</option><option>包装工程(设计)</option><option>食品科学与工程</option><option>食品科学与工程(食品卫生与检验方向)</option><option>食品科学与工程(食品质量与安全方向)</option><option>生物工程</option><option>食品质量与安全</option><option>包装工程</option><option>食品科学与工程(国际班)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '经济管理学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>经济类(国际教育实验班)</option><option>工商管理类</option><option>金融学</option><option>物流管理</option><option>丁颖班(经济管理类)</option><option>农林经济管理丁颖班</option><option>电子商务</option><option>国际经济与贸易</option><option>人力资源管理</option><option>经济学</option><option>经济类</option><option>金融学(投资理财方向)</option><option>工商管理(人力资源管理方向)</option><option>农林经济管理(政策科学方向)</option><option>农林经济管理</option><option>会计学</option><option>市场营销(物流管理方向)</option><option>市场营销</option><option>工商管理</option><option>工商管理(国际班)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '外国语学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>英语(国际电子商务方向)</option><option>英语(高级翻译方向)</option><option>英语</option><option>英语(英语教育方向)</option><option>英语(经贸方向)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '信息学院、软件学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>地理信息科学</option><option>计算机科学与技术</option><option>测绘工程</option><option>工业工程</option><option>土地资源管理(国土信息化方向)</option><option>软件工程[软件]</option><option>软件工程</option><option>信息管理与信息系统</option><option>网络工程</option><option>地理信息系统</option><option>教育技术学</option><option>教育技术学(影视传媒技术方向)</option><option>计算机科学与技术(国际班)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '公共管理学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>土地资源管理(房地产开发与物业管理)</option><option>劳动与社会保障</option><option>公共事业管理(城市管理)</option><option>行政管理(公共政策)</option><option>行政管理(企业行政管理)</option><option>公共事业管理(公共应急管理)</option><option>土地资源管理</option><option>公共事业管理</option><option>社会工作</option><option>社会学</option><option>行政管理</option><option>公管类</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '水利与土木工程学院'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option selected>请选择</option><option>土木工程(景观建筑设计方向)</option><option>水利水电工程(农业水利水电)</option><option>建筑学</option><option>土木工程(道路与桥梁方向)</option><option>土木工程</option><option>土木工程(水利水电方向)</option><option>土木工程(建筑与环境艺术设计方向)</option><option>水利水电工程</option><option>土木工程(乡镇建设与规划方向)</option><option>土木工程(工程管理方向)</option><option>专业未知</option></select>');
	}
	if($("select#college").val() == '学院未知'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option >专业未知</option></select>');
	}
	if($("select#college").val() == '非华农人'){
		$("div#zhuanye2").html('<select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy()"><option >非华农人</option></select>');
	}
	checkzy()
}