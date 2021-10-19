<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Faq;
use App\Models\faqscategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard.dashboard', ['title' => 'Admin - Users', 'users' => $users]);
    }

    public function applicants()
    {
        $applicants = Applicant::all();
        return view('admin.applicants.index', ['title' => 'Admin - Applicants', 'applicants' => $applicants]);
    }

    public function faqs()
    {
        $faqs = \DB::table('faqs','f')->join('faqscategories', 'f.faqscategory_id', '=', 'faqscategories.id')->where('f.status', '=', '0')->get();

        $faqscate = Faqscategory::all()->where('status', '=', 0);
        return view('admin.faqs.index', ['title' => 'Admin - FAQs', 'faqscate' => $faqscate, 'faqs' => $faqs]);
    }

    public function faqsStore(Request $request)
    {
        $request->validate([
            'cate' => 'required',
            'title' => 'required',
            'answers' => 'required'
        ]);

        $faq_save = new Faq;
        $faq_save->faqscategory_id = $request->cate;
        $faq_save->questions = $request->title;
        $faq_save->answers = $request->answers;

        $faq_save->save();

        return back();
    }
}
