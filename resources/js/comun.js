window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


if(document.getElementById('app')){

    const app = new Vue({

        el: '#app',

    });
}


if(document.getElementById('apicategory')){
    require('./admin/apicategory');   
}

if(document.getElementById('apiproduct')){
    require('./admin/apiproduct');   
}

if(document.getElementById('apinoticia')){
    require('./admin/apinoticia');   
}

if(document.getElementById('apiespecialidad')){
    require('./admin/apiespecialidad');   
}

if(document.getElementById('confirmareliminar')){
    require('./confirmareliminar');
}

if(document.getElementById('apiuser')){
    require('./admin/apiuser');   
}

