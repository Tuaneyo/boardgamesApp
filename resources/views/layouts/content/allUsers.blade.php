<div class="card mt-4">

    <!--Card content-->
    <div class="card-body">
        <div class="w-100">
            <table id="" class="table userTable table-borderless mt-3" width="100%" style="border-collapse: initial !important;" >
                <thead>
                <tr>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">active</th>
                    <th scope="col">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td valign="center">{{ $user->fname }}</td>
                        <td>{{ $user->lname }} </td>
                        <td valign="center">{{  $user->username }}</td>
                        <td>{{  $user->email  }}</td>
                        <td>
                            <span class="checkIcon checkIcon{{ (!empty($user->email_verified_at))? 'Green' : 'Red' }} round-btn">
                                <a class="btn d-flex justify-content-center align-items-center p-0">
                                    <i class="fas fa-{{ (!empty($user->email_verified_at))? 'check' : 'times' }}"></i>
                                </a>
                            </span>
                        </td>
                        <td>
                            <div class="game-data">
                                <a href="{{ route('account.user', $user->id) }}" class="btn btn-house sign-btn p-1 pr-3 pl-3 ">edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>