<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnResponse($status = true, $message = null, $error_code = null, $error_msg = null, $data = [], $metaParams = null, $httpStatus = 200)
    {
        if(blank($data) && $message=="Data fetched successfully"){
            $resMessage = trans("message.successMsgs.NO_DATA");
        }else{
            $resMessage = $message;
        }
        return response()->json(["status" => $status, "message" => $resMessage, "error_code" => $error_code, "error_msg" => $error_msg, "data" => $data, "meta_params" => $metaParams], $httpStatus);
    }
}
