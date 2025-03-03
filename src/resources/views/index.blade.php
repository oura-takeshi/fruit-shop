<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://fonts.cdnfonts.com/css/jsmath-cmti10" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">mogitate</h1>
        </header>
        <div class="content">
            <div class="index">
                <div class="product-top">
                    <h2 class="product-top__heading">商品一覧</h2>
                    <div class="product-create">
                        <form action="" class="product-create__action">
                            <button class="product-create__submit button">+&nbsp;商品を追加</button>
                        </form>
                    </div>
                </div>
                <div class="product-inner">
                    <div class="search-form">
                        <form action="" class="search-form__action">
                            <input type="text" class="search-form__name-input" placeholder="商品名で検索">
                            <button type="submit" class="search-form__submit button">検索</button>
                        </form>
                    </div>
                    <div class="product-intro">
                        <div class="product-intro__cards">
                            @foreach ($products as $product)
                            <div class="product-intro__card">
                                <div class="product-intro__card-img">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="product-intro__card-content">
                                    <p class="product-intro__card-name">{{ $product->name }}</p>
                                    <p class="product-intro__card-price">&yen;{{ $product->price }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>