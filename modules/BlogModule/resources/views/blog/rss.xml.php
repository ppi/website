<?='<';?>?xml version="1.0" encoding="UTF-8"<?='?';?>>
<rss version="2.0">
    <channel>
        <title>PPI Blog RSS Feed</title>
        <link><?=$rssBaseLink;?></link>
        <description>Add Content Here</description>
        
        <?php foreach($rssData as $r): ?>
        <item>
            <title><?=$r['title'];?></title>
            <description>Add Content Here</description>
            <link><?=$r['link'];?></link>
            <pubDate><?=$r['date'];?></pubDate>
        </item>
        <?php endforeach; ?>
    </channel>
</rss>