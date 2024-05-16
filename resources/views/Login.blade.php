<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopTech</title>
    <link rel="stylesheet" href="./css/output.css">
    <link rel="icon" type="image/png" href="https://www.autohall.ma/bundles/client/assets/images/new_images/logo.png" />
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-[Outfit] ">
    <section >
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl text-gray-900 ">
                <img src="https://www.autohall.ma/bundles/client/assets/images/new_images/logo.png">
            </a>
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class=" font-bold leading-tight tracking-tight text-gray-800 md:text-2xl text-center">
                        Technicien de la Semaine
                    </h1>
                    <h2 class=" font-bold leading-tight tracking-tight text-gray-900 md:text-xl ">Login
                    </h2>
                    <form class="space-y-4 md:space-y-6" action="{{route('check')}}" method="post">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Username </label>
                            <input type="text" name="login_resp" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5  focus:outline-orange-600"
                                placeholder="Username" required="">
                        </div>
                        @error('error')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 -white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 focus:outline-orange-600"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-600  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Login</button>
                        <p class="text-sm font-light text-gray-500 -gray-400">
                            Vous n'avez pas de compte? <br>
                            Veuillez contacter l'équipe
                            <a class="font-medium text-orange-600 ">HelpDesk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>