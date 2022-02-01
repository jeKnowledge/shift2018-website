<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FAQ;
use App\Event;
use \DrewM\MailChimp\MailChimp;

class WebsiteController extends Controller
{


    public function index()
    {
        $page        = 'index';
        $bgColor     = 'bg-red';
        $fontColor   = 'light';
        $activeColor = 'yellow';
        return view('website.index', compact('page', 'bgColor', 'fontColor', 'activeColor'));

    }


    public function wall()
    {
        $page = 'wall';

        $bgColor     = 'bg-red';
        $fontColor   = 'yellow';
        $activeColor = 'light';
        return view('website.wall', compact('page', 'bgColor', 'fontColor', 'activeColor'));

    }


    public function schedule()
    {
        $page        = 'schedule';
        $bgColor     = 'bg-red';
        $fontColor   = 'light';
        $activeColor = 'yellow';

        $events = Event::all();

        return view('website.schedule', compact('page', 'bgColor', 'fontColor', 'activeColor', 'events'));

    }


    public function faqs()
    {
        $page        = 'faq';
        $bgColor     = 'bg-yellow';
        $fontColor   = 'dark';
        $activeColor = 'blue';

        $faqs = FAQ::all();

        return view('website.faqs', compact('page', 'bgColor', 'fontColor', 'activeColor', 'faqs'));

    }


    public function about()
    {
        $page        = 'about';
        $bgColor     = 'bg-blue';
        $fontColor   = 'light';
        $activeColor = 'yellow';
        return view('website.about', compact('page', 'bgColor', 'fontColor', 'activeColor'));

    }


    public function competition()
    {
        $page        = 'competition';
        $bgColor     = 'bg-blue';
        $fontColor   = 'light';
        $activeColor = 'red';
        return view('website.competition', compact('page', 'bgColor', 'fontColor', 'activeColor'));

    }


    public function downloadRegulation()
    {
        return response()->file(public_path().'/shift-reg.pdf');

    }


    public function mailchimp(Request $request)
    {
        $mail      = $request->input('email');
        $MailChimp = new MailChimp('28547054ea747c41c3b2baa308708194-us12');
        $list_id   = '731b6afa6c';
        $result    = $MailChimp->post(
            "lists/$list_id/members",
            [
                'email_address' => $mail,
                'status'      => 'subscribed',
            ]
        );
        return response()->json($result);

    }


}
