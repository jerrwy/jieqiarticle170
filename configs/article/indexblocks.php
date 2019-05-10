<?php
//左边区块
$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'用户登录', 'module'=>'system', 'filename'=>'block_login', 'classname'=>'BlockSystemLogin', 'side'=>0, 'title'=>'用户登录', 'vars'=>'', 'template'=>'', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>0);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'分类阅读', 'module'=>'article', 'filename'=>'block_sort', 'classname'=>'BlockArticleSort', 'side'=>JIEQI_SIDEBLOCK_LEFT, 'title'=>'分类阅读', 'vars'=>'', 'template'=>'', 'contenttype'=>JIEQI_CONTENT_TXT, 'custom'=>0, 'publish'=>3, 'hasvars'=>0);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'排 行 榜', 'module'=>'article', 'filename'=>'block_toplist', 'classname'=>'BlockArticleToplist', 'side'=>JIEQI_SIDEBLOCK_LEFT, 'title'=>'排 行 榜', 'vars'=>'', 'template'=>'', 'contenttype'=>JIEQI_CONTENT_TXT, 'custom'=>0, 'publish'=>3, 'hasvars'=>0);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'文章总排行', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>0, 'title'=>'文章总排行', 'vars'=>'allvisit,15,0,0,0,0', 'template'=>'block_allvisit.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'文章月排行', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>0, 'title'=>'文章月排行', 'vars'=>'monthvisit,15,0,0,0,0', 'template'=>'block_monthvisit.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

//中间区块
$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'封面推荐', 'module'=>'article', 'filename'=>'block_commend', 'classname'=>'BlockArticleCommend', 'side'=>5, 'title'=>'封面推荐', 'vars'=>'1|2|3|4|5|6|7|8', 'template'=>'block_commend.html', 'contenttype'=>1, 'custom'=>0, 'publish'=>3, 'hasvars'=>2);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'原创更新', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>5, 'title'=>'原创更新', 'vars'=>'lastupdate,15,0,1,0,0', 'template'=>'block_authorupdate.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'转载更新', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>5, 'title'=>'转载更新', 'vars'=>'lastupdate,15,0,2,0,0', 'template'=>'block_masterupdate.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

//右边区块
$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'文章搜索', 'module'=>'article', 'filename'=>'block_search', 'classname'=>'BlockArticleSearch', 'side'=>1, 'title'=>'文章搜索', 'vars'=>'', 'template'=>'', 'contenttype'=>0, 'custom'=>0, 'publish'=>3, 'hasvars'=>0);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'作家工具', 'module'=>'article', 'filename'=>'block_writerbox', 'classname'=>'BlockArticleWriterbox', 'side'=>1, 'title'=>'作家工具', 'vars'=>'', 'template'=>'', 'contenttype'=>0, 'custom'=>0, 'publish'=>2, 'hasvars'=>0);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'本站推荐', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>1, 'title'=>'本站推荐', 'vars'=>'toptime,15,0,0,0,0', 'template'=>'block_toptime.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'总推荐榜', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>1, 'title'=>'总推荐榜', 'vars'=>'allvote,15,0,0,0,0', 'template'=>'block_allvote.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

$jieqiBlocks[]=array('bid'=>0, 'blockname'=>'本月推荐', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>1, 'title'=>'本月推荐', 'vars'=>'monthvote,15,0,0,0,0', 'template'=>'block_monthvote.html', 'contenttype'=>4, 'custom'=>0, 'publish'=>3, 'hasvars'=>1);

?>