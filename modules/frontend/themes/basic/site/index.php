<?php
use yii\helpers\VarDumper;
use yii\helpers\Html;
use components\LuLu;
use common\includes\DataSource;

/**
 * @var yii\web\View $this
 */
$this->title = 'My Yii Application';

$this->registerJsFile('js/lrtk.js',['yii\web\JqueryAsset']);

?>
<div class="site-index">
	
	<div class="w685 floatLeft">
		<div class="tbox">
			<div class="focus focus1size floatLeft">
				<ul id="focus_1" class="rslides">
					<li class="background_five">
						<div class="limain">
							  <img src="<?php echo LuLu::getThemeUrl()?>/images/banner05.jpg" border="0" />
					  	</div>
					</li>
					<li class="background_two">
						<div class="limain">
							  <img src="<?php echo LuLu::getThemeUrl()?>/images/banner02.jpg" border="0" />
					  	</div>
					</li>
					<li class="background_three">
						<div class="limain">
							  <img src="<?php echo LuLu::getThemeUrl()?>/images/banner03.jpg" border="0" />		
					  	</div>
					</li>
					<li class="background_four">
						<div class="limain">
							  <img src="<?php echo LuLu::getThemeUrl()?>/images/banner04.jpg" border="0" />
					  	</div>
					</li>
					<li class="background_one">
						<div class="limain">
							<img src="<?php echo LuLu::getThemeUrl()?>/images/banner01.jpg" border="0" />
					  	</div>
					</li>
		
				</ul>
			</div>
			<div class="headLine ">
				<div class="topData">
					<div class="topItem">
						<strong><a href="/html/xwpd/fc/1769.html" title="刚需正浓 房源充足 房地产市场“供需两旺”">刚需正浓&nbsp;房源充足&nbsp;房地产市场“供需两旺”</a></strong>
						<div class="topItem2">
							<a href="/html/xwpd/sh/188.html" title="全部二三产业中第三产业从业人员占51.2%">全部二三产业中第三产</a>
							<a href="/html/xwpd/sh/290.html" title="外资垄断中国种业 农民被迫接受1克种子1克金">外资垄断中国种业&nbsp;农民</a>
						</div>
					</div>
					<div class="topItem">
						<strong><a href="/html/xwpd/fc/1769.html" title="刚需正浓 房源充足 房地产市场“供需两旺”">刚需正浓&nbsp;房源充足&nbsp;房地产市场“供需两旺”</a></strong>
						<div class="topItem2">
							<a href="/html/xwpd/sh/188.html" title="全部二三产业中第三产业从业人员占51.2%">全部二三产业中第三产</a>
							<a href="/html/xwpd/sh/290.html" title="外资垄断中国种业 农民被迫接受1克种子1克金">外资垄断中国种业&nbsp;农民</a>
						</div>
					</div>
					
				</div>
				<div class="listData dotDiv">
					<ul>
						<li class="bold-item"><a href="http://china.cankaoxiaoxi.com/2014/0628/407597.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=1" target="_blank">陈政高任住建部部长 辽宁棚改模式或全国推广 </a></li>
						<li><a href="http://world.huanqiu.com/exclusive/2014-06/5038885.html" mon="ct=1&amp;a=2&amp;c=top&pn=2" target="_blank">中国军舰钓岛附近搜救渔船 日战机赶往事发海域</a></li>
						<li><a href="http://china.cankaoxiaoxi.com/2014/0628/407598.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=3" target="_blank">中纪委通报许杰被开除党籍 罕见因渎职被追究 </a></li>
						<li><a href="http://politics.people.com.cn/n/2014/0628/c1001-25211633.html" mon="ct=1&amp;a=2&amp;c=top&pn=4" target="_blank">薄熙来案主审法官任最高法环境资源庭副庭长</a></li>
						<li><a href="http://www.vistastory.com/a/201406/1626.html" mon="ct=1&amp;a=2&amp;c=top&pn=5" target="_blank">国务院:公民将拥有统一社会信用代码 网上行为将入档</a></li>
						<li><a href="http://news.youth.cn/jsxw/201406/t20140628_5430673.htm" mon="ct=1&amp;a=2&amp;c=top&pn=6" target="_blank">解放军某军港附近现涉外会所 政府巨资收购拆除</a></li>
					</ul>
					<ul>
						<li class="bold-item"><a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯16强产生</a>&nbsp;<a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯小组赛数据榜最佳11人</a></li>
						<?php 
							$dataSource= DataSource::getContentByChannel($channelIds);
							
						?>
						<li><a href="http://2014.sina.com.cn/news/uru/2014-06-27/202016127.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">苏亚雷斯归国总统亲自欢迎</a>&nbsp;<a href="http://2014.sina.com.cn/news/uru/2014-06-27/192516118.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">意大利被咬大将:禁令过重</a></li>
						<li><a href="http://2014.sina.com.cn/news/por/2014-06-27/235716162.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">C罗世界杯惊魂!房间藏男人</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-28/035316240.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">梅西太强!对手自嘲是坨屎</a></li>
						<li><a href="http://2014.sina.com.cn/news/ger/2014-06-28/031016229.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">德媒曝国脚家属团险遭空难</a>&nbsp;<a href="http://2014.sina.com.cn/news/nig/2014-06-27/184616110.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">未收到奖金!非洲雄鹰罢训</a></li>
						<li><a href="http://2014.sina.com.cn/news/mex/2014-06-28/015016181.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">世界杯5大女神</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-27/173216097.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">最佳阵容:梅西内马尔</a>&nbsp;<a href="http://2014.sina.com.cn/news/fra/2014-06-28/000016163.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">八大争议</a></li>
						<li><a href="http://2014.sina.com.cn/news/spa/2014-06-28/021116187.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">数据析最大冷门非西班牙</a>&nbsp;<a href="http://2014.sina.com.cn/news/eng/2014-06-28/002016164.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">英媒抨击杰拉德:就不该入选</a></li>
					</ul>
				</div>
			</div>
			
		</div>
		<div class="tbox ad">
			<img src="<?php echo LuLu::getWebUrl()?>/images/ad680.gif" border="0" />
		</div>
	<?php
		$index=0; 
		foreach ($dataList as $id=>$value)
		{
			$channel=$this->params['cachedChannels'][$id];
			
			$index+=1;
			$style=' floatLeft';
			if($index%2==0)
			{
				$style=' floatRight';
			}
	?>
		<div class="tbox w335 border<?php echo $style?>">
			<div class="hd">
				<h2>
				<?php 
					if($channel['is_leaf'])
					{
						echo Html::a('<font color="red">'.$channel['name'].'</font>', ['content/list','chnid'=>$channel['id']]);
					}
					else
					{
						echo Html::a($channel['name'], ['content/channel','chnid'=>$channel['id']]);
					}
				?>
				</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($value as $row):?>
					<li>
						<?= Html::a($row['title'], ['content/detail','chnid'=>$row['channel_id'],'id'=>$row['id']]) ?>
						<span class="time"><?php echo date('m-d',strtotime($row['publish_time']))?></span></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	<?php 
			if($index%2==0)
			{
				echo '<div class="clear"></div>';
			}
		}
	?>
	
	</div>
	<div class="w300 floatRight">
		<div class="tbox border">
			<div class="hd">
				<h2>头条</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att1DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>推荐</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att2DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>置顶</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>点击</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="tbox border">
			<div class="hd">
				<h2>最新</h2>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($att3DataList as $row):?>
					<li><?php echo $row['title']?></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="tbox border">
		<div class="hd">xxx</div>
		<div class="bd floatLeft">
			<ul>
				<li class="bold-item"><a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯16强产生</a>&nbsp;<a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯小组赛数据榜最佳11人</a></li>
				<li><a href="http://2014.sina.com.cn/news/uru/2014-06-27/202016127.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">苏亚雷斯归国总统亲自欢迎</a>&nbsp;<a href="http://2014.sina.com.cn/news/uru/2014-06-27/192516118.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">意大利被咬大将:禁令过重</a></li>
				<li><a href="http://2014.sina.com.cn/news/por/2014-06-27/235716162.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">C罗世界杯惊魂!房间藏男人</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-28/035316240.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">梅西太强!对手自嘲是坨屎</a></li>
				<li><a href="http://2014.sina.com.cn/news/ger/2014-06-28/031016229.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">德媒曝国脚家属团险遭空难</a>&nbsp;<a href="http://2014.sina.com.cn/news/nig/2014-06-27/184616110.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">未收到奖金!非洲雄鹰罢训</a></li>
				<li><a href="http://2014.sina.com.cn/news/mex/2014-06-28/015016181.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">世界杯5大女神</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-27/173216097.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">最佳阵容:梅西内马尔</a>&nbsp;<a href="http://2014.sina.com.cn/news/fra/2014-06-28/000016163.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">八大争议</a></li>
				<li><a href="http://2014.sina.com.cn/news/spa/2014-06-28/021116187.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">数据析最大冷门非西班牙</a>&nbsp;<a href="http://2014.sina.com.cn/news/eng/2014-06-28/002016164.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">英媒抨击杰拉德:就不该入选</a></li>
			</ul>
		</div>
		<div class="bd floatLeft">
			<ul>
				<li class="bold-item"><a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯16强产生</a>&nbsp;<a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯小组赛数据榜最佳11人</a></li>
				<li><a href="http://2014.sina.com.cn/news/uru/2014-06-27/202016127.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">苏亚雷斯归国总统亲自欢迎</a>&nbsp;<a href="http://2014.sina.com.cn/news/uru/2014-06-27/192516118.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">意大利被咬大将:禁令过重</a></li>
				<li><a href="http://2014.sina.com.cn/news/por/2014-06-27/235716162.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">C罗世界杯惊魂!房间藏男人</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-28/035316240.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">梅西太强!对手自嘲是坨屎</a></li>
				<li><a href="http://2014.sina.com.cn/news/ger/2014-06-28/031016229.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">德媒曝国脚家属团险遭空难</a>&nbsp;<a href="http://2014.sina.com.cn/news/nig/2014-06-27/184616110.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">未收到奖金!非洲雄鹰罢训</a></li>
				<li><a href="http://2014.sina.com.cn/news/mex/2014-06-28/015016181.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">世界杯5大女神</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-27/173216097.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">最佳阵容:梅西内马尔</a>&nbsp;<a href="http://2014.sina.com.cn/news/fra/2014-06-28/000016163.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">八大争议</a></li>
				<li><a href="http://2014.sina.com.cn/news/spa/2014-06-28/021116187.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">数据析最大冷门非西班牙</a>&nbsp;<a href="http://2014.sina.com.cn/news/eng/2014-06-28/002016164.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">英媒抨击杰拉德:就不该入选</a></li>
			</ul>
		</div>
		<div class="bd floatLeft">
			<ul>
				<li class="bold-item"><a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯16强产生</a>&nbsp;<a href="http://2014.baidu.com/" mon="ct=1&amp;a=2&amp;c=top&pn=7" target="_blank">世界杯小组赛数据榜最佳11人</a></li>
				<li><a href="http://2014.sina.com.cn/news/uru/2014-06-27/202016127.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">苏亚雷斯归国总统亲自欢迎</a>&nbsp;<a href="http://2014.sina.com.cn/news/uru/2014-06-27/192516118.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=8" target="_blank">意大利被咬大将:禁令过重</a></li>
				<li><a href="http://2014.sina.com.cn/news/por/2014-06-27/235716162.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">C罗世界杯惊魂!房间藏男人</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-28/035316240.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=9" target="_blank">梅西太强!对手自嘲是坨屎</a></li>
				<li><a href="http://2014.sina.com.cn/news/ger/2014-06-28/031016229.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">德媒曝国脚家属团险遭空难</a>&nbsp;<a href="http://2014.sina.com.cn/news/nig/2014-06-27/184616110.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=10" target="_blank">未收到奖金!非洲雄鹰罢训</a></li>
				<li><a href="http://2014.sina.com.cn/news/mex/2014-06-28/015016181.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">世界杯5大女神</a>&nbsp;<a href="http://2014.sina.com.cn/news/arg/2014-06-27/173216097.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">最佳阵容:梅西内马尔</a>&nbsp;<a href="http://2014.sina.com.cn/news/fra/2014-06-28/000016163.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=11" target="_blank">八大争议</a></li>
				<li><a href="http://2014.sina.com.cn/news/spa/2014-06-28/021116187.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">数据析最大冷门非西班牙</a>&nbsp;<a href="http://2014.sina.com.cn/news/eng/2014-06-28/002016164.shtml" mon="ct=1&amp;a=2&amp;c=top&pn=12" target="_blank">英媒抨击杰拉德:就不该入选</a></li>
			</ul>
		</div>
	</div>
</div>
