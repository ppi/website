<nav>
<ul>
    <li><a class="first" href="<?=$view['router']->generate('Community');?>">Community</a></li>
    <li><a class="first" href="<?=$view['router']->generate('Contributors');?>">Contributors</a></li>
    <li><a class="first" href="<?= $view['router']->generate('Chat'); ?>" target="_blank">Chat</a></li>
    <li><a class="first" href="http://www.github.com/ppi" target="_blank">GitHub</a></li>
    <li><a class="first" href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></li>
    <li class="box">
        <p class="title">PPI IRC Network</p>
        <p class="details">
            <strong>Server:</strong> irc.freenode.org<br>
            <strong>Channel:</strong> #ppi
        </p>
        <p><a class="btn success" href="<?= $view['router']->generate('Chat');?>" target="_blank">Connect</a></p>
    </li>
    <li class="box newsletter-box">
        <p class="title">PPI Newsletter</p>
        <div class="form">
            <form action="#submit" method="post">
                <p><label for="newsletterName">Name</label><input name="name" type="text" class="name" id="newsletterName"></p>
                <p><label for="newsletterEmail">Email</label><input name="email" type="text" class="email" id="newsletterEmail"></p>
                <input type="submit" class="btn success submit" href="<?= $view['router']->generate('Chat'); ?>" target="_blank" value="Subscribe to the newsletter">
            </form>
        </div>
    </li>
</ul>
</nav>