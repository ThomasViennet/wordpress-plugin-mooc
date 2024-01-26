<?php if (isset($options) && !empty($options)) : ?>
    <div class="options-container">
        <table>
            <tr>
                <th>Option</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($options as $option) : ?>
                <tr>
                    <td><?php echo esc_html($option->option_text); ?></td>
                    <td>
                        <button type="button" onclick="openEditForm(<?php echo $option->id; ?>)">Éditer</button>

                        <!-- Formulaire de suppression -->
                        <form action="admin.php?page=manage-option" method="post" style="display: inline;">
                            <?php wp_nonce_field('manage_option_action', 'manage_option_nonce'); ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $option->id; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <!-- Formulaire d'édition caché -->
                <tr id="edit-form-<?php echo $option->id; ?>" style="display:none;">
                    <td colspan="2">
                        <form action="admin.php?page=manage-option" method="post">
                            <?php wp_nonce_field('manage_option_action', 'manage_option_nonce'); ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $option->id; ?>">
                            <label for="question_id">Question:</label>
                            <!-- Afficher ici dynamiquement -->
                            <select name="question_id" id="question_id">
                                <!-- <option value="">--Choisir un quiz--</option> -->
                                <option value="1">Certification</option>
                            </select>
                            <input type="text" name="option_text" value="<?php echo esc_attr($option->option_text); ?>">
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
    <!-- Afficher ici dynamiquement -->
    <select name="question_id" id="question_id">
        <option value="3">--Choisir un Question--</option>
    </select>
    <input type="text" name="option_text">
    <input type="text" name="is_correct">
    <button type="submit">Ajouter une option</button>

</form>
<script>
    function openEditForm(optionId) {
        var form = document.getElementById('edit-form-' + optionId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }
</script>