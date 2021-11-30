<?php

use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoringSheetController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::group(['prefix' => "app"], function () {
//
//});

Route::get('/', [\App\Http\Controllers\PagesController::class, 'index']);
Route::get('/howitworks', [\App\Http\Controllers\PagesController::class, 'howitworks']);
Route::get('/sign-up-my-company', [\App\Http\Controllers\PagesController::class, 'signupmycompany']);
Route::get('/invited-to-join', [\App\Http\Controllers\PagesController::class, 'invitedtojoin']);
Route::get('/features', [\App\Http\Controllers\PagesController::class, 'features']);
Route::get('/faq', [\App\Http\Controllers\PagesController::class, 'faq']);
Route::get('/faqs/{id}', [\App\Http\Controllers\PagesController::class, 'faqs']);
Route::get('/about', [\App\Http\Controllers\PagesController::class, 'about']);
Route::get('/pricing', [\App\Http\Controllers\PagesController::class, 'pricing']);
Route::get('/legal', [\App\Http\Controllers\PagesController::class, 'legal']);
Route::get('/privacy', [\App\Http\Controllers\PagesController::class, 'privacy']);
Route::get('/terms', [\App\Http\Controllers\PagesController::class, 'terms']);
Route::get('/privacy-regulation', [\App\Http\Controllers\PagesController::class, 'regulation']);
Route::get('/cancellation-policy', [\App\Http\Controllers\PagesController::class, 'cancellation']);
Route::get('/refund', [\App\Http\Controllers\PagesController::class, 'refund']);
Route::get('/security', [\App\Http\Controllers\PagesController::class, 'security']);
Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'contact']);
Route::post('contact/us', [\App\Http\Controllers\PagesController::class, 'sendemailToContact'])->name('contact.us');
Route::get('/buyer-agent-benefit', [\App\Http\Controllers\PagesController::class, 'buyer_agent_benefit'])->name('buyeragentbenefit');
Route::get('/buyer-agents-how-it-works', [\App\Http\Controllers\PagesController::class, 'buyer_how_it_works_agent'])->name('howitworkbuyeragent');
Route::get('/listing-agent-benefit', [\App\Http\Controllers\PagesController::class, 'agent_listing_benefit'])->name('listingagentbenefit');
Route::get('/listing-agent-how-it-works', [\App\Http\Controllers\PagesController::class, 'agent_how_it_works'])->name('listingagenthowitworks');
Route::get('/buyer-benefits', [\App\Http\Controllers\PagesController::class, 'buyer_benefit'])->name('buyerbenefits');
Route::get('/how-it-works-buyer', [\App\Http\Controllers\PagesController::class, 'buyer_how_it_works'])->name('howitworksbuyer');



Route::get('/create-score-page', [SubjectController::class, 'index'])->name('create.score.page')->middleware(['auth', 'verified']);
Route::get('/create-applicant/{id}', [ApplicantController::class, 'index'])->middleware(['auth', 'verified', 'scorePage']);
Route::get('/create-criteria/{id}/{applid}', [CriteriaController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/create-score-page/{id}', [ScoringSheetController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/score-page/{id}', [ScoringSheetController::class, 'scoring'])->middleware(['auth', 'verified']);
Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware(['auth', 'verified']);
Route::get('/delete/score/{id}', [ScoringSheetController::class, 'delete'])->middleware(['auth', 'verified']);
Route::get('/invite-listing-agent/{id}', [TeamController::class, 'index'])->name('inviteagent')->middleware(['auth', 'verified']);
Route::get('remove/note/{id}', [ScoringSheetController::class, 'remove_note'])->middleware(['auth', 'verified']);
Route::get('remove/file/{id}', [ScoringSheetController::class, 'remove_file'])->middleware(['auth', 'verified']);
Route::get('finalists/{id}', [ScoringSheetController::class, 'finalists'])->middleware(['auth', 'verified', 'scorePage']);
Route::get('applicant/{id}/{subid}', [ApplicantController::class, 'viewApplicant'])->middleware(['auth', 'verified']);
Route::get('/bulkemaillist/{id}', [ApplicantController::class, 'bulkEmails'])->middleware(['auth', 'verified']);
Route::get('/message-room/{id}/{room}', [\App\Http\Controllers\MessageController::class, 'index'])->middleware(['auth', 'verified', 'scorePage']);
Route::get('/scorecard/{id}/{appl_id}/{userid}', [ScoringSheetController::class, 'scorecard'])->middleware(['auth', 'verified']);
Route::get('/rooms/{id}', [\App\Http\Controllers\MessageController::class, 'message_rooms'])->middleware(['auth', 'verified', 'scorePage']);
Route::get('/scorepage-grid/{id}/{applicantId?}', [ScoringSheetController::class, 'gridView'])->middleware(['auth', 'verified']);
Route::get('/invite-buyer/{id}', [TeamController::class, 'invite_buyer'])->middleware(['auth', 'verified']);
Route::get('/questionnaire/{id}', [\App\Http\Controllers\Questionnaire::class, 'index'])->middleware(['auth', 'verified', 'scorePage']);
Route::get('/state-dashboard', [\App\Http\Controllers\Publicscorepage::class, 'state_dash'])->middleware(['auth', 'verified'])->name('state.dashboard');
Route::get('/metro-dashboard/{id}', [\App\Http\Controllers\Publicscorepage::class, 'metro_dash'])->middleware(['auth', 'verified'])->name('metro.dashboard');
Route::get('/town-dashboard/{id}', [\App\Http\Controllers\Publicscorepage::class, 'town_dash'])->middleware(['auth', 'verified'])->name('town.dashboard');
Route::get('/follow-score-pages/{id}', [\App\Http\Controllers\Publicscorepage::class, 'follow_scorePages'])->middleware(['auth', 'verified'])->name('follow.scorepage');





Route::post('store/mainsubject', [SubjectController::class, 'mainstore'])->name('mainsubject.store')->middleware(['auth', 'verified']);
Route::post('store/subject', [SubjectController::class, 'store'])->name('subject.store')->middleware(['auth', 'verified']);
Route::post('store/applicant', [ApplicantController::class, 'store'])->name('applicant.store')->middleware(['auth', 'verified']);
Route::post('store/maincriteria', [CriteriaController::class, 'mainstore'])->name('maincriteria.store')->middleware(['auth', 'verified']);
Route::post('store/criteria', [CriteriaController::class, 'store'])->name('criteria.store')->middleware(['auth', 'verified']);
Route::post('store/score', [ScoringSheetController::class, 'store'])->name('score.store')->middleware(['auth', 'verified']);
Route::any('edit/score', [ScoringSheetController::class, 'edit'])->name('score.edit')->middleware(['auth', 'verified']);
Route::post('store/team', [TeamController::class, 'store'])->name('team.store')->middleware(['auth', 'verified']);
Route::post('store/finalist', [ApplicantController::class, 'add_finalist'])->name('finalist.store')->middleware(['auth', 'verified']);
Route::post('export-emails', [ApplicantController::class, 'downloadEmailListAsCSV'])->name('export-emails')->middleware(['auth', 'verified']);
Route::post('remove/bulkemail', [ApplicantController::class, 'removeBulkEmail'])->name('remove.bulk')->middleware(['auth', 'verified']);
Route::post('add/emaillist', [ApplicantController::class, 'addEmailList'])->name('add-emaillist')->middleware(['auth', 'verified']);
Route::post('remove/applicant', [ApplicantController::class, 'removeApplicant'])->name('remove-applicant')->middleware(['auth', 'verified']);
Route::post('remove/page', [ScoringSheetController::class, 'deletePage'])->name('remove-page')->middleware(['auth', 'verified']);
Route::post('message/reply', [\App\Http\Controllers\MessageController::class, 'reply'])->name('reply')->middleware(['auth', 'verified']);
Route::post('message/create', [\App\Http\Controllers\MessageController::class, 'create'])->name('create')->middleware(['auth', 'verified']);
Route::post('store/roomname', [\App\Http\Controllers\MessageController::class, 'store'])->name('roomname.store')->middleware(['auth', 'verified']);
Route::post('company/photo', [LoginController::class, 'uploadPhoto'])->name('company.photo')->middleware(['auth', 'verified']);
Route::post('/questionnaire', [\App\Http\Controllers\Questionnaire::class, 'store'])->name('questionnaire.post')->middleware(['auth', 'verified']);
Route::post('/metro-save', [\App\Http\Controllers\Publicscorepage::class, 'metro_store'])->name('metro.store')->middleware(['auth', 'verified']);
Route::post('/town-save', [\App\Http\Controllers\Publicscorepage::class, 'town_store'])->name('town.store')->middleware(['auth', 'verified']);




// authentications
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('signup/{token?}', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');


// email verification routes
Route::get('/email/verify', function () {
    //return view('auth.verify-email');
    return redirect('/signout');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





// Forget password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status), 'msg' => "An email has been sent to you where you can reset your password."])
        : back()->withErrors(['email' => __($status), 'err' => 'Please check your Email ID.']);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');








//Admin Routes

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin', [\App\Http\Controllers\admin\AdminController::class, 'dashboard']);
    Route::get('admin/dashboard', [\App\Http\Controllers\admin\AdminController::class, 'dashboard']);
    Route::get('admin/applicants', [\App\Http\Controllers\admin\AdminController::class, 'applicants']);
    Route::get('admin/faqs', [\App\Http\Controllers\admin\AdminController::class, 'faqs']);





    Route::post('admin/faqs/store', [\App\Http\Controllers\admin\AdminController::class, 'faqsStore'])->name('admin.faqs.store');


    // artisan command

    Route::get('admin/queue_table', function () {

        try {
            \Illuminate\Support\Facades\Artisan::call('queue:table');

            dd("Queue table created.");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }


    });

    Route::get('admin/migrate', function () {

        try {
            \Illuminate\Support\Facades\Artisan::call('migrate');

            dd("Tables migrate completed.");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }


    });

    Route::get('admin/clear_cache', function () {

        try {
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('config:cache');

            dd("Config && Cache is cleared");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }


    });

    Route::get('admin/remove_all_tables', function () {

        try {
            \App\Models\Applicant::truncate();
            \App\Models\Bulkemail::truncate();
            \App\Models\Criteria::truncate();
            \App\Models\Faq::truncate();
            \App\Models\Faqscategory::truncate();
            \App\Models\Finalist::truncate();
            \App\Models\Maincriteria::truncate();
            Mainsubject::truncate();
            \App\Models\Message::truncate();
            \App\Models\Metadata::truncate();
            \App\Models\Reply::truncate();
            \App\Models\Room::truncate();
            \App\Models\Score::truncate();
            Subject::truncate();
            Team::truncate();

            dd("All tables has been truncated.");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }


    });


});


// Accept invitations
// Before login
Route::get('accept-invitation/{token}', function ($token) {

    try {
        if(Auth::check()) {
            // Checking if loggedIN user same as token user
            $exptoken = explode('|', \Illuminate\Support\Facades\Crypt::decrypt($token));
            if($exptoken[0] == Auth::user()->email) {
                return (new \App\Http\Services\AddTeamMember())->acceptTeamMember(\Illuminate\Support\Facades\Crypt::decrypt($token));
            }
            return redirect('/dashboard')
                ->with('err', 'Please login with correct email and password to accept the invitation.');

        } else {
            //Store token in cookie
            \Illuminate\Support\Facades\Session::put('invite_agent_token', $token);
            return redirect('/signup');
        }



    } catch (\Throwable $th) {
        return redirect('/dashboard')
            ->with('err', $th->getMessage());
    }


});

//Buyer accept invitation

Route::get('accept-invitation-buyer/{token}', function ($token) {

    try {

        if(Auth::check()) {
            // Checking if loggedIN user same as token user
            $exptoken = explode('|', \Illuminate\Support\Facades\Crypt::decrypt($token));
            if($exptoken[0] == Auth::user()->email) {
                return (new \App\Http\Services\AddTeamMember())->acceptInvitationBuyer(\Illuminate\Support\Facades\Crypt::decrypt($token));
            }
            return redirect('/dashboard')
                ->with('err', 'Please login with correct email and password to accept the invitation.');

        } else {
            //Store token in cookie
            \Illuminate\Support\Facades\Session::put('invite_buyer_token', $token);

            return redirect('/signup');
        }

    } catch (\Throwable $th) {
        return redirect('/dashboard')
            ->with('err', $th->getMessage());
    }


});

Route::middleware(['auth', 'verified'])->group(function () {

//    Route::get('accept-invitation/{token}', function ($token) {
//
//        try {
//            return (new \App\Http\Services\AddTeamMember())->acceptTeamMember(\Illuminate\Support\Facades\Crypt::decrypt($token));
//
//        } catch (\Throwable $th) {
//            return redirect('/dashboard')
//                ->with('err', $th->getMessage());
//        }
//
//
//    });

//    Route::get('accept-invitation-buyer/{token}', function ($token) {
//
//        try {
//            (new \App\Http\Services\SubjectStore())->save(\Illuminate\Support\Facades\Crypt::decrypt($token));
//            return redirect('/dashboard');
//
//        } catch (\Throwable $th) {
//            return redirect('/dashboard')
//                ->with('err', $th->getMessage());
//        }
//
//
//    });

    Route::get('position-filled/{id}', function ($id) {

        try {
            Subject::where('id', '=', $id)
                ->update(['status' => 1]);

            return back()
                ->with('msg', 'Success.');

        } catch (\Throwable $th) {
            return back()
                ->with('err', $th->getMessage());
        }


    });

});


Route::get('adminggvtv6t6vv6r/clear_cache', function () {

    try {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('config:cache');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');

        dd("Config && Cache is cleared");
    } catch (\Throwable $th) {
        dd($th->getMessage());
    }


});
