const authForm = document.querySelector('#authForm');
const authUser = document.querySelector('#authUser');
const exitUser = document.querySelector('#exitUser');
const error    = document.querySelector('#error');


if (authForm) {
    authForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(e.target);

        axios({
            method: 'post',
            url: '../ajax/auth',
            cache: false,
            data: formData
        }).then(response => {
            if (response.data == 'Готово') {
                error.classList.remove('show');
                error.classList.add('hide');
                authUser.textContent = 'Всё готово';
                document.location.reload(true);
            } else {
                error.classList.add('show');
                error.textContent = response.data;
            }
        }).catch(error => {
            console.log(error);
        })
    })
}

if (exitUser) {
    exitUser.addEventListener('click', () => {
        axios({
            method: 'post',
            url: '../ajax/exit',
            cache: false
        }).then(response => {
            document.location.reload(true);
        }).catch(error => {
            console.log(error);
        })
    })
}