if( document.getElementById('vote-btn') ) {
    console.log('vote_btn');
    const voteBtn = document.getElementById('vote-btn');

    voteBtn.addEventListener('click', function() {
        if(!voteBtn.getAttribute('disable')) {
            voteBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block;" width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#0a0a0a" stroke="none" transform="rotate(292.09 50 51)">
                        <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"></animateTransform>
                    </path>
                </svg>`;

            axios.post(`/api/projects/vote`, {
                voter: voteBtn.getAttribute('data-voter'),
                project: voteBtn.getAttribute('data-project'),
            }).then(res => {
                voteBtn.setAttribute('disable', true);
                voteBtn.innerHTML = '';

                if (res.data.status === 'vote_pended') {

                }

                if (res.data.status === 'vote_registered') {
                    Swal.fire('Solo falta un paso más!', res.data.message, 'info');
                    voteBtn.innerText = 'Pendiente validación';
                }

                if (res.data.status === 'vote_success') {
                    Swal.fire('Gracias por votar!', res.data.message, 'success');
                    voteBtn.innerText = 'Tu voto ha sido registrado';
                }

                if (res.data.status === 'vote_limit') {
                    Swal.fire('Ups!', res.data.message, 'warning');
                }

                if (res.data.status === 'vote_repeated') {
                    Swal.fire('Ups!', res.data.message, 'error');
                }
            })
            .catch((err) => {
                console.log(err);
                voteBtn.setAttribute('disable', true);
                voteBtn.innerHTML = 'Error';
            })
            .finally(() => {

            });
        }
    });
}

