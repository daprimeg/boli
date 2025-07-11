<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon; // Add this at the top if not already



class BlogCategoryController extends Controller
{



    public function index(Request $request)
{


     if ($request->ajax()) {


            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;

            $query = BlogCategory::query();

             if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('blog_categories.name', 'like', "%{$search}%");
                });
            }

            $totalData = clone $query;
            

            $data = $query->select(
                    'blog_categories.*',
            )
            ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($blog) {


                    $editUrl = route('blogcategories.edit', $blog->id);
                    $deleteUrl = route('blogcategories.destroy', $blog->id);

                    $html =  '<a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="' . $deleteUrl . '" style="display:inline-block">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>';

                  return [
                      $blog->id,
                      $blog->name,
                      $blog->created_at ? $blog->created_at->toDateTimeString() : '',
                      $html,
                  ];
              });

    
                return  [
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => $totalData->count(),
                    "recordsFiltered" => $totalData->count(),
                    "data" => $data
                ];
        }



    return view('admin.blogcategories.index'); // no need to compact('categories')
}




public function getAjaxData(Request $request)
{
    if ($request->ajax()) {
        $data = BlogCategory::select(['id', 'name', 'created_at']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d M Y'); // 👉 "22 Apr 2025"
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('blogcategories.edit', $row->id);
                $deleteUrl = route('blogcategories.destroy', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="' . $deleteUrl . '" style="display:inline-block">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}







    public function create()
    {
        return view('admin.blogcategories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        BlogCategory::create($request->all());
        return redirect()->route('blogcategories.index')->with('success', 'Category added.');
    }

    public function edit(BlogCategory $blogcategory)
    {
        return view('admin.blogcategories.edit', compact('blogcategory'));
    }

    public function update(Request $request, BlogCategory $blogcategory)
    {
        $request->validate(['name' => 'required']);
        $blogcategory->update($request->all());
        return redirect()->route('blogcategories.index')->with('success', 'Category updated.');
    }

    public function destroy(BlogCategory $blogcategory)
    {
        $blogcategory->delete();
        return redirect()->route('blogcategories.index')->with('success', 'Category deleted.');
    }
}
