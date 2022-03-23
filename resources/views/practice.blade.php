<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body>

    <div class="p-5">
        <h1 class="text-3xl mb-4">
            livewire のCRUDサンプル
        </h1>
        <div class="grid grid-cols-2 gap-7">
            <div>
                <livewire:article-list />
            </div>
            <div>
                <button type="button" class="bg-gray-300 text-gray-700 rounded p-2 mb-5"
                onClick="Livewire.emitTo('article-input', 'create')">+ 追加する</button>
                <livewire:article-input />
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
