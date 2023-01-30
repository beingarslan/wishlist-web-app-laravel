<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
  public function categories()
  {
      return view('categories.index');
  }
  public function list (Request $request)
  {
      try {
          $totalData = Category::count();
          $totalFiltered = $totalData;

          $limit = $request->input('length');
          $start = $request->input('start');
          $order = 'id';
          $dir = $request->input('order.0.dir');
          if (empty($request->input('search.value'))) {
              $results = Category::offset($start)
                  ->limit($limit)
                  ->orderBy($order, $dir)
                  ->get();
          } else {
              $search = $request->input('search.value');

              $results = Category::search($search)
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
                  $nestedData['action'] = view('categories._actions', compact('row'))->render();
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
        $totalData = Category::count();
        $categories = Category::all();

        $data = [];

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $nestedData['id'] = $category->id;
                $nestedData['name'] = $category->name;

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
      return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          try {
              $category = new Category();
              $category->name = $request->name;
              $category->save();
              Alert::success('Success', 'Category has been created successfully');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      $category = Category::find($id);
      return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);
      if (!$category) {
          Alert::error('Error', 'Category not found');
          return redirect()->back();
      }
      return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try {
        $category = Category::find($request->id);
        if (!$category) {
            Alert::error('Error', 'Category not found');
            return redirect()->back();
        }
        $category->name = $request->name;
        $category->save();
        Alert::success('Success', 'Category has been updated successfully');
        return redirect()->route('categories.home');
    } catch (Throwable $th) {
        Alert::error('Error', 'Something went wrong');
        return redirect()->back()->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::where('id', $id)->delete();
      return response()->json('Deleted');
    }
}
