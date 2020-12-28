

const apinoticia = new Vue({

    el:"#apinoticia",

    data: {

        titulo: '',

        slug: '',

        div_mensajeslug: 'Slug Existe',

        div_clase_slug: 'badge badge-danger',

        div_aparecer: false,

        deshabilitar_boton: 0 

    },

    computed: {

        generarSlug: function () {

            var _char = {

              "á": "a",

              "é": "e",

              "í": "i",

              "ó": "o",

              "ú": "u",

              "Á": "A",

              "É": "E",

              "Í": "I",

              "Ó": "O",

              "Ú": "U",

              "ñ": "n",

              "Ñ": "N",

              " ": "-",

              "_": "-"

            };

            var expr = /[á,Á,É,é,Í,í,Ó,ó,Ú,ú,Ñ,ñ,_, ]/g;

            this.slug = this.titulo.trim().replace(expr, function (e) {

              return _char[e];

            }).toLowerCase();

            return this.slug;

          } 
 

    },

    methods:{

        eliminarimagen(imagen){

            console.log(imagen);



            Swal.fire({

                title: 'Confirma desea eliminar la imágen '+ imagen.id,

                text: "No podras revertir esto",

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#3085d6',

                cancelButtonColor: '#d33',

                confirmButtonText: 'Si, eliminar',

                cancelButtonText: 'Cancelar'

              }).then((result) => {

                if (result.value) {



                    let url= '/api/eliminarimagen/'+imagen.id;

                    axios.delete(url).then(response=>{

                         console.log(response.data);

                    });



                    //console.log(elemento);



                    // Eliminar el elemento

                    var elemento = document.getElementById('idimagen-'+imagen.id);

                    elemento.parentNode.removeChild(elemento);









                    Swal.fire(

                        'Eliminado',

                        'Tu archivo ha sido eliminado',

                        'success'

                    )

                }

              })



        },

        getNoticia(){

            if(this.slug){

                let url= '/api/noticia/'+this.slug;

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

        if(data.editar=='Si'){

            this.titulo = data.datos.titulo;
 

            this.deshabilitar_boton = 0;

        }

        console.log(data);

    }

});

