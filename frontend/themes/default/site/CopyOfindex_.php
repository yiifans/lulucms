<?php
use yii\helpers\VarDumper;
use yii\helpers\Html;
use components\LuLu;
use common\includes\DataSource;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use data\AttachmentAsset;

/**
 * @var yii\web\View $this
 */
$this->title = 'My Yii Application';

//$this->registerJsFile('js/flash.js',['yii\web\JqueryAsset']);

$this->registerJsFile(LuLu::getTheme('js/js.js'),['yii\web\JqueryAsset']);

?>

    <div class="container column">
        <div class="columnLeft">
            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">新闻观察员</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">揭秘家族腐败案频发根源</a></h4>
                        <a href="2014-06/29/content_32803383.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="揭秘家族腐败案频发根源" /></a>
                        <p><a href="2014-06/29/content_32803383.htm">官员腐败案件大多暴露出一个特点，家族腐败，一人当官，全家受益。</a></p>
                    </li>
                </ul>
            </div>
            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">新闻立场</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">揭秘家族腐败案频发根源</a></h4>
                        <a href="2014-06/29/content_32803383.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="揭秘家族腐败案频发根源" /></a>
                        <p><a href="2014-06/29/content_32803383.htm">官员腐败案件大多暴露出一个特点，家族腐败，一人当官，全家受益。</a></p>
                    </li>
                </ul>
            </div>
           
            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="xxx">图片新闻</a></h2>
                </div>
                <ul class="imgContent size95x95 w95">
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>
                </ul>
            </div>
            


            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">外媒观点</a></h2>
                </div>
                <ul class="imgTxtContent3">
                    <li>
                        <a href="http://military.china.com.cn/2014-06/29/content_32803242.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/7427ea210d491519ec4c1a.jpg" border="0" alt="解放军建成大型计算机兵棋系统"></a><br>
                        <h4><a href="http://military.china.com.cn/2014-06/29/content_32803242.htm">解放军建成大型计算机兵棋系统</a></h4>
                        <p><a href="http://military.china.com.cn/2014-06/29/content_32803242.htm">&nbsp;&nbsp;&nbsp;&nbsp;国防大学兵棋团队历时7年研发成功的兵棋系统已经被广泛运用。</a></p>
                    </li>
                </ul>
            </div>
            
        </div>

        <div class="columnMiddle">
            <div class="tbox border">
                <ul class="txt2Content">
                    <li>
                        <strong><a href="2014-06/30/content_32807508.htm">盘点六年来两岸民众得到的实惠</a></strong>
                        <span>
                            <a title="" href="politics/2014-07/01/content_32822081.htm" target="_blank">加强党建须营造良好从政环境</a>
                            <a title="" href="politics/2014-07/01/content_32822081.htm" target="_blank">深刻认识四危险</a>
                            <a title="" href="2014-07/01/content_32819426.htm" target="_blank">对不正之风敢于亮剑</a><br>
                            <a title="" href="politics/2014-07/01/content_32822081.htm" target="_blank">干部要弘扬正气</a>
                            <a title="" href="2014-07/01/content_32819223.htm" target="_blank">让腐败分子无藏身之地</a>
                            <a class="" title="" href="2014-07/01/content_32827456.htm" target="_blank">把政治生态整治得更加清洁</a>
                        </span>
                    </li>
                    <li>
                        <strong><a href="2014-07/01/content_32818240.htm">中央审议通过户籍改革意见：不搞指标分配</a></strong>
                        <span>
                            <a title="" href="2014-06/30/content_32816234.htm" target="_blank">习近平主持会议</a>
                            <a title="" href="2014-06/30/content_32816234.htm" target="_blank">新一轮财税体制改革3重点</a>
                            <a title="" href="2014-06/30/content_32816234.htm" target="_blank">2020年建立现代财政制度</a><br>
                            <a title="" href="2014-06/30/content_32816234.htm" target="_blank">通过《深化财税体制改革总体方案》</a>
                            <a title="" href="2014-06/30/content_32816234.htm" target="_blank">审议纪律检查体改实施方案</a>
                        </span>
                    </li>
                    <li>
                        <strong><a href="world/2014-07/01/content_32827394.htm">中方回应日本解禁自卫权:不得损害中国安全</a></strong>
                        <span>
                            <a title="" href="world/2014-07/01/content_32826753.htm" target="_blank">日本政府内阁会议决定解禁集体自卫权</a>
                            <a title="" href="http://military.china.com.cn/2014-07/01/content_32820399.htm" target="_blank">日本执政党达成一致</a><br>
                            <a title="" href="world/2014-07/01/content_32819542.htm" target="_blank">万名日本民众包围安倍官邸 抗议解禁集体自卫权</a>
                            <a title="" href="txt/2014-07/01/content_32827499.htm" target="_blank">韩政府回应</a>
                        </span>
                    </li>

                </ul>
                <div class="dotLine" style="margin:10px 10px;margin-bottom:0px;"></div>
                <ul class="txtContent dot">
                    
                    <?php 
						$dataSource= DataSource::getContentByChannel(110,['limit'=>15]);
						
						echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-bold']);
					?>
					
                </ul>
            </div>
            <div class="tbox border dot">
                <div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(104);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(104,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-bold']);
					?>
				</ul>
            </div>

            <div class="tbox border dot">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(110);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(110,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource,'item'=>'item-bold']);
					?>
				</ul>
            </div>


        </div>

        <div class="columnRight">
        	<div class="tbox">
        		<div id="photocontent" class="flash1">
                    <ul>
                        <!--begin 8020561-7183228-1-->
                        <li>
                            <a href="2014-07/01/content_32828179.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140701/001ec949fb41151cea8653.jpg" width="310" height="210" alt="网友原创萌漫《大大与足球》" /></a>

                            <span><a href="2014-07/01/content_32828179.htm">网友原创萌漫《大大与足球》</a></span>
                        </li>

                        <li>
                            <a href="2014-07/01/content_32827274.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140701/001ec949fb41151cc85b32.jpg" width="310" height="210" alt="香港举行盛大活动庆祝特区回归祖国十七周年" /></a>

                            <span><a href="2014-07/01/content_32827274.htm">香港举行盛大活动庆祝特区回归祖国十七周年</a></span>
                        </li>

                        <li>
                            <a href="2014-07/01/content_32827263.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140701/001ec949fb41151cc7b931.jpg" width="310" height="210" alt="法国前总统萨科齐因贪腐调查被拘留" /></a>

                            <span><a href="2014-07/01/content_32827263.htm">法国前总统萨科齐因贪腐调查被拘留</a></span>
                        </li>

                        <li>
                            <a href="2014-07/01/content_32821415.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140701/00016c42d95c151cad250b.jpg" width="310" height="210" alt="狗主人如是说" /></a>

                            <span><a href="2014-07/01/content_32821415.htm">狗主人与狗的故事</a></span>
                        </li>

                        <li>
                            <a href="2014-07/01/content_32817706.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140701/7427ea210a1f151be2e31e.jpg" width="310" height="210" alt="大连中石油输油主管道爆裂起火" /></a>

                            <span><a href="2014-07/01/content_32817706.htm">大连中石油输油主管道爆裂起火</a></span>
                        </li>
                        <!--end 8020561-7183228-1-->
                    </ul>

                    <span class="leftArr"></span> <span class="rightArr"></span>
                </div>
        	</div>
            <div class="tbox border">
                <div class="middleTitle3">
                    <h2><a href="node_7183303.htm" target="_blank" class="">人物</a></h2>
                </div>
                <ul class="imgTxtContent1 size95x95">
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                </ul>
                <ul class="txtContent dot">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    
                </ul>
                
            </div>

            <div class="tbox border dot">
                <div class="middleTitle3">
                    <h2><a href="node_7183298.htm" target="_blank" class="">人事</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    <li><a href="shehui/2014-06/30/content_32808640.htm">昆明街头一女子被泼汽油烧死 被施暴者痛斥为小三</a></li>
                </ul>
               
            </div>
            
            <div class="tbox border">
                
                <div class="ad">
                	<img alt="" src="<?php echo LuLu::getThemeUrl()?>/images/ad2.png">
                </div>
                
            </div>
            
           
        </div>
    </div>
    <div class="clear"></div>
    
    <div class="container column">
        <div class="bigTitle">
            <h2>
                <a href="">时政社会</a>
            </h2>
            <span>
                <!--begin 8020594-7183244-1-->
                <a title="" href="tw/node_7185034.htm" target="_blank">台湾</a>︱<a title="" href="gangao/node_7185033.htm" target="_blank">港澳</a>︱<a title="" href="env/node_7185031.htm" target="_blank">环境</a>︱<a title="" href="http://photostock.china.com.cn/Web_CHN/default.aspx" target="_blank">图片库</a>︱<a title="" href="http://opinion.china.com.cn/lib_opinion_0_1.html" target="_blank">观点库</a>
                <!--end 8020594-7183244-1-->
            </span>
        </div>
        <div class="columnLeft">
            <div class="marginB0 tbox">

                <ul class="imgContent">

                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>

                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">深度报道</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">揭秘家族腐败案频发根源</a></h4>
                        <a href="2014-06/29/content_32803383.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="揭秘家族腐败案频发根源" /></a>
                        <p><a href="2014-06/29/content_32803383.htm">官员腐败案件大多暴露出一个特点，家族腐败，一人当官，全家受益。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">政坛故事</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="columnMiddle dot">

            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(104);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(104,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(110);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(110,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(111);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(111,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
        </div>

        <div class="columnRight">
            <div class="tbox">
                <div class="middleTitle3">
                    <h2><a href="node_7183303.htm" target="_blank" class="">高层</a></h2>
                </div>
                <ul class="imgTxtContent1 size95x95">
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox dot">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(105);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(105,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>

            <div class="tbox dot">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(106);?></h2>
                </div>
                <div class="ad">
                    <a href="http://forum.china.com.cn/hot/jf/"><img src="http://images.china.cn/attachement/jpg/site1000/20140606/7427ea210a0214fb640305.jpg" border="0" width="307" height="64" style="margin:0 0 15px 2px;" alt="《交锋》栏目" /></a>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(106,['limit'=>2]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="clear"></div>
    <div class="container column">
        <div class="bigTitle">
            <h2>
                <a href="">体育娱乐</a>
            </h2>
            <span>
                <!--begin 8020594-7183244-1-->
                <a title="" href="tw/node_7185034.htm" target="_blank">体育</a>︱<a title="" href="gangao/node_7185033.htm" target="_blank">娱乐</a>︱<a title="" href="env/node_7185031.htm" target="_blank">环境</a>︱<a title="" href="http://photostock.china.com.cn/Web_CHN/default.aspx" target="_blank">图片库</a>︱<a title="" href="http://opinion.china.com.cn/lib_opinion_0_1.html" target="_blank">观点库</a>
                <!--end 8020594-7183244-1-->
            </span>
        </div>
        <div class="columnLeft">
            <div class="marginB0 tbox">

                <ul class="imgContent">

                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <a class="txt" href="xxx">云南举行“铁拳”反恐演习</a>
                    </li>

                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">深度报道</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">揭秘家族腐败案频发根源</a></h4>
                        <a href="2014-06/29/content_32803383.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="揭秘家族腐败案频发根源" /></a>
                        <p><a href="2014-06/29/content_32803383.htm">官员腐败案件大多暴露出一个特点，家族腐败，一人当官，全家受益。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">政坛故事</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="columnMiddle dot">

            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(105);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(105,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(106);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(106,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
            <div class="tbox">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(111);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(111,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
        </div>

        <div class="columnRight">
            <div class="tbox">
                <div class="middleTitle3">
                    <h2><a href="node_7183303.htm" target="_blank" class="">高层</a></h2>
                </div>
                <ul class="imgTxtContent1 size95x95">
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox dot">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(105);?></h2>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(105,['limit'=>5]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>

            <div class="tbox dot">
            	<div class="middleTitle2">
                    <h2><?php echo $this->getChannelUrl(106);?></h2>
                </div>
                <div class="ad">
                    <a href="http://forum.china.com.cn/hot/jf/"><img src="http://images.china.cn/attachement/jpg/site1000/20140606/7427ea210a0214fb640305.jpg" border="0" width="307" height="64" style="margin:0 0 15px 2px;" alt="《交锋》栏目" /></a>
                </div>
                <ul class="txtContent">
            		<?php 
						$dataSource= DataSource::getContentByChannel(106,['limit'=>2]);
						
						echo LoopData::widget(['dataSource'=>$dataSource]);
					?>
				</ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="container column">
        <div class="bigTitle">
            <h2>
                <a href="">时政社会</a>
            </h2>
            <span>
                <!--begin 8020594-7183244-1-->
                <a title="" href="tw/node_7185034.htm" target="_blank">台湾</a>︱<a title="" href="gangao/node_7185033.htm" target="_blank">港澳</a>︱<a title="" href="env/node_7185031.htm" target="_blank">环境</a>︱<a title="" href="http://photostock.china.com.cn/Web_CHN/default.aspx" target="_blank">图片库</a>︱<a title="" href="http://opinion.china.com.cn/lib_opinion_0_1.html" target="_blank">观点库</a>
                <!--end 8020594-7183244-1-->
            </span>
        </div>
        <div class="columnLeft">
            <div class="tbox border">

                <ul class="imgContent">

                    <li>
                        <a href="2014-06/30/content_32808434.htm">
                            <img src="http://images.china.cn/attachement/jpg/site1000/20140630/d02788e9b33e151af15f13.jpg" border="0" alt="云南举行&#8220;铁拳&#8221;反恐演习" /><br />
                        </a>
                        <p><a href="xxx">云南举行“铁拳”反恐演习</a></p>
                    </li>

                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">深度报道</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">揭秘家族腐败案频发根源</a></h4>
                        <a href="2014-06/29/content_32803383.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f4ac0b.jpg" border="0" alt="揭秘家族腐败案频发根源" /></a>
                        <p><a href="2014-06/29/content_32803383.htm">官员腐败案件大多暴露出一个特点，家族腐败，一人当官，全家受益。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle1">
                    <h2><a href="node_7183301.htm" target="_blank" class="">政坛故事</a></h2>
                </div>
                <ul class="imgTxtContent2 size120x90">
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                    <li>
                        <h4><a href="2014-06/29/content_32803383.htm">傅政华骑自行车慰问特警</a></h4>
                        <a href="2014-06/29/content_32803398.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f42f0a.jpg" border="0" alt="傅政华骑自行车慰问特警" /></a>
                        <p><a href="2014-06/29/content_32803398.htm">傅政华冒着炎炎烈日，骑着自行车看望慰问了一线执勤民警。</a></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="columnMiddle">

            <div class="tbox border">
                <div class="middleTitle2">
                    <h2><a href="node_7183298.htm" target="_blank" class="">时政新闻</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807508.htm">盘点六年来两岸民众得到的实惠:去年50万赴台自由行</a></li>
                    <li><a href="2014-06/30/content_32807234.htm">检察官揭支付宝盗刷四种手段:借手机可修改密码</a></li>
                    <li><a href="2014-06/30/content_32807185.htm">食品安全整治频出组合拳 官员失职或须引咎辞职</a></li>
                    <li><a href="2014-06/30/content_32808778.htm">中国或不再征收一般化妆品30%消费税</a></li>
                    <li><a href="2014-06/30/content_32807479.htm">中国在联合国常任理事国中贡献维和警察最多</a></li>
                </ul>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807508.htm">盘点六年来两岸民众得到的实惠:去年50万赴台自由行</a></li>
                    <li><a href="2014-06/30/content_32807234.htm">检察官揭支付宝盗刷四种手段:借手机可修改密码</a></li>
                    <li><a href="2014-06/30/content_32807185.htm">食品安全整治频出组合拳 官员失职或须引咎辞职</a></li>
                    <li><a href="2014-06/30/content_32808778.htm">中国或不再征收一般化妆品30%消费税</a></li>
                    <li><a href="2014-06/30/content_32807479.htm">中国在联合国常任理事国中贡献维和警察最多</a></li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle2">
                    <h2><a href="node_7183298.htm" target="_blank" class="">各地新闻</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    <li><a href="shehui/2014-06/30/content_32808640.htm">昆明街头一女子被泼汽油烧死 被施暴者痛斥为小三</a></li>
                </ul>
                <div class="middleTitle2">
                    <h2><a href="node_7183298.htm" target="_blank" class="">各地新闻</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    <li><a href="shehui/2014-06/30/content_32808640.htm">昆明街头一女子被泼汽油烧死 被施暴者痛斥为小三</a></li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle2">
                    <h2><a href="node_7183298.htm" target="_blank" class="">社会百态</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="shehui/2014-06/30/content_32813853.htm">少女将10公分钢笔吞下肚 半年后取出指笔已生锈</a></li>

                    <li><a href="shehui/2014-06/30/content_32812934.htm">男子认为卖淫女不敢报警 发生关系后实施抢劫</a></li>

                    <li><a href="2014-06/30/content_32807567.htm">北体大"豪车云集"传闻不实 实为学生拍短片道具</a></li>

                    <li><a href="shehui/2014-06/30/content_32807285.htm">高考生因没钱上大学状告父亲 父亲:感情比较淡</a></li>

                    <li><a href="2014-06/30/content_32807256.htm">北京一男子假扮交通协管员 仅穿内裤指挥交通</a></li>
                </ul>
            </div>

        </div>

        <div class="columnRight">
            <div class="tbox border">
                <div class="middleTitle3">
                    <h2><a href="node_7183303.htm" target="_blank" class="">高层</a></h2>
                </div>
                <ul class="imgTxtContent1 size95x95">
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                    <li>
                        <a href="2014-06/29/content_32803328.htm"><img src="http://images.china.cn/attachement/jpg/site1000/20140629/d02788e9b6d41519f14d08.jpg" border="0" width="93" height="93" alt="习近平：热衷于武力不是强大的表现" /></a>
                        <h4><a href="2014-06/29/content_32803328.htm">习近平：不能动辄诉诸武力</a></h4>
                        <p><a href="2014-06/29/content_32803328.htm">我们要推动建设开放、透明、平等的亚太安全合作新架构，推动各国共同维护地区和世界和平安全。</a></p>
                    </li>
                </ul>
            </div>

            <div class="tbox border">
                <div class="middleTitle3">
                    <h2><a href="node_7183298.htm" target="_blank" class="">人事</a></h2>
                </div>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    <li><a href="shehui/2014-06/30/content_32808640.htm">昆明街头一女子被泼汽油烧死 被施暴者痛斥为小三</a></li>
                </ul>
                <ul class="txtContent">
                    <li><a href="2014-06/30/content_32807605.htm">上海车牌均价超7万 13.5万人竞拍中标率创新低</a></li>

                    <li><a href="2014-06/30/content_32807283.htm">湖北大冶液化气站发生爆燃 已造成8人受伤</a></li>

                    <li><a href="2014-06/30/content_32807212.htm">甘肃计划生育工作者不到岗长期在外打工被通报</a></li>

                    <li><a href="shehui/2014-06/30/content_32807637.htm">河南村民修下水道挖出三尊元末明初汉白玉雕像(图)</a></li>

                    <li><a href="shehui/2014-06/30/content_32808640.htm">昆明街头一女子被泼汽油烧死 被施暴者痛斥为小三</a></li>
                </ul>
            </div>

            <div class="tbox border ">
                <div class="middleTitle2">
                    <h2><a href="node_7183298.htm" target="_blank" class="">社区</a></h2>
                </div>
                <div class="ad marginT10">
                    <a href="http://forum.china.com.cn/hot/jf/"><img src="http://images.china.cn/attachement/jpg/site1000/20140606/7427ea210a0214fb640305.jpg" border="0" width="307" height="64" style="margin:0 0 15px 2px;" alt="《交锋》栏目" /></a>
                </div>
                <ul class="txtContent">
                    <li><a href="http://forum.china.com.cn/portal.php?mod=view&#38;aid=44808">党内军中决不允许腐败分子藏身！哪些红线不能碰？</a></li>

                    <li><a href="http://forum.china.com.cn/portal.php?mod=view&#38;aid=44575">环太平洋军演美国对中国破例 日媒一语道破天机</a></li>

                    <li><a href="http://forum.china.com.cn/portal.php?mod=view&#38;aid=44182">食品安全法大修，重典能否保证“舌尖上的安全”</a></li>
                </ul>
            </div>
        </div>
    </div>

