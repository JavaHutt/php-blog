const feedbackForm = document.querySelector('#feedbackForm');
const feedbackSend = document.querySelector('#feedbackSend');
const username     = document.querySelector('#username');
const email        = document.querySelector('#email');
const message      = document.querySelector('#message');
const error        = document.querySelector('#error');

feedbackForm.addEventListener('submit', e => {
    e.preventDefault();
    let formData = new FormData(e.target);

    axios({
        method: 'post',
        url: '../ajax/feedback',
        cache: false,
        data: formData
    }).then(response => {
        if (response.data == 'Готово') {
            error.classList.remove('show');
            error.classList.add('hide');
            username.value = '';
            email.value    = '';
            message.value  = '';
        } else {
            error.classList.add('show');
            error.textContent = response.data;
        }
    }).catch(error => {
        console.log(error);
    })
})