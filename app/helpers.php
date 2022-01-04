<?php 

if(!function_exists('get_youtubeid')){

    function get_youtubeid($url){

        $ytcheck = preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $data);

        if($ytcheck){
            $id_video = $data[1];
        }
        return $id_video;
    }

}