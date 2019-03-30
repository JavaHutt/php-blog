const regForm = document.querySelector('#regForm');
const regUser = document.querySelector('#regUser');
const error   = document.querySelector('#error');

regForm.addEventListener('submit', e => {
    e.preventDefault();
    let formData = new FormData(e.target);

    axios({
        method: 'post',
        url: '../ajax/reg',
        cache: false,
        data: formData
    }).then(response => {
        if (response.data == 'Готово') {
            error.classList.remove('show');
            error.classList.add('hide');
            regUser.textContent = 'Всё готово';
        } else {
            error.classList.add('show');
            error.textContent = response.data;
        }
    }).catch(error => {
        console.log(error);
    })
})