<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */

$this->title = 'Create Content';
$this->params['breadcrumbs'][] = ['label' => $currentChannel->name, 'url' => ['index&chnid='.$currentChannel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

<div class="content-form">

	<?php $form = ActiveForm::begin(); ?>
	<input type="hidden" id="content-channel_id" name="Content[channel_id]" value="<?php echo $chnid?>"/>
<table width="90%">
<tr>
<td width="100px">标题</td>
<td>
<input type="text" id="content-title" name="Content[title]" style="width:350px;"/>

<input type="checkbox" name="Content[title_format][b]" id="content-title_format_b" class="pc" value="b" />
<label for="content_title_format_b" class="lb">加粗</label>

<input type="checkbox" name="Content[title_format][i]" id="content-title_format_i" class="pc" value="i" />
<label for="content_title_format_i" class="lb">斜体</label>

<input type="checkbox" name="Content[title_format][u]" id="content-title_format_u" class="pc" value="u" />
<label for="content_title_format_u" class="lb">下划线</label>

<input type="checkbox" name="Content[title_format][s]" id="content-title_format_s" class="pc" value="s" />
<label for="content_title_format_s" class="lb">删除线</label>

<input name="Content[title_format][c]" id="content-title_format_c" style="width:40px;"/>
<label for="content_title_format_c" class="lb">颜色</label>
</td>
</tr>

<tr>
<td>子标题</td>
<td><input type="text" id="content-sub_title" name="Content[sub_title]" style="width:350px;"/></td>
</tr>

<tr>
<td>自定义属性</td>
<td>
<label for="content_att1" class="lb">头条</label>
<select id="content-att1" name="Content[att1]">
<option value="0">无</option>
<option value="1">一级头条</option>
<option value="2">二级头条</option>
<option value="3">三级头条</option>
<option value="4">四级头条</option>
<option value="5">五级头条</option>
<option value="6">六级头条</option>
<option value="7">七级头条</option>
<option value="8">八级头条</option>
<option value="9">九级头条</option>
</select>

<label for="content_att2" class="lb">推荐</label>
<select id="content-att2" name="Content[att2]">
<option value="0">无</option>
<option value="1">一级推荐</option>
<option value="2">二级推荐</option>
<option value="3">三级推荐</option>
<option value="4">四级推荐</option>
<option value="5">五级推荐</option>
<option value="6">六级推荐</option>
<option value="7">七级推荐</option>
<option value="8">八级推荐</option>
<option value="9">九级推荐</option>
</select>

<label for="content_att3" class="lb">置顶</label>
<select id="content-att3" name="Content[att3]">
<option value="0">无</option>
<option value="1">一级置顶</option>
<option value="2">二级置顶</option>
<option value="3">三级置顶</option>
<option value="4">四级置顶</option>
<option value="5">五级置顶</option>
<option value="6">六级置顶</option>
<option value="7">七级置顶</option>
<option value="8">八级置顶</option>
<option value="9">九级置顶</option>
</select>
</td>
</tr>

<tr>
<td>聚合标签</td>
<td>
<input type="checkbox" name="Content[flag][1]" id="content-flag_1" class="pc" />
<label for="content_flag_1" class="lb">原创</label>

<input type="checkbox" name="Content[flag][2]" id="content-flag_2" class="pc" />
<label for="content_flag_2" class="lb">热点</label>

<input type="checkbox" name="Content[flag][3]" id="content-flag_3" class="pc" />
<label for="content_flag_3" class="lb">组图</label>

<input type="checkbox" name="Content[flag][4]" id="content-flag_4" class="pc" />
<label for="content_flag_4" class="lb">爆料</label>

<input type="checkbox" name="Content[flag][5]" id="content-flag_5" class="pc" />
<label for="content_flag_5" class="lb">焦点</label>

<input type="checkbox" name="Content[flag][6]" id="content-flag_6" class="pc" />
<label for="content_flag_6" class="lb">幻灯</label>

<input type="checkbox" name="Content[flag][7]" id="content-flag_7" class="pc" />
<label for="content_flag_7" class="lb">滚动</label>

<input type="checkbox" name="Content[flag][8]" id="content-flag_8" class="pc" />
<label for="content_flag_8" class="lb">其它</label>
</td>



<tr>
<td>关键字</td>
<td><input type="text" id="content-keywords" name="Content[keywords]" style="width:350px;"/></td>
</tr>
<tr>

<tr>
<td>转向链接</td>
<td><input type="text" id="content-redirect_url" name="Content[redirect_url]" style="width:350px;"/></td>
</tr>
<tr>

<tr>
<td>标题图片</td>
<td><input type="text" id="content-title_pic" name="Content[title_pic]" style="width:350px;"/></td>
</tr>

<tr>
<td>简介</td>
<td><textarea id="content-summary" name="Content[summary]" style="width:500px;height:120px;"></textarea></td>
</tr>

<tr>
<td>内容</td>
<td><textarea id="content-content" name="Content[content]" style="width:90%;height:500px;"></textarea></td>
</tr>

<tr>
<td>username</td>
<td><input type="text" id="content-username" name="Content[user_name]"/></td>
</tr>

</table>
		
	

		<div class="form-group">
			<?= Html::submitButton( 'Create' , ['class' =>  'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
	


</div>
