<h1> Guest book </h1>
<?php foreach ($viewData as $review): ?>
    <h3><?=$review->author?></h3>
    <p><?=$review->content?></p>
<?php endforeach;?>
