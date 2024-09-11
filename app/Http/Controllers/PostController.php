<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post){
         // Modelで制限掛けた投稿を$posts変数に取得してビューに渡す
         //
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show(Post $post){
        // ルートパラメータから暗黙の結合で取得した $post を 'posts.show' ビューに渡す
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Post $post){
        return view('posts.create');
    }

    // Requestインスタンスは、ユーザからのリクエスト（フォーム送信やAPIリクエストなど）を扱うために使用します。リクエストオブジェクトを引数に指定することで、コントローラ内でリクエストに含まれるデータにアクセスできます。
    // 空のPostモデルインスタンスを受け取り、これを使って新しい投稿データを保存します。Postモデルは、postsテーブルに対応しており、データベース操作を簡単に行えるようにします。
    // PostRequestインスタンスは、リクエストデータのバリデーションを行います。
    public function store(Post $post, PostRequest $request){
        // リクエストオブジェクトから'post'キーのデータを取得
        // requestオブジェクトからpostキーに対応するデータを取得します。これは、フォームから送信されたデータの一部で、通常はタイトルや本文などの情報が含まれます。HTMLフォームのname属性がこのキーと一致している必要があります。
        $input = $request['post'];
        // $postモデルに取得したデータを埋め込み（fillメソッドを使うことでinputメソッドを各要素でやるよりも簡単に代入することができる），その後、データベースに保存する（saveメソッド）
        // $inputの配列の内容をPostモデルに一括で代入します。fillableプロパティで指定された属性のみが代入可能です。これにより、例えば$post->titleや$post->bodyにリクエストデータがセットされます。
        // $postインスタンスをデータベースに保存します。内部的には、SQLのINSERT文が実行され、新しい投稿がpostsテーブルに追加されます。
        $post->fill($input)->save();
        // 保存が完了したら、保存したポストの詳細ページにリダイレクトする
        // データ保存が成功した後、その投稿の詳細ページにリダイレクトします。$post->idには、保存後の投稿のIDが格納されており、これをURLに含めることでリダイレクト先を指定しています。
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post){   
        return view('posts.edit')->with(['post' => $post]);
    }   

    public function update(PostRequest $request, Post $post){
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
}
?>