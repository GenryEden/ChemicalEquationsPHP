<?php
function ChemEquation($reaction){
    $chemical_response['s'] = $reaction;
    $chemical_request = file_get_contents('http://chemequations.com/ru/?'.http_build_query($chemical_response));
    // file_put_contents('enter.txt',$chemical_request);
    $more = explode('<title>',$chemical_request);
    $more = explode('</title>',$more[1]);
    if(strpos($more[0],'?') === false){
        $more = explode('-',$more[0]);
        $me55age = str_replace('&rarr;','-->',$more[0]);
        if($me55age == 'Химические Уравнения oнлайн!'){
            $me55age = 'Unknown reaction!';
        }
    } else {
        $more = explode('?s=',$chemical_request);
        // $more = explode('<a href="',$more[1]);
        $more = explode('">',$more[12]);
        $more = explode('&amp;',$more[0]);
        $chemical_response = 'http://chemequations.com/en/?s='.$more[0];
        $chemical_request = file_get_contents('http://chemequations.com/en/?s='.$more[0]);
        // file_put_contents('enter.txt',$chemical_request);
        $more = explode('<title>',$chemical_request);
        $more = explode('</title>',$more[1]);
        $more = explode('-',$more[0]);
        $me55age = str_replace('&rarr;','-->',$more[0]);
    }
return $me55age;
}
?>
