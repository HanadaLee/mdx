<?php
/*
Template Name: PostLike
*/
global $pageType;
$pageType = 3;
?>
<?php get_header(); ?>
<?php $mdx_share_area=get_option('mdx_share_area');$mdx_index_img=get_option('mdx_index_img');$mdx_side_img=get_option('mdx_side_img');if($mdx_side_img==''){$mdx_side_img=$mdx_index_img;};?>
    <?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');?>
    <?php $post_style=get_option('mdx_post_style');?>
    <body class="mdui-theme-primary-<?php echo get_option('mdx_styles');?> mdui-theme-accent-<?php echo get_option('mdx_styles_act');if($post_style=="0"){echo " body-grey";}else if($post_style=="2"){echo " body-grey1";}?>">
    <div class="fullScreen sea-close"></div>
    <?php if(get_option('mdx_load_pro')=='true'){?>
    <div class="mdui-progress mdui-color-white">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <?php }?>
    <div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="left-drawer">
    <div class="sideImg" style="background-image:url(<?php echo $mdx_side_img;?>">
      <?php if(get_option('mdx_night_style')=='true'){;?>
      <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php _e("切换日间/夜间模式","mdx");?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
      <?php }?>
      <?php if(get_option('mdx_side_info')=='true'){;?>
      <?php if(get_option('mdx_side_head')!=''){;?>
      <div class="side-info-head mdui-shadow-3" style="background-image:url(<?php echo get_option('mdx_side_head');?>"></div>
      <?php }?>
      <div class="side-info-more"><?php echo get_option('mdx_side_name');?><br><span class="side-info-oth"><?php echo get_option('mdx_side_more');?></span></div>
      <?php }?>
    </div>
    <nav role="navigation"><?php wp_nav_menu(array('theme_location'=>'mdx_menu','menu'=>'mdx_menu','depth'=>2,'container'=>false,'menu_class'=>'mdui-list','menu_id'=>'mdx_menu'));?></nav>
    </div>
    <header role="banner"><div class="titleBarGobal mdui-appbar mdui-shadow-0 <?php if(get_option('mdx_title_bar')=='true'){;?>mdui-appbar-scroll-hide<?php }?> mdui-text-color-white-text" id="titleBarinPost">
        <div class="mdui-toolbar mdui-appbar-fixed">
            <button class="mdui-btn mdui-btn-icon" id="menu" mdui-drawer="{target:'#left-drawer',overlay:true<?php if(get_option('mdx_open_side')=='true'){;?>,swipe:true<?php }?>}"><i class="mdui-icon material-icons">menu</i></button>
            <a href="<?php bloginfo('url');?>" class="mdui-typo-headline"><?php $mdx_logo_way=get_option('mdx_logo_way');if($mdx_logo_way=="2"){$mdx_logo=get_option('mdx_logo');if($mdx_logo!=""){echo '<img class="mdx-logo" src="'.$mdx_logo.'">';}else{bloginfo('name');}}elseif($mdx_logo_way=="1"){bloginfo('name');}elseif($mdx_logo_way=="3"){$mdx_logo_text=get_option('mdx_logo_text');if($mdx_logo_text!=""){echo $mdx_logo_text;}else{bloginfo('name');}}?></a>
                <div class="mdui-toolbar-spacer"></div>
                <?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i>', '' ), '', '', null, 'mdui-btn mdui-btn-icon' );?>
                <button class="mdui-btn mdui-btn-icon seai"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
            </div>
        </div></header>
        <?php get_template_part('searchform')?>

        <?php if($post_style=="0"){if($full_image_url[0]!=""){$mdx_image_url=$full_image_url[0];}else{if(get_option("mdx_post_def_img")=="false"){$mdx_image_url=="";}else{$mdx_image_url=get_bloginfo("template_url")."/img/dpic.jpg";}}?>
        <div class="mdui-text-color-white-text mdui-color-theme mdui-typo-display-2 mdui-valign PostTitle<?php if($mdx_image_url==""){?> mdx-pni-t0<?php }?>" itemprop="name headline" itemtype="http://schema.org/BlogPosting"><span class="mdui-center"><?php the_title();?></span></div>
        <div class="PostTitleFill mdui-color-theme"></div>
        <div class="PostMain<?php if($mdx_image_url==""){?> mdx-pni-am0<?php }?>">
            <div class="ArtMain0 mdui-center mdui-shadow-12">
            <?php if($mdx_image_url!=""){?>
            <img class="PostMainImg0" alt="<?php the_title(); ?>" src="<?php echo $mdx_image_url;?>"><?php }else{?>
                <div class="mdx-post-no-img-fill"></div>
                <?php }?>
                <article class="<?php $post_classes=get_post_class();foreach($post_classes as $classes){echo $classes." ";}?> mdui-typo" id="post-<?php the_ID();?>" itemprop="articleBody">
                <?php while(have_posts()):the_post();the_content();?>
                </article>
                <?php if(get_option('mdx_post_money')!=''){?>
                <div class="mdx-post-money">
                    <button mdui-menu="{target: '#mdx-qrcode-money',align: 'center'}" mdui-tooltip="{content: '<?php _e("赞赏","mdx");?>'}" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">&#xe8dc;</i></button>
                    <div class="mdui-menu" id="mdx-qrcode-money">
                        <img alt="<?php _e('赞赏','mdx');?>" src="<?php echo get_option('mdx_post_money');?>">
                    </div>
                </div>
                <?php }?>
                <?php if(get_option('mdx_say_after')!=''){?>
                    <div class="mdui-card mdx-say-after">
                        <div class="mdui-card-actions mdui-typo">
                        <?php 
                            $mdx_info = htmlspecialchars_decode(get_option('mdx_say_after'));
                            global $wp;$mdx_current_url=home_url(add_query_arg(array(),$wp->request));
                            echo str_replace('--PostURL--','<a href="'.$mdx_current_url.'">'.$mdx_current_url.'</a>',str_replace('--PostLink--','<a href="'.$mdx_current_url.'">'.get_the_title().'</a>',$mdx_info));?>
                        </div>
                    </div>
                    <?php }?>
                <div class="spanout"><button class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple mdx-share" mdui-menu="{target: '#mdxshare'}"><i class="mdui-icon material-icons">&#xe80d;</i></button>
                <ul class="mdui-menu" id="mdxshare">
                <li class="mdui-menu-item mdx-s-img-li"><a href="javascript:mdx_show_img()"><i class="mdui-icon material-icons mdx-share-icon">&#xe3f4;</i> <?php _e('生成分享图','mdx');?></a></li>
                <?php if($mdx_share_area=="all" || $mdx_share_area=="china"){include('includes/share_cn.php');}if($mdx_share_area=="all" || $mdx_share_area=="oversea"){include('includes/share_oversea.php');}?>
            </ul>
                <i class="mdui-icon material-icons">&#xe54e;</i> <?php _e('没有标签','mdx');?><span class="mdui-text-color-black-disabled timeInPost" itemprop="datePublished"><i class="mdui-icon material-icons info-icon">&#xe192;</i> <?php the_time('Y-m-d');?></span>
                <div class="mdui-divider"></div><?php mdx_breadcrumbs();?></div></div><?php endwhile;?><?php comments_template();?>
            </div>
<?php get_template_part('toggleposts')?>
        <div id="indic"></div>

      <?php }else if($post_style=="1"){if($full_image_url[0]!=""){$mdx_image_url = $full_image_url[0];}else{if(get_option("mdx_post_def_img")=="false"){$mdx_image_url=="";}else{$mdx_image_url=get_bloginfo("template_url")."/img/dpic.jpg";}}?>
        <div class="mdui-text-color-white-text mdui-color-theme mdui-typo-display-2 mdui-valign PostTitle<?php if($mdx_image_url==""){?> mdx-pni-t<?php }?>" itemprop="name headline" itemtype="http://schema.org/BlogPosting"><span class="mdui-center"><?php the_title();?></span></div>
        <div class="PostTitleFill mdui-color-theme"></div>
        <div class="PostMain<?php if($mdx_image_url==""){?> mdx-pni-am<?php }?>">
            <div class="ArtMain mdui-center mdui-typo">
            <?php if($mdx_image_url!=""){?>
                <img class="PostMainImg mdui-img-rounded mdui-shadow-7" alt="<?php the_title(); ?>" src="<?php echo $mdx_image_url;?>"><?php }?>
                <article <?php post_class();?> id="post-<?php the_ID();?>" itemprop="articleBody">
                <?php while(have_posts()):the_post();the_content();?>
                </article>
                <?php if(get_option('mdx_post_money')!=''){?>
                <div class="mdx-post-money">
                    <button mdui-menu="{target: '#mdx-qrcode-money',align: 'center'}" mdui-tooltip="{content: '<?php _e("赞赏","mdx");?>'}" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">&#xe8dc;</i></button>
                    <div class="mdui-menu" id="mdx-qrcode-money">
                        <img alt="<?php _e('赞赏','mdx');?>" src="<?php echo get_option('mdx_post_money');?>">
                    </div>
                </div>
                <?php }?>
                <?php if(get_option('mdx_say_after')!=''){?>
                    <div class="mdui-card mdx-say-after">
                        <div class="mdui-card-actions mdui-typo">
                        <?php 
                            $mdx_info = htmlspecialchars_decode(get_option('mdx_say_after'));
                            global $wp;$mdx_current_url=home_url(add_query_arg(array(),$wp->request));
                            echo str_replace('--PostURL--','<a href="'.$mdx_current_url.'">'.$mdx_current_url.'</a>',str_replace('--PostLink--','<a href="'.$mdx_current_url.'">'.get_the_title().'</a>',$mdx_info));?>
                        </div>
                    </div>
                    <?php }?>
                <div class="spanout"><button class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple mdx-share" mdui-menu="{target: '#mdxshare'}"><i class="mdui-icon material-icons">&#xe80d;</i></button>
                <ul class="mdui-menu" id="mdxshare">
                <li class="mdui-menu-item mdx-s-img-li"><a href="javascript:mdx_show_img()"><i class="mdui-icon material-icons mdx-share-icon">&#xe3f4;</i> <?php _e('生成分享图','mdx');?></a></li>
                <?php if($mdx_share_area=="all" || $mdx_share_area=="china"){include('includes/share_cn.php');}if($mdx_share_area=="all" || $mdx_share_area=="oversea"){include('includes/share_oversea.php');}?>
            </ul>
                <i class="mdui-icon material-icons">&#xe54e;</i> <?php _e('没有标签','mdx');?><span class="mdui-text-color-black-disabled timeInPost" itemprop="datePublished"><i class="mdui-icon material-icons info-icon">&#xe192;</i> <?php the_time('Y-m-d');?></span>
                <div class="mdui-divider"></div><?php mdx_breadcrumbs();?></div></div><?php endwhile;?>
            </div>
<?php comments_template();?>
<?php get_template_part('toggleposts')?>
        <div id="indic"></div>
        
      <?php }else if($post_style=="2"){if($full_image_url[0]!=""){$mdx_image_url = $full_image_url[0];}else{if(get_option("mdx_post_def_img")=="false"){$mdx_image_url=="";}else{$mdx_image_url=get_bloginfo("template_url")."/img/dpic.jpg";}}?>
        <div class="mdui-text-color-white-text mdui-typo-display-2 mdui-valign PostTitle PostTitle2" itemprop="name headline" itemtype="http://schema.org/BlogPosting"><span class="mdui-center"><?php the_title();?></span></div>
        <?php if($mdx_image_url!=""){?><div class="PostTitleFill2 LazyLoad" data-original="<?php echo $mdx_image_url;?>"></div><?php }?>
        <div class="PostTitleFillBack2 mdui-color-theme"></div>
        <div class="PostMain PostMain2">
            <div class="ArtMain0 mdui-center mdui-shadow-12">
                <article class="<?php $post_classes=get_post_class();foreach($post_classes as $classes){echo $classes." ";}?> mdui-typo" id="post-<?php the_ID();?>" itemprop="articleBody">
                <?php while(have_posts()):the_post();the_content();?>
                </article>
                <?php if(get_option('mdx_post_money')!=''){?>
                <div class="mdx-post-money">
                    <button mdui-menu="{target: '#mdx-qrcode-money',align: 'center'}" mdui-tooltip="{content: '<?php _e("赞赏","mdx");?>'}" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">&#xe8dc;</i></button>
                    <div class="mdui-menu" id="mdx-qrcode-money">
                        <img alt="<?php _e('赞赏','mdx');?>" src="<?php echo get_option('mdx_post_money');?>">
                    </div>
                </div>
                <?php }?>
                <?php if(get_option('mdx_say_after')!=''){?>
                    <div class="mdui-card mdx-say-after">
                        <div class="mdui-card-actions mdui-typo">
                        <?php 
                            $mdx_info = htmlspecialchars_decode(get_option('mdx_say_after'));
                            global $wp;$mdx_current_url=home_url(add_query_arg(array(),$wp->request));
                            echo str_replace('--PostURL--','<a href="'.$mdx_current_url.'">'.$mdx_current_url.'</a>',str_replace('--PostLink--','<a href="'.$mdx_current_url.'">'.get_the_title().'</a>',$mdx_info));?>
                        </div>
                    </div>
                    <?php }?>
                <div class="spanout"><button class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple mdx-share" mdui-menu="{target: '#mdxshare'}"><i class="mdui-icon material-icons">&#xe80d;</i></button>
                <ul class="mdui-menu" id="mdxshare">
                <li class="mdui-menu-item mdx-s-img-li"><a href="javascript:mdx_show_img()"><i class="mdui-icon material-icons mdx-share-icon">&#xe3f4;</i> <?php _e('生成分享图','mdx');?></a></li>
                <?php if($mdx_share_area=="all" || $mdx_share_area=="china"){include('includes/share_cn.php');}if($mdx_share_area=="all" || $mdx_share_area=="oversea"){include('includes/share_oversea.php');}?>
            </ul>
                <i class="mdui-icon material-icons">&#xe54e;</i> <?php _e('没有标签','mdx');?><span class="mdui-text-color-black-disabled timeInPost" itemprop="datePublished"><i class="mdui-icon material-icons info-icon">&#xe192;</i> <?php the_time('Y-m-d');?></span>
                <div class="mdui-divider"></div><?php mdx_breadcrumbs();?></div></div><?php endwhile;?><?php comments_template();?>
            </div>
<div id="indic"></div>
<?php }?>
<div class="mdx-share-img" id="mdx-share-img"><div class="mdx-si-head" style="background-image:url(<?php if($full_image_url[0]!=""){echo $full_image_url[0];}else{echo get_bloginfo('template_url').'/img/dpic.jpg';}?>)"><p><?php $mdx_logo=get_option('mdx_logo');if($mdx_logo!=""){echo '<img class="mdx-logo" src="'.$mdx_logo.'">';}else{bloginfo('name');}?></p><span><?php the_title();?></span></div><div class="mdx-si-sum"><?php echo mdx_get_post_excerpt($post, 175);?></div><div class="mdx-si-box"><span>扫描二维码继续阅读</span><div class="mdx-si-qr" id="mdx-si-qr"></div></div><div class="mdx-si-time"><?php the_time('Y-m-d');?></div></div>
<?php get_footer();?>