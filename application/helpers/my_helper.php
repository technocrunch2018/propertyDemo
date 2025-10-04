<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
    }

    function whatsapp_login_otp($number = '', $otp = '')
    {
        $curl = curl_init();
        $arr = array(
                'template'=>"otp_2",
                'template_type'=>"text",
                'mobile_number'=>'91'. $number,
                'params'=>[$otp]
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://integration-api.snap.pe/rest/v1/merchants/propertyfellows/applications/918618085706/send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode( $arr ),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic MTg0NjEzNDA6ODE1YTQ3ZWMtYTNjZi00ZDQ0LTg3NTMtMWRjM2MwNmUzZTcz'
            ),
        ));
        
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    function whatsapp_sms($number = '', $name = '', $num = '', $email = '', $city = '', $link = '')
    {
        $curl = curl_init();
        $arr = array(
                'template'=>"utility_website",
                'template_type'=>"text",
                'mobile_number'=>'91'. $number,
                'params'=>[$name, $num, $email, $city, $link]
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://integration-api.snap.pe/rest/v1/merchants/propertyfellows/applications/918618085706/send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode( $arr ),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic MTg0NjEzNDA6ODE1YTQ3ZWMtYTNjZi00ZDQ0LTg3NTMtMWRjM2MwNmUzZTcz'
            ),
        ));
        
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    function allSMSSENT($number = '',$message = '', $tmpID = '')
    {
        $url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=eiyA3zGZ1U61MAFX5thi7A&senderid=YBROKR&channel=2&DCS=0&flashsms=0&number=91" . $number . "&text=" .  urlencode($message) . "&route=clickhere&EntityId=1501584940000046755&dlttemplateid=" . $tmpID;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
   
        curl_close($ch);
        return $result;
    }

    function sms_code_send($number='',$message='')
    {
        // $url = "https://www.smsgatewayhu.com/api/mt/SendSMS?APIKey=eiyA3zGZ1U61MAFX5thi7A&senderid=YBROKR&channel=2&DCS=0&flashsms=0&number=91" . $number . "&text=" .  urlencode($message) . "&route=clickhere&EntityId=1501584940000046755&dlttemplateid=1507165881366630387";
        $url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=eiyA3zGZ1U61MAFX5thi7A&senderid=YBROKR&channel=2&DCS=0&flashsms=0&number=91" . $number . "&text=" .  urlencode($message) . "&route=clickhere&EntityId=1501584940000046755&dlttemplateid=1507165881366630387";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
   
        curl_close($ch);
        return $result;
    }
    
    function sms_forgot_password($number='',$message='')
    {
        $url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=eiyA3zGZ1U61MAFX5thi7A&senderid=YBROKR&channel=2&DCS=0&flashsms=0&number=91" . $number . "&text=" .  urlencode($message) . "&route=clickhere&EntityId=1501584940000046755&dlttemplateid=1507165924278477605";
        // pre($url);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
   
        curl_close($ch);
        return $result;
    }
    
    function sms_register_password($number='',$message='')
    {
        $url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=eiyA3zGZ1U61MAFX5thi7A&senderid=YBROKR&channel=2&DCS=0&flashsms=0&number=91" . $number . "&text=" .  urlencode($message) . "&route=clickhere&EntityId=1501584940000046755&dlttemplateid=1507166046461194192";
        // pre($url);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
   
        curl_close($ch);
        return $result;
    }

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

if(!function_exists('dateFormat'))
{
    function dateFormat($format='d-m-Y', $givenDate=null)
    {
        return date($format, strtotime($givenDate));
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}
?>