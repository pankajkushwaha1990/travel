<?php

Route::get('/', function () { return view('public.welcome'); });
Route::get('/login', function () { return view('public.login'); });
Route::post('/login-submit', 'PublicController@login_submit');
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/logout',function(){ session()->flush(); return redirect('login'); });
Route::get('/category-list', 'AdminController@category_list');
Route::get('/category-create', 'AdminController@category_create');
Route::post('/category-create-submit', 'AdminController@category_create_submit');
Route::get('/category-change-status/{status}/{id}', 'AdminController@category_change_status');
Route::get('/category-edit/{id}', 'AdminController@category_edit');
Route::post('/category-edit-submit', 'AdminController@category_edit_submit');
Route::get('/category-delete/{id}', 'AdminController@category_delete');
Route::get('/itinerary-list', 'AdminController@itinerary_list');
Route::get('/itinerary-create', 'AdminController@itinerary_create');
Route::post('/itinerary-create-submit', 'AdminController@itinerary_create_submit');
Route::get('/itinerary-change-status/{status}/{id}', 'AdminController@itinerary_change_status');
Route::get('/ajax-state-details-by-country_id', 'AdminController@ajax_state_details_by_country_id');
Route::get('/ajax-city-details-by-state_id', 'AdminController@ajax_city_details_by_state_id');
Route::get('/ajax-iternary-details-by-category_id', 'AdminController@ajax_iternary_details_by_category_id');
Route::get('/itinerary-edit/{id}', 'AdminController@itinerary_edit');
Route::post('/itinerary-edit-submit', 'AdminController@itinerary_edit_submit');
Route::get('/package-banner-change-status/{status}/{id}', 'AdminController@package_banner_change_status');
Route::get('/package-hot-place-change-status/{status}/{id}', 'AdminController@package_hot_place_change_status');























Route::get('/package-list', 'AdminController@package_list');
Route::get('/package-create', 'AdminController@package_create');
Route::post('/package-create-submit', 'AdminController@package_create_submit');
Route::get('/package-change-status/{status}/{id}', 'AdminController@package_change_status');
Route::get('/amenities-list', 'AdminController@amenities_list');

Route::get('/amenities-create', 'AdminController@amenities_create');
Route::post('/amenities-create-submit', 'AdminController@amenities_create_submit');
Route::get('/amenities-change-status/{status}/{id}', 'AdminController@amenities_change_status');
Route::get('/amenities-edit/{id}', 'AdminController@amenities_edit');
Route::post('/amenities-edit-submit', 'AdminController@amenities_edit_submit');
Route::get('/amenities-delete/{id}', 'AdminController@amenities_delete');
Route::get('/flight-list', 'AdminController@flight_list');
Route::get('/flight-create', 'AdminController@flight_create');
Route::post('/flight-create-submit', 'AdminController@flight_create_submit');
Route::get('/flight-change-status/{status}/{id}', 'AdminController@flight_change_status');
Route::get('/flight-edit/{id}', 'AdminController@flight_edit');
Route::post('/flight-edit-submit', 'AdminController@flight_edit_submit');
Route::get('/flight-delete/{id}', 'AdminController@flight_delete');
Route::get('/coupon-list', 'AdminController@coupon_list');
Route::get('/coupons-change-status/{status}/{id}', 'AdminController@coupons_change_status');
Route::get('/coupons-edit/{id}', 'AdminController@coupons_edit');
Route::post('/coupon-edit-submit', 'AdminController@coupon_edit_submit');
Route::get('/coupons-delete/{id}', 'AdminController@coupons_delete');
Route::get('/coupons-create', 'AdminController@coupons_create');
Route::post('/coupon-create-submit', 'AdminController@coupon_create_submit');
Route::get('/users-list', 'AdminController@users_list');
Route::get('/user-create', 'AdminController@user_create');
Route::post('/user-create-submit', 'AdminController@user_create_submit');
Route::get('/user-change-status/{status}/{id}', 'AdminController@user_change_status');
Route::get('/user-package-create', 'AdminController@user_package_create');
Route::get('/ajax-user-details-by-id', 'AdminController@ajax_user_details_by_id');
Route::get('/ajax-package-details-by-id', 'AdminController@ajax_package_details_by_id');
Route::post('/user-package-create-submit', 'AdminController@user_package_create_submit');
Route::get('/user-booked-package-list', 'AdminController@user_booked_package_list');
Route::get('/user-cancel-package-list', 'AdminController@user_cancel_package_list');
Route::get('/users-package-pay-pending-list', 'AdminController@users_package_pay_pending_list');
Route::post('/user-package-payment-create-submit', 'AdminController@user_package_payment_create_submit');
Route::get('/purchased-package-report-list', 'AdminController@purchased_package_report_list');
Route::get('/purchased-user-report-list', 'AdminController@purchased_user_report_list');
Route::get('/transaction-history-report-list', 'AdminController@transaction_history_report_list');



















































Route::get('/forget-password', function () {
    return view('public.forget-password');
});

Route::get('/set-new-password/{id}', function ($id) {
    return view('public.set-new-password')->with(array('email'=>$id));
});




Route::post('/forget-password-submit', 'PublicController@forget_password_submit');
Route::post('/set-new-password-submit', 'PublicController@set_new_password_submit');
Route::get('/update-profile', 'AdminController@update_profile');
Route::post('/update-profile-submit', 'AdminController@update_profile_submit');
Route::get('/change-password', 'AdminController@change_password');
Route::post('/change-password-submit', 'AdminController@change_password_submit');
Route::get('/member-list', 'AdminController@member_list');
Route::get('/member-create', 'AdminController@member_create');
Route::post('/member-create-submit', 'AdminController@member_create_submit');
Route::get('/member-assign-menu/{id}', 'AdminController@member_assign_menu');
Route::post('/member-assign-menu-submit', 'AdminController@member_assign_menu_submit');
Route::get('/setting-list', 'AdminController@setting_list');
Route::get('/setting-edit/{id}', 'AdminController@setting_edit');
Route::post('/setting-edit-submit', 'AdminController@setting_edit_submit');
Route::get('/course-list', 'AdminController@course_list');
Route::get('/course-create', 'AdminController@course_create');
Route::post('/course-create-submit', 'AdminController@course_create_submit');
Route::get('/course-edit/{id}', 'AdminController@course_edit');
Route::post('/course-edit-submit', 'AdminController@course_edit_submit');
Route::get('/course-delete/{id}', 'AdminController@course_delete');
Route::get('/member-edit/{id}', 'AdminController@member_edit');
Route::post('/member-edit-submit', 'AdminController@member_edit_submit');
Route::get('/member-delete/{id}', 'AdminController@member_delete');
Route::get('/student-list', 'AdminController@student_list');
Route::get('/student-create', 'AdminController@student_create');
Route::post('/student-create-submit', 'AdminController@student_create_submit');
Route::get('/student-edit/{id}', 'AdminController@student_edit');
Route::post('/student-edit-submit', 'AdminController@student_edit_submit');
Route::get('/student-view/{id}', 'AdminController@student_view');
Route::post('/student-status-change', 'AdminController@student_status_change');
Route::post('/student-mail-send', 'AdminController@student_mail_send');
Route::get('/student-delete/{id}', 'AdminController@student_delete');
Route::get('/student-export', 'AdminController@student_export');
Route::post('/student-export-submit', 'AdminController@student_export_submit');
Route::get('/student-export/{id}', 'AdminController@student_export');
Route::get('/student-assign-id', 'AdminController@student_assign_id');
Route::get('/student-assign-edit/{id}', 'AdminController@student_assign_edit');
Route::post('/student-assign-edit-submit', 'AdminController@student_assign_edit_submit');
Route::get('/student-offer-letter-list', 'AdminController@student_offer_letter_list');
Route::get('/student-offer-edit/{id}', 'AdminController@student_offer_edit');
Route::post('/student-offer-edit-submit', 'AdminController@student_offer_edit_submit');
Route::get('/student-offer-letter-view/{id}', 'AdminController@student_offer_letter_view');
Route::get('/initial-payment-list', 'AdminController@initial_payment_list');
Route::get('/initial-payment-add', 'AdminController@initial_payment_add');
Route::post('/initial-payment-add-submit', 'AdminController@initial_payment_add_submit');
Route::get('/initial-payment-upload', 'AdminController@initial_payment_upload');
Route::post('/initial-payment-upload-submit', 'AdminController@initial_payment_upload_submit');
Route::get('/student-approval-list', 'AdminController@student_approval_list');
Route::get('/student-approval-change-status/{id}', 'AdminController@student_approval_change_status');
Route::post('/student-approval-change-status-submit', 'AdminController@student_approval_change_status_submit');
Route::get('/agent-commision-list', 'AdminController@agent_commision_list');
Route::get('/initial-payment-edit/{id}', 'AdminController@initial_payment_edit');
Route::post('/initial-payment-edit-submit', 'AdminController@initial_payment_edit_submit');
Route::get('/initial-payment-delete/{id}', 'AdminController@initial_payment_delete');
Route::get('/agent-commision-change-payment-status/{id}/{status}', 'AdminController@agent_commision_change_payment_status');
Route::get('/request-for-invoice', 'AdminController@request_for_invoice');
Route::get('/report-list', 'AdminController@report_list');
Route::get('/report-list-details/{id}', 'AdminController@report_list_details');
Route::get('/report-single', 'AdminController@report_single');
Route::get('/email-compose', 'AdminController@email_compose');
Route::post('/email-compose-submit', 'AdminController@email_compose_submit');
Route::get('/enquiry-list', 'AdminController@enquiry_list');
Route::get('/enquiry-compose', 'AdminController@enquiry_compose');
Route::post('/enquiry-compose-submit', 'AdminController@enquiry_compose_submit');
Route::get('/enquiry-list-view/{id}', 'AdminController@enquiry_list_view');
Route::get('notification-list', 'AdminController@notification_list');
Route::get('notification-create', 'AdminController@notification_create');
Route::post('notification-create-submit', 'AdminController@notification_create_submit');
Route::get('notification-list-view/{id}', 'AdminController@notification_list_view');
Route::get('/student-offer-letter-view-public/{id}', 'PublicController@student_offer_letter_view');



















































// Route::get('/admin',function(){
// 	return view('login.adminLogin');
// });
// Route::get('/employee/login',function(){
// 	return view('member.login');
// });

// Route::get('/agent/login',function(){
// 	return view('member.agentlogin');
// });

// Route::get('/reset-password/{id}',function($data){
// 	return view('member.resetPassword')->with(array('code'=>$data));
// });

// Route::get('/forget-password',function(){
// 	return view('member.forgetPassword');
// });

// Route::get('/logout',function(){
// 	session()->flush();
// 	return view('welcome');
// });

// Route::get('/dashboard', 'DashboardController@index');
// Route::get('showNotification/{id}', 'DashboardController@showNotification');
// Route::get('enqueryView/{id}', 'DashboardController@enqueryView');
// Route::get('/singleReport', 'SettingsController@singleReport');
// Route::get('verify/{id}', 'LoginController@emailVerify');
// Route::post('submitConfirmPassword', 'LoginController@submitConfirmPassword');
// Route::post('forgetPasswordSubmit', 'LoginController@forgetPasswordSubmit');





// Route::get('/home', 'DashboardController@index')->name('home');
// Route::get('/updateProfile', 'DashboardController@updateProfile')->name('updateProfile');
// Route::get('/changePassword', 'DashboardController@changePassword')->name('changePassword');
// Route::patch('/updateProfilePost', 'DashboardController@updateProfilePost')->name('updateProfilePost');
// Route::patch('/changePasswordPost', 'DashboardController@changePasswordPost')->name('changePasswordPost');
// Route::resource('course', 'CourseController');
// Route::resource('agent', 'AgentController');
// Route::resource('student', 'StudentController');
// Route::get('student/{id}/edit_b', 'StudentController@editPartB');
// Route::resource('assign', 'AssignController');
// Route::resource('offer', 'OfferController');
// Route::resource('enrollment', 'EnrollmentController');
// Route::resource('member', 'MemberController');
// Route::get('/employee/dashboard', 'EmployeeController@index');
// Route::get('/studentList', 'DynamicController@index');
// Route::get('/studentAdd', 'DynamicController@studentAdd');
// Route::post('/studentSave', 'DynamicController@studentSave');
// Route::get('studentView/{id}', 'DynamicController@studentView');
// Route::resource('setting', 'SettingsController');
// Route::get('setting/{id}/edit', 'SettingsController@edit');
// Route::resource('payment', 'PaymentController');
// Route::get('addPayment', 'SettingsController@addPayment');
// Route::get('reports', 'SettingsController@reports');
// Route::get('enquiry', 'SettingsController@enquiry');
// Route::get('enqiryToagent', 'SettingsController@enqueryToagent');
// Route::patch('enquerySendToAgent', 'SettingsController@enquerySendToAgent');
// Route::get('notification', 'SettingsController@notification');
// Route::get('notificationToagent', 'SettingsController@notificationToagent');
// Route::patch('notificationSendToAgent', 'SettingsController@notificationSendToAgent');
// Route::get('studentApprovel', 'SettingsController@studentApprovel');
// Route::get('changeStatus/{id}/edit', 'SettingsController@changeApprovalStatus');
// Route::patch('changeApprovalStatus', 'SettingsController@changeApprovalSubmit');
// Route::get('coeList', 'SettingsController@coeApprovel');
// Route::get('coeStatus/{id}/edit', 'SettingsController@changeCoeStatus');
// Route::patch('changeCoeStatus', 'SettingsController@changeCoeSubmit');
// Route::get('export', 'SettingsController@export');
// Route::patch('exportGenerate', 'SettingsController@exportGenerate');
// Route::get('requestForInvoice', 'SettingsController@requestForInvoice');
// Route::get('requestForInvoiceFilter', 'SettingsController@requestForInvoiceFilter');
// Route::patch('requestForInvoiceFilter', 'SettingsController@requestForInvoiceFilter');
// Route::get('comissionList', 'SettingsController@comissionList');
// Route::get('agentPay/{id}/{status}', 'SettingsController@agentPay');
// Route::patch('chnageStudentStatus', 'SettingsController@chnageStatus');
// Route::patch('sendEmail', 'SettingsController@sendEmail');


























