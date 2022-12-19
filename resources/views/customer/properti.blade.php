<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href={{asset("images/favicon.png")}} />
    @vite('resources/js/app.js')
    <title>{{$prop->name}}</title>
</head>
<body>
    <div class="tw-w-full tw-h-auto tw-flex tw-flex-col tw-justify-center tw-items-center">
        <img 
            src={{asset('storage/'. $prop->baner_filename)}} 
            alt="baner" 
            class="tw-w-full tw-h-auto sm:tw-w-[70%] ">
        <img src={{asset('images/chat-wa.png')}} alt="" class="tw-w-[200px] md:tw-w-[300px] tw-h-auto">
    </div>
</body>
</html>