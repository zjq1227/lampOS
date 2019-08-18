@yield('bottom')

<!-- {{dump(session('href'))}} -->
<div class="footer ">
    <div class="footer-hd ">
        <p>
@foreach(session('href') as $k=>$v)
            <a href="{{$v->link}} ">{{$v->inter}}</a>
            <b>|</b>
@endforeach
        </p>
    </div>
    <div class="footer-bd ">
  @foreach(session('config') as $k=>$v)
        <p>
            <a href="# ">{{$v->name}}</a>
            <a href="# ">{{$v->beian}}</a>
            <a href="# ">联系我们</a>
            <a href="# ">网站地图</a>
            <em>{{$v->banquan}}版权所有</em>
        </p>
@endforeach
    </div>
</div>