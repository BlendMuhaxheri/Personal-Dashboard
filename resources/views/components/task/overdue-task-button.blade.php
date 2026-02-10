<form method="POST" action="{{$action ?? '#'}}">
    @csrf
    @method('PATCH')
    <button
        type="submit"
        class="inline-flex items-center gap-2
               bg-red-500 hover:bg-red-700
               text-white text-sm font-medium
               px-4 py-2 rounded-md
               transition">
        Mark overdue task complete
        <span class="text-base leading-none">›</span>
    </button>
</form>