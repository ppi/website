<nav>
<ul>
    <li><a class="first" href="<?=$view['router']->generate('Contributors');?>">Contributors</a></li>
    <li><a class="first" href="http://www.github.com/ppi" target="_blank">GitHub</a></li>
    <li><a class="first" href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></li>
    <li class="box">
        <p class="title">Chat Room</p>
        <p><a class="btn success" href="https://gitter.im/ppi/framework" target="_blank">Connect</a></p>
    </li>
    <li class="box newsletter-box">
        <p class="title">PPI Newsletter</p>
        <div class="form">
            <form action="#submit" method="post">
                <p><input name="name" type="text" class="name" id="newsletterName" placeholder="Enter your name"></p>
                <p><input name="email" type="text" class="email" id="newsletterEmail" placeholder="Enter your email address"></p>
                <input type="submit" class="btn success submit" href="<?= $view['router']->generate('Chat'); ?>" target="_blank" value="Subscribe">
            </form>
        </div>
    </li>
</ul>
</nav>
