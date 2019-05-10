<?php
/**
 * 数据表里面可选项和值的对应关系
 * multiple 0 单选 1 对选
 * default 默认值
 * items 选项列表
*/
//管理授权
$jieqiOption['article']['authorflag'] = array('multiple' => 0, 'default' => 0, 'items' => array(1 => '授权给该作者', 0 => '暂时不予授权'));

//授权级别
$jieqiOption['article']['permission'] = array('multiple' => 0, 'default' => 2, 'items' => array(3 => '专属作品', 2 => '驻站作品', 1 => '授权作品', 0 => '暂未授权'));

//首发状态
$jieqiOption['article']['firstflag'] = array('multiple' => 0, 'default' => 1, 'items' => array(1 => '本站首发', 0 => '他站首发'));

//连载状态
$jieqiOption['article']['fullflag'] = array('multiple' => 0, 'default' => 0, 'items' => array(0 => '连载中', 1 => '已完成'));

?>