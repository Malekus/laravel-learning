<table class="table table-bordered table-hover my-2 table-responsive text-nowrap">
    <thead>
    <tr>
        @foreach($categories as $key => $value)
            <th scope="col" class="text-center">{{ $value }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($models as $key => $values)
        <tr class="text-center">
            <td>{{ $values->id  }}</td>
            <td>{{ $values->sexe  }}</td>
            <td>{{ $values->structure->libelle  }}</td>
            <td>{{ $values->type->libelle  }}</td>
            <td>{{ \Carbon\Carbon::parse($values->created_at)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($values->update_at)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>