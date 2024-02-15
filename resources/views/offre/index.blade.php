<x-app-layout>
    <h1 class="text-center text-3xl">Offres</h1>

    <div class="flex justify-center mt-10">
        <div class="max-w-3xl w-full">
            @foreach ($offres as $offre)
            <div class="mb-8">
                <div class="bg-white rounded-lg shadow-lg dark:shadow-black/20 p-6">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/198.jpg"
                        class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="image" />

                    <div class="mb-6 flex items-center">
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="mr-2 h-8 rounded-full"
                            alt="avatar" loading="lazy" />
                        <div>
                            <span> Published <u>{{ $offre->created_at }}</u> by </span>
                            <a href="#!" class="font-medium">{{ $offre->user?->name }}</a>
                        </div>
                    </div>

                    <h1 class="mb-6 text-3xl font-bold">
                        {{ $offre->titre }}
                    </h1>

                    <p class="break-words">
                        {{ Str::limit($offre->description, 100) }}
                    </p>

                    <div class="flex mt-4">
                        <div class="mr-4">
                            <strong>Compétences:</strong> {{ $offre->compétences_requises }}
                        </div>
                        <div class="mr-4">
                            <strong>Localisation:</strong> {{ $offre->emplacement }}
                        </div>
                        <div>
                            <strong>Type de contrat:</strong> {{ $offre->type_contrat }}
                        </div>
                    </div>

                    @if (!(Auth()->user()->entreprise))
                    <div class="mt-6 text-right">
                        <button class="border rounded bg-green-400 p-2 postuler-btn"
                            data-offre-id="{{ $offre->id }}">Apply</button>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        // Écoute les clics sur les boutons "Postuler"
document.querySelectorAll('.postuler-btn').forEach(button => {
button.addEventListener('click', function() {
    const offreId = this.getAttribute('data-offre-id');
    postuler(offreId);
});
});

function postuler(offreId) {
// You can use either route parameter or query parameter depending on your route definition
const url = "{{ route('postuler', ':offreId') }}".replace(':offreId', offreId);

$.ajax({
    url: url,
    method: "POST",
    data: {
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
    Swal.fire({
        icon: 'success',
        title: 'Applyed!',
        text: response.message,
        showConfirmButton: false,
        timer: 1500,
        // Personnalisation du style
        customClass: {
            popup: 'my-custom-popup-class',
            title: 'my-custom-title-class',
            content: 'my-custom-content-class',
        },
    });
},

    error: function(xhr, status, error) {
        // Gérer les erreurs de la demande Ajax si nécessaire
        console.error(error);
    }
});
}
    </script>
</x-app-layout>

