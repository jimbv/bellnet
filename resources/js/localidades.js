const { default: Axios } = require("axios");


const app = new Vue({
    el: '#app',
    data: {
        selected_provincia: '',
        selected_localidad: '', 
        localidades: [],
        conyuge: ''
    },
    mounted: function (){
        document.getElementById('localidad').disabled=true;
        this.conyuge =  document.getElementById('conyuge').getAttribute('data-old'); 
        this.showDatosConyuge();

        this.selected_provincia =  document.getElementById('provincia').getAttribute('data-old');
        if(this.selected_provincia != ''){
            this.loadLocalidades();
        }
        this.selected_localidad =  document.getElementById('localidad').getAttribute('data-old');
    },
    methods: {
        showDatosConyuge(){
            if(this.conyuge=='Si'){ 
                document.getElementById('datos_conyuge').hidden=false;
            }else{ 
                document.getElementById('datos_conyuge').hidden=true;
            }
        },
        loadLocalidades(){
            if(this.selected_provincia != ''){
                axios.get('/localidades',{params:{provincia_id: this.selected_provincia} }).then((response) =>{
                    this.localidades = response.data;
                    document.getElementById('localidad').disabled=false;
                })
            }


        }
    }
});


