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
use App\Http\Requests;

class ServicesController extends Controller
{

	public function getRegisterPage() {
        $children = ChildRecord::all();

        return view('register')->with('children', $children);
    }

     public function getEnrolmentPage() {
    	return view('enrol');
    }

     public function getAbsencePage() {
    	return view('absence');
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
    	return view('feedback');
    }

   

    public function postRegisterPage(){
    	$children = ChildRecord::all();
        
    	return view('register')->with('children', $children);
    }


     public function postChildPage(Request $request)
    {
        $childrecord = new ChildRecord;
        $childrecord->f_name = $request->f_name;
        $childrecord->l_name = $request->l_name;
        $childrecord->gender = $request->gender;
        $childrecord->dob = $request->dob;
        $childrecord->save();

        return $this->getRegisterPage();

        return redirect()->route('post.services.register');
    }

    public function postAbsencePage(Request $request)
    {
        $absencerecord = new Absence;
        $absencerecord->f_name = $request->f_name;
        $absencerecord->l_name = $request->l_name;
        $absencerecord->gender = $request->gender;
        $absencerecord->dob = $request->dob;
        $absencerecord->save();

        return $this->getAbsencePage();

        return redirect()->route('post.services.absence');
    }

    public function deleteChildPage($id){

       $childrecord = ChildRecord::find($id);
       $childrecord->delete();
       return;
    }
}
