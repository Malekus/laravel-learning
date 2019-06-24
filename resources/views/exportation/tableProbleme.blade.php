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
            <td>{{ $values->resolu  }}</td>
            <td>{{ \Carbon\Carbon::parse($values->date_probleme)->format('d/m/Y')}}</td>
            <td>{{ $values->personne ? $values->personne->id : 'null' }}</td>
            <td>{{ $values->partenaire  ? $values->partenaire->id : 'null'}}</td>
            <td>{{ $values->categorie->libelle  }}</td>
            <td>{{ $values->type->libelle  }}</td>
            <td>{{ $values->accompagnement->libelle  }}</td>
            <td>{{ \Carbon\Carbon::parse($values->created_at)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($values->update_at)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>