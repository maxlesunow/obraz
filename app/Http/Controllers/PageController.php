<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::paginate(10);

        return view('admin.page.index', compact('pages'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit', compact('page'));
    }

    public function update($id, PageRequest $request)
    {
        $page = Page::findOrFail($id);

        $page->update($request->all());


        \Session::flash('success_message', 'страница "' . $page->name . '" успешно обновлен');
        return redirect('admin/course/type/'.$id.'/edit');
    }


    public function getPages(Request $request)
    {

        $query = Page::query();

        //Сортировка
        if (request()->has('sort')) {
            // Мультисортировка
            $sorts = explode(',', request()->sort);
            foreach ($sorts as $sort) {
                if($sort){
                    list($sortCol, $sortDir) = explode('|', $sort);
                    $query = $query->orderBy($sortCol, $sortDir);
                }
            }
        } else {
            $query = $query->orderBy('id', 'asc');
        }

        //Фильтрация
        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('name', 'ilike', $value);
            });
        }
        //Пагинация
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $pagination = $query->paginate($perPage);
        $pagination->appends([
            'sort' => request()->sort,
            'filter' => request()->filter,
            'per_page' => request()->per_page
        ]);

        return response()->json($pagination);
    }

}
