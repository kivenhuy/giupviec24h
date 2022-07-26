<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model'/

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
    //     $this->middleware('permission:user-create', ['only' => ['create','store', 'updateStatus']]);
    //     $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:user-delete', ['only' => ['delete']]);
    // }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $booking = Booking::All();
        return view('booking.index',['booking'=>$booking]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        // $roles = Role::all();
       
        return view('booking.add');
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(Request $request)
    {
        $date = "";
        print_r($request->StartTime);
        print_r($request->EndTime);
        print_r($request->Total);
        if($request->BookedDate2 == "on")
        {
            $date .= "Thứ 2,";
        }
        if($request->BookedDate3 == "on")
        {
            $date .= "Thứ 3,";
        }
        if($request->BookedDate4 == "on")
        {
            $date .= "Thứ 4,";
        }
        if($request->BookedDate5 == "on")
        {
            $date .= "Thứ 5,";
        }
        if($request->BookedDate6 == "on")
        {
            $date .= "Thứ 6";
        }
        print_r($date);
        // $number = Str::length($date);
        
        // for($i=0;$i<=$number+2;$i=$i+7)
        // {
        //     $date_choose =substr_replace($date, ",", $i, 0);
        // }
        // $number=$number-5;
        // print_r($number);
        // if($number!=0)
        // {
        //     $number_div = $number/5;
        // }
        // print_r($number_div);
        // for($i=7;$i<$number+(($number_div+1)*2);$i=$i+7)
        // {
        //     $date_choose =substr_replace($date_choose, ",", $i, 0);
        // }
        
        // print_r($date_choose);
        // print_r($request->RangeDate);
        // print_r($request->Note);
        // print_r($request->Address);
        // Validations
        // $request->validate([
        //     'first_name'    => 'required',
        //     'last_name'     => 'required',
        //     'email'         => 'required|unique:users,email',
        //     'mobile_number' => 'required|numeric|digits:10',
        //     'role_id'       =>  'required|exists:roles,id',
        //     'status'       =>  'required|numeric|in:0,1',
        // ]);
        $randomNumber = random_int(1000, 9999);
        DB::beginTransaction();
        try {

            // Store Data
            $booking = Booking::create([
                'CustomerID' => $randomNumber,
                'MaidID' => $randomNumber,
                'PromotionID' => $randomNumber,
                'StartTime'    => $request->StartTime,
                'EndTime'     => $request->EndTime,
                'Total'         => $request->Total,
                'BookedDate' => $date,
                'RangeDate'       => $request->RangeDate,
                'Note'       => $request->Note,
                'Address'       => $request->Address,
                // 'status'        => $request->status,
                // 'password'      => Hash::make($request->first_name.'@'.$request->mobile_number)
            ]);

        //     // Delete Any Existing Role
        //     DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
        //     // Assign Role To User
        //     $user->assignRole($user->role_id);

        //     // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('booking.index')->with('success','User Created Successfully.');

        } 
        catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    // public function updateStatus($user_id, $status)
    // {
    //     // Validation
    //     $validate = Validator::make([
    //         'user_id'   => $user_id,
    //         'status'    => $status
    //     ], [
    //         'user_id'   =>  'required|exists:users,id',
    //         'status'    =>  'required|in:0,1',
    //     ]);

    //     // If Validations Fails
    //     if($validate->fails()){
    //         return redirect()->route('users.index')->with('error', $validate->errors()->first());
    //     }

    //     try {
    //         DB::beginTransaction();

    //         // Update Status
    //         User::whereId($user_id)->update(['status' => $status]);

    //         // Commit And Redirect on index with Success Message
    //         DB::commit();
    //         return redirect()->route('users.index')->with('success','User Status Updated Successfully!');
    //     } catch (\Throwable $th) {

    //         // Rollback & Return Error Message
    //         DB::rollBack();
    //         return redirect()->back()->with('error', $th->getMessage());
    //     }
    // }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    // public function edit(User $user)
    // {
    //     $roles = Role::all();
    //     return view('users.edit')->with([
    //         'roles' => $roles,
    //         'user'  => $user
    //     ]);
    // }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    // public function update(Request $request, User $user)
    // {
    //     // Validations
    //     $request->validate([
    //         'first_name'    => 'required',
    //         'last_name'     => 'required',
    //         'email'         => 'required|unique:users,email,'.$user->id.',id',
    //         'mobile_number' => 'required|numeric|digits:10',
    //         'role_id'       =>  'required|exists:roles,id',
    //         'status'       =>  'required|numeric|in:0,1',
    //     ]);

    //     DB::beginTransaction();
    //     try {

    //         // Store Data
    //         $user_updated = User::whereId($user->id)->update([
    //             'first_name'    => $request->first_name,
    //             'last_name'     => $request->last_name,
    //             'email'         => $request->email,
    //             'mobile_number' => $request->mobile_number,
    //             'role_id'       => $request->role_id,
    //             'status'        => $request->status,
    //         ]);

    //         // Delete Any Existing Role
    //         DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
    //         // Assign Role To User
    //         $user->assignRole($user->role_id);

    //         // Commit And Redirected To Listing
    //         DB::commit();
    //         return redirect()->route('users.index')->with('success','User Updated Successfully.');

    //     } catch (\Throwable $th) {
    //         // Rollback and return with Error
    //         DB::rollBack();
    //         return redirect()->back()->withInput()->with('error', $th->getMessage());
    //     }
    // }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    // public function delete(User $user)
    // {
    //     DB::beginTransaction();
    //     try {
    //         // Delete User
    //         User::whereId($user->id)->delete();

    //         DB::commit();
    //         return redirect()->route('users.index')->with('success', 'User Deleted Successfully!.');

    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', $th->getMessage());
    //     }
    // }

    /**
     * Import Users 
     * @param Null
     * @return View File
     */
    // public function importUsers()
    // {
    //     return view('users.import');
    // }

    // public function uploadUsers(Request $request)
    // {
    //     Excel::import(new UsersImport, $request->file);
        
    //     return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    // }

    // public function export() 
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}
