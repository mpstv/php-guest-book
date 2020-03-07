<?php include $_SERVER['DOCUMENT_ROOT'] . '\\App\\Views\\Shared\\header.php'?>
<a href="Review/index">Create review</a>
<?php foreach ($viewData as $review): ?>
    <h3><?=$review->author?> #<?=$review->id?></h3>
    <p><?=$review->content?></p>
<?php endforeach;?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '\\App\\Views\\Shared\\footer.php'?>