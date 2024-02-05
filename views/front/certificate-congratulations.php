<style>
    @keyframes firework {
        0% {
            transform: translate(var(--x), var(--initialY));
            width: var(--initialSize);
            opacity: 1;
        }

        50% {
            width: 0.5vmin;
            opacity: 1;
        }

        100% {
            width: var(--finalSize);
            opacity: 0;
        }
    }

    .firework,
    .firework::before,
    .firework::after {
        --initialSize: 0.5vmin;
        --finalSize: 45vmin;
        --particleSize: 0.2vmin;
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --y: -30vmin;
        --x: -50%;
        --initialY: 60vmin;
        content: "";
        animation: firework 2s infinite;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, var(--y));
        width: var(--initialSize);
        aspect-ratio: 1;
        background:
           
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 50% 0%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 100% 50%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 50% 100%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 0% 50%,

            /* bottom right */
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 80% 90%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 95% 90%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 90% 70%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 100% 60%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 55% 80%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 70% 77%,

            /* bottom left */
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 22% 90%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 45% 90%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 33% 70%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 10% 60%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 31% 80%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 28% 77%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 13% 72%,

            /* top left */
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 80% 10%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 95% 14%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 90% 23%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 100% 43%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 85% 27%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 77% 37%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 60% 7%,

            /* top right */
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 22% 14%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 45% 20%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 33% 34%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 10% 29%,
            radial-gradient(circle, var(--color3) var(--particleSize), #0000 0) 31% 37%,
            radial-gradient(circle, var(--color2) var(--particleSize), #0000 0) 28% 7%,
            radial-gradient(circle, var(--color1) var(--particleSize), #0000 0) 13% 42%;
        background-size: var(--initialSize) var(--initialSize);
        background-repeat: no-repeat;
    }

    .firework::before {
        --x: -50%;
        --y: -50%;
        --initialY: -50%;
        transform: translate(-50%, -50%) rotate(40deg) scale(1.3) rotateY(40deg);
    }

    .firework::after {
        --x: -50%;
        --y: -50%;
        --initialY: -50%;
        transform: translate(-50%, -50%) rotate(170deg) scale(1.15) rotateY(-30deg);
    }

    .firework:nth-child(2) {
        --x: 30vmin;
    }

    .firework:nth-child(2),
    .firework:nth-child(2)::before,
    .firework:nth-child(2)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 40vmin;
        left: 30%;
        top: 40%;
        animation-delay: -0.25s;
    }

    .firework:nth-child(3) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(3),
    .firework:nth-child(3)::before,
    .firework:nth-child(3)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 70%;
        top: 60%;
        animation-delay: -0.4s;
    }

    .firework:nth-child(4) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(4),
    .firework:nth-child(4)::before,
    .firework:nth-child(4)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 60%;
        top: 65%;
        animation-delay: -0.7s;
    }

    .firework:nth-child(5) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(5),
    .firework:nth-child(5)::before,
    .firework:nth-child(5)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 40%;
        top: 70%;
        animation-delay: -0.9s;
    }


    .firework:nth-child(6) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(6),
    .firework:nth-child(6)::before,
    .firework:nth-child(6)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 10%;
        top: 70%;
        animation-delay: -1.1s;
    }

    .firework:nth-child(7) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(7),
    .firework:nth-child(7)::before,
    .firework:nth-child(7)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 90%;
        top: 60%;
        animation-delay: -1.3s;
    }

    .firework:nth-child(8) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(8),
    .firework:nth-child(8)::before,
    .firework:nth-child(8)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 25%;
        top: 70%;
        animation-delay: -1.6s;
    }

    .firework:nth-child(9) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(9),
    .firework:nth-child(9)::before,
    .firework:nth-child(9)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 75%;
        top: 52%;
        animation-delay: -1.8s;
    }

    .firework:nth-child(10) {
        --x: -30vmin;
        --y: -50vmin;
    }

    .firework:nth-child(10),
    .firework:nth-child(10)::before,
    .firework:nth-child(10)::after {
        --color1: white;
        --color2: #cd2753;
        --color3: #222e5a;
        --finalSize: 35vmin;
        left: 45%;
        top: 45%;
        animation-delay: -2s;
    }

    
</style>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div class="firework"></div>
<div id="congratulations">
    <p>Bravo le certificat a été ajouté à votre profil public !</p>
    <p><a href="profil?user_id=<?= $user_id ?>">Voir mon profil</a></p>

</div>