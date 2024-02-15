<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto px-4 py-8">

        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h1>
            <p class="text-lg text-gray-600">{{ $user->JobTitle }}</p>
            <img src="{{ asset('storage/images/' . $user->image) }}" alt="User Image"
                class="w-32 h-32 mx-auto mt-4 rounded-full">
        </header>
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h2>
            <ul>
                @foreach ($cursuses as $cursus)
                    <li class="mb-2">{{ $cursus->name }}</li>
                @endforeach
                <li><strong class="font-semibold">Phone:</strong> (123) 456-7890</li>
                <li><strong class="font-semibold">Address:</strong> 123 Street, City, Country</li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Education</h2>
            <ul>
                @foreach ($cursuses as $cursus)
                    <li class="mb-2"><strong class="font-semibold">{{ $cursus->institution }}</strong>
                        {{ $cursus->degree }} ({{ $cursus->start_year }} - {{ $cursus->end_year }})
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Experience</h2>
            <ul>
                @foreach ($experiences as $experience)
                    <li class="mb-2"><strong class="font-semibold">{{ $experience->company }} :</strong>
                        {{ $experience->position }} ({{ $experience->start_year }} - {{ $experience->end_year }})
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Skills</h2>
            <ul>
                @foreach ($competences as $competence)
                    <li class="mb-2">{{ $competence->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Languages</h2>
            <ul>
                @foreach ($languages as $language)
                    <li class="mb-2"><strong class="font-semibold">{{ $language->language }} :</strong>
                        {{ $language->proficiency }}
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('generate.pdf') }}"
            class="block w-full max-w-xs mx-auto bg-green-500 hover:bg-green-600 text-white font-semibold text-center rounded p-3">Download
            PDF</a>

    </div>
</body>

</html>
