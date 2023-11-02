<?php

namespace App\Http\Controllers;

use App\Models\WhatsappHistory;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public
    function sendWhatsapp($mobile, $msg, $type = 'graph', $token = 'Tabibfind', $instanceId = 'Tabibfind', $options = 0, $type2 = 0, $lnk = 0)
    {

        try {


            if (true) {


                if ($instanceId == "Tabibfind") {
                    $version = env('tf_version', 0);
                    $phoneID = env('tf_phoneID', 0);
                    $tokenWHGraph = env('tf_token', 0);
                } else {
                    return 111;
                }
                $template = "welcome";

                $url = "https://graph.facebook.com/$version/$phoneID/messages";
                $client = new Client(['headers' => ['Content-Type' => 'application/json', 'Authorization' => "Bearer $tokenWHGraph"]]);
                if ($type2 == 0 && !str_contains($instanceId, 'FB')) {
                    if (WhatsappHistory::checkNewChat($mobile, $instanceId))
                        $data = ["messaging_product" => "whatsapp", "to" => $mobile, "text" => ["body" => $msg]];
                    else
                        $data = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "template", "template" => ["name" => $template, "language" => ["code" => "ar"], "components" => [["type" => "body", "parameters" => [["type" => "text", "text" => $msg]]]]]];

                } else if ($type2 == "1") {

                    $sections = [["title" => "", "rows" => $options]];

                    $data = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "interactive", "interactive" => ["type" => "list", "body" => ["text" => $msg], "action" => ["button" => "اختر من القائمة", "sections" => $sections]]];

                } else if ($type2 == "2") {
                    $template = "appointment3";

                    $data = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "template", "template" => ["name" => $template, "language" => ["code" => "ar"], "components" => [["type" => "body", "parameters" => [["type" => "text", "text" => $msg]]], ["type" => "button", "sub_type" => "url", "index" => "0", "parameters" => [["type" => "text", "text" => $lnk]]]]]];
                } else if ($type2 == "3") {
                    $template = "welcome";

                    $data = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "template", "template" => ["name" =>$template, "language" => ["code" => "ar"], "components" => [["type" => "body", "parameters" => [["type" => "text", "text" => $msg]]]]]];
                } else if (str_contains($instanceId, 'FB')) {

                    $data = ["recipient" => ["id" => $mobile], "messaging_type" => "RESPONSE", "message" => ["text" => $msg]];
                }
                // return $data;

            }
            $response = $client->post(
                $url,
                ['form_params' => $data]
            );


            $d = json_decode($response->getBody(), true);
            // return $d;
            if (count($d["messages"]) || str_contains($instanceId, 'FB')) {
                $w = new WhatsappHistory();
                $w->body = $msg;
                $w->fromMe = 1;
                $w->wid = str_contains($instanceId, 'FB') ? strtotime(date('Y-m-d H:i:s')) : $d["messages"][0]["id"];
                $w->isForwarded = 0;
                $w->time = strtotime(date('Y-m-d H:i:s'));
                $w->chatId = $mobile;
                $w->type = 'chat';
                $w->senderName = $instanceId;
                $w->chatName = $mobile;
                $w->instance_name = $instanceId;
                $w->metadata = json_encode($d);
                $w->save();
                return 1;
            }


            return 1;
        } catch (Exception $ex) {

            return 0;
            //return $ex->getMessage();
        }
        return 0;
    }
    public function filterArrayForNullValues($array)
    {
        $filteredArray = array_filter($array, function ($value) {
            return $value !== null;
        });
        return $filteredArray;
    }


    public
    function sendWhatsappFile($mobile, $file, $file_name, $type = "0", $token = 'Tabibfind', $instanceId = 'Tabibfind', $caption = "", $type2 = 0)
    {
        try {

            if ($instanceId == "Tabibfind") {
                $version = env('tf_version');
                $phoneID = env('tf_phoneID');
                $tokenWHGraph = env('tf_token');
            }

            $url = "https://graph.facebook.com/$version/$phoneID/messages";
            $urll = $file;
            $client = new Client(['headers' => ['Content-Type' => 'application/json', 'Authorization' => "Bearer $tokenWHGraph"]]);

            if (str_contains($instanceId, "FB")) {
                $data = ["recipient" => ["id" => $mobile], "messaging_type" => "RESPONSE", "message" => ["attachment" => ["type" => "file","filename"=>$file_name, "payload" => ["url" => $urll, "is_reusable" => "true"]]]];
            } else if (WhatsappHistory::checkNewChat($mobile, $instanceId) && $type2 != 2)
                $data = ["messaging_product" => "whatsapp", "recipient_type" => "individual", "to" => $mobile, "type" => "document", "document" => ["caption" => $caption ? $caption : $file_name, "link" => $file,"filename"=>$file_name]];
            else {
                $template = "welcome";

                $data2 = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "template", "template" => ["name" => $template, "language" => ["code" => "ar"], "components" => [["type" => "body", "parameters" => [["type" => "text", "text" => "الرجاء معاينة المرفق"]]]]]];

                $file = trim($file, 'https://crm.developon.co/');
                $template = "appointment3";

                $data = ["messaging_product" => "whatsapp", "to" => $mobile, "type" => "template", "template" => ["name" => $template, "language" => ["code" => "ar"], "components" => [["type" => "body", "parameters" => [["type" => "text", "text" => $file_name]]], ["type" => "button", "sub_type" => "url", "index" => "0", "parameters" => [["type" => "text", "text" => trim($file, 'https://crm.opts.expert/')]]]]]];


            }


            $response = $client->post(
                $url,
                ['form_params' => $data]
            );

            $d = json_decode($response->getBody(), true);

            try {
                if (count($d["messages"]) || str_contains($instanceId, 'FB')) {
                    $w = new WhatsappHistory();
                    $w->body = $urll;
                    $w->fromMe = 1;
                    $w->wid = str_contains($instanceId, 'FB') ? strtotime(date('Y-m-d H:i:s')) : $d["messages"][0]["id"];
                    $w->isForwarded = 0;
                    $w->time = strtotime(date('Y-m-d H:i:s'));
                    $w->chatId = $mobile;
                    $w->type = 'image';
                    $w->senderName = $instanceId;
                    $w->chatName = $mobile;
                    $w->instance_name = $instanceId;
                    $w->save();
                } else if ($d["sent"]) {
                    $message = $d["sent"] . " message: " . $d["message"] . " id : " . $d["id"] . " queueNumber: " . $d["queueNumber"] . " ";
                }
            } catch (\Exception $ex) {
                $message = "  wrong mobile: " . $mobile;

                return 0;
            }
            return 1;
        } catch (Exception $ex) {
            return $ex->getMessage();
            return 0;
        }
        return 1;
    }

    public function editButton($route, $className)
    {
        return '<a href="' . $route . '" class="btn btn-icon btn-active-light-primary w-30px h-30px ' . $className . '">
                <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                </svg>
                </span>
                </a>';
    }

    public function deleteButton($route, $className, $attribute)
    {
        return '<a ' . $attribute . ' href=' . $route . ' class="btn btn-icon btn-active-light-primary w-30px h-30px ' . $className . '"
                    >
                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>';
    }
}
