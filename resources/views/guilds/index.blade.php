@include('header')
<table class="table table-hover table-bordered">
    <thead>
        <th class="text-center">Name</th>
        <th class="text-center">Colours</th>
        <th class="text-center">Actions</th>
    </thead>
    <tbody>
        @foreach($guilds as $guild)
        <tr>
            <td>{{ $guild->name }}</td>
            <td class="text-center">
                @switch($guild->colours)
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
                @case("ur")
                @include('components.ravnica-guilds.izzet')
                @break
                @case("rw")
                @include('components.ravnica-guilds.boros')
                @break
                @case("rub")
                @include('components.alara-shards.grixis')
                @break
                @endswitch
            </td>
            <td class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".exampleModal">
                    View Bio
                </button>

            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center">{{$guild->name}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="10">
                            {{ $guild->bio }}
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@include('footer')
