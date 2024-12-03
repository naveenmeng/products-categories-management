<div>
    <h1>update the data</h1>
    <form action="" method="post">
        <input type="hidden" name="_method" value="put">
        @csrf
        <input type="text" name="name" value="{{$user->name}}" placeholder="name">
        <br>
        <br>
        <input type="text" class="email" name="email" value="{{$user->email}}" placeholder="email">
        <br><br>
        <input type="text" class="password" name="password" value="{{$user->password}}" placeholder="password">
        <br><br>
        <button>update</button>
        <a href="/">Cancel</a>
    </form>
</div>
