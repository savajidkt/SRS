<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>404 Page Not Found</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    </head>
    <style>
    .justify-center{ background-color:#00005B} 
    .items-center h1{ color: #00005B;}
    </style>
   
    <body>
        <div class="flex items-center justify-center w-screen h-screen  bg-gradient-to-r" style="back">
            <div class="px-40 py-20 bg-white rounded-md shadow-xl">
                <div class="flex flex-col items-center">
                    <h1 class="font-bold text-9xl">404</h1>

                    <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                        <span class="text-red-500">Oops!</span> Page not found
                    </h6>
                    @php
                    $messgeTemplate = getEmailTemplatesByID(22);
                    if ($messgeTemplate)
                    {
                        $paramArr = [];
                        $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                    }
                        @endphp
                            <div class="mb-8 text-center text-gray-500 md:text-lg">
                                @php
                        echo $message;
                    @endphp
                    </div>

                    <a href="{{ url('/') }}" class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">Go home</a>
                </div>
            </div>
        </div>
    </body>

</html>   