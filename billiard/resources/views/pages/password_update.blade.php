<div class="container">
  <h1>Ubah Kata Sandi</h1>

  @if (session('status'))
    <div style="color: green; margin-bottom: 10px;">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div style="color: red; text-align: left; margin-bottom: 10px;">
      <ul style="padding-left: 20px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
