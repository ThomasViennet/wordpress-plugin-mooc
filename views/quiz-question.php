<?php if (isset($questions) && !empty($questions)) : ?>
    <div class="questions-container">
        <table>
            <tr>
                <th>Question</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo esc_html($question->question_text); ?></td>
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
                    <td colspan="2">
                        <form action="admin.php?page=manage-question" method="post">
                            <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?php echo $question->id; ?>">
                            <!-- Il faudra un CRUD pour les quiz et les afficher ici dynamiquement -->
                            <input type="text" name="question_text" value="<?php echo esc_attr($question->question_text); ?>">
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
<form action="admin.php?page=manage-question" method="post">
    <?php wp_nonce_field('manage_question_action', 'manage_question_nonce'); ?>
    <input type="hidden" name="action" value="add">
    <input type="text" name="question_text">
    <label for="select-quiz">Quiz:</label>

    <!-- Il faudra un CRUD pour les quiz et les afficher ici dynamiquement -->
    <select name="quiz_id" id="quiz_id">
        <!-- <option value="">--Choisir un quiz--</option> -->
        <option value="1">Certification</option>
    </select>
    <button type="submit">Ajouter une question</button>
</form>
<script>
    function openEditForm(questionId) {
        var form = document.getElementById('edit-form-' + questionId);
        form.style.display = form.style.display === 'none' ? '' : 'none';
    }
</script>