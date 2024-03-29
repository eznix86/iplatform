@props(['id', 'width'=>'w-[17rem]'])

<div class="relative {{ $width }}">
    <div wire:ignore>
        <x-input-slim {{ $attributes }} id="{{ $id }}" placeholder="Select date" readonly />
    </div>
    <div class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-neutral-400 hover:text-neutral-500">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
    </div>
</div>


@push('scripts')
<script>
    var picker = new Pikaday({
        field: document.getElementById("{{ $id }}")
        , format: 'YYYY-MM-DD'
        , theme: "pikaday-white"
        , toString(date, format) {
            var d = new Date(date)
                , month = '' + (d.getMonth() + 1)
                , day = '' + d.getDate()
                , year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
        , parse(dateString, format) {
            let parts = dateString.split('-');
            console.log(parts)
            return new Date(parts[0], parts[2], parts[1]);
        }
    });

</script>
@endpush
