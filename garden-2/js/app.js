const buttonCucumber = document.querySelector('#cucumber');
const buttonPeper = document.querySelector('#peper');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            // console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const addNewList = () => {
    const darzoves = document.querySelectorAll('.items');
    // console.log(darzoves);
    darzoves.forEach(darzoves => {
        // console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=israuti]').value;
            axios.post(apiUrl + '/remove', {
                id: id,
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


buttonCucumber.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekisC]').value;

    axios.post(apiUrl + '/sodintiAgurka', {
        'kiekis': count,
    })
        .then(function (response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            // console.log(error);
            // asd
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonPeper.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekisP]').value;

    axios.post(apiUrl + '/sodintiPaprika', {
        'kiekis': count,
    })
        .then(function (response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            // console.log(error.response.data);
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
