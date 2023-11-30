@foreach ($data as $item)
   <div class="media">
      <a href="{{route('home.show',$item->id)}}" class="pull-left">
         <img src="{{url("public/uploads")}}/{{$item->image}}" width="50" alt="" class="media-object">
      </a>
      <div class="media-body">
         <h5 class="media-heading">{{$item->name}}</h5>
         <p>{{$item->category()->first()->name}}</p>
      </div>
   </div>
@endforeach