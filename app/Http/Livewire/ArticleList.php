<?php

namespace App\Http\Livewire;

use Livewire\Component;

//Articleモデルの読み込み
use App\Models\Article;
//ペジネーション
use Livewire\WithPagination;

class ArticleList extends Component
{
    use WithPagination;

    // $listeners => イベントリスナー
    // 該当するメソッド呼び出す
    protected $listeners = [
        'refresh' => '$refresh', // $refreshはコンポーネントの再読み込み
        'destroy' => 'destroy'
    ];

    // 10件ずつでページング
    public function render()
    {
        $articles = Article::paginate(10);
        return view('livewire.article-list',[
            'articles' => $articles,
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
    }

}
