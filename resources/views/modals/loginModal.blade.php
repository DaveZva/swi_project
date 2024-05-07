<!-- Modal pro přihlášení -->
<div id="login-modal" class="modal">
  <div class="modal-content">
    <span class="close" id="close-login">&times;</span>
    <form action="{{ route('login') }}" method="post">
      @csrf
      <input type="text" placeholder="E-mail" name="email">
      <input type="password" placeholder="Heslo" name="password">
      <button type="submit">Přihlásit se</button>
    </form>
    <p>Nemáte účet? <a href="{{ route('registration') }}">Zaregistrujte se</a></p>
  </div>
</div>