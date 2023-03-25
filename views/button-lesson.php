<p><?= $lesson_id ?></p>
<p><?= $lesson_status ?></p>
<form method="post" action="?action=lesson_button">
    <input id="lesson_id" name="lesson_id" type="hidden" value="<?= $lesson_id ?>">
    <input id="lesson_status" name="lesson_status" type="hidden" value="<?= $lesson_status ?>">
    <input type="submit" value="<?= $label_button ?>" />
</form>