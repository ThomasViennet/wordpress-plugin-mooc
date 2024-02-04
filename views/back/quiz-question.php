<?php if (isset($questions) && !empty($questions)) : ?>
    <div class="questions-container">
        <table>
            <tr>
                <th>Form</th>
                <th>Question</th>
                <th>Options</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo esc_html(stripslashes($question->form_name)); ?></td>
                    <td><?php echo esc_html(stripslashes($question->question_text)); ?></td>
                    <td>
                        <!-- Ici, vous pourriez lister les options existantes pour chaque question si nécessaire -->
                    </td>
                    <td>
                        <button type="button" onclick="openEditForm(<?php echo $question->id; ?>)">Éditer</button>

                        <!-- Formulaire de suppression -->
                        <form action="admin.php?page=manage-question" method="post" style="display: inline;">
                            <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $question->id; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <!-- Formulaire d'édition caché -->
                <tr id="edit-form-<?php echo $question->id; ?>" style="display:none;">
                    <td colspan="3">
                        <form action="admin.php?page=manage-question" method="post">
                            <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $question->id; ?>">
                            <select name="form_id" id="form_id">
                                <?php foreach ($forms as $form) : ?>
                                    <option value="<?php echo $form->id; ?>" <?php echo $form->id == $question->form_id ? 'selected' : ''; ?>>
                                        <?php echo esc_html(stripslashes($form->form_name)); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="question_text" value="<?php echo esc_attr(stripslashes($question->question_text)); ?>">
                            <input type="text" name="source_question" value="<?php echo esc_attr(stripslashes($question->source_question ?? '')); ?>" placeholder="Source de la question"> <!-- Champ modifié pour inclure la source -->
                            <button type="submit">Sauvegarder</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php else : ?>
    <p>Aucune question trouvée.</p>
<?php endif; ?>
<form action="admin.php?page=manage-question" method="post" id="form-add-question">
    <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
    <input type="hidden" name="action" value="add">
    <input type="text" name="question_text" placeholder="Question">
    <input type="text" name="source_question" placeholder="Source de la question">
    <label for="form_id">Form:</label>
    <select name="form_id" id="form_id">
        <?php foreach ($forms as $form) : ?>
            <option value="<?php echo $form->id; ?>"><?php echo esc_html(stripslashes($form->form_name)); ?></option>
        <?php endforeach; ?>
    </select>
    <div id="options-container">
        <!-- Les champs d'option seront ajoutés ici dynamiquement -->
    </div>
    <button type="button" onclick="addOptionField()">Ajouter Option</button>
    <button type="submit">Ajouter une question</button>
</form>

<script>
    function openEditForm(questionId) {
        var form = document.getElementById('edit-form-' + questionId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }

    function addOptionField() {
        var container = document.getElementById('options-container');
        var newOptionDiv = document.createElement('div');
        newOptionDiv.innerHTML = `
        <input type="text" name="options[][option_text]" placeholder="Texte de l'option">
        <select name="options[][is_correct]">
            <option value="1">Vrai</option>
            <option value="0">Faux</option>
        </select>
        <button type="button" onclick="removeOptionField(this)">Supprimer</button>
    `;
        container.appendChild(newOptionDiv);
    }

    function removeOptionField(btn) {
        var div = btn.parentNode;
        div.parentNode.removeChild(div);
    }

    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

    jQuery(document).ready(function($) {
        $('#form-add-question').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Utilisez FormData pour gérer correctement les tableaux

            formData.append('action', 'add_question_with_options'); // Assurez-vous que cette action correspond à celle attendue par le serveur
            formData.append('_ajax_nonce', '<?php echo wp_create_nonce("manage_question_action"); ?>');

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                processData: false, // Nécessaire pour l'envoi de FormData
                contentType: false, // Nécessaire pour l'envoi de FormData
                data: formData,
                success: function(response) {
                    alert(response.data.message); // Affiche un message de succès
                    location.reload(); // Optionnel: recharge la page pour voir les nouvelles données
                },
                error: function() {
                    alert('Erreur lors de l\'ajout de la question et des options.');
                }
            });
        });
    });
</script>