<?php

$rss = simplexml_load_file("https://www.blic.rs/rss/danasnje-vesti");
$news = $rss->channel->item;

?>

<?php include("templates/header.php"); ?>

<link type="text/css" rel="stylesheet" href="style/news.css">

<?php foreach($news as $item): ?>
<div class="news">
    <a class="title" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
    <small class="date"><?php echo $item->pubDate ?></small>
    <p class="description"><?php echo $item->description; ?></p>
</div>
<?php endforeach; ?>

<?php include("templates/footer.html"); ?>
