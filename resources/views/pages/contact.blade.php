@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="my-5 title">INFORMATIONS DE CONTACT</h3>
                <p class="h5 text-muted text-justify description mt-3 mb-5">
                    Boulevard 2 mars, Casablanca<br>
                    Télèphone : 06.61.20.99.11 <br>
                    Du Lundi au Vendredi - De 9h à 17h
                </p>
            </div>
            <div class="col-md-8">

                <h3 class="my-5 title">FORMULAIRE DE CONTACT</h3>
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="email" name="email" id="email" class="col-md-8 form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message :</label>
                       <textarea name="message" id="message" rows="5" class="col-md-8 form-control" placeholder="Votre message...">

                       </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary bnt-block" value="Envoyer message">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
