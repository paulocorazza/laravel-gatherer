@include('header')
@php    
    $name = preg_replace('/\s+/', '_', $card->name);    
    $search = Http::get('https://api.scryfall.com/cards/named?exact='.strtolower($name));
    $response = json_decode($search,true);
@endphp
<section>
    <a href="/cards">
        <button class="btn btn-warning">Go Back</button>
    </a>
</section>
<form>
    <div class="row">
        @if($response["layout"] == "normal")
            <div class="col-md-12">
                <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["image_uris"]["art_crop"] }}">
            </div>
        @else
            <div class="col-md-6">
                <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["card_faces"][0]["image_uris"]["art_crop"] }}">
            </div> 
            <div class="col-md-6">
                <img class="img-thumbnail rounded mx-auto d-block" src="{{ $response["card_faces"][1]["image_uris"]["art_crop"] }}">
            </div>     
        @endif
    </div>
    <div class="row mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{  $card->name  }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{  $card->quantity  }}"
                            disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Prices Up to Date </strong>
                                <small> - Just Now</small>
                            </div>
                            <div class="toast-body">
                                <span class="badge rounded-pill bg-success">
                                    <h6>US $ {{  $response["prices"]["usd"]  }} </h6>
                                </span>
                                <span class="badge rounded-pill bg-success">
                                    <h6>€{{  $response["prices"]["eur"]  }} </h6>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cmc">Converted Mana Cost</label>
                        <input type="number" disabled class="form-control" value="{{  $response["cmc"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="artist">Artist's name</label>
                        <input type="text" class="form-control" disabled value="{{  $response["artist"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="set">Set name - Not exactly the set you own</label>
                        <input type="text" class="form-control" disabled
                            value="{{  $response["set_name"] . ' - ' . $response["set"]  }}">
                    </div>
                </div>
            </div>
            <p></p>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cmc">Collector's Number</label>
                        <input type="number" disabled class="form-control" value="{{  $response["collector_number"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="artist">Rarity</label>
                        <input type="text" class="form-control" disabled value="{{  $response["rarity"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="set">Set Type</label>
                        <input type="text" class="form-control" disabled value="{{  $response["set_type"]  }}">
                    </div>
                </div>
            </div>
            <p></p>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cmc">Border Color</label>
                        <input type="text" disabled class="form-control" value="{{  $response["border_color"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="artist">Type</label>
                        <input type="text" class="form-control" disabled value="{{  $response["type_line"]  }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="set">Frame</label>
                        <span class="badge rounded-pill bg-info"> In 2015 Wizards of the Coast changed the
                            frame</span>
                        <input type="text" class="form-control" disabled value=" {{  $response["frame"]  }}">
                    </div>
                </div>
            </div>
            <p></p>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cmc">Legalities</label>
                        <ul>
                            @if($response["legalities"]["standard"] == "legal")
                                <li> Standard - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["standard"] == "not_legal" || $response["legalities"]["standard"] == "banned")
                                <li> Standard - <span class="badge rounded-pill bg-danger">Not Legal or Banned</span></li>
                            @endif

                            @if($response["legalities"]["pioneer"] == "legal")
                                <li> Pioneer - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["pioneer"] == "not_legal" || $response["legalities"]["pioneer"] == "banned")
                                <li> Pioneer - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif

                            @if($response["legalities"]["modern"] == "legal")
                                <li> Modern - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["modern"] == "not_legal" || $response["legalities"]["modern"] == "banned")
                                <li> Modern - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif

                            @if($response["legalities"]["legacy"] == "legal")
                                <li> Legacy - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["legacy"] == "not_legal" || $response["legalities"]["legacy"] == "banned")
                                <li> Legacy - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif

                            @if($response["legalities"]["vintage"] == "legal")
                                <li> Vintage - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["vintage"] == "not_legal" || $response["legalities"]["vintage"] == "banned")
                                <li> Vintage - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif

                            @if($response["legalities"]["pauper"] == "legal")
                                <li> Pauper - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["pauper"] == "not_legal" || $response["legalities"]["pauper"] == "banned")
                                <li> Pauper - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif

                            @if($response["legalities"]["commander"] == "legal")
                                <li> Commander - <span class="badge rounded-pill bg-success">Legal</span></li>
                            @elseif($response["legalities"]["commander"] == "not_legal" || $response["legalities"]["commander"] == "banned")
                                <li> Commander - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="oracle">Oracle Text</label>
                        @if($response["layout"] == "normal")
                        <textarea class="form-control" rows="5" disabled >{{  $response["oracle_text"]  }}</textarea>
                        @else
                        <textarea class="form-control" rows="5" disabled >{{  $response["card_faces"][0]["oracle_text"]  }}</textarea>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    @isset( $response["flavor_text"] )
                    <div class="form-group">
                        <label for="oracle">Flavor Text</label>
                        <textarea class="form-control" id="flavor" rows="5" disabled >{{  $response["flavor_text"]  }}</textarea>
                    </div>
                    @endisset   
                </div>
            </div>
           <p></p>
           <hr>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="btn btn-secondary" href="{{  $response["related_uris"]["gatherer"]  }}" class="text-white" >Gatherer</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="btn btn-secondary" href="{{  $response["related_uris"]["tcgplayer_infinite_articles"]  }}" class="text-white" >TCG Player</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="btn btn-secondary" href="{{  $response["related_uris"]["tcgplayer_infinite_decks"]  }}" class="text-white" >TCG Player Decks</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="btn btn-secondary" href="https://scryfall.com/search?as=grid&order=name&q={{ $card->name }}+(game%3Apaper)" class="text-white" >Scryfall</a>
                    </div>
                </div>

                
                <div class="col-md-2">
                    <div class="form-group">
                        @php
                        $lowerName = strtolower($card->name);
                        $name = preg_replace('/\s+/', '-',$lowerName);
                        @endphp   
                        <a class="btn btn-secondary" href="https://edhrec.com/cards/{{$name}}" class="text-white" >edhrec</a>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="btn btn-secondary" href="https://www.ligamagic.com.br/?view=cards/card&card={{ $card->name }}" class="text-white" >LigaMagic</a>
                    </div>
                </div>
            </div>
            <hr>    
        </div>
    </div>
</form>
@include('footer')