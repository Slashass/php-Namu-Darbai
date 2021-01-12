console.log('labas');

const button = document.querySelector('[type=button]');
const place = document.querySelector('#atsakymas');

button.addEventListener('click', () => {

    const info = document.querySelector('#infojs').value;



    axios.post(apiUrl, {
        input: info,
        kitas: 'Zuikis'
    })
        .then(function (response) {
            console.log(response.data.ans);
            place.innerHTML = response.data.ans;
        })
        .catch(function (error) {
            console.log(error);
        });



    // console.log(info);
});
