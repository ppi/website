<?php $view->extend('::base.html.php'); ?>
<?php $view['slots']->set('title', 'PPI Framework Blog: ' . $view->escape($post->getTitle()));?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('blog/css/blog.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_head'); ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/mustache.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('blog/js/blog.js');?>"></script>
<script type="text/javascript">stLight.options({publisher: "9a24a00b-206d-46ea-a048-c52a72e37841"});</script>
<script>
var options={ "publisher": "9a24a00b-206d-46ea-a048-c52a72e37841", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["googleplus", "facebook", "twitter", "linkedin"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
    
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('custom_opengraph'); ?>
<meta property="og:title" content="PPI Framework: <?=$view->escape($post->getTitle());?>" />
<meta property="og:site_name" content="PPI Framework: <?=$view->escape($post->getTitle());?>"/>
<meta property="og:url" content="<?=$view['router']->generate('BlogView', array('postID' => $post->getID(), 'title' => $post->getSlug()), true);?>"/>
<meta property="og:type" content="website"> 
<meta property="og:image" content="<?=$view['assets']->getUrl('images/opengraph.png');?>"/>
<meta property="og:description" content="<?=$view->escape($post->getDescription());?>">
<?php $view['slots']->stop(); ?>

<div id="blog-index" class="clearfix blog-view">
    
    <div class="left-side">
        
        <?php
        $created = $post->getCreatedDate();
        ?>
        
        <div class="post">
            <h1 class="post-title"><?=$post->getTitle();?></h1>
            <div class="post-thumbnail"></div>
            <div class="post-content">
                <?=$post->getContent();?>
            </div>
            
            <div class="date-area">
                <div class="inner">
                    <span><?=$created->format('M');?></span>
                    <span class="day"><?=$created->format('j');?></span>
                    <span><?=$created->format('Y');?></span>
                </div>
            </div>
            
            <div class="comments">
                
                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'ppiframework'; // required: replace example with your forum shortname
            
                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                
            </div>
            
        </div>
        
    </div>
<!--    <div class="right-side">-->
<!--        -->
<!--<!--        <div class="section">-->
<!--<!--            <form>-->
<!--<!--                <input type="text" name="search"> <input type="submit" value="Search">-->
<!--<!--            </form>-->
<!--<!--        </div>-->
<!---->
<!--        <div class="section">-->
<!--            <div class="social-icons">-->
<!--                <a href="http://twitter.com/ppi_framework" target="_blank"><img src="--><?//= $view['assets']->getUrl('images/twitter2.png');;?><!--" width="48" /> </a>-->
<!--                <a href="#"><img src="--><?//= $view['assets']->getUrl('images/googleplus.png');?><!--" width="48" /></a>-->
<!--                <a href="--><?//=$view['router']->generate('BlogGetRSS');?><!--" target="_blank"><img src="--><?//= $view['assets']->getUrl('images/rss.png');;?><!--" width="48" /></a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="section">-->
<!--            <h3>Related Posts</h3>-->
<!--            <ul id="related-posts-content" data-rel="--><?//=$post->getID();?><!--">-->
<!--                <li class="ajax-loader"></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        -->
<!--        <div class="section">-->
<!--            <h3>Popular Tags</h3>-->
<!--            <ul id="popular-tags-content">-->
<!--                <li class="ajax-loader"></li>-->
<!--            </ul>-->
<!--        </div>-->
<!---->
<!--        <div class="section">-->
<!--            <h3>Recent Comments</h3>-->
<!--            <ul id="recent-comments-content">-->
<!--                <li class="ajax-loader"></li>-->
<!--            </ul>-->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
    
</div>

<script type="text/template" id="popular-tags-template">
{{#tags}}
<li><a href="{{link}}" title="{{title}}">{{title}} ({{count}})</a></li>
{{/tags}}
</script>

<script type="text/template" id="recent-comments-template">
{{#comments}}
<li>
    <a href="{{link}}" title="{{title}}">{{title}}</a>
    <p>{{description}}</p>
</li>
{{/comments}}
</script>

<script type="text/template" id="related-posts-template">
{{#posts}}
<li>
    <a href="{{link}}" title="{{title}}">{{title}}</a>
</li>
{{/posts}}
</script>
