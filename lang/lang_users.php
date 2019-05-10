<?php
/**
 * 语言包-用户功能
 *
 * 语言包-用户功能
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: lang_users.php 344 2009-06-23 03:06:07Z juny $
 */

$jieqiLang['system']['users']=1; //表示本语言包已经包含
//addfriends.php
$jieqiLang['system']['too_manay_friends']='增加好友失败，您的好友数已经达到最大数量 %d 个';
$jieqiLang['system']['has_been_friends']='对不起，该用户已经在您的好友名单之中！';
$jieqiLang['system']['add_friends_failure']='增加好友失败，请与管理员联系！';
$jieqiLang['system']['add_friends_success']='恭喜您，该用户已经加入您的好友名单！<br /><br />您可以关闭该窗口。';

//getpass.php
$jieqiLang['system']['need_user_email']='请输入用户名和Email！';
$jieqiLang['system']['reset_password']='重设密码 - %s';
$jieqiLang['system']['get_password_link']='请访问该链接重新设定您的密码：%s';
$jieqiLang['system']['send_password_success']='重设密码的方法已经发送到您的邮箱！<br />请按照里面提示重新设定密码。';
$jieqiLang['system']['email_not_users']='对不起，您输入的Email跟用户名不对应！';
$jieqiLang['system']['get_back_password']='取回密码';
$jieqiLang['system']['email_send_failure']='对不起，邮件发送失败！<br />%s';

//login.php loginframe.php -- register.php useredit.php
$jieqiLang['system']['need_username']='用户名不能为空！';
$jieqiLang['system']['need_password']='密码不能为空！';
$jieqiLang['system']['need_userpass']='用户名或密码不能为空！';
$jieqiLang['system']['no_this_user']='该用户不存在，请注意字母大小写是否输入正确！';
$jieqiLang['system']['error_password']='密码错误，请注意字母大小写是否输入正确！！';
$jieqiLang['system']['error_userpass']='用户名或密码错误！';
$jieqiLang['system']['error_checkcode']='校验码输入错误！';
$jieqiLang['system']['other_has_login']='该帐号已经有人登陆！';
$jieqiLang['system']['user_has_denied']='对不起，该帐号已经被封禁！';
$jieqiLang['system']['login_failure']='登陆失败，请检查您的帐号是否正确！';
$jieqiLang['system']['registered_title']='注册成功';
$jieqiLang['system']['logon_title']='登录成功';
$jieqiLang['system']['logout_title']='退出登录';
$jieqiLang['system']['register_success']='恭喜您，您已成功注册成为本站用户！';
$jieqiLang['system']['login_success']='%s，欢迎您到来！';
$jieqiLang['system']['logout_success']='您已经成功退出,感谢您的访问！';


//register.php useredit.php
$jieqiLang['system']['user_stop_register']='对不起，本站暂停新用户注册！';
$jieqiLang['system']['error_user_format']='用户名不能有空格及特殊字符！';
$jieqiLang['system']['need_email']='Email不能为空！';
$jieqiLang['system']['error_email_format']='Email格式错误！';
$jieqiLang['system']['need_pass_repass']='密码和重复密码不能为空！';
$jieqiLang['system']['password_not_equal']='两次新密码输入不一样！';
$jieqiLang['system']['user_has_registered']='该用户名已注册！';
$jieqiLang['system']['email_has_registered']='该Email已注册！';
$jieqiLang['system']['register_failure']='用户注册失败，请与管理员联系！';
$jieqiLang['system']['register_new']='新用户注册';
$jieqiLang['system']['check_user_accounts']='检查帐号';
$jieqiLang['system']['register_users_uname']='用户名<span class="hottext">(必填)</span>';
$jieqiLang['system']['register_users_pass']='密码<span class="hottext">(必填)</span>';
$jieqiLang['system']['confirm_password']='重复密码<span class="hottext">(必填)</span>';
$jieqiLang['system']['register_users_email']='Email<span class="hottext">(必填)</span>';
$jieqiLang['system']['sex_man']='男';
$jieqiLang['system']['sex_woman']='女';
$jieqiLang['system']['sex_unset']='保密';
$jieqiLang['system']['user_is_vip']='VIP会员';
$jieqiLang['system']['user_no_vip']='非VIP会员';
$jieqiLang['system']['user_super_vip']='终身VIP';
$jieqiLang['system']['publish_email']='公开邮箱';
$jieqiLang['system']['user_edit']='用户资料修改 | <a href="passedit.php">修改用户密码</a>';
$jieqiLang['system']['password_change']='修改密码';
$jieqiLang['system']['new_password']='新密码';
$jieqiLang['system']['confirm_new_password']='重复新密码';
$jieqiLang['system']['not_change_password']='（不修改密码请留空）';
$jieqiLang['system']['user_edit_success']='恭喜您，您的用户资料已经修改完成！';
$jieqiLang['system']['user_edit_failure']='用户资料修改失败，请与管理员联系！';
$jieqiLang['system']['user_register_timelimit']='对不起，您的 IP 地址在 %s 小时内只能注册一个帐号！';
$jieqiLang['system']['username_need_engnum']='用户名只能包含英文或者数字！';
$jieqiLang['system']['register_check_loading']='<img border="0" height="16" width="16" src="%s/images/loading.gif" />';
$jieqiLang['system']['register_check_right']='<img border="0" height="13" width="13" src="%s/images/checkright.gif" /> ';
$jieqiLang['system']['register_check_error']='<img border="0" height="13" width="13" src="%s/images/checkerror.gif" /> ';

$jieqiLang['system']['need_nickname']='昵称不能为空！';
$jieqiLang['system']['error_nick_format']='昵称不能有空格及特殊字符！';
$jieqiLang['system']['nick_has_used']='该昵称已经被占用！';

//setpass.php
$jieqiLang['system']['no_checkcode_id']='对不起，参数错误！';
$jieqiLang['system']['error_checkcode']='对不起，校验码错误！';
$jieqiLang['system']['set_password_success']='恭喜您，新密码已经被设定，请重新登陆！';
$jieqiLang['system']['set_password_failure']='对不起，新密码设置失败，请与管理员联系！';
$jieqiLang['system']['reset_password']='重设密码';

//topuser.php
$jieqiLang['system']['top_user_experience']='成员经验排行';
$jieqiLang['system']['top_user_score']='成员积分排行';
$jieqiLang['system']['top_user_credit']='成员贡献排行';
$jieqiLang['system']['top_user_monthscore']='本月积分排行';
$jieqiLang['system']['top_user_join']='最新加入成员';

//passedit.php
$jieqiLang['system']['user_passedit']='用户密码修改 | <a href="useredit.php">修改用户资料</a>';
$jieqiLang['system']['old_password']='原密码';
$jieqiLang['system']['error_old_pass']='原密码错误！';
$jieqiLang['system']['pass_edit_failure']='用户密码修改失败，请与管理员联系！';
$jieqiLang['system']['pass_edit_success']='恭喜您，您的用户密码已经修改完成！';


//admin/usermanage.php
$jieqiLang['system']['cant_manage_admin']='对不起，您无权管理系统管理员的资料！';
$jieqiLang['system']['cant_set_admin']='对不起，您无权将用户等级设置为系统管理员！';
$jieqiLang['system']['change_user_reason']='请输入修改原因！';
$jieqiLang['system']['delete_user_failure']='删除用户失败，请与管理员联系';
$jieqiLang['system']['delete_user']='删除用户';
$jieqiLang['system']['delete_user_success']='恭喜您，用户删除完成！';
$jieqiLang['system']['userlog_change_password']='修改用户密码；';
$jieqiLang['system']['userlog_less_experience']='减少经验值：%d；';
$jieqiLang['system']['userlog_add_experience']='增加经验值：%d；';
$jieqiLang['system']['userlog_less_score']='减少积分：%d；';
$jieqiLang['system']['userlog_add_score']='增加积分：%d；';
$jieqiLang['system']['userlog_set_bookroom']='书架收藏量设为：%d； ';
$jieqiLang['system']['userlog_default_bookroom']='书架收藏量设为系统默认值；';
$jieqiLang['system']['userlog_set_message']='短消息最多数量设为：%d；';
$jieqiLang['system']['userlog_default_message']='短消息最多数量设为系统默认值；';
$jieqiLang['system']['userlog_less_egold']='减少%s：%d；';
$jieqiLang['system']['userlog_add_egold']='增加%s：%d；';
$jieqiLang['system']['userlog_change_group']='用户等级由 %s 改成 %s；';
$jieqiLang['system']['userlog_less_esilver']='减少银币：%d；';
$jieqiLang['system']['userlog_add_esilver']='增加银币：%d；';
$jieqiLang['system']['userlog_change_vip']='VIP状态由 %s 改成 %s； ';
$jieqiLang['system']['userlog_change_name']='用户昵称由 %s 改成 %s；';
$jieqiLang['system']['change_user_failure']='用户修改失败，请与管理员联系！';
$jieqiLang['system']['change_user_success']='恭喜您，用户修改完成！';
$jieqiLang['system']['user_manage']='用户管理';
$jieqiLang['system']['article_mark_limit']='书架允许收藏量';
$jieqiLang['system']['article_mark_default']='留空表示使用系统默认值';
$jieqiLang['system']['user_message_limit']='短消息最多数量';
$jieqiLang['system']['user_message_default']='留空表示使用系统默认值';
$jieqiLang['system']['user_change_reason']='修改理由';
$jieqiLang['system']['user_save_change']='保存修改';
$jieqiLang['system']['user_name_exists']='对不起，该昵称已经有人使用，请重新选择昵称！';
//setavatar.php
$jieqiLang['system']['user_setavatar']='设置头像';
$jieqiLang['system']['old_avatar']='原头像';
$jieqiLang['system']['avatar_image']='上传头像';
$jieqiLang['system']['avatar_image_desc']='头像图片格式为 %s ，文件大小不能超过 %sK';
$jieqiLang['system']['avatar_upload_failure']='对不起，上传失败，可能是文件太大或者网络问题！';
$jieqiLang['system']['avatar_need_upload']='对不起，请先选择要上传的图片！';
$jieqiLang['system']['avatar_set_failure']='对不起，头像设置失败，请与管理员联系！';
$jieqiLang['system']['avatar_set_success']='恭喜您，头像设置成功！';
$jieqiLang['system']['need_avatar_image']='头像图片必须选择！';
$jieqiLang['system']['avatar_type_error']='头像文件格式必须为 %s !';
$jieqiLang['system']['avatar_filesize_toolarge']='头像文件过大，最大不得超过 %s K !';
$jieqiLang['system']['avatar_not_image']='对不起，您上传的文件 %s 不是有效的图片格式！';

//table field
$jieqiLang['system']['table_users_uname']='用户名';
$jieqiLang['system']['table_users_name']='昵称';
$jieqiLang['system']['table_users_pass']='密码';
$jieqiLang['system']['table_users_email']='Email';
$jieqiLang['system']['table_users_workid']='职业';
$jieqiLang['system']['table_users_groupid']='等级';
$jieqiLang['system']['table_users_experience']='经验值';
$jieqiLang['system']['table_users_score']='积分';
$jieqiLang['system']['table_users_esilver']='银币';
$jieqiLang['system']['table_users_isvip']='VIP状态';
$jieqiLang['system']['table_users_sex']='性别';
$jieqiLang['system']['table_users_url']='网站';
$jieqiLang['system']['table_users_avatar']='头像';
$jieqiLang['system']['table_users_qq']='QQ';
$jieqiLang['system']['table_users_icq']='ICQ';
$jieqiLang['system']['table_users_msn']='MSN';
$jieqiLang['system']['table_users_adminemail']='是否接受站长Email';
$jieqiLang['system']['table_users_sign']='用户签名';
$jieqiLang['system']['table_users_intro']='个人简介';
$jieqiLang['system']['table_users_mobile']='手机';

?>