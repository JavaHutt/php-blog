const regUser = document.querySelector('#regUser');
const error = document.querySelector('#error');

regUser.addEventListener('click', () => {
    let form = new FormData(document.querySelector('#regForm'));

    axios({
        method: 'post',
        url: '../reg/reg',
        cache: false,
        data: form
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