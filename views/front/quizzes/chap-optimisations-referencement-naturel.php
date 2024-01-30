<?php
/*
* While waiting to manage quizzes with a CRUD and a database,
* use of variables similar to the answer of a database.
*/

$title = "Optimisations on-site pour le référencement naturel";

$formation = array(
    'free'
);

$chapites = array(
    ['optimisations-referencement-naturel', 'free']
);

$questions = array(
    ['question1', 'Le robots.txt c’est …', 'optimisations-referencement-naturel', 'free'],
    ['question2', 'Meta "robots" : Quelle(s) affirmation(s) est/sont vraie(s) ?', 'optimisations-referencement-naturel', 'free'],
    ['question3', 'Commande Google : Quelle(s) affirmation(s) est/sont vraie(s) ?', 'optimisations-referencement-naturel', 'free'],
    ['question4', 'La balise HTML ALT …', 'optimisations-referencement-naturel', 'free'],
    [
        'question5',
        'Comment interprêter ce robots.txt ?
        <figure class="wp-block-image size-large"><picture decoding="async" class="wp-image-6331">
        <source type="image/webp" srcset="https://referencime.fr/wp-content/uploads/2023/04/robots-1024x405.png.webp 1024w, https://referencime.fr/wp-content/uploads/2023/04/robots-300x119.png.webp 300w, https://referencime.fr/wp-content/uploads/2023/04/robots-768x304.png.webp 768w, https://referencime.fr/wp-content/uploads/2023/04/robots-1200x474.png.webp 1200w, https://referencime.fr/wp-content/uploads/2023/04/robots.png.webp 1356w" sizes="(max-width: 1024px) 100vw, 1024px">
        <img decoding="async" width="1024" height="405" src="https://referencime.fr/wp-content/uploads/2023/04/robots-1024x405.png" alt="Exemple de robots.txt" srcset="https://referencime.fr/wp-content/uploads/2023/04/robots-1024x405.png 1024w, https://referencime.fr/wp-content/uploads/2023/04/robots-300x119.png 300w, https://referencime.fr/wp-content/uploads/2023/04/robots-768x304.png 768w, https://referencime.fr/wp-content/uploads/2023/04/robots-1200x474.png 1200w, https://referencime.fr/wp-content/uploads/2023/04/robots.png 1356w" sizes="(max-width: 1024px) 100vw, 1024px">
        </picture>
        <figcaption class="wp-element-caption">Exemple de robots.txt</figcaption></figure>',
        'optimisations-referencement-naturel', 'free'
    ],
    ['question6', 'La balise HTML …', 'optimisations-referencement-naturel', 'free'],
    ['question7', 'Les données structurées permettent …', 'optimisations-referencement-naturel', 'free'],
    ['question8', 'Pour une version mobile SEO Friendly, Google recommande …', 'optimisations-referencement-naturel', 'free'],
    ['question9', 'Google My Business …', 'optimisations-referencement-naturel', 'free'],
    ['question10', 'Un code HTTP …', 'optimisations-referencement-naturel', 'free']
);

$options = array(
    ['Un protocole permettant à un webmestre d\'informer les moteurs de recherche des adresses d\'un site web disponibles pour l\'indexation automatique', 'question1', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Un fichier qui permet d\'influencer la fréquence à laquelle un moteur de recherche peut crawler un site (quotidiennement, mensuellement, etc.)', 'question1', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Un fichier qui permet de donner des instructions de crawl aux moteurs de recherche', 'question1', 'optimisations-referencement-naturel', 'free', TRUE],

    ['Pour désindexer une URL, il faut l\'interdire au crawl l\'URL puis ajouter une balise <meta name="robots" content="noindex" />', 'question2', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Cette balise <meta name="robots" content="noarchive" /> permet d\'indiquer à Google qu\'il ne doit pas désindexer l\'URL', 'question2', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Cette balise <meta name="robots" content="nofollow" /> permet d\'indiquer à Google qu\'il ne doit pas suivre les liens présents sur cette URL', 'question2', 'optimisations-referencement-naturel', 'free', TRUE],

    ['La commande "cache:exemple.com" permet de demander à Google de cacher les résultats provenant de exemple.com dans la SERP', 'question3', 'optimisations-referencement-naturel', 'free', FALSE],
    ['La commande "site:exemple.com -requête"  permet de demander à Google d\'afficher uniquement les résultats provenant de exemple.com et qui sont en lien avec "requête" dans la SERP', 'question3', 'optimisations-referencement-naturel', 'free', FALSE],
    ['La commande "site:exemple.com" permet de demander à Google d\'afficher uniquement les résultats provenant de exemple.com dans la SERP', 'question3', 'optimisations-referencement-naturel', 'free', TRUE],

    ['D\'une image peut servir d\'ancre pour un lien', 'question4', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Permet d\'optimiser le contenu d\'une URL grâce aux images', 'question4', 'optimisations-referencement-naturel', 'free', FALSE],
    ['N\'existe pas', 'question4', 'optimisations-referencement-naturel', 'free', TRUE],

    ['Bingbot est autorisé à explorer les URL commençant par example.com/nogooglebot/', 'question5', 'optimisations-referencement-naturel', 'free', TRUE],
    ['L\'instruction "User-agent: * Allow: /" annule la première instruction', 'question5', 'optimisations-referencement-naturel', 'free', FALSE],
    ['La ligne "Sitemap: http://www.example.com/sitemap.xml" ne doit pas se trouver ici', 'question5', 'optimisations-referencement-naturel', 'free', FALSE],

    ['Title est la balise la plus importante lorsqu\'on optimise le contenu d\'une page', 'question6', 'optimisations-referencement-naturel', 'free', TRUE],
    ['Title peut ne pas être utilisé par Google pour être affichés dans ses résultats de recherche', 'question6', 'optimisations-referencement-naturel', 'free', TRUE],
    ['Meta description doit contenir les mots-clés pour enrichir la sémantique d\'une URL', 'question6', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Meta keywords est utile pour se positionner sur des requêtes de longue traîne', 'question6', 'optimisations-referencement-naturel', 'free', FALSE],

    ['D\'accélérer le temps de chargement d\'une page', 'question7', 'optimisations-referencement-naturel', 'free', FALSE],
    ['D\'avoir un design responsive', 'question7', 'optimisations-referencement-naturel', 'free', FALSE],
    ['De fournir des informations claires sur la signification d\'une page', 'question7', 'optimisations-referencement-naturel', 'free', TRUE],

    ['D\'utiliser la technologie Accelerated Mobile Page pour améliorer grandement ses positions dans les SERP mobile', 'question8', 'optimisations-referencement-naturel', 'free', FALSE],
    ['D\'utiliser le Responsive Web Design', 'question8', 'optimisations-referencement-naturel', 'free', TRUE],
    ['D\'utiliser un sous-domaine dédié à la version mobile', 'question8', 'optimisations-referencement-naturel', 'free', FALSE],

    ['Permet d\'automatiser la ventes de produits dans la partie "shopping" des SERP', 'question9', 'optimisations-referencement-naturel', 'free', FALSE],
    ['Est idéal pour obtenir de la visibilité locale', 'question9', 'optimisations-referencement-naturel', 'free', TRUE],
    ['Est particulièrement utile pour effectuer le diagnostic d\'un site', 'question9', 'optimisations-referencement-naturel', 'free', FALSE],

    ['410 permet d\'indiquer qu\'un contenu n\'existe plus à Google ce qui devrait accélérer la désindexation de l\'URL', 'question10', 'optimisations-referencement-naturel', 'free', TRUE],
    ['307 est idéale pour gérer les redirections HTTP vers HTTPS', 'question10', 'optimisations-referencement-naturel', 'free', FALSE],
    ['304 permet d\'indiquer qu\'une page n\'a pas pu être trouvée', 'question10', 'optimisations-referencement-naturel', 'free', FALSE],
);

$explanations = array(
    ['Un fichier robots.txt contient les indications que doivent suivre les robots de Google, Bings et autres.', 'question1', 'optimisations-referencement-naturel', 'free'],
    [
        '<p>Pour bloquer l’indexation d’une page, vous pouvez ajouter dans la section <head> de chacune de vos pages web, l’instruction noindex grâce à une balise meta destinée aux robots.</p>
        <p>Par exemple pour interdir l’indexation à tous les robots, voici le code à utiliser :</p>
        <pre class="wp-block-code"><code>&lt;meta name="robots" content="noindex"&gt;</code></pre>
        <p>Ce code s’adresse à tous les robots et leur donne l’instruction de ne pas indexer cette URL.</p>
        <p>Si vous avez créé un fichier robots.txt qui interdit le crawl de la page où vous avez ajouté l’instruction noindex, alors les moteurs de recherche ne pourront pas la lire et elle sera donc ignorée par ceux-ci.<p>
        <p>Vous pouvez également demander à :
        <ul> 
        <li>Interdire la mise en cache</li>
        <li>Interdire de suivre les liens présent dans le contenu</li>
        </ul>
        <p>Par exemple voici une instruction qui autorise l’indexation, mais donne l’indication de ne pas suivre les liens et de ne pas archiver la page :</p>
        <pre class="wp-block-code"><code>&lt;meta name="robots" content="index,nofollow,noarchive" /&gt;</code></pre>',
        'question2', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p><strong>Commande "cache:"</strong></p>
        <p>Si vous n’avez pas accès à la propriété Search Console, vous pouvez afficher le fichier enregistré en cache pas le moteur grâce à la requête « cache:URL ».</p>
        <p><strong>Commande "site:"</strong></p>
        <p>Il peut arrive que le webmaster ait demandé à ne pas archive la page. Pour vérifier si l’URL est indexée, vous pouvez utiliser la commande « site:URL ».<br>
        Si l’URL ressort comme résultat c’est donc que Google la connait est l’ajoutée à son index.</p>
        <p>Vous pouvez également vous utiliser l’opérateur « – » pour éventuellement soustraire un sous domaine du domaine que vous analysez ou un mot clé de la requête.<br>
        Par exemple : site:google.com vous donne ces résultats :<br>
        <figure class="wp-block-image size-large"><img decoding="async" width="1024" height="622" src="https://referencime.fr/wp-content/uploads/2022/01/Capture-de%CC%81cran-2022-01-09-a%CC%80-00.20.53-1024x622.png" alt="" class="wp-image-4058" srcset="https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53-1024x622.png 1024w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53-300x182.png 300w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53-768x466.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53-1536x933.png 1536w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53-1200x729.png 1200w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.20.53.png 1752w" sizes="(max-width: 1024px) 100vw, 1024px"></figure>
        Et pour retirer le sous-domain fonts.google.com, vous pouvez utiliser la requête site:google.com -site:fonts.google.com
        <figure class="wp-block-image size-large"><img decoding="async" width="1024" height="659" src="https://referencime.fr/wp-content/uploads/2022/01/Capture-de%CC%81cran-2022-01-09-a%CC%80-00.21.31-1024x659.png" alt="" class="wp-image-4059" srcset="https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31-1024x659.png 1024w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31-300x193.png 300w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31-768x494.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31-1536x989.png 1536w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31-1200x773.png 1200w, https://referencime.fr/wp-content/uploads/2022/01/Capture-décran-2022-01-09-à-00.21.31.png 1690w" sizes="(max-width: 1024px) 100vw, 1024px"></figure>',
        'question3', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>Cet attribut de la balise img permet de décrire l’image et ainsi aider Google à comprendre son contenu tout en optimisant son référencement en utilisant des mots-clés.</p>
        <p>Cet attribut est aussi utile pour les mal voyants, car il est lu par le navigateur pour décrire l’image.</p>',
        'question4', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>Avec ces directives, Google ne peut pas indexer le contenu des URL dans le dossier /nogooglebot/, mais peut tout de même indexer les URL et les afficher dans les résultats de recherche sans extrait.</p>
        <p>Lors de la mise en correspondance des règles robots.txt avec les URL, les robots d\'exploration utilisent la règle plus spécifique en fonction de la longueur de son chemin. Dans le cas de règles contradictoires, y compris celles comportant des caractères génériques, Google utilise la règle la moins restrictive.</p>
        <cite>Source : <a href="https://developers.google.com/search/docs/crawling-indexing/robots/robots_txt?hl=fr">https://developers.google.com/search/docs/crawling-indexing/robots/robots_txt?hl=fr</a></cite>',
        'question5', 'optimisations-referencement-naturel', 'free'],
    [
        '<p>La balise "title" permet de déterminer le titre de la page.</p>
        <p>Le contenu de cette balise sera par exemple affiché dans les résultats de recherche, ainsi que dans l’onglet du navigateur ou encore comme titre si un utilisateur met votre page dans ses favoris.
        <blockquote class="wp-block-quote">
        <p>Google peut choisir d’afficher un autre contenu que celui de la balise Title dans ses résultats de recherche.</p>
        <cite>Source : <a href="https://developers.google.com/search/blog/2021/09/more-info-about-titles?hl=fr" data-wpel-link="external" rel="external" class="wpel-icon-right">https://developers.google.com/search/blog/2021/09/more-info-about-titles?hl=fr<i class="wpel-icon dashicons-before dashicons-external" aria-hidden="true"></i></a></cite></blockquote>
        <p>Il s’agit de la balise la plus importante pour le référencement naturel d’une page web. Il est crucial que son contenu soit composé de votre mot-clé principal ainsi que de mots de son champ lexical.</p>',
        'question6', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>Les balises méta sont très intéressantes en SEO pour fournir des données structurées sur vos contenus aux moteurs de recherche.</p>
        <p>La balise méta description est notamment celle qui permet d’indiquer quelle est la description que doit afficher Google dans les résultats de recherche.</p>
        <p>Mais il existe une multitude d’autres balises qui apportent d’autres informations pour optimiser de la visibilité de votre contenu.</p>',
        'question7', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>Depuis 2017 les internautes utilisent davantage leur smartphone que leur ordinateur pour naviguer sur le web.</p>
        <p>Un site optimiser pour un affichage sur mobile est donc primordiale pour obtenir du trafic. Pour cela il existe plusieurs solution, mais cella qui a prit le dessus et qui recommandé par Google est le « responsive design ».</p>
        <cite><a href="https://web.dev/learn/design/#why-responsive-design">Plus d\'informations</a></cite>',
        'question8', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>Il est impératif d\'être présent dans le "pack local" pour les entreprises ayant une activité locale.</p>
        <p>Pour cela, il faut créer un compte Google My Buisness et compléter entièrement votre fiche d\'entreprise.</p>',
        'question9', 'optimisations-referencement-naturel', 'free'
    ],
    [
        '<p>En avril 2014, Matt Cutts expliquait le code HTTP "404" engendrera un délai de 24 heures avant qu\'une action soit effectuée (par exemple, suppression de la page de l\'index de Google).
        Alors que si le code d\'erreur est 410, l\'action sera menée immédiatement, sans délai.</p>
        <p>Dans le cas d\'une de HTTP vers HTTPS, il faut utiliser une redirection 301 qui indique l\'aspect permanent de celle-ci.</p>',
        'question10', 'optimisations-referencement-naturel', 'free'
    ],
);


$knowledgeEvaluated = array(
    'Connaissances générales sur le SEO on-site'
);

$note = 0;
$totalPoints = 0;
$alert = '';
$successIndicator = 0.7;
