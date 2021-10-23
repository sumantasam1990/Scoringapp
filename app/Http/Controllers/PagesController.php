<?php

namespace App\Http\Controllers;

use App\Mail\Contactus;
use App\Mail\SendMessage;
use App\Models\Faqscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index', ['title' => 'Scorng']);
    }

    public function howitworks()
    {
        return view('pages.howtoworks', ['title' => 'How It Works']);
    }

    public function signupmycompany()
    {
        return view('pages.signupmycompany', ['title' => 'Signing Up My Company']);
    }

    public function invitedtojoin()
    {
        return view('pages.invitedtojoin', ['title' => 'Invited To Join']);
    }

    public function features()
    {
        return view('pages.features', ['title' => 'Features']);
    }

    public function faq()
    {
        $faqcategory = Faqscategory::all()->where('status', '=', 0);

        return view('pages.faq', ['title' => 'FAQ', 'faqcategory' => $faqcategory]);
    }

    public function faqs($id)
    {
        try {
            $faqs = \DB::table('faqs','f')->join('faqscategories', 'f.faqscategory_id', '=', 'faqscategories.id')->where('f.status', '=', '0')->where('f.faqscategory_id', '=', $id)->get();

            return view('pages.faqs', ['title' => $faqs[0]->title, 'faqs' => $faqs]);

        } catch (\Throwable $th) {
            return view('pages.faqs', ['title' => 'Not found', 'faqs' => [], 'notFound' => 'Sorry! No data found.']);
        }

    }

    public function about()
    {
        return view('pages.about', ['title' => 'About']);
    }

    public function pricing()
    {
        return view('pages.pricing', ['title' => 'Pricing']);
    }

    public function legal()
    {
        return view('pages.legal', ['title' => 'Legal']);
    }

    public function privacy()
    {
        return view('pages.privacy', ['title' => 'Privacy']);
    }

    public function terms()
    {
        return view('pages.terms', ['title' => 'Terms']);
    }

    public function regulation()
    {
        return view('pages.regulation', ['title' => 'Privacy Regulation Reference']);
    }

    public function cancellation()
    {
        return view('pages.cancellation', ['title' => 'Cancellation Policy']);
    }

    public function refund()
    {
        return view('pages.refund', ['title' => 'Refund Policy']);
    }

    public function security()
    {
        return view('pages.security', ['title' => 'Security Overview']);
    }

    public function contact()
    {
        return view('pages.contact', ['title' => 'Contact us']);
    }

    public function sendemailToContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nam_e' => 'required',
            'msg' => 'required'
        ]);

        $mailData = [
            'email' => $request->email,
            'phone' => $request->phone,
            'nam_e' => $request->nam_e,
            'msg' => $request->msg
        ];

        try {
            $this->sendEmail('sumantasam1990@gmail.com', $mailData);
            return back()
                ->with('msg', 'Your email has been sent successfully.');
        } catch (\Throwable $th) {
            return back()
                ->with('err', 'Error! ' . $th->getMessage());
        }

    }

    private function sendEmail($email, $mailData) {

        //Mail::to($email)->send(new Contactus($mailData));
        Mail::to($email)->queue(new Contactus($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
