document.addEventListener('DOMContentLoaded', () => {

    const track = document.getElementById('carouselTrack');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (track && nextBtn && prevBtn) {

        const card = track.querySelector('.attraction-card');
        let position = 0;

        function getStep() {
            const style = getComputedStyle(track);
            const gap = parseInt(style.gap) || 20;
            return card.offsetWidth + gap;
        }

        nextBtn.addEventListener('click', () => {
            const step = getStep();
            const maxScroll = track.scrollWidth - track.parentElement.offsetWidth;
            position = Math.min(position + step, maxScroll);
            track.style.transform = `translateX(-${position}px)`;
        });

        prevBtn.addEventListener('click', () => {
            const step = getStep();
            position = Math.max(position - step, 0);
            track.style.transform = `translateX(-${position}px)`;
        });
    }

    // const checkin = document.querySelector('input[name="checkin"]');
    // const checkout = document.querySelector('input[name="checkout"]');

    // if (checkin && checkout) {

    //     checkout.addEventListener('change', () => {
    //         if (checkout.value <= checkin.value) {
    //             alert("A data de saída deve ser posterior à de entrada!");
    //             checkout.value = "";
    //         }
    //     });

    //     const today = new Date().toISOString().split('T')[0];

    //     checkin.min = today;
    //     checkout.min = today;
    // }

    const hero = document.querySelector('.hero');

    if (hero) {

        const imagens = [
            'img/2-home.jpg',
            'img/3-home.jpg',
            'img/4-home.jpg'
        ];

        let indice = 0;

        function trocarImagem() {
            hero.style.backgroundImage = `url('${imagens[indice]}')`;
            indice = (indice + 1) % imagens.length;
        }

        trocarImagem();

        setInterval(trocarImagem, 5000);
    }

});