@include('header')
@include('sweetalert::alert')
@php    
    $name = preg_replace('/\s+/', '_', $card->name);    
    $search = Http::get('https://api.scryfall.com/cards/named?exact='.strtolower($name));
    $response = json_decode($search,true);
@endphp
<main>
    <div class="container">
        <a href="/cards" class="btn btn-warning">Go back</a>
        <form method="POST" action="{{ route('cards.update', $card->id )}}" >
            @csrf
            @method('PATCH')
            <hr>
               @if($errors->any())
               <div class="alert alert-danger">
                   <p>Something went wrong!</p>
                   <ul>
                       @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif

               <div class="row">
                    <div class="col-md-12">
                        @if($response["layout"] == "normal")
                        <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["image_uris"]["art_crop"] }}">
                        @else
                        <div>
                            <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["card_faces"][0]["image_uris"]["art_crop"] }}">
                        </div>
                        <div>
                            <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["card_faces"][1]["image_uris"]["art_crop"] }}">
                        </div>
                        @endif
                    </div>
               </div>
              
               <div class="row">
                    <div class="col-md-6">  
                        <div class="form-col">
                            <label for="name" class="label-form">Card Name:</label>
                            <input type="text" name="name" class="form-control" @isset($card->name) value="{{ $card->name }}" @endisset  disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-col">
                            <label for="condition" class="label-form">Card Condition:</label>
                            <select class="form-select"  name="condition" required>
                                <option value="{{ $card->condition }}">{{ $card->condition }}</option>
                                <option value="m">Mint</option>
                                <option value="nm">near mint</option>
                                <option value="sp">spreadly played</option>
                                <option value="mp">moderated played</option>
                                <option value="hp">heavily played</option>
                                <option value="d">damaged</option>
                           </select>
                       </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-col">
                            <label for="quantity" class="label-form">Quantity:</label>
                            <input type="number" value="{{ $card->quantity }}" name="quantity" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-col">
                            <label for="cmc" class="label-form">Converted Mana Cost</label>
                            <input type="number" value="{{ $card->CMC }}" name="CMC" class="form-control" required>
                        </div>
                    </div>
               </div>
            </div>
            <hr>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</main>
@include('footer')