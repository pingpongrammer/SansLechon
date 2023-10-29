<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/b3f15bab34.js" crossorigin="anonymous"></script>
    <title>San's Lechon</title>
    <link rel="icon" href="../assets/img/loginIcon.png">
</head>

<body class="bg-orange-50 relative font-roboto font-medium ">

    
    <div class="grid">

        <header  id="header"class="header w-full fixed pl-60 h-14 shadow-md shadow-[#d6987b] bg-white">
            <div class="flex items-center h-14">
                <div class="ml-3 mr-4 cursor-pointer" onclick="toggleSideBar()" id="sidebarButton">
                    <i class="fa fa-bars text-lg "></i>
                </div>
                <div class="ml-2 text-xs">
                    <h3>Welcome to Sans Lechon!</h3>
                </div>
                <div class="flex-1 flex justify-end mr-6 items-center">
                    <div class="mr-3 hidden sm:block">
                        {{auth()->user()->username}}
                    </div>
                    <div class="cursor-pointer relative" onclick="avatarDropdown()">
                        <img class="rounded-full w-9 h-9" src="{{auth()->user()->profile_image ? asset ('storage/' .auth()->user()->profile_image) : asset('./assets/img/user-profile.jpg')}}"/>
                        <div class="hidden absolute p-2 bg-[#A65B37] -ml-28 rounded-md -mb-32 w-36 " id="avatar">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="text-center text-white hover:bg-orange-50 hover:text-black p-1 rounded-lg ml-2 w-28"  >
                                    <i class="fa fa-sign-out pr-2"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="sidebar fixed h-screen w-56 shadow-md bg-[#A65B37] shadow-[#A65B37] z-1"  id="sidebar">
            <div class="flex justify-center items-center p-3 ">
                <div class="">
                    <img class="w-40" src="../assets/img/loginbg.png" alt="">
                </div>
            </div> 

            <hr class="m-4"> 

            <div class="flex mt-2 m-3 hover:bg-orange-50 p-2 rounded-lg duration-300 text-orange-50 hover:text-gray-950" >
                <div class="w-7">
                    <i class="fa fa-home pr-2"></i>
                </div>
                <div class="w-48">
                    <a href="/marketer-dashboard" class="text-sm">Dashboard</a>
                </div>
            </div>
            <div class="flex mt-2 m-3 hover:bg-orange-50 p-2 rounded-lg duration-300 items-center text-orange-50 hover:text-gray-950">
                    <i class="fa fa-pencil pr-2"></i>
                    <div class="w-48">
                        <a href="/marketerProfile" class="text-sm">Profile</a>
                    </div>
            </div>


            <div class="flex mt-2 m-3 hover:bg-orange-50 p-2 rounded-lg duration-300 text-orange-50 hover:text-gray-950">
                <div class="justify-start w-7">
                    <i class="fa fa-comments pr-2"></i>
                </div>
                <div>
                    <a href="/my-wallet" class="text-sm">My Wallet</a>
                </div>
            </div>

            <div class="flex mt-2 m-3 hover:bg-orange-50 p-2 rounded-lg duration-300 text-orange-50 hover:text-gray-950">
                <div class="w-7">
                    <i class="fa fa-users pr-2"></i>
                </div>
                <div class="w-48">
                    <a href="/help-center" class="text-sm">Help Center</a>
                </div>
            </div>
            
        </div>

        <main class="main pl-60 pr-4 mt-20">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="fixed bottom-4 w-full text-xs text-gray-800 text-center mt">
            @San's Lechon | Designed and Created by Pingpongrammer
        </footer>
    </div>

    <script src="/assets/js/admin-dashboard.js"></script>

</body>

</html>

