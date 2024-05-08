<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @auth
    <div style="border: 3px solid black;">
        
        <h2>Congrats, you are logged in!</h2>
        <form action="/logout" method="POST">
            @csrf            
            <button>Log out</button>
        </form>

        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf         
            <input type="text" name="title" placeholder="title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Create post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Posts</h2>
        @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>                
                </form>
            </div>
        @endforeach

    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" placeholder="Name">
            <input type="password" name="loginPassword" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth

</body>

</html>