/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('./bootstrap');

const axios = require('axios');

const button = document.getElementById('button');
const buttonText = document.getElementById('button-text');
const loading = document.getElementById('loading');

button.addEventListener('click', () => {
  startLoading();
  axios.get('/getip')
    .then(({data}) => {
      stopLoading();
      buttonText.textContent = data;
    })
    .catch(() => {
      failed();
    })
})


function startLoading(){
  loading.className = '';
}

function stopLoading(){
  loading.className = 'hidden';
}

function failed(){
  buttonText.textContent ="Request failed.";
  stopLoading();
}
