@include('components.header')
@include('sweetalert::alert')
<div class="col-md-4">
    <a class="btn btn-success" href="{{ route('cards.create') }}">New Card</a>
</div>
<p></p>
<table class="table table-hover table-bordered">
<thead>
    <th class="text-center">ID</th>
    <th class="text-center">Picture</th>
    <th class="text-center">Color</th>
    <th class="text-center">Quantity</th>
    <th class="text-center">Type</th>
    <th class="text-center">Converted Mana Cost</th>
    <th class="text-center">Condition</th>
    <th class="text-center">Created At</th>
    <th class="text-center">Updated At</th> 
    <th class="text-center">Actions</th>
</thead>
<tbody>
    @foreach($cards as $card)
    @php    
        $name = preg_replace('/\s+/', '_', $card->name);    
        $search = Http::get('https://api.scryfall.com/cards/named?exact='.strtolower($name));
        $response = json_decode($search,true);
    @endphp
    <tr>
        <td scope="row"> {{ $card->id }} </td>

        <td scope="row" class="text-center">
            @if( $response["layout"] == 'transform')
            <table>
                <tr>
                    <td>
                        <img src="{{ $response["card_faces"][0]["image_uris"]["small"] }}">
                    </td>
                    <td>
                        <img src="{{ $response["card_faces"][1]["image_uris"]["small"] }}">
                    </td>
                </tr>
            </table>
            @else
            <img src="{{ $response["image_uris"]["small"] }}">    
            @endif
        </td>
        <td scope="row" class="text-center">
            @switch($card->color)
                @case("b")
                    @include('components.blackmana')
                         @break
                @case("r")
                    @include('components.redmana')
                        @break
                @case("u")
                    @include('components.bluemana')
                        @break
                @case("w")
                    @include('components.whitemana')
                        @break
                @case("g")
                    @include('components.greenmana')
                        @break
                @case("c")
                    @include('components.wastesmana')
                        @break     
            @endswitch
        </td>  
        <td scope="row" class="text-center">{{ $card->quantity }}</td> 
        <td scope="row">
            <p>{{ $card->type }}</p>
        </td> 
        <td scope="row" class="text-center"><p>{{ $card->CMC }}</p></td>
        <td scope="row" class="text-center"><p>{{ $card->condition }}</p></td>
        <td scope="row" class="text-center"><p>{{ $card->created_at }}</p></td>
        <td scope="row" class="text-center"><p>{{ $card->updated_at }}</p></td>
        <td scope="row" class="text-center">
            <a class="btn btn-sm btn-info" href="{{ route('cards.show', $card->id) }}"><i class ="fa fa-magnifying-glass"></i> More Details</a>
            <p></p>
            <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-sm btn-secondary"><i class ="fa fa-pencil"></i> Update Card</a>
            <p></p>
            <form id="{{ $card->id }}" action="/cards/delete/{{ $card->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="deleteCard(event);" id="{{ $card->name }}" type="submit" class="btn btn-sm btn-danger"><i class ="fa fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
<script>
    function deleteCard(event) {
        event.preventDefault();
        let id = document.getElementsByTagName("form")[0].id;
        let form = document.getElementById(id);
        let cardName = document.getElementsByTagName("button")[0].id;
        Swal.fire({
            title: `Do you want to delete ${cardName} ?`,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            imageUrl: 'https://cards.scryfall.io/art_crop/front/e/3/e3d323f0-334f-49d1-b338-24c4b854a112.jpg?1562489832',
            imageWidth: 600,
            imageHeight: 400
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
                Swal.fire('Done! Card deleted', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('The card was not deleted', '', 'info')
            }
        })
    }
</script>
</table>
@include('components.footer')
