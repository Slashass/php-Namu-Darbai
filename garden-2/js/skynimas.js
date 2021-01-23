const buttonSkinti = document.querySelector('#nuskintiViska');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            skinti();
            skintiVisusVienoAgurko();
        })
        .catch(function (error) {
            // console.log(error);
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
                axios.post(apiUrl + '/skintiVisus', {
                    id: id
                })
                    .then(function (response) {
                        // console.log(response);
                        list.innerHTML = response.data.list;
                        skinti();
                        skintiVisusVienoAgurko();
                    })
                    .catch(function (error) {
                        // console.log(error);
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

                axios.post(apiUrl + '/skinti', {
                    id: id,
                    'kiek-skinti': count
                })
                    .then(function (response) {
                        // console.log(response);
                        list.innerHTML = response.data.list;
                        skinti();
                        skintiVisusVienoAgurko();
                    })
                    .catch(function (error) {
                        // console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    });
}

buttonSkinti.addEventListener('click', () => {
    axios.post(apiUrl + '/nuskintiVisus', {})
        .then(function (response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            skinti();
            skintiVisusVienoAgurko();
        })
        .catch(function (error) {
            // console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});