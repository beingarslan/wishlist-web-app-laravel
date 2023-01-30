<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{    public function wishlist()
    {
        return view('wishlist.index');
    }
    public function list (Request $request)
    {
        try {
            $totalData = Wishlist::count();
            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = 'id';
            $dir = $request->input('order.0.dir');
            if (empty($request->input('search.value'))) {
                $results = Wishlist::offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $results = Wishlist::search($search)
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
                    $nestedData['user'] = $row->user_id;
                    $nestedData['image'] = $row->image;
                    $nestedData['url'] = $row->url;
                    $nestedData['repeat'] = $row->repeat;
                    $nestedData['price'] = $row->price;
                    $nestedData['action'] = view('wishlist._actions', compact('row'))->render();
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

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $request)
      {
          $totalData = Wishlist::count();
          $wishlist = Wishlist::all();

          $data = [];

          if (!empty($wishlist)) {
              foreach ($wishlist as $wishlist) {
                  $nestedData['id'] = $wishlist->id;
                  $nestedData['name'] = $wishlist->name;

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

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
        return view('wishlist.create');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \App\Http\Requests\StoreWishlistRequest  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
            try {
                $wishlist = new Wishlist();
                $wishlist->name = $request->input('name');
                $wishlist->url = $request->input('url');
                $wishlist->image = $request->file('image');
                $wishlist->price = $request->input('price');
                $wishlist->repeat = $request->input('repeat');
                $wishlist->save();
                Alert::success('Success', 'Wishlist has been created successfully');
                return redirect()->back();
            } catch (\Throwable $th) {
                // throw $th;
                Alert::error('Error', 'Something went wrong');
                return redirect()->back()->withInput();
            }
      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Models\Wishlist  $wishlist
       * @return \Illuminate\Http\Response
       */
      public function show(Wishlist $wishlist)
      {
        $wishlist = Wishlist::find($id);
        return view('wishlist.show', compact('wishlist'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\Wishlist  $wishlist
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
        $wishlist = Wishlist::find($id);
        if (!$wishlist) {
            Alert::error('Error', 'Wishlist not found');
            return redirect()->back();
        }
        return view('wishlist.edit', ['wish' => $wishlist]);
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \App\Http\Requests\UpdateWishlistRequest  $request
       * @param  \App\Models\Wishlist  $wishlist
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request)
      {
        try {
          $wishlist = Wishlist::find($request->id);
          if (!$wishlist) {
              Alert::error('Error', 'Wishlist not found');
              return redirect()->back();
          }

          $wishlist->name = $request->input('name');
          $wishlist->url = $request->input('url');
          $wishlist->image = $request->file('image');
          $wishlist->price = $request->input('price');
          $wishlist->repeat = $request->input('repeat');
          $wishlist->save();
          Alert::success('Success', 'Wishlist has been updated successfully');
          return redirect()->route('wishlist.home');
      } catch (Throwable $th) {
          Alert::error('Error', 'Something went wrong');
          return redirect()->back()->withInput();
      }
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Models\Wishlist  $wishlist
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $wishlist = Wishlist::where('id', $id)->delete();
        return response()->json('Deleted');
      }
}
