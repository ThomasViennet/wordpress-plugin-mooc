<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Plateformes de Netlinking</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . '../../assets/css/back-style.css'; ?>">
</head>

<body>
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
                            <?php if (!empty($question->options)) : ?>
                                <ul>
                                    <?php foreach ($question->options as $option) : ?>
                                        <li>
                                            <?php echo esc_html(stripslashes($option->option_text)); ?> -
                                            <?php echo $option->is_correct ? 'Vrai' : 'Faux'; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                Pas d'options.
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" onclick="openEditForm(<?php echo $question->id; ?>)">Éditer</button>

                            <!-- Delete form -->
                            <form action="admin.php?page=manage-question" method="post" style="display: inline;">
                                <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $question->id; ?>">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Update form -->
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
                                <input type="text" name="source_question" value="<?php echo esc_attr(stripslashes($question->source_question ?? '')); ?>" placeholder="Source de la question">
                                <div id="options-container-<?php echo $question->id; ?>">
                                    <?php foreach ($question->options as $index => $option) : ?>
                                        <div class="option-item">
                                            <input type="text" name="options[<?php echo $index; ?>][option_text]" value="<?php echo esc_html(stripslashes($option->option_text)); ?>" placeholder="Texte de l'option">
                                            <input type="hidden" name="options[<?php echo $index; ?>][is_correct]" value="0">
                                            <input type="checkbox" name="options[<?php echo $index; ?>][is_correct]" value="1" <?php echo ($option->is_correct == '1' ? 'checked' : ''); ?>> Vrai
                                            <button type="button" onclick="removeOptionField(this)">Supprimer</button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" onclick="addOptionField(<?php echo $question->id; ?>)">Ajouter Option</button>
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
            <!-- Option fields are added here dynamically -->
        </div>
        <button type="button" onclick="addOptionField()">Ajouter Option</button>
        <button type="submit">Ajouter une question</button>
    </form>
</body>

</html>
<script>
    function openEditForm(questionId) {
        var form = document.getElementById('edit-form-' + questionId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }

    function addOptionField(questionId = null) {
        var containerId = questionId ? 'options-container-' + questionId : 'options-container';
        var container = document.getElementById(containerId);

        if (!container) {
            console.error("Le conteneur d'options est introuvable.");
            return; // Arrêtez l'exécution si le conteneur n'existe pas
        }

        var index = container.getElementsByClassName('option-item').length;

        // Création du HTML pour la nouvelle option sans utiliser de template strings
        var newOptionDiv = document.createElement('div');
        newOptionDiv.className = 'option-item';
        var innerHTML = '<input type="text" name="options[' + index + '][option_text]" placeholder="Texte de l\'option">' +
            '<input type="hidden" name="options[' + index + '][is_correct]" value="0">' + // Champ caché pour la valeur "0"
            '<input type="checkbox" name="options[' + index + '][is_correct]" value="1"> Vrai' + // Checkbox pour la valeur "1"
            '<button type="button" onclick="removeOptionField(this)">Supprimer</button>';

        newOptionDiv.innerHTML = innerHTML;
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

            var formData = new FormData(this);

            // for (var pair of formData.entries()) {
            //     console.log(pair[0] + ', ' + pair[1]);
            // }

            formData.append('action', 'add_question_with_options');
            formData.append('_ajax_nonce', '<?php echo wp_create_nonce("manage_question_action"); ?>');

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    alert(response.data.message);
                    location.reload();
                },
                error: function() {
                    alert('Erreur lors de l\'ajout de la question et des options.');
                }
            });
        });
    });
</script>