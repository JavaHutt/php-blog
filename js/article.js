const articleForm = document.querySelector('#articleForm');
const addArticle  = document.querySelector('#addArticle');

articleForm.addEventListener('submit', e => {
    e.preventDefault();
    let formData = new FormData(e.target);

    axios({
        method: 'post',
        url: '../ajax/add_article',
        cache: false,
        data: formData
    }).then(response => {
        if (response.data == 'Готово') {
            error.classList.remove('show');
            error.classList.add('hide');
            addArticle.textContent = 'Всё готово';
        } else {
            error.classList.add('show');
            error.textContent = response.data;
        }
    }).catch(error => {
        console.log(error);
    })
})