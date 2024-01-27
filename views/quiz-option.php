<?php if (isset($options) && !empty($options)) : ?>
    <div class="options-container">
        <table>
            <tr>
                <th>Question</th>
                <th>Option</th>
                <th>Vrai / Faux</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($options as $option) : ?>
                <tr>
                    <td><?php echo htmlspecialchars(esc_html($option->question_text)); ?></td>
                    <td><?php echo htmlspecialchars(esc_html($option->option_text)); ?></td>
                    <td><?php echo $option->is_correct ? 'Vrai' : 'Faux'; ?></td>
                    <td>
                        <button type="button" onclick="openEditForm(<?php echo $option->id; ?>)">Éditer</button>

                        <!-- DELETE -->
                        <form action="admin.php?page=manage-option" method="post" style="display: inline;">
                            <?php wp_nonce_field('manage_option_action', 'manage_option_nonce'); ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $option->id; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <!-- UPDATE -->
                <tr id="edit-form-<?php echo $option->id; ?>" style="display:none;">
                    <td colspan="2">
                        <form action="admin.php?page=manage-option" method="post">
                            <?php wp_nonce_field('manage_option_action', 'manage_option_nonce'); ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $option->id; ?>">
                            <select name="question_id" id="question_id">
                                <?php foreach ($questions as $question) : ?>
                                    <option value="<?php echo $question->id; ?>" <?php echo $question->id == $option->question_id ? 'selected' : ''; ?>>
                                        <?php echo esc_html($question->question_text); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="option_text" value="<?php echo htmlspecialchars(esc_attr($option->option_text)); ?>">
                            <select name="is_correct" id="is_correct">
                                <option value="">--Vrai / Faux--</option>
                                <option value="1" <?php echo $option->is_correct ? 'selected' : ''; ?>>Vrai</option>
                                <option value="0" <?php echo !$option->is_correct ? 'selected' : ''; ?>>Faux</option>
                            </select>
                            <button type="submit">Sauvegarder</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>


        </table>
    </div>
<?php else : ?>
    <p>Aucune option trouvée.</p>
<?php endif; ?>
<form action="admin.php?page=manage-option" method="post">
    <?php wp_nonce_field('manage_option_action', 'manage_option_nonce'); ?>
    <input type="hidden" name="action" value="add">
    <select name="question_id" id="question_id">
        <?php foreach ($questions as $question) : ?>
            <option value="<?php echo $question->id; ?>"><?php echo esc_html($question->question_text); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="option_text">
    <select name="is_correct" id="is_correct">
        <option value="">--Vrai / Faux--</option>
        <option value="1">Vrai</option>
        <option value="0">Faux</option>
    </select>
    <button type="submit">Ajouter une option</button>

</form>
<script>
    function openEditForm(optionId) {
        var form = document.getElementById('edit-form-' + optionId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }
</script>