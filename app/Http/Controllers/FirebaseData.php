<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;  
 use Kreait\Firebase\Factory;  
 use Kreait\Firebase\ServiceAccount;  
 use Kreait\Firebase\Database;   


class FirebaseData extends Controller
{
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase(); 
        // $ref = $database->getReference('Subjects');
        // $key = $ref->push()->getKey();
        // $ref->getChild('IdOrder')->set([
        //     'SubjectName' => 'ini test'
        // ]);

        $a = $database->getReference('Subjects')->getChildKeys(); 
        $array =array();

        foreach ($a as $key => $value) { 
            $w =$database->getReference('Subjects') 
                ->getChild($value)
                ->getChild("SubjectName")
                ->getValue(); 

              array_push($array,array("id" => $value,
              "subjectName" => $w )  ); 
        } 

        return  $array;
    }
}
