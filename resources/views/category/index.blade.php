<table>
    <thead>
        <tr>
            <th>id</th>
            <th>category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>