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
    
        <!-- Masthead-->
        
        
        <section class="page-section bg-light" id="">
            <div class="container">

            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Wszystkie wydarzenia</h2>
                </div>
@auth
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Data</th>
      <th scope="col">Adres</th>
      <th scope="col">Nr tel</th>
      <th scope="col">Infromacje</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($events as $event)
    <tr>
      <th scope="row">{{ $event->id }}</th>
      <td>{{ $event->name }}</td>
      <td>{{ $event->date }}</td>
      <td>{{ $event->address }}</td>
      <td>{{ $event->phone }}</td>
      <td>{{ $event->info }}</td>
      <td> @if($event->user_id == \Auth::user()->id)
      <a href="{{ route('events.edit', ['id' => $event->id]) }}" class="btn btn-primary">Edytuj</a>
      <form method="POST" action="{{ route('events.delete', ['id' => $event->id]) }}">
      @csrf
      @method('delete')
      <button type ="submit" class="btn btn-danger">Usuń</button>
      @endif
</form></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endauth

@guest
    <div class="text-center">
        <b>Zaloguj się aby przejrzeć wydarzenia.</b>
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