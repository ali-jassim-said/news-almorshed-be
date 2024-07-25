<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::asset('css/main.css') }} >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <link rel="icon" href={{ URL::asset('img/logo.png') }}>
    <title>Morshed - News - {{str_replace("_", " ", ucfirst($page))}}</title>
</head>
<body>
@include('components.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('components.layouts.header')
    <div class="container-fluid py-4">
        {{ $slot }}
    </div>
    @include('components.layouts.footer')
</main>
<script src={{ URL::asset('js/core/popper.min.js') }}></script>
<script src={{ URL::asset('js/core/bootstrap.min.js') }}></script>
<script src={{ URL::asset('js/plugins/perfect-scrollbar.min.js') }}></script>
<script src={{ URL::asset('js/plugins/smooth-scrollbar.min.js') }}></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script src={{ URL::asset('js/main.js') }}></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const easyMDE = new EasyMDE({element: document.getElementById("ar_description")});
        Livewire.on('updateEditor', (value) => {
            easyMDE.value(value[0]);
        });
        document.getElementById('post_form').addEventListener('submit', function() {
            const componentId = document.querySelector('[wire\\:id]').getAttribute('wire:id');
            const component = Livewire.find(componentId);
            component.set('ar_description', easyMDE.value());
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0jQCOq_3Fz1wLe0vCULRhdI8kpyepX_g&callback=mapInit"></script>
</body>
</html>
