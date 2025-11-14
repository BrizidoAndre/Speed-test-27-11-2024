<?php

/** @var DateTime [] $days */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">S</th>
            <th scope="col">M</th>
            <th scope="col">T</th>
            <th scope="col">W</th>
            <th scope="col">T</th>
            <th scope="col">F</th>
            <th scope="col">S</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php for ($i = 0, $iMax = count($days); $i < $iMax; $i++) : ?>
            <th scope="col"></th>
            <?php endfor ?>
        </tr>
        </tbody>
    </table>
</div>
