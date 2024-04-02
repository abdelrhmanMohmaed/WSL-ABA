<?php

use Illuminate\Support\Facades\Route;
//
//Route::group(['middleware' => ['web','provider']], function() {
//    # home
//    Route::get('orders','front\provider\OrdersController@Orders')->name('provider.orders');
//    # order details ( ajax )
//    Route::get('order-details/{id}','front\provider\OrdersController@OrderDetails')->name('provider.order_details');
//
//    Route::get('single-order-details/{id}','front\provider\OrdersController@OrderDetails')->name('provider.single_order_details');
//
//    # wallet
//    Route::get('wallet','front\provider\WalletController@Index')->name('provider.wallet');
//    # invoice details
//    Route::get('invoice-details/{invoice_id}','front\provider\WalletController@InvoiceDetails')->name('provider.invoice_details');
//
//    # toggle noti status
//    Route::get('toggle-noti-status','front\provider\ProfileController@UpdateNotiStatus')->name('provider.toggle_noti_status');
//    # toggle receiving orders
//    Route::get('toggle-receiving-orders','front\provider\ProfileController@UpdateReceivingOrdersStatus')->name('provider.toggle_receiving_orders');
//    # update profile
//    Route::post('update-profile','front\provider\ProfileController@UpdateProfile')->name('provider.update_profile');
//
//    # send offer
//    Route::post('send-offer','front\provider\OffersController@SendOffer')->name('provider.send_offer');
//
//    # cancel offer
//    Route::get('cancel-offer/{order_id}','front\provider\OffersController@CancelOffer')->name('provider.cancel_offer');
//    # finish order
//    Route::post('finish-order','front\provider\OrdersController@FinishOrder')->name('provider.finish_order');
//    # cancel order
//    Route::post('cancel-order','front\provider\OrdersController@CancelOrder')->name('provider.cancel_order');
//    # send pay notification for customer
//    Route::get('send-pay-notification/{order_id?}','front\provider\OrdersController@SendPayNotification')->name('provider.send_pay_notification');
//    # remove notification
//    Route::get('remove-notification/{id}','front\provider\OrdersController@RemoveNotification')->name('provider.remove_notification');
//     # mark notifications as seen ( ajax )
//    Route::get('mark-notifications-seen','front\provider\HomeController@MakeNotificationsSeen')->name('provider.mark_notifications_seen');
//
//});
//
//Route::group(['middleware' => ['web']], function() {
//
//    # about
//    Route::get('about','front\provider\HomeController@About')->name('provider.about');
//    # faq
//    Route::get('faq','front\provider\HomeController@FAQ')->name('provider.faq');
//    # policy
//    Route::get('policy','front\provider\HomeController@Policy')->name('provider.policy');
//    # contact us
//    Route::get('contact-us','front\provider\HomeController@ContactUs')->name('provider.contact_us');
//    # send message
//    Route::post('send-message','front\provider\HomeController@SendMessage')->name('provider.send_message');
//
//    # articles details
//    Route::get('service-details/{id}','front\provider\ArticlesController@ArticleDetails')->name('provider.service_details');
//
//    # ------ provider login ------ #
//
//    # login
//    Route::get('login','front\provider\auth\LoginController@Login')->name('provider.login');
//    # check auth
//    Route::post('check-auth','front\provider\auth\LoginController@CheckAuth')->name('provider.check_auth');
//    # provider logout
//    Route::get('provider-logout','front\provider\auth\LoginController@Logout')->name('provider.provider_logout');
//
//    # ---------- provider register ---------- #
//
//    # check phone
//    Route::get('check-phone','front\provider\auth\RegisterController@CheckPhone')->name('provider.check_phone');
//    # send code
//    Route::post('check-phone-code','front\provider\auth\RegisterController@CheckPhoneCode')->name('provider.check_phone_code');
//    # verify code
//    Route::get('verify-code','front\provider\auth\RegisterController@VerifyCode')->name('provider.verify_code');
//    # check code
//    Route::post('check-code','front\provider\auth\RegisterController@CheckCode')->name('provider.check_code');
//    # register
//    Route::get('register','front\provider\auth\RegisterController@Register')->name('provider.register');
//    # store provider
//    Route::post('store-provider','front\provider\auth\RegisterController@Storeprovider')->name('provider.store_provider');
//
//    # ---------- provider forget password ---------- #
//
//    # forget password
//    Route::get('forget-password','front\provider\auth\PasswordController@Forget')->name('provider.forget');
//    # forget send code
//    Route::post('forget-send-code','front\provider\auth\PasswordController@ForgetSendCode')->name('provider.forget_send_code');
//    # verification code
//    Route::get('verification-code','front\provider\auth\PasswordController@Verification')->name('provider.verification');
//    # forget check code
//    Route::post('forget-check-code','front\provider\auth\PasswordController@ForgetCheckCode')->name('provider.forget_check_code');
//    # update password
//    Route::get('update-password','front\provider\auth\PasswordController@UpdatePassword')->name('provider.update_password');
//    # save new password
//    Route::post('save-new-password','front\provider\auth\PasswordController@SaveNewPassword')->name('provider.save_new_password');
//});
