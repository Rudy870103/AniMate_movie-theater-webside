<?php
$movie=$Movie->find($_GET['id']);
?>
<div>
    <?=$movie['trailer'];?>
</div>