<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use DataTables;
use Illuminate\Support\Facades\URL;

class AdminNewscrudController extends Controller
{

    // Show list of news with pin counts
    public function index(Request $request) {

         if ($request->ajax()) {

            $search = $request->input('search.value');
            $start = $request->input('start') ?? 0;
            $length = $request->input('length') ?? 10;
            
            $query = News::Leftjoin('users', 'users.id', '=', 'news.created_by');

             if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('news.title', 'like', "%{$search}%")
                    ->orWhere('users.firstName', 'like', "%{$search}%");
                    // ->orWhere('users.companyName', 'like', "%{$search}%");
                });
            }

            $totalData = clone $query;
            $data = $query->select(
                    'news.*',
                    'users.firstName',
                    DB::raw('(SELECT COUNT(*) FROM news_user_pins WHERE news_user_pins.news_id = news.id) as pin_count')
            )
            ->orderBy('created_at','desc')
            ->offset($start)
            ->limit($length)
            ->get()
            ->map(function ($blog) {
        
                    $html = '';
                    $html .= '<a href="' .URL::to('/admin/news/'.$blog->id.'/edit'). '" class="btn btn-sm btn-warning" >Edit</a>';
                    $html .= '<form action="' .URL::to('/admin/news/'.$blog->id). '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this news?\')">Delete</button>
                    </form>';

                    $img = '<span class="badge bg-secondary">N/A</span>';
                    if($blog->feature_image) {
                        $img = '<img src="' . asset('/public/uploads/news/' . $blog->feature_image) . '" width="80" height="60" style="object-fit: cover;">';
                    } 

                  return [
                      $blog->id,
                      \Str::limit(strip_tags($blog->title), 40),
                      $img,
                      \Str::limit(strip_tags($blog->description), 40),
                      $blog->created_at ? $blog->created_at->toDateTimeString() : '',
                      $blog->firstName,
                      $blog->pin_count,
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


        $news = News::withCount(['pinnedUsers as pins_count'])->get();
        return view('admin.news.index', compact('news'));
    }



    // Show create form
    public function create() {
        return view('admin.news.create');
    }

    // Store new news
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'feature_image' => 'nullable|image',
            'description' => 'required',
            'date' => 'nullable|date'
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->date = $request->date;
        $news->created_by = auth()->id();

        // if ($request->hasFile('feature_image')) {
        //     $path = $request->feature_image->store('news', 'public');
        //     $news->feature_image = 'storage/' . $path;
        // }

        $news->save();

        if($request->file('feature_image')) {
            $fileName = time() . '__ff__' . $request->file('feature_image')->getClientOriginalName();
            $filePath = public_path('uploads/news');
            $request->file('feature_image')->move($filePath, $fileName);
            $news->feature_image = $fileName;
            $news->save();
        }

     

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    // Show edit form
    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }

    // Update existing news
    public function update(Request $request, News $news) {

      

        $request->validate([
            'title' => 'required|max:255',
            'feature_image' => 'nullable|image',
            'description' => 'required',
            'date' => 'nullable|date'
        ]);

        $news->title = $request->title;
        $news->description = $request->description;
        $news->date = $request->date;

        // if ($request->hasFile('feature_image')) {
        //     // dd($request->all());
        //     $path = $request->feature_image->store('news', 'public');
        //     $news->feature_image = 'storage/' . $path;
        // }

    

        $news->save();


        if($request->file('feature_image')) {
            // Remove existing thumbnail if it exists
            if ($news->avatar && file_exists(public_path('uploads/' . $news->feature_image))) {
                unlink(public_path('uploads/' . $news->feature_image));
            }
            $fileName = time() . '__ff__' . $request->file('feature_image')->getClientOriginalName();
            $filePath = public_path('uploads/news');
            $request->file('feature_image')->move($filePath, $fileName);
            $news->feature_image = $fileName;
            $news->save();
        }

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    // Delete news
    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }









    public function ajax(Request $request)
{
    if ($request->ajax()) {
        $data = News::query()
            ->with('creator') // optional if you have relation (better way than join)
            ->withCount('pinnedUsers') // now pinnedUsers_count will be auto available
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('feature_image', function($row) {
                if ($row->feature_image) {
                    return '<img src="' . asset('public/' . $row->feature_image) . '" width="80" height="60" style="object-fit: cover;">';
                } else {
                    return '<span class="badge bg-secondary">N/A</span>';
                }
            })

            ->editColumn('title', function($row) {
                return \Str::limit(strip_tags($row->title), 20);
            })

            ->editColumn('description', function($row) {
                return \Str::limit(strip_tags($row->description), 40);
            })
            ->editColumn('created_by', function($row) {
                return $row->creator->firstName ?? 'N/A'; // use relationship instead of manual join
            })
            ->editColumn('pins_count', function($row) {
                return $row->pinned_users_count ?? 0; // here it's pinned_users_count automatically
            })
            ->addColumn('action', function($row) {
                $editUrl = route('admin.news.edit', $row->id);
                $deleteUrl = route('admin.news.destroy', $row->id);

                $btn = '<a href="' . $editUrl . '" class="btn btn-sm btn-warning" >Edit</a>';
                $btn .= '<form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this news?\')">Delete</button>
                </form>';
                return $btn;
            })
            ->rawColumns(['feature_image', 'action'])
            ->make(true);
    }
}




    









}
