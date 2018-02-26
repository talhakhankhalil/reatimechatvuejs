<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    </head>
    <body>
       <div class="wrap" style="margin-top: 30px">
       <div class="container">
           <div class="row">
              <div class="col-md-12">LARAVEL + VUE JS CRUD Application</div>
               <div class="col-md-12">
                   <div id="app1">
                      <h2>@{{ message }}</h2>
                      <input type="text" name="" v-model="message">
                      <pre>
                        @{{$data}}
                      </pre>
                      <form v-on:submit.prevent="how">
                        <p><span class="error" v-show="!message">
                          You must enter a message
                        </span></p>                        
                        <textarea v-model="message"></textarea>
                        <input type="submit" name="submit" value="submit" class="btn btn-success btn-xs" v-show="message">
                      </form>
                      <button v-on:click="updateCount" class="btn btn-warning btn-lg">Increment counter @{{count}}</button>
                   </div>
               </div>
           </div>
       </div>
       </div>
       <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>
</html>
