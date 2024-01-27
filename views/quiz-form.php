<?php if (isset($forms) && !empty($forms)) : ?>
    <div class="forms-container">
        <table>
            <tr>
                <th>Form</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($forms as $form) : ?>
                <tr>
                    <td><?php echo esc_html($form->form_name); ?></td>
                    <td>
                        <button type="button" onclick="openEditForm(<?php echo $form->id; ?>)">Éditer</button>

                        <!-- Formulaire de suppression -->
                        <form action="admin.php?page=manage-form" method="post" style="display: inline;">
                            <?php wp_nonce_field('manage_form_action', 'manage_form_nonce'); ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $form->id; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <!-- Formulaire d'édition caché -->
                <tr id="edit-form-<?php echo $form->id; ?>" style="display:none;">
                    <td colspan="2">
                        <form action="admin.php?page=manage-form" method="post">
                            <?php wp_nonce_field('manage_form_action', 'manage_form_nonce'); ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $form->id; ?>">
                            <!-- Il faudra un CRUD pour les quiz et les afficher ici dynamiquement -->
                            <input type="text" name="form_name" value="<?php echo esc_attr($form->form_name); ?>">
                            <button type="submit">Sauvegarder</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>


        </table>
    </div>
<?php else : ?>
    <p>Aucun form trouvé.</p>
<?php endif; ?>
<form action="admin.php?page=manage-form" method="post">
    <?php wp_nonce_field('manage_form_action', 'manage_form_nonce'); ?>
    <input type="hidden" name="action" value="add">
    <input type="text" name="form_name">
    <button type="submit">Ajouter un form</button>
</form>
<script>
    function openEditForm(formId) {
        var form = document.getElementById('edit-form-' + formId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }
</script>