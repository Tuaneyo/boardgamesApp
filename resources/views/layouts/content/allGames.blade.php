<div class="card mt-4">

    <!--Card content-->
    <div class="card-body">
        <div class="w-100">
            <table class="table userTable table-borderless mt-3" width="100%" style="border-collapse: initial !important;" >
                <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">nop</th>
                    <th scope="col">dor</th>
                    <th scope="col">duration</th>
                    <th scope="col">publisher</th>
                    <th scope="col">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td valign="center">{{ $game->name }}</td>
                        <td valign="center">{{ $game->nop }}</td>
                        <td>{{ $game->dor }}</td>
                        <td>{{ $game->duration }} min</td>
                        <td style="color: {{ (Auth::user()->username == $game->users->username) ? '#c77d48' : ''  }};">
                            {{ $game->users->username}}
                        </td>
                        <td>
                            <div class="game-data">
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-house sign-btn p-1 pr-3 pl-3 ">edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>