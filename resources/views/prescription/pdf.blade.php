<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prescription</title>
</head>

<body class="dark:bg-gray-800 dark:text-white">
    {{-- <style>
        .page-break {
            page-break-after: always;
        }

        .background {
            background-color: brown;
        }
    </style> --}}
    <h1>{{ $prescription->advice }}</h1>
    <table class="table table-bordered">
        <tr>
            <td>Drug</td>
            <td>option</td>
            <td>duration</td>
        </tr>
        @foreach ($prescription->drugs as $item)
            <tr>
                <td>{{ $item->drug_id }}</td>
                <td>{{ $item->option_id }}</td>
                <td>{{ $item->duration }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
