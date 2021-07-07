Gelen Ad: {{ request('surname') }}
<hr>
<br>
Gelen Soyad: {{$name . ' ' . $surname}}

<form action="{{ route('admin.sendParameter') }}" method="GET">
    <input type="text" name="name", value="" placeholder="Name" >
    <input type="text" name="surname", value="" placeholder="Surname" >
    <button type="submit">Gönder</button>
</form>
