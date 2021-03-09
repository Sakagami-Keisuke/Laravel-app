<?php

namespace App\Http\Controllers;

#DI：dependent injection
# ./vendor/laravel/framework/src/Illuminate/Http/Request.php, ./vendor/laravel/framework/src/Illuminate/Http/Concerns
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactForm;
use App\Models\ContactForm;
use App\Services\CheckFormData;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Eloquent ORMapper  オブジェクト全て取得
        $contacts = ContactForm::all();

        //一覧表示 QueryBuilder
        // $contacts = DB::table('contact_forms')
        // 取得カラム
        // ->select('id', 'your_name', 'title', 'email', 'url', 'gender', 'age', 'contact', 'created_at')
        // 降順
        // ->orderBy('created_at', 'desc')
        // 取得
        // ->get();
        // pagination
        // ->paginate(20);

        # ./resources/views/contact/index.blade.php  29 input name="search"
        $search = $request->input('search');
        // dd($request);

        //検索フォーム QueryBuilder
         // select `id`, `your_name`, `title`, `email`, `created_at` from `contact_forms` where `your_name` like '%山田%' order by `created_at` asc limit 20 offset 0
        $qb = DB::table('contact_forms');
        //もしもキーワードがあったら
        if ($search !== null) {
            //全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');
            //空白で単語を分割 空文字でないものだけ返る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
            //単語をすべてwhere句でループ
            foreach ($search_split2 as $value) {
                $qb->where('your_name', 'like', '%' . $value . '%');
            }
        }
        $qb->select('id', 'your_name', 'title', 'email', 'created_at');
        $qb->orderBy('created_at', 'asc');
        $contacts = $qb->paginate(20);


        // dd($contacts);

        #./resources/views/contact/index.blade.php
        # compact('contacts')：$contactをビュー側に返す
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #./resources/views/contact/create.blade.php
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        // インスタンス化
        $contact = new ContactForm;

        //Requestオブジェクトから取得する
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        // デバッグ
        // dd($your_name,$title,$email,$url,$gender,$age,$contact);
        // dd($contact);

        $contact->save(); #check MAMP phpMyAdmin

        return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Eloquent
        $contact = ContactForm::find($id);
        $gender = CheckFormData::checkGendar($contact);
        $age = CheckFormData::checkAge($contact);

        return view('contact.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        //Requestオブジェクトから取得する
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save(); #check MAMP phpMyAdmin

        // return redirect('contact/index');
        return view('contact.edit', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
