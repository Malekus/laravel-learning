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
            <td>{{ $values->deplacement  }}</td>
            <td>{{ $values->duree  }}</td>
            <td>{{ \Carbon\Carbon::parse($values->dateAction)->format('d/m/Y') }}</td>
            <td>{{ $values->information  }}</td>
            <td>{{ $values->droitOuvert  }}</td>
            <td>{{ $values->maintienDroit  }}</td>
            <td>{{ $values->conflit  }}</td>
            <td>{{ $values->perduDeVue  }}</td>
            <td>{{ $values->judiciarisation  }}</td>
            <td>{{ $values->avancement  }}</td>
            <td>{{ $values->probleme->id  }}</td>
            <td>{{ $values->action->libelle  }}</td>
            <td>{{ $values->complement->libelle  }}</td>
            <td>{{ \Carbon\Carbon::parse($values->created_at)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($values->update_at)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>