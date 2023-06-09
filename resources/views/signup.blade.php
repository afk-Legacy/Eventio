<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body>
    <form action="{{route('register')}}" method="get">
        <div class="border-b-2">
            <a class="bg-red-100" href="/"><img src="{{asset('/imgs/logo.svg')}}" width="164px"></a>
        </div>

        <div class="md:flex md:justify-center">
            <div class="flex flex-col flex-wrap space-y-4 p-5 mt-14 justify-center md:flex-row  md:justify-center md:space-x-4 md:space-y-0  md:h-fit md:w-fit">
                <div class="flex basis-full w-full justify-center mb-3 md:mb-10">
                    <span class="text-2xl font-semibold text-center w-full md:4xl">Join as an Participant or Organizer</span>
                </div>

                <div class="flex flex-row h-full justify-start md:w-max md:basis-0">
                    <input class="hidden peer" name="userType" id="University" type="radio" value="university">
                    <label for="University" class="flex items-center justify-between text-2xl w-full h-40 bg-white hover:bg-gray-50 transition-colors duration-500 peer-checked:text-blue-500 rounded-lg border-2 border-gray-300 shadow-xl peer-checked:border-blue-500 hover:border-blue-500
                peer-hover:shadow-inner  cursor-pointer md:flex-col-reverse md:h-full md:px-10">
                        <div class="block p-5">
                            <div class="w-full text-4xl font-semibold">University</div>
                            <div class="w-full text-sm font-light text-gray-500 text-center">I want to organize events</div>
                        </div>
                        <div class="block">
                            <img class="mr-5 md:mt-14" src="{{asset('/imgs/organizer.svg')}}" width="120px">
                        </div>
                    </label>
                </div>
                <div class="flex flex-row h-full justify-start md:w-max md:basis-0">
                    <input class="hidden peer" name="userType" id="Trainee" type="radio" value="trainee">
                    <label for="Trainee" class="flex items-center justify-between text-2xl w-full h-40 bg-white hover:bg-gray-50 transition-colors duration-500 peer-checked:text-blue-500 rounded-lg border-2 border-gray-300 shadow-xl peer-checked:border-blue-500 hover:border-blue-500
                peer-hover:shadow-inner  cursor-pointer md:flex-col-reverse md:h-full md:px-10">
                        <div class="block p-5">
                            <div class="w-full text-4xl font-semibold">Trainee&nbsp;&nbsp;&nbsp;</div>
                            <div class="w-full text-sm font-light text-gray-500 text-center">I want to organize events</div>
                        </div>
                        <div class="block">
                            <img class="mr-5 md:mt-14" src="{{asset('/imgs/organizer.svg')}}" width="120px">
                        </div>
                    </label>
                </div>

                <div class="flex flex-row h-full justify-start md:w-max md:basis-0 md:mr-5">
                    <input class="hidden peer" name="userType" id="Attendee" type="radio" value="attendee">
                    <label for="Attendee" class="flex items-center justify-between text-2xl w-full hover:bg-gray-50 h-40 bg-white transition-colors duration-500 peer-checked:text-blue-500 rounded-lg border-2 border-gray-300 shadow-xl peer-checked:border-blue-500 hover:border-blue-500
                peer-hover:shadow-inner cursor-pointer md:flex-col-reverse md:h-full md:px-10">
                        <div class="block p-5">
                            <div class="w-full text-4xl font-semibold">Attendee</div>
                            <div class="w-full text-sm font-light text-gray-500 text-center">I want to join events</div>
                        </div>
                        <div class="block">
                            <img class="mr-5 md:mt-14" src="{{asset('/imgs/attendee.svg')}}" width="120px">
                        </div>
                    </label>
                </div>
            </div>
        </div>


        <div class="flex w-full p-5 justify-center">
            @csrf
            <input disabled id="continueBtn" name="cont" class="p-2 text-2xl text-center text-white rounded-lg bg-blue-500 w-5/6 hover:bg-blue-500 cursor-pointer transition-all duration-500 ease-in-out hover:scale-110 md:w-1/3 md:duration-600 md:ease-linear disabled:opacity-50 disabled:bg-gray-400 disabled:hover:bg-gray-400" type="submit" value="Choose Account Type">
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("input[name=userType]").click(function(event) {
                $("input[name=cont]").prop('disabled', false);
                $("input[name=cont]").val("Continue as " + event.target.id);
            })
        });
    </script>
</body>

</html>