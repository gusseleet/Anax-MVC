<hr>
<?php if (is_array($comments)) : ?>
    <div class='comments'>
        <?php foreach ($comments as $id => $comment) : ?>
            <div class ='singleComment'>

                <h4>Comment <a href = "<?=$this->url->create('edit')?>?id=<?=$id?>">#<?=$id?></a>, by <?=$comment['name']?> </h4>
                <h3> </h3>
                <?php
                    $ts = intval($comment['timestamp']);
                    $date = new DateTime("@$ts");
                    $currentDate = new DateTime('now');
                    $interval = $currentDate->diff($date);
                ?>

                <p><?=$comment['content'] ?></p>
                <p class="commentDate"> posted <?= $interval->format('%i minutes')?> ago </p>
            </div>
        <hr>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

