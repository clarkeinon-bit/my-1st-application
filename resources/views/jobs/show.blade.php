<x-layout>

    <x-slot:heading>
        Job: {{ $job->title }}
    </x-slot:heading>

    <h2 class="font-bold text-lg">
        {{ $job->title }}
    </h2>

    <p class="mt-4">
        This job pays **{{ $job->salary }}** per year.
    </p>

    <p class="mt-6">
        <a href="/jobs/{{ $job->id }}/edit" 
           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Edit Job
        </a>
    </p>

</x-layout>