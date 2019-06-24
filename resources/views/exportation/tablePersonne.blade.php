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
            <td>{{ $values->id }}</td>
            <td>{{ $values->date_naissance }}</td>
            <td>{{ $values->sexe }}</td>
            <td>{{ $values->enfant }}</td>
            <td>{{ $values->csp->libelle }}</td>
            <td>{{ $values->categorie->libelle }}</td>
            <td>{{ $values->nationalite }}</td>
            <td>{{ $values->logement->libelle }}</td>
            <td>{{ $values->scolarite->libelle }}</td>
            <td>{{ $values->situation->libelle }}</td>
            <td>{{ $values->telephone ? '1' : '0' }}</td>
            <td>{{ $values->email ? '1' : '0' }}</td>
            <td>{{ $values->adresse ? '1' : '0' }}</td>
            <td>{{ $values->code_postale }}</td>
            <td>{{ $values->ville }}</td>
            <td>{{ $values->prioritaire }}</td>
            <td>{{ $values->matricule_caf }}</td>
            <td>{{ \Carbon\Carbon::parse($values->created_at)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($values->update_at)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>