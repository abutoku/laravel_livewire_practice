<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    @livewireStyles
</head>
<body>
    <h1>Hello Livewire</h1>
    <a href="{{ route('practice') }}">リンク</a>
    {{-- livewireのコンポーネントを表示 --}}
    <livewire:counter>

    @livewireScripts
</body>
</html>
