<form method="POST" action="{{$action ?? '#'}}">
    @csrf
    @method('POST')
    <button
        type="submit"
        class="inline-flex items-center gap-2
               bg-emerald-500 hover:bg-emerald-600
               text-white text-sm font-medium
               px-4 py-2 rounded-md
               transition">
        Check in
        <span class="text-base leading-none">›</span>
    </button>
</form>