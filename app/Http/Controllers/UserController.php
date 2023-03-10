<?php

namespace App\Http\Controllers;

use Toastr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Dd;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function list(Request $request)
    {
        try {
            $totalData = User::count();
            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = 'id';
            $dir = $request->input('order.0.dir');
            if (empty($request->input('search.value'))) {
                $results = User::offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $results = User::search($search)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $totalFiltered = count($results);
            }

            $data = array();
            if (!empty($results)) {
                foreach ($results as $row) {
                    $nestedData['id'] = $row->id;
                    $nestedData['name'] = $row->name;
                    $nestedData['email'] = $row->email;
                    $nestedData['status'] = $row?->status;
                    $nestedData['action'] = view('user._actions', compact('row'))->render();
                    $data[] = $nestedData;
                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
            );

            echo json_encode($json_data);
        } catch (\Throwable $th) {
            // throw $th;
            return Response::json(['error' => $th->getMessage()], 500);
        } catch (\Exception $e) {
            // throw $th;
            return Response::json(['error' => $e->getMessage()], 500);
        }
    }

    public function user()
    {
        return view('user.index');
    }

    public function index(Request $request)
    {
        $totalData = User::count();
        $users = User::all();

        $data = [];

        if (!empty($users)) {
            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['name'] = $user->name;

                $data[] = $nestedData;
            }
        }
        $totalFiltered = '';
        if ($data) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            Toastr::success('Success', 'User has been created successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            Toastr::error('Error', 'Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error('Error', 'User not found');
            return redirect()->back();
        }
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            if (!$user) {
                Toastr::error('Error', 'User not found');
                return redirect()->back();
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            Toastr::success('Success', 'User has been updated successfully');
            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            // throw $th;
            Toastr::error('Error', 'Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    // upload cover image
    public function uploadCoverImage(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            Toastr::error('Error', 'User not found');
            return redirect()->back();
        }
        $user->cover_image = $request->image;
        $user->save();
        // Toastr::success('Success', 'Cover image has been updated successfully');
        return response()->json(['image' => $user->cover_image]);
    }
    // upload profile image
    public function uploadAvatar(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            Toastr::error('Error', 'User not found');
            return redirect()->back();
        }
        $user->avatar = $request->image;
        $user->save();
        // Toastr::success('Success', 'Profile image has been updated successfully');
        return response()->json(['image' => $user->avatar]);
    }
    public function destroy($id)
    {
        $users = User::where('id', $id)->delete();
        return response()->json('Deleted');
    }

    // get avatar
    public function getAvatar()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            Toastr::error('Error', 'User not found');
            return redirect()->back();
        }
        return response()->json(['success' => 'Profile image has been updated successfully', 'image' => $user->avatar]);
    }

    // get cover
    public function getCoverImage()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            Toastr::error('Error', 'User not found');
            return redirect()->back();
        }
        return response()->json(['success' => 'Cover image has been updated successfully', 'image' => $user->cover_image]);
    }
    // editProfile
    public function updateProfile(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            if (!$user) {
                Toastr::error('Error', 'User not found');
                return redirect()->back();
            }
            $user->name = $request->name;
            $user->wishlist_name = $request->wishlist_name;
            $user->save();
            Toastr::success('Success', 'User has been updated successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            Toastr::error('Error', 'Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    public function updateMessage (Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            if (!$user) {
                Toastr::error('Error', 'User not found');
                return redirect()->back();
            }
            $user->description = $request->message;
            $user->save();
            // Toastr::success('Success', 'Message has been updated successfully');
            return response()->json(['message' => $user->description]);
        } catch (\Throwable $th) {
            // throw $th;
            Toastr::error('Error', 'Something went wrong');
            return redirect()->back()->withInput();
        }
    }
}
