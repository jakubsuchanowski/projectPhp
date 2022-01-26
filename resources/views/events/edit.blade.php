<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FTBL Squad</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href= "{{ asset ('css/styles.css') }}" rel="stylesheet" />
    </head>
    
    <body id="page-top">
    @include('layouts.navbar')
        
       <section class="page-section" id="">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Edytujesz wydarzenie {{ $event->id }}</h2>
 @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
  @endif              
@auth
<form role="form"  action="{{ route('events.update', ['id'=> $event -> id]) }}" name="sentMessage" id="comment-form" method="POST" > 
    {{csrf_field() }}
    @method('PUT')
  <fieldset>
    <div class="form-group">
    <div class="form-group{{ $errors->has('name')?'has-error':'' }}" id="roles_box">
      <label>Nazwa wydarzenia</label>
      <input value= "{{ $event->name }}" type="text" class="form-control" id="name" name="name"  placeholder="Nazwa wydarzenia">
    </div>
    </div>
    <div class="form-group">
    <div class="form-group{{ $errors->has('date')?'has-error':'' }}" id="roles_box">
      <label>Data wydarzenia</label>
      <input value= "{{$event->date}}" type="date" class="form-control" id="date" name="date" placeholder="Data">
    </div>
    </div>
    <div class="form-group">
    <div class="form-group{{ $errors->has('address')?'has-error':'' }}" id="roles_box">
      <label>Adres</label>
      <input value= "{{$event->address}}" type="text" class="form-control" id="address" name="address" placeholder="Adres">
   </div>
    </div>
    <div class="form-group">
    <div class="form-group{{ $errors->has('phone')?'has-error':'' }}" id="roles_box">
      <label>Numer telefonu do zgłaszającego</label>
      <input value= "{{$event->phone}}" type="tel" class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" pattern="[0-9]{9}" />
    </div>
    </div>
    <div class="form-group">
    <div class="form-group{{ $errors->has('info')?'has-error':'' }}" id="roles_box">
      <label>Dodatkowe informacje</label>
      <input value= "{{$event->info}}" class="form-control" id="info" name="info" rows="3"></textarea>
      </div>
 </div>
    <button type="submit" id="sendMessageButton" class="btn btn-primary">Zapisz edycje</button>
  </fieldset>
</form>
@endauth
@guest
    <div class="table-container">
        <b>Zaloguj się aby edytować wydarzenie.</b>
    </div>    
    @endguest
            </div>
        </section>
        @include('layouts.footer')
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>