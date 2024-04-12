@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
@endsection
@section('content')
<section>
    <div class="products ">
        <p></p>&nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp;
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12" style="color:white;text-shadow:none;font-size:16px; line-height:35px;">
                    <div class="container">
                        <h1>PREGUNTAS FRECUENTES</h1>
                        <p></p>
                        <h2>¿Qué tipo de luz emiten los LED?</h2>
                        Las lámparas de LED utilizadas para uso normal emiten la luz de tres tipos: blanca cálida, natural o fría, para ser similares a la luz conseguida con las bombillas tradicionales.
                        <br>
                        Las unidades de medida para los tipos de luz se llaman Kelvin, o simplemente “K”, y son, aproximadamente:
                        <br>
                        <ul>
                            <li>2700 a 3200 K = Luz cálida – Ambientes de descanso y relajación, livings, comedores, habitaciones, (ambientes más decorativos)</li>
                            <li>3500 a 4500 K = Luz neutra o natural – Ambientes amigables, salón de conferencias, recepciones, oficinas.</li>
                            <li>4500 a 6500 K = Luz fría o luz día – Ambientes de actividad constante, hospitales, consultorías, oficinas, joyerías, trabajos de precisión.</li>
                        </ul>
                        <div style="text-align: center;">
                            <img src="/imgs/escala-color.jpg" alt="Escala de colores" style="max-width:100%;">
                        </div>

                        <br>
                        <h2>Sistemas RGB, RGBW, RGB Pixel</h2>
                        <p>RGB: Estos LEDs cuentan con un chip que tiene la combinación de tres colores: rojo, verde y azul, se pueden lograr múltiples combinaciones de colores y efectos.</p>
                        <p>RGB Pixel: Identica a la RGB, con la diferencia que tiene más cantidad de efectos lumínicos.</p>
                        <p>RGBW: Similar a la RGB, rojo, verde, azul y el color blanco cálido o blanco frío (a elección), como agregado, se pueden lograr múltiples combinaciones de colores y efectos, con el adicional de otro tono más (cálido o frío).</p>
                        <p>Ambientes recomendados: bares, salas de cine, habitaciones de juegos y diversión, locales comerciales orientados a la tecnología y público adolescente, joven, habitaciones de juegos y diversión.</p>
                        <p>Otro indicador del tipo de luz LED es el índice de rendimiento cromático (C.R.I. también llamado RA). Va desde 0 a 100, siendo 100 la luz similar a la luz diurna un día soleado. Los mejores LED consiguen un C.R.I = 90.</p>

                        <div style="text-align: center;">
                            <img src="/imgs/rgb.jpg" alt="Colores RGB">
                        </div>

                        <p></p>
                        <h2>¿Qué es un dimmer? ¿Y un controlador?</h2> <br>
                        <p>Todas nuestras lámparas cuentan con los sistemas mencionados, tienen la posibilidad de ser dimerizados y comandados por control remoto, WiFi y Bluetooth función dimmer. Permite elevar o bajar la intensidad de luz a través de un control remoto o app.</p>
                        <p>El controlador incluye el dimmer también, hacer efectos de colores, colores estáticos, mezclas con diferentes tonos. En definitiva, la diferencia entre uno y otro son la cantidad de funciones.</p>
                        <br>
                        <h2>¿Vida útil de los productos?</h2> 
                        <p>Las lámparas LED tienen una duración estimada entre 25.000 horas y 50.000 horas. La diferencia depende del tipo de uso que se le dé a la lámpara. Somos fabricantes y tenemos repuesto de todo.</p>
                        <H2>Acabo de cambiar las lámparas existentes por bombillas de bajo consumo. ¿Por qué debo instalar lámparas LED?</H2>
                        <p>Las lámparas LED son mucho más eficientes (es decir, consumen menos para emitir la luz), que las de bajo consumo y las de filamento. Eso significa ahorro económico y energético con todo lo que ambos implican. Comprobamos que las lámparas LED son entre un 30% y un 50% más eficientes que las de bajo consumo y hasta un 80% más que las incandescentes.</p>
                        <br>
                        <h2>¿Watts o lúmenes? En qué me tengo que fijar para elegir la cantidad de luz que va a dar una bombilla</h2> 
                        <p>Debemos fijarnos en la luminosidad y no en la potencia, existen lámparas de LED de 5W que dan más luz que una lámpara incandescente de 40W, eso se debe a que cada tecnología tiene un rendimiento lumínico que se expresa en lúmenes/watts.</p>
                        <h2>¿Y qué es el rendimiento lumínico?</h2>
                        <p>El rendimiento lumínico de una lámpara se mide en lm/W y es la relación entre la cantidad de iluminación que produce una lámpara y la potencia que consume.</p>
                        <h2>¿Mi casa tiene una doble altura (6m), podemos instalar un colgante de ustedes?</h2>
                        <p>Claro, podemos extender los cables a la medida que necesites. Luego puedes regular altura y nivel desde la base del artefacto. Lo diferencial es que la lámpara puede configurarse como al cliente le guste, en el caso de los aros suspendidos o rectángulos especialmente.</p>

                        <h2>¿Tengo un dimmer a perilla instalado, funciona con sus lámparas?</h2>
                        <p>Por el momento no, debe agregar uno de nuestros dimmers. Los veladores y lámparas de pie ya incluyen el dimmer.</p>
                        <h2>¿Hacen iluminación a medida?</h2> 
                        <p>Sí, se trabaja en conjunto al encargado de la obra y se estipulan condiciones técnicas. Se planifica, es fundamental la reunión con el técnico de la obra en proceso. Siempre se sugiere más y se lo invita a observar la experiencia ya consensuada.</p>


                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
    @endsection