<table class="table table-bordered table-hover my-2">
    <thead>
    <tr>
        <th scope="col">#</th>
        @foreach($categories as $key => $value)
            <th scope="col">{{ $value }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
        @foreach($models as $key => $values)
            <tr>
            <th scope="row">{{ $key + 1 }}</th>
                @foreach($values->getAttributes() as $value)
                <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>