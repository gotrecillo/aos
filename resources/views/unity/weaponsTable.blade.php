<table class="table table-bordered">
    @include('unity.weaponsTableHeader', ['type' => $type])
    @foreach($attacks as $attack)
        <tr>
            <td>{{$attack->name}}</td>
            <td>{{$attack->range}}</td>
            <td>{{$attack->attacks}}</td>
            <td>{{$attack->hit}}</td>
            <td>{{$attack->wound}}</td>
            <td>{{$attack->rend}}</td>
            <td>{{$attack->damage}}</td>
        </tr>
    @endforeach
</table>