@if($external->type == 0)
    <div class="card" style="margin-bottom: 1em;">
        <div class="card-header">
            <i style="color: #db0e0e;" class="fab fa-youtube"></i>
            @if($external->author !== NULL and $external->song_lyric !== NULL)
                {!! $external->author->getLink() !!} - <a
                        href="{{$external->song_lyric->getLink()}}">{{$external->song_lyric->name}}</a>
            @endif
        </div>

        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="{{$external->getEmbedUrl()}}" frameborder="0"
                    allowfullscreen></iframe>
        </div>
    </div>
@elseif($external->type == 1)
    <iframe src="{{$external->url}}" width="100%" height="80" frameborder="0"
            allowtransparency="true" allow="encrypted-media"></iframe>
@else
    <div class="card" style="margin-bottom: 1em;">Wrong external media type.</div>
@endif