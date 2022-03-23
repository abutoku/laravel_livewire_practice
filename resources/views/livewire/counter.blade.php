<div>
    {{-- 複数の要素があるとエラーになるため<div>で囲って一つにまとめる --}}

    <div>
        {{-- <h1>初めてのLivewire</h1> --}}

        {{-- 変数を使う --}}
        <h2>{{ $count }}</h2>
        {{-- クリックイベント --}}
        <p><button wire:click='inc'>+1</button></p>

        {{-- バインディング --}}
        <input type="text" wire:model="message">{{ $message }}

        {{-- if文 --}}
        @if(!$message)
        <p style="color:red;font-weight:bold">文字を入力してください。</p>
        @else
        <p>文字を入力しました。</p>
        @endif
    </div>

    <div>
        {{-- ユーザ一覧の表示、削除 --}}
        <h2>ユーザ一覧</h2>
        <ul>
            @foreach($users as $user)
            <li>{{ $user->name }} <button wire:click="delUser({{ $user->id }})">削除</button>
            @endforeach
        </ul>
    </div>

    

</div>
