@if(!isset($accessToken))
<a href="https://auth.mercadolibre.com.ar/authorization?response_type=code&client_id=5612319285683210&redirect_uri=https://ener-tech.com.ar/callback">Login with MercadoLibre</a>
@else
    ACCESS TOKEN <BR></BR>
    {{$accessToken}}<BR></BR>
    REFRESH TOKEN <BR></BR>
    {{$refreshToken}}<BR></BR>
@endif