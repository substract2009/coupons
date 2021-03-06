<body>
	<script type="text/javascript">
		$(document).ready(main_obj.list_init);
	</script>
	
	<div class="kkfm_r_inner">
		<!--搜索框 count-top包含的部分-->
	    <div class="top">
	        <div class="name">
	        	编辑商品
	        </div>
	        <div class="cz"><a href="<?php echo Yii::app()->createUrl('mCenter/shopProduct/productList')?>" class="btn_comCancel">返回</a></div>
	    </div>
		<div class="contant sCategory_add" id="chose_step"><!--添加sCategory_add-->
	    	<div class="status-nav status-nav1 clearfix">
	            <ul>
	                <li class="cur" id="category">1. 选择商品类目</li>
	                <li class="" id="product">2. 编辑基本信息</li>
               		<li class="" id="detail">3. 编辑商品详情</li>
	            </ul>
	        </div>
	        <?php $form = $this->beginWidget('CActiveForm', array(
		        'enableAjaxValidation' => true,
		        'id' => 'addpro',
		        'htmlOptions' => array('name' => 'createForm'),
		    ));?>
		        <div class="body" id="step_one">
		        	<dl id="parent">
<!-- 		            	<dt> -->
<!-- 		                	<input type="text" class="txt" placeholder="请输入类目名称"> -->
<!-- 		                    <input type="submit" class="search" value=""> -->
<!-- 		                </dt> -->
		                <dd>
		                	<ul>
	                    		<?php foreach ($category_one as $key => $value) { ?>
		                    		<?php if ($key == $list['category_one']) { ?>
		                    			<li val="<?php echo $key?>" class="cur"><?php echo $value?></li>
	                    			<?php }else{?>
		                    			<li val="<?php echo $key?>"><?php echo $value?></li>
	                    			<?php }?>
	                    		<?php } ?>
		                    </ul>
		                </dd>
		            </dl>
		            <input type="hidden" value="<?php echo $list['id']?>" name="Product[product_id]">
		            <input type="hidden" value="<?php echo $list['category_one']?>" name="Product[category_one]">
		            <dl id="child">
<!-- 		            	<dt> -->
<!-- 		                	<input type="text" class="txt" placeholder="请输入类目名称"> -->
<!-- 		                    <input type="submit" class="search" value=""> -->
<!-- 		                </dt> -->
		                <dd>
		                	<ul>
		                		<?php foreach ($category_two[$list['category_one']] as $key => $value) { ?>
		                    		<?php if ($key == $list['category_two']) { ?>
		                    			<li val="<?php echo $key?>" class="cur"><?php echo $value?></li>
	                    			<?php }else{?>
		                    			<li val="<?php echo $key?>"><?php echo $value?></li>
	                    			<?php }?>
		                    	<?php } ?>
		                    </ul>
		                </dd>
		            </dl>
		            <input type="hidden" value="<?php echo $list['category_two']?>" name="Product[category_two]">
		            
		            <div class="clear"></div>
		            <div class="btn"><a href="##" class="btn_com_blue" id="next_step">下一步</a></div>
		        </div>
		        
		        <div class="body" id="step_two" style="display:none">
		        	<dl>
		            	<dt>基本信息</dt>
		                <dd>
		                	<div class="filed">
		                        <span class="label">商品类目：</span>
		                        <span class="text" id="category_name"><?php echo $category_one[$list['category_one']]?>&gt;<?php echo $category_two[$list['category_one']][$list['category_two']]?></span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">商品分组：</span>
		                        <span class="text">
		                            <?php echo CHtml::dropDownList('Product[shop_group]', $list['group_id'], $group) ?>
                                    <a href="javascript:;" id="addGroup">新建分组</a>
                                    <input type="text" style="display: none" id="group" maxlength="100">
                                    <input type="button" style="display:none" id="group_button" class="btn_com_blue" value="确认">
		                        </span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">商品类型：</span>
		                        <span class="text">
		                            <input type="radio" name="Product[type]" value="<?php echo SHOP_PRODUCT_TYPE_OBJECT?>" <?php if($list['type'] == SHOP_PRODUCT_TYPE_OBJECT) { ?> checked="checked" <?php }?> >实物商品<em class="gray">（需要物流）</em>
		                            <input type="radio" name="Product[type]" value="<?php echo SHOP_PRODUCT_TYPE_VIRTAL?>" <?php if($list['type'] == SHOP_PRODUCT_TYPE_VIRTAL) { ?> checked="checked" <?php }?>>虚拟商品<em class="gray">（无需物流）</em>
		                            <div class="remark">（发布后商品类型不能修改）</div>
		                        </span>
		                    </div>
		                </dd>
		            </dl>
		            
		            <dl>
		            	<dt>库存/规格</dt>
		                <dd>
		                	<div class="filed">
		                        <span class="label">商品规格：</span>
		                        <span class="text" id="pro_standard">
		                        	<ul class="ul01" name="color">
		                            	<li class="first" val="颜色">颜色</li>
		                            	<li><input type="checkbox" value="白色"> 白色</li>
		                                <li><input type="checkbox" value="红色"> 红色</li>
		                                <li><input type="checkbox" value="蓝色"> 蓝色</li>
		                                <li><input type="checkbox" value="紫色"> 紫色</li>
		                                <li><input type="checkbox" value="粉红色"> 粉红色</li>
		                                <li><input type="checkbox" value="绿色"> 绿色</li>
		                                <li><input type="checkbox" value="黑色"> 黑色</li>
		                                <li><input type="checkbox" value="天空蓝"> 天空蓝</li>
		                                <li><input type="checkbox" value="浅绿色"> 浅绿色</li>
		                                <li><input type="checkbox" value="深绿色"> 深绿色</li>
		                                <li><input type="checkbox" value="浅灰色"> 浅灰色</li>
		                                <li><input type="checkbox" value="深灰色"> 深灰色</li>
		                            </ul>
		                            <div id="ULID_686">
		                            	<?php if (empty($list['standard'])) { ?>
			                            	<?php if (!empty($list['att'])) { ?>
			                            		<?php foreach ($list['att'] as $key => $value) { ?>
			                            			<?php if ($key != "颜色") {?>
							                        	<ul class="ul01">
							                            	<li class="first" val="<?php echo $key?>"><?php echo $key?><a href="##" name="edit">编辑</a> <a href="##" name="del">删除</a></li>
					                            			<?php if (!empty($value)) { ?>
					                            				<?php foreach ($value as $v) { ?>
				                            						<li><input type="checkbox" value="<?php echo $v?>" checked="checked"><?php echo $v?></li>
					                            				<?php } ?>
					                            			<?php } ?>
				                            			</ul>
				                            		<?php } ?>
			                            		<?php } ?>
			                            	<?php } ?>
		                            	<?php } else {?>
		                            		<?php if (!empty($list['standard'])) {?>
		                            			<?php foreach ($list['standard'] as $title => $att) {?>
	                            					<ul class="ul01">
						                            	<li class="first" val="<?php echo $att['name']?>"><?php echo $att['name']?> <a href="##" name="edit">编辑</a> <a href="##" name="del">删除</a></li>
				                            			<?php if (!empty($att['attribute'])) { ?>
				                            				<?php foreach ($att['attribute'] as $v) { ?>
				                            					<?php if (!empty($v) && $v) { ?>
					                            					<?php $flag = false;?>
				                            						<?php if(!empty($list['att'][$att['name']])) { ?>
				                            							<?php foreach ($list['att'][$att['name']] as $key => $value) {?>
					                            							<?php if ($value == $v) { ?>
					                            								<?php $flag = true;?>
					                            								<?php break;?>
					                            							<?php }else{ ?>
					                            								<?php $flag = false;?>
					                            							<?php } ?>
					                            						<?php } ?>
				                            						<?php }else{ ?>
				                            							<li><input type="checkbox" value="<?php echo $v?>"><?php echo $v?></li>
				                            						<?php } ?>
				                            						
				                            						<?php if ($flag == true){?>
				                            							<li><input type="checkbox" value="<?php echo $v?>" checked="checked"><?php echo $v?></li>
				                            						<?php }else{ ?>
					                            						<li><input type="checkbox" value="<?php echo $v?>"><?php echo $v?></li>
				                            						<?php }?>
				                            					<?php } ?>			                            						
				                            				<?php } ?>
				                            			<?php } ?>
			                            			</ul>
		                            			<?php } ?>
		                            		<?php } ?>
			                            <?php } ?>
		                            </div>
		                            <input type="hidden" value="<?php echo empty($_POST['Product']['pro_standard_name']) ? $list['pro_standard_att'] : $_POST['Product']['pro_standard_name']; ?>" name="Product[pro_standard_name]">
		                            <input type="hidden" value='<?php echo empty($_POST['Product']['pro_standard_att']) ? "" : $_POST['Product']['pro_standard_att']; ?>' name="Product[pro_standard_att]">
		                            <div class="sizeSet" style="display:none" id="standard_form">
		                            	<div class="filed">
		                                    <span class="label">规格名称：</span>
		                                    <span class="text">
		                                    	<input type="text" class="txt" name="Product[standard_name]" style="width:200px">
		                                    </span>
		                                </div>
		                                <div class="filed">
		                                    <span class="label">规格属性：</span>
		                                    <span class="text">
		                                    	<input type="text" class="txt" name="Product[standard_attribute]" style="width:200px">
		                                        <a href="##" class="btn_com_gray btn_com_add" id="standard_add">添加</a>
		                                    </span>
		                                </div>
		                                <div class="filed">
		                                    <span class="label"> </span>
		                                    <span class="text" id="standard_attr">
		                                    	<ul>
		                                        </ul>
		                                    </span>
		                                </div>
		                                <div class="filed">
		                                    <span class="label"> </span>
		                                    <span class="text">
		                                    	<a href="##" class="btn_com_blue" id="standard_sub">确 认</a>
		                                        <a href="##" class="btn_com_gray" id="standard_cel">取 消</a>
		                                    </span>
		                                </div>
		                            </div>
		                            
		                            <div class="sizeSet" style="display:none" id="standard_model_form">
<!-- 		                            	<div class="filed"> -->
<!-- 		                                    <span class="label">模板名称：</span> -->
<!-- 		                                    <span class="text"> -->
<!-- 		                                    	<input type="text" class="txt" name="Smodel[name]" style="width:200px"> -->
<!-- 		                                    </span> -->
<!-- 		                                </div> -->
		                                <div class="filed">
					                        <span class="label">模板名称：</span>
					                        <span class="text">
					                        	<div class="block">
					                            	<input type="radio" name="Smodel[save_type]" value="<?php echo SHOP_STANDARD_SAVE_NEW?>" checked="checked"> 创建为新模板 
					                            	<input type="text" class="txt" name="Smodel[name]" style="width:108px" >
					                            </div>
					                            <div class="block">
					                            	<input type="radio" name="Smodel[save_type]" value="<?php echo SHOP_STANDARD_SAVE_OLD?>"> 保存到已有模板
					                            	<?php echo CHtml::dropDownList('Smodel[model]', '', $standard_model, array("disabled"=>"disabled")) ?>
					                            </div>
					                        </span>
					                    </div>
		                                <div class="filed">
		                                    <span class="label"> </span>
		                                    <span class="text">
		                                    	<input type="button" class="btn_com_blue" id="model_sub" value="确 认">
		                                        <a href="##" class="btn_com_gray" id="model_cel">取 消</a>
		                                    </span>
		                                </div>
		                            </div>
		                            
		                            <div class="block">
		                            	<a href="##" class="blue" id="add_standard">添加规格</a>
		                                <label>选择模板</label>
		                                			<?php if (!empty($post['standard_model']) )echo $post['standard_model']?>
		                                <select name="Product[standard_model]" onChange="changeStandard(this)">
		                                	<?php if(!empty($standard_model)) { ?>
		                                		<?php foreach ($standard_model as $key => $value) {?>
		                                			<?php if ($key == $standard_id) { ?>
		                                			<?php echo $standard_id?>
							            				<?php echo '<option value="'.$key.'" selected=selected>'.$value.'</option>'?>
							            			<?php }else{ ?>
							            				<?php echo '<option value="'.$key.'">'.$value.'</option>'?>
							            			<?php } ?>
		                                		<?php } ?>
		                                	<?php } ?>
		                                </select>
		                                <a href="##" class="blue" id="save_standard">保存为模板</a>
		                            </div>
		                        </span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">价格库存：</span>
		                        <span class="text" id="PEPId_6312">
		                        	<table cellspacing="0" cellpadding="0" width="100%" class="typeList">
										<tr class="order-title">
									    	<td align="center" nowrap="nowrap">规格</td>
									   		<td align="center" nowrap="nowrap">价格</td>
									   		<td align="center" nowrap="nowrap">原价（选填）</td>
									    	<td align="center" nowrap="nowrap">库存</td>
									  		<td align="center" nowrap="nowrap">商品条码</td>
										</tr>      
										<?php if (!empty($list['pro_sku'])) { ?>   
											<?php foreach ($list['pro_sku'] as $key => $value) { ?>
												<tr class="pro_sku">
													<td align="center"><?php echo $value['property']?></td>
													<input type="hidden" name="Product[pro][<?php echo $key?>][att]" value="<?php echo $value['property']?>">
													<td align="center"><input oninput="findmin()" onpropertychange="findmin()" type="text" class="txt" style="width:50px" value="<?php echo $value['price']?>" name="Product[pro][<?php echo $key?>][sku_new_prize]"></td>
													<td align="center"><input oninput="check()" onpropertychange="check()" type="text" class="txt" style="width:50px" value="<?php echo $value['original_price']?>" name="Product[pro][<?php echo $key?>][sku_old_prize]"></td>
													<td align="center"><input oninput="amount()" onpropertychange="amount()" type="text" class="txt" style="width:50px" value="<?php echo $value['num']?>" name="Product[pro][<?php echo $key?>][sku_number]"></td>
													<td align="center"><input type="text" class="txt" style="width:50px" name="Product[pro][<?php echo $key?>][sku_code]"></td>
												</tr>
											<?php } ?>
										<?php } ?>
										<tr>
											<td colspan="6" class="line">
												<span id="setMoreName" style="display : inline">批量设置
												<a href="##" id="prize">价格</a>
												<a href="##" id="cost">原价</a>
												<a href="##" id="stock">库存</a>
												</span>
												<span id="setMoreVar" style="display : none">批量设置
													<input type="text" class="txt" name="Set[more_val]" placeholder="1" style="width:68px">
													<input type="hidden" name="Set[more_type]" val="">
											        <a href="##" id="setMore_sub">保存</a>
											        <a href="##" id="setMore_cel">取消</a>
												</span>
											</td>
										</tr>             
									</table>
		                        </span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">总库存：</span>
		                        <span class="text">
		                            <input type="text" class="txt" name="Product[num]" value="<?php echo $list['num']?>" disabled="true" style="width:50px">
		                            <input type="hidden" name="Product[all_num]" value="<?php echo $list['num']?>">
		                            <input type="checkbox" name="Product[if_show_num]" value="<?php echo IF_SHOW_NO?>" <?php if ($list['if_show_num'] == IF_SHOW_NO) {?> checked="checked"<?php }?>>页面不显示商品库存
		                            <div class="remark">总库存为0时，会上架到[已售罄的商品]列表里</div>
		                        </span>
		                    </div>
		                </dd>
		            </dl>
		            
		            <dl>
		            	<dt>商品信息</dt>
		                <dd>
		                	<div class="filed">
		                        <span class="label">商品名称：</span>
		                        <span class="text">
		                        	<input type="text" class="txt" name="Product[pro_name]" value="<?php echo $list['name']?>">
		                        </span>
		                    </div>
		                	<div class="filed">
		                        <span class="label">商品价格：</span>
		                        <span class="text">
		                        	<input type="text" class="txt" name="Product[pro_min_price]" value="<?php echo $list['price']?>" disabled="true">
		                            <input type="hidden" name="Product[pro_price]" value="<?php echo $list['price']?>">
		                        </span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">商品图片：</span>
		                        <span class="text">
	                            	<?php echo CHtml::fileField('upload') ?>
				                    <ul class="ul02" id="ShowPic">
				                    	<?php if (!empty($list['img'])) { ?>
				                    		<?php foreach ($list['img'] as $key => $value) {?>
                                                                <li><img src="<?php echo !empty($list['ts_product_id']) ? $value : (IMG_GJ_LIST.$value)?>" width="62px" height="62px"/><a href="##" class="close">×</a><input type="hidden" name="Product[pro_img][]" value="<?php echo $value?>"/></li>
				                    		<?php } ?>
				                    	<?php } ?>
		                            </ul>
		                            <div class="remark">建议尺寸：640×640像素</div>
		                        </span>
		                    </div>
		                </dd>
		            </dl>
		            
		            <dl>
		            	<dt>物流/其他</dt>
		                <dd>
		                	<div class="filed">
		                        <span class="label">运费设置：</span>
		                        <span class="text">
		                        	<div class="block">
		                            	<input type="radio" name="Product[freight_type]" value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>" <?php if ($list['freight_type'] == SHOP_FREIGHT_TYPE_UNITE){?>checked="checked"<?php }?>> 统一运费
		                            	<input type="text" class="txt" name="Product[pro_total_inventory]" style="width:108px" <?php if ($list['freight_type'] == SHOP_FREIGHT_TYPE_UNITE){?>value="<?php echo $list['freight_money']?>" <?php }?>>
                                    </div>
		                            <div class="block">
		                            	<input type="radio" name="Product[freight_type]" value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>" <?php if ($list['freight_type'] == SHOP_FREIGHT_TYPE_MODEL){?>checked="checked"<?php }?>> 运费模板
		                            	<?php echo CHtml::dropDownList('Product[freight_id]', $list['freight_id'], $freight, array("disabled"=>"disabled")) ?>
		                            </div>
<!--                                    运费选择状态-->
                                    <input style="display: none;" id="freight_type" value="<?php echo $list['freight_type']?>">
		                        </span>
		                    </div>
		                	<div class="filed">
		                        <span class="label">每人限购：</span>
		                        <span class="text">
		                        	<input type="text" name="Product[limit_num]" class="txt" value="<?php echo $list['limit_num']?>" style="width:50px">
		                            <em class="gray">0代表不限制</em>
		                        </span>
		                    </div>
		                    <div class="filed">
		                        <span class="label">发票：</span>
		                        <span class="text">
		                            <input type="radio" name="Product[invoice]" value="<?php echo SHOP_INVOICE_YES?>" <?php if($list['if_invoice'] == SHOP_INVOICE_YES) {?>checked="checked" <?php } ?>> 无
		                            <input type="radio" name="Product[invoice]" value="<?php echo SHOP_INVOICE_NO?>" <?php if($list['if_invoice'] == SHOP_INVOICE_NO) {?>checked="checked" <?php } ?>> 有
		                        </span>
		                    </div>
		                </dd>
		            </dl>
		            
		            <input type="hidden" name="Product[pro_standard_id]" value='<?php echo empty($_POST['Product']['standard_model']) ? "" : $_POST['Product']['standard_model'];?>'>
		            
		            <div class="btn">
		            	<input type="button" class="btn_com_blue" value="下一步" onclick="save()">
		            </div>
		        </div>	
		            
		        <div class="body" id="step_three" style="display:none">
		        	<div class="shopEdit_l">
		            	<div class="sLine"></div>
		            	<div class="t">
		                	<h1>会员中心</h1>
		                </div>
		                <div class="m">
		                	<div class="area">
		                        <p>基本信息区</p>
		                        <p>固定样式，显示商品主图，价格等信息</p>
		                    </div>
		                    <div class="area">
		                    	<div class="block ">
		                            <h1>商品详情区</h1>
		                        </div>
		                        <div class="actions">
		                            <span class="edit">编辑</span>
		                        </div>
		                    </div>
		                </div>
		                <div class="b"></div>
		            </div> 
		            <div class="shopEdit_r">
		                <div class="block">
		                	<h2>商品简介（选填，微信分享给好友时会显示这里的文案）</h2>
                    		<textarea class="textarea" name="Product[pro_introduction]"><?php echo $list['brief_introduction']?></textarea>
		                </div>
		                <div class="block textEditing">
		                	<!--文本编辑器位置,宽度：505px-->
		                    <div class="arrow">
		                    </div>
		                    <?php echo CHtml::textArea('Product[pro_detail]',isset($_POST['Product']['pro_detail'])?$_POST['Product']['pro_detail'] : $list['detailed_introduction']); ?>
		                    
		                </div>
		            </div>             
		            
		            <div class="btn">
		            	<input type="submit" class="btn_com_blue" value="确 定">
		            </div>
		        </div>
		            
	            <?php if (Yii::app()->user->hasFlash('error')) { ?>
		    		<script>alert('<?php echo Yii::app()->user->getFlash('error')?>')</script>
				<?php }?> 
		            
    		<?php $this->endWidget(); ?>
	    </div>
	</div>
	<script>
		var ue = UE.getEditor('Product_pro_detail',{
			initialFrameWidth:500, //初始化宽度
			initialFrameHeight:185, //初始化高度
		});
		
		//一级分类
        var imgCount = 0;
		var arr_one = <?php echo json_encode($category_one)?>;
		var arr_two = <?php echo json_encode($category_two)?>;
		var arr_col = <?php echo json_encode($list['att']['颜色'])?>;

		//初始化
		$(document).ready(function() {
			 $('ul[name="color"]').find("li:not(.first)").each(function() {
				 var color = $(this).find("input").val();
				 for(var i in arr_col){
					 if(color == arr_col[i]){
						 $(this).find("input").attr("checked","true");
					 }
				 }
             });

			//运费
			var ftype = $('input[name="Product[freight_type]"]:checked').val();
         	if(ftype == <?php echo SHOP_FREIGHT_TYPE_UNITE?>){
        		$('input[name="Product[pro_total_inventory]"]').removeAttr("disabled"); 
        		$('select[name="Product[freight_id]"]').attr("disabled", "true"); 
        		$('select[name="Product[freight_id]"]').val("0"); 
         	}else if(ftype == <?php echo SHOP_FREIGHT_TYPE_MODEL?>){
        		$('select[name="Product[freight_id]"]').removeAttr("disabled"); 
        		$('input[name="Product[pro_total_inventory]"]').attr("disabled", "disabled"); 
         	}

            //如果是虚拟物品,隐藏起来
            if($('input[name="Product[type]"][value="<?php echo SHOP_PRODUCT_TYPE_VIRTAL?>"]').attr('checked')=='checked')
            {
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>"]').removeAttr('checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').attr('checked','checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').click();
                $('input[name="Product[freight_type]"]').attr('disabled',true);//设置运费不可选择
                $('input[name="Product[pro_total_inventory]"]').val('0.00');//设置运费为0.00元
                $('input[name="Product[pro_total_inventory]"]').attr('disabled','true');//设置输入框不可编辑
                $('select[name="Product[freight_id]"]').attr("disabled", "true");//设置下拉框不可选择
                $('select[name="Product[freight_id]"]').val("0");
            }

         	//总库存
            amount();
            //商品价格
            findmin();

			//自定义高度
            $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
		})
		
		<?php if (!empty($_POST)) { ?>
			$(document).ready(function() {
				//商品规格
                <?php if (!empty($_POST['Product']['pro_standard_att'])) {?>
                	var html = $('input[name="Product[pro_standard_att]"]').val();
                	$('#pro_standard').html(html);
                	var standard_id = $('input[name="Product[pro_standard_id]"]').val();
                	$('select[name="Product[standard_model]"]').val(standard_id);
                <?php }?>

    			//自定义高度
                $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
			})
		<?php } ?>
		
		$("#parent li").click(function() {
			$('input[name="Product[category_two]"]').val("");
			
			var p = $(this).attr("val");
			$(this).attr("class","cur").siblings().removeClass();
			var html = '';
			for(var i in arr_two[p]) {
				html += '<li val="'+i+'">'+arr_two[p][i]+'</li>';
			}
			$("#child ul").html(html);
			$('input[name="Product[category_one]"]').val(p);
		});
		
		//二级分类
		$(document).on("click", "#child li", function() {
			var son = $(this).attr("val");
			$(this).attr("class","cur").siblings().removeClass();
			$('input[name="Product[category_two]"]').val(son);

			var par = $('input[name="Product[category_one]"]').val();
			$("#category_name").html(arr_one[par]+' &gt; '+arr_two[par][son]);
		})
		//一级分类下一步
		$("#next_step").click(function() {
			var c_one = $('input[name="Product[category_one]"]').val();
			var c_two = $('input[name="Product[category_two]"]').val();
			if(c_one == "" || c_two == ""){
				alert("请选择商品类目")
			}else{
				$("#step_two").show();
				$("#step_one").hide();
				$("#step_three").hide();
				$("#chose_step").attr("class","contant shop_add");
				$(this).attr("class","cur");
				$("#category").removeClass();
	            $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
			}
            $('#category').attr('class','');
            $('#product').attr('class','cur');
		});
		//添加商品步骤切换
		$("#category").click(function() {
			$("#step_one").show();
			$("#step_two").hide();
			$("#step_three").hide();
			$("#chose_step").attr("class","contant sCategory_add");
			$(this).attr("class","cur");
			$("#product").removeClass();
			$("#detail").removeClass();
		});
		$("#product").click(function() {
			var c_one = $('input[name="Product[category_one]"]').val();
			var c_two = $('input[name="Product[category_two]"]').val();
			if(c_one == "" || c_two == ""){
				alert("请选择商品类目")
			}else{
				$("#step_two").show();
				$("#step_one").hide();
				$("#step_three").hide();
				$("#chose_step").attr("class","contant shop_add");
				$(this).attr("class","cur");
				$("#category").removeClass();
	            $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
				$("#detail").removeClass();
			}
		});
		$("#detail").click(function() {
			save();
		});
		//添加规格
		$("#add_standard").click(function() {
			$("#standard_form").show();
			window.parent.autoResize('main');
		});
		//添加规格-取消
		$("#standard_cel").click(function() {
			$('input[name="Product[standard_name]"]').val("");
			$('input[name="Product[standard_attribute]"]').val("");
			$("#standard_attr ul").html("");
			$("#standard_form").hide();
			window.parent.autoResize('main');
		});
		//添加规格-添加
		$("#standard_add").click(function() {
			var html = $("#standard_attr ul").html();
			var attrbutes = $('input[name="Product[standard_attribute]"]').val().replace(/^\s+|\s+$/g,"");
			if(attrbutes != ""){
				html += '<li val="'+attrbutes+'">'+attrbutes+' <a href="##">×</a></li>';
				$("#standard_attr ul").html(html);
				$('input[name="Product[standard_attribute]"]').val("");
			}
		});
		//添加规格-删除属性
		$(document).on('click', '#standard_attr ul li a', function() {
			$(this).parent().remove();
		});
		//编辑规格
		$(document).on('click', 'a[name=edit]', function() {
			$("#standard_form").show();
			var name = $(this).closest(".first").attr("val");
			var html = $("#standard_attr ul").html();
			$('input[name="Product[standard_name]"]').val(name);
			$(this).closest(".ul01").each(function() {
				$(this).find("li:not(.first)").each(function() {
                	var attrbutes = $(this).find("input").val();
                	html += '<li val="'+attrbutes+'">'+attrbutes+' <a href="##">×</a></li>';
                });
			});
			$(this).closest(".ul01").attr("id","edit_standard_model");
			$("#standard_attr ul").html(html);
		});

		//删除规格
		$(document).on('click', 'a[name=del]', function() {
			$("#standard_form").hide();
			$(this).parent().parent().remove();
		});
		
		//添加规格-确认
		$("#standard_sub").click(function() {
			var arr = new Array();
			var name = $('input[name="Product[standard_name]"]').val().replace(/^\s+|\s+$/g,"");
			if(name != ""){
				var html = '<ul class="ul01">';
				html += '<li class="first" val="'+name+'">'+name+'<a href="##" name="edit">编辑</a> <a href="##" name="del">删除</a></li>';
				$("#standard_attr li").each(function() {
					var val = $(this).attr("val");
	// 				arr.push(val);
					html += '<li><input type="checkbox" value="'+val+'">'+val+'</li>';
				});
				html += '</ul>';
				if(document.getElementById('edit_standard_model')){
// 					$('#edit_standard_model').html(html);
					$('#edit_standard_model').replaceWith(html);
					$('#edit_standard_model').removeAttr("id");
				}else{
					$("#standard_form").before(html);
				}
				$('input[name="Product[standard_name]"]').val("");
				$('input[name="Product[standard_attribute]"]').val("");
				$("#standard_attr ul").html("");
				$("#standard_form").hide();
			}else{
				alert("请填写规格名称");
			}
		});
		
		//点击多选框事件
		$(function(){
			$(document).on('change', '.ul01 input:checkbox', function(){

				//修改总库存 todo
				$('input[name="Product[num]"]').val(0);
				$('input[name="Product[all_num]"]').val(0);
				//修改商品价格
				$('input[name="Product[pro_min_price]"]').val(0);
				$('input[name="Product[pro_price]"]').val(0);
				
                var dic = new Array();
                var pro_standard = "";
                if($(this).is(":checked")) {
                    $(this).attr("checked","checked");
                }else{
                    $(this).removeAttr("checked");
                }
                $(".ul01").each(function() {
                    var title =  $(this).find(".first").attr("val");
                    pro_standard += title+':';
                    var tmp = new Array();
                    $(this).find("li:not(.first)").each(function() {
                    	if($(this).find("input").is(":checked")) {
                    		var name = $(this).find("input").val();
                            tmp.push(name);
                            pro_standard += name+',';
                    	}
                    });
                    var a = {};
                    a[title] = tmp;
                    dic.push(a);
                    pro_standard += ';';
                });
                $('input[name="Product[pro_standard_name]"]').val(pro_standard);
                $.ajax({
                    url: '<?php echo(Yii::app()->createUrl('mCenter/ShopProduct/getText'));?>',
                    data: {content: dic},
                    type: 'get',
                    success: function (data) {
                        $("#PEPId_6312").html(data);
                        $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
                    }
                });
            })
        });
        //点击保存到模板
        $("#save_standard").click(function(){
        	$("#standard_model_form").show();
        });
        //取消保存模板
		$("#model_cel").click(function() {
			$('input[name="Smodel[name]"]').val("");
			$('select[name="Smodel[model]"]').val("0");
			$("#standard_model_form").hide();
		});
        //保存到模板
		$(function(){
			$(document).on('click', '#model_sub', function(){
				var model_name = $('input[name="Smodel[name]"]').val().replace(/^\s+|\s+$/g,"");
				var save_type = $('input[name="Smodel[save_type]"]:checked').val();
				var model_id = $('select[name="Smodel[model]"]').val();
				var length = 0;
				if(model_name == "" && save_type == <?php echo SHOP_STANDARD_SAVE_NEW?>){
					alert("请输入模板名称");
				}else if(model_id == 0 && save_type == <?php echo SHOP_STANDARD_SAVE_OLD?>){
					alert("请选择模板");
				}else{
	                var dic = new Array();
	                $(".ul01").each(function() {
	                    var title =  $(this).find(".first").attr("val");
	                    var tmp = new Array();
	                    $(this).find("li:not(.first)").each(function() {
	                    	var name = $(this).find("input").val();
	                        tmp.push(name);
	                    });
	                    var a = {};
	                    a[title] = tmp;
	                    dic.push(a);
	                    length ++;
	                });
	                if(length > 1){
		                $.ajax({
		                    url: '<?php echo(Yii::app()->createUrl('mCenter/ShopProduct/addStandard'));?>',
		                    data: {name: model_name, content: dic, save_type: save_type, model_id: model_id},
		                    dataType:"json",
		                    type: 'get',
		                    success: function (data) {
			                    if(data.status == <?php echo ERROR_NONE?>){
			            			$("#standard_model_form").hide();
			            			$('input[name="Smodel[name]"]').val("");
			            			$('select[name="Smodel[model]"]').val("0");
			            			//刷新下拉框数据源
			            			if(data.type == <?php echo SHOP_STANDARD_SAVE_NEW?>){
			                    		$('select[name="Product[standard_model]"]').append( '<option value="'+data.id+'">'+data.name+'</option>' );
			                    		$('select[name="Smodel[model]"]').append( '<option value="'+data.id+'">'+data.name+'</option>' );
			            			}
			                    	$('select[name="Product[standard_model]"]').val(data.id);
				                    alert('保存成功');
			                    }else{
				                    alert(data.errMsg);
			                    }
		                    }
		                });
	                }else{
            			$("#standard_model_form").hide();
            			$('input[name="Smodel[name]"]').val("");
		                alert("请创建除颜色以外的商品规格");
	                }
				}
            })
        });
		//批量设置价格
		$(document).on('click', '#prize', function() {
			$("#setMoreName").hide();
			$('input[name="Set[more_val]"]').attr('placeholder','请输入价格');
			$("#setMoreVar").show();
			$('input[name="Set[more_type]"]').val("1");
		});

		//批量设置原价
		$(document).on('click', '#cost', function() {
			$("#setMoreName").hide();
			$('input[name="Set[more_val]"]').attr('placeholder','请输入原价');
			$("#setMoreVar").show();
			$('input[name="Set[more_type]"]').val("2");
		});

		//批量设置库存
		$(document).on('click', '#stock', function() {
			$("#setMoreName").hide();
			$('input[name="Set[more_val]"]').attr('placeholder','请输入库存');
			$("#setMoreVar").show();
			$('input[name="Set[more_type]"]').val("3");
		});

		//批量设置-取消
		$(document).on('click', '#setMore_cel', function() {
			$("#setMoreName").show();
			$("#setMoreVar").hide();
			$('input[name="Set[more_val]"]').val("");
		});

		//批量设置-确定
		$(document).on('click', '#setMore_sub', function() {
			var num = $('input[name="Set[more_val]"]').val();
			var type = $('input[name="Set[more_type]"]').val();
            var sum=0;
			if(isNaN(num)){
				alert("请输入数字");
			}else{
				if(type == 1){  //设置价格
					$(".pro_sku").each(function() {
						$(this).find("td:eq(1) input").val(num);
					});
				}else if(type == 2){  //设置原价
					$(".pro_sku").each(function() {
						$(this).find("td:eq(2) input").val(num);
					});
                }else if(type == 3){  //设置库存
                    $(".pro_sku").each(function() {
                        $(this).find("td:eq(3) input").val(num);
                        sum+=parseInt(num);
                    });
                }

                if(type==3)
                {
                    $('input[name="Product[num]"]').val(sum);
                    $('input[name="Product[all_num]"]').val(sum);
                }
                $("#setMoreName").show();
                $("#setMoreVar").hide();
                $('input[name="Set[more_val]"]').val("");


			}
		});
        
        //上传图片
		$(function () {
		    $('#upload').uploadify({
				onInit: function () {$(".uploadify-queue").hide();},//载入时触发，将flash设置到最小
		        uploader: '<?php echo UPLOAD_TO_PATH?>',// 服务器处理地址
		        swf: '<?php echo GJ_STATIC_JS?>'+'uploadify/uploadify.swf',
		        buttonText: "选择图片",//按钮文字
		        height: 34,  //按钮高度
		        width: 82, //按钮宽度
		        fileTypeExts: "<?php echo UPLOAD_IMG_TYPE;?>",//允许的文件类型
		        fileTypeDesc: "请选择图片文件", //文件说明
		        formData: { 'folder' : '<?php echo(IMG_GJ_FOLDER)?>', 'thumb' : '<?php echo IMG_GJ_THUMB_PRODUCT?>'}, //提交给服务器端的参数
		        onUploadSuccess: function (file, data, response) {//一个文件上传成功后的响应事件处理
		            eval("var jsondata = " + data + ";");
		            var key = jsondata['key'];
		            var fileName = jsondata['fileName'];
		           //$("#ShowPic").after("<li><a href='"+"<?php echo(IMG_GJ_LIST) ?>" + fileName + "'><img src='"+"<?php echo(IMG_GJ_LIST) ?>" + fileName + "' width='90px' height='90px'/></a><span>删除</span><input type='hidden' name='PicPath[]' value='" + fileName + "'/></li>");
		            $("#ShowPic").append("<li><img src='"+"<?php echo(IMG_GJ_LIST) ?>" + fileName + "' width='62px' height='62px'/>"+'<a href="##" class="close">×</a>'+"<input type='hidden' name='Product[pro_img][]' value='" + fileName + "'/></li>");
		            imgCount++;
	                $('#ShowPic a').on("click", function () {
	                    $(this).parent().remove();
	                    imgCount--;
	                });
	                parent.callParAutoResize('iframe', 0);
                    $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
		        },
		        onDialogClose: function (queueData) {
	                if (queueData.queueLength + imgCount > 15) {
	                    alert("你上传的图片数量已经超过15张，不能再上传了!");
	                    var i = 0;
	                    for (var s in queueData.files) {
	                        i++;
	                        //选中多张上传，不超过5张部分可正常上传，超过5张部分，取消上传
	                        if (i + imgCount > 15) {
	                            $("#pro_picture").uploadify("cancel", s);
	                        }
	                    }
	                    return;
	                }
	            }
		    });
		});

		//点击 删除上传图片
		$('#ShowPic a').on("click", function () {
            $(this).parent().remove();
            imgCount--;
            parent.callParAutoResize('iframe', 0);
        });

        //选择规格模板
        function changeStandard(){
            var id = $('select[name="Product[standard_model]"]').val();
         	$('input[name="Product[pro_standard_id]"]').val(id);
            $.ajax({
                url: '<?php echo(Yii::app()->createUrl('mCenter/ShopProduct/getStandard'));?>',
                data: {standard_id: id},
                dataType:"json",
                type: 'get',
                success: function (data) {
                    if(data.status == <?php echo ERROR_NONE?>){	
// 	                	$("#standard_form").before(data.data);

                        $("#ULID_686").html(data.data);
	    				$('input[name="Product[standard_name]"]').val("");
	    				$('input[name="Product[standard_attribute]"]').val("");
	    				$("#standard_attr ul").html("");
	    				$("#standard_form").hide();
                        $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
                    }else{
                        alert('加载商品规格模板失败');
                    }
                }
            });
        }

        //选择运费的单选框触发事件
     	$('input[name="Product[freight_type]"]').change(function(){
         	var ftype = $('input[name="Product[freight_type]"]:checked').val();
         	if(ftype == <?php echo SHOP_FREIGHT_TYPE_UNITE?>){
        		$('input[name="Product[pro_total_inventory]"]').removeAttr("disabled"); 
        		$('select[name="Product[freight_id]"]').attr("disabled", "true"); 
        		$('select[name="Product[freight_id]"]').val("0");
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').attr('checked','checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>"]').removeAttr('checked');
            }else if(ftype == <?php echo SHOP_FREIGHT_TYPE_MODEL?>){
        		$('select[name="Product[freight_id]"]').removeAttr("disabled"); 
        		$('input[name="Product[pro_total_inventory]"]').attr("disabled", "disabled");
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').removeAttr('checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>"]').attr('checked','true');
            }

     	});

        //商品类型单选框触发事件
        $('input[name="Product[type]"]').change(function(){
           var type=$('input[name="Product[type]"]:checked').val();
            if(type==<?php echo SHOP_PRODUCT_TYPE_OBJECT?>)
            {
                //选中实物
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>"]').removeAttr('checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').attr('checked','checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').click();
                $('input[name="Product[freight_type]"]').removeAttr('disabled');//设置运费不可选择
                $('input[name="Product[pro_total_inventory]"]').val('0.00');//设置运费为0.00元
                $('input[name="Product[pro_total_inventory]"]').removeAttr('disabled');//设置输入框不可编辑
                $('select[name="Product[freight_id]"]').attr("disabled", "true");//设置下拉框不可选择
                $('select[name="Product[freight_id]"]').val("0");
            }
            else if(type==<?php echo SHOP_PRODUCT_TYPE_VIRTAL?>)
            {
                //选择虚拟物品Product[freight_type]
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_MODEL?>"]').removeAttr('checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').attr('checked','checked');
                $('input[name="Product[freight_type]"][value="<?php echo SHOP_FREIGHT_TYPE_UNITE?>"]').click();
                $('input[name="Product[freight_type]"]').attr('disabled',true);//设置运费不可选择
                $('input[name="Product[pro_total_inventory]"]').val('0.00');//设置运费为0.00元
                $('input[name="Product[pro_total_inventory]"]').attr('disabled','true');//设置输入框不可编辑
                $('select[name="Product[freight_id]"]').attr("disabled", "true");//设置下拉框不可选择
                $('select[name="Product[freight_id]"]').val("0");
            }
        });

     	//保存模板单选框触发事件
     	$('input[name="Smodel[save_type]"]').change(function(){
         	var ftype = $('input[name="Smodel[save_type]"]:checked').val();
         	if(ftype == <?php echo SHOP_STANDARD_SAVE_NEW?>){
        		$('input[name="Smodel[name]"]').removeAttr("disabled"); 
        		$('select[name="Smodel[model]"]').attr("disabled", "true"); 
        		$('select[name="Smodel[model]"]').val("0"); 
         	}else if(ftype == <?php echo SHOP_STANDARD_SAVE_OLD?>){
        		$('select[name="Smodel[model]"]').removeAttr("disabled"); 
        		$('input[name="Smodel[name]"]').attr("disabled", "disabled"); 
         	}
     	}); 

     	//修改sku库存，总库存跟着变
     	function amount(){
         	var num = 0;
         	$(".pro_sku").each(function() {
				var sku_num = $(this).find("td:eq(3) input").val();
				if(isNaN(sku_num)){
					alert("请输入数字");
					return false;
				}else{
					num = Number(sku_num)+Number(num);
				}
			})
			$('input[name="Product[num]"]').val(num);
			$('input[name="Product[all_num]"]').val(num);
     	}

     	//修改sku价格，商品价格跟着变
     	function findmin(){
     		var min_price = 0;
         	$(".pro_sku").each(function() {
				var sku_price = $(this).find("td:eq(1) input").val();
				if(isNaN(sku_price)){
					alert("请输入数字");
					return false;
				}else{
					if(sku_price != ""){
						if(min_price == 0){
							min_price = sku_price;
						}else{
							 if( Number(sku_price) < Number(min_price) ) {
								min_price = sku_price;
							 }
						}
					}
					
				}
			})
			$('input[name="Product[pro_min_price]"]').val(min_price);
			$('input[name="Product[pro_price]"]').val(min_price);
     	}

     	//判断价格 ，是否为数字
     	function check(){
         	var num = 0;
         	$(".pro_sku").each(function() {
				var old_price = $(this).find("td:eq(1) input").val();
				var new_price = $(this).find("td:eq(2) input").val();
				if(isNaN(old_price) || isNaN(new_price)){
					alert("请输入数字");
					return false;
				}
			})
     	}
     	
     	//提交保存
     	function save(){
         	var pro_name = $('input[name="Product[pro_name]"]').val().replace(/^\s+|\s+$/g,"");
         	var pro_price = $('input[name="Product[pro_price]"]').val().replace(/^\s+|\s+$/g,"");
         	var ftype = $('input[name="Product[freight_type]"]:checked').val();
         	var pro_total_inventory = $('input[name="Product[pro_total_inventory]"]').val().replace(/^\s+|\s+$/g,"");
         	var freight_id = $('select[name="Product[freight_id]"]').val();
         	var img_arr = $('input[name="Product[pro_img][]"]').val();
         	var limit_num = $('input[name="Product[limit_num]"]').val().replace(/^\s+|\s+$/g,"");
            var all_num=$('input[name="Product[all_num]"]').val();
            $('input[name="Product[freight_type]"]').removeAttr('disabled');
         	var flag = true;
         	if(pro_name == ""){
             	flag = false;
             	alert("请输入商品名称");
         	}else if(pro_price == ""){
             	flag = false;
             	alert("请输入商品价格");
         	}else if(isNaN(pro_price)){
             	flag = false;
             	alert("商品价格必须为数字");
         	}else if(isNaN(limit_num)){
             	flag = false;
             	alert("限购数量必须为数字");
         	}else if(typeof(img_arr) == "undefined"){
             	flag = false;
             	alert("请至少上传一张图片");
         	}else if(ftype == <?php echo SHOP_FREIGHT_TYPE_UNITE?>){
             	if(pro_total_inventory == ""){
                 	flag = false;
                 	alert("请设置运费");
             	}
             	if(isNaN(pro_total_inventory)){
                 	flag = false;
                 	alert("运费必须是数字");
             	}
         	}else if(ftype == <?php echo SHOP_FREIGHT_TYPE_MODEL?>){
             	if(freight_id == 0){
                 	flag = false;
                 	alert("请设置运费");
             	}
         	}
            if(parseInt(all_num)<parseInt(limit_num)){
                flag=false;
                alert('限购量必须小于总库存');
            }

         	var pro_standard_att_html = $('#pro_standard').html();
         	$('input[name="Product[pro_standard_att]"]').val(pro_standard_att_html);
         	
         	if(flag){
    			$("#step_one").hide();
    			$("#step_two").hide();
    			$("#step_three").show();
    			$("#chose_step").attr("class","contant shop_edit");
    			$("#detail").attr("class","cur");
    			$("#product").removeClass();
    			$("#category").removeClass();
                $("#main", parent.document).height($(".kkfm_r_inner").outerHeight());
         	}
     	}

        //新建分组
        $('#addGroup').click(function(){
            $('#group').show();
            $('#group_button').show();
        });
        $('#group_button').click(function(){
            var group_name=$('#group').val();
            if(group_name=='')
            {
                alert('请先填写分组名');
            }else if(group_name.indexOf(" ")>=0)
            {
                alert('分组名不能含有空格');
            }
            else
            {
                $.ajax({
                    url:'<?php echo Yii::app()->createUrl('mCenter/ShopProduct/AddGroup')?>',
                    type:'GET',
                    data:{groupname:group_name},
                    dataType:'json',
                    success:function(data){
                        if(data=='error')
                        {
                            alert('保存失败');
                        }else if(data=='duplicate'){
                            alert('该分组名已存在');
                        }else
                        {
                            //新建分组成功,刷新下拉框
                            $('#Product_shop_group').html('');
                            $.each(data, function (n, value) {
                                if(value==group_name)
                                    $('#Product_shop_group').append("<option value='"+n+"' selected='selected'>"+value+"</option>");
                                else
                                    $('#Product_shop_group').append("<option value='"+n+"'>"+value+"</option>");
                            });

                            //隐藏输入框和确认按钮
                            $('#group').hide();
                            $('#group_button').hide();
                            alert('保存成功');
                        }
                    }
                });
            }
        });
	</script>
</body>
