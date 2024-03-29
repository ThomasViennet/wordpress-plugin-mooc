<div id="navMooc" class="is-style-wide navMooc">

    <div id="bodyNavMooc">

        <?php
        if (!is_admin()) {
            echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
        }
        ?>
        <ol>
            <h3>
                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/">
                    <li class="
                    <?php
                    if (in_array("quest-ce-que-le-seo", $lessons_slug, true))
                        echo 'lessonCompleted';
                    ?>">Découvrez l'univers du SEO
                    </li>
                </a>
            </h3>


            <ol>

                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/le-concept-e-a-t/">
                    <li class="
                <?php
                if (in_array("le-concept-e-a-t", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le concept E-E-A-T de Google</li>
                </a>

                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/black-hat-et-white-hat/">
                    <li class="
                <?php
                if (in_array("black-hat-et-white-hat", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le SEO white et black hat</li>
                </a>

                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/quest-ce-que-le-sea/">
                    <li class="
                <?php
                if (in_array("quest-ce-que-le-sea", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le SEA</li>
                </a>

                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/quest-ce-que-le-sxo/">
                    <li class="
                <?php
                if (in_array("quest-ce-que-le-sxo", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le SXO</li>
                </a>

                <a href="/formation-seo-gratuite/quest-ce-que-le-seo/quest-ce-que-le-smo/">
                    <li class="
                <?php
                if (in_array("quest-ce-que-le-smo", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le SMO</li>
                </a>
            </ol>

            <!-- The URL "/quiz" must existe -->
            <h4>
                <a href="/quiz?quiz_name=univers-seo" class="
                    <?php
                    if (in_array("univers-seo", $quizzes_name_win, true)) {
                        echo 'quizCompleted';
                    } elseif (in_array("univers-seo", $quizzes_name_failed, true)) {
                        echo 'quizFailed';
                    }
                    ?>">
                    Quiz : Découvrez l'univers du SEO
                </a>
            </h4>

            <h3>
                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/">

                    <li class="
                        <?php
                        if (in_array("comment-fonctionne-un-moteur-de-recherche", $lessons_slug, true))
                            echo 'lessonCompleted';
                        ?>">Découvrez le fonctionnement d'un moteur de recherche
                    </li>
                </a>
            </h3>


            <ol>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/histoire-des-moteurs-de-recherche/">
                    <li class="
                <?php
                if (in_array("histoire-des-moteurs-de-recherche", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Histoire de la recherche d’informations</li>
                </a>
                <ol>
                    <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/histoire-des-moteurs-de-recherche/parts-de-marche-des-moteurs-de-recherche/">
                        <li class="
                <?php
                if (in_array("parts-de-marche-des-moteurs-de-recherche", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Historique des parts de marché des moteurs de recherche</li>
                    </a>

                    <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/histoire-des-moteurs-de-recherche/quels-sont-les-algorithmes-de-google/">
                        <li class="
                <?php
                if (in_array("quels-sont-les-algorithmes-de-google", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Historique des algorithmes de Google</li>
                    </a>
                </ol>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-le-pagerank/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-le-pagerank", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement du PageRank</li>
                </a>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-un-algorithme-de-learning-to-rank/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-un-algorithme-de-learning-to-rank", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement du Learning to rank</li>
                </a>


                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-lalgorithme-du-transition-rank/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-lalgorithme-du-transition-rank", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement du Transition rank</li>
                </a>


                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-lalgorithme-bert/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-lalgorithme-bert", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement de Google BERT</li>
                </a>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-lalgorithme-google-penguin/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-lalgorithme-google-penguin", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement de Google Penguin</li>
                </a>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-lalgorithme-google-panda/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-lalgorithme-google-panda", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement de Google Panda</li>
                </a>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-le-duplicate-content/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-le-duplicate-content", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement du Duplicate content</li>
                </a>

                <a href="/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-le-le-knowledge-graph-de-google/">
                    <li class="
                <?php
                if (in_array("comment-fonctionne-le-le-knowledge-graph-de-google", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Fonctionnement du Knowledge Graph de Google</li>
                </a>

            </ol>

            <h4>
                <a href="/quiz?quiz_name=fonctionnement-moteur-recherche" class="
                    <?php
                    if (in_array("fonctionnement-moteur-recherche", $quizzes_name_win, true)) {
                        echo 'quizCompleted';
                    } elseif (in_array("fonctionnement-moteur-recherche", $quizzes_name_failed, true)) {
                        echo 'quizFailed';
                    }
                    ?>">
                    Quiz : Découvrez le fonctionnement d'un moteur de recherche
                </a>
            </h4>


            <h3>
                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/">
                    <li class="
                         <?php
                            if (in_array("toutes-les-optimisations-pour-les-moteurs-de-recherche-seo", $lessons_slug, true))
                                echo 'lessonCompleted';
                            ?>">Optimisations on-site
                    </li>
                </a>
            </h3>


            <ol>
                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/optimisation-seo-du-crawl-des-moteurs-de-recherche/">
                    <li class="
                <?php
                if (in_array("optimisation-seo-du-crawl-des-moteurs-de-recherche", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser l’indexation des crawlers</li>
                </a>

                <ol>
                    <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/optimisation-seo-du-crawl-des-moteurs-de-recherche/guide-seo-pour-les-codes-http-dune-url/">
                        <li class="
                    <?php
                    if (in_array("guide-seo-pour-les-codes-http-dune-url", $lessons_slug, true))
                        echo 'lessonCompleted';
                    ?>">Code HTTP et SEO
                        </li>
                    </a>
                </ol>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-dune-page-web/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-dune-page-web", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les pages web</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-les-images/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-les-images", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les images</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-les-videos/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-les-videos", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les vidéos</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-le-referencement-local/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-le-referencement-local", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser le référencement local</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-les-sites-e-commerce/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-les-sites-e-commerce", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les sites e-commerce</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-de-la-version-mobile-dun-site-web/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-de-la-version-mobile-dun-site-web", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser la version mobile d’un site web</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-les-fichiers-texte/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-les-fichiers-texte", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les fichiers texte</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-pour-lactualite/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-pour-lactualite", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les actualités</li>
                </a>

                <a href="/formation-seo-gratuite/toutes-les-optimisations-pour-les-moteurs-de-recherche-seo/les-optimisations-seo-des-podcasts/">
                    <li class="
                <?php
                if (in_array("les-optimisations-seo-des-podcasts", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Optimiser les podcasts</li>
                </a>

            </ol>

            <h4>
                <a href="/quiz?quiz_name=optimisations-referencement-naturel" class="
                    <?php
                    if (in_array("optimisations-referencement-naturel", $quizzes_name_win, true)) {
                        echo 'quizCompleted';
                    } elseif (in_array("optimisations-referencement-naturel", $quizzes_name_failed, true)) {
                        echo 'quizFailed';
                    }
                    ?>">
                    Quiz : Optimisations on-site
                </a>
            </h4>

            <h3>
                <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/">
                    <li class="
                        <?php
                        if (in_array("creer-une-strategie-seo-perenne-et-pertinente", $lessons_slug, true))
                            echo 'lessonCompleted';
                        ?>">Créer une stratégie SEO pour Google
                    </li>
                </a>
            </h3>

            <ol>
                <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/strategie-de-mots-cles/">
                    <li class="
                <?php
                if (in_array("creer-une-liste-de-mots-cles", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Créer liste de mots-clés</li>
                </a>
                <ol>

                    <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/strategie-de-mots-cles/triangle-dor-google-en-2021/">
                        <li class="
                <?php
                if (in_array("triangle-dor-google-en-2021", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Le triangle d’or de Google</li>
                    </a>
                </ol>

                <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/mots-cles-et-semantique-seo/">
                    <li class="
                <?php
                if (in_array("mots-cles-et-semantique-seo", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Créer un contenu sémantiquement optimisé</li>
                </a>

                <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/creer-un-maillage-interne/">
                    <li class="
                <?php
                if (in_array("creer-un-maillage-interne", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Créer un maillage interne optimisé</li>
                </a>

                <a href="/formation-seo-gratuite/creer-une-strategie-seo-perenne-et-pertinente/quest-ce-que-le-netlinking/">
                    <li class="
                <?php
                if (in_array("quest-ce-que-le-netlinking", $lessons_slug, true))
                    echo 'lessonCompleted';
                ?>">Créer une campagne de netlinking</li>
                </a>

            </ol>

            <h4>
                <a href="/mooc/quiz?quiz_name=strategie-seo" class="
                    <?php
                    if (in_array("strategie-seo", $quizzes_name_win, true)) {
                        echo 'quizCompleted';
                    } elseif (in_array("strategie-seo", $quizzes_name_failed, true)) {
                        echo 'quizFailed';
                    }
                    ?>">
                    Quiz : Créer une stratégie SEO pour Google
                </a>
            </h4>
            <h3>
            <a href="/formation-seo-gratuite/ressources-pour-continuer-votre-formation-seo-gratuitement/">
                <li class="
                        <?php
                        if (in_array("ressources-pour-continuer-votre-formation-seo-gratuitement", $lessons_slug, true))
                            echo 'lessonCompleted';
                        ?>">Ressources utiles
                </li>
            </a>
            </h3>
            <h3>
            <a href="/formation-seo-gratuite/outils-seo-les-meilleurs-pour-debuter-en-referencement-naturel/">
                <li class="
                        <?php
                        if (in_array("/formation-seo-gratuite/outils-seo-les-meilleurs-pour-debuter-en-referencement-naturel/", $lessons_slug, true))
                            echo 'lessonCompleted';
                        ?>">Comparatif des outils SEO
                </li>
            </a>
            </h3>
        </ol>
    </div>
</div>

<?php
if (!is_admin()) {
    echo '<span class="is-style-wide buttonNavMooc" onclick="openNav()">Voir la formation</span>';
}
