<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;

class MemberController extends Controller
{
    // Fetch all school and show on index page
    public function index()
    {
        $schools = School::all();
        return view('index', compact('schools'));
    }

    // Fetch school members associating to the schools 
    public function showBySchool(School $school)
    {
        $members = $school->members;
        return view('show_members', compact('members', 'school'));
    }

    // view of add new member page in a school
    public function addMember()
    {
        $schools = School::all();
        return view('add_new_member', compact('schools'));
    }

    // Store new member  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'schools' => 'required|array',
        ]);

        $member = Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $member->schools()->attach($request->input('schools'));

        return redirect('/add/members')->with('success', 'Member added successfully');
    }


    
    // Download CSV of all schools all members
    public function downloadMembersCSV()
    {
        // Fetch all members with their associated schools
        $members = Member::with('schools')->get();

        // Initialize the CSV writer
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add CSV headers
        $csv->insertOne(['Name', 'Email', 'School']);

        // Add member data to the CSV
        foreach ($members as $member) {
            $csv->insertOne([
                $member->name,
                $member->email,
                implode(', ', $member->schools->pluck('school_name')->toArray()),
            ]);
        }

        // Set CSV headers for the download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="members.csv"',
        ];

        // Generate a download response
        return Response::make($csv->output(), 200, $headers);
    }
}
