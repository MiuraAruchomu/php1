<?php
require_once 'controller/TaskController.php'; ?>

<a href="/">Back</a>

<form method="post" action="/?controller=todo&action=add">
    <input type="text" name="description" placeholder="New task" />
    <input type="submit" value="Add task" />
</form>

<ul>
    <?php
    if (!empty($tasks)) {
        foreach ($tasks as $key => $task) {
    ?>
            <li>
                <h4><?= $task->getDescription()?> <a href="/?controller=todo&action=done&id=<?= $task->id ?>">Done</a></h4>
            </li>
    <?php
        }
    }
    ?>
</ul>