<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Form;

use Illuminate\Http\Request;
use App\Models\ChildRecord;
use App\Models\Feedback;
use App\Models\LocalAuthority;
use App\Models\Absence;
use App\Models\School;
use App\Http\Requests;
use Response;
use DB;

class ServicesController extends Controller
{
    

	public function getRegistrationPage() {
        $children = ChildRecord::all();
        
        return view('registration')->with('children', $children);
    }

     public function getEnrolmentPage() {
    	return view('enrol');
    }

    public function getSchools(Request $request){
        
        $authorities = LocalAuthority::all();
        $absences = Absence::all();
        $id = intval($id = $request->d);
        $la_name = LocalAuthority::find($id)->la_name;
        $schools = DB::select('SELECT school_name FROM schools WHERE local_authority_id = :id', ['id' => $id]);
        $response = Response::make($schools, "200");
        $response->header('Content-Type', 'text/json');
        return $response;
        return $la_name;
    }

     public function getAbsencePage(Request $request) {

        $authorities = LocalAuthority::all();
        $absences = Absence::all();
        $schools = DB::select('SELECT school_name FROM schools WHERE local_authority_id = :id', ['id' => 1]);
        $response = $schools;
    	return view('absence')->with('authorities', $authorities)->with('absences', $absences)->with('schools', $schools)->with('response', $response);
    }

     public function getAnnualUpdatePage() {
    	return view('annualupdate');
    }

     public function getResultsPage() {
    	return view('results');
    }

     public function getSchoolMealsPage() {
    	return view('schoolmeals');
    }

     public function getFeedbackPage() {
    	$feedbacks = Feedback::all();

        return view('feedback')->with('feedbacks', $feedbacks);
    }

      public function postFeedbackPage(Request $request) {

        $feedback = new Feedback;
        $feedback->f_name = $request->f_name;
        $feedback->l_name = $request->l_name;
        $feedback->service = $request->service;
        $feedback->rating = $request->rating;
        $feedback->message = $request->message;

        $feedback->save();

        return $this->getFeedbackPage();

        return redirect()->route('get.services.feedback');


    }

    public function deleteFeedbackPage($id){

       $feedback = Feedback::find($id);
       $feedback->delete();
       return;
    }

   
    public function postAbsencePage(Request $request)
    {
        $la_name = LocalAuthority::find($request->la)->la_name;
        $absencerecord = new Absence;
        $absencerecord->f_name = $request->f_name;
        $absencerecord->l_name = $request->l_name;
        $absencerecord->la = $la_name;
        $absencerecord->school = $request->school;
        $absencerecord->school_id = $request->id;

        $absencerecord->doa = $request->doa;
        $absencerecord->reason_for_absence = $request->reason_for_absence;
        $absencerecord->save();

        // return $this->getAbsencePage();

        return redirect()->route('post.services.postAbsencePage');
    }

     public function postRegistrationPage(Request $request)
    {
        $childrecord = new ChildRecord;
        $childrecord->f_name = $request->f_name;
        $childrecord->l_name = $request->l_name;
        $childrecord->gender = $request->gender;
        $childrecord->dob = $request->dob;

        $childrecord->save();

        return $this->getRegistrationPage();

        return redirect()->route('get.services.getRegistrationPage');


        
    }

     public function updateRegistrationPage(Request $request)
    {
        $childrecord = ChildRecord::find($request->id);
        $childrecord->f_name = $request->f_name;
        $childrecord->l_name = $request->l_name;
        $childrecord->gender = $request->gender;
        $childrecord->dob = $request->dob;
        $childrecord->save();

        return $this->getRegistrationPage();

        return redirect()->route('get.services.RegistrationPage');

        
    }

    public function deleteRegistrationPage($id){

       $childrecord = ChildRecord::find($id);
       $childrecord->delete();
       return;
    }

    public function deleteAbsencePage($id){

       $absencerecord = Absence::find($id);
       $absencerecord->delete();
       return;
    }
}
