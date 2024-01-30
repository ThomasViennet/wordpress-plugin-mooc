<form method="post" action="?action=lesson_button">
    <input id="lesson_slug" name="lesson_slug" type="hidden" value="<?= $lesson_slug ?>">
    <input id="lesson_status" name="lesson_status" type="hidden" value="<?= $lesson_status ?>">
    <input type="submit" value="<?= $label_button ?>" class="is-style-wide buttonLesson"/>
</form>