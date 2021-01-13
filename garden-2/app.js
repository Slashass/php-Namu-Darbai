const buttonCucumber = document.querySelector('.sodintiAgurka');
const buttonPeper = document.querySelector('.sodintPaprika');
const placeCucumber = document.querySelector('#grazinaA');
const placePeper = document.querySelector('#grazinaP');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');


const addNewList = () => {
    const darzoves = document.querySelectorAll('.items');
    // console.log(darzoves);
    darzoves.forEach(darzoves => {
        console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=israuti]').value;
            axios.post(apiUrl, {
                id: id,
                israuti: 1
            })
                .then(function (response) {
                    console.log(response.data);
                    list.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            // console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

buttonCucumber.addEventListener('click', () => {
    const count = document.querySelector('#cucumber').value;

    axios.post(apiUrl, {
        'kiekis': count,
        'sodintiAgurka': 1
    })
        .then(function (response) {
            console.log(response);
            placeCucumber.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
        })
        .catch(function (error) {
            console.log(error.response.data);
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonPeper.addEventListener('click', () => {
    const count = document.querySelector('#peper').value;

    axios.post(apiUrl, {
        'kiekis': count,
        'sodintiPaprika': 1
    })
        .then(function (response) {
            console.log(response);
            placePeper.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
        })
        .catch(function (error) {
            console.log(error.response.data);
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
