<?php
/**
 * 语言包-文章发表编辑
 *
 * 语言包-文章发表编辑
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: lang_article.php 339 2009-06-23 03:03:24Z juny $
 */

$jieqiLang['article']['article']=1; //表示本语言包已经包含
//file
$jieqiLang['article']['article_not_exists']='对不起，该文章不存在！';
$jieqiLang['article']['chapter_not_exists']='对不起，该章节不存在！';
$jieqiLang['article']['noper_manage_article']='对不起，您无权管理本文章！';
//articleedit.php newarticle.php
$jieqiLang['article']['noper_edit_article']='对不起，您无权修改本文章！';
$jieqiLang['article']['need_article_title']='文章标题不能为空！';
$jieqiLang['article']['limit_article_title']='文章标题不能有空格及特殊字符！';
$jieqiLang['article']['simage_type_error']='封面小图格式错误，必须为（*%s）文件！';
$jieqiLang['article']['simage_not_image']='对不起，您上传得封面小图（%s）不是图片文件！';
$jieqiLang['article']['limage_type_error']='封面大图格式错误，必须为（*%s）文件！';
$jieqiLang['article']['limage_not_image']='对不起，您上传得封面大图（%s）不是图片文件！';
$jieqiLang['article']['articletitle_has_exists']='对不起，文章标题《%s》已经被占用！';
$jieqiLang['article']['article_edit_failure']='文章修改失败，请与管理员联系！';
$jieqiLang['article']['article_edit_success']='恭喜您，文章修改成功！';
$jieqiLang['article']['article_edit']='编辑文章';
$jieqiLang['article']['note_keywords']='主角姓名,特定名词等,以空格分隔';
$jieqiLang['article']['auth_to_author']='授权给该作者';
$jieqiLang['article']['not_auth_author']='暂时不予授权';
$jieqiLang['article']['note_agent']='可以指定一个本站现有用户作为管理员';
$jieqiLang['article']['article_permission_special']='专属作品';
$jieqiLang['article']['article_permission_insite']='驻站作品';
$jieqiLang['article']['article_permission_yes']='授权作品';
$jieqiLang['article']['article_permission_no']='暂未授权';
$jieqiLang['article']['article_site_publish']='本站首发';
$jieqiLang['article']['article_other_publish']='他站首发';
$jieqiLang['article']['article_not_full']='连载中';
$jieqiLang['article']['article_is_full']='已完成';
$jieqiLang['article']['article_small_image']='封面小图';
$jieqiLang['article']['article_large_image']='封面大图';
$jieqiLang['article']['article_image_type']='图片格式：%s';
$jieqiLang['article']['article_add_failure']='添加新文章失败，请与管理员联系！';
$jieqiLang['article']['article_add_success']='新文章创建成功，感谢您的发表！';
$jieqiLang['article']['article_new']='发表新作';
$jieqiLang['article']['note_author']='发表自己作品请留空';
$jieqiLang['article']['article_author_flag']='管理授权';
$jieqiLang['article']['article_stat_per']='统计值编辑';

$jieqiLang['article']['article_select_sort']='请选择类别';
$jieqiLang['article']['article_type_label']='子类';
//articleinfo.php
$jieqiLang['article']['article_not_audit']='对不起，该文章未经审核！';
$jieqiLang['article']['article_report_reason']='文章地址：
%s

举报原因如下：
    ';
$jieqiLang['article']['article_report_title']='举报：《%s》';

//authorpage.php
$jieqiLang['article']['author_not_exists']='对不起，用户名不存在，可能该用户非本站原创作者！';
$jieqiLang['article']['user_not_author']='对不起，该用户不是作者！';
$jieqiLang['article']['author_page_title']='%s的专栏-%s';
//chapterdel.php chapteredit.php newchapter.php newvolume.php
$jieqiLang['article']['volume_name']='分卷';
$jieqiLang['article']['chapter_name']='章节';
$jieqiLang['article']['chapter_volume_notexists']='对不起，该%s不存在！';
$jieqiLang['article']['noper_delete_chapter']='对不起，您无权删除本%s！';
$jieqiLang['article']['noper_edit_chapter']='对不起，您无权编辑本%s！';
$jieqiLang['article']['chapter_delete_success']='该%s已经删除，您可以继续其他操作！';
$jieqiLang['article']['chapter_batchdel_success']='章节批量删除成功！';
$jieqiLang['article']['txt_file_check']='后台参数“文本文件后缀”设置错误，文本文件不可与网页及脚本程序使用相同后缀！';
$jieqiLang['article']['need_chapter_title']='章节标题不能为空！';
$jieqiLang['article']['upload_filetype_error']='%s不是允许上传的文件类型！';
$jieqiLang['article']['upload_filetype_limit']='为了安全起见，系统默认禁止上传 *.%s 文件！';
$jieqiLang['article']['upload_filesize_toolarge']='%s文件大小超出系统限制的%dK！';
$jieqiLang['article']['need_chapter_content']='章节内容和附件不能同时为空！';
$jieqiLang['article']['chapter_edit_failure']='修改章节失败，请与管理员联系！';
$jieqiLang['article']['chapter_edit_success']='恭喜您，章节已经修改成功！';
$jieqiLang['article']['chapter_edit']='编辑%s';
$jieqiLang['article']['chapter_typeset']='文章排版';
$jieqiLang['article']['auto_typeset']='自动排版';
$jieqiLang['article']['no_typeset']='无需排版';
$jieqiLang['article']['now_attachment']='现有附件：';
$jieqiLang['article']['note_edit_attachment']='（取消打勾表示删除该附件）';
$jieqiLang['article']['attachment_limit']='附件限制：';
$jieqiLang['article']['limit_attachment_type']='文件类型：';
$jieqiLang['article']['limit_attachment_imagesize']='图片最大：';
$jieqiLang['article']['limit_attachment_filesize']='文件最大：';
$jieqiLang['article']['attachment_name']='附件';
$jieqiLang['article']['add_chapter']='增加章节';
$jieqiLang['article']['add_userchap']='提交新章节';
$jieqiLang['article']['chapter_not_last']='未完待续';
$jieqiLang['article']['chapter_is_last']='完结篇';
$jieqiLang['article']['chapter_sort_errorpar']='对不起，参数错误，排序无法进行！';
$jieqiLang['article']['chapter_sort_success']='恭喜您，您选择的文章已经重新排序！';
$jieqiLang['article']['chapter_sort_notexists']='对不起，该章节不存在，可能已被删除！';
$jieqiLang['article']['need_colume_title']='分卷不能为空';
$jieqiLang['article']['add_volume']='增加分卷';
$jieqiLang['article']['this_article_colume']='现有分卷';
$jieqiLang['article']['add_new_volume']='新增分卷';
$jieqiLang['article']['add_chapter_success']='提交成功，感谢您的发表！<br /><ul><li><a href="%s">点击这里返回文章管理页面</a></li><li><a href="%s">点击这里查看文章信息页面</a></li><li><a href="%s">点击这里继续发表新章节</a></li></ul>';
$jieqiLang['article']['add_chapter_failure']='增加章节失败，请与管理员联系！';
$jieqiLang['article']['add_userchap_failure']='保存章节失败，请与管理员联系！';
$jieqiLang['article']['add_userchap_success']='保存章节成功，感谢您的提交！';
$jieqiLang['article']['add_userchap_info']='文章信息';
$jieqiLang['article']['add_userchap_note']='《<a href="%s" target="_blank">%s</a>》 <a href="%s" target="_blank">%s</a>';

$jieqiLang['article']['userchap_not_exists']='对不起，该章节内容不存在！';

$jieqiLang['article']['userchap_noper_post']='对不起，您无权提交章节！';
$jieqiLang['article']['userchap_score_limit']='对不起，积分少于 %d 的用户暂时不允许提交章节！';

$jieqiLang['article']['each_link_ids']='推荐文章ID（互换链接）';
$jieqiLang['article']['note_each_link']='必须是本站文章ID，最多%s个，用空格分开';
$jieqiLang['article']['chapter_chaptercontent_intro']='<br /><input name="textstat" type="button" class="button" onclick="javascript:alert(\'当前长度 \'+ document.getElementById(\'chaptercontent\').value.length + \' 字。\');" value="字数统计" />';

//table field
$jieqiLang['article']['table_article_sortid']='类别';
$jieqiLang['article']['table_article_articlename']='文章名称';
$jieqiLang['article']['table_article_keywords']='关键字';
$jieqiLang['article']['table_article_author']='作者';
$jieqiLang['article']['table_article_agent']='管理员';
$jieqiLang['article']['table_article_permission']='授权级别';
$jieqiLang['article']['table_article_firstflag']='首发状态';
$jieqiLang['article']['table_article_fullflag']='文章状态';
$jieqiLang['article']['table_article_intro']='内容简介';
$jieqiLang['article']['table_article_notice']='本书公告';
$jieqiLang['article']['table_article_dayvisit']='日点击';
$jieqiLang['article']['table_article_weekvisit']='周点击';
$jieqiLang['article']['table_article_monthvisit']='月点击';
$jieqiLang['article']['table_article_allvisit']='总点击';
$jieqiLang['article']['table_article_dayvote']='日推荐';
$jieqiLang['article']['table_article_weekvote']='周推荐';
$jieqiLang['article']['table_article_monthvote']='月推荐';
$jieqiLang['article']['table_article_allvote']='总推荐';


$jieqiLang['article']['table_chapter_articlename']='文章名称';
$jieqiLang['article']['table_chapter_volumename']='分卷名称';
$jieqiLang['article']['table_chapter_chaptername']='章节标题';
$jieqiLang['article']['table_chapter_chaptercontent']='章节内容';
$jieqiLang['article']['table_article_volumeid']='分卷名称';
$jieqiLang['article']['table_article_chaptertype']='章节类型';

?>