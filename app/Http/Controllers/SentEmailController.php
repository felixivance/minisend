<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Mail\SendEmailViaSendGrid;
use App\Models\SentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SentEmailController extends Controller
{
    public function index()
    {
        //get all sent emails
        $emails = SentEmail::orderBy('created_at','desc')->get();

        return api_response(true, null, 'success',
            'successfully fetched sent emails', $emails);
    }



    public function store(Request $request)
    {
//'userId','toEmail','subject','content','status'
        try{
            $email = new SentEmail();
            $email->userId = Auth::id();
            $email->toEmail = $request['toEmail'];
            $email->subject = $request['subject'];
            $email->content = $request['content'];
            $email->status = "posted";


            if ($request->hasFile('attachment'))
            {
                $file      = $request->file('attachment');
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $item   = date('His').'-'.$filename;
                $file->move(public_path('attachments'), $item);
                $email->attachment  = $item;
            }
            $email->save();

            //mailersend not working  :(
//            $res = Mail::to($email->toEmail)->send(new SendEmail());

            //opted send grid
            $res = Mail::to($email->toEmail)->send(new SendEmailViaSendGrid($email));


            return api_response(true, null, 'success',
                'successfully scheduled an email', $email);

        }catch (\Exception $ex){
            return api_response(false, $ex->getMessage(), 'error',
                'error scheduling email', null);
        }
    }


    public function show($id)
    {
        try{
            $sentEmail = SentEmail::find($id);

            return api_response(true, null, 'success',
                'successfully fetched email', $sentEmail);

        }catch (\Exception $ex){
            return api_response(false, $ex->getMessage(), 'error',
                'error fetching sent email', null);
        }
    }


    public function update(Request $request, $id)
    {

     //no need for updating sent emails
    }


    public function destroy($id)
    {
        try{
            $email = SentEmail::find($id);
            //todo delete uploaded media for the email
            $email->delete();

            return api_response(true, null, 'success',
                'successfully deleted email', null);

        }catch (\Exception $ex){
            return api_response(false, $ex->getMessage(), 'error',
                'error deleting email', null);
        }
    }

    public function dashboardStatistics(){

        $totalSentEmails = SentEmail::get()->count();
        $postedEmails = SentEmail::where('status','posted')->count();
        $sentEmails = SentEmail::where('status','posted')->count(); //posted=sent
        $failedEmails = SentEmail::where('status','failed')->count();

        $data = [
            'totalSentEmails'=> $totalSentEmails,
            'postedEmails'=>$postedEmails,
            'sentEmails' => $sentEmails,
            'failedEmails'=> $failedEmails
        ];
        return api_response(true, null, 'success',
            'successfully fetched stats', $data);
    }
}
