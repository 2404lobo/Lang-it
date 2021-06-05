<form action="{{route('user.login')}}" method="post">
    @csrf
    <input type="email" name="email" id=email value="{{old('email')}}">
    <input type="password" name="password" id="password" value="{{old('password')}}">
    <button type="submit">Login</button>
</form>