<?php if (isset($questions) && !empty($questions)): ?>
    <div class="questions-container">
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <h3>Question: <?php echo esc_html($question->question_text); ?></h3>
                <!-- Ici, vous pouvez ajouter plus de détails si nécessaire, comme les options de réponse -->
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucune question trouvée.</p>
<?php endif; ?>
