

const apirole = new Vue({

    el:"#apirole",

    data: {

        nombre: '',

        slug: '',

        div_mensajeslug: 'Slug Existe',

        div_clase_slug: 'badge badge-danger',

        div_aparecer: false,

        deshabilitar_boton: 0

    },

    computed: {

       generarSlug : function(){ 

            var char = {

                "á":"a","é":"e","í":"i","ó":"o","ú":"u",

                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",

                "ñ":"n","Ñ":"N",

                " ":"-","_":"-"

            }

            var expr = /[á,Á,É,é,Í,í,Ó,ó,Ú,ú,Ñ,ñ,_, ]/g;

            this.slug = this.nombre.trim().replace(expr,function(e){

                return char[e]

            }).toLowerCase();

            return this.slug;

        }

    },

    methods:{

        getrole(){

            if(this.slug){

                let url= '/admin/role/'+this.slug;

                axios.get(url).then(response=>{

                    this.div_mensajeslug = response.data;

                    if(this.div_mensajeslug == 'Slug disponible'){

                        this.div_clase_slug = 'badge badge-success';

                        this.deshabilitar_boton = 0;

                    }else{

                        this.div_clase_slug = 'badge badge-danger';

                        this.deshabilitar_boton = 1;

                    }

                    this.div_aparecer= true;

                }) 

            }else{

                this.div_clase_slug = 'badge badge-danger';

                this.div_mensajeslug = "Ingresar un nombre";

                this.deshabilitar_boton = 1;

                this.div_aparecer= true;

            }

        }

    },

    mounted(){

        if(document.getElementById('editar')){

            this.nombre = document.getElementById('nombretemp').innerHTML;

            this.deshabilitar_boton = 1;

        }

    }

});

