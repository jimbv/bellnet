

const apiproduct = new Vue({

    el:"#apiproduct",

    data: {

        nombre: '',

        slug: '',

        div_mensajeslug: 'Slug Existe',

        div_clase_slug: 'badge badge-danger',

        div_aparecer: false,

        deshabilitar_boton: 0,

        precioanterior:0,

        precioactual:0,

        descuento:0,

        porcentajededescuento:0,

        descuento_mensaje: ''

    },

    computed: {

        generarSlug: function generarSlug() {

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

            this.slug = this.nombre.trim().replace(expr, function (e) {

              return _char[e];

            }).toLowerCase();

            return this.slug;

          },

        generardescuento: function(){

            if(this.porcentajededescuento>100){

 

                Swal.fire({

                icon: 'error',

                title: 'Oops...',

                text: 'No puedes poner un valor mayor de 100'

                });



                this.porcentajededescuento=100;

                this.descuento= (this.precioanterior*this.porcentajededescuento)/100;

                this.precioactual= this.precioanterior-this.descuento;

                this.descuento_mensaje = 'Hay un descuento de $'+this.descuento;

                return this.descuento_mensaje;

            }else

            if(this.porcentajededescuento<0){



                

                Swal.fire({

                icon: 'error',

                title: 'Oops...',

                text: 'No puedes poner un valor menor de 0'

                });



                this.porcentajededescuento=0;

                this.descuento= (this.precioanterior*this.porcentajededescuento)/100;

                this.precioactual= this.precioanterior-this.descuento;

                this.descuento_mensaje = '';

                return this.descuento_mensaje;

            }else

            

            if(this.porcentajededescuento>0){

                

                this.descuento= (this.precioanterior*this.porcentajededescuento)/100;

                

                this.precioactual= this.precioanterior-this.descuento;

                

                this.descuento_mensaje = 'Hay un descuento de $'+this.descuento;



            }

            return this.descuento_mensaje;

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

        getProduct(){

            if(this.slug){

                let url= '/api/product/'+this.slug;

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

            this.nombre = data.datos.nombre;

            this.precioanterior = data.datos.precioanterior;

            this.precioactual = data.datos.precioactual;

            this.porcentajededescuento = data.datos.porcentajededescuento;

            this.deshabilitar_boton = 0;

        }

        console.log(data);

    }

});

