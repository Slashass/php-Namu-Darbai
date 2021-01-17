const buttonSkinti = document.querySelector('.nuimti-viska');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            skinti();
            skintiVisusVienoAgurko();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const skintiVisusVienoAgurko = () => {
    const darzoves = document.querySelectorAll('.items');
    darzoves.forEach(darzove => {
        const btn = darzove.querySelector('.skinti-visus');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti-visus]').value;
                axios.post(apiUrl, {
                    id: id,
                    'skinti-visus': 1
                })
                    .then(function (response) {
                        console.log(response);
                        list.innerHTML = response.data.list;
                        skinti();
                        skintiVisusVienoAgurko();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skinti = () => {
    const darzoves = document.querySelectorAll('.items');
    darzoves.forEach(darzove => {
        const btn = darzove.querySelector('.skinti');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti]').value;
                const count = darzove.querySelector('[name=kiek]').value;

                axios.post(apiUrl, {
                    id: id,
                    'kiek-skinti': count,
                    'skinti': 1
                })
                    .then(function (response) {
                        console.log(response);
                        listPlace.innerHTML = response.data.list;
                        skinti();
                        skintiVisusVienoAgurko();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

buttonSkinti.addEventListener('click', () => {
    axios.post(apiUrl, {
        'nuimti-viska': 1
    })
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            skinti();
            skintiVisusVienoAgurko();
            nuskitiVisus();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});