<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\SmsEmailNotification;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM as FCM;
use LaravelFCM\Message\Topics;

use App\Models\User;
use App\Models\Role;
use App\Models\SiteSetting;
use App\Models\Report;
use App\Models\Slider;

use Modules\Society\Entities\SocietyNotification;
use Modules\Society\Entities\Chat;

use App\Models\Configuration;
use App\Models\Notification;
use App\Models\Admin_Notification;
use App\Models\Inbox;
use App\Models\Setting;
use App\Models\Rate;
use App\Models\Social;

use App\Mail\ManagerMail;
use Carbon\Carbon;

// use Carbon;
// use DateTime;

use Illuminate\Support\Facades\DB;

function Home()
{

    $colors = [
        'bg-info',
        'bg-secondary',
        'bg-success',
        'bg-warning',
        'bg-danger',
        'bg-gray-dark',
        'bg-indigo',
        'bg-purple',
        'bg-fuchsia',
        'bg-pink',
        'bg-maroon',
        'bg-orange',
        'bg-lime',
        'bg-teal',
        'bg-olive',
    ];
    $home = [

        [
            'title' => 'عدد الرسائل ',
            'count' => Inbox::count(),
            'icon' => '<i class="fas fa-envelope"></i>',
            'color' => $colors[array_rand($colors)],
            'route' => 'inbox'
        ],
        [
            'title' => 'عدد المشرفين',
            'count' => User::count(),
            'icon' => '<i class="fas fa-address-book"></i>',
            'color' => $colors[array_rand($colors)],
            'route' => 'supervisors'
        ],

        [
            'title' => 'عدد الصلاحيات',
            'count' => Role::count(),
            'icon' => '<i class="fas fa-biohazard"></i>',
            'color' => $colors[array_rand($colors)],
            'route' => 'permissions'
        ],

        [
            'title' => 'عدد التقارير',
            'count' => Report::count(),
            'icon' => '<i class="fas fa-clipboard"></i>',
            'color' => $colors[array_rand($colors)],
            'route' => 'reports'
        ],

    ];

    return $blocks[] = $home;
}


#role name
function Role()
{
    $role = Role::findOrFail(Auth::user()->role);
    if ($role) {
        return $role->role;
    } else {
        return 'عضو';
    }
}


# report
function MakeReport($event)
{
    $report = new Report;
    $report->user_id = Auth::user()->id;
    $report->event = 'قام ' . Auth::user()->name . ' ' . $event;
    $report->save();
}


#current route
function currentRoute()
{
    $routes = Route::getRoutes();
    foreach ($routes as $value) {
        if ($value->getName() === Route::currentRouteName()) {
            if (isset($value->getAction()['title'])) {
                if (isset($value->getAction()['icon'])) {
                    if (session()->get('locale') == "en") {
                        echo $value->getAction()['icon'] . ' ' . $value->getAction()['title_en'];

                    } else {
                        echo $value->getAction()['icon'] . ' ' . $value->getAction()['title'];

                    }
                } else {
                    echo $value->getAction()['title'];
                }
                # echo $value->getAction()['icon'] ;
            }
            // return $value->getAction() ;
        }
    }
}

#email colors
function EmailColors()
{
    $html = Html::select('email_header_color', 'email_footer_color', 'email_font_color')->first();
    $setting = SiteSetting::first();
    return ['email' => $html, 'site_name' => $setting->site_name_ar];
}

# generate uniqe code
function UniqCode()
{
    $code = md5(uniqid(rand(), true));
    $array_code = str_split($code);
    return implode("", array_slice($array_code, 22));
}

#setting and html
function SettingAndHtml()
{
    $setting = SiteSetting::first();
    $html = Html::first();
    $SettingAndHtml = ['setting' => $setting, 'html' => $html];
    return $SettingAndHtml;
}

function CustomerStatus($status)
{
    if ($status == 0) {
        return '<span class="badge badge-danger">حظر</span>';
    } elseif ($status == 1) {
        return '<span class="badge badge-success">نشط</span>';
    }
}

function AccountType($type, $front = false)
{
    if ($type == 'person' && !$front) {
        return '<span class="badge badge-primary">فرد</span>';
    } elseif ($type == 'firm' && !$front) {
        return '<span class="badge badge-warning">منشأة</span>';
    }

    if ($type == 'person' && $front) {
        return 'فرد';
    } elseif ($type == 'firm' && $front) {
        return 'منشأة';
    }
}

function UserType($type)
{
    if ($type == 'user') {
        return '<span class="badge badge-success">مستخدم</span>';
    } elseif ($type == 'provider') {
        return '<span class="badge badge-primary">مقدم خدمة</span>';
    }
}

function EditPhoneFormat($num)
{
    $num = str_split($num);
    if ($num[0] != '9') {
        if ($num[0] == '0' && $num[1] == '5') {
            array_shift($num);
            $num = '966' . implode($num);
            return $num;
        } elseif ($num[0] == '0' && $num[1] == '0' && $num[2] == '9') {
            array_shift($num);
            array_shift($num);
            $num = implode($num);
            return $num;
        } elseif ($num[0] == '0' && $num[1] == '9') {
            array_shift($num);
            $num = implode($num);
            return $num;
        } elseif ($num[0] == '+' && $num[1] == '9') {
            array_shift($num);
            $num = implode($num);
            return $num;
        } elseif ($num[0] == '5') {
            $num = '966' . implode($num);
            return $num;
        } else {
            return implode($num);
        }
    } else {
        return implode($num);
    }
}

function send_mobile_sms($numbers, $msg)
{
    $url = 'http://api.yamamah.com/SendSMS';
    $fields = array(
        "Username" => "966543956641",
        "Password" => "new#nagez&5454",
        "Message" => $msg,
        "RecepientNumber" => $numbers,
        "ReplacementList" => "",
        "SendDateTime" => "0",
        "EnableDR" => False,
        "Tagname" => "Nagez",
        "VariableList" => "0"
    );

    $fields_string = json_encode($fields);

    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => $fields_string
    ));
    $result = curl_exec($ch);
    curl_close($ch);
}

function msegat_send_mobile_sms($numbers, $msg)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.msegat.com/gw/sendsms.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_POST, TRUE);

    $fields =
        [
            "userName" => "afta.sa",
            "numbers" => $numbers,
            "userSender" => "أفتى",
            "apiKey" => "0c160554daa9e2d670b29d2c6b9fe95c",
            "msg" => $msg
        ];
    $fields = json_encode($fields);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));

    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // var_dump($info["http_code"]);
    // var_dump($response);
    // return $response;
}


function OrderType($type, $front = true)
{
    if ($type == 'custom') {
        if ($front) {
//            return 'مخصص';
            return 'مميز';
        } else {
            return '<span class="badge badge-success">مميز</span>';
        }
    } elseif ($type == 'not_custom') {
        if ($front) {
//            return 'غير مخصص';
            return 'عام';
        } else {
            return '<span class="badge badge-primary">عام</span>';
        }
    }
}

function PayTypes($type = null)
{
    $arr = [
        '2' => 'دُفعتين',
        '1' => 'دُفعة واحدة',
        '0' => 'مجاني',
    ];

    if ($type === null) {
        return $arr;
    } else {

        foreach ($arr as $key => $value) {
            if ($key == $type) {
                return $value;
            }
        }
    }
}

function CalcOffer($offer)
{
    $setting = Setting::first();
    $tax_rate = $setting->tax_rate;
    $app_rate = $setting->app_rate;
    $tax_price = round($offer * $tax_rate / 100, 2);
    $app_price = round($offer * $app_rate / 100, 2);

    return $arr = [
        'tax_rate' => $tax_rate,
        'app_rate' => $app_rate,
        'tax_price' => $tax_price,
        'app_price' => $app_price,
        'total' => round($offer + $tax_price, 2),
        'profit' => round($offer - $app_price, 2),
    ];
}

function SendNotification($noti, $customer_id = null, $provider_id = null, $order_id = null)
{
    # store notification
    $not = new Notification;
    $not->noti = $noti;
    $not->customer_id = $customer_id;
    $not->provider_id = $provider_id;
    $not->order_id = $order_id;
    $not->save();
}

function SendAdminNotification($noti, $order_id = null)
{
    # store notification
    $not = new Admin_Notification;
    $not->noti = $noti;
    $not->order_id = $order_id;
    $not->save();
}

function MainArticles()
{
    return Article::take(6)->get();
}

function OrderStatus($num)
{
    if ($num == '0') {
        return 'طلب جديد';
    } elseif ($num == '1') {
        return 'تم تقديم عروض';
    } elseif ($num == '2') {
        return 'طلب جاري';
    } elseif ($num == '3') {
        return 'طلب منتهي';
    } elseif ($num == '4') {
        return 'طلب ملغي';
    }
}

function InboxUnreadCount()
{
    return Inbox::where('is_read', 0)->count();
}

function AdminNotification()
{
    # store notification
    $count = Admin_Notification::where('seen', '0')->count();
    $last = Admin_Notification::where('seen', '0')->take(7)->latest()->get();
    return $arr = [
        'count' => $count,
        'last' => $last,
    ];
}

function CustomerNotifications()
{
    if (Auth::guard('customer')->check()) {
        $notifications = Notification::where('customer_id', Auth::guard('customer')->user()->id)->where('created_at', '>', Carbon::now()->subDays(3))->latest()->take(5)->get();
    } else {
        $notifications = [];
    }
    return $notifications;
}

function ProviderRates()
{
    if (Auth::guard('provider')->check()) {
        $rates = Rate::with('Customer')->where('provider_id', Auth::guard('provider')->user()->id)
            ->latest();
    } else {
        $rates = [];
    }
    return $rates;
}

function Setting()
{
    return Setting::first();
}

function Social()
{
    return Social::get();
}

# send notification for users by tokens
function NotiByTokenUser($title, $body, $token, $data, $image)
{
    $fcm_server_key = 'AAAAcLp96-U:APA91bHcJKHtNhP8plDK6PPvm8wuACU1HhjoWYLirHhnOuJwVB2ayiFLJc35McgTJhHMTc8032qxC-OCjHWQ_OU3z8YAWPycyrma78e-4yl66tcYbtFW2UTtQfMmZjiUv3uc-htsqWx9	';

    $registrationIds = $token;

    // prep the bundle
    $msg = $data;

    $fields = array
    (
        'registration_ids' => $registrationIds,
        'data' => $msg,
        'priority' => 'high',
        'notification' => array(
            'title' => $title,
            'body' => $body,
            'image' => $image
        )
    );

    $headers = array
    (
        'Authorization: key=' . $fcm_server_key,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function CurrentAuth()
{

    if (auth()->guard('customer')->check()) {
        return [
            'get_class' => get_class(Auth::guard('customer')->user()),
            'path' => 'customers',
            'type' => 'customer',
            'user' => auth()->guard('customer')->user()
        ];
    } elseif (auth()->guard('provider')->check()) {
        return [
            'get_class' => get_class(Auth::guard('provider')->user()),
            'path' => 'providers',
            'type' => 'provider',
            'user' => auth()->guard('provider')->user()
        ];
    } else {
        return false;
    }
}

function SocietyNotification($noti, $post_id)
{
    $data = new SocietyNotification;
    $data->persnable_type = CurrentAuth()['get_class'];
    $data->persnable_id = CurrentAuth()['user']->id;
    $data->noti = $noti;
    $data->post_id = $post_id;
    $data->save();
}

function HomeChat()
{
    if (CurrentAuth()) {
        $chats = Chat::with('receiveable', 'sendable');
        $chats = $chats->where([
            ['sendable_id', CurrentAuth()['user']->id],
            ['sendable_type', CurrentAuth()['get_class']],
        ])->orWhere([
            ['receiveable_type', CurrentAuth()['get_class']],
            ['receiveable_id', CurrentAuth()['user']->id],
        ]);
        $chats = $chats->whereHas('receiveable')
            ->whereHas('sendable')
            ->latest()->get();
        return $chats;
    } else {
        return [];
    }
}
