<div class="row games-row-wrap  mt-2 mb-2">
    @if($battles)
        @foreach($battles as $key => $battle)
            @if($key < 3)
                <div class="col-lg-4 col-md-4 col-12 games-row battles-row-1 mt-5 mb-5">
                    <div class=" w-100 h-100 position-relative">
                        <div class="view games">
                            <a href="{{ route('battles.show',  $battles[$key]->id ) }}">
                                <img src="{{asset( ($battles[$key]->games->image) ?  "images/games/{$battles[$key]->games->image }"   : 'images/games/battle-roman.jpg') }}" height="100%" width="100%" alt="placeholder" >
                                <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3 rgba-white-light border-slight ">
                                    <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center check">
                                        <div class="d-flex flex-column align-items-center">
                                            <span><i class="far fa-eye"></i></span>
                                            <span class="ft-20"> {{ $battles[$key]->games->name}}</span>
                                            <span class="ft-20">{{  euroDate(substr($battles[$key]->created_at, 0 , 10)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white d-flex justify-content-start w-100">
                            <div class="battle-it ">
                                <span><i class="fas fa-users"></i></span>
                                <span class="mx-2"> {{ $battles[$key]->users->username}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($key >= 3 && $key <= 4)
                <div class="col-lg-6 col-md-6 col-12 games-row battles-row-1 mt-5 mb-5">
                    <div class=" w-100 h-100 position-relative">
                        <div class="view games">
                            <a href="{{ route('battles.show',  $battles[$key]->id ) }}">
                                <img src="{{asset( ($battles[$key]->games->image) ?  "images/games/{$battles[$key]->games->image }"   : 'images/games/battle-roman.jpg') }}" height="100%" width="100%" alt="placeholder" >
                                <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3 rgba-white-light border-slight ">
                                    <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center check">
                                        <div class="d-flex flex-column align-items-center">
                                            <span><i class="far fa-eye"></i></span>
                                            <span class="ft-20"> {{ $battles[$key]->games->name}}</span>
                                            <span class="ft-20">{{  euroDate(substr($battles[$key]->created_at, 0 , 10)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white d-flex justify-content-start w-100">
                            <div class="battle-it ">
                                <span><i class="fas fa-users"></i></span>
                                <span class="mx-2"> {{ $battles[$key]->users->username}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($key >= 4)
                <div class="col-lg-3 col-md-3 col-12 games-row battles-row-1 mt-5 mb-5">
                    <div class=" w-100 h-100 position-relative">
                        <div class="view games">
                            <a href="{{ route('battles.show',  $battles[$key]->id ) }}">
                                <img src="{{asset( ($battles[$key]->games->image) ?  "images/games/{$battles[$key]->games->image }"   : 'images/games/battle-roman.jpg') }}" height="100%" width="100%" alt="placeholder" >
                                <div class="mask d-flex align-items-end waves-effect waves-light pl-4 pb-3 rgba-white-light border-slight ">
                                    <div class="position-absolute w-100 h-100 d-flex justify-content-center align-items-center check">
                                        <div class="d-flex flex-column align-items-center">
                                            <span><i class="far fa-eye"></i></span>
                                            <span class="ft-20"> {{ $battles[$key]->games->name}}</span>
                                            <span class="ft-20">{{  euroDate(substr($battles[$key]->created_at, 0 , 10)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="bg-white d-flex justify-content-start w-100">
                            <div class="battle-it ">
                                <span><i class="fas fa-users"></i></span>
                                <span class="mx-2"> {{ $battles[$key]->users->username}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach
    @endif

</div>