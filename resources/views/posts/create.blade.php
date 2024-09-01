<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyBlog</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Create a post</h1>
        <form action="/posts" method="post">
            @csrf
            <div class='title'>
                <h2>Title</h2>
                <input type='text' name='post[title]' placeholder='タイトル' value="{{ old('post.title') }}"/>
                <p class='title_error' style='color:red'> {{ $errors->first('post.title') }} </p>
            </div>
            <div class='body'>
                <h2>Body</h2>
                <textarea name='post[body]' placeholder='今日もおつかれ'>{{ old('post.body') }}</textarea>
                <p class='body_error' style='color:red'> {{ $errors->first('post.body') }} </p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class='footer'>
            <a href='/'>もどる</a>
        </div>
    </body>
</html>