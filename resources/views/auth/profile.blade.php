<x-default-layout title="Profile" section_title="Profile">
  <div class="max-w-xl mx-auto bg-white border-t-4 border-green-500 rounded-xl shadow-md overflow-hidden">
    <div class="flex flex-col items-center gap-6 p-6">

      {{-- Avatar --}}
      <div>
        <div class="w-24 h-24 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-3xl font-bold">
          {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
      </div>

      {{-- Nama, Email, Role --}}
      <div class="text-center">
        <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
        <p class="text-sm text-gray-500 mt-1">{{ $user->email }}</p>
        <span class="inline-block mt-2 px-3 py-1 text-sm bg-green-50 text-green-700 border border-green-200 rounded-full">
          {{ ucfirst($user->role) }}
        </span>
      </div>

      {{-- Detail Fields --}}
      <div class="w-full mt-4 space-y-4">
        <div>
          <div class="text-sm text-gray-500">Name</div>
          <div class="mt-1 text-gray-800 font-medium px-4 py-2 border border-gray-200 rounded bg-gray-50">
            {{ $user->name }}
          </div>
        </div>
        <div>
          <div class="text-sm text-gray-500">Email</div>
          <div class="mt-1 text-gray-800 font-medium px-4 py-2 border border-gray-200 rounded bg-gray-50">
            {{ $user->email }}
          </div>
        </div>
        <div>
          <div class="text-sm text-gray-500">Role</div>
          <div class="mt-1 text-gray-800 font-medium px-4 py-2 border border-gray-200 rounded bg-gray-50">
            {{ ucfirst($user->role) }}
          </div>
        </div>
      </div>

      {{-- Logout --}}
      <form action="{{ route('auth.logout') }}" method="POST" class="mt-6 w-full">
        @csrf
        @method('DELETE')
        <button
          type="submit"
          class="w-full text-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 transition">
          Logout
        </button>
      </form>

    </div>
  </div>
</x-default-layout>
