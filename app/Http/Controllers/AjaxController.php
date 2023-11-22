<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{
public function get_features_amenities(){
$features_amenities = DB::table('features_amenities')->get();   
    return response()->json($features_amenities);
    
}
public function get_category(){
$categories = DB::table('p_categories')->get();   
    return response()->json($categories);
    
}
public function get_listing_type(){
$p_listing_type = DB::table('p_listing_type')->get();   
    return response()->json($p_listing_type);
    
}



public function get_construction_status(){
$construction_status = DB::table('p_construction_status')->get();   
    return response()->json($construction_status);
    
}


public function get_country(){
$construction_status = DB::table('p_countries')->get();   
    return response()->json($construction_status);
    
}

public function get_city( Request $request){
    
    $country_id = $request['country_id'];
$construction_status = DB::table('p_cities')->where('country_id','=',$country_id)->get();   
    return response()->json($construction_status);
    
}
public function get_ai_img_generation(Request $request ){
    return "hello";
    
    
    
    
}
public function updated_img_delete(Request $request){
    $img_name = $request->filename;
    DB::table('property_img')->where('img', $img_name)->delete();
    return $img_name;
}

public function getAiRendering(Request $request)
{
    $str1 = $request['BrTyp'];
    $str2 = $request['BrTyp1'];

    $prompt_value = $request['prompt_text'];
    if ($prompt_value == "") {
        $string = ["redesign with $str2 inspired decor of $str1", "redesign with $str2 inspired decor of $str1", "transform your $str1 for a fresh stylish and $str2 look", "redesign $str1 with a $str2 design", "elevate the style of your $str1 with $str2 sophistication", "amplify the comfort of your $str1 theater with $str2 amenities", "enhance the vitality of your $str1 with $str2 design"];
        $rand_keys = array_rand($string, 2);
        $prompt_value = $string[$rand_keys[0]];
    } else {
        $prompt_value = $request['prompt_text'];
    }
    $prompt = strtolower($prompt_value);

    $img = $request->file('file');
    $filename = $img->getClientOriginalName();
    $img->store("property_imgs");

    $images_array = [];
    $name = urlencode($filename);
    $selected_img = 'https://bazhouse.com/ai_rendering/image/' . $name;
    $selected_img = str_replace(" ", "%20", $selected_img);

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://stablediffusionapi.com/api/v5/interior',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "key": "IWyhskcSVQVQhaNpeK02F6DaDEnxWFcgzMyjGeEC8z7hRpWLIvmcOgQmeH0G",
            "init_image" :  "' . $selected_img . '",
            "prompt" : "' . $prompt . '",
            "steps" : 50,
            "guidance_scale" : 7,
            "samples" : 1
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $get_data = json_decode($response, true);
    $success = $get_data['status'];

    if ($success == 'success') {
        foreach ($get_data['output'] as $created_imges) {
            $created_imges = str_replace('\/', '/', $created_imges);
            $success_data = "<img class='ai_image_orignal' onclick='image_srec_get()' style='border-radius: 20px; width:100%;' id='base64image' src='$created_imges' />";
            $s_data = ["img" => $success_data];
            array_push($images_array, $s_data);
        }
        echo json_encode($images_array);
    }

    $fetch_result = $get_data['fetch_result'];
    $fetch_result = str_replace('\/', '/', $fetch_result);
    while ($success == 'processing') {
        sleep(2);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $fetch_result,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "key": "IWyhskcSVQVQhaNpeK02F6DaDEnxWFcgzMyjGeEC8z7hRpWLIvmcOgQmeH0G",
                "init_image" :  "' . $selected_img . '",
                "prompt" : "' . $prompt . '",
                "steps" : 50,
                "guidance_scale" : 7
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $get_data = json_decode($response, true);
        $success = $get_data['status'];

        if ($success == 'success') {
            foreach ($get_data['output'] as $created_imges) {
                $created_imges = str_replace('\/', '/', $created_imges);
                $success_data = '<img class="ai_image_orignal" onclick="image_srec_get()" style="border-radius: 20px; width: 100%;" id="base64image" src="' . $created_imges . '" />';
                $s_data = ["img" => $success_data];
                array_push($images_array, $s_data);
                echo json_encode($images_array);
            }
        }
    }

    if ($success == 'failed') {
        $message_failed = $get_data['error_log']['response']['message'];
        $success_data = '<div class="" role="alert" style="width:100% !important; padding-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.900.995l-.350 3.507a.552.552 0 0 1-1.1 0L7.100 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <br>
            <br>
            Please upload the correct image format or select valid values! ' . $message_failed . '
            <br>
        </div>';
        $s_data = ["error" => $success_data];
        array_push($images_array, $s_data);
        echo json_encode($images_array);
    }

    if ($success == 'error') {
        $success_data = '<div class="" role="alert" style="width:100% !important;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <br>
            <br>
            Please upload the correct image format or select valid values! ' . $message_failed . '
        </div>';
        $s_data = ["error" => $success_data];
        array_push($images_array, $s_data);
        echo json_encode($images_array);
    }
}

}
