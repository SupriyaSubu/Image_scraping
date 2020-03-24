<?php

    function curl( $url=NULL, $options=NULL, $headers=false ){
        /*
            Download a copy of `cacert.pem` from here
            https://curl.haxx.se/docs/caextract.html

            copy to webserver somewhere and modify below path
            to suit your environment
        */  
        $cacert='C:/xampp/perl/vendor/lib/Mozilla/CA/cacert.pem';
        $vbh = fopen('php://temp', 'w+');


        session_write_close();

        /* Initialise curl request object */
        $curl=curl_init();
        if( parse_url( $url,PHP_URL_SCHEME )=='https' ){
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, true );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
            curl_setopt( $curl, CURLOPT_CAINFO, $cacert );
        }
        /* Define standard options */
        curl_setopt( $curl, CURLOPT_URL,trim( $url ) );
        curl_setopt( $curl, CURLOPT_AUTOREFERER, true );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $curl, CURLOPT_FAILONERROR, true );
        curl_setopt( $curl, CURLOPT_HEADER, false );
        curl_setopt( $curl, CURLINFO_HEADER_OUT, false );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_BINARYTRANSFER, true );
        curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, 20 );
        curl_setopt( $curl, CURLOPT_TIMEOUT, 60 );
        curl_setopt( $curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36' );
        curl_setopt( $curl, CURLOPT_MAXREDIRS, 10 );
        curl_setopt( $curl, CURLOPT_ENCODING, '' );
        curl_setopt( $curl, CURLOPT_VERBOSE, true );
        curl_setopt( $curl, CURLOPT_NOPROGRESS, true );
        curl_setopt( $curl, CURLOPT_STDERR, $vbh );
        /* Assign runtime parameters as options */
        if( isset( $options ) && is_array( $options ) ){
            foreach( $options as $param => $value ) curl_setopt( $curl, $param, $value );
        }
        if( $headers && is_array( $headers ) ){
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        }
        /* Execute the request and store responses */
        $res=(object)array(
            'response'  =>  curl_exec( $curl ),
            'info'      =>  (object)curl_getinfo( $curl ),
            'errors'    =>  curl_error( $curl )
        );
        rewind( $vbh );
        $res->verbose=stream_get_contents( $vbh );
        fclose( $vbh );
        curl_close( $curl );
        return $res;
    }

    $keyword='java+books';
    $baseurl='https://www.amazon.in/s?k';

    $url=sprintf('%s=%s',$baseurl,$keyword);
    $res=curl( $url );
    if( $res->info->http_code==200 ){
        echo $res->response;
    


//execute
$source_code = curl_exec($curl);
$html = getHtmlcode($url);


//close curl session
 $title = '/<h2 class="a-size-mini a-spacing-none a-color-base s-line-clamp-2">(?P<val>[^>]*)<\/h2>/';
    preg_match_all($title,$html,$value);

 return Array(@$value[val]);

/*$pattern ='/<img[^>]+>/'; 
$matches = '';

preg_match_all($pattern, $source_code, $matches);
*/
echo '<pre>';
print_r(Array($value[val]));

if(!is_dir('downloads')){
	mkdir('downloads',0777);
}

}
?>