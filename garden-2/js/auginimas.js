const buttonAuginimas = document.querySelector('#auginti');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            // console.log(response);
            // console.log(response.data);
            list.innerHTML = response.data.list;
        })
        .catch(function (error) {
            // console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

buttonAuginimas.addEventListener('click', () => {
    axios.post(apiUrl + '/grow', {})
        .then(function (response) {
            // console.log(response);
            // console.log(response.data);
            list.innerHTML = response.data.list;
        })
        .catch(function (error) {
            // console.log(error);
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});