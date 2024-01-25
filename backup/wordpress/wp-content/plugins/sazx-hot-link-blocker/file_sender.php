<?php

namespace sazx;

/**
 * 
 * Accepts a file to be sent to the browser
 */
function sazx_hlb_send_file($fileName){

    $filesize = filesize($fileName);
    $offset = 0;
    $length = $filesize;
    
    if (isset($_SERVER['HTTP_RANGE'])) {
        // if the HTTP_RANGE header is set we're dealing with partial content
    
        $partialContent = true;
    
        // find the requested range
        // this might be too simplistic, apparently the client can request
        // multiple ranges, which can become pretty complex, so ignore it for now
        preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);
    
        $offset = intval($matches[1]);
        $length = intval($matches[2]) - $offset;
    } else {
        $partialContent = false;
    }
    
    $file = fopen($fileName, 'r');
    
    $content_type = mime_content_type($file);
    
    // seek to the requested offset, this is 0 if it's not a partial content request
    fseek($file, $offset);
    
    $data = fread($file, $length);
    
    fclose($file);
    
    
    if ($partialContent) {
        // output the right headers for partial content
    
        header('HTTP/1.1 206 Partial Content');
        header('Content-Range: bytes ' . $offset . '-' . ($offset + $length) . '/' . $filesize);
    }
    
    // output the regular HTTP headers
    header('Content-Type: ' . $content_type);
    header('Content-Length: ' . $filesize);
    header('Accept-Ranges: bytes');
    
    print($data);
}


function sazx_hlb_send_error( $code, $title, $message  ){
    ?> 
        <h1>
            <?php  echo  htmlspecialchars( $title ); ?>
        </h1>
        <p>
            <?php  echo htmlspecialchars( $message ); ?>
        </p>
        
        <hr/>
        <p> <em> This website is protected from hotlinking  by, <a href="https://wordpress.org/plugins/sazx-hot-link-blocker/"> SAZX Hotlink Blocker </a> 2021   </em>  </p>

    <?php
    http_response_code( $code );
    exit;
}

/**
 * Check if the request is make directly or reffered from another page
 */
$http_referer = $_SERVER["HTTP_REFERER"];
if (!$http_referer) {    
    sazx_hlb_send_error( 403, "Not allowed", "Direct access to the resource is not allowed"  );
}



/**
 * Chech if the request reffered from a page which isthe same host
 */
$url = parse_url($http_referer);
$http_referer_host =  $url["host"];

if ($_SERVER["HTTP_HOST"] !== $http_referer_host) {
    sazx_hlb_send_error( 403, " Not allowed", "Your request is rejected for being requested from different host"  );
}


/**
 * Serve the file
 */

$document_root = $_SERVER["DOCUMENT_ROOT"];
$redirect_uri =   $_SERVER["REDIRECT_URL"];

if (!$redirect_uri) {
    sazx_hlb_send_error( 505, "Internal Error", "Internal error occured while trying to process your request" );
}

$fileName = $document_root . $redirect_uri;


/**
 * 
 * CHeck if the requested file exists
 */

if (!file_exists($fileName)) {
    sazx_hlb_send_error( 505, "File not found", "The requested file is not found on this server" );
}


/**
 * Send the file
 */

sazx_hlb_send_file( $fileName );
