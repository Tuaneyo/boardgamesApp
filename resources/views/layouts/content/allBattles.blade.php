<div class="card mt-4">

    <!--Card content-->
    <div class="card-body">
        <div class="w-100">
            <table id="" class="table userTable table-borderless mt-3" width="100%" style="border-collapse: initial !important;" >
                <thead>
                <tr>
                    <th scope="col">game name</th>
                    <th scope="col">date played</th>
                    <th scope="col">total players</th>
                    <th scope="col">wonby</th>
                    <th scope="col">author</th>
                    <th scope="col">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($battles as $battle)
                    <tr>
                        <td valign="center">{{ $battle->games->name }}</td>
                        <td>{{ $battle->dtPlayed }} min</td>
                        <td valign="center">{{ count(json_decode($battle->battle_players_id)) }}</td>
                        <td>{{ $battle->wonby  }}</td>
                        <td style="color: {{ (Auth::user()->username == $battle->users->username) ? '#c77d48' : ''  }};">
                            {{ $battle->users->username}}
                        </td>
                        <td>
                            <div class="game-data">
                                <a href="{{ route('battles.edit', $battle->id) }}" class="btn btn-house sign-btn p-1 pr-3 pl-3 ">edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>