<div class="community-page">
	<div class="left-side">
		<section class="titlebox">
            <div class="image"><img src="<?= $baseUrl; ?>images/community/community.jpg" alt="Community"></div>
            <h2 class="text">Community</h2>
        </section>

        <section class="elements">
            <div class="singlebox"><a href="<?=$baseUrl;?>contributors">Contributors</a></div>
            <div class="singlebox"><a href="http://www.github.com/dragoonis/" target="_blank">Github</a></div>
            <div class="singlebox"><a href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></div>
            <div class="singlebox"><a href="<?= $baseUrl; ?>live-chat" target="_blank">Live Chat</a></div>

            <div class="box">
                <p class="box-title">PPI IRC Network</p>
                <p class="irc-details">
                    <strong>Server:</strong> irc.freenode.org
                    <strong>Channel:</strong> #ppi
                    <a class="irc-button" href="<?= $baseUrl; ?>live-chat" target="_blank"><img src="<?= $baseUrl;?>images/community/sb-btnconnect.png" /></a>
                </p>
            </div>

            <div class="box newsletter-box">
                <p class="box-title">PPI Newsletter</p>
                <div class="form">
                    <label for="newsletter-email">Email</label> <input id="newsletter-email" name="email" type="text" />
                    <a href="#" class="newsletter-button"><img src="<?= $baseUrl;?>images/community/sb-btnsubscribe.png" /></a>
                </div>
            </div>
        </section>
	</div>
    <div class="content-box">
		<h1>Activity Stream</h1>
        <div class="topcontent">
                <div class="filter">Filter: <a href="<?= $baseUrl; ?>community/" class="filter-all">All</a> - <a href="<?= $baseUrl; ?>community/index/filter/twitter" class="filter-twitter">Twitter</a> - <a href="<?= $baseUrl; ?>community/index/filter/github" class="filter-github">Github</a> </div>
        </div>

        <div class="activity-stream <?= $filtered ? 'filtered' : ''; ?>">
            <div class="feeds">
            <?php
            foreach($activity as $item):
                $feedImage  = $baseUrl . 'images/community/' . $item['source'] . '.png';
            ?>
                <div class="feed source-<?= $item['source']; ?>">
                    <div class="image">
                        <img class="fl <?= $item['source']; ?>" src="<?= $feedImage; ?>" alt="<?= $item['source']; ?>" />
                    </div>
                    <div class="content">
                        <div class="description"><?= $item['title']; ?></div>

                        <div class="actions">
                            <a href="<?= $item["url"];?>" target="_blank" class="readmore">Read More</a>
                        </div>

                    </div>
                </div>
            <?php
            endforeach;
            ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
