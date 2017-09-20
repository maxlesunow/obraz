<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReviewRequest;

use App\Review;
use App\User;


class ReviewController extends Controller
{
    //

    public function index()
    {
        return view('admin.review.index', compact('reviews'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        $users = User::get()->pluck('full_name', 'id');
        $user = $review->user()->pluck('id');

        return view('admin.review.edit', compact('review', 'users', 'user'));
    }

    public function update($id, ReviewRequest $request)
    {
        $request->merge([ 'status' => $request->has('status') ? true : false ]);

        $review = Review::findOrFail($id);

        $review->update($request->all());

        $review->user()->associate(User::findOrFail($request->input('user')));
        $review->save();

        \Session::flash('success_message', 'Отзыв успешно обновлен');
        return redirect('admin/review/'.$id.'/edit');
    }

    public function create()
    {

        $users = User::get()->pluck('full_name', 'id');
        $user = null;
        return view('admin.review.create', compact('users', 'user'));
    }

    public function store(ReviewRequest $request)
    {
        $request->merge([ 'status' => $request->has('status') ? true : false ]);

        $review = new Review($request->all());
        $review->user()->associate(User::findOrFail($request->input('user')));
        $review->save();

        \Session::flash('success_message', 'Отзыв успешно добавлен');
        return redirect('admin/review');
    }

    public function getReviews(Request $request)
    {

        $query = Review::query();

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
                $q->where('name', 'ilike', $value)
                    ->orWhere('cost', 'ilike', $value);
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

    public function destroy($ids){

        $reviews = Review::find(explode(',', $ids));

        if(count($reviews) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        Review::destroy(explode(',', $ids));

        return  response()->json($reviews);
    }

}
