<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Components;

use function response;

/**
 * Description of AbstractResource
 *
 * @author brindachanchad
 */
abstract class AbstractResource {
   
    const SUCCESS = true;
    const ERROR = false;
    
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => self::SUCCESS,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => self::ERROR,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
