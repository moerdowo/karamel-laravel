<?php namespace Totox777\Karamel;

class Karamel {

    public $apikey;
    public $memberid;
    public $GOTCHA_API_URL = 'http://ec2-54-254-171-93.ap-southeast-1.compute.amazonaws.com/API-031013/';

    public function __construct($apikeyin,$memberidin)
    {
        $this->apikey = $apikeyin;
        $this->memberid = $memberidin;
    }

    public function GetCaptcha(){
        $tp_member = array(
                "got_private_key" => md5($this->apikey),
                "got_user_id" => $this->memberid
            );
        $result = "<link rel='stylesheet' href='" . $this->GOTCHA_API_URL . "embed/css/front.css' type='text/css' />\n";
        $result.= "<link rel='stylesheet' href='" . $this->GOTCHA_API_URL . "embed/css/animatecss/animate.css' type='text/css' />\n";
        $result.= "<script>var bakpau =". json_encode($tp_member) .";</script>\n";
        $result.= "<script src='" . $this->GOTCHA_API_URL . "embed/js/jquery-1.9.1.min.js' type='text/javascript'></script>\n";
        $result.= "<script src='" . $this->GOTCHA_API_URL . "embed/js/jquerypp.custom.js' type='text/javascript'></script>\n";
        $result.= "<script src='" . $this->GOTCHA_API_URL . "embed/js/kinetic-v4.5.4.min.js' type='text/javascript'></script>\n";
        $result.= "<script src='" . $this->GOTCHA_API_URL . "embed/js/front.js' type='text/javascript'></script>\n";
        $result.= "<div id='captcha'></div>\n";
        $result.= "<input id='gotcha_val' name='gotcha_val' type='hidden' value=''>\n";
        
        echo $result;
    }
    
    public function ValidateCaptcha($responseValue){
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->GOTCHA_API_URL .'/embed/gogetgotcha/validate.php',
            //CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'responseValue' => $responseValue,
            )
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        if($resp == 1){
            return true;
        }
        else{
            return false;
        }
    }

}