<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;



class PropertyController extends Controller
{
    public function add_property(Request $property)
    {
        $images = $property->file("images");
        //   dd($property);
        $ai_images = "";

        if (is_array($images) && count($images) > 0) {
            foreach ($images as $image) {
                $file_name =
                    rand() .
                    time() .
                    "property." .
                    $image->getClientOriginalExtension();
                $image->storeAs("property_imgs", $file_name);
            }
        }else{
            $file_name ="14517985731699002963property.webp";
        }

        $current_date = date("y-m-d");
        $userId = Auth::id();
        
        // dd($property);
        
         if (isset( $property["title"],$property["price"],$property["address"],$property["country"],$property["Size"],$property['city_id'],$property["Bedrooms"],$property["Rooms"],$property["Zip"])) {
        $city_id = $property["city_id"];
        $city_data = DB::table("p_cities")
            ->where("id", $city_id)
            ->first();
        $p_city_name = $city_data->name;

        $data = [
            "title" => $property["title"],
            "price" => $property["price"],
            "main_image" => $file_name,
            "country" => $property["country"],
            "city_id" => $city_id,
            "city" => $p_city_name,
            "address_1" => $property["address"],
            "postal_code" => $property["Zip"],
            "area_sqft" => $property["Size"],
            "bedrooms" => $property["Bedrooms"],
            "bath" => $property["Bathrooms"],
            "property_type" => $property["structure_type"],
            "floors_no" => $property["Floors_no"],
            "description" => $property["message"],
            "creation_date" => $current_date,
            "created_by" => $userId,
        ];

        $lastInsertedId = DB::table("properties")->insertGetId($data);
     if (!$lastInsertedId) {
            echo "Data inserting failed";
        }
        if($property["amenities"]){

        $amenities = $property["amenities"];
        foreach ($amenities as $amenity) {
            $users = DB::table("properties_features_amenities")->insert([
                "property_id" => $lastInsertedId,
                "feature_id" => $amenity,
            ]);
        }}
        if($property["selected_category"]){
        $selected_category = $property["selected_category"];

        foreach ($selected_category as $category) {
            $users = DB::table("properties_categories")->insert([
                "properties_id" => $lastInsertedId,
                "categories_id" => $category,
            ]);
        }}
        if($property["linst_in"]){
        $selected_linst_in = $property["linst_in"];
        foreach ($selected_linst_in as $linst_in) {
            $users = DB::table("properties_list_in")->insert([
                "properties_id" => $lastInsertedId,
                "list_in_id" => $linst_in,
            ]);
        }}
        if($property["construction_status"]){
        $construction_status_list = $property["construction_status"];
        foreach ($construction_status_list as $construction_status) {
            $users = DB::table("construction_status")->insert([
                "property_id" => $lastInsertedId,
                "construction_id" => $construction_status,
            ]);
        }}
        $images = $property->file("images");
        if (is_array($images) && count($images) > 0) {
            foreach ($images as $image) {
                $file_name =
                    rand() .
                    time() .
                    "property." .
                    $image->getClientOriginalExtension();
                $image->storeAs("property_imgs", $file_name);
                DB::table("property_img")->insert([
                    "img" => $file_name,
                    "property_id" => $lastInsertedId,
                ]);
            }
        }
        $ai_image_name_time = time();
        $ai_images = $property["ai_generated_images"];
        $imageUrls = explode(",", $ai_images);
        $imag_ai_i = 0;
        if($imageUrls){
        foreach ($imageUrls as $imageUrl) {
            if ($imageUrl !== "") {
                //   dd($imageUrl);
                $ai_image = file_get_contents($imageUrl);
                $ai_image_name =
                    $ai_image_name_time . "_" . $imag_ai_i . ".png";

                file_put_contents(
                    "../storage/app/public/property_imgs/$ai_image_name",
                    $ai_image
                );

                DB::table("property_img")->insert([
                    "img" => "$ai_image_name",
                    "type" => "ai_generated_image",
                    "property_id" => $lastInsertedId,
                ]);
            }
            $imag_ai_i = $imag_ai_i + 1;
        }
            
        }
            return redirect("properties");
        }
   
        else{
             $property->session()->flash("success", "Please fill the required fields");

             return redirect("add_property");
        }
        
    }

    public function all_properties()
    {
        $all_properties = DB::table("properties")
            ->orderBy("id", "desc")
            ->paginate(50);

        return view("properties/all_property", [
            "properties" => $all_properties,
        ]);
    }

    public function get_properties_details($id)
    {
        $data = DB::table("properties")
            ->where("properties.id", $id)
            ->get();
        $categories = DB::table("p_categories")->get();
        // dd($data);

        $property = json_decode($data, true);

        return view("properties/edit_property", [
            "property" => $property,
            "categories" => $categories,
        ]);
    }

    public function property_update(Request $property, $id)
    {
        // dd($property);

        $ai_image_name_time = time();

        DB::table("properties_list_in")
            ->where("properties_id", $id)
            ->delete();
        DB::table("construction_status")
            ->where("property_id", $id)
            ->delete();
        DB::table("properties_categories")
            ->where("properties_id", $id)
            ->delete();
        DB::table("properties_features_amenities")
            ->where("property_id", $id)
            ->delete();

        
        $current_date = date("y-m-d");
        $userId = Auth::id();
        // $city_id = $property["city_id"];
        // $city_data = DB::table("p_cities")
        //     ->where("id", $city_id)
        //     ->first();
        // $property_name = $city_data->name;
        
        
         $images = $property->file("images");
        //   dd($property);
         $ai_images = "";

        if (is_array($images) && count($images) > 0) {
            foreach ($images as $image) {
                $file_name =
                    rand() .
                    time() .
                    "property." .
                    $image->getClientOriginalExtension();
                $image->storeAs("property_imgs", $file_name);
                
                DB::table("property_img")->insert([
                    "img" => "$file_name",
                    "property_id" => $id,
                ]);
            }
          }else{
            $users = DB::table('properties')->where('id',$id)->get(['main_image']);
            $main_img = json_decode($users, true);
            $file_name  = $main_img[0]['main_image'];

          }
       if (!empty($property["title"]) && !empty($property["price"]) && !empty($property["Address"]) && !empty($property["selected_country"]) && !empty($property["size"]) && !empty($property['city_id']) && !empty($property["rooms"]) && !empty($property["rooms"]) && !empty($property["zip"])) {
        
               $city_id = $property["city_id"];
              $city_data = DB::table("p_cities")
            ->where("id", $city_id)
            ->first();
             $property_name = $city_data->name;
        
        
            $data = DB::table("properties")
            ->where("id", $id)
            ->update([
                "title" => $property["title"],
                "price" => $property["price"],
                "country" => $property["selected_country"],
                "city_id" => $city_id,
                 "main_image" => $file_name,
                "city" => $property_name,
                "address_1" => $property["Address"],
                "postal_code" => $property["zip"],
                "area_sqft" => $property["size"],
                "bedrooms" => $property["rooms"],
                "bath" => $property["bathrooms"],
                "property_type" => $property["Structure_type"],
                "floors_no" => $property["floors_no"],
                "description" => $property["message"],
                "creation_date" => $current_date,
                "created_by" => $userId,
            ]);
        
    
         if($property["amenities"]){
        $amenities = $property["amenities"];
        foreach ($amenities as $amenity) {
            $users = DB::table("properties_features_amenities")->insert([
                "property_id" => $id,
                "feature_id" => $amenity,
            ]);
        }
             
         }
         
         
         
        if($property["selected_category"]){
        $selected_category = $property["selected_category"];

        foreach ($selected_category as $category) {
            $users = DB::table("properties_categories")->insert([
                "properties_id" => $id,
                "categories_id" => $category,
            ]);
        }}
        
        
        if($property["list_in"]){
        $selected_linst_in = $property["list_in"];
        foreach ($selected_linst_in as $linst_in) {
            $users = DB::table("properties_list_in")->insert([
                "properties_id" => $id,
                "list_in_id" => $linst_in,
            ]);
        }}
        
        
        if($property["construction_status"]){
        $construction_status_list = $property["construction_status"];
        foreach ($construction_status_list as $construction_status) {
            $users = DB::table("construction_status")->insert([
                "property_id" => $id,
                "construction_id" => $construction_status,
            ]);
        }
        
        }
        
        $ai_images = $property["ai_generated_images"];
        $imageUrls = explode(",", $ai_images);

        $imag_ai_i = 0;
        foreach ($imageUrls as $imageUrl) {
            if ($imageUrl !== "") {
                //   dd($imageUrl);
                $ai_image = file_get_contents($imageUrl);
                $ai_image_name =
                    $ai_image_name_time . "_" . $imag_ai_i . ".png";

                file_put_contents(
                    "../storage/app/public/property_imgs/$ai_image_name",
                    $ai_image
                );

                DB::table("property_img")->insert([
                    "img" => "$ai_image_name",
                    "type" => "ai_generated_image",
                    "property_id" => $id,
                ]);
            }
            $imag_ai_i = $imag_ai_i + 1;
        }
        




        $property->session()->flash("success", "Property updated successfully");

        return redirect("properties");
            
        }
        else{
            $property->session()->flash("success", "Please fill the required fields");
             return redirect("edit_property/{$id}");
            
        }
    }

    public function del_property(Request $property, $id)
    {
        // Delete the records
        DB::table("properties")
            ->where("id", $id)
            ->delete();
        DB::table("properties_list_in")
            ->where("properties_id", $id)
            ->delete();
        DB::table("construction_status")
            ->where("property_id", $id)
            ->delete();
        DB::table("properties_categories")
            ->where("properties_id", $id)
            ->delete();
        DB::table("properties_features_amenities")
            ->where("property_id", $id)
            ->delete();


        $property = DB::table('property_img')->where('property_id', $id)->first();

        if ($property) {
            $filePath = 'property_imgs/' . $property->img;
            Storage::delete($filePath);

            $deleted_property_img = DB::table("property_img")
                ->where("property_id", $id)
                ->delete();
        }




        // $property->session()->flash("success", "Property deleted successfully");

        return redirect("properties");
    }
}