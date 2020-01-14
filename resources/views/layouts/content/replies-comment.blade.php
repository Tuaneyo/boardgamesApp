@foreach($comments as $key => $comment)
    <div class="col-12 my-4">
        <div class="row comment-wrap">
            <div class="col-2">
                <div class="comment-img">
                    <img src="{{ asset('img/pictures/avatar2.png') }}" class="img-fluid "
                         width="100%" height="100%"/>
                </div>
            </div>
            <div class="col-10">
                <div class="comment-body w-100">
                    <div class="card ownCard bg-transparent p-0 w-100 position-relative comment-card">
                        <div class="card-header bg-white p-3">{{ $comment->users->username }}</div>
                        <div class="card-body p-3">{{ $comment->body }}</div>
                        <div class="card-footer p-3 d-flex justify-content-between bg-white no-border font-roboto">
                            <small><i class="fas fa-calendar-alt text-black-50 "></i> {{ ($comment->calcDuration()['hours'] > 0)
                                            ? $comment->calcDuration()['hours'] . ' hours ago'
                                            : $comment->calcDuration()['minutes'] . ' minutes ago' }}</small>
                            <a class="replyToggle" class="text-primary">
                                <small><i class="fas fa-reply-all"></i>reply</small>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-10 mt-4">
                <form  class="w-100 text-right formReply reply-wrap">
                    @csrf
                    <textarea class="form-control no-radius mb-4 comment" name="comment" id="addComment" rows="3" placeholder="reply on comment "></textarea>
                    <input type="hidden" name="gameid" value="{{ $game->id }}" class="gameid" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}"  class="commentid"/>
                    <button type="submit" class="waves-effect waves-dark btn bg-home-color-brown next-step m-0 pt-2 pb-2 text-white no-radius replySubmit">save reply</button>
                </form>

                @if($comment->replies)
                    @foreach($comment->replies as $k => $reply)
                        <div class="row comment-wrap my-4 ">
                            <div class="col-2">
                                <div class="comment-img">
                                    <img src="{{ asset('img/pictures/avatar2.png') }}" class="img-fluid "
                                         width="100%" height="100%"/>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="comment-body w-100">
                                    <div class="card ownCard bg-transparent p-0 w-100 position-relative comment-card">
                                        <div class="card-header bg-white p-3">{{ $reply->users->username }}</div>
                                        <div class="card-body p-3">{{ $reply->body }}</div>
                                        <div class="card-footer p-3 d-flex justify-content-between bg-white no-border font-roboto">
                                            <small><i class="fas fa-calendar-alt text-black-50 "></i> {{ ($reply->calcDuration()['hours'] > 0)
                                                ? $reply->calcDuration()['hours'] . ' hours ago'
                                                : $reply->calcDuration()['minutes'] . ' minutes ago' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>


    </div>
@endforeach