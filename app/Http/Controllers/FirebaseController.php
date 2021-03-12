<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;  
 use Kreait\Firebase\Factory;  
 use Kreait\Firebase\ServiceAccount;  
 use Kreait\Firebase\Database;   

class FirebaseController extends Controller
{
    public function index(){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase(); 
        $ref = $database->getReference('Subjects');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'SubjectName' => 'ini test'
        ]);
        return $key;
    }
}
