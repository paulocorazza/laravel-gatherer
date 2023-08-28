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
        
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@include('footer')